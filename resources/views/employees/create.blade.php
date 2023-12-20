@extends('employees.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new employee</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('employees.store') }}">
                      @csrf
                      <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Name<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">E-mail<span class="text-danger">*</span></label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" >

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-md-4 control-label">Phone Number<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" >
                            @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Department<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="department_id" class="form-control" name="department_id">
                                <option value="" selected disabled>Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('department_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('department_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('employees.list') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    .form-horizontal input {
        font-weight: 500;
    }
</style>
@endsection