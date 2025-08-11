<?php include '../partials/header.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/opac/views/index.php">Online Public Access Catalog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/books/index.php">Browse Books</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/auth/login.php">Login</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="registerDropdown" role="button" data-bs-toggle="dropdown">
                        Register
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/opac/views/auth/register-student.php">As Student</a></li>
                        <li><a class="dropdown-item" href="/opac/views/auth/register-faculty.php">As Faculty</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Login to Library OPAC</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3 text-end">
                            <a href="/opac/views/auth/forgot-password.php" class="text-decoration-none">Forgot Password?</a>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Don't have an account? <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register here</a></p>
                        <p>Temporary Access 
                            <a href="../index-user.php">Access Student</a> & 
                            <a href="../index-user.php">Access Faculty</a> or
                            <a href="../index-admin.php">Access Admin</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Registration Options Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register As</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="d-grid gap-3">
                    <a href="/opac/views/auth/register-student.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-user-graduate me-2"></i> Register as Student
                    </a>
                    <a href="/opac/views/auth/register-faculty.php" class="btn btn-success btn-lg">
                        <i class="fas fa-chalkboard-teacher me-2"></i> Register as Faculty
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>