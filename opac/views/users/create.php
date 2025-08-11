<?php include '../partials/header.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/opac/views/index-admin.php">Online Public Access Catalog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/books/index-admin.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/users/index.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/borrows/index-admin.php">Borrowers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/requests/manage.php">Requests</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-cog"></i> Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/opac/views/auth/login.php">Logout</a></li>
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
                    <h4 class="text-center">Add New User</h4>
                </div>
                <div class="card-body">
                    <form>
                        <?php 
                        $type = $_GET['type'] ?? 'student';
                        if ($type === 'student') {
                            $role = 'Student';
                            $accountType = 'Course';
                        } elseif ($type === 'faculty') {
                            $role = 'Faculty';
                            $accountType = 'Department';
                        } else {
                            $role = 'Librarian';
                            $accountType = 'Position';
                        }
                        ?>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="idNumber" class="form-label">ID Number</label>
                                <input type="text" class="form-control" id="idNumber" required>
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
                                <label for="accountType" class="form-label"><?php echo $accountType; ?></label>
                                <?php if ($type === 'student'): ?>
                                    <select class="form-control" id="accountType" required>
                                        <option value="">Select Course</option>
                                        <option value="bsit">BS Information Technology</option>
                                        <option value="bslis">BS Library and Information Science</option>
                                        <option value="bsdevcom">BS Development Communication</option>
                                    </select>
                                <?php elseif ($type === 'faculty'): ?>
                                    <select class="form-control" id="accountType" required>
                                        <option value="">Select Department</option>
                                        <option value="it">Information Technology</option>
                                        <option value="libsci">Library and Information Science</option>
                                        <option value="devcom">Development Communication</option>
                                    </select>
                                <?php else: ?>
                                    <input type="text" class="form-control" id="accountType" required>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" required>
                            </div>
                        </div>
                        
                        <input type="hidden" name="role" value="<?php echo strtolower($role); ?>">
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Add <?php echo $role; ?></button>
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>