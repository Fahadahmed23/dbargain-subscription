![Logo](https://d-bargain.com/wp-content/uploads/2022/12/final-logo-original-150x150.png)

# D-Bargain Subscription Checker

A WordPress plugin used for checking subscriptions of the D-Bargain.


## Table of Contents

- Installation
- Usage
- License
- Credits


### Installation

- Download the plugin zip file.
- Upload the plugin to your WordPress site.
- Activate the plugin.

### Usage

Once the plugin is activated, it will automatically check for the Subscriptions for WooCommerce plugin. If the plugin is found, it will include the `class-dbargain-subscription.php` file.

The class-dbargain-subscription.php file contains the `DBargainCheckSubscription` class, which includes the required files and registers the REST API endpoints.

The REST API endpoints are:

- `/dbargain/post/membership` - POST request for checking membership.

### License

This plugin is licensed under the **GNU GPLv3 or later**. For more information, please see the `LICENSE` file.

### Credits

This plugin is developed by [``Fahad Ahmed``](https://www.linkedin.com/in/fahad-ahmed-optimist/)


