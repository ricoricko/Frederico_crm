# Frederico_crm

Framework: Laravel 11

Language: PHP(version 8.2 or higher)

Database: PostgreSQL

Require: Composer



# Step untuk menjalankan

1. nyalakan xampp apache % composer install di terminal 

2. Copy paste .env.example lalu rename file tersebut menjadi .env

3. Buka .env tersebut dan update/replace bagian ini pada file env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=frederico_crm
DB_USERNAME=(username_postgres_anda)
DB_PASSWORD=(password_postgres_anda)

5. Buat Database bernama frederico_crm di pgsql anda

6. lakukan "php artisan key:generate" di terminal.

7. Jalankan "php artisan migrate:fresh --seed" di terminal. 

8. Jalankan "php artisan migrate:fresh --seed"

