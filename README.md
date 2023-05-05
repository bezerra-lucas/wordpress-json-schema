# JSON-LD Article Schema for WordPress Posts

This is a simple WordPress plugin that adds JSON-LD Article schema to every post on your website. It helps improve your website's SEO by providing search engines with structured data about your posts.

## Features

- Automatically adds JSON-LD Article schema to WordPress posts
- Includes mainEntityOfPage, headline, datePublished, dateModified, author, publisher, and description properties
- Supports featured image as the Article schema image

## Installation

1. Download or clone this repository and copy the `jsonld-article-schema` folder to your WordPress installation under `wp-content/plugins/`.
2. Log in to your WordPress admin dashboard, go to "Plugins" and find the "JSON-LD Article Schema for Posts" plugin in the list.
3. Click "Activate" to enable the plugin.

## Customization

To customize the plugin, you can modify the `jsonld-article-schema.php` file:

- Replace the placeholder URL in the `publisher` section with the URL of your website's logo.
- Replace "Your Name" and "https://www.example.com" with your name and website URL, respectively.

## License

This project is released under the [MIT License](https://opensource.org/licenses/MIT).

## Contributing

If you'd like to contribute to this project, feel free to create a pull request or open an issue.
