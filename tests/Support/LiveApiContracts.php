<?php

namespace Tests\Support;

use Bexio\BexioClient;
use Bexio\Resources\Resource;
use LogicException;
use PHPUnit\Framework\Assert;
use Saloon\Exceptions\Request\Statuses\NotFoundException;

class LiveApiContracts
{
    /**
     * @template TResource of Resource
     *
     * @param class-string<TResource> $resourceClass
     * @param array<TResource> $candidates
     * @param callable(TResource): int|string|null $identifier
     * @return TResource
     */
    public static function assertFirstIndexedCandidateCanBeShown(
        BexioClient $client,
        string $resourceClass,
        array $candidates,
        callable $identifier,
        string $emptyMessage,
        string $unretrievableMessage,
    ): Resource {
        if ($candidates === []) {
            Assert::markTestSkipped($emptyMessage);
        }

        foreach ($candidates as $candidate) {
            $id = $identifier($candidate);

            if ($id === null) {
                continue;
            }

            try {
                $found = $resourceClass::useClient($client)->find($id);

                Assert::assertInstanceOf($resourceClass, $found);

                return $found;
            } catch (NotFoundException) {
                continue;
            }
        }

        Assert::markTestSkipped($unretrievableMessage);
    }

    public static function assertUnsupportedShowOperation(
        Resource $resource,
        Resource $persistedResource,
        string $message,
    ): void {
        expect(fn () => $resource->find(1))
            ->toThrow(LogicException::class, $message);

        expect(fn () => $persistedResource->refresh())
            ->toThrow(LogicException::class, $message);
    }
}
