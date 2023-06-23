<?php

namespace App\Http\Controllers;

use App\Models\DocDocumento;
use App\Models\ProProceso;
Use App\Models\TipTipoDoc;
use Illuminate\Http\Request;

/**
 * Class DocDocumentoController
 * @package App\Http\Controllers
 */
class DocDocumentoController extends Controller
{
   
     public function index()
    {
        $documentos = DocDocumento::select('doc_documento.doc_id', 'doc_documento.doc_codigo', 'doc_documento.doc_nombre', 'doc_documento.doc_contenido', 'pro_proceso.pro_nombre as proceso', 'tip_tipo_doc.tip_nombre as tipodoc')
                        ->join('pro_proceso', 'pro_proceso.pro_id', '=', 'doc_documento.doc_id_proceso')
                        ->join('tip_tipo_doc', 'tip_tipo_doc.tip_id', '=', 'doc_documento.doc_id_tipo')
                        ->get();
            return response()->json(['data' => $documentos]);
    }

    public function store(Request $request)
    {  
       /*'doc_codigo','doc_nombre','doc_contenido','doc_id_proceso','doc_id_tipo'*/

 
        $documento = new DocDocumento;
        $documento->doc_nombre = $request->input('nombre');
        $documento->doc_contenido = $request->input('contenido');
        $documento->doc_id_tipo = $request->input('tipo_doc_id');
        $documento->doc_id_proceso = $request->input('proceso_id');
        
        // Generar el código único consecutivo
        $codigo = $this->generarCodigoDocumento($documento->doc_id_tipo, $documento->doc_id_proceso);
        $documento->doc_codigo = $codigo;
        
        $documento->save();

        return response()->json(['ok'=> true,'message' => 'Documento creado exitosamente']);
    }
    
     public  function mostrar($id){
    $documento = DocDocumento::find($id);
 return response()->json(['data' => $documento]);    
        
 }
    public function update(Request $request, $id)
    {       
        $documento = DocDocumento::findOrFail($id);
        $documento->doc_nombre = $request->input('doc_nombre');
        $documento->doc_contenido = $request->input('doc_contenido');
        $documento->doc_id_tipo = $request->input('doc_id_tipo');
        $documento->doc_id_proceso = $request->input('doc_id_proceso');

        // Verificar si el tipo o proceso del documento han cambiado
        if ($documento->isDirty('doc_id_tipo') || $documento->isDirty('doc_id_proceso')) {
            $codigo = $this->generarCodigoDocumento($documento->doc_id_tipo, $documento->doc_id_proceso);
               $documento->doc_codigo = $codigo;;
        }

        $documento->save();

        return response()->json(['message' => 'Documento actualizado exitosamente']);
    }

    public function destroy($id)
    {
        $documento = DocDocumento::findOrFail($id);
        $documento->delete();

        return response()->json(['message' => 'Documento eliminado exitosamente']);
    }

    // Función para generar el código único consecutivo del documento
    private function generarCodigoDocumento($tipoDocId, $procesoId)
    {
        $tipoDoc = TipTipoDoc::findOrFail($tipoDocId);
        $proceso = ProProceso::findOrFail($procesoId);

        $maxCodigo = DocDocumento::where('doc_id_tipo', $tipoDocId)
            ->where('doc_id_proceso', $procesoId)
            ->max('doc_codigo');

        if ($maxCodigo) {
            $ultimoConsecutivo = (int) substr($maxCodigo, -5);
            $nuevoConsecutivo = $ultimoConsecutivo + 1;
        } else {
            $nuevoConsecutivo = 1;
        }

        return $tipoDoc->tip_prefijo . '-' . $proceso->pro_prefijo . '-' . str_pad($nuevoConsecutivo, 5, '0', STR_PAD_LEFT);
    }


    public   function   getproceso(){
      $proceso=ProProceso::all(['pro_id', 'pro_prefijo', 'pro_nombre']);
     return $proceso;
    }
     public   function   gettipodoc(){
      $tipodoc=TipTipoDoc::all(['tip_id', 'tip_nombre', 'tip_prefijo']);
     return $tipodoc;
    }

}
