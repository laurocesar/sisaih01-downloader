# sisaih01-downloader

This project reads the last release note from the Ministério da Saúde's SISAIH release file
and serves it as a http endpoint.

## How do use

Build the default image:

```
docker build -t laurocesar/sisaih01-downloader .
```

Build the ARM image:

```
docker build -t laurocesar/sisaih01-downloader .
```

Run it as a Docker compose:

```
docker-compose up
```

### Use it as a command line in default architecture

Run:

```
docker container run --rm -v $(pwd)/src/main/php/sisaih01:/app/ php:7.4-cli php app/sisaih01.php
```

## Deploy do Docker Hub in ARM Archirecture

Using ARM Architecture in order to deploy at Oracle Cloud using Oracle Linux v8.

Just run:

```
./deploy-to-dockerhub.sh
```

Run as:

```
docker run laurocesar/sisaih01-downloader:TAG
```