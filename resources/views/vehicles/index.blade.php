@section('pageTitle', 'Create Vehicle')
@extends('app.app')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Vehicle List</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    @if ($vehicles->count() > 0)
                        <tr>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Action</th>
                            <th class="w-1"></th>

                        </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->name }}</td>
                            <td>{{ $vehicle->brand }}</td>
                            <td>{{ $vehicle->type }}</td>
                            <td>{{ $vehicle->price }}</td>
                            <td class="text-muted">

                            </td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn">View</a>
                                <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn">Edit</a>
                                <form class="d-inline" onsubmit="return confirm('sure to delete this data')"
                                    action="{{ route('vehicles.destroy', $vehicle->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>No vehicles found.</p>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
