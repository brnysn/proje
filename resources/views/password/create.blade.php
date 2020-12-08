@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.password.add') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.passwords.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.password.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($password) ? $password->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.password.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <label for="username">{{ trans('cruds.password.fields.username') }}*</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ old('username', isset($password) ? $password->username : '') }}" required>
                @if($errors->has('username'))
                    <em class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.password.fields.username_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('pass') ? 'has-error' : '' }}">
                <label for="pass">{{ trans('cruds.password.fields.pass') }}*</label>
                <input type="password" id="pass" name="pass" class="form-control" required>
                @if($errors->has('pass'))
                    <em class="invalid-feedback">
                        {{ $errors->first('pass') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.password.fields.pass_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('site_url') ? 'has-error' : '' }}">
                <label for="site_url">{{ trans('cruds.password.fields.site_url') }}</label>
                <input type="text" id="site_url" name="site_url" class="form-control" value="{{ old('site_url', isset($password) ? $password->site_url : '') }}">
                @if($errors->has('site_url'))
                    <em class="invalid-feedback">
                        {{ $errors->first('site_url') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.password.fields.site_url_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ip') ? 'has-error' : '' }}">
                <label for="ip">{{ trans('cruds.password.fields.ip') }}</label>
                <input type="text" id="ip" name="ip" class="form-control" value="{{ old('ip', isset($password) ? $password->ip : '') }}" >
                @if($errors->has('ip'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ip') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.password.fields.ip_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.password.fields.description') }}</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($password) ? $password->description : '') }}">
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.password.fields.description_helper') }}
                </p>
            </div>
            @if(count($tags) > 0)
            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                <label for="tags">{{ trans('cruds.password.fields.tags') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                    @foreach($tags as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.password.fields.tags_helper') }}
                </p>
            </div>
            @endif
            @if(count($users) > 1)
            <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                <label for="users">{{ trans('cruds.password.fields.authorities') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="users[]" id="users" class="form-control select2" multiple="multiple">
                    @foreach($users as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <em class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.password.fields.authorities_helper') }}
                </p>
            </div>
            @endif
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection