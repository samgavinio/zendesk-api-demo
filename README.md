# Getting started with the Zendesk API using PHP

A tiny demonstration on how to call the [Zendesk API](https://developer.zendesk.com/rest_api/docs/core/introduction) using the [zendesk_api_client_php](https://github.com/zendesk/zendesk_api_client_php)

## Getting Started

Install the composer dependencies:

```
composer install
```

In `script.php` make sure to update the

* `$subdomain`
* `$token`
* `$email`

If you are unsure how to generate a new API token, refer to this [help center article](https://support.zendesk.com/hc/en-us/articles/226022787-Generating-a-new-API-token-).


Run the sample script by running:

```
php script.php
```