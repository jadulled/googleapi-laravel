# A Google API v3 wrapper for Laravel 4

This package enables a Laravel flavoured way to manage Google services through its API interface (v3)

## Installation

Add the required package to your composer.json file

```js
{
    "require": {
    	...
		"pongocms/googleapi": "dev-master"
	}
}
```

### Set minimum-stability to 'dev'

In order to avoid Composer's possible conflicts, just set your composer.json 'minimum-stability' to 'dev'

```js
{
	...
    "minimum-stability": "dev"
}
```

...then just run `composer update`

## Laravel implementation

This package includes a ServiceProvider that will give access to a helpful `GoogleAPI` facade.
Set the `GoogleapiServiceProvider` reference in your `/app/config/app.php` like this:

```php

// app/config/app.php

'providers' => array(
    '...',
    'Pongo\GoogleAPI\GoogleapiServiceProvider'
);
```

### Export and edit the configuration file

Before using this package, you will need to activate a profile from Google developer and get your personal code from the [Google Developers Console](https://console.developers.google.com/) in order to obtain access and use their services through API calls.