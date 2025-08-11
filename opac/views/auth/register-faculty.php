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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Faculty Registration</h4>
                </div>
                <div class="card-body">
                    <form>
                        <h5 class="mb-3">Personal Information</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="facultyId" class="form-label">Faculty ID Number</label>
                                <input type="text" class="form-control" id="facultyId" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="form-label">Department</label>
                                <select class="form-control" id="department" required>
                                    <option value="">Select Department</option>
                                    <option value="it">Information Technology</option>
                                    <option value="libsci">Library and Information Science</option>
                                    <option value="devcom">Development Communication</option>
                                </select>
                            </div>
                        </div>
                        
                        <h5 class="mb-3">Account Information</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" required>
                                <div class="form-text">
                                    Password requirements:
                                    <ul class="small">
                                        <li>Minimum 8 characters</li>
                                        <li>At least 1 uppercase letter</li>
                                        <li>At least 1 lowercase letter</li>
                                        <li>At least 1 number</li>
                                        <li>At least 1 special character</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" required>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-info">Register as Faculty</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Already have an account? <a href="../auth/login.php">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>