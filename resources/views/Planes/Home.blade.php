@extends('Templates.admin')

@section('cuerpo')

    <h5 class="mb-4"> Bienvenido! {{$chofer->nombre}} </h5>

    <div class="d-flex justify-content-evenly">
        <a href="{{route('editPlanes', 1)}}" class="btn btn-myColor shadow mb-4">Editar Viaje 1</a>
        <a href="{{route('editPlanes', 2)}}" class="btn btn-myColor shadow mb-4">Editar Viaje 2</a>
    </div>

    @forelse($chofer->planes as $plan)

        <div class="card mb-3">
            <div class="card-body">
                <p>
                    Viaje planificado: {{$plan->pivot->viaje}}
                </p>
                <p>
                    Movil Planificado: {{$movil->find($plan->pivot->moviles_id)->chapa}}
                </p>
            </div>
        </div>

    @empty
        <h4 class="text-center text-muted">Sin viajes planificados el dia de hoy</h4>
    @endforelse

@endsection