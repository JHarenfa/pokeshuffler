<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h5 class="card-title fw-bold">Update Password</h5>
        <p class="text-muted">Ensure your account is using a long, random password to stay secure.</p>
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control"
                    placeholder="Current Password" required>
                @if ($errors->updatePassword->has('current_password'))
                    <div class="text-danger mt-2">
                        {{ $errors->updatePassword->first('current_password') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="New Password"
                    required>
                @if ($errors->updatePassword->has('password'))
                    <div class="text-danger mt-2">
                        {{ $errors->updatePassword->first('password') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    placeholder="Confirm Password" required>
                @if ($errors->updatePassword->has('password_confirmation'))
                    <div class="text-danger mt-2">
                        {{ $errors->updatePassword->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>
</div>
