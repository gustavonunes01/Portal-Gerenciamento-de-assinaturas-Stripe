@extends('layouts.app')

@section('content')
    <style>

        body{
            background-color: white !important;
        }
    </style>
    <div class="uk-container uk-padding">

        <div class="uk-grid-match uk-grid-small uk-text-center" uk-grid>
            <div class="uk-container uk-padding boxbranco uk-animation-slide-bottom uk-text-center">

                <h1>Obrigado <strong>{{auth()->user()?->name}}}!</strong></h1>

                <h2>Agora você faz parte da nossa comunidade. Aguarde nosso e-mail.</h2>

                <p>Sua assinatura está ativa. <a href="/">Começar</a>.</p>

            </div>

        </div>
    </div>

@endsection
