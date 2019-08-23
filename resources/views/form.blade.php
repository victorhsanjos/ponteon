@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center pt-4">Cadastro de Pessoas</h1>

    <section class="card my-4">
        <div class="card-header">
            Formulário
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Nome Completo</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">E-mail</label>
                        <input type="email" class="form-control" id="inputPassword4" placeholder="Password" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Celular</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-control" required>
                            <option selected>Choose...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Cidade</label>
                        <select id="inputState" class="form-control" required disabled>
                            <option selected>Choose...</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>

    </section>

    <section class="card">
        <div class="card-header">
            Listagem
        </div>
        <div class="card-body">
                
        </div>
    </section>
</div>
@endsection
