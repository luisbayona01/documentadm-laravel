<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use  DB;

class TipoDocumentoSeeder extends Seeder
{
    public function run()
    {
        $tiposDocumentos = [
            ['tip_nombre' => 'Instructivo', 'tip_prefijo' => 'INS'],
            ['tip_nombre' => 'Informe', 'tip_prefijo' => 'INF'],
            ['tip_nombre' => 'Presentación', 'tip_prefijo' => 'PRE'],
            ['tip_nombre' => 'Contrato', 'tip_prefijo' => 'CTR'],
            ['tip_nombre' => 'Planificación', 'tip_prefijo' => 'PLA'],
        ];

        foreach ($tiposDocumentos as $tipoDocumento) {
            DB::table('tip_tipo_doc')->insert($tipoDocumento);
        }
    }
}