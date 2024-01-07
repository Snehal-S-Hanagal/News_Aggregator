<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>News Website</title>
</head>
<body>
    <header>
        <h1>News Website</h1>
        <div id="datetime-container"></div>
    </header>
    <nav>
        <ul>
            <li><a href="#" data-category="all">All</a></li>
            <li><a href="#" data-category="sports">Sports</a></li>
            <li><a href="#" data-category="bollywood">Bollywood</a></li>
        </ul>
    </nav>
    <main id="news-container"></main>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
