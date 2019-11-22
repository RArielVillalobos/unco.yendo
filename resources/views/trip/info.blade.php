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
                                            <span class="grey-text text-lighten-4">Llegada:</span> 08.50</p>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
