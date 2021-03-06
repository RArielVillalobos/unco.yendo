<?php

namespace App\Console\Commands;

use App\Traveler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BajaChecking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'NoConfirmChecking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se dan de baja a los usuarios que no hicieron el checking a tiempo';

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
            ->where('travelers.estado','=',Traveler::PENDIENTE)
            ->get();

        foreach ($viajantes as $viajante){
            $diferencia= $fechaActual->diffInMinutes($viajante->hora);
            if($diferencia<60){
                $traveler=Traveler::findOrFail($viajante->id);
                $traveler->estado=Traveler::BAJA;
                $traveler->save();

            }
        }


    }
}
