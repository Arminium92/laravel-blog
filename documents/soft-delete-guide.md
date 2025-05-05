# Laravel Soft Delete Guide

## What is Soft Delete?
Soft delete keeps records in your database but marks them as "deleted" by adding a timestamp in the `deleted_at` column. This allows you to recover deleted data if needed.

## Implementation Steps

### 1. Create Migration Files
Run these commands in your terminal:
```bash
php artisan make:migration add_soft_deletes_to_posts_table
php artisan make:migration add_soft_deletes_to_comments_table
```

### 2. Edit Migration Files
Two files will be created in `database/migrations` with names like `YYYY_MM_DD_HHMMSS_add_soft_deletes_to_posts_table.php`. Edit them:

For posts:
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
```

For comments:
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
```
## Important Alternative!
#### Instead of creating and modifying soft delete files, you can just add ```$table->softDeletes();``` to your existing migration files. This will add the `deleted_at` column to your tables. This is the recommended way to add soft deletes to your models. 

### 3. Update Models
Add the SoftDeletes trait to your Post and Comment models:

In `app/Models/Post.php`:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    // ...existing code...
}
```

In `app/Models/Comment.php`:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    // ...existing code...
}
```

### 4. Run Migration
```bash
php artisan migrate
```

## Understanding Migration Functions
- `up()`: Adds `deleted_at` column when running `php artisan migrate`
- `down()`: Removes `deleted_at` column when running `php artisan migrate:rollback`
- `softDeletes()`: Adds nullable datetime column named `deleted_at`
- `dropSoftDeletes()`: Removes the `deleted_at` column

## Using Soft Delete Features

### In PHP Code
```php
// Soft delete a record
$post->delete();

// Force delete (permanent)
$post->forceDelete();

// Restore a soft-deleted item
$post->restore();

// Include soft-deleted records in query
Post::withTrashed()->get();

// Get only soft-deleted records
Post::onlyTrashed()->get();
```

### Using Tinker
Open Laravel Tinker:
```bash
php artisan tinker
```

Available commands:
```php
// Restore specific post
Post::withTrashed()->find(1)->restore();

// Restore all soft deleted posts
Post::onlyTrashed()->restore();

// Restore specific comment
Comment::withTrashed()->find(1)->restore();

// Restore all soft deleted comments
Comment::onlyTrashed()->restore();

// View all posts including deleted
Post::withTrashed()->get();

// View only deleted posts
Post::onlyTrashed()->get();

// Restore posts deleted in last 24 hours
Post::onlyTrashed()
    ->where('deleted_at', '>', now()->subDay())
    ->restore();
```

Exit Tinker:
```bash
exit
```

## Common Use Cases
1. **Temporary deletion**: When you want to allow users to recover deleted items
2. **Archiving**: Keep record history without permanent deletion
3. **Data analysis**: Include deleted records in statistics when needed
4. **Auditing**: Track when items were deleted

## Best Practices
1. Always use migrations to add/remove soft deletes
2. Remember to add the `SoftDeletes` trait to models
3. Consider relationships when soft deleting
4. Use `forceDelete()` carefully - it permanently removes the record