@extends('layout.master')

@section('main_content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Part</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Part Details</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('parts.update', $part->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name" class="form-label">Part Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $part->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="serial_number" class="form-label">Serial Number</label>
                                        <input type="text"
                                            class="form-control @error('serial_number') is-invalid @enderror"
                                            id="serial_number" name="serial_number"
                                            value="{{ old('serial_number', $part->serial_number) }}" required>
                                        @error('serial_number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="car_id" class="form-label">Car</label>
                                        <select class="form-control @error('car_id') is-invalid @enderror" id="car_id"
                                            name="car_id">
                                            <option value="">Select a Car</option>
                                            @foreach ($cars as $car)
                                                <option value="{{ $car->id }}"
                                                    {{ old('car_id', $part->car_id) == $car->id ? 'selected' : '' }}>
                                                    {{ $car->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('car_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Part</button>
                                        <a href="{{ route('parts') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
