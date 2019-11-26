<?php

namespace App\Console\Commands;

use App\Mail\SendTopVehicle;
use App\Traveler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ArribaVehiculo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arriba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pregunta al usuario si ya se subio al vehiculo';

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
            ->where('travelers.estado','=',Traveler::CONFIRMADO)
            ->get();

        foreach ($viajantes as $viajante){

            if($fechaActual->toTimeString()>$viajante->hora){
                $traveler=Traveler::findOrFail($viajante->id);
                Mail::to($traveler->user->email)->send(new SendTopVehicle($traveler));


            }
        }
    }
}
