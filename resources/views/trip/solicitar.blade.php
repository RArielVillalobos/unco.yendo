@extends('theme.back.layout.admin')

@section('title','Solicitar Viaje')

@section('head')
@endsection




@section('content')
    <div class="container">
        <form action="{{route('trip.viajes')}}" method="get">
            @csrf
            <div class="row">
                <div class="col m4 offset-m4">
                    <input type="date" name="fecha">
                </div>



            </div>
            <div class="row">
                <div class="col m4 offset-m4">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Buscar
                        <i class="material-icons right">send</i>
                    </button>
                </div>


            </div>

        </form>

        <br>

    </div>



@endsection
@section('scripts')
    <script>
        $(document).ready(function(){ //1- document is ready
            $('#add').click(function(){
                $("#createtextbox").append('<input type="text" class="datepicker" value="" />');  // you have added the textbox
                $('.datepicker').datepicker(); // call calender again this time it will pick the new added textbox
            });

        });
    </script>
@endsection

