<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model {
    protected $table = 'chapters';
    public $timestamps = false;
    
    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }

    public function comic_pic()
    {
        return $this->hasMany(Comic_pic::class);
    }
}