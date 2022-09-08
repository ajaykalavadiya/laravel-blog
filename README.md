## About Laravel Blog

Laravel Blog is simple blogging platform. User can register into site and make post. That will be visible on frontend based on publication date. Also we are importing some aticles from third party site.  

## Step to install

```
git clone https://github.com/ajaykalavadiya/laravel-blog.git
cd laravel-blog
```
Clone .env.example to .env and create a new database and set proper credential to .env
```
composer install
php artisan serve
```
Your laravel blog is running at

```
https://127.0.0.1:8000
```
## Command to import articles
```
php artisan sq1:feed:sync
```
