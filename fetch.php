<?php
// Adjust the URL to your actual RSS feed
$rssFeedUrl = 'https://indianexpress.com/feed/';

header('Content-Type: application/xml');

// Fetch the RSS feed
echo file_get_contents($rssFeedUrl);
