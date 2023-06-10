@section('pageTitle', 'logout Vehicle')
@extends('app.app')
@section('content')

    <fieldset class="form-fieldset">
        <form method="POST" action="{{ route('vehicle.logout') }}">
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">log out</button>
            </div>
        </form>
        </div>
        </div>
    </fieldset>
@endsection
