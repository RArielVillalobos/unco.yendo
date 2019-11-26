@component('mail::message')
# Hola {{$traveler->user->name}}
Ya estas disfrutando del viaje??, te pedimos que hagas click en el siguiente botón para la confirmacion
@component('mail::button',['url' => route('confirmar.arriba',$traveler->id)])
Confirmar mi cuenta
@endcomponent
Gracias,<br>
{{ config('app.name') }}
@endcomponent