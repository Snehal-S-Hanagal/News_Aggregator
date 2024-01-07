<?php

// Function to fetch news based on the category
function getNewsByCategory($category)
 {
    // Load your RSS feed or use a database to get news items
    $rssFeedUrl = 'https://indianexpress.com/feed/'; // Replace with your actual RSS feed URL

    $xml = simplexml_load_file($rssFeedUrl);

    $news = [];

    foreach ($xml->channel->item as $item) {
        $title = (string)$item->title;
        $link = (string)$item->link;
        $description = (string)$item->description;
        $pubDate = strtotime((string)$item->pubDate);
        $pubDateTime = date('Y-m-d H:i:s', $pubDate);

        // Check if the news item belongs to the selected category
        $categories = array_map('strtolower', explode(',', (string)$item->category));

        if ($category === 'all' || in_array($category, $categories)) {
            $news[] = [
                'title' => $title,
                'link' => $link,
                'description' => $description,
                'pubDateTime' => $pubDateTime,
                'displayDateTime' => date('Y-m-d H:i:s'), // Current date and time when news is displayed
            ];
        }
    }



    return $news;
}

// Get the selected category from the AJAX request
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

// Fetch news based on the selected category
$news = getNewsByCategory($category);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($news);
