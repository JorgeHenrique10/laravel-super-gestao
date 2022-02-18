<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;
    protected $table = 'site_contatos';
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato_id', 'mensagem'];
}
