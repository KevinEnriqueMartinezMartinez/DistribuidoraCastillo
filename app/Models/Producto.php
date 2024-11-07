<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public function categoria() {
        return $this->belongsTo(cat_product::class, 'id_categoria');
    }
    public function proveedor() {
        return $this->belongsTo(proveedores::class, 'id_proveedor');
    }
    public function bodega() {
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }
}
