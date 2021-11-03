#!/bin/bash

docker container run --rm -v $(pwd)/src/main/php/sisaih01:/app/ php:7.4-cli php app/sisaih01.php
