# sisaih01-downloader

This project reads the last release note from the Ministério da Saúde's SISAIH release file
and serves it as a http endpoint.

## How do use

Build the image:

```
docker build -t laurocesar/sisaih01-downloader
```

Run it as a Docker compose:

```
docker-compose up
```

### Use it as a command line

Run:

```
docker container run --rm -v $(pwd)/src/main/php/sisaih01:/app/ php:7.4-cli php app/sisaih01.php
```

## Deploy do Docker Hub

Just run:

```
./deploy-to-dockerhub.sh
```
