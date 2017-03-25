# RedisTracker

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

Instead of rolling your own tracker to track the progress of a large job, you can use this.

As your job progresses, track what you have processed. So when it fails, you can retry without having to figure out 
what you have done and what you have not.


## Install

Via Composer

``` bash
$ composer require robrogers3/RedisTracker
```

## Usage

``` php
/** use Config lib or your choice
 * @see https://github.com/Luracast
*/
use Luracast\Config\Config;
use robrogers\Tracker\RedisTracker;

Config::init(__DIR__ . '/config');
$config = Config::get('tracker.config');
$tracker = RedisTracker::singleton('your-key',1);
$tracker->push('xxx');
$tracker->has('xxx');
$tracker->get('xxx');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email robrogers@me.com instead of using the issue tracker.

## Credits

- [Rob Rogers][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/robrogers/redis-tracker.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/robrogers3/RedisTracker/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/robrogers3/RedisTracker.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/robrogers3/RedisTracker.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/robrogers/redis-tracker.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/robrogers/redis-tracker
[link-travis]: https://travis-ci.org/robrogers3/RedisTracker
[link-scrutinizer]: https://scrutinizer-ci.com/g/robrogers3/RedisTracker/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/robrogers3/RedisTracker
[link-downloads]: https://packagist.org/packages/robrogers/redis-tracker
[link-author]: https://github.com/robrogers3
[link-contributors]: ../../contributors
