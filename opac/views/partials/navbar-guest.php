<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Online Public Access Catalog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="views/books/index.php">Browse Books</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="views/auth/login.php">Login</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="registerDropdown" role="button" data-bs-toggle="dropdown">
                        Register
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="views/auth/register-student.php">As Student</a></li>
                        <li><a class="dropdown-item" href="views/auth/register-faculty.php">As Faculty</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>