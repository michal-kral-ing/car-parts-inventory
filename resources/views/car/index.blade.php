@extends('layout.master')

@section('main_content')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Cars</h1>
                <div class="ml-auto">
                    <a href="{{ route('cars.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Create Car</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>List of Cars</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered datatable" id="cars-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Registration Number</th>
                                                <th>Is Registered</th>
                                                <th class="no-sort">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cars as $car)
                                                <tr>
                                                    <td>{{ $car->id }}</td>
                                                    <td>{{ $car->name }}</td>
                                                    <td>{{ $car->registration_number }}</td>
                                                    <td>{{ $car->is_registered ? 'Yes' : 'No' }}</td>
                                                    <td>
                                                        <a href="{{ route('parts', $car->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-cogs"></i>
                                                            Parts ({{ $car->parts->count() }})</a>
                                                        <a href="{{ route('cars.edit', $car->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                            Edit</a>
                                                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this car?')"><i
                                                                    class="fas fa-trash"></i> Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
