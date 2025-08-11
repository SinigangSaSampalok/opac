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
                    <h4 class="text-center">Edit Book</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" value="Sample Book Title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" id="category" required>
                                    <option value="">Select Category</option>
                                    <option value="book" selected>Book</option>
                                    <option value="thesis">Thesis</option>
                                    <option value="magazine">Magazine</option>
                                    <option value="journal">Journal</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="Number" class="form-label">Call/Contribution Number</label>
                                <input type="text" class="form-control" id="callNumber">
                            </div>
                            <div class="col-md-6">
                                <label for="accessionNumber" class="form-label">Accession Number</label>
                                <input type="text" class="form-control" id="contributionNumber">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="authors" class="form-label">Author/s</label>
                            <input type="text" class="form-control" id="callNumber">
                            
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="publishedYear" class="form-label">Year of Publication</label>
                                <input type="number" class="form-control" id="publishedYear" min="1900" max="<?php echo date('Y'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="publishedPlace" class="form-label">Place of Publication</label>
                                <input type="number" class="form-control" id="publishedYear" min="1900" max="<?php echo date('Y'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="edition" class="form-label">Edition</label>
                                <input type="number" class="form-control" id="copies" min="1" value="1">
                            </div>
                            <div class="col-md-6">
                                <label for="copies" class="form-label">Number of Copies</label>
                                <input type="number" class="form-control" id="copies" min="1" value="1">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.</textarea>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Book</button>
                            <a href="http://localhost/opac/views/books/index-admin.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the category select element
    const categorySelect = document.getElementById('category');
    
    // Create the department dropdown HTML
    const departmentDropdownHTML = `
    <div class="mb-3" id="departmentDropdownContainer">
        <label for="department" class="form-label">Department</label>
        <select class="form-control" id="department" required>
            <option value="">Select Department</option>
            <option value="it">Information Technology</option>
            <option value="devcom">Development Communication</option>
            <option value="lis">Library and Information Science</option>
        </select>
    </div>`;
    
    // Function to handle category change
    function handleCategoryChange() {
        // Check if an existing department dropdown exists and remove it
        const existingDropdown = document.getElementById('departmentDropdownContainer');
        if (existingDropdown) {
            existingDropdown.remove();
        }
        
        // If category is thesis, add the department dropdown
        if (categorySelect.value === 'thesis') {
            // Insert after the category's parent row
            const categoryRow = categorySelect.closest('.row');
            categoryRow.insertAdjacentHTML('afterend', departmentDropdownHTML);
            
            // If this is the edit page and we have department data, we could set it here
            // For example: document.getElementById('department').value = savedDepartmentValue;
        }
    }
    
    // Add event listener to the category select
    categorySelect.addEventListener('change', handleCategoryChange);
    
    // Run once on page load in case "thesis" is pre-selected
    handleCategoryChange();
});
</script>

<?php include '../partials/footer.php'; ?>