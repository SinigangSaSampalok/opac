<?php include '../partials/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="/opac/views/index-user.php">Online Public Access Catalog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="/opac/views/books/index-user.php">Browse Books</a></li>
                <li class="nav-item"><a class="nav-link" href="/opac/views/borrows/index.php">My Borrowed Books</a></li>
                <li class="nav-item"><a class="nav-link" href="/opac/views/requests/index.php">My Requests</a></li>
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
        <div class="col-md-12 text-end">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">All</a></li>
                    <li><a class="dropdown-item" href="#">Currently Borrowed</a></li>
                    <li><a class="dropdown-item" href="#">Overdue</a></li>
                    <li><a class="dropdown-item" href="#">Returned</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Search Bar -->
    <div class="card mb-4">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by book title...">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Note about overdue fines -->
    <div class="alert alert-info mb-4">
        <i class="fas fa-info-circle"></i> Note: Click on any overdue book row to view fine details.
    </div>
    
    <!-- Borrowed Books List -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Introduction to Programming</td>
                    <td>06-01-2023</td>
                    <td>06-15-2023</td>
                    <td><span class="badge bg-warning">Borrowed</span></td>
                </tr>
                <tr class="table-danger">
                    <td>Database Systems</td>
                    <td>05-20-2023</td>
                    <td>06-03-2023</td>
                    <td><span class="badge bg-danger">Overdue</span></td>
                </tr>
                <tr>
                    <td>Web Development</td>
                    <td>05-10-2023</td>
                    <td>05-24-2023</td>
                    <td><span class="badge bg-success">Returned</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include '../partials/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize variables
    const borrowersTable = document.querySelector('.table-responsive table');
    const tableBody = borrowersTable.querySelector('tbody');
    const searchInput = document.querySelector('input[placeholder="Search by book title..."]');
    const filterDropdownItems = document.querySelectorAll('.btn-group .dropdown-menu .dropdown-item');
    
    // Store original table data
    const originalRows = Array.from(tableBody.querySelectorAll('tr'));
    
    // Track the currently active filter
    let currentFilter = 'All';
    
    // Create modal for overdue items
    createOverdueModal();
    
    // Set up filters and search
    setupFilters();
    
    // Function to create the overdue modal
    function createOverdueModal() {
        // Create modal element
        const modalHTML = `
        <div class="modal fade" id="overdueModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Overdue Book Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <h5 id="modal-book-title">Book Title</h5>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Borrow Date:</strong> <span id="modal-borrow-date">01/01/2023</span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Due Date:</strong> <span id="modal-due-date">01/15/2023</span></p>
                            </div>
                        </div>
                        <div class="alert alert-danger">
                            <p><strong>Days Overdue:</strong> <span id="modal-days-overdue">10</span></p>
                            <p><strong>Current Fine:</strong> ₱<span id="modal-current-fine">100.00</span></p>
                        </div>
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Fine Amount</th>
                                </tr>
                            </thead>
                            <tbody id="fine-schedule">
                                <!-- Fine schedule will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        `;
        
        // Add modal to the document
        document.body.insertAdjacentHTML('beforeend', modalHTML);
        
        // Setup click handlers for overdue rows
        setupOverdueClickHandlers();
    }
    
    // Function to set up click handlers for overdue rows
    function setupOverdueClickHandlers() {
        // Find all rows with overdue status
        const overdueRows = Array.from(document.querySelectorAll('tbody tr')).filter(row => {
            const statusSpan = row.querySelector('td:nth-child(4) span');
            return statusSpan && statusSpan.textContent.trim() === 'Overdue';
        });
        
        overdueRows.forEach(row => {
            row.style.cursor = 'pointer';
            
            // Remove existing event listeners to prevent duplicates
            const newRow = row.cloneNode(true);
            row.parentNode.replaceChild(newRow, row);
            
            // Add click event listener to the row
            newRow.addEventListener('click', function() {
                const bookTitle = this.querySelector('td:nth-child(1)').textContent.trim();
                const borrowDate = this.querySelector('td:nth-child(2)').textContent.trim();
                const dueDate = this.querySelector('td:nth-child(3)').textContent.trim();
                
                // Parse dates (in MM-DD-YYYY format)
                const dueDateParts = dueDate.split('-');
                const dueDateObj = new Date(
                    parseInt('20' + dueDateParts[2]), // Year (assuming 20xx)
                    parseInt(dueDateParts[0]) - 1,    // Month (0-indexed)
                    parseInt(dueDateParts[1])         // Day
                );
                
                const today = new Date();
                const daysOverdue = Math.max(1, Math.ceil((today - dueDateObj) / (1000 * 60 * 60 * 24)));
                const currentFine = daysOverdue * 10; // ₱10 per day fine
                
                // Update modal content
                document.getElementById('modal-book-title').textContent = bookTitle;
                document.getElementById('modal-borrow-date').textContent = borrowDate;
                document.getElementById('modal-due-date').textContent = dueDate;
                document.getElementById('modal-days-overdue').textContent = daysOverdue;
                document.getElementById('modal-current-fine').textContent = currentFine.toFixed(2);
                
                // Generate fine schedule for next 5 days
                const fineSchedule = document.getElementById('fine-schedule');
                fineSchedule.innerHTML = '';
                
                for (let i = 0; i <= 5; i++) {
                    const futureDate = new Date(today);
                    futureDate.setDate(today.getDate() + i);
                    
                    const futureDaysOverdue = daysOverdue + i;
                    const futureFine = futureDaysOverdue * 1; // ₱1 per day
                    
                    const row = document.createElement('tr');
                    const formattedDate = `${(futureDate.getMonth() + 1).toString().padStart(2, '0')}-${futureDate.getDate().toString().padStart(2, '0')}-${futureDate.getFullYear().toString().substring(2)}`;
                    
                    row.innerHTML = `
                        <td>${formattedDate}</td>
                        <td>₱${futureFine.toFixed(2)}</td>
                    `;
                    
                    if (i === 0) {
                        row.classList.add('table-warning');
                    }
                    
                    fineSchedule.appendChild(row);
                }
                
                // Show the modal using Bootstrap's modal API
                const overdueModal = new bootstrap.Modal(document.getElementById('overdueModal'));
                overdueModal.show();
            });
        });
    }
    
    // Function to set up filters and search
    function setupFilters() {
        // Filter dropdown functionality
        filterDropdownItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                currentFilter = this.textContent.trim();
                
                // Update filter button text
                const filterButton = document.querySelector('.btn-group button.dropdown-toggle');
                filterButton.innerHTML = `<i class="fas fa-filter"></i> ${currentFilter}`;
                
                filterTable(currentFilter, searchInput.value);
            });
        });
        
        // Search functionality
        searchInput.addEventListener('input', function() {
            filterTable(currentFilter, searchInput.value);
        });
        
        // Search form submission
        searchInput.closest('form').addEventListener('submit', function(e) {
            e.preventDefault();
            filterTable(currentFilter, searchInput.value);
        });
    }
    
    // Function to filter the table
    function filterTable(filterType, searchText) {
        // Clone original rows to work with
        let filteredRows = [...originalRows];
        
        // Filter by status
        if (filterType !== 'All') {
            filteredRows = filteredRows.filter(row => {
                const status = row.querySelector('td:nth-child(4) span').textContent.trim();
                if (filterType === 'Currently Borrowed') {
                    return status === 'Borrowed';
                } else if (filterType === 'Overdue') {
                    return status === 'Overdue';
                } else if (filterType === 'Returned') {
                    return status === 'Returned';
                }
                return true;
            });
        }
        
        // Filter by search text
        if (searchText) {
            const lowerSearchText = searchText.toLowerCase();
            filteredRows = filteredRows.filter(row => {
                const bookTitle = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                return bookTitle.includes(lowerSearchText);
            });
        }
        
        // Clear current table
        tableBody.innerHTML = '';
        
        // Add filtered rows back to table
        filteredRows.forEach(row => {
            tableBody.appendChild(row.cloneNode(true));
        });
        
        // Reattach event listeners to new rows
        setupOverdueClickHandlers();
    }
});
</script>