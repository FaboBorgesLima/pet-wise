## Development using docker

It's recommended that you use Docker for development.

### Requirements

-   Docker 27

### Step by step

Installing dependencies using docker:

1. Run the following command to install dependencies:

```shell
docker run --rm -v $(pwd)/app:/app composer install
```

1. Copy the example environment file:

```shell
cp .env.example .env
```

1. Run the following command to start the application:

```shell
docker compose up --watch
```
