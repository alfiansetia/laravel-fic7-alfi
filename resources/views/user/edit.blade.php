@extends('layouts.template')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label for="name"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" id="name" value="{{ $data->name }}"
                                        class="form-control @error('name') is-invalid @enderror" minlength="3"
                                        maxlength="30" placeholder="Input Name" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="email"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="email" type="email" id="email" value="{{ $data->email }}"
                                        class="form-control @error('email') is-invalid @enderror" minlength="3"
                                        maxlength="30" placeholder="Input Email" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="password"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="password" type="password" id="password" value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror" minlength="5"
                                        placeholder="xxxxx">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Leave blank if not change password
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <label class="custom-switch mt-2 p-0">
                                        <input type="checkbox" name="active" class="custom-switch-input"
                                            @if ($data->email_verified_at) checked @endif>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Verified</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary"><i
                                            class="fas fa-arrow-left mr-1"></i>Back</a>
                                    <button type="submit" class="btn btn-primary ml-1"><i
                                            class="fab fa-telegram-plane mr-1"></i>Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
