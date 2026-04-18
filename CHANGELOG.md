# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.0.0] - 2026-04-18

### Added

- PHP 8.2, 8.3, and 8.4 compatibility (Magento 2.4.8 requirement)
- Magento 2.4.8 compatibility
- Unit tests for `RegistrationPlugin` (`src/Test/Unit/Plugin/RegistrationPluginTest.php`)
- `phpunit.xml.dist` for running the test suite

### Changed

- Restructured all module source code into `src/` directory
- Updated `RegistrationPlugin` to use PHP 8.1+ constructor property promotion (`readonly`)
- Changed `const` visibility to `public const` for `XML_PATH_DISABLE_CUSTOMER_REGISTRATION`
- Removed deprecated `setup_version` attribute from `etc/module.xml`
- Updated `composer.json`: added explicit `magento/framework ^103.0` and `magento/module-customer ^103.0` requirements
- Updated `composer.json` autoload paths to reflect new `src/` structure
- Bumped version to `2.0.0`

### Removed

- PHP 7.x support (Magento 2.4.8 requires PHP 8.2+)
- PHP 8.1 support

## [1.0.8] - 2023-01-01

### Added

- Initial stable release
- Disable frontend customer registration via admin configuration
- Magento 2.1.x – 2.3.x compatibility
- PHP 7.x and 8.1 support
- Admin configuration under `Stores > Configuration > Customers > Customer Configuration > Create New Account Options`
- Spanish (Mexico) translation (`es_MX`)
