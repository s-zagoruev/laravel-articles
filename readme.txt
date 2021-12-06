php artisan make:model Article -fm
php artisan make:model State -fm
php artisan make:model Comment -fm
php artisan make:model Tag -fm
php artisan make:migration create_article_tag_table

php artisan migrate
php artisan db:seed
