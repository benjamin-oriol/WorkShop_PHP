# WorkShop_PHP
* Clone the project

```
  git clone https://github.com/benjamin-oriol/WorkShop_PHP.git
```
Then move in.

* Install dependencies

```
  composer install
```

* Create the database

```
  php bin/console doctrine:database:create
```
You may need to modify the DATABASE_URL in the .env (or .env.local ...)

* Execute the migrations

```
  php bin/console doctrine:migrations:migrate
```

* Load the fixtures

```
  php bin/console doctrine:fixtures:load
```
