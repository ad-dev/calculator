FROM php:8.3.3-alpine
ARG REPO_NAME
RUN curl -Ss getcomposer.org/installer -o cs && php ./cs --install-dir=bin --filename=composer
RUN composer require symfony/requirements-checker && composer remove symfony/requirements-checker
RUN apk add --no-cache bash
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash
RUN apk add symfony-cli
RUN composer create-project symfony/skeleton ${REPO_NAME}
WORKDIR  /${REPO_NAME}
RUN composer require symfony/test-pack
RUN composer install
COPY ./src/ /${REPO_NAME}/src
COPY .env /${REPO_NAME}/.env
COPY .env.test /${REPO_NAME}/.env.test
COPY phpunit.xml /${REPO_NAME}/phpunit.xml
WORKDIR  /${REPO_NAME}
