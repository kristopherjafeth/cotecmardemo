<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    use HasFactory;


    protected $fillable = [
        'idbloque',
        'nombrebloque',
        'proyecto_id'
];


  protected $table = 'bloques';



  public function proyecto()
  {
      return $this->hasOne('App\Models\Proyecto', 'id', 'proyecto_id');
  }

}
