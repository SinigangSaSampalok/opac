<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Online Public Access Catalog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="views/books/index-admin.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/users/index.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/borrows/index-admin.php">Borrowers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/requests/manage.php">Requests</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-cog"></i> Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../views/auth/login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>