<div class="container">
    <form method="post" action="/puntuar">
        @csrf
        <input type="hidden" value="{{$user_to}}" name="user_to">
        <input type="hidden" name="trip_id" value="{{$viaje->id}}">

        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea1" name="comentario" class="materialize-textarea" required></textarea>
                <label for="textarea1">Breve descripción del usuario a puntuar</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="puntaje" required>
                    <option value="" disabled selected>Puntaje</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <label>Putación</label>
            </div>

        </div>
        <div class="row">
            <div class="col m-12">
                <button class="btn waves-effect orange accent-3 right" type="submit">Puntuar</button>


            </div>

        </div>
    </form>

</div>