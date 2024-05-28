# Laravel DataTables Buttons Plugin

[![Laravel 11.x](https://img.shields.io/badge/Laravel-10.x-orange.svg)](http://laravel.com)
[![Latest Stable Version](https://img.shields.io/packagist/v/mrugeshtatvasoft/laravel-datatables-buttons.svg)](https://packagist.org/packages/mrugeshtatvasoft/laravel-datatables-buttons)
[![Continuous Integration](https://github.com/mrugeshtatvasoft/laravel-datatables-buttons/actions/workflows/continuous-integration.yml/badge.svg)](https://github.com/mrugeshtatvasoft/laravel-datatables-buttons/actions/workflows/continuous-integration.yml)
[![Static Analysis](https://github.com/mrugeshtatvasoft/laravel-datatables-buttons/actions/workflows/static-analysis.yml/badge.svg)](https://github.com/mrugeshtatvasoft/laravel-datatables-buttons/actions/workflows/static-analysis.yml)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mrugeshtatvasoft/laravel-datatables-buttons/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mrugeshtatvasoft/laravel-datatables-buttons/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/mrugeshtatvasoft/laravel-datatables-buttons.svg)](https://packagist.org/packages/mrugeshtatvasoft/laravel-datatables-buttons)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/mrugeshtatvasoft/laravel-datatables-buttons)

This package is a plugin of [Laravel DataTables](https://github.com/mrugeshtatvasoft/laravel-datatables) for handling server-side function of exporting the table as csv, excel, pdf and printing.

## Requirements

- [PHP >= 8.2](http://php.net/)
- [Laravel 11.x](https://github.com/laravel/framework)
- [Laravel DataTables](https://github.com/mrugeshtatvasoft/laravel-datatables)
- [jQuery DataTables v1.10.x](http://datatables.net/)
- [jQuery DataTables Buttons Extension](https://datatables.net/reference/button/)

## Documentations

- [Laravel DataTables Documentation](http://mrugeshtatvasoftbox.com/docs/laravel-datatables)

## Laravel Version Compatibility

| Laravel       | Package |
|:--------------|:--------|
| 8.x and below | 4.x     |
| 9.x           | 9.x     |
| 10.x          | 10.x    |
| 11.x          | 11.x    |

## Quick Installation

`composer require mrugeshtatvasoft/laravel-datatables-buttons:^11`

#### Service Provider (Optional on Laravel 5.5)

`mrugeshtatvasoft\DataTables\ButtonsServiceProvider::class`

#### Configuration and Assets (Optional)

`$ php artisan vendor:publish --tag=datatables-buttons --force`

And that's it! Start building out some awesome DataTables!

## Contributing

Please see [CONTRIBUTING](https://github.com/mrugeshtatvasoft/laravel-datatables-buttons/blob/master/.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [aqangeles@gmail.com](mailto:aqangeles@gmail.com) instead of using the issue tracker.

## Credits

- [Arjay Angeles](https://github.com/mrugeshtatvasoft)
- [All Contributors](https://github.com/mrugeshtatvasoft/laravel-datatables-buttons/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/mrugeshtatvasoft/laravel-datatables-buttons/blob/master/LICENSE.md) for more information.