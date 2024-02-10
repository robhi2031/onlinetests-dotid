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
  - Test using Talent Api Tester or Postman: [POST] https://onlinetests.pronext.id/public/api/login?email={email}&password={password}
  - Use login token for Authorization on [GET] https://onlinetests.pronext.id/public/search/provinces?id={province_id} dan [GET] https://onlinetests.pronext.id/public/search/cities?id={city_id}

If there are problems trying to log in as a user, try creating a passport token.
running command 
```bash
php artisan passport:install
```
Then try the API Login user again


- Unit test / API test agar web service tetap reliable & maintainable
  - Use command ``` php artisan make:test ProvinceCityApiTest ``` for unit test the province & cities search api.
  - Use comand ``` php artisan make:test UserLoginApiTest ``` for unit test the User Auth unit test api
