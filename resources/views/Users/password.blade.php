@extends('Templates.admin')

@section('cuerpo')

<form action="{{route('passwordReset', Auth::user()->id)}}" method="POST" class="card">
    <div class="card-body">
        @csrf

        <h5>Cambio de Contraseña</h5>
        <p>Con la siguiente opción podrá reiniciar su contraseña de usuario (tenga en cuenta que dicho proceso cerrara su sistema actual).</p>

        <x-forms.input name="password" type="password" class="mb-3" label="Contraseña actual"/>

        <x-forms.input name="passwordNew" type="password" class="mb-3" label="Contraseña nueva"/>

        <x-forms.input name="passwordReply" type="password" class="mb-3" label="Repetir contraseña nueva"/>

        <input type="submit" value="Cambiar Contraseña" class="btn btn-myColor shadow"/>

    </div>
</form>

@endsection