<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site\Produto;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'email', 'uf'];

    public function produto()
    {
        return $this->hasMany(Produto::class, 'fornecedor_id', 'id');
    }
}
