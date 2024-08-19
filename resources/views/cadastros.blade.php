@extends('layouts.app')

@section('content')
    <style>

        body{
            background-color: white !important;
        }
    </style>
    <div class="uk-container uk-padding boxbranco uk-animation-slide-bottom">
        <a href="{{route("admin-cadastro-stripe")}}"><button class="badge badge-outline text-purple">Ver todos cadastros na stripe</button></a>
        <div class="table-responsive mt-5">
            <table class="table table-vcenter table-nowrap" id="cadastros_table"></table>
        </div>

    </div>

@endsection

@section("script")
    <script>
        $(document).ready(function (){
           const table = $('#cadastros_table').DataTable({
                "language": {
                   "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                },
                "dom": 'Bfrtip',
                "searching": true,
                "responsive": true,
                "ajax": {
                    url: "/admin/api-cadastrados/all/json",
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
                    /*1*/{"sTitle": "Assinatura"},
                    /*1*/{"sTitle": "Nome"},
                    /*2*/{"sTitle": "E-mail"},
                    /*3*/{"sTitle": "Telefone"},
                    /*4*/{"sTitle": "Endereço"},
                    /*5*/{"sTitle": "RG"},
                    /*6*/{"sTitle": "CPF"},
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

        })
    </script>
@endsection
