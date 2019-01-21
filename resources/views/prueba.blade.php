@extends('layouts.app')
@section('content')
@include('includes.carousel')


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                        Busqueda de vuelos
                        {{ Form::open(['route' => 'filtrado', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                            <div class="form-group">
                                {{ Form::text('origen', null, ['class' => 'form-control', 'placeholder' => 'Origen']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::text('destino', null, ['class' => 'form-control', 'placeholder' => 'Destino']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::text('fecha', null, ['class' => 'form-control', 'placeholder' => 'Prueba']) }}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Buscar') }}
                                </button>                                
                            </div>
                        {{ Form::close() }}
                    </h1>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-hover table-striped">
                    <tbody>
                        @foreach($vuelos as $vuelo)
                        <tr>
                            <td>Origen Vuelo: {{ $vuelo->origen_vuelo}}</td>
                            <td>Destino Vuelo: {{ $vuelo->destino_vuelo}}</td>
                            <td>Fecha Vuelo: {{ $vuelo->fecha_vuelo}}</td>
                            <td>Hora Vuelo: {{ $vuelo->hora_vuelo}}</td>
                            <td>Duracion Vuelo: {{ $vuelo->duracion_vuelo}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

@endsection