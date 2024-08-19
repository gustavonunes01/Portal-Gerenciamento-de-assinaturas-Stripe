@extends('layouts.app')

@section('content')
  <div class="uk-container uk-padding boxbranco uk-animation-slide-bottom">
    <h2>Gestão do cadastro para <strong>{{auth()?->user()?->name}}</strong></h2>
{{--    <p>Se desejar trocar a senha <a href="trocarsenha.php">Clique aqui</a></p>--}}
    <form id="formaction" autocomplete="off" novalidate="" uk-grid>

      <div class="uk-width-1-2@s">
        <label class="form-label">Nome</label>
        <input name="nome" type="text" class="input-app-default" placeholder="Coloque seu nome" value="{{auth()?->user()?->name}}" autocomplete="off" required>
      </div>

      <div class="uk-width-1-2@s">
        <label class="form-label">RG</label>
        <input name="rg" type="number" class="input-app-default" placeholder="Qual seu RG?" autocomplete="off" value="{{auth()?->user()?->passaporte?->rg}}" required>
      </div>

      <div class="uk-width-1-2@s">
        <label class="form-label">CPF</label>
        <input name="cpf" type="number" class="input-app-default" placeholder="Qual seu CPF?" autocomplete="off" value="{{auth()?->user()?->passaporte?->cpf}}" required>
      </div>

      <div class="uk-width-1-3@s">
        <label class="form-label">Rua</label>
        <input name="rua" type="text" class="input-app-default" placeholder="Informe o nome da sua Rua" autocomplete="off" value="{{auth()?->user()?->passaporte?->rua}}" required>
      </div>

      <div class="uk-width-1-3@s">
        <label class="form-label">Bairro</label>
        <input name="bairro" type="text" class="input-app-default" placeholder="Informe o nome do seu Bairro" autocomplete="off" value="{{auth()?->user()?->passaporte?->rua}}" required>
      </div>

      <div class="uk-width-1-3@s">
        <label class="form-label">Número</label>
        <input name="numero" type="number" class="input-app-default" placeholder="Informe o número" autocomplete="off" value="{{auth()?->user()?->passaporte?->numero}}" required>
      </div>

      <div class="uk-width-1-3@s">
        <label class="form-label">Cidade/Estado</label>
        <input name="cidade" type="text" class="input-app-default" placeholder="Qual é a sua cidade?" autocomplete="off" value="{{auth()?->user()?->passaporte?->cidade}}" required>
      </div>


      <!-- -->
      <div class="uk-width-1-3@s">
        <label class="form-label">Complemento</label>
        <input name="complemento" type="text" class="input-app-default" placeholder="Complemento" autocomplete="off" value="{{auth()?->user()?->passaporte?->complemento}}" required>
      </div>

      <div class="uk-width-1-3@s">
        <label class="form-label">CEP</label>
        <input name="cep" type="number" class="input-app-default" placeholder="CEP" autocomplete="off" value="{{auth()?->user()?->passaporte?->cep}}" required>
      </div>

      <div class="uk-width-1-3@s">
        <label class="form-label">WhatsApp</label>
        <input name="whatsapp" type="text" class="input-app-default" placeholder="WhatsApp" autocomplete="off" value="{{auth()?->user()?->passaporte?->whatsapp}}" required>
      </div>

      <div class="show-error" style="position: absolute;    top: 0;    z-index: 0;    right: 0;">

      </div>
      <!-- -->

      <div class="form-footer uk-text-center uk-width-1-1@s">
        <button id="send_submit" type="submit" class="btn btn-app-default w-100">Salvar cadastro</button>
      </div>
    </form>
  </div>
@endsection

@section("script")
  <script>
    $(document).ready(function(){
      const csrfToken = $('meta[name="csrf-token"]').attr('content');

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': csrfToken
        }
      });

      $("#formaction").on("submit", function(event){
        event.preventDefault();

        $("#send_submit").html("<div uk-spinner></div>");
        $("#send_submit").attr("disabled", true);

        var formValues= $(this).serialize();

        $.ajax({
          url:"{{ route('cadastro_update_user') }}",
          data: formValues,
          method: "PUT",
          success: function(data) {
            window.location.reload();
          },
          error: function(xhr){
            console.log("error", xhr.responseJSON.errors)
            // window.location.reload();
            const errors = xhr.responseJSON.errors;
            try{
              Object.entries(errors).forEach(([field, messages]) => {
                messages.forEach(message => {
                  $(".show-error").append(`<div class="uk-alert-danger" uk-alert>
                  <a href class="uk-alert-close" uk-close></a>
                  <p>${field.toUpperCase()}: ${message}</p>
              </div>`)
                });
              });
            } catch (e) {
              $(".show-error").append(`<div class="uk-alert-danger" uk-alert>
                  <a href class="uk-alert-close" uk-close></a>
                  <p>Erro inesperado. Contate o suporte.</p>
              </div>`)
            }



            $("#send_submit").removeAttr("disabled")
            $("#send_submit").html("Salvar");

          }
        })
      });


    });
  </script>
@endsection
