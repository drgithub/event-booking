@extends('admin::layouts.app')
@section('title', 'Admin - Profile')
@section('title2', 'Profile')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Profile</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form>
                @csrf
                <div class="card card-accent-primary" style="max-width:600px">
                    <div class="card-header actions">
                        <button id="eventSave" class="btn btn-primary" type="submit">Update</button>
                        <button id="eventCancel" class="btn btn-secondary" type="button">Cancel</button>
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
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
