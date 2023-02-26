# country-code
A list of all countries with phone, code, and their names

### Install
```bash
composer require aminkhoshzahmat/country-code
````

### Usage
```php
CountryType::IRAN->getCode();   // "IR"
CountryType::IRAN->getNumber(); // "98"
CountryType::IRAN->getName();   // "Iran"
CountryType::IRAN->getCities(); // ["Tehran", "Tabriz", ...]
```
