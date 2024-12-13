<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h5 class="card-title fw-bold">Profile Information</h5>
        <p class="text-muted">Update your account's profile information and email address.</p>
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', $user->name) }}" required>
                @if ($errors->has('name'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', $user->email) }}" required>
                @if ($errors->has('email'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-sm text-warning">
                            Your email address is unverified.
                            <button form="send-verification" class="btn btn-link p-0">Click here to resend the
                                verification email</button>.
                        </p>
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>
</div>
