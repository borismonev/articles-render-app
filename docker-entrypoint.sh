#!/bin/bash

# Fail fast if any command fails
set -e

echo "Waiting for database..."
# Simple check to ensure we can connect to database
until php artisan tinker --execute="DB::connection()->getPdo();" 2>/dev/null; do
    echo "Database not ready, waiting..."
    sleep 2
done

echo "Database ready, checking application key..."

# Generate app key if it doesn't exist
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "" ]; then
    echo "Generating application key..."
    php artisan key:generate --force
else
    echo "Application key already set."
fi

echo "Running migrations..."
# Run migrations
php artisan migrate:fresh --force

echo "Seeding database with default admin account..."
# Run seeders (will create default admin if it doesn't exist)
php artisan db:seed --force

echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting Apache..."
exec apache2-foreground
