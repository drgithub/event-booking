@extends('admin::layouts.app')
@section('title', 'Admin - Profile')
@section('title2', 'Profile')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Profile</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-accent-primary" style="max-width:600px">
                <div class="card-header actions">
                    <button id="eventSave" class="btn btn-success" type="submit">Edit</button>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">First Name</label>
                        <div class="col">
                            <input type="text" class="form-control" readonly value="Ralph">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Last Name</label>
                        <div class="col">
                            <input type="text" class="form-control" readonly value="Cuevas">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Email</label>
                        <div class="col">
                            <input type="text" class="form-control" readonly value="ralph@email.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Joined</label>
                        <div class="col">
                            <input type="text" class="form-control" readonly value="Saturday, August 10, 2019 09:00AM">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
