@extends('view_layout.app')

@push('styles')
<link href="{{ asset('css/mozo_mesa.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush

@section('content')
<div class="mozo-header">
    <a href="{{ route('vista.mozo_historial') }}" class="mozo-header-back">
        <span class="mozo-header-back-icon">&#8592;</span>
    </a>
    <div class="mozo-header-content">
        <div class="mozo-header-title">Nuevo Pedido</div>
        <div class="mozo-header-subtitle">Mozo</div>
    </div>
</div>

<div class="container py-20">
    <div class="d-flex justify-content-center">
        <div class="bg-dark rounded-4 p-4" style="width: 400px;">
        <h5>Elija una mesa:</h5>
            <div class="row row-cols-3 g-3">
                @foreach($mesas as $mesa)
                    @php
                        $info = $mesasInfo[$mesa->id_mesa] ?? ['ocupada' => false, 'cantidadDetalles' => 0];
                    @endphp
                    <div class="col d-flex justify-content-center">
                        @if(!$info['ocupada'])
                            <a href="{{ route('vista.mozo_pedido_mesa', $mesa->id_mesa) }}" class="btn p-0 border-0 bg-transparent" style="outline:none;">
                        @else
                            <button class="btn p-0 border-0 bg-transparent" disabled style="outline:none;">
                        @endif
                            <div class="rounded-circle d-flex flex-column align-items-center justify-content-center position-relative"
                                 style="width:70px; height:70px;font-weight:bold; font-size:1.3rem;">
                                {{ $mesa->numero_mesa }}
                                @if($info['ocupada'])
                                    <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill bg-danger">
                                        {{ $info['cantidadDetalles'] }}
                                    </span>
                                @endif
                            </div>
                        @if(!$info['ocupada'])
                            </a>
                        @else
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
