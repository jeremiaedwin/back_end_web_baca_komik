<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model {
    protected $table = 'comics';
    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_comic_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }
    
}