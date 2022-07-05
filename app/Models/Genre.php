<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model {
    protected $table = 'genres';
    public $timestamps = false;
    
    public function comic()
    {
        return $this->hasMany(Comic::class);
    }
}