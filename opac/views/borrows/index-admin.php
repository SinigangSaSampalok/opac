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
        </div>
        
        <div class="col-md-6 text-end">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">All Borrowers</a></li>
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
                <div class="row mb-3">
                    <div class="col-md-10">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" id="userTypeFilter">
                            <option>All User Types</option>
                            <option>Students</option>
                            <option>Faculty</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchType" id="searchBorrower" value="borrower" checked>
                            <label class="form-check-label" for="searchBorrower">Search by Borrower Name</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchType" id="searchTitle" value="title">
                            <label class="form-check-label" for="searchTitle">Search by Book Title</label>
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
                    <th>Borrower</th>
                    <th>User Type</th>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td><span class="badge bg-success">Student</span></td>
                    <td>To Kill a Mockingbird</td>
                    <td>06-01-2023</td>
                    <td>06-15-2023</td>
                    <td><span class="badge bg-warning">Borrowed</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                Mark as
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Returned</a></li>
                                <li><a class="dropdown-item" href="#">Returned (Due)</a></li>
                                <li><a class="dropdown-item" href="#">Returned (Damaged)</a></li>
                                <li><a class="dropdown-item" href="#">Lost</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="table-danger">
                    <td>Jane Smith</td>
                    <td><span class="badge bg-info">Faculty</span></td>
                    <td>1984</td>
                    <td>05-20-2023</td>
                    <td>06-03-2023</td>
                    <td><span class="badge bg-danger">Overdue</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                Mark as
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Returned</a></li>
                                <li><a class="dropdown-item" href="#">Returned (Due)</a></li>
                                <li><a class="dropdown-item" href="#">Returned (Damaged)</a></li>
                                <li><a class="dropdown-item" href="#">Lost</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td><span class="badge bg-success">Student</span></td>
                    <td>Machine Learning Fundamentals</td>
                    <td>05-10-2023</td>
                    <td>05-24-2023</td>
                    <td><span class="badge bg-success">Returned</span></td>
                    <td>
                        <span class="text-muted">No action needed</span>
                    </td>
                </tr>
                <tr>
                    <td>Alice Johnson</td>
                    <td><span class="badge bg-success">Student</span></td>
                    <td>National Geographic</td>
                    <td>06-05-2023</td>
                    <td>06-19-2023</td>
                    <td><span class="badge bg-warning">Borrowed</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                Mark as
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Returned</a></li>
                                <li><a class="dropdown-item" href="#">Returned (Due)</a></li>
                                <li><a class="dropdown-item" href="#">Returned (Damaged)</a></li>
                                <li><a class="dropdown-item" href="#">Lost</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Robert Brown</td>
                    <td><span class="badge bg-info">Faculty</span></td>
                    <td>Time Magazine</td>
                    <td>05-15-2023</td>
                    <td>05-29-2023</td>
                    <td><span class="badge bg-success">Returned</span></td>
                    <td>
                        <span class="text-muted">No action needed</span>
                    </td>
                </tr>
                <tr>
                    <td>Emily Davis</td>
                    <td><span class="badge bg-success">Student</span></td>
                    <td>Journal of Computer Science</td>
                    <td>06-10-2023</td>
                    <td>06-24-2023</td>
                    <td><span class="badge bg-warning">Borrowed</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                Mark as
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Returned</a></li>
                                <li><a class="dropdown-item" href="#">Returned (Due)</a></li>
                                <li><a class="dropdown-item" href="#">Returned (Damaged)</a></li>
                                <li><a class="dropdown-item" href="#">Lost</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include '../partials/footer.php'; ?>

