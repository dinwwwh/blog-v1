# Blog version 1

- nothing

## Introduce

- Web used laravel 8.
- Web wrote for blogger where blogger can up load your post.

## Requirements

- php version 8.0 upward.
- meilisearch or algolia engine search.
- dropbox file manager. Use to store backup files.

### Meilisearch

If you use meilisearch engine, please run this command for each searchable models. To setup filterable attributes for meilisearch.

``` command
    php artisan meilisearch:setup App\Models\Post App\Models\Tag
```

### Backup

- App use `spatie/laravel-backup` to backup. When backup you need setup mail, and optionally dropbox config.
- If you do not use `dropbox` please go to `config/backup.php` and remove `dropbox`
- Run `php artisan backup:run` to backup.
- Run `php artisan backup:clean` to clean up backup files.
- More info: <https://spatie.be/docs/laravel-backup/v7/introduction>
