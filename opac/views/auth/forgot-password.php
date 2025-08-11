<?php include '../partials/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Reset Your Password</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Enter your email address</label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="form-text">We'll send you a link to reset your password</div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Send Reset Link</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="/opac/views/auth/login.php" class="text-decoration-none">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>