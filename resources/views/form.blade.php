@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center pt-4">Cadastro de Pessoas</h1>

    <form-component action="{{ action('UserController@store') }}" method="post" :states='@json($states)'></form-component>

    <section class="card">
        <div class="card-header">
            Listagem
        </div>
        <div class="card-body">
            <table-component></table-componet>        
        </div>
    </section>
</div>
@endsection
