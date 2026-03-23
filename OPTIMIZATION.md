# Performance Optimization Guide

This project has been optimized for faster load times. Below are the optimizations applied and commands you can run for additional gains.

## Optimizations Applied

### 1. **Database query caching**
- `getContent()` – Frontend content cached for 1 hour; auto-invalidates when content is updated
- `getPageSections()` – Sections JSON cached for 24 hours
- `$pages` in header/footer – Navigation pages cached for 1 hour

### 2. **Code changes**
- Header uses cached `getContent()` for German courses instead of raw queries
- Image lazy loading on content sections
- Scripts use `defer` for non-blocking load

### 3. **Cache invalidation**
- Frontend content cache clears automatically when you edit content in Admin → Frontend Manage
- Page cache clears when you edit pages

## Commands to Run (Production)

From the `core` directory, run these for best performance:

```bash
# Cache configuration, routes, and views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migration for indexes (if not yet run)
php artisan migrate
```

## Development

To clear caches during development:
```bash
php artisan optimize:clear
```

## Optional: Use Redis for cache

For better performance, set in `.env`:
```
CACHE_STORE=redis
```
Then ensure Redis is installed and running.
