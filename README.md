## IICache
Caching extension for the Laravel and Intervention Image Package
## Installation
```
composer require fewdji/ii-cache
```
## Setup
Create the symlink for the directory of cached images
```
ln -s {PROJECT_DIR}/storage/app/public/images {PROJECT_DIR}/public/images
```

Publish the config file
```
php artisan vendor:publish 
```
Setup presets for your images in `config/ii-cache.php` file. All [InterventionImage class methods]((http://image.intervention.io/use/basics#editing)) are available.
```
'presets' => [
        'hq' => [
            'widen' => '720',
            'watermark' => 'default'
        ],

        'sd' => [
            'resize' => ['120', '120'],
            'quality' => '85'
        ]
    ],

    'watermarks' => [
        'default' => [
            'path' => 'img/copy.png',
            'size' => '10',
            'position' => 'bottom-right',
            'opacity' => '90'
        ]
    ]
```
## Usage
Put your original images in `storage/app/private/images`. And then you can access to modified cached images with links like `images/directory/presetName/imgName.ext` or use built-in blade directive
```
@image('tag', ['avatars', 'user1.jpg', 'sd', ['alt' => 'User 1']])
// will output
// <img src="images/avatars/sd/user1.jpg" alt="User 1" />
```