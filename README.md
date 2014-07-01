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