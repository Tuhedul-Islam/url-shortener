# URL Shortener

A simple URL shortener built with Laravel. This application allows users to shorten long URLs, making it easier to share and manage links.


## Features

- Shorten long URLs
- Redirect to original URLs
- Unique shortened URLs
- Basic validation for URLs
- (Optional) Click tracking and analytics


## Roadmap

- Clone the Repo
- Install the Composer
- Run the command
 ```PHP
    composer install
    php artisan key:generate
```
- Clear All cache


## Tech Stack

**Client:** HTML, CSS, Laravel Blade, JavaScript

**Server:** PHP, Laravel


## Running Tests

To run tests, run the following command

- Setup Database
```bash
  php artisan migrate
  php artisan serve
  php artisan o:c
```


## Authors

- [@Tuhedul Islam (Github)](https://github.com/Tuhedul-Islam)

## API Reference

#### Get all items

```http
  GET /
  POST /store 
  GET /{shortUrl}
```

#### API

```http
  POST /api/auth/login
  GET /api/auth/logout
  GET /api/auth/users
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |

#### Get item

```http
  GET /api/items/${id}
```

| Parameter | Type      | Description                       |
| :-------- |:----------| :-------------------------------- |
| `id`      | `integer` | **Required**. Id of item to fetch |


