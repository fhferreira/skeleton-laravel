@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
    Hello World ::
@parent
@stop

{{-- Page content --}}
@section('content')
    <div class="hero-unit">
        <h1>Hello world!</h1>
        <p>
            Esse é um projeto open-source para inicialização de um projeto, criado
            com o objetivo de auxiliar no desenvolvimento de novos projetos, sem
            precisar ficar reconfigurando o básico de todo o sistema.
        </p>
        <p>
            Caso tenha interesse em nos auxiliar no desenvolvimento acesse o nosso
            projeto no GitHub.
        </p>
        <p>
            <a class="btn btn-primary btn-large" href="https://github.com/franciscpd/skeleton-laravel" target="_blank">
                Acessar Projeto &raquo;
            </a>
        </p>
    </div>
@stop