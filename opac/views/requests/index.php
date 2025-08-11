<?php include '../partials/header.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="/opac/views/index-user.php">Online Public Access Catalog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/books/index-user.php">Browse Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/borrows/index.php">My Borrowed Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/requests/index.php">My Requests</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="studentDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-graduate"></i> Student
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
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>My Requests</h2>
        </div>
    </div>
    
    <!-- Request List -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Request Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>How To Kill A Mockingbird</td>
                    <td>06-01-2023</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>1984</td>
                    <td>06-05-2023</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>
                        <button class="btn btn-sm btn-danger">Cancel</button>
                    </td>
                </tr>
                <tr class="table-danger">
                    <td>The Great Gatsby</td>
                    <td>05-20-2023</td>
                    <td><span class="badge bg-danger">Rejected</span></td>
                    <td>
                        <button class="btn btn-sm btn-secondary">Request Again</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
</div>

<?php include '../partials/footer.php'; ?>