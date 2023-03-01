<?php
// Set API details
$api_server = 'https://api.demo.sitehost.co.nz';
$api_version = '1.0';
$api_key = 'd17261d51ff7046b760bd95b4ce781ac';
$client_id = 293785;
$format = 'json';

// Build API call URL
$url = "{$api_server}/{$api_version}/srs/list_domains.{$format}?client_id={$client_id}&apikey={$api_key}";

// Make API call
$response = file_get_contents($url);

// Decode response into a PHP array
$data = json_decode($response, true);

// Check if there was an error
if ($data['status'] == 'error') {
    echo "Error: {$data['message']}";
} else {
    // Display list of domains
    echo "<ul>";
    foreach ($data['domains'] as $domain) {
        echo "<li>{$domain}</li>";
    }
    echo "</ul>";
}
?>
