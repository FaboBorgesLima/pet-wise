## Development using docker

It's recommended that you use Docker for development.

### Requirements

-   Docker 27
-   Composer 2.8 (for intellisense)

### Step by step

For getting intellisense on vscode (you can ignore this step if you dont need intellisense ) you need to install composer dependencies on app directory, so run this on /app:

```shell
composer install
```

You need to have a .env file so compose run flawless, you can copy .env.example to .env in /:

```shell
cp .env.example .env
```

You can start developing running this command on /:

```shell
docker compose up --watch
```
