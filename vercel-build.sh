#!/bin/bash

echo "Building Laravel application..."

# Navigate to Laravel directory
cd cms

# Install Composer dependencies
composer install --no-dev --optimize-autoloader

# Generate app key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --show
    echo "Please set the generated key in your Vercel environment variables as APP_KEY"
fi

# Run migrations if needed (be careful with this in production)
# php artisan migrate --force

# Build assets with npm if needed
npm ci
npm run build

echo "Build completed!" 