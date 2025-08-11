<?php 
include '../partials/header.php';

// Get user ID from URL
$userId = isset($_GET['id']) ? $_GET['id'] : null;

// Sample user data - in a real app this would come from a database
$users = [
    '1' => [
        'id' => '2020-001',
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'role' => 'student',
        'role_display' => 'Student',
        'account_type' => 'BSIT',
        'status' => 'active',
        'date_registered' => 'January 15, 2023',
        'profile_image' => 'https://via.placeholder.com/150?text=JD',
        'borrowing_history' => [
            [
                'book' => 'Sample Book 1',
                'borrow_date' => '02-01-2023',
                'return_date' => '02-15-2023',
                'status' => 'Returned'
            ],
            [
                'book' => 'Sample Book 2',
                'borrow_date' => '03-10-2023',
                'return_date' => '-',
                'status' => 'Borrowed'
            ]
        ]
    ],
    '2' => [
        'id' => '2021-002',
        'name' => 'Jane Smith',
        'email' => 'jane.smith@example.com',
        'role' => 'faculty',
        'role_display' => 'Faculty',
        'account_type' => 'IT Department',
        'status' => 'active',
        'date_registered' => 'February 20, 2023',
        'profile_image' => 'https://via.placeholder.com/150?text=JS',
        'borrowing_history' => [
            [
                'book' => 'Advanced Programming',
                'borrow_date' => '03-05-2023',
                'return_date' => '03-20-2023',
                'status' => 'Returned'
            ]
        ]
    ],
    '3' => [
        'id' => 'LIB-001',
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'role' => 'librarian',
        'role_display' => 'Librarian',
        'account_type' => 'Admin',
        'status' => 'active',
        'date_registered' => 'January 1, 2023',
        'profile_image' => 'https://via.placeholder.com/150?text=AU',
        'borrowing_history' => []
    ]
];

// Get the user data
$user = isset($users[$userId]) ? $users[$userId] : null;

if (!$user) {
    // Redirect or show error if user not found
    header("Location: index.php");
    exit();
}

// Determine badge color based on role
$roleBadgeClass = [
    'student' => 'bg-success',
    'faculty' => 'bg-info',
    'librarian' => 'bg-primary'
][$user['role']];

// Determine status badge color
$statusBadgeClass = $user['status'] === 'active' ? 'bg-success' : 'bg-danger';
?>
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
                    <img src="<?php echo $user['profile_image']; ?>" alt="User Profile" class="rounded-circle mb-3" width="150">
                    <h5 class="card-title"><?php echo htmlspecialchars($user['name']); ?></h5>
                    <p class="text-muted"><?php echo htmlspecialchars($user['role_display']); ?></p>
                    <p class="text-muted">ID: <?php echo htmlspecialchars($user['id']); ?></p>
                    
                    <div class="d-grid gap-2">
                        <a href="edit.php?id=<?php echo $userId; ?>" class="btn btn-warning">Edit Profile</a>
                        <?php if ($user['role'] !== 'librarian'): ?>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deactivateModal">Deactivate Account</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Details</h4>
                    <hr>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Full Name:</h6>
                            <p><?php echo htmlspecialchars($user['name']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Email:</h6>
                            <p><?php echo htmlspecialchars($user['email']); ?></p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Role:</h6>
                            <p><span class="badge <?php echo $roleBadgeClass; ?>"><?php echo htmlspecialchars($user['role_display']); ?></span></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Account Status:</h6>
                            <p><span class="badge <?php echo $statusBadgeClass; ?>"><?php echo ucfirst($user['status']); ?></span></p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6><?php echo $user['role'] === 'student' ? 'Course' : 'Department'; ?>:</h6>
                            <p><?php echo htmlspecialchars($user['account_type']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Date Registered:</h6>
                            <p><?php echo htmlspecialchars($user['date_registered']); ?></p>
                        </div>
                    </div>
                    
                    <?php if (!empty($user['borrowing_history'])): ?>
                    <div class="mb-3">
                        <h6>Borrowing History:</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Book</th>
                                        <th>Borrow Date</th>
                                        <th>Return Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user['borrowing_history'] as $history): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($history['book']); ?></td>
                                        <td><?php echo htmlspecialchars($history['borrow_date']); ?></td>
                                        <td><?php echo htmlspecialchars($history['return_date']); ?></td>
                                        <td>
                                            <span class="badge <?php echo $history['status'] === 'Returned' ? 'bg-success' : 'bg-warning'; ?>">
                                                <?php echo htmlspecialchars($history['status']); ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
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
                <p>Are you sure you want to deactivate <?php echo htmlspecialchars($user['name']); ?>?</p>
                <p class="text-danger">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="deactivate.php">
                    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                    <button type="submit" class="btn btn-danger">Confirm Deactivation</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>