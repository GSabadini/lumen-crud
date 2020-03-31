<h1 align="center">Welcome to Laravel Auth 👋</h1>

## Client repository

- [Vue Crud](https://github.com/GSabadini/vue-crud)

## Getting Started

- These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- What things you need to install the software and how to install them

```
Docker and docker-compose
```

### Installing

- Step by step

```
docker-compose up -d
```

```
docker-compose exec devapp bash
```

```
composer install
```

```
create .env through env.example
```

```
php artisan migrate
```

## Running the tests

```
docker-compose exec devapp bash
```
```
vendor/bin/phpunit --filter Customer
```
