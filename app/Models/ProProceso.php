<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProProceso
 *
 * @property $pro_id
 * @property $pro_prefijo
 * @property $pro_nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property DocDocumento[] $docDocumentos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProProceso extends Model
{
    
     protected $table = 'pro_proceso';
protected $primaryKey = 'pro_id';
    
    protected $fillable = ['pro_id','pro_prefijo','pro_nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docDocumentos()
    {
        return $this->hasMany('App\DocDocumento', 'doc_id_proceso', 'pro_id');
    }
    

}
