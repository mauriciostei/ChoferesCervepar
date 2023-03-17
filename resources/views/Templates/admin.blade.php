@extends('Templates.base')

@section('contenido')

<div class="navbar navbar-expand-lg bg-light border-bottom">
    <div class="container-fluid">
        <a href="{{route('home')}}">
            <img alt="logo" src="{{asset('img/logo.png')}}" width="100"/>
        </a>
        <a data-bs-toggle="offcanvas" href="#offCanvasDerecho" role="button" aria-controls="offCanvasDerecho">
            <img alt="Avatar de Usuario" class="rounded-circle" width="30" src="{{asset('img/avatar.png')}}"/>
        </a>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offCanvasDerecho" aria-labelledby="offCanvasDerechoLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offCanvasDerechoLabel">Menu Usuarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p>Con el siguiente botón podrá cerrar su sistema lo cual lo llevara de nuevo a la venta para ingresar al sistema.</p>
        <a href="{{route('logout')}}" class="btn btn-myColor shadow">Cerrar Sistema</a>
        <hr/>
        <a href="{{route('passwordChange')}}" class="btn btn-myColor shadow">Cambio de Contraseña</a>
    </div>
</div>

<div class="p-3">
    @yield('cuerpo')
</div>

@endsection