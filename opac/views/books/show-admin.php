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
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Sample Book Title</h5>
                    <p class="text-muted">By: Author Name</p>
                    
                    <div class="d-grid gap-2">
                        <a href="edit.php?id=1" class="btn btn-warning">Edit Book</a>
                        <!-- Changed to button that triggers modal instead of direct link -->
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Book</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Book Details</h4>
                    <hr>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Title:</h6>
                            <p>Sample Book Title</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Authors:</h6>
                            <p>Author 1, Author 2</p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Call/Contribution Number:</h6>
                            <p>CN-001</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Published Year:</h6>
                            <p>2023</p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Category:</h6>
                            <p>Books</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Available Copies:</h6>
                            <p>3 out of 5</p>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <h6>Description:</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete "Sample Book Title"?</p>
                <p class="text-danger fw-bold">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!-- You can use a form for better security or just a link -->
                <form method="POST" action="../process/delete_book.php">
                    <input type="hidden" name="book_id" value="1">
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </form>
                <!-- Alternative: direct link approach -->
                <!-- <a href="../process/delete_book.php?id=1" class="btn btn-danger">Confirm Delete</a> -->
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>