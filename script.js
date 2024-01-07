// script.js
$(document).ready(function () {
    // Update date and time every second
    setInterval(updateDateTime, 1000);

    // Function to update date and time
    function updateDateTime() {
        const datetimeContainer = $('#datetime-container');
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', timeZoneName: 'short' };
        const dateTimeString = now.toLocaleDateString('en-US', options);
        datetimeContainer.text(dateTimeString);
    }

    // Adjust the URL to your PHP file
    const rssFeedUrl = 'news.php';

    // Load and display all news items by default
    loadAndDisplayNews('all');

    // Handle category filter clicks
    $('nav a').on('click', function (e) {
        e.preventDefault();
        const category = $(this).data('category');
        loadAndDisplayNews(category);
    });

    // Function to fetch and display news items based on category
    function loadAndDisplayNews(category) {
        const newsContainer = $('#news-container');

        // Fetch news using AJAX
        $.ajax({
            url: rssFeedUrl,
            type: 'GET',
            data: { category: category },
            dataType: 'json',
            success: function (news) {
                displayNews(news);
            },
            error: function (error) {
                console.error('Error fetching news:', error);
            }
        });
    }

    // Function to display news items
    function displayNews(news) {
        const newsContainer = $('#news-container');
        newsContainer.empty(); // Clear existing news items

        news.forEach(function (item) {
            const newsItem = `
                <div class="news-item">
                    <h2><a href="${item.link}" target="_blank">${item.title}</a></h2>
                    <p>${item.description}</p>
                    <p class="pubDateTime">Published: ${item.pubDateTime}</p>
                    <p class="displayDateTime">Displayed: ${item.displayDateTime}</p>
                </div>
            `;

            newsContainer.append(newsItem);
        });
    }
});
