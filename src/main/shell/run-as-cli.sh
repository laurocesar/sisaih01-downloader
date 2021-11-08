#!/bin/sh

docker container run --rm -v $(pwd):/app alpine:3.14 /app/sisaih01.sh
