# laravel-object-detection

[![Latest Version on Packagist](https://img.shields.io/packagist/v/livijn/laravel-object-detection.svg?style=flat-square)](https://packagist.org/packages/livijn/laravel-object-detection)
[![Total Downloads](https://img.shields.io/packagist/dt/livijn/laravel-object-detection.svg?style=flat-square)](https://packagist.org/packages/livijn/laravel-object-detection)

This package identifies objects in an image using Machine Learning, [TensorFlow](https://www.tensorflow.org/) and the [coco-ssd](https://github.com/tensorflow/tfjs-models/tree/master/coco-ssd) model.

## Installation

You can install the package via composer:

```bash
composer require livijn/laravel-object-detection
```

## Usage

```php
LaravelObjectDetection::getObjectsFromImageUrl('https://some-url.com/some-image.jpg');

// Returns an ImageObjectCollection
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
