@component('mail::message')
#Hola {{$request->user->apellido}} {{$request->user->nombre}}
El usuario {{$request->trip->user->apellido}} {{$request->trip->user->nombre}} acepto tu solicitud, ahora eres parte de su viaje! disfrutalo
<br>
Saludos,
{{ config('app.name') }}
@endcomponent