@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body text-center">
                        @guest
                            <h1>Bem-Vindo</h1>
                            <p>Este aplicação simplesmente permite guardar os seus lembretes sem recurso ao papel</p>
                        @else
                            <form action="/tarefa/store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <input name="tarefa" type="text" class="form-control" id="inputPassword2" placeholder="Tarefa">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary mb-2">Inserir Tarefa</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table mt-5">
                                <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Desativar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tarefas as $tarefa)
                                    @if(!$tarefa->ativo)
                                        <tr>
                                            <th scope="row">{{$tarefa->tarefa}}</th>
                                            <td>{{date('d-m-Y', strtotime($tarefa->created_at))}}</td>
                                            <td><a href="/tarefa/{{$tarefa->id}}/destroy" class="btn btn-info">Feito</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        @endguest


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
