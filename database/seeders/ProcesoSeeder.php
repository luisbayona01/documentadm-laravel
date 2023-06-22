<?php 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProcesoSeeder extends Seeder
{
    public function run()
    {
        $procesos = [
            ['pro_nombre' => 'Ingeniería', 'pro_prefijo' => 'ING'],
            ['pro_nombre' => 'Recursos Humanos', 'pro_prefijo' => 'RRHH'],
            ['pro_nombre' => 'Marketing', 'pro_prefijo' => 'MKT'],
            ['pro_nombre' => 'Finanzas', 'pro_prefijo' => 'FIN'],
            ['pro_nombre' => 'Producción', 'pro_prefijo' => 'PROD'],
        ];

        foreach ($procesos as $proceso) {
            DB::table('pro_proceso')->insert($proceso);
        }
    }
}
