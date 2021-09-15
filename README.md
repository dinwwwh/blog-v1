# Blog version 1

- nothing

## Introduce

- Web used laravel 8.
- Web wrote for blogger where blogger can up load your post.

## Requirements

- php version 8.0 upward.
- meilisearch or algolia engine search.

### Meilisearch

If you use meilisearch engine, please run this command for each searchable models. To setup filterable attributes for meilisearch.

``` command
    php artisan meilisearch:setup App\Models\Post App\Models\Tag
```
