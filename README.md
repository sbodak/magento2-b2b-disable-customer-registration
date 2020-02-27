# Magento 2 - Disable customer registration
 
## Overview
This module enable possibility to disable the customer registration.
It can be useful for B2B customers, if we don't want to allow them register by themselves. 
Extension will remove link to register page and registration form from login page.

## Compatibility
- Magento 2.1.x - 2.3.x

## Installation details
1. Run `composer require sbodak/magento2-b2b-disable-customer-registration`
2. Run `php bin/magento module:enable Bodak_DisableRegistration`
3. Run `bin/magento setup:upgrade`
4. Run `bin/magento clean:cache`

## Configuration details
1. Go to Magento admin panel
2. Find option in `Stores > Configuration > Customers > Customer configuration`
3. Under the `Create New Account Options` tab you will find the `Disable frontend customer registration` option
4. `Enable` this option to activate the plugin


### Module configuration - administration panel
![Module configuration - administration panel](docs/customer_registration_disabled_configuration.png)

### Remove registration form - frontend view
![Remove registration form](docs/customer_registration_disabled.png)


## Uninstall
1. Run `composer remove sbodak/magento2-b2b-disable-customer-registration`

## License
[MIT License](LICENSE)
