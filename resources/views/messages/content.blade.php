<h5>Mensajes: {{$viaje->user->apellido}} {{$viaje->user->nombre}}</h5>
<hr>
<div class="container">
    @if($viaje->conversation!=null)
        @forelse($viaje->conversation->messages as $message)
            @if($message->user_id!=auth()->user()->id)
                <div class="row">
                    <div class="col m1">
                        <img width="50px" src="../images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">

                    </div>
                    <div class="col m11">
                        <div class="card-panel deep-purple lighten-5">{{$message->mensaje}}</div>

                    </div>


                </div>

            @else
                <div class="row">
                    <div class="col m1">
                        <img width="50px" src="../images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">

                    </div>
                    <div class="col m11">
                        <div class="card-panel   blue lighten-3">{{$message->mensaje}}</div>

                    </div>
                    <br>
                </div>


            @endif


        @empty

        @endforelse

    @endif


    <form action="{{route('mensaje.store')}}" method="post">
        <input type="hidden" name="trip_id" value="{{$viaje->id}}">
        @if($viaje->conversation!=null)
            <input type="hidden" name="conversation_id" value="{{$viaje->conversation->id}}">
         @endif
        @csrf
        <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" name="mensaje" class="materialize-textarea"></textarea>
                        <label for="textarea1">Escribe un mensaje</label>
                    </div>
                </div>

        </div>
        <div class="row">
            <div class="col m-12">
                <button class="btn waves-effect orange accent-3 right" type="submit">Enviar mensaje</button>


            </div>

        </div>

    </form>


</div>
