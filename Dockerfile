FROM celaraze/php-web:latest

RUN git clone https://gitee.com/celaraze/chemex.git /var/www/chemex/ && \
    cd /var/www/chemex && \
    git submodule init && \
    git submodule update
COPY .env.docker /var/www/chemex/.env
WORKDIR /var/www/chemex/

RUN chown -R www-data:www-data /var/www/chemex && \
    chmod -R 755 /var/www/chemex && \
    chmod -R 777 /var/www/chemex/storage
RUN rmdir /var/www/html && \
    ln -s /var/www/chemex/public /var/www/html

COPY docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh

entrypoint ["/docker-entrypoint.sh"]
