@extends('layout.master')

@section('main_content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Car</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Car Details</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('cars.update', $car->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name" class="form-label">Car Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $car->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="registration_number" class="form-label">Registration Number</label>
                                        <input type="text"
                                            class="form-control @error('registration_number') is-invalid @enderror"
                                            id="registration_number" name="registration_number"
                                            value="{{ old('registration_number', $car->registration_number) }}">
                                        @error('registration_number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="is_registered" class="form-label">Registration Status
                                            <span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input @error('is_registered') is-invalid @enderror"
                                                type="radio" name="is_registered" id="registered" value="1"
                                                @if ((bool) old('is_registered', $car->is_registered) === true) checked @endif required>
                                            <label class="form-check-label" for="registered">
                                                Registered
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('is_registered') is-invalid @enderror"
                                                type="radio" name="is_registered" id="not_registered" value="0"
                                                @if ((bool) old('is_registered', $car->is_registered) === false) checked @endif required>
                                            <label class="form-check-label" for="not_registered">
                                                Not Registered
                                            </label>
                                        </div>
                                        @error('is_registered')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Car</button>
                                        <a href="{{ route('cars') }}" class="btn btn-secondary">Cancel</a>
                                        <a href="{{ route('parts', $car->id) }}" class="btn btn-info">View Parts</a>
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
