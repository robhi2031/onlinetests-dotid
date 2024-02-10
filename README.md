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
'roa_key' => env('RAJAONGKIR_API_KEY'),
```

## Sprint 1
- Integrasi dengan API province & city Rajaongkir (paket starter), Online link for testing :
  - https://onlinetests.pronext.id/public/provinces
  - https://onlinetests.pronext.id/public/cities

- Artisan command for fetching API data province & city Rajaongkir
  Perform database migration with command
```bash
php artisan migrate
```
and running command 
```bash
php artisan app:sync-rajaongkir-data
```

- REST API for province & city search
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/provinces?id={province_id}
  - Test using Talent Api Tester or Postman: [GET] https://onlinetests.pronext.id/public/search/cities?id={city_id}
