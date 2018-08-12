# PHPUnit - YAML data provider

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg)](https://php.net/)
[![Latest Stable Version](https://poser.pugx.org/phoenixrvd/phpunit-data-provider-yaml/v/stable.svg)](https://packagist.org/packages/phoenixrvd/phpunit-data-provider-yaml)
[![composer.lock](https://poser.pugx.org/phoenixrvd/phpunit-data-provider-yaml/composerlock)](https://packagist.org/packages/phoenixrvd/phpunit-data-provider-yaml)
[![License](https://poser.pugx.org/phoenixrvd/phpunit-data-provider-yaml/license)](https://packagist.org/packages/phoenixrvd/phpunit-data-provider-yaml)

[![Build Status](https://travis-ci.org/phoenixrvd/phpunit-data-provider-yaml.png?branch=master)](https://travis-ci.org/phoenixrvd/phpunit-data-provider-yaml)
[![Code Climate](https://codeclimate.com/github/phoenixrvd/phpunit-data-provider-yaml.png)](https://codeclimate.com/github/phoenixrvd/phpunit-data-provider-yaml)
[![StyleCI](https://styleci.io/repos/102899359/shield?branch=master)](https://styleci.io/repos/102899359)
[![Test Coverage](https://codeclimate.com/github/phoenixrvd/phpunit-data-provider-yaml/badges/coverage.svg)](https://codeclimate.com/github/phoenixrvd/phpunit-data-provider-yaml/coverage)
[![Latest Unstable Version](https://poser.pugx.org/phoenixrvd/phpunit-data-provider-yaml/v/unstable.svg)](https://packagist.org/packages/phoenixrvd/phpunit-data-provider-yaml)

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [Installation](#installation)
- [Example](#example)
- [Testing](#testing)
- [Copyright and license](#copyright-and-license)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

This library allow you to use YAML files to storing a data for
 [PHPUnit-Data providers](https://phpunit.readthedocs.io/en/7.1/writing-tests-for-phpunit.html#data-providers).
 
## Installation

Install the latest version with

```bash
composer require phoenixrvd/phpunit-data-provider-yaml
```

## Example

* Create the TestCase

```php
<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    use \PhoenixRVD\PHPUnitDataProviderYAML\YamlDataProvider;
    
    /**
     * @test
     * @dataProvider yamlDataProvider
     */
    public function calcSum(int $a, int $b, int $result): void
    {
        self::assertEquals($result, $a + $b);
    }
}
```

* Create fixtures directory `CalculatorTestFixtures`, which locate at the same path as `CalculatorTest`
* Create fixtures file named `calcSum.fixtures.yaml` in this directory

```yaml
Integers:
  a: 2
  b: 3
  result: 5
```

* Run the test

## Testing

```bash
composer phpunit_data_provider_yaml:test
```

## Copyright and license

Code released under the [MIT License](LICENSE). 

