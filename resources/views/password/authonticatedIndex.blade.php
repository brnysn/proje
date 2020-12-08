@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.password.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PasswordAuthonticated">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.password.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.password.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.password.fields.username') }}
                        </th>
                        <th>
                            {{ trans('cruds.password.fields.pass') }}
                        </th>
                        <th>
                            {{ trans('cruds.password.fields.site_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.password.fields.ip') }}
                        </th>
                        <th>
                            {{ trans('cruds.password.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.password.fields.tags') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($passwords as $key => $password)
                    <tr data-entry-id="{{ $password->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $password->id ?? '' }}
                        </td>
                        <td>
                            {{ $password->title ?? '' }}
                        </td>
                        <td>
                            {{ $password->username ?? '' }}
                        </td>
                        <td>
                            {{ $password->pass ?? '' }}
                        </td>
                        <td>
                            {{ $password->site_url ?? '' }}
                        </td>
                        <td>
                            {{ $password->ip ?? '' }}
                        </td>
                        <td>
                            {{ $password->description ?? '' }}
                        </td>
                        <td>
                            @foreach($password->tags as $key => $item)
                            <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            order: [
                [1, 'desc']
            ],
            pageLength: 100,
        });
        $('.datatable-PasswordAuthonticated:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection