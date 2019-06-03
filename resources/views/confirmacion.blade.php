@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
<div class="container">
        <h1>
                <strong>email</strong>: {{$email}}
            </h1>
    <h1>
        <strong>Contraseña</strong>: {{$pass}}
    </h1>
<a class="btn btn-success" href="../../home">Listo</a>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
