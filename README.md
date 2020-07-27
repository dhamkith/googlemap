# Laravel googlemap: googlemap  for Laravel

This package support Laravel Framework 7.4.0, so if you are working on a Laravel 7.4.0 project, then you 
can use this package.


## Installation

Installation is straightforward, setup is similar to every other Laravel Package.

#### 1. Install via Composer

Begin by pulling in the package through Composer:

```
composer require dhamkith/googlemap
```

#### 2. Define the Service Provider and alias

Next we need to pull in the alias and service providers.

**Note:** This package supports the new _auto-discovery_ features of Laravel 7.4, so if you are working on a Laravel 7.4 project, then your install is complete, you can skip to step 3.

If is not work then you need to add a provider and alias. Inside of your `config/app.php` define a new service provider

```
'providers' => [
	//  other providers

	Dhamkith\Googlemap\GooglemapServiceProvider::class,
];
```

#### 3. Publish Config File (OPTIONAL)

The config file allows you to override default settings of this package to meet your specific needs. It is optional and allows you to set a 

* Gooogle Apikey - `"google_api_key" => "api key"`,
* URL path - `"path" => "map"`,
* middleware for GoogleMapController - `"middleware_for_view" => "auth"`, 
* `"auth"` is defalt middleware You can override this value,
* if your application suported Multiple Authentication you can change to `"auth:admin"` 

To generate a config file type this command into your terminal:

```
php artisan vendor:publish --tag=googlemap
```

This generates 

* a config file at `config/googlemap.php`.
* a view file at `resources/views/vendor/googlemap/all.blade.php`.
* a view file at `resources/views/vendor/googlemap/create.blade.php`.
* a view file at `resources/views/vendor/googlemap/edit.blade.php`.
* a view file at `resources/views/vendor/googlemap/view.blade.php`.
* a style file at `public/css/googlemap.css`.
* a javascript file at `public/js/googlemap.js`.

## Usage

This package is easy to use. It provides a handful of helpful View components. 

* `<x-map-location-all />` component for display all store data,
* `<x-map-location-create/>` component for create from,
* `<x-map-location-edit :location="$location"></x-map-location-edit>` component for edit from,
* `<x-map-location-view />` component for display google map,

##### [IMPORTANT] What this package does NOT do

This does NOT 

#### 1. Add Style and javascrips file

#### 2. Extends views

#### 3. Use Route for views




