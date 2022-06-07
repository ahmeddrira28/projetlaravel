<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomtype','imagetype'
        ];
    public function marque()
    {
    return $this->hasMany(Marque::class ,"typeID");
     }
     public function computer()
    {
    return $this->hasMany(Computer::class,"typeID");
    }
    

            
}
