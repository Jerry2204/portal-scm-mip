@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                <div class="d-inline">
                    <h4>Add User</h4>
                    <span>Form for Registering User</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('scm.dashboard') }}">Users</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Add User</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option" style="width: 35px;">
                            <li class=""><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Add User</h4>
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="name">Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                placeholder="Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <div class="col-form-label">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('username') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="username">Username</label>
                            <div class="col-sm-10">
                                <input type="text" id="username" name="username" class="form-control {{ $errors->has('username') ? 'form-control-danger' : '' }}"
                                placeholder="Username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                <div class="col-form-label">
                                    {{ $errors->first('username') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}"
                                placeholder="Email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <div class="col-form-label">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('dashboard_link') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="dashboard_link">Dashboard Link</label>
                            <div class="col-sm-10">
                                <textarea rows="5" cols="5" type="text" id="dashboard_link" name="dashboard_link" class="form-control {{ $errors->has('dashboard_link') ? 'form-control-danger' : '' }}"
                                placeholder="Dashboard Link">{{ old('name') }}</textarea>
                                @if ($errors->has('dashboard_link'))
                                <div class="col-form-label">
                                    {{ $errors->first('dashboard_link') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
