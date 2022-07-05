<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comic_pic extends Model {
    protected $table = 'comic_pics';
    public $timestamps = false;
    
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}