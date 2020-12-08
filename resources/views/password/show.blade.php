@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.password.show') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.password.fields.id') }}
                        </th>
                        <td>
                            {{ $password->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.password.fields.title') }}
                        </th>
                        <td>
                            {{ $password->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.password.fields.username') }}
                        </th>
                        <td>
                            {{ $password->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.password.fields.pass') }}
                        </th>
                        <td>
                            {{ $password->pass }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.password.fields.site_url') }}
                        </th>
                        <td>
                            {{ $password->site_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.password.fields.ip') }}
                        </th>
                        <td>
                            {{ $password->ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.password.fields.description') }}
                        </th>
                        <td>
                            {{ $password->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        {{ trans('cruds.password.fields.tags') }}
                        </th>
                        <td>
                            @foreach($password->tags as $id => $tags)
                                <span class="label label-info label-many">{{ $tags->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                        {{ trans('cruds.password.fields.authorities') }}
                        </th>
                        <td>
                            @foreach($password->users as $id => $users)
                                <span class="label label-info label-many">{{ $users->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ route("admin.passwords.index") }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection