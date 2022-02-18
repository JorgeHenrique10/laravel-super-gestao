<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site\Pedido;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = ['nome'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id', 'id');
    }
}
