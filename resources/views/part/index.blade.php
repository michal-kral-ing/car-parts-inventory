@extends('layout.master')

@section('main_content')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Parts</h1>
                <div class="ml-auto">
                    <a href="{{ route('parts.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Create Part</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>List of Parts @if ($car)
                                        for {{ $car->name }} @if ($car->registration_number)
                                            ({{ $car->registration_number }})
                                        @endif
                                    @endif
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered datatable" id="parts-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Serial Number</th>
                                                <th>Car</th>
                                                <th class="no-sort">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($parts as $part)
                                                <tr>
                                                    <td>{{ $part->id }}</td>
                                                    <td>{{ $part->name }}</td>
                                                    <td>{{ $part->serial_number }}</td>
                                                    <td>{{ $part->car?->name }}</td>
                                                    <td>
                                                        <a href="{{ route('parts.edit', $part->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                            Edit</a>
                                                        @if ($part->car)
                                                            <a href="{{ route('cars.edit', $part->car->id) }}"
                                                                class="btn btn-info btn-sm"><i class="fas fa-car"></i>
                                                                View Car Details</a>
                                                        @endif
                                                        <form action="{{ route('parts.destroy', $part->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this part?')"><i
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
