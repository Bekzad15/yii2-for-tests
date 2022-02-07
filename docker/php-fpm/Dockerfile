FROM usanjar/yii2-php-fpm:latest

ARG GITHUB_AUTH_TOKEN
RUN docker-php-ext-install -j$(nproc) gd
RUN composer config -g github-oauth.github.com "${GITHUB_AUTH_TOKEN}"
