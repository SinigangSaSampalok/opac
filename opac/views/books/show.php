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
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Sample Book Title</h5>
                    <p class="text-muted">By: Author Name</p>
                    
                  
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

<?php include '../partials/footer.php'; ?>