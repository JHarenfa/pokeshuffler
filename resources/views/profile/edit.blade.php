@extends('main_panel_template.template')

@section('content')
    <div class="container py-5">
        <!-- Update Profile Information -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Password -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Account -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
