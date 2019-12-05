@extends('theme.back.layout.admin')

@section('title','Viajes')

@section('head')
@endsection




@section('content')
    <div class="container">
        @if(session("mensaje"))
            <div class="card-panel light-green lighten-4">{{session('mensaje')}}</div>
        @endif

        <div class="row">
            <div class="col s12 m7 offset-m2">

                <div class="card horizontal">
                    <div class="card-image">
                        <img src="{{asset('images/mapa.jpg')}}">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <div class="row flight-state-wrapper">
                                <div class="col s5 m5 l5 center-align">
                                    <div class="flight-state">
                                        <p class="margin">{{$viaje->calle}} {{$viaje->numero}}</p>
                                        <p class="ultra-small">{{$viaje->ciudad}}</p>
                                    </div>
                                </div>
                                <div class="col s2 m2 l2 center-align">
                                    <i class="material-icons" style="font-size: 2.5rem">directions_car</i>
                                </div>
                                <div class="col s5 m5 l5 center-align">
                                    <div class="flight-state">
                                        <p class="margin">Unco</p>
                                        <p class="ultra-small">Neuquén</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6 m6 l6 center-align">
                                    <div class="flight-info">
                                        <p class="small" style="font-size: 0.8rem !important">
                                            <span class="grey-text text-lighten-4">Barrio:</span>{{$viaje->barrio}}</p>
                                        <p class="small"  style="font-size: 0.8rem !important">
                                            <span class="grey-text text-lighten-4">Disponibilidad:</span> 3/4</p>
                                    </div>
                                </div>
                                <div class="col s6 m6 l6 center-align flight-state-two">
                                    <div class="flight-info">
                                        <p class="small">
                                            @php
                                             $horaActual=\Carbon\Carbon::now();
                                                echo 'actual'. $horaActual;
                                                echo '<br>';
                                                $diferencia= $horaActual->diffInMinutes($viaje->hora);
                                                echo $diferencia;
                                            @endphp
                                            <span class="grey-text text-lighten-4">Hora:</span>{{$viaje->hora}}</p>

                                    </div>
                                </div>
                                {{-- PUNTUAR USUARIOS--}}
                                @if($viaje->estado==\App\Trip::FINALIZAFO)
                                    <div class="row">



                                                <div class="col s12 m12">
                                                    <div class="card horizontal">
                                                        <div class="card-image" style="width: 20%">
                                                            <img src="/images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
                                                        </div>
                                                        <div class="card-stacked">
                                                            <p>{{$viaje->user->apellido }} {{$viaje->user->nombre}}</p>
                                                            <div class="card-action">
                                                                <a href="#modal1" class="waves-effect waves-light btn modal-trigger">Puntuar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                    </div>
                                    <div id="modal1" class="modal">
                                        <div class="modal-content">
                                            @include('puntuacion.content',['viaje'=>$viaje,'user_to'=>$viaje->user->id])

                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <div class="row">
                                <br>
                                @php
                                   $traveler= auth()->user()->viajes->firstWhere('trip_id','=',$viaje->id);
                                @endphp
                                @if($traveler->checking_id!=null)
                                       <p>Checking Realizado</p>
                                @endif

                                @if($diferencia>60 && $horaActual->toDateString()==$viaje->fecha && $traveler->estado==\App\Traveler::PENDIENTE)
                                    <form action="{{route('confirmar')}}" method="post">
                                        @csrf
                                        <input name="traveler_id" value="{{$traveler->id}}">
                                        <button onclick="return confirm('Esta seguro que desea hacer ckecking?')" class="waves-effect waves-light btn">Confirmar viaje</button>
                                    </form>


                                @endif

                                @if($traveler->checking!=null && $traveler->estado!=\App\Traveler::ARRIBA)
                                    <form method="get" action="{{route('confirmar.arriba',$traveler->id)}}">
                                        @csrf
                                        <input type="hidden" name="traveler_id" value="{{$traveler->id}}">
                                        <button class="waves-effect waves-light btn" type="submit">Ya me subí al vehiculo</button>
                                    </form>

                                @endif

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
