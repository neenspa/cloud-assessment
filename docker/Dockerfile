FROM webdevops/php-nginx:alpine-php5

USER application

ENV WEB_DOCUMENT_INDEX=about.php

HEALTHCHECK --interval=30s --timeout=30s --start-period=5s --retries=3 CMD [ "ping localhost" ]

COPY ../ /app
EXPOSE 80