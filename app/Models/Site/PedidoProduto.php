<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;
    protected $table = 'pedido_produtos';
    protected $fillable = ['produto_id', 'pedido_id'];
}
