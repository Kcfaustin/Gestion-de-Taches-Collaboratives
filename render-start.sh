#!/usr/bin/env bash
set -euo pipefail

# Ensure storage dirs exist
mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache

# Run migrations (ignore if no DB configured yet)
php artisan migrate --force || true

# Start services (handled by base image)
exec /opt/docker/bin/entrypoint supervisord


