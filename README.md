# wp-block-registrar

[![Code Style](https://github.com/yardinternet/wp-blocks-registration/actions/workflows/format-php.yml/badge.svg?no-cache)](https://github.com/yardinternet/wp-blocks-registration/actions/workflows/format-php.yml)
[![PHPStan](https://github.com/yardinternet/wp-blocks-registration/actions/workflows/phpstan.yml/badge.svg?no-cache)](https://github.com/yardinternet/wp-blocks-registration/actions/workflows/phpstan.yml)
<!-- [![Tests](https://github.com/yardinternet/wp-blocks-registration/actions/workflows/run-tests.yml/badge.svg?no-cache)](https://github.com/yardinternet/wp-blocks-registration/actions/workflows/run-tests.yml)
[![Code Coverage Badge](https://github.com/yardinternet/wp-blocks-registration/blob/badges/coverage.svg)](https://github.com/yardinternet/wp-blocks-registration/actions/workflows/badges.yml) -->

An Acorn package for WordPress (Gutenberg) block registration.

## Features

- Register client side and server side blocks from config
See [config](./config/blocks.php) for all configuration options.

## Requirements

- [Sage](https://github.com/roots/sage) >= 10.0
- [Acorn](https://github.com/roots/acorn) >= 4.0

## Installation

To install this package using Composer, follow these steps:

1. Install this package with Composer:

    ```sh
    composer require yard/wp-block-registrar
    ```

2. Run the Acorn WP-CLI command to discover this package:

    ```shell
    wp acorn package:discover
    ```

You can publish the config file with:

```shell
wp acorn vendor:publish --provider="Yard\Block\BlockServiceProvider"
```

## About us

[![banner](https://raw.githubusercontent.com/yardinternet/.github/refs/heads/main/profile/assets/small-banner-github.svg)](https://www.yard.nl/werken-bij/)
