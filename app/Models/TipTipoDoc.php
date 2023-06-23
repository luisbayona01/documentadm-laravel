<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class TipTipoDoc
 *
 * @property $tip_id
 * @property $tip_nombre
 * @property $tip_prefijo
 * @property $created_at
 * @property $updated_at
 *
 * @property DocDocumento[] $docDocumentos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipTipoDoc extends Model
{
    
   

 protected $table = 'tip_tipo_doc';
protected $primaryKey = 'tip_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tip_id','tip_nombre','tip_prefijo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docDocumentos()
    {
        return $this->hasMany('App\Models\DocDocumento', 'doc_id_tipo', 'tip_id');
    }
    

}
