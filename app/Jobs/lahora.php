<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class lahora implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    
    protected $mensaje;
    protected $sleep;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mensaje, $sleep)
    {
        $this->mensaje = $mensaje;
        $this->sleep = $sleep;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep($this->sleep);
        $hora = new \DateTime();
        file_put_contents('tests/out.txt', $this->mensaje.PHP_EOL.$hora->format(\DateTime::W3C));
    }
}
