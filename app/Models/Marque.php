<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $fillable = [
        'nommarque','imagemarque','typeID'
        ];
        public function types()
        {
        return $this->belongsTo(Type::class,"typeID");
        }
        public function computer()
        {
        return $this->hasMany(Computer::class,"marqueID");
        }
        
        
}
