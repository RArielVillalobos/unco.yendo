@extends('theme.back.layout.admin')

@section('title','Unco.Yendo')

@section('head')


@endsection

@section('content')
    <crear-viaje :usuario="{{ json_encode(auth()->user()) }}">

    </crear-viaje>z


@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        setTimeout(function(){
            $('select').material_select();
        },2000);

    });
</script>
@endsection