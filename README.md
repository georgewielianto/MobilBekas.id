George Wielianto - 535220090





PANDUAN INSTALASI

1) cp .env.example .env

2) composer install


3) Dalam file .env edit bagian database menjadi pgsql seperti contoh dibawah:
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=db
DB_USERNAME=postgres
DB_PASSWORD= *isi sesuai password anda*

4) buat database di pgamdmin anda sesuai dengan nama DB_DATABASE yaitu db

5) php artisan migrate:fresh --seed

Account untuk admin:
Email: admin@gmail.com
Password: password

Account untuk customer:
Email: customer@gmail.com
Password: password





