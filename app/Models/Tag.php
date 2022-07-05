<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    protected $table = 'tags';
    public $timestamps = false;
    

    public function comic()
    {
        return $this->belongsToMany(Comic::class);
    }
}