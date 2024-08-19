@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

                <div class="card-body">
                    <div class="text-center">
                        <img src="./assets/images/passaporteonovolab.svg" width="90%">
                        <h2 class="h2 text-center mb-4 ">Cadastre-se</h2>

                        <p>Faça um cadastro para fazer parte do ONOVOLAB</p>
                    </div>

                    <form id="formlogin" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('auth.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control input-app-default @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('auth.Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control input-app-default @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('auth.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control input-app-default @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('auth.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control input-app-default" name="password_confirmation" required autocomplete="new-password">
                            </div>

                          <span class="invalid-feedback text-center " role="alert" style="display: none">
                              <strong></strong>
                          </span>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="send_submit" type="submit" class="btn btn-default col-12 btn-app-default">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("script")
  <script>
    $(document).ready(function(){

      $("#email, #password").on("change", function (event){
        $("#email").removeClass(" is-invalid")
        $("#password").removeClass(" is-invalid")
        $("#email-error").hide();
      })

      $("#formlogin").on("submit", function(event){
        event.preventDefault();

        $("#send_submit").html("<div uk-spinner></div>");
        $("#send_submit").attr("disabled", true);

        var formValues= $(this).serialize();

        $.post("{{ route('register') }}", formValues, function(data){
          window.location.replace("/");
        }).fail(function(xhr){
          console.log("error", xhr.responseJSON.errors)
          var errors = xhr.responseJSON.errors;
          if (errors) {
            if (errors.email) {
              $(".invalid-feedback").text(errors.email[0]);
              // $("#email").addClass(" is-invalid")
              // $("#password").addClass(" is-invalid")
            }
            if (errors.password) {
              $(".invalid-feedback").text(errors.password[0]);
            }

            $(".invalid-feedback").show();
          }
          $("#send_submit").removeAttr("disabled")
          $("#send_submit").html("Login");
        });
      });
    });
  </script>
@endsection
