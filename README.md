# onlinetests-withrajaongkir-api
 
## Support
- php 8.1
- laravel 10

## Installation and Configuration
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
'roa_url' => env('RAJAONGKIR_API_URL'),
'roa_key' => env('RAJAONGKIR_API_KEY'),
'roa_src' => (bool) env('RAJAONGKIR_SOURCE', false),
```

## Sprint 2
- Search data source for provinces & cities can be through database or direct Rajaongkir API (swapable implementation):
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/provinces?id={province_id}
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/cities?id={city_id}

- Login API so that the search endpoint can only be accessed by authorized users
  Use Laravel Tinker to run Factory to Create Dummy Data
```bash
php artisan tinker
```
and running command 
```bash
\App\Models\User::factory()->count(3)->create();
```

- REST API for province & city search
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/provinces?id={province_id}
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/cities?id={city_id}
