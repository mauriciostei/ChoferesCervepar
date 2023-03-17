@extends('Templates.admin')

@section('cuerpo')

    <h5 class="mb-4"> Viaje {{$viaje}} del chofer: {{$chofer->nombre}} </h5>

    <form method="POST" action="{{route('postPlanes')}}">

        <div class="card">
            <div class="card-body">
    
                @csrf
    
                <x-forms.input type="hidden" name="choferes_id" value="{{$chofer->id}}"/>
    
                <x-forms.input type="hidden" name="planes_id" value="{{$planes->id}}"/>
    
                <x-forms.input type="hidden" name="viaje" label="Viaje" value="{{$viaje}}"/>
    
    
                <div class="form-floating mb-3">
                    <select name="moviles_id" class="form-control">
                        @forelse($moviles as $movil)
                            <option value="{{$movil->id}}"> {{$movil->chapa}} </option>
                        @empty
                        
                        @endforelse
                    </select>
                    <label class="form-label">Movil</label>
                </div>
    
                <input type="submit" value="Guardar" class="btn btn-myColor shadow"/>
            </div>
        </div>



    </form>

@endsection