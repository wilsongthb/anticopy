<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use App\ComparacionesModel;
use Storage;
use App\ArchivosModel;

class ComparacionJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $comparacion;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ComparacionesModel $comparacion)
    {
        $this->comparacion = $comparacion;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo "Procesando ".$this->comparacion->id.PHP_EOL;
        $this->comparacion->estado = 'p'; // Procesando
        $this->comparacion->save();
        
        $archivo1 = ArchivosModel::find($this->comparacion->archivo1_id);
        $archivo2 = ArchivosModel::find($this->comparacion->archivo2_id);

        $resultados = compararStrings(
            Storage::get($archivo1->path),
            Storage::get($archivo2->path),
            $this->comparacion->minimo, // minimo para registrar
            $this->comparacion->salto // velocidad
            ,true // Console mod, para desarrolladores
        );

        foreach ($resultados as $key => $value) {
            DB::table('similitudes')->insert([
                'similitud' => $value,
                'comparacion_id' => $this->comparacion->id
            ]);
        }

        echo "Finalizado ".$this->comparacion->id.PHP_EOL;
        $this->comparacion->estado = 'f'; // Finalizado
        $this->comparacion->save();
    }
}
