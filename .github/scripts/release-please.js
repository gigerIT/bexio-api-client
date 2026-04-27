#!/usr/bin/env node

const { GitHub, Manifest, VERSION } = require('release-please')

const configFile = process.env.RELEASE_PLEASE_CONFIG_FILE || 'release-please-config.json'
const manifestFile = process.env.RELEASE_PLEASE_MANIFEST_FILE || '.release-please-manifest.json'
const repoUrl = process.env.GITHUB_REPOSITORY
const token = process.env.GITHUB_TOKEN
const targetBranch = process.env.RELEASE_PLEASE_TARGET_BRANCH || process.env.GITHUB_REF_NAME || 'main'

if (!repoUrl) {
    throw new Error('GITHUB_REPOSITORY is required')
}

if (!token) {
    throw new Error('GITHUB_TOKEN is required')
}

patchMergeCommitQuery()

main().catch((error) => {
    console.error(error)
    process.exitCode = 1
})

async function main() {
    console.log(`Running release-please version: ${VERSION}`)

    const [owner, repo] = repoUrl.split('/')
    const github = await GitHub.create({
        owner,
        repo,
        token,
        defaultBranch: targetBranch,
    })

    if (process.env.RELEASE_PLEASE_DRY_RUN === 'true') {
        const releaseManifest = await loadManifest(github)
        const releases = await releaseManifest.buildReleases()
        console.log(`Would create ${releases.length} releases`)

        const prManifest = await loadManifest(github)
        const pullRequests = await prManifest.buildPullRequests()
        console.log(`Would create/update ${pullRequests.length} pull requests`)

        for (const pullRequest of pullRequests) {
            console.log(`Release PR: ${pullRequest.title.toString()}`)
            console.log(pullRequest.body.toString())
        }

        return
    }

    const releaseManifest = await loadManifest(github)
    const releases = await releaseManifest.createReleases()
    console.log(`Created ${releases.filter(Boolean).length} releases`)

    const prManifest = await loadManifest(github)
    const pullRequests = await prManifest.createPullRequests()
    console.log(`Created or updated release PRs: ${pullRequests.join(', ')}`)
}

function loadManifest(github) {
    return Manifest.fromManifest(github, targetBranch, configFile, manifestFile)
}

function patchMergeCommitQuery() {
    GitHub.prototype.mergeCommitsGraphQL = async function mergeCommitsGraphQL(targetBranch, cursor, options = {}) {
        this.logger.debug(`Fetching merge commits on branch ${targetBranch} with cursor: ${cursor}`)

        const query = `query pullRequestsSince($owner: String!, $repo: String!, $num: Int!, $targetBranch: String!, $cursor: String) {
      repository(owner: $owner, name: $repo) {
        ref(qualifiedName: $targetBranch) {
          target {
            ... on Commit {
              history(first: $num, after: $cursor) {
                nodes {
                  associatedPullRequests(first: 10) {
                    nodes {
                      number
                      title
                      baseRefName
                      headRefName
                      labels(first: 10) {
                        nodes {
                          name
                        }
                      }
                      mergeCommit {
                        oid
                      }
                    }
                  }
                  sha: oid
                  message
                }
                pageInfo {
                  hasNextPage
                  endCursor
                }
              }
            }
          }
        }
      }
    }`

        const response = await this.graphqlRequest({
            query,
            cursor,
            owner: this.repository.owner,
            repo: this.repository.repo,
            num: options.batchSize ?? 10,
            targetBranch,
        })

        if (!response) {
            this.logger.warn(`Did not receive a response for query: ${query}`)
            return null
        }

        if (!response.repository?.ref) {
            this.logger.warn(`Could not find commits for branch ${targetBranch} - it likely does not exist.`)
            return null
        }

        const history = response.repository.ref.target.history
        const commits = history.nodes || []
        const mergeCommitCount = {}

        for (const commit of commits) {
            for (const pullRequest of commit.associatedPullRequests.nodes) {
                if (pullRequest.mergeCommit?.oid) {
                    mergeCommitCount[pullRequest.mergeCommit.oid] ??= 0
                    mergeCommitCount[pullRequest.mergeCommit.oid]++
                }
            }
        }

        const data = []

        for (const graphCommit of commits) {
            const commit = {
                sha: graphCommit.sha,
                message: graphCommit.message,
            }

            const mergePullRequest = graphCommit.associatedPullRequests.nodes.find((pullRequest) => {
                return (
                    pullRequest.mergeCommit &&
                    pullRequest.mergeCommit.oid === graphCommit.sha &&
                    mergeCommitCount[pullRequest.mergeCommit.oid] === 1
                )
            })

            const pullRequest = mergePullRequest || graphCommit.associatedPullRequests.nodes[0]

            if (pullRequest) {
                commit.pullRequest = {
                    sha: commit.sha,
                    number: pullRequest.number,
                    baseBranchName: pullRequest.baseRefName,
                    headBranchName: pullRequest.headRefName,
                    mergeCommitOid: pullRequest.mergeCommit?.oid,
                    title: pullRequest.title,
                    body: '',
                    labels: pullRequest.labels.nodes.map((node) => node.name),
                    files: [],
                }
            }

            if (options.backfillFiles) {
                this.logger.debug(`Backfilling file list for commit: ${graphCommit.sha}`)
                commit.files = await this.getCommitFiles(graphCommit.sha)
                this.logger.debug(`Found ${commit.files.length} files`)
            }

            data.push(commit)
        }

        return {
            pageInfo: history.pageInfo,
            data,
        }
    }
}
