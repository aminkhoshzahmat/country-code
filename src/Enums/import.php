<?php

/**
 * This file is part of the aminkhoshzahmat/country-code project.
 *
 * @copyright (c) Amin Khoshzahmat <aminkhoshzahmat@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @package Aminkhoshzahmat\CountryCode
 */

require __DIR__.'/../../vendor/autoload.php';

use Aminkhoshzahmat\CountryCode\Enums\CountryType;

$path = __DIR__.'/../../cities.json';
$jsonString = file_get_contents($path);

try {
    $jsonCitiesData = json_decode($jsonString, true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo $e->getMessage();
}

$countries = CountryType::cases();

$countryText = '';
foreach ($countries as $country) {
//    if ($country->getCode() !== CountryType::IRAN->getCode()) {
//        continue;
//    }

    $countryConstant = str_replace(['.', ',', ' ', '-', '_'], '_', strtoupper($country->getName()));
    $countryName = $country->getName();
    $countryCode = $country->getCode();
    $countryPhone = $country->getNumber();
    $countryCities = '';

    $countryText .= <<<HEREDOC
        self::{$countryConstant} => [
            COUNTRY_NAME => '{$countryName}',
            COUNTRY_CODE => '{$countryCode}',
            COUNTRY_PHONE => '{$countryPhone}',
            COUNTRY_CITIES =>
        HEREDOC;
//    $countryText .= "self::{$countryConstant} => [COUNTRY_NAME => '{$countryName}', COUNTRY_CODE => '{$countryCode}', COUNTRY_PHONE => '{$countryPhone}'";

    $citiesText = '';
    $citiesArray = [];
    foreach ($jsonCitiesData as $key => $city) {
        if ($city['country'] === $country->getCode()) {
            $citiesArray[] = $city['name'];
        }
    }

    $citiesText = '["'.implode('", "', $citiesArray).'"]';
    $countryText .= "{$citiesText}][\$type],".PHP_EOL;
    file_put_contents('countriesText', $countryText);
    file_put_contents('citiesText', $citiesText);
    var_dump($citiesText);
}

var_dump($countryText);
// $jsonString = file_get_contents($path);
// var_dump($jsonString);
//
// $jsonData = json_decode($jsonString, true);
// var_dump($jsonData);

// try {
// } catch (JsonException $e) {
//    echo $e->getMessage();
//    echo "WTF!";
// }
// $countries = json_decode(file_get_contents(__DIR__ . '/cities.json'), true);

// foreach ($countries as $country) {
//    echo $country->lng;
// }

// var_dump($jsonData);
