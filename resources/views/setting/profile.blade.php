@extends('layouts.template')
@push('csslib')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush
@section('content')
    <div class="section-body">
        <h2 class="section-title">Hi, {{ auth()->user()->name }}</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                            class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Posts</div>
                                <div class="profile-widget-item-value">187</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Followers</div>
                                <div class="profile-widget-item-value">6,8K</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Following</div>
                                <div class="profile-widget-item-value">2,1K</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">{{ auth()->user()->name }} <div
                                class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> Web Developer
                            </div>
                        </div>
                        Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional
                        character but an original hero in my family, a hero for his children and for his wife. So, I use the
                        name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                    </div>
                    <div class="card-footer text-center">
                        <div class="font-weight-bold mb-2">Follow {{ auth()->user()->name }} On</div>
                        <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-github mr-1">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="POST" action="{{ route('setting.profile.update') }}" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Full Name</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ auth()->user()->name }}" minlength="3" maxlength="30" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ auth()->user()->email }}" required readonly disabled>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
