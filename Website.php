<?php

// Set up API endpoint URL with SSH authentication
$url = 'https://jz20230301:nB1Xyx9P@api.demo.sitehost.co.nz/v1.0/clients/293785/domains';

// Send API request and get response
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Parse response into an array
$domains = json_decode($response, true);

// Output domains as an HTML list
echo '<ul>';
foreach ($domains as $domain) {
  echo '<li>' . $domain['name'] . '</li>';
}
echo '</ul>';

?>
