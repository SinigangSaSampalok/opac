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
            <h2>Request Reservation Management</h2>
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="dateSortButton">
                    <i class="fas fa-sort"></i> Newest First
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item date-sort" href="#" data-sort="newest">Newest First</a></li>
                    <li><a class="dropdown-item date-sort" href="#" data-sort="oldest">Oldest First</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Search and Filter Bar -->
    <div class="card mb-4">
        <div class="card-body">
            <form id="searchForm">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" id="statusFilter">
                            <option value="all">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchType" id="searchBorrower" value="borrower" checked>
                            <label class="form-check-label" for="searchBorrower">Search by Borrower Name</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchType" id="searchTitle" value="title">
                            <label class="form-check-label" for="searchTitle">Search by Book Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <select class="form-select" id="userTypeFilter" style="width: auto; display: inline-block;">
                            <option value="all">All User Types</option>
                            <option value="student">Students</option>
                            <option value="faculty">Faculty</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Request List -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Borrower</th>
                    <th>User Type</th>
                    <th>Book Title</th>
                    <th>Request Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="requestsTable">
                <!-- Rows will be populated by JavaScript -->
            </tbody>
        </table>
    </div>
</div>


<!-- Add this modal HTML before the closing </div> of the container -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="approveModalLabel">Approve Book Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="approveForm">
          <input type="hidden" id="requestIdInput" value="">
          <div class="mb-3">
            <label for="borrowerNameDisplay" class="form-label">Borrower</label>
            <input type="text" class="form-control" id="borrowerNameDisplay" disabled>
          </div>
          <div class="mb-3">
            <label for="bookTitleDisplay" class="form-label">Book Title</label>
            <input type="text" class="form-control" id="bookTitleDisplay" disabled>
          </div>
          <div class="mb-3">
            <label for="borrowDate" class="form-label">Borrow Date</label>
            <input type="date" class="form-control" id="borrowDate" required>
          </div>
          <div class="mb-3">
            <label for="returnDate" class="form-label">Return Date</label>
            <input type="date" class="form-control" id="returnDate" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="confirmApprove">Approve</button>
      </div>
    </div>
  </div>
</div>

<?php include '../partials/footer.php'; ?>

