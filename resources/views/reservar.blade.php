@extends('layouts.app')

@section('content')
@if(!$exist_sub_hibrid)
    <div class="empty">
        <div class="empty-img"><img src="..." height="128" alt="" />
        </div>
        <p class="empty-title">Você não tem uma assinatura Híbrida</p>
        <p class="empty-subtitle text-secondary">
            Não tem problema faça agora mesmo uma assinatura Híbrida e tenha acesso as reservas &#128516;
        </p>
        <div class="empty-action">
            <a href="{{route("minhas_assinaturas")}}" class="btn btn-app-default">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Assinar
            </a>
        </div>
    </div>


@elseif(auth()->user()?->passaporte?->horas_disponiveis_semanal > 0)
    @if(count($reservas) > 0)
    <div class="flex justify-content-center" style="display: flex;">
        <div class="card card-stacked" style="width: 92%; margin-bottom: 1.5rem">
            <div class="card-body">
                <h3 class="card-title"><span uk-icon="icon:future; ratio: 0.8" class="uk-margin-small-right"></span>Suas reservas marcadas </h3>
                <hr class="uk-divider-small text-secondary">
                <dl class="uk-description-list uk-description-list-divider px-3">

                    @foreach($reservas as $reserva)
                        <dt><span uk-icon="icon:calendar; ratio: 0.8" class="uk-margin-small-right"></span>{{$reserva["title"]}}</dt>
                        <dd><small>{{$reserva["horas"]}}</small></dd>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
    @endif


    <div class="uk-container">
        <h4>Realize uma nova reserva</h4>
        <div class="steps steps-counter steps-purple">
            <a href="#" id="step-unit" class="step-item active">
                <span class="hide-only-mobile">Unidades</span>
            </a>
            <a id="step-disp" href="#" class="step-item">
                <span class="hide-only-mobile">Disponibilidades</span>
            </a>
            <a id="step-confirm" href="#" class="step-item">
                <span class="hide-only-mobile">Confirmação</span>
            </a>
            <a id="step-reserv" href="#" class="step-item">
                <span class="hide-only-mobile">Reservado</span>
            </a>
        </div>

        <div id="reserva-div" class="uk-child-width-1-3@m uk-text-center mt-5" uk-grid>
        @foreach ($user->passaporte->assinaturas as $conta)
            @if(removerCaracteresEspeciais($conta->unidade->cidade) == "saocarlos")
            <div>
                <div class="uk-card uk-card-secondary uk-card-body">
                    <h3 class="uk-card-title">São Carlos</h3>
                    <p>R. Aquidaban, 1 - Centro</p>
                    <a  class="uk-button btn-reserver" data-unit="sc"
                        style="background-color: #95398E; color: white !important; border-radius: 100px;"
                    >
                        Reservar
                    </a>
                </div>
            </div>
                @elseif(removerCaracteresEspeciais($conta->unidade->cidade) == "indaiatuba")
            <div>
                <div class="uk-card uk-card-secondary uk-card-body">
                    <h3 class="uk-card-title">Indaiatuba</h3>
                    <p>R. das Primaveras, 1050 - Loja 43 - Parque Pompeia</p>
                    <a class="uk-button btn-reserver" data-unit="in" style="background-color: #95398E; color: white !important; border-radius: 100px;">Reservar</a>
                </div>
            </div>
                @elseif(removerCaracteresEspeciais($conta->unidade->cidade) == "araraquara")
            <div>
                <div class="uk-card uk-card-secondary uk-card-body">
                    <h3 class="uk-card-title">Araraquara</h3>
                    <p>R. Gonçalves Dias, 543 - Centro</p>
                    <a class="uk-button btn-reserver" data-unit="ar" style="background-color: #95398E; color: white !important; border-radius: 100px;">Reservar</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <div id="dispo-div" style="display: none" class="uk-child-width-1-5@m uk-child-width-1-2 uk-grid-small uk-grid-match mt-3" uk-grid>

        </div>

    </div>

    <div id="horas-reservar" class="uk-container uk-padding justify-content-center" style="width: 100%; display: none">
        <h2 class="">Horários disponíveis</h2>

        <div class="uk-width-1-1 uk-width-1-1@l gap-4 justify-content-center" uk-grid>
            <div class="hr-reserva card uk-width-1-2 uk-width-1-2-custom uk-width-1-2@l uk-padding">
                <form class="uk-form-stacked">

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Selecione uma data</label>
                        <div class="uk-form-controls">
                            <input class="uk-input input-app-default" id="data-selecionada-reserva" type="date" min="{{$inicioDaSemana}}" max="{{$fimDaSemana}}"  >
                        </div>
                    </div>

                    <div id="horarios" class="uk-margin" style="display: none">
                        <label class="uk-form-label" for="form-stacked-select">Horários disponíveis:</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" id="form-stacked-select">
                                <option>Selecione um horário</option>
                            </select>
                        </div>

                        <div class="uk-form-controls form-stacked-select-2" style="display: none">
                            <select class="uk-select" id="form-stacked-select-2">
                                <option>Selecione um horário</option>
                            </select>
                        </div>

                        <div class="uk-form-controls form-stacked-select-3" style="display: none">
                            <select class="uk-select" id="form-stacked-select-3">
                                <option>Selecione um horário</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid-auto-rows-2 gap-2 justify-content-center">
                        <button id="click_search" class="uk-modal-close btn btn-sm btn-default col-12 btn-app-default" type="button" style="font-size: 17px !important;padding: 0 !important;width: 150px;">
                            Buscar
                        </button>
                        <button id="salve_add" class="uk-modal-close btn btn-sm btn-default col-12 btn-app-default" type="button" style="display:none;font-size: 17px !important;padding: 0 !important;width: 150px;">
                            Salvar
                        </button>
                        <button id="add_more_hr" class="uk-modal-close btn btn-sm btn-info btn-app-info col-12" type="button" style="display:none;font-size: 17px !important;padding: 0 !important;width: 150px;">
                            + Horas
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <div id="confirmacao_envio" class="uk-container uk-padding justify-content-center" style="display:none;width: 100%;">
        <h2 class="">Confirmando a reserva</h2>

        <div class="uk-width-1-1 uk-width-1-1@l gap-4 justify-content-center" uk-grid>
            <div class="hr-reserva card uk-width-1-2 uk-width-1-2-custom uk-width-1-2@l uk-padding">
                <div class="uk-margin">
                    <h3 id="cadeira_title_reserva" >Cadeira</h3>
                </div>

                <div class="">
                    <h5><small>Horarios selecionados:</small></h5>
                    <ul class="uk-list uk-list-circle" id="horas_list_reserva">

                    </ul>
                </div>

                <div class="grid-auto-rows-2 gap-2 justify-content-center">
                    <button id="enviar_reserva" class="btn btn-sm btn-primary col-12" type="button" style="font-size: 17px !important;padding: 0 !important;width: 150px;">
                        Salvar
                    </button>
                    <button id="cancel_reserva" class="btn btn-sm btn-secondary col-12" onclick="window.location.reload()"  type="button" style="font-size: 17px !important;padding: 0 !important;width: 150px;">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="reservado" class="uk-container uk-padding justify-content-center" style="display:none;width: 80%;">
        <h2 class="">Parabens!</h2>

        <div class="card card-stacked">
            <div class="card-body">
                <h3 class="card-title">Sua reserva foi realizada</h3>
                <p class="text-secondary">Lembre-se de ir no horario correto e respeitar o horario de saida</p>
                <p class="text-secondary">Limpe a mesa ao sair.</p>
            </div>
        </div>
    </div>
