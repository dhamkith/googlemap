# Laravel googlemap: storing google map latitude, longitude for maps.googleapis

This package support Laravel Framework 7.4.0, so if you are working on a Laravel 7.4.0 project, then you 
can use this package.


## Installation

Installation is straightforward, setup is similar to every other Laravel Package.

#### 1. Install via Composer

Begin by pulling in the package through Composer:

```
composer require dhamkith/googlemap
```

#### 2. Define the Service Provider

Next we need to pull in the service providers.

**Note:** This package supports the new _auto-discovery_ features of Laravel 7.4, so if you are working on a Laravel 7.4 project, then your install is complete, you can skip to step 3.

If is not work then you need to add a provider. Inside of your `config/app.php` define a new service provider

```
'providers' => [
	//  other providers

	Dhamkith\Googlemap\GooglemapServiceProvider::class,
];
```

#### 3. Publish Config File and Other Resources (OPTIONAL)

The config file allows you to override default settings of this package to meet your specific needs. It is optional and allows you to set a 

* Set Gooogle Apikey - `"google_api_key" => "api key"` (OPTIONAL),
* URL path - `"path" => "map"`,
* middleware for GoogleMapController - `"middleware_for_view" => "auth"`, 
* `"auth"` is defalt middleware You can override this value if,
* your application suported Multiple Authentication you can change to `"auth:admin"` 

To generate a config file and other resources type this command into your terminal:

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
 
#### 4. Migrate (OPTIONAL)

php artisan migrate for create locations table

```
php artisan migrate
```

## Usage

This package is easy to use. It provides a handful of helpful View components. 

* `<x-map-location-all />` component for display all store data,
* `<x-map-location-create />` component for create from,
* `<x-map-location-edit :location="$location" />` component for edit from,
* `<x-map-location-view />` component for display google map,



#### 1. add style and javascript file

adding googlemap.css stylesheet tag to 'app' or other layout, in head section 

```php
<head>

<!-- Other code here -->
<link href="{{ asset('css/googlemap.css') }}" rel="stylesheet">

</head>
```

adding googlemap.js and googleapis link script tag in body section 

```php
<body>
<!-- Other html code here  -->

<!-- scripts -->
<script src="{{ asset('js/googlemap.js') }}" defer></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{config('googlemap')['google_api_key']}}&callback=initMap" async defer></script>

</body>
```

#### 2. extends views

extends views `all, create, edit, view`

**Example:** view locations `resources/views/vendor/googlemap/create.blade.php` 

```php 
@extends('layouts.app')

@section('content')
    <x-map-location-create/>
@endsection
```

#### 3. use package router

package router names are 
###### for display all store data `googlemap.all` 
```php 
{{ route('googlemap.all') }}
```
###### for get create from `googlemap.create`
```php 
{{ route('googlemap.create') }}
```
###### for get edit from `googlemap.edit`
```php 
{{ route('googlemap.edit') }}
```  
###### for preview google map `googlemap.preview`
```php 
{{ route('googlemap.preview') }}
```

## Contribute

I encourage you to contribute to this package to improve it and make it better. Even if you don't feel comfortable with coding or submitting a pull-request (PR), you can still support it by submitting issues with bugs or requesting new features, or simply helping discuss existing issues to give us your opinion and shape the progress of this package. 

## Contact

I would love to hear from you. I run the dhamkith channel on [YouTube](https://www.youtube.com/user/dhamkith/videos), please subscribe and check out the videos.

You can also email me at dhamkith@gmail.com for any other requests.
 




