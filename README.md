George Wielianto - 535220090




PANDUAN INSTALASI
-cp .env.example .env
-composer install
-php artisan migrate:fresh --seed

Dalam file .env edit bagian database menjadi pgsql seperti contoh dibawah:
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=db
DB_USERNAME=postgres
DB_PASSWORD=