@else
    <div class="empty">
        <div class="empty-img"><img src="..." height="128" alt="" />
        </div>
        <p class="empty-title">Você não tem horas disponiveis para reservar</p>
        <p class="empty-subtitle text-secondary">
            Aguarde a semana virar &#128522;
        </p>
        <div class="empty-action">

        </div>
    </div>
@endif
@endsection

@section("script")
  @if($exist_sub_hibrid)
    <script>
        $(document).ready(function(){
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    // 'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            let option_defult_hour = `<option>Selecione um horário</option>`, data_send;

            let date_select, date_select_old, horarios_disponives = [], horarios_adicionados = [], daySelected = "", cadeira = {};

            function alterHours(event) {
                const selectedValue = event.target.value;

                $("#add_more_hr").show();

                if(horarios_adicionados.includes(String(selectedValue))) {
                    $(this).addClass("uk-form-danger");
                    return;
                }

                $(this).removeClass("uk-form-danger");

                horarios_adicionados.push(selectedValue)
            }

            // Adiciona um event listener para o evento "change"
            $("#form-stacked-select").on('change', alterHours);

            $("#form-stacked-select-2").on('change', alterHours);

            $("#form-stacked-select-3").on('change', alterHours);

            $("#salve_add").click(function (){
                const activeElement = document.querySelector('.steps .active');
                console.log("salvando horario de reserva", horarios_adicionados)

                data_send = {
                    data_select: date_select,
                    cadeira:  cadeira,
                    hr_selected: horarios_adicionados
                }

                $("#" + activeElement.id).removeClass("active");
                $("#step-confirm").addClass("active");

                $("#horas-reservar").fadeOut(300);
                $("#confirmacao_envio").fadeIn(300);

                $("#cadeira_title_reserva").text(`Cadeira ${cadeira.nome}`)

                horarios_adicionados.map((horario) => {
                    $("#horas_list_reserva").append(`<li>${horario.replace("_", " - ")}</li>`)
                });


            });

            $("#enviar_reserva").click(function(){
                const btn = $(this);
                btn.html("<div uk-spinner></div>");
                btn.attr( "disable", true )
                const activeElement = document.querySelector('.steps .active');

                $.ajax({
                    url: `{{route("api-cadeira-reservar")}}`,
                    method: 'POST',
                    data: data_send,
                    success: function (resp){

                        btn.attr( "disable", false )

                        $("#" + activeElement.id).removeClass("active");
                        $("#step-reserv").addClass("active");

                        $("#confirmacao_envio").fadeOut(300);
                        $("#reservado").fadeIn(300);
                    },
                    error: function (erro){
                        console.log("Erro ao salvar", erro)
                    },
                    always: function () {
                        btn.html("Salvar")
                    }
                });
            })

            $("#add_more_hr").click(function (){

                const numberSelect = horarios_adicionados.length + 1;

                horarios_disponives[0][daySelected]?.map((horario)=>{
                    $(`#form-stacked-select-${numberSelect}`).append(`<option value="${horario.inicio}_${horario.fim}">${horario.inicio} - ${horario.fim}</option>`)
                })

                $(`.form-stacked-select-${numberSelect}`).fadeIn(300);

                console.log(`#form-stacked-select-${numberSelect}`)
            });

            $("#data-selecionada-reserva").on("change", function (){
                date_select_old = date_select;

                if(!date_select)
                    return;

                date_select = $(this).val();

                if(date_select !== date_select_old){
                    horarios_adicionados = []; daySelected = "";

                    $("#click_search").show();
                    $("#salve_add").hide();
                    $("#horarios").fadeOut(300);
                }
            })

            $("#click_search").on('click', function (){

                date_select = $("#data-selecionada-reserva").val();

                console.log("data_select", date_select)

                if(date_select.length === 0)
                    return;

                $("#form-stacked-select").html(option_defult_hour);
                const dateObject = new Date(date_select);

                // console.log("data", new Date(date_select).getDay());

                const daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                daySelected = daysOfWeek[dateObject.getDay()];

                // console.log("Horas disponiveis selecionada",dayName, horarios_disponives, horarios_disponives[0][dayName])
                horarios_disponives[0][daySelected]?.map((horario)=>{
                   $("#form-stacked-select").append(`<option value="${horario.inicio}_${horario.fim}">${horario.inicio} - ${horario.fim}</option>`)
                });

                $("#horarios").fadeIn(300);
                $(this).hide();
                $("#salve_add").show();
            })

            $("#dispo-div").on('click', "#buscar-disponi", function () {

                const data = $(this).data();
                // console.log("a", data)

                $.ajax({
                    url: `{{route("api-cadeira-disponivel-na-semana")}}/${data.ph}`,
                    method: 'POST',
                    data: data,
                    success: function (resp){
                        console.log("Horarios disponivais, ", resp);
                        // $("#horas-reservar").show()
                        cadeira = resp.cadeira
                        horarios_disponives.push(resp.horariosPorSemana)

                        $("#dispo-div").fadeOut(300);
                        $("#horas-reservar").fadeIn(300);


                        console.log("depois do push", horarios_disponives)
                        // $("#" + activeElement.id).removeClass("active")
                        // $("#step-disp").addClass("active")
                    }
                })

            } )

            $(".btn-reserver").on("click", function (event) {
                const data = $(this).data();
                const btn = $(this);
                // console.log("reserever", data)
                btn.html("<div uk-spinner></div>");
                const activeElement = document.querySelector('.steps .active');
                $.ajax({
                    url: '{{route("api-cadeiras")}}',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        console.log("Sucesso:", response);

                        const ph = response.disponibilidade

                        ph.map((posicao) => {
                            $("#dispo-div").append(`<div>
                                <div class="uk-card uk-card-secondary uk-card-body card-cadeira">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="36"  height="36"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-armchair"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a2 2 0 0 1 2 2v2h10v-2a2 2 0 1 1 4 0v4a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-4a2 2 0 0 1 2 -2z" /><path d="M5 11v-5a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v5" /><path d="M6 19v2" /><path d="M18 19v2" /></svg>
                                    <h3 class="uk-card-title">${posicao.nome}</h3>
                                    <a class="uk-button" data-ph="${posicao.id}" style="background-color: #95398E; color: white !important; border-radius: 100px;" id=buscar-disponi>Selecionar</a>
                                </div>
                            </div>`)
                        });

                        $("#dispo-div").fadeIn(300);
                        $("#reserva-div").fadeOut(300);

                        $("#" + activeElement.id).removeClass("active")
                        $("#step-disp").addClass("active")

                    },
                    error: function(xhr, status, error) {
                        console.error("Erro:", error);
                        // btn.html("Reservar")
                    },
                    always: function(){
                        btn.html("Reservar");
                    }
                });
            });
        });
    </script>
    @endif
@endsection
