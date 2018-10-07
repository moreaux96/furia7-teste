<?php

namespace App\Console\Command;

use Illuminate\Console\Command;


class SomaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'furia:soma{numeros}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command para somar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $numeros = $this->argument('numeros');
        $numeros = preg_replace("/[^0-9]/", "+", $numeros);
        if(empty($numeros)){
            $numeros = rand(0,100) .'+'. rand(0,100). '+' . rand(0,100);
        }
        $numeros_separados = explode('+', $numeros);
        $soma = 0;
        foreach($numeros_separados as $number){
            $soma += $number;
        }
        dd($soma);
    }
}
