# Laravel ANAF
Web service for get info about taxpayers who are registered according to art. 316 of the Romanian Fiscal Code

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Build Status][ico-build]][link-build]
[![StyleCI][ico-styleci]][link-styleci]
[![Quality Score][ico-scrutinizer]][link-scrutinizer]
[![Total Downloads][ico-downloads]][link-downloads]
## Installation

Via Composer

``` bash
$ composer require andalisolutions/laravel-anaf
```

## Usage
```php
use Andali\Anaf\Facades\Anaf;

$infoCui = Anaf::info('38744563');
```
Response
```json
{"cui":38744563,"data":"2020-02-20","denumire":"ANDALI SOLUTIONS PRO S.R.L.","adresa":"JUD. ARGEŞ, SAT LEREŞTI COM. LEREŞTI, STR. ŞOTCAN, NR.940, ET.PARTER","scpTVA":false,"data_inceput_ScpTVA":"","data_sfarsit_ScpTVA":"","data_anul_imp_ScpTVA":"","mesaj_ScpTVA":"nu figureaza in registre ","dataInceputTvaInc":"","dataSfarsitTvaInc":"","dataActualizareTvaInc":"","dataPublicareTvaInc":"","tipActTvaInc":"","statusTvaIncasare":false,"dataInactivare":" ","dataReactivare":" ","dataPublicare":" ","dataRadiere":" ","statusInactivi":false,"dataInceputSplitTVA":"","dataAnulareSplitTVA":"","statusSplitTVA":false}
```

## Changelog

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
./vendor/bin/phpunit test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email <andrei.ciungulete@andali.ro> instead of using the issue tracker.

## Credits

- [Andrei Ciungulete][link-author]
- [All Contributors][link-contributors]

## License

Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/andalisolutions/laravel-anaf.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/andalisolutions/laravel-anaf.svg?style=flat-square
[ico-build]: https://github.com/andalisolutions/laravel-anaf/workflows/tests/badge.svg
[ico-styleci]: https://styleci.io/repos/253312070/shield
[ico-scrutinizer]: https://img.shields.io/scrutinizer/g/andalisolutions/laravel-anaf.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/andalisolutions/laravel-anaf
[link-downloads]: https://packagist.org/packages/andalisolutions/laravel-anaf
[link-build]: https://github.com/andalisolutions/laravel-anaf/actions
[link-styleci]: https://styleci.io/repos/253312070
[link-scrutinizer]: https://scrutinizer-ci.com/g/andalisolutions/laravel-anaf
[link-author]: https://github.com/andalisolutions
[link-contributors]: ../../contributors
