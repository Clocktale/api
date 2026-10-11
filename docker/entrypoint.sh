#!/bin/bash
set -e

DB_HOST="${DB_HOST:-mysql}"
DB_PORT="${DB_PORT:-3306}"
DB_USERNAME="${DB_USERNAME:-laraveluser}"
DB_PASSWORD="${DB_PASSWORD:-secret}"

echo "Aguardando MySQL em ${DB_HOST}:${DB_PORT}..."
until php -r "
    try {
        new PDO(
            'mysql:host=${DB_HOST};port=${DB_PORT}',
            '${DB_USERNAME}',
            '${DB_PASSWORD}'
        );
        exit(0);
    } catch (Throwable \$e) {
        exit(1);
    }
" 2>/dev/null; do
    sleep 2
done
echo "MySQL disponível."

if [ ! -f vendor/autoload.php ]; then
    echo "Instalando dependências do Composer..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

exec docker-php-entrypoint "$@"
