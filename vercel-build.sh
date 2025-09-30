#!/bin/bash

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node.js dependencies
npm install

# Build assets
npm run build

# Set proper permissions
chmod -R 755 storage bootstrap/cache
