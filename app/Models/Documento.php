<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $fillable = [
    'uuid',
    'nombre',
    'descripcion',
    'area_id',
    'fecha_vigencia',
    'tipodoc_id',
    'estado',
    'version',
    'urlpdf'
];

/* public function __construct($nombre,$descripcion,$area_id,$tipodoc_id)
    {
        $this->nombre = $nombre;
		$this->descripcion = $descripcion;

        $this->area_id = $area_id;

        $this->tipodoc_id = $tipodoc_id;


    } */
    use HasFactory;
}
