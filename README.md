# wp-mshots-api
A WordPress php library for interacting with the WordPress.com mshots API.

``https://s.wordpress.com/mshots/v1/{{ DOMAIN }}?w= {{Width}}``


Usage:
```php
// Initate New MShots API.
$mshots = new MShotsAPI();

// Set Screenshot URL.
$screenshot_url = $mshots->get_screenshot('https://wp-api-libraries.com', 1024);

// Display Screenshot.
echo '<img src="' . $screenshot_url . '" />';
```