<!-- Update the JavaScript section -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sample data - in a real app, this would come from a database
    const requestData = [
        {
            id: 'REQ-001',
            borrower: 'John Doe',
            userType: 'student',
            bookTitle: 'To Kill a Mockingbird',
            date: '2023-06-01',
            status: 'pending',
            borrowDate: null,
            returnDate: null
        },
        {
            id: 'REQ-002',
            borrower: 'Jane Smith',
            userType: 'faculty',
            bookTitle: '1984',
            date: '2023-06-02',
            status: 'pending',
            borrowDate: null,
            returnDate: null
        },
        {
            id: 'REQ-003',
            borrower: 'Mike Johnson',
            userType: 'student',
            bookTitle: 'Machine Learning Fundamentals',
            date: '2023-05-30',
            status: 'approved',
            borrowDate: '2023-06-05',
            returnDate: '2023-06-19'
        },
        {
            id: 'REQ-004',
            borrower: 'Sarah Williams',
            userType: 'faculty',
            bookTitle: 'National Geographic',
            date: '2023-06-05',
            status: 'approved',
            borrowDate: '2023-06-07',
            returnDate: '2023-06-21'
        },
        {
            id: 'REQ-005',
            borrower: 'Robert Brown',
            userType: 'student',
            bookTitle: 'Time Magazine',
            date: '2023-06-03',
            status: 'rejected',
            borrowDate: null,
            returnDate: null
        },
        {
            id: 'REQ-006',
            borrower: 'Emily Davis',
            userType: 'faculty',
            bookTitle: 'Journal of Computer Science',
            date: '2023-06-04',
            status: 'rejected',
            borrowDate: null,
            returnDate: null
        }
    ];

    // DOM elements
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const userTypeFilter = document.getElementById('userTypeFilter');
    const dateSortOptions = document.querySelectorAll('.date-sort');
    const dateSortButton = document.getElementById('dateSortButton');
    const requestsTable = document.getElementById('requestsTable');
    const searchTypeRadios = document.querySelectorAll('input[name="searchType"]');
    
    // Modal elements
    const approveModal = new bootstrap.Modal(document.getElementById('approveModal'));
    const requestIdInput = document.getElementById('requestIdInput');
    const borrowerNameDisplay = document.getElementById('borrowerNameDisplay');
    const bookTitleDisplay = document.getElementById('bookTitleDisplay');
    const borrowDate = document.getElementById('borrowDate');
    const returnDate = document.getElementById('returnDate');
    const confirmApproveBtn = document.getElementById('confirmApprove');
    
    // Current filter values
    let currentFilters = {
        searchText: '',
        searchType: 'borrower',
        status: 'all',
        userType: 'all',
        dateSort: 'newest' // Default to newest first
    };
    
    // Initialize the table
    function initTable() {
        renderTable();
        initEventListeners();
    }
    
    // Render the table based on current filters
    function renderTable() {
        // Filter and sort the data
        let filteredData = filterData(requestData);
        filteredData = sortData(filteredData);
        
        // Clear the table
        requestsTable.innerHTML = '';
        
        // Add rows
        filteredData.forEach(request => {
            const row = document.createElement('tr');
            row.setAttribute('data-status', request.status);
            row.setAttribute('data-user-type', request.userType);
            row.setAttribute('data-date', request.date);
            row.setAttribute('data-id', request.id);
            row.setAttribute('data-borrower', request.borrower);
            row.setAttribute('data-book-title', request.bookTitle);
            
            // Format date for display (MM-DD-YYYY)
            const dateParts = request.date.split('-');
            const displayDate = `${dateParts[1]}-${dateParts[2]}-${dateParts[0].substring(2)}`;
            
            // Status badge
            let statusBadge = '';
            if (request.status === 'pending') {
                statusBadge = '<span class="badge bg-warning">Pending</span>';
            } else if (request.status === 'approved') {
                statusBadge = '<span class="badge bg-success">Approved</span>';
            } else {
                statusBadge = '<span class="badge bg-danger">Rejected</span>';
            }
            
            // User type badge
            const userTypeBadge = request.userType === 'student' ? 
                '<span class="badge bg-success">Student</span>' : 
                '<span class="badge bg-info">Faculty</span>';
            
            // Action buttons
            let actions = '<span class="text-muted">No actions available</span>';
            if (request.status === 'pending') {
                actions = `
                    <div class="btn-group">
                        <button class="btn btn-sm btn-success approve-btn" data-id="${request.id}">Approve</button>
                        <button class="btn btn-sm btn-danger reject-btn" data-id="${request.id}">Reject</button>
                    </div>
                `;
            }
            
            row.innerHTML = `
                <td>${request.id}</td>
                <td>${request.borrower}</td>
                <td>${userTypeBadge}</td>
                <td>${request.bookTitle}</td>
                <td>${displayDate}</td>
                <td>${statusBadge}</td>
                <td>${actions}</td>
            `;
            
            requestsTable.appendChild(row);
        });
        
        // Reattach action buttons
        setupActionButtons();
    }
    
    // Filter the data based on current filters
    function filterData(data) {
        return data.filter(request => {
            // Check status filter
            if (currentFilters.status !== 'all' && request.status !== currentFilters.status) {
                return false;
            }
            
            // Check user type filter
            if (currentFilters.userType !== 'all' && request.userType !== currentFilters.userType) {
                return false;
            }
            
            // Check search text
            if (currentFilters.searchText) {
                const searchField = currentFilters.searchType === 'borrower' ? 
                    request.borrower.toLowerCase() : 
                    request.bookTitle.toLowerCase();
                
                if (!searchField.includes(currentFilters.searchText.toLowerCase())) {
                    return false;
                }
            }
            
            return true;
        });
    }
    
    // Sort the data based on current sort option
    function sortData(data) {
        return [...data].sort((a, b) => {
            const dateA = new Date(a.date);
            const dateB = new Date(b.date);
            
            if (currentFilters.dateSort === 'newest') {
                return dateB - dateA; // Newest first
            } else {
                return dateA - dateB; // Oldest first
            }
        });
    }
    
    // Initialize event listeners
    function initEventListeners() {
        // Search form submission
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            currentFilters.searchText = searchInput.value.trim();
            renderTable();
        });
        
        // Search input
        searchInput.addEventListener('input', function() {
            currentFilters.searchText = this.value.trim();
            renderTable();
        });
        
        // Search type radio buttons
        searchTypeRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                currentFilters.searchType = this.value;
                renderTable();
            });
        });
        
        // Status filter
        statusFilter.addEventListener('change', function() {
            currentFilters.status = this.value;
            renderTable();
        });
        
        // User type filter
        userTypeFilter.addEventListener('change', function() {
            currentFilters.userType = this.value;
            renderTable();
        });
        
        // Date sort
        dateSortOptions.forEach(option => {
            option.addEventListener('click', function(e) {
                e.preventDefault();
                currentFilters.dateSort = this.getAttribute('data-sort');
                dateSortButton.innerHTML = `<i class="fas fa-sort"></i> ${this.textContent}`;
                renderTable();
            });
        });
        
        // Confirm approve button in modal
        confirmApproveBtn.addEventListener('click', function() {
            const borrowDateValue = borrowDate.value;
            const returnDateValue = returnDate.value;
            
            // Simple validation
            if (!borrowDateValue || !returnDateValue) {
                alert('Please fill in both dates');
                return;
            }
            
            // Check if return date is after borrow date
            if (new Date(returnDateValue) <= new Date(borrowDateValue)) {
                alert('Return date must be after borrow date');
                return;
            }
            
            const requestId = requestIdInput.value;
            
            // Find and update the request in our data
            const request = requestData.find(r => r.id === requestId);
            if (request) {
                request.status = 'approved';
                request.borrowDate = borrowDateValue;
                request.returnDate = returnDateValue;
            }
            
            // Close modal and re-render table
            approveModal.hide();
            renderTable();
        });
        
        // Set default dates when modal opens
        document.getElementById('approveModal').addEventListener('show.bs.modal', function() {
            // Set borrow date to today
            const today = new Date();
            const formattedToday = today.toISOString().split('T')[0];
            borrowDate.value = formattedToday;
            
            // Set return date to 14 days from today by default
            const twoWeeksLater = new Date();
            twoWeeksLater.setDate(today.getDate() + 14);
            const formattedTwoWeeks = twoWeeksLater.toISOString().split('T')[0];
            returnDate.value = formattedTwoWeeks;
        });
    }
    
    // Set up approve/reject buttons
    function setupActionButtons() {
        document.querySelectorAll('.approve-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                const requestId = row.getAttribute('data-id');
                const borrower = row.getAttribute('data-borrower');
                const bookTitle = row.getAttribute('data-book-title');
                
                // Set values in the modal
                requestIdInput.value = requestId;
                borrowerNameDisplay.value = borrower;
                bookTitleDisplay.value = bookTitle;
                
                // Show the modal
                approveModal.show();
            });
        });
        
        document.querySelectorAll('.reject-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const requestId = this.getAttribute('data-id');
                
                // Find and update the request in our data
                const request = requestData.find(r => r.id === requestId);
                if (request) {
                    request.status = 'rejected';
                }
                
                // Re-render the table
                renderTable();
            });
        });
    }
    
    // Initialize everything
    initTable();
});
</script>