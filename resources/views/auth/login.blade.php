@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body"  style="padding: 3rem">
                    <form id="formlogin">
                        <img src="./assets/images/passaporteonovolab.svg" width="90%">

                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label text-md-start" >E-mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Coloque seu e-mail" class="input-app-default form-control  " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                <span id="email-error" class="invalid-feedback" role="alert">
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label text-md-start">Senha</label>

                            <div class="col-md-12 text-center">
                                <input id="password" type="password" placeholder="Sua senha" class="input-app-default form-control " name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Lembrar de mim
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button id="send_submit" type="submit" class="btn btn-default col-12 btn-app-default">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Esqueceu a senha?
                                    </a>
                                @endif
                            </div>


                            <div class="text-center text-secondary mt-3">
                                Ainda não faz parte? <a href="/register" tabindex="-1">Cadastre-se</a>
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

                $.post("{{ route('login') }}", formValues, function(data){
                    window.location.reload();
                }).fail(function(xhr){
                    console.log("error", xhr.responseJSON.errors)
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        if (errors.email) {
                            $("#email-error").text(errors.email[0]);
                            $("#email-error").show();
                            $("#email").addClass(" is-invalid")
                            $("#password").addClass(" is-invalid")
                        }
                        if (errors.password) {
                            $("#password-error").text(errors.password[0]);
                        }
                    }
                    $("#send_submit").removeAttr("disabled")
                    $("#send_submit").html("Login");
                });
            });
        });
    </script>
@endsection
