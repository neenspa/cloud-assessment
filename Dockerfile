FROM webdevops/php-apache:alpine-php5

ENV WEB_DOCUMENT_INDEX=about.php

HEALTHCHECK --interval=30s --timeout=30s --start-period=5s --retries=3 CMD [ "ping localhost" ]

COPY . /app

VOLUME [ "/opt/docker/etc/httpd/ssl" ]
# VOLUME [ "/opt/docker/etc/httpd/vhost.ssl.conf" ]
# VOLUME [ "/opt/docker/etc/httpd/vhost.conf" ]

EXPOSE 80
EXPOSE 443