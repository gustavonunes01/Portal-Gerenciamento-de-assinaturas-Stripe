<!-- Modal Assinar -->

<div id="modal-assinar" class="" uk-modal>

    <div class="uk-modal-dialog uk-modal-body fundo-cinza">

        <h2 class="uk-modal-title">Assinar um plano</h2>

        <p>Selecione um dos planos disponíveis abaixo para contratar</p>

            <!-- FREE -->

        <!--    <div class="card uk-margin-small">-->
        <!--      <div class="row g-0">-->
        <!--        <div class="col-auto">-->
        <!--          <div class="card-body">-->
        <!---->
        <!--            <div class="avatar avatar-md" style="background-image: url(./assets/passaporteicon.png)"></div>-->
        <!---->
        <!--          </div>-->
        <!---->
        <!--        </div>-->
        <!---->
        <!--        <div class="col">-->
        <!---->
        <!--          <div class="card-body ps-0">-->
        <!---->
        <!--            <div class="row">-->
        <!---->
        <!--              <div class="col">-->
        <!---->
        <!--                <h3 class="mb-0"><a href="#">FREE</a></h3>-->
        <!---->
        <!--              </div>-->
        <!---->
        <!--              <div class="col-auto fs-3 text-green">R$ 0 </div>-->
        <!---->
        <!--            </div>-->
        <!---->
        <!--            <div class="row">-->
        <!---->
        <!--              <div class="col-md">-->
        <!---->
        <!--                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">-->
        <!---->
        <!--                  Passaporte Free (grátis)-->
        <!---->
        <!--                  <br>-->
        <!---->
        <!--                </div>-->
        <!---->
        <!--                <div class="row">-->
        <!---->
        <!--                  <div class="uk-text-right">-->
        <!---->
        <!--                    <a class="uk-button btn-app-pequeno" href="assinar.php?id=free">ASSINAR</a>-->
        <!---->
        <!--                  </div>-->
        <!---->
        <!--                </div>-->
        <!---->
        <!--              </div>-->
        <!---->
        <!--              <div class="col-md-auto">-->
        <!---->
        <!--                <div class="mt-3 badges">-->
        <!---->
        <!--                </div>-->
        <!---->
        <!--              </div>-->
        <!---->
        <!--            </div>-->
        <!---->
        <!--          </div>-->
        <!---->
        <!--        </div>-->
        <!---->
        <!--      </div>-->
        <!---->
        <!--    </div>-->

        <!-- /FREE -->
        <div id="assinar-card">
        @foreach($produtos as $produto)
            @if($produto['all_prices']['0']['unit_amount'] > 100)

            <div class="card uk-margin-small">
                <div class="row g-0">
                    <div class="col-auto">
                        <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url('{{url('assets/images/passaporteicon.png')}}')"></div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card-body ps-0">
                            <div class="row">
                                <div class="col">
                                    <h3 style="color: black !important;"><?php echo $produto['name']; ?></h3>
                                </div>

                                <div class="col-auto fs-3 text-green">
                                    R$ {{$produto['all_prices']['0']['unit_amount']/100}} {{($produto['all_prices']['0']['recurring'] == "1") ? "/mês" : "" }}
                                 </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                        {{$produto['description']}}

                                        @if(tagPlan($produto['name']."".$produto['description']))
                                        <span class="uk-badge"><?php echo tagPlan($produto['name']."".$produto['description']); ?></span>
                                        @endif
                                        <br>
                                    </div>

                                    <div class="row">
                                        <div class="uk-text-right">
                                            @if($idexterno == "")
                                            <div class="uk-alert-danger" uk-alert>
                                                <p>Atenção: Antes de assinar você precisa completar o cadastro em <a href="/me/register">Cadastro</a></p>

                                                <a href="{{route("cadastro")}}" class="uk-button btn-app-default" style="width: 100% !important" target="_blank">
                                                    Completar o cadastro
                                                </a>

                                            </div>
                                            @endif

                                            <span
                                                class="uk-button btn-app-pequeno px-4 btn-assinar"
                                                data-price="{{$produto['all_prices']['0']['unit_amount']/100}}"
                                                data-tag="{{tagPlan($produto['name']."".$produto['description'])}}"
                                                data-product-id="{{$produto['id']}}"
                                            >
                                                ASSINAR
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-auto">
                                    <div class="mt-3 badges">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif
        @endforeach
        </div>
    </div>

</div>

<!-- /Modal Assinar -->
