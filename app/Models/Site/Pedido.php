<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site\Produto;
use App\Models\Site\Cliente;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    protected $fillable = ['cliente_id'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot(['created_at', 'quantidade', 'id']);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }
}
