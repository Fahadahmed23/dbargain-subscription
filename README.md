![Logo](https://d-bargain.com/wp-content/uploads/2022/12/final-logo-original-150x150.png)

# D-Bargain Subscription Checker

A WordPress plugin used for checking subscriptions of the D-Bargain.


## Table of Contents

- Plugin Description
- Installation
- Usage
- License
- Credits


### Plugin Description

The D-Bargain Subscription Checker plugin is a WordPress plugin designed to check the subscription status of the Dbargain. The plugin includes a PHP class that provides access to the Dbargain API to check the subscription status of a merchant.

### Installation

- Download the latest release of the plugin as a ZIP file.
- In the WordPress admin panel, go to Plugins > Add New.
- Click on the Upload Plugin button at the top of the page.
- Select the ZIP file of the plugin you downloaded and click Install Now.
- Once the plugin is installed, click Activate Plugin.



### Usage

After installing and activating the plugin, you can use the `DBargainCheckSubscription` class to check the subscription status of a merchant. The plugin includes the `class.dbargain.api.php` file, which provides access to the Dbargain API.

Once the plugin is activated, it will automatically check for the Subscriptions for WooCommerce plugin. If the plugin is found, it will include the `class-dbargain-subscription.php` file.

The class-dbargain-subscription.php file contains the `DBargainCheckSubscription` class, which includes the required files and registers the REST API endpoints.

The REST API endpoints are:

- `/dbargain/post/membership` - POST request for checking membership.

### License

This plugin is licensed under the **GNU GPLv3 or later**. For more information, please see the `LICENSE` file.

### Credits

This plugin is developed by [``Fahad Ahmed``](https://www.linkedin.com/in/fahad-ahmed-optimist/)

