<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site\ProdutoDetalhe;
use App\Models\Site\Fornecedor;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe()
    {
        return $this->hasOne(ProdutoDetalhe::class, 'produto_id', 'id');
    }
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
    }
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_produtos', 'produto_id', 'pedido_id');
    }
}
