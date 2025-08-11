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
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>User Management</h2>
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-plus"></i> Add User
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="create.php?type=student">Add Student</a></li>
                    <li><a class="dropdown-item" href="create.php?type=faculty">Add Faculty</a></li>
                    <li><a class="dropdown-item" href="create.php?type=librarian">Add Librarian</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Search and Filter Bar -->
    <div class="card mb-4">
        <div class="card-body">
            <form id="searchForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Search users..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="searchBy" id="searchById" value="id" checked>
                                <label class="form-check-label" for="searchById">ID Number</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="searchBy" id="searchByName" value="name">
                                <label class="form-check-label" for="searchByName">Name</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="searchBy" id="searchByEmail" value="email">
                                <label class="form-check-label" for="searchByEmail">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="roleFilter">
                            <option value="all">All Roles</option>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                            <option value="librarian">Librarian</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="sortSelect">
                            <option value="name_asc">Name (A-Z)</option>
                            <option value="name_desc">Name (Z-A)</option>
                            <option value="id_asc">ID (Ascending)</option>
                            <option value="id_desc">ID (Descending)</option>
                            <option value="account_asc">Account Type (A-Z)</option>
                            <option value="account_desc">Account Type (Z-A)</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- User List -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Account Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <tr class="user-row" data-id="2020-001" data-name="John Doe" data-email="john.doe@example.com" data-role="student" data-account="BSIT">
                    <td>2020-001</td>
                    <td>John Doe</td>
                    <td>john.doe@example.com</td>
                    <td><span class="badge bg-success">Student</span></td>
                    <td>BSIT</td>
                    <td>
                        <a href="show.php?id=1" class="btn btn-sm btn-info">View</a>
                        <a href="edit.php?id=1" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger deactivate-btn" data-bs-toggle="modal" data-bs-target="#deactivateModal" data-user-id="1" data-user-name="John Doe">Deactivate</button>
                    </td>
                </tr>
                <tr class="user-row" data-id="2021-002" data-name="Jane Smith" data-email="jane.smith@example.com" data-role="faculty" data-account="IT Department">
                    <td>2021-002</td>
                    <td>Jane Smith</td>
                    <td>jane.smith@example.com</td>
                    <td><span class="badge bg-info">Faculty</span></td>
                    <td>IT Department</td>
                    <td>
                        <a href="show.php?id=2" class="btn btn-sm btn-info">View</a>
                        <a href="edit.php?id=2" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger deactivate-btn" data-bs-toggle="modal" data-bs-target="#deactivateModal" data-user-id="2" data-user-name="Jane Smith">Deactivate</button>
                    </td>
                </tr>
                <tr class="user-row" data-id="LIB-001" data-name="Admin User" data-email="admin@example.com" data-role="librarian" data-account="Admin">
                    <td>LIB-001</td>
                    <td>Admin User</td>
                    <td>admin@example.com</td>
                    <td><span class="badge bg-primary">Librarian</span></td>
                    <td>Admin</td>
                    <td>
                        <a href="show.php?id=3" class="btn btn-sm btn-info">View</a>
                        <a href="edit.php?id=3" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger">Deactivate</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <!-- <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> -->
</div>

<!-- Deactivate Confirmation Modal -->
<div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deactivateModalLabel">Confirm Deactivation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to deactivate <span id="deactivateUserName"></span>?</p>
                <p class="text-danger">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deactivateForm" method="POST" action="deactivate.php">
                    <input type="hidden" name="user_id" id="deactivateUserId">
                    <button type="submit" class="btn btn-danger">Confirm Deactivation</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');
    const searchByRadios = document.querySelectorAll('input[name="searchBy"]');
    const roleFilter = document.getElementById('roleFilter');
    const sortSelect = document.getElementById('sortSelect');
    const userRows = Array.from(document.querySelectorAll('.user-row'));
    const userTableBody = document.getElementById('userTableBody');

    // Deactivate modal setup
    const deactivateModal = document.getElementById('deactivateModal');
    deactivateModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const userId = button.getAttribute('data-user-id');
        const userName = button.getAttribute('data-user-name');
        
        document.getElementById('deactivateUserName').textContent = userName;
        document.getElementById('deactivateUserId').value = userId;
    });

    // Function to filter and sort users
    function filterAndSortUsers() {
        const searchTerm = searchInput.value.toLowerCase();
        const searchBy = document.querySelector('input[name="searchBy"]:checked').value;
        const role = roleFilter.value;
        const sortBy = sortSelect.value;

        // Filter users
        const filteredUsers = userRows.filter(row => {
            const id = row.dataset.id.toLowerCase();
            const name = row.dataset.name.toLowerCase();
            const email = row.dataset.email.toLowerCase();
            const userRole = row.dataset.role;
            
            // Check search term and criteria
            let matchesSearch = false;
            if (searchTerm === '') {
                matchesSearch = true;
            } else {
                switch(searchBy) {
                    case 'id':
                        matchesSearch = id.includes(searchTerm);
                        break;
                    case 'name':
                        matchesSearch = name.includes(searchTerm);
                        break;
                    case 'email':
                        matchesSearch = email.includes(searchTerm);
                        break;
                }
            }
            
            // Check role filter
            const matchesRole = role === 'all' || userRole === role;
            
            return matchesSearch && matchesRole;
        });

        // Sort users
        filteredUsers.sort((a, b) => {
            switch(sortBy) {
                case 'name_asc':
                    return a.dataset.name.localeCompare(b.dataset.name);
                case 'name_desc':
                    return b.dataset.name.localeCompare(a.dataset.name);
                case 'id_asc':
                    return a.dataset.id.localeCompare(b.dataset.id);
                case 'id_desc':
                    return b.dataset.id.localeCompare(a.dataset.id);
                case 'account_asc':
                    return a.dataset.account.localeCompare(b.dataset.account);
                case 'account_desc':
                    return b.dataset.account.localeCompare(a.dataset.account);
                default:
                    return 0;
            }
        });

        // Update display
        userRows.forEach(row => row.style.display = 'none');
        filteredUsers.forEach(row => {
            row.style.display = '';
            userTableBody.appendChild(row); // Reorder rows
        });
    }

    // Event listeners
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        filterAndSortUsers();
    });

    searchInput.addEventListener('input', filterAndSortUsers);
    searchByRadios.forEach(radio => {
        radio.addEventListener('change', filterAndSortUsers);
    });
    roleFilter.addEventListener('change', filterAndSortUsers);
    sortSelect.addEventListener('change', filterAndSortUsers);

    // Initial load
    filterAndSortUsers();
});
</script>

<?php include '../partials/footer.php'; ?>