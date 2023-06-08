@section('pageTitle', 'login Vehicle')
@extends('app.app')
@section('content')

    <fieldset class="form-fieldset">
        <form method="POST" action="{{ route('vehicles.login') }}">
            <div class="mb-3">
                <label class="form-label required">Full name</label>
                <input type="text" class="form-control" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label required">Company</label>
                <input type="text" class="form-control" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label required">Email</label>
                <input type="email" class="form-control" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone number</label>
                <input type="tel" class="form-control" autocomplete="off">
            </div>
            <label class="form-check">
                <input type="checkbox" class="form-check-input">
                <span class="form-check-label required">I agree to the Terms &amp; Conditions</span>
            </label>
    </fieldset>
@endsection
