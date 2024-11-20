<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'titolo',
        'descrizione',
        'data',
        'stato',
        'operatori_id',
    ];
    // Definisci la relazione many-to-one con la categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Relazione inversa con Operatore
    public function operatore()
    {
        return $this->belongsTo(Operatore::class, 'operatori_id');
    }
}
