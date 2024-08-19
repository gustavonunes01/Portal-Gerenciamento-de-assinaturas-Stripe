@extends('layouts.app')

@section('content')
<style>

    body{
        background-color: white !important;
    }
</style>
<div class="uk-container uk-padding">

    <div class="uk-grid-match uk-grid-small uk-text-center" uk-grid>

        <?php $statustipoconta = (auth()->user()->tipo_user == "SUPER") ? 1 : 0; ?>


        @if($statustipoconta == "1")

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="{{route("admin-cadastro")}}" class="link-icone">
                <p class="uk-text-center divcenter">
                    <span class="app-icone-adm" uk-icon="icon: user; ratio: 2"></span>

                    Usuários cadastrados

                </p>
            </a>
        </div>

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
{{--            <a href="{{ route('admin_reservas') }}" class="link-icone">--}}
            <a href="{{route("admin-reservas")}}" class="link-icone">
                <p class="uk-text-center divcenter">
                    <span class="app-icone-adm" uk-icon="icon: check; ratio: 2"></span>
                    Reservas
                </p>
            </a>
        </div>

       @endif

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="{{ route('cadastro') }}" class="link-icone">
                <p class="uk-text-center divcenter">
                    <span class="app-icone" uk-icon="icon: user; ratio: 2"></span>
                    Meu Cadastro
                </p>
            </a>
        </div>
        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="{{ route('minhas_assinaturas') }}" class="link-icone">
                <p class="uk-text-center divcenter">
                    <span class="app-icone" uk-icon="icon:  credit-card; ratio: 2"></span>
                    Minhas assinaturas
                </p>

            </a>
        </div>

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="{{ route('reservar') }}" class="link-icone">

                <p class="uk-text-center divcenter">
                    <span class="app-icone" uk-icon="icon: calendar; ratio: 2"></span>
                    Reservar lugar
                </p>
            </a>

        </div>

        <div class="uk-width-1-2 uk-width-1-4@l uk-text-center">
            <a href="{{ route('contact') }}" class="link-icone">

                <p class="uk-text-center divcenter">
                    <span class="app-icone" uk-icon="icon: mail; ratio: 2"></span>
                    Mensagens
                </p>
            </a>

        </div>

    </div>
</div>

@endsection
