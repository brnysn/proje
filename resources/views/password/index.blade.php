@extends('layouts.admin')

@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.passwords.create") }}">
            {{ trans('cruds.password.add') }}
        </a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.password.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Password">
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
                        <th>
                            {{ trans('cruds.password.fields.authorities') }}
                        </th>
                        <th>
                            &nbsp;
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
                        <td>
                            @foreach($password->users as $key => $item)
                            <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.passwords.show', $password->id) }}">
                                {{ trans('global.view') }}
                            </a>

                            <a class="btn btn-xs btn-info" href="{{ route('admin.passwords.edit', $password->id) }}">
                                {{ trans('global.edit') }}
                            </a>

                            <form action="{{ route('admin.passwords.destroy', $password->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.passwords.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Password:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection