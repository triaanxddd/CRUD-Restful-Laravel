## CRUD Rest API in Laravel 

this project is a simple project to work on basic CRUD (Create, Read, Update, and Delete) Post data, also in this project has login authentication with Laravel Sanctum. This project is made on Laravel 9


## Route Rest Api:
- Post: "/api/login" -- Login into system
- Get: "/api/me" -- Show self user info
- Post: "/api/posts/create" -- store post data
- Patch: "/api/posts/update/{id}" -- update post selected by id
- Delete : "/api/delete/{id}" -- delete post selected by id
- Post: "/api/posts/restore/{id} -- restore deleted post by id

- Post: "/api/comment -- comment on post
- Patch: "/api/comment/{id}" -- update comment on selected id
- Delete : "/api/comment/delete/{id}" -- delete comment on selected i

- Get: "/api/posts" -- Show all posts
- Get: "/api/posts/{id}" -- Show posts selected by id
- Get: "/api/logout" -- Logout from system

## Setup 
- Clone with github
  ```
  git clone https://github.com/triaanxddd/CRUD-Restful-Laravel
  ```
- Open Directory
```
  cd CRUD-Restful-Laravel
  ```
- And open terminal
```
composer install
```
- Edit config
```
cp .env.example .env 
```

- Migrate database and seed the data
```
php artisan key:generate
php artisan migrate
php artisan db:seed
```

- run application
```
php artisan serve
```