<!-- Add this script before the closing body tag -->
<script>
// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize global variables
    const borrowersTable = document.querySelector('.table-responsive table');
    const tableBody = borrowersTable.querySelector('tbody');
    const searchInput = document.getElementById('searchInput');
    const userTypeFilter = document.getElementById('userTypeFilter');
    const filterDropdownItems = document.querySelectorAll('.btn-group .dropdown-menu:first-of-type .dropdown-item');
    const searchTypeRadios = document.querySelectorAll('input[name="searchType"]');
    
    // Store original table data
    const originalRows = Array.from(tableBody.querySelectorAll('tr'));
    
    // Track the currently active filter
    let currentFilter = 'All Borrowers';
    let currentSearchType = 'borrower'; // Default to borrower search
    
    // Create modal for overdue items first (so it exists before we add event handlers)
    createOverdueModal();
    
    // Make the "Mark as" buttons work
    setupMarkAsButtons();
    
    // Set up filters and search
    setupFilters();
    
    // Set up search type radio buttons
    searchTypeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            currentSearchType = this.value;
            filterTable(currentFilter, searchInput.value, userTypeFilter.value);
        });
    });
    
    // Function to set up Mark As buttons
    function setupMarkAsButtons() {
        const markAsButtons = document.querySelectorAll('.btn-group button.dropdown-toggle');
        
        markAsButtons.forEach(button => {
            const row = button.closest('tr');
            const dropdownItems = button.nextElementSibling.querySelectorAll('.dropdown-item');
            
            dropdownItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const action = this.textContent.trim();
                    const statusCell = row.querySelector('td:nth-child(6)');
                    const actionCell = row.querySelector('td:nth-child(7)');
                    
                    // Update status based on action
                    if (action === 'Returned') {
                        statusCell.innerHTML = '<span class="badge bg-success">Returned</span>';
                        actionCell.innerHTML = '<span class="text-muted">No action needed</span>';
                        row.classList.remove('table-danger');
                        
                        // Update the original rows array to reflect this change
                        updateOriginalRows(row, 'Returned');
                    } else if (action === 'Returned (Due)' || action === 'Lost') {
                        // Mark row as red for returned due or lost
                        row.classList.add('table-danger');
                        
                        if (action === 'Returned (Due)') {
                            statusCell.innerHTML = '<span class="badge bg-warning">Returned (Due)</span>';
                            updateOriginalRows(row, 'Returned (Due)');
                        } else {
                            statusCell.innerHTML = '<span class="badge bg-danger">Lost</span>';
                            updateOriginalRows(row, 'Lost');
                        }
                        
                        actionCell.innerHTML = '<span class="text-muted">No action needed</span>';
                    } else if (action === 'Returned (Damaged)') {
                        statusCell.innerHTML = '<span class="badge bg-warning">Returned (Damaged)</span>';
                        actionCell.innerHTML = '<span class="text-muted">No action needed</span>';
                        updateOriginalRows(row, 'Returned (Damaged)');
                    }
                    
                    // Refresh overdue click handlers after status changes
                    setupOverdueClickHandlers();
                });
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
                
                filterTable(currentFilter, searchInput.value, userTypeFilter.value);
            });
        });
        
        // Search functionality
        searchInput.addEventListener('input', function() {
            filterTable(currentFilter, searchInput.value, userTypeFilter.value);
        });
        
        // Search form submission
        searchInput.closest('form').addEventListener('submit', function(e) {
            e.preventDefault();
            filterTable(currentFilter, searchInput.value, userTypeFilter.value);
        });
        
        // User type filter functionality
        userTypeFilter.addEventListener('change', function() {
            filterTable(currentFilter, searchInput.value, this.value);
        });
    }
    
    // Function to filter the table
    function filterTable(filterType, searchText, userType) {
        // Clone original rows to work with
        let filteredRows = [...originalRows];
        
        // Filter by status
        if (filterType !== 'All Borrowers') {
            filteredRows = filteredRows.filter(row => {
                const status = row.querySelector('td:nth-child(6) span').textContent.trim();
                if (filterType === 'Currently Borrowed') {
                    return status === 'Borrowed';
                } else if (filterType === 'Overdue') {
                    return status === 'Overdue';
                } else if (filterType === 'Returned') {
                    return status.includes('Returned') || status === 'Lost';
                }
                return true;
            });
        }
        
        // Filter by search text
        if (searchText) {
            const lowerSearchText = searchText.toLowerCase();
            filteredRows = filteredRows.filter(row => {
                if (currentSearchType === 'borrower') {
                    const borrower = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                    return borrower.includes(lowerSearchText);
                } else {
                    const bookTitle = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    return bookTitle.includes(lowerSearchText);
                }
            });
        }
        
        // Filter by user type
        if (userType && userType !== 'All User Types') {
            filteredRows = filteredRows.filter(row => {
                const rowUserType = row.querySelector('td:nth-child(2) span').textContent.trim();
                return userType.includes(rowUserType);
            });
        }
        
        // Clear current table
        tableBody.innerHTML = '';
        
        // Add filtered rows back to table
        filteredRows.forEach(row => {
            tableBody.appendChild(row.cloneNode(true));
        });
        
        // Reattach event listeners to new rows
        setupMarkAsButtons();
        setupOverdueClickHandlers();
    }
    
    // New function to update the original rows array when status changes
    function updateOriginalRows(changedRow, newStatus) {
        // Find the corresponding row in the original rows array
        const borrower = changedRow.querySelector('td:nth-child(1)').textContent;
        const bookTitle = changedRow.querySelector('td:nth-child(3)').textContent;
        
        // Find and update the matching row in originalRows
        for (let i = 0; i < originalRows.length; i++) {
            const origBorrower = originalRows[i].querySelector('td:nth-child(1)').textContent;
            const origBookTitle = originalRows[i].querySelector('td:nth-child(3)').textContent;
            
            if (borrower === origBorrower && bookTitle === origBookTitle) {
                // Update the status in the originalRows array
                const statusCell = originalRows[i].querySelector('td:nth-child(6)');
                
                if (newStatus === 'Returned') {
                    statusCell.innerHTML = '<span class="badge bg-success">Returned</span>';
                    originalRows[i].classList.remove('table-danger');
                } else if (newStatus === 'Returned (Due)') {
                    statusCell.innerHTML = '<span class="badge bg-warning">Returned (Due)</span>';
                    originalRows[i].classList.add('table-danger');
                } else if (newStatus === 'Lost') {
                    statusCell.innerHTML = '<span class="badge bg-danger">Lost</span>';
                    originalRows[i].classList.add('table-danger');
                } else if (newStatus === 'Returned (Damaged)') {
                    statusCell.innerHTML = '<span class="badge bg-warning">Returned (Damaged)</span>';
                }
                
                // Update the action cell
                const actionCell = originalRows[i].querySelector('td:nth-child(7)');
                actionCell.innerHTML = '<span class="text-muted">No action needed</span>';
                
                break;
            }
        }
    }
    
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
                            <p><strong>Borrower:</strong> <span id="modal-borrower">John Doe</span></p>
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
            const statusSpan = row.querySelector('td:nth-child(6) span');
            return statusSpan && statusSpan.textContent.trim() === 'Overdue';
        });
        
        overdueRows.forEach(row => {
            row.style.cursor = 'pointer';
            
            // Remove existing event listeners to prevent duplicates
            const newRow = row.cloneNode(true);
            row.parentNode.replaceChild(newRow, row);
            
            // Add click event listener to the row (except on buttons)
            newRow.addEventListener('click', function(event) {
                // Don't trigger if clicking on buttons or their children
                if (event.target.closest('.btn-group')) {
                    return;
                }
                
                const bookTitle = this.querySelector('td:nth-child(3)').textContent.trim();
                const borrower = this.querySelector('td:nth-child(1)').textContent.trim();
                const borrowDate = this.querySelector('td:nth-child(4)').textContent.trim();
                const dueDate = this.querySelector('td:nth-child(5)').textContent.trim();
                
                // Parse dates (in MM-DD-YYYY format)
                const dueDateParts = dueDate.split('-');
                const dueDateObj = new Date(
                    parseInt('20' + dueDateParts[2]), // Year (assuming 20xx)
                    parseInt(dueDateParts[0]) - 1,    // Month (0-indexed)
                    parseInt(dueDateParts[1])         // Day
                );
                
                const today = new Date();
                const daysOverdue = Math.max(1, Math.ceil((today - dueDateObj) / (1000 * 60 * 60 * 24)));
                const currentFine = daysOverdue * 10; // 10 as starting fine
                
                // Update modal content
                document.getElementById('modal-book-title').textContent = bookTitle;
                document.getElementById('modal-borrower').textContent = borrower;
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
                    const futureFine = futureDaysOverdue * 1; // 1 peso per day
                    
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
});
</script>