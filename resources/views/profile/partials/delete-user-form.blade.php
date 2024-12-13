<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h5 class="card-title fw-bold text-danger">Delete Account</h5>
        <p class="text-muted">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
            your account, please download any data or information that you wish to retain.
        </p>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
            Delete Account
        </button>

        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="confirmDeleteModalLabel">Confirm Account Deletion
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-muted">
                                Once your account is deleted, all of its resources and data will be permanently deleted.
                                Please enter your password to confirm you would like to permanently delete your account.
                            </p>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter your password" required>
                                @if ($errors->userDeletion->has('password'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->userDeletion->first('password') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
