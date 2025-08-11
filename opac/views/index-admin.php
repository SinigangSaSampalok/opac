<?php include 'partials/header.php'; ?>

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
            <h1 class="text-center mb-4">Welcome to College of Information Science Online Public Access Catalog</h1>
            
            <!-- Search Bar -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="/opac/views/books/index-admin.php" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search books..." name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                        
                        <!-- Search By Radio Buttons -->
                        <div class="form-group mb-3">
                            <label class="mr-3">Search by:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="searchBy" id="searchByTitle" value="title" checked>
                                <label class="form-check-label" for="searchByTitle">Title</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="searchBy" id="searchByAuthor" value="author">
                                <label class="form-check-label" for="searchByAuthor">Author</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="searchBy" id="searchByYear" value="year">
                                <label class="form-check-label" for="searchByYear">Year</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="searchBy" id="searchByKeywords" value="keywords">
                                <label class="form-check-label" for="searchByKeywords">Keywords</label>
                            </div>
                        </div>
                        
                        <!-- Sort and Category Dropdowns Side by Side -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sort">Sort by:</label>
                                    <select class="form-control" id="sort" name="sort">
                                        <option value="title_asc">Title (A-Z)</option>
                                        <option value="title_desc">Title (Z-A)</option>
                                        <option value="year_asc">Year (Oldest)</option>
                                        <option value="year_desc">Year (Newest)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category:</label>
                                    <select class="form-control" id="category" name="category">
                                        <option value="all">All Categories</option>
                                        <option value="book">Books</option>
                                        <option value="thesis">Thesis</option>
                                        <option value="magazine">Magazine</option>
                                        <option value="journal">Journal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>