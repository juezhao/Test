<?php
// Set API endpoint and version
$api_url = 'https://api.demo.sitehost.co.nz/v1.2/';

// Set API key and customer ID
$api_key = 'd17261d51ff7046b760bd95b4ce781ac';
$customer_id = 293785;

// Build API request URL
$request_url = $api_url . 'customers/' . $customer_id . '/domains.json';

// Set headers for API request
$headers = array(
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/json'
);

// Make API request using cURL
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $request_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers
));
$response = curl_exec($curl);
curl_close($curl);

// Parse API response
$domains = json_decode($response, true);

// Output domains on web page
echo '<ul>';
foreach ($domains as $domain) {
    echo '<li>' . $domain['name'] . '</li>';
}
echo '</ul>';
?>
