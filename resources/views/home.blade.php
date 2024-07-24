@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<?php include("protecao.php"); ?>--}}
{{--<?php include("./sistema/funcoes.php"); ?>--}}
{{--<?php include("html.head.php"); ?>--}}
{{--<?php include("nav.php"); ?>--}}
{{--<?php include("verificar_cadastro_completo.php"); ?>--}}

<style>

    body{
        background-color: white !important;
    }
</style>
<div class="uk-container uk-padding">

    <div class="uk-grid-match uk-grid-small uk-text-center" uk-grid>

        <?php $statustipoconta =1; ?>


        @if($statustipoconta == "1")

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="/admin/cadastrados" class="link-icone">
                <p class="uk-text-center divcenter">
                    <span class="app-icone-adm" uk-icon="icon: user; ratio: 2"></span>

                    Usuários cadastrados

                </p>
            </a>
        </div>

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="/admin/reservas" class="link-icone">
                <p class="uk-text-center divcenter">
                    <span class="app-icone-adm" uk-icon="icon: check; ratio: 2"></span>
                    Reservas
                </p>
            </a>
        </div>

       @endif

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="/me/register" class="link-icone">
                <p class="uk-text-center divcenter">
                    <span class="app-icone" uk-icon="icon: user; ratio: 2"></span>
                    Meu Cadastro
                </p>
            </a>
        </div>
        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="/me/subscriptions" class="link-icone">
                <p class="uk-text-center divcenter">
                    <span class="app-icone" uk-icon="icon:  credit-card; ratio: 2"></span>
                    Minhas assinaturas
                </p>

            </a>
        </div>

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="/reservar" class="link-icone">

                <p class="uk-text-center divcenter">
                    <span class="app-icone" uk-icon="icon: calendar; ratio: 2"></span>
                    Reservar lugar
                </p>
            </a>

        </div>

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="/support/contact" class="link-icone">

                <p class="uk-text-center divcenter">
                    <span class="app-icone" uk-icon="icon: mail; ratio: 2"></span>
                    Mensagens
                </p>
            </a>

        </div>

    </div>
</div>

@endsection
