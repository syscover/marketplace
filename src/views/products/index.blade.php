@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('head')
    @parent
    <!-- market::products.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : {{ $offset }},
                    'aoColumnDefs': [
                        { 'bSortable': false, 'aTargets': [6,7]},
                        { 'sClass': 'checkbox-column', 'aTargets': [6]},
                        { 'sClass': 'align-center', 'aTargets': [2,3,4,7]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonData' . ucfirst($routeSuffix), [session('baseLang')->id_001]) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- /.market::products.index -->
@stop

@section('tHead')
    <!-- market::products.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone,tablet">{{ trans('pulsar::pulsar.active') }}</th>
        <th>{{ trans_choice('pulsar::pulsar.price', 2) }}</th>
        <th>{{ trans('pulsar::pulsar.sorting') }}</th>
        <th>{{ trans_choice('pulsar::pulsar.category', 2) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /.market::products.index -->
@stop