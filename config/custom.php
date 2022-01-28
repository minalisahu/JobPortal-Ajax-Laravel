<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Permission System
      |--------------------------------------------------------------------------
      |
      | This value is permission provider of your application. This value is used when the
      | framework needs to create location distance.
      |
     */

    'access_system' => env('ENABLE_PERMISSION', false),

    'hurtigruten_key' => env('HURTIGRUTEN_USERKEY', ''),

    'hurtigruten_url' => env('HURTIGRUTEN_ENDPOINT', ''),

    'hurtigruten_currency' => env('HURTIGRUTEN_CURRENCY', ''),

    'hurtigruten_market_id' => env('HURTIGRUTEN_MARKETID', ''),

    'hurtigruten_agency_id' => env('HURTIGRUTEN_AGENCYID', ''),

    'currency_exchange_access_key' => env('CURRENCY_EXCHANGE_ACCESSKEY', ''),

    'currency_exchange_endpoint' => env('CURRENCY_EXCHANGE_ENDPOINT', ''),

    'tbo_hotel_username' => env('TBO_HOTEL_USERNAME', ''),

    'tbo_hotel_password' => env('TBO_HOTEL_PASSWORD', ''),

    'tbo_hotel_service_url' => env('TBO_HOTEL_SERVICE_URL', ''),

    'bokun_access_key' => env('BOKUN_ACCESSKEY', ''),

    'bokun_secret_key' => env('BOKUN_SECRETKEY', ''),

    'bokun_endpoint' => env('BOKUN_ENDPOINT', ''),


];
