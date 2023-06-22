<?php
use Illuminate\Database\Seeder;
use App\Models\TipTipoDoc;

class TipoDocumentoSeeder extends Seeder
{
    public function run()
    {
        $tiposDocumentos = [
            ['nombre' => 'Instructivo', 'prefijo' => 'INS'],
            ['nombre' => 'Informe', 'prefijo' => 'INF'],
            ['nombre' => 'Presentación', 'prefijo' => 'PRE'],
            ['nombre' => 'Contrato', 'prefijo' => 'CTR'],
            ['nombre' => 'Planificación', 'prefijo' => 'PLA'],
        ];

        foreach ($tiposDocumentos as $tipoDocumento) {
            TipTipoDoc::create($tipoDocumento);
        }
    }
}