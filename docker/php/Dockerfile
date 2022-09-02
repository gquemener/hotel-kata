# https://hub.docker.com/_/php?tab=tags
FROM php:8.1-cli-alpine

# https://hub.docker.com/_/composer?tab=tags
COPY --from=composer:2.3.10 /usr/bin/composer /usr/bin/composer
