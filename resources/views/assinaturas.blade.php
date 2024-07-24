@extends('layouts.app')

@section('content')
    <style>

        .planos {
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .cardx {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: 250px;
            text-align: center;
        }

        .cardx h3 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        .cardx p {
            font-size: 16px;
            color: #666;
        }

        .cardx button {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .cardx button:hover {
            background-color: #0056b3;
        }

    </style>

    <div class="uk-container uk-padding boxbranco uk-animation-slide-bottom">

        @if($user->passaporte->customer_id == null)
            <div class="uk-alert-danger" uk-alert>
                <a href class="uk-alert-close" uk-close></a>
                <p>Atenção: Antes de assinar você precisa completar o cadastro em <a href="cadastro.php">Cadastro</a></p>
            </div>
        @endif

        <div class="uk-text-center" uk-grid>

            <div class="uk-width-1-2 uk-text-left">
                <div class="uk-card">Adicione uma assinatura ao seu cadastro</div>
            </div>

            <div class="uk-width-1-2 uk-text-right">
            </div>

            <h2>Assinaturas de <strong> {{$user->name}} </strong></h2>

{{--            <div class="planos">--}}



{{--                <?php--}}
{{--                $tem = "n";--}}

{{--                foreach ($subscriptions as $assinatura) {--}}
{{--                    $detalhesDaAssinatura = obterDetalhesDaAssinatura($assinatura->id);--}}
{{--                    $tem = "s";--}}
{{--                    ?>--}}
{{--                <div class="cardx">--}}
{{--                    <h3>Assinatura</h3>--}}
{{--                    <?php if ($assinatura->status == "active") { ?><span class="uk-label uk-label-success">Ativa</span><?php } else { }; ?>--}}
{{--                    <p>Começou em <?php echo date('d/m/Y', $assinatura->current_period_start); ?> e <strong>renova <?php echo date('d/m/Y', $assinatura->current_period_end); ?></strong></p>--}}
{{--                    <p>R$<?php echo number_format($detalhesDaAssinatura->plan->amount / 100, 2, ',', '.'); ?></p>--}}
{{--                    <a href="#modal-<?php echo $assinatura->id; ?>" class="uk-text-small" uk-toggle>cancelar</a>--}}
{{--                </div>--}}

{{--                <div id="modal-<?php echo $assinatura->id; ?>" uk-modal>--}}
{{--                    <div class="uk-modal-dialog uk-modal-body">--}}
{{--                        <h2 class="uk-modal-title">Cancelar Assinatura</h2>--}}
{{--                        <p>Tem certeza que deseja cancelar a assinatura?</p>--}}
{{--                        <p class="uk-text-right">--}}
{{--                            <button class="uk-button btn-app-default-light uk-modal-close" type="button">Sair</button>--}}
{{--                            <a href="cancelar_assinatura.php?idassinatura=<?php echo $assinatura->id; ?>" class="uk-button btn-app-default" type="button">Cancelar assinatura</a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                    <?php--}}
{{--                }--}}
{{--                --}}
{{--                $assinaturasfree = LerAssinaturasFree($sistema_administrativo);--}}

{{--                //print_r($assinaturasfree);--}}

{{--                foreach ($assinaturasfree as $assinatura) {--}}
{{--                    $tem = "s";--}}
{{--                    ?>--}}
{{--                <div class="cardx">--}}
{{--                    <h3>Assinatura Free</h3>--}}
{{--                    <span class="uk-label uk-label-success">Ativa</span>--}}
{{--                    <p></p>--}}
{{--                    <a href="#modal-free<?php echo $assinatura; ?>" style="uk-text-small" uk-toggle>cancelar</a>--}}
{{--                </div>--}}
{{--                --}}
{{--                <div id="modal-free<?php echo $assinatura; ?>" uk-modal>--}}
{{--                    <div class="uk-modal-dialog uk-modal-body">--}}
{{--                        <h2 class="uk-modal-title">Cancelar Assinatura free</h2>--}}
{{--                        <p>Tem certeza que deseja cancelar a assinatura?</p>--}}
{{--                        <p class="uk-text-right">--}}
{{--                            <button class="uk-button btn-app-default-light uk-modal-close" type="button">Sair</button>--}}
{{--                            <a href="assinatura-free-cancelar.php?id=<?php echo $assinatura; ?>" class="uk-button btn-app-default" type="button">Cancelar assinatura</a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                    <?php--}}
{{--                }--}}
{{--                ?>--}}
{{--                --}}
{{--                <?php--}}
{{--                if ($tem == "n"){--}}
{{--                    ?>--}}

{{--                <div class="uk-text-center" uk-grid>--}}
{{--                    <div class="uk-width-1-1">--}}
{{--                        <div class="uk-card "><h1>Há! Você ainda não tem um plano ativo.</h1></div>--}}
{{--                    </div>--}}
{{--                    <div class="uk-width-1-1">--}}
{{--                        <div class="uk-card"><a class="uk-button btn-app-default" href="#modal-assinar" uk-toggle>ASSINE UM PLANO AGORA</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                    <?php--}}
{{--                } else {--}}
{{--                }--}}
{{--                --}}
{{--                ?>--}}

{{--                    <!-- Adicione mais cards conforme necessário -->--}}
{{--            </div>--}}
        </div>


















        <?php // include("_cache_apagar.php"); ?>


        <div class="uk-width-1-1 uk-text-right">



            <div class="uk-card uk-container">







                <a class="uk-button btn-app-default" href="#modal-assinar" uk-toggle>ASSINAR UM PLANO</a></div>




            @include("modals.assinar")




        </div>
    </div>

@endsection
