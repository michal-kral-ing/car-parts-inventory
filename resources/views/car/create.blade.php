    @extends('layout.master')

    @section('main_content')
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Create Car</h1>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Car Details</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('cars.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="form-label">Car Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name') }}" required>
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
                                                value="{{ old('registration_number') }}"
                                                @if (old('is_registered', false) === true) required @endif>
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
                                                    @if ((bool) old('is_registered', false) === true) checked @endif required>
                                                <label class="form-check-label" for="registered">
                                                    Registered
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input @error('is_registered') is-invalid @enderror"
                                                    type="radio" name="is_registered" id="not_registered" value="0"
                                                    @if ((bool) old('is_registered', false) === false) checked @endif required>
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
                                            <button type="submit" class="btn btn-primary">Create Car</button>
                                            <a href="{{ route('cars') }}" class="btn btn-secondary">Cancel</a>
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
