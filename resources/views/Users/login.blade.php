@extends('Templates.base')

@section('contenido')


<div class="card w-90 w-lg-25 mx-auto mt-5">
    <form class="card-body" method="post" action="{{route('login')}}">

        <div class="w-100 d-flex justify-content-center mb-4">
            <img alt="Logo Cervepar" src="{{asset('img/logo.png')}}" class="w-75"/>
        </div>

        <h3 class="text-center text-muted mb-3">Ingreso al Sistema</h3>

        @csrf
        
        <x-forms.input type="number" label="Numero de documento" name="document" class="mb-3"/>

        <x-forms.input type="password" label="Contraseña de usuario" name="password" class="mb-3"/>

        <input type="submit" value="Ingresar" class="btn btn-myColor bg-gradient shadow mx-auto"/>

    </form>
</div>

@endsection