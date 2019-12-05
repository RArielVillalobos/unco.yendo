<?php

namespace App\Console\Commands;

use App\Traveler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FinalizaViaje extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'finaliza';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se finaliza un viaje';

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
        //
        $fechaActual=\Carbon\Carbon::now();
        $fecha=$fechaActual->toDateString();
        $viajantes = DB::table('travelers')
            ->join('trips', 'travelers.trip_id', '=', 'trips.id')
            ->select('*')
            ->where('fecha','=',$fecha)
            ->where('travelers.estado','=',Traveler::aceptado)
            ->get();

        foreach ($viajantes as $viajante){
            $diferencia= $fechaActual->diffInMinutes($viajante->hora);
            if($diferencia<1){
                $traveler=Traveler::findOrFail($viajante->id);
                $traveler->estado=Traveler::Finalizado;
                $traveler->save();

            }
        }


    }
}

