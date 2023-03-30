# Laravel Object Detection

[![Latest Version on Packagist](https://img.shields.io/packagist/v/livijn/laravel-object-detection.svg?style=flat-square)](https://packagist.org/packages/livijn/laravel-object-detection)
[![Total Downloads](https://img.shields.io/packagist/dt/livijn/laravel-object-detection.svg?style=flat-square)](https://packagist.org/packages/livijn/laravel-object-detection)

This package detects faces in an image using Machine Learning, [TensorFlow](https://www.tensorflow.org/) and the [MediaPipe Face Detection](https://google.github.io/mediapipe/solutions/face_detection.html) model.

![Example](https://mediapipe.dev/images/mobile/face_detection_android_gpu.gif)

## Installation

You can install the package via composer:

```bash
composer require livijn/laravel-object-detection
```

You should add this to your `composer.json` file to ensure that our package is fully installed. 
```
"scripts": {
    "post-install-cmd": [
        "@php artisan object-detection:install"
    ]
}
```

### Installation on Laravel Forge
If you are deploying on Laravel Forge, make sure you have sufficient node & npm versions. You can read [this article on how to update nodejs](https://blog.adaptivemedia.se/upgrade-only-nodejs-on-a-laravel-forge-server-ubuntu-1804) on Forge. 

To update npm, just run `sudo npm install -g npm@latest` on your server.

I have only verified this works with these versions: 
* node >= 16 
* npm >= 7

## Usage

```php
LaravelObjectDetection::getObjectsFromImageUrl('https://some-url.com/some-image.jpg');

// Returns an ImageObject
// [{"class":"dog","score":0.973773181438446,"boundingBox":[239.84360694885254,75.59387746453285,505.188524723053,590.4131692349911]}]
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email ouff@live.se instead of using the issue tracker.

## Credits

-   [Fredrik Livijn](https://github.com/livijn)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
