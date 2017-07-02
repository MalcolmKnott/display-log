# Display your Laravel log file in a bootsrap styled layout

This composer package reads and displays your Laravel log file.

## Installation

Begin by pulling in the package through Composer.

```bash
composer require malcolmknott/displaylog
```

Next, if using Laravel 5, include the service provider within your `config/app.php` file.

```php
'providers' => [
    Malcolmknott\Displaylog\DisplayLogServiceProvider::class,
];
```

Add this driver to your `config/filesystems.php` file.

```php
'storage' => [
    'driver' => 'local',
    'root' => storage_path(),
]
```

If you have a new project scaffold the basic login and registration views to pull in Boostrap.
Or publish the view file to use your own layout.

```bash
php artisan make:auth
```

## View

Publish the view file to change the format and add your own style.

```bash
php artisan vendor:publish --provider="Malcolmknott\Displaylog\DisplayLogServiceProvider" --tag="views"
```

## Usage

Add a route that points to the Display Log Controller, you'll probably want to add some middleware to restrict who can view your log.

```php
Route::get('display-log', '\Malcolmknott\Displaylog\DisplayLogController@show');
```
