# A Google API v3 wrapper for Laravel 4

This package enables a Laravel flavoured way to manage Google services through its API interface (v3)

## Installation

Add the required package to your composer.json file

```js
{
    "require": {
    	...
		"pongocms/googleapi": "1.0"
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

Once obtained `Client ID` and `Client Secret` strings for web application from the Google Developers Console and set a valid `Redirect URI` callback, export the package config file:

`php artisan config:publish pongocms/googleapi`

...and put them to the oauth2 parameters into the config file

```php

// app/config/packages/pongocms/googleapi/config.php

return array(

    // OAuth2 Setting, you can get these keys in Google Developers Console
    'oauth2_client_id'      => '< YOUR CLIENT ID >',
    'oauth2_client_secret'  => '< YOUR CLIENT SECRET >',
    'oauth2_redirect_uri'   => 'http://localhost:8000/',   // Change it according to your needs

    ...
  );
```

Set also the correct `scope` for the services you will use in your application (and remember to activate related APIs inside the Google Developers Console => APIS & AUTH => APIs). Refer to [Google API](https://developers.google.com/google-apps/app-apis) wiki for any help.

## Using the GoogleAPI facade

Once everything set correctly, you'll gain access to the `GoogleAPI` facade in a pure Laravel style.

### Need to use the Google Calendar service?

 ```php

// routes.php

Route::get('/', function()
{
	if ( Input::has('code') )
	{
		$code = Input::get('code');
		
		// authenticate with Google API
		if ( GoogleAPI::authenticate($code) )
		{
			return Redirect::to('/protected');
		}
	}
	
	// get auth url
	$url = GoogleAPI::authUrl();
	
	return link_to($url, 'Login with Google!');
});

Route::get('/logout', function()
{
	// perform a logout with redirect
	return GoogleAPI::logout('/');
});

Route::get('/protected', function()
{
	// Get the google service (related scope must be set)
	$service = GoogleAPI::getService('Calendar');
	
	// invoke API call
	$calendarList = $service->calendarList->listCalendarList();

	foreach ( $calendarList as $calendar )
	{
		echo "{$calendar->summary} <br>";
	}

	return link_to('/logout', 'Logout');
});

 ```