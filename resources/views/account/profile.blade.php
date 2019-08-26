@extends('layouts.app')
@section('title', 'Event Booking - Home')
<div class="mt-5">
    <div class="container mt-5">
        <div class="card p-2">
            <div class="card-body">
                <div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="email">Email address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" value="">
                        <span class="form-text">Please enter your email</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" value="">
                        <span class="form-text">Please enter your password</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>