<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site\Produto;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $table = 'produto_detalhes';
    protected $fillable = ['comprimento', 'largura', 'altura', 'produto_id'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
}
