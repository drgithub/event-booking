@extends('layouts.app')
@section('title', 'Event Booking - Home')
<div class="mt-5">
    <form action="{{ route('account.update') }}" method="POST">
        @csrf
        <div class="container mt-5">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" name="name" aria-describedby="email-aria" placeholder="Enter Name.." value="{{ $user->name }}">
                <!-- <span id="email-aria" class="form-text">Please enter your email</span> -->
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>