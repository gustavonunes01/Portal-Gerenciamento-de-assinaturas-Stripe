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
           const table = $('#cadastros_table').DataTable({
                "language": {
                   "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                },
                "dom": 'Bfrtip',
                "searching": true,
                "responsive": true,
                "ajax": {
                    url: "{{route("api-reservas-list-all")}}",
                    dataSrc: ''
                },
                "lengthMenu": [[150, 250, 500, -1], [150, 250, 500, "Todos"]],
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false
                    }
                ],
                "order": [[5, "desc"]],
                "aoColumns": [
                    /*1*/{"sTitle": "id"},
                    /*1*/{"sTitle": "CODIGO"},
                    /*1*/{"sTitle": "Cadeira"},
                    /*1*/{"sTitle": "Unidade"},
                    /*2*/{"sTitle": "Nome"},
                    /*2*/{"sTitle": "E-mail"},
                    /*3*/{"sTitle": "Inicio"},
                    /*4*/{"sTitle": "Final"},
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
