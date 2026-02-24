#!/usr/bin/env bash
set -e

# ---------------------------------------------------------------------------
# Forloop Dev — server-side deploy script
# Runs on the Droplet whenever GitHub Actions triggers a deployment.
#
# Requirements on the server:
#   - git, composer, node/npm (>=18), php8.x-fpm, nginx, mysql
#   - The repo must already be cloned at APP_PATH
#   - A valid .env must exist at APP_PATH/.env
# ---------------------------------------------------------------------------

APP_PATH="${APP_PATH:-/var/www/forloopdev}"
PHP="${PHP:-php8.2}"          # adjust to match your installed PHP (php8.1, php8.2, etc.)
FPM_SERVICE="php8.2-fpm"      # adjust to match (check: systemctl list-units | grep php)

echo "==> Deploying to $APP_PATH"
cd "$APP_PATH"

# ---------- pull latest code ----------
echo "==> Pulling latest code..."
git fetch origin main
git reset --hard origin/main

# ---------- PHP dependencies ----------
echo "==> Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction --quiet

# ---------- JS assets ----------
echo "==> Installing npm dependencies..."
npm ci --prefer-offline --quiet

echo "==> Building frontend assets..."
npm run build

# ---------- Laravel housekeeping ----------
echo "==> Running migrations..."
$PHP artisan migrate --force

echo "==> Caching config, routes, views..."
$PHP artisan config:cache
$PHP artisan route:cache
$PHP artisan view:cache
$PHP artisan event:cache

echo "==> Restarting queue workers (if any)..."
$PHP artisan queue:restart

# ---------- reload PHP-FPM ----------
echo "==> Reloading PHP-FPM..."
sudo systemctl reload "$FPM_SERVICE"

echo "==> Deploy complete."
