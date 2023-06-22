<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DocDocumento
 *
 * @property $doc_id
 * @property $doc_codigo
 * @property $doc_nombre
 * @property $doc_contenido
 * @property $doc_id_proceso
 * @property $doc_id_tipo
 * @property $created_at
 * @property $updated_at
 *
 * @property ProProceso $proProceso
 * @property TipTipoDoc $tipTipoDoc
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DocDocumento extends Model
{
    
    
     protected $table = 'doc_documento';
    protected $primaryKey = 'doc_id';
 

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['doc_id','doc_codigo','doc_nombre','doc_contenido','doc_id_proceso','doc_id_tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proProceso()
    {
        return $this->hasOne('App\ProProceso', 'pro_id', 'doc_id_proceso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipTipoDoc()
    {
        return $this->hasOne('App\TipTipoDoc', 'tip_id', 'doc_id_tipo');
    }
    

}
