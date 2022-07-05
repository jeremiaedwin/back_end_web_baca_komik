<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Author extends Model {
    protected $table = 'author_comics';
    public $timestamps = false;
    
    public function comic()
    {
        return $this->hasMany(Comic::class, 'author_comic_id');
    }
}