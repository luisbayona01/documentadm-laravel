<?php 
use Illuminate\Database\Seeder;
use App\Models\ProProceso;

class ProcesoSeeder extends Seeder
{
    public function run()
    {
        $procesos = [
            ['nombre' => 'Ingeniería', 'prefijo' => 'ING'],
            ['nombre' => 'Recursos Humanos', 'prefijo' => 'RRHH'],
            ['nombre' => 'Marketing', 'prefijo' => 'MKT'],
            ['nombre' => 'Finanzas', 'prefijo' => 'FIN'],
            ['nombre' => 'Producción', 'prefijo' => 'PROD'],
        ];

        foreach ($procesos as $proceso) {
            ProProceso::create($proceso);
        }
    }
}
