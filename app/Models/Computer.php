<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    protected $fillable = [
        'Reference','Ecran','Processeur','Ram','Disque',
        'CarteGraphique','prix','imagecomgrandf','imagecompetitf','typeID','marqueID'
        ];
        public function types()
        {
        return $this->belongsTo(Type::class,"typeID");
        }
        public function marques()
        {
         return $this->belongsTo(Marque::class,"marqueID");
        }
}
