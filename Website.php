<?php
// Set API endpoint and version
$api_url = 'https://api.demo.sitehost.co.nz/v1.2-public/';

// Set API key and customer ID
$api_key = 'd17261d51ff7046b760bd95b4ce781ac';
$customer_id = 293785;

// Build API request URL
$request_url = $api_url . 'customers/' . $customer_id . '/domains.xml';

// Set headers for API request
$headers = array(
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/xml'
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
$domains = simplexml_load_string($response);

// Output domains on web page
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<domains>';
foreach ($domains->domain as $domain) {
    echo '<domain>';
    echo '<name>' . $domain->name . '</name>';
    echo '</domain>';
}
echo '</domains>';
?>
