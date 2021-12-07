<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // every new model created has access to the factory method Post::factory()

    protected $with = ['category', 'author'];

    protected $columns = ['id', 'user_id', 'category_id', 'slug', 'thumbnail', 'title', 'excerpt', 'body', 'created_at', 'updated_at', 'published_at'];

    public function scopeExclude($query, $value = [])
    {
        return $query->select(array_diff($this->columns, (array) $value));
    }
//    protected $guarded = [];

    public function scopeFilter($query, array $filters){
        // using 'when' keyword: takes in a condition and a callback function
        // callback function takes in the query that's being build and the condition
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where(fn($query) =>
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query
                ->whereHas('category', fn($query) =>
                    $query->where('slug', $category)
                )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
        $query
            ->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );

        // using the whereExists method : more closely resembles the SQL query
//        $query->when($filters['category'] ?? false, fn($query, $category) =>
//            $query
//                ->whereExists(fn($query) =>
//                    $query->from('categories')
//                        ->whereColumn('categories.id', 'posts.category_id')
//                        ->where('categories.slug', $category))
//        );

//        if($filters['search'] ?? false){
//            $query
//                ->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
//        }
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}

