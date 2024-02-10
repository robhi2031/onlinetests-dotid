# onlinetests-withrajaongkir-api
 
## Support
- php 8.1
- laravel 10

## Installation
- You can install the package via composer:
```bash
composer install
```
- Create .env dan generate key:
```bash
cp .env.example .env
php artisan key:generate
```
- Open .env add the following line:
```env
'roa_key' => env('RAJAONGKIR_API_KEY'),
```

## Sprint 2
- In .env add
    ```env
    'roa_url' => env('RAJAONGKIR_API_URL'),
    'roa_key' => env('RAJAONGKIR_API_KEY'),
    'roa_src' => (bool) env('RAJAONGKIR_SOURCE', false),
    ```
### - Search data source for provinces & cities can be through database or direct Rajaongkir API (swapable implementation):
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/provinces?id={province_id}
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/cities?id={city_id}

### - Login API so that the search endpoint can only be accessed by authorized users
- Make sure you have installed and configured Passport for OAuth authentication in Laravel
  Perform database migration with command
```bash
php artisan migrate
```
and running command 
```bash
"php artisan app:sync-rajaongkir-data"
```

- REST API for province & city search
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/provinces?id={province_id}
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/cities?id={city_id}
