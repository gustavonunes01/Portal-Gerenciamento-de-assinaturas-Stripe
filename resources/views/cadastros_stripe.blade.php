@extends('layouts.app')

@section('content')
    <style>

        body{
            background-color: white !important;
        }
    </style>
    <div class="uk-container uk-padding boxbranco uk-animation-slide-bottom">

        <div class="table-responsive">
            <table class="table table-vcenter table-nowrap" id="cadastros_table"></table>
        </div>

    </div>

@endsection

@section("script")
    <script>
        $(document).ready(function (){
          const csrfToken = $('meta[name="csrf-token"]').attr('content');

          const table = $('#cadastros_table').DataTable({
              "language": {
                 "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
              },
              "dom": 'Bfrtip',
              "searching": true,
              "responsive": true,
              "ajax": {
                  url: "{{route("api-stripe-cadastros")}}",
                  dataSrc: ''
              },
              "lengthMenu": [[150, 250, 500, -1], [150, 250, 500, "Todos"]],
              "columnDefs": [
                  {
                      "targets": [ 0 ],
                      "visible": false
                  }
              ],
              "order": [[0, "desc"]],
              "aoColumns": [
                  /*1*/{"sTitle": "id"},
                  /*1*/{"sTitle": "Nome"},
                  /*2*/{"sTitle": "E-mail"},
                  /*3*/{"sTitle": "Status"},
                  /*3*/{"sTitle": "Plano"},
                  /*4*/{"sTitle": "Valor"},
                  /*8*/{"sTitle": ""},
              ],
              layout: {
                 topStart: {
                     buttons: ['excel']
                 }
              },
              "buttons": [
                 'excel' // Adiciona o botão de exportação para Excel
              ],
              "fnDrawCallback": function () {
                  // $('#dtCountFiltered').text(this.fnSettings().fnRecordsDisplay());
                  // makeStats(this.api());
                  //
                  // $('#minus3').text(minus3);
                  // $('#between4and7').text(between4and7);
                  // $('#plus7').text(plus7);
              }
          });

          $("#cadastros_table").on( "click","#btn-cancelar-subscription", function (event) {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': csrfToken
                }
              });

              const data = $(this).data();
              console.log("cancelar")
              $(this).html("<div uk-spinner></div>");
              $.ajax({
                  url: '{{route("sub-cancelar")}}',
                  method: 'POST',
                  data: data,
                  success: function(response) {
                      console.log("Sucesso:", response);
                      window.location.reload()
                  },
                  error: function(xhr, status, error) {
                      console.error("Erro:", error);
                  }
              });
          });

        })
    </script>
@endsection
