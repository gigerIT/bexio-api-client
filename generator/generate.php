<?php

function createDto($namespace, $className, $properties)
{
    $content = "<?php\n\nnamespace $namespace;\n\nclass $className\n{\n";
    foreach ($properties as $property) {
        $content .= "    public \$$property;\n";
    }
    $content .= "}\n";
    return $content;
}

function createRequest($namespace, $className, $method, $url, $body = false)
{
    $content = "<?php\n\nnamespace $namespace;\n\n";
    $content .= "use GuzzleHttp\\Client;\n";
    $content .= "use GuzzleHttp\\Exception\\RequestException;\n\n";
    $content .= "class $className\n{\n";
    $content .= "    private \$client;\n\n";
    $content .= "    public function __construct(Client \$client)\n";
    $content .= "    {\n";
    $content .= "        \$this->client = \$client;\n";
    $content .= "    }\n\n";
    $content .= "    public function execute(";
    if ($body) {
        $content .= "\$body";
    }
    $content .= ")\n";
    $content .= "    {\n";
    $content .= "        try {\n";
    $content .= "            \$response = \$this->client->request('$method', '$url'";
    if ($body) {
        $content .= ", ['json' => \$body]";
    }
    $content .= ");\n";
    $content .= "            return \$response->getBody()->getContents();\n";
    $content .= "        } catch (RequestException \$e) {\n";
    $content .= "            return \$e->getMessage();\n";
    $content .= "        }\n";
    $content .= "    }\n";
    $content .= "}\n";
    return $content;
}

$apiDocumentation = file_get_contents(__DIR__ . '/bexio_API_documentation.txt');
$lines = explode("\n", $apiDocumentation);

$baseDir = __DIR__ . '/../src/Resources';
$currentSection = '';
$resources = [];

foreach ($lines as $line) {
    if (strpos($line, 'Fetch a list of') !== false || strpos($line, 'Create') !== false || strpos($line, 'Edit') !== false || strpos($line, 'Delete') !== false) {
        $currentSection = trim($line);
        $resources[$currentSection] = [];
    } elseif ($currentSection && preg_match('/^\s*([a-zA-Z_]+)\s*:\s*(.*)$/', $line, $matches)) {
        $resources[$currentSection][$matches[1]] = $matches[2];
    }
}

foreach ($resources as $section => $attributes) {
    $folder = explode(' ', $section)[2];
    $folderPath = "$baseDir/$folder";
    if (!is_dir($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    $className = str_replace(' ', '', ucwords(str_replace('_', ' ', $attributes['request'])));
    $namespace = "App\\$folder";

    if (strpos($section, 'Fetch a list of') !== false) {
        $dtoProperties = explode(', ', $attributes['fields']);
        $dtoContent = createDto($namespace, $className, $dtoProperties);
        file_put_contents("$folderPath/$className.php", $dtoContent);
    } elseif (strpos($section, 'Create') !== false || strpos($section, 'Edit') !== false || strpos($section, 'Delete') !== false) {
        $method = $attributes['method'];
        $url = $attributes['url'];
        $body = $method === 'POST' || $method === 'PUT';
        $requestContent = createRequest($namespace, $className, $method, $url, $body);
        if (!is_dir("$folderPath/Requests")) {
            mkdir("$folderPath/Requests", 0777, true);
        }
        file_put_contents("$folderPath/Requests/$className.php", $requestContent);
    }
}

echo "DTOs and requests have been created based on the API documentation.\n";

?>
