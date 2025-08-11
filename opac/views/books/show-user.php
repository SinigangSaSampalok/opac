<?php 
include '../partials/header.php';

// Get the book ID from the URL parameter
$book_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Sample book data (in a real app, this would come from a database)
$books = [
    1 => [
        'title' => 'To Kill a Mockingbird',
        'author' => 'Harper Lee',
        'year' => 1960,
        'call_number' => 'CN-1001',
        'copies' => 3,
        'total_copies' => 5,
        'category' => 'Books',
        'type' => 'book',
        'description' => 'A classic novel about racial injustice and moral growth in the American South during the 1930s.'
    ],
    2 => [
        'title' => '1984',
        'author' => 'George Orwell',
        'year' => 1949,
        'call_number' => 'CN-1002',
        'copies' => 2,
        'total_copies' => 3,
        'category' => 'Books',
        'type' => 'book',
        'description' => 'A dystopian novel set in a totalitarian society ruled by the Party and its leader, Big Brother.'
    ],
    3 => [
        'title' => 'Machine Learning Fundamentals',
        'author' => 'Andrew Ng',
        'year' => 2018,
        'call_number' => 'CN-2001',
        'copies' => 2,
        'total_copies' => 2,
        'category' => 'Thesis',
        'type' => 'thesis',
        'description' => 'Comprehensive guide to machine learning algorithms and their practical applications.'
    ],
    4 => [
        'title' => 'National Geographic',
        'author' => 'Various Authors',
        'year' => 2023,
        'call_number' => 'MG-3001',
        'copies' => 5,
        'total_copies' => 5,
        'category' => 'Magazine',
        'type' => 'magazine',
        'description' => 'Monthly magazine featuring articles about science, geography, history, and world culture.'
    ],
    5 => [
        'title' => 'Time Magazine',
        'author' => 'Various Editors',
        'year' => 2023,
        'call_number' => 'MG-3002',
        'copies' => 3,
        'total_copies' => 5,
        'category' => 'Magazine',
        'type' => 'magazine',
        'description' => 'Weekly news magazine covering current events, politics, and culture.'
    ],
    6 => [
        'title' => 'Journal of Computer Science',
        'author' => 'Various Researchers',
        'year' => 2022,
        'call_number' => 'JN-4001',
        'copies' => 4,
        'total_copies' => 4,
        'category' => 'Journal',
        'type' => 'journal',
        'description' => 'Peer-reviewed academic journal covering all aspects of computer science research.'
    ],
    7 => [
        'title' => 'The Pragmatic Programmer',
        'author' => 'Andrew Hunt',
        'year' => 1999,
        'call_number' => 'CN-3003',
        'copies' => 3,
        'total_copies' => 5,
        'category' => 'Books',
        'type' => 'book',
        'description' => 'Practical advice for programmers on how to approach software development effectively.'
    ],
    8 => [
        'title' => 'New England Journal of Medicine',
        'author' => 'Medical Researchers',
        'year' => 2023,
        'call_number' => 'JN-4002',
        'copies' => 2,
        'total_copies' => 3,
        'category' => 'Journal',
        'type' => 'journal',
        'description' => 'Weekly medical journal publishing new medical research and review articles.'
    ],
    9 => [
        'title' => 'Scientific American',
        'author' => 'Science Writers',
        'year' => 2023,
        'call_number' => 'MG-3003',
        'copies' => 4,
        'total_copies' => 6,
        'category' => 'Magazine',
        'type' => 'magazine',
        'description' => 'Popular science magazine that brings science to the general public.'
    ],
    10 => [
        'title' => 'Deep Learning Research Paper',
        'author' => 'Yoshua Bengio',
        'year' => 2021,
        'call_number' => 'CN-2003',
        'copies' => 1,
        'total_copies' => 1,
        'category' => 'Thesis',
        'type' => 'thesis',
        'description' => 'Groundbreaking research paper on deep learning algorithms and neural networks.'
    ]
];

// Get the specific book data
$book = isset($books[$book_id]) ? $books[$book_id] : null;

// If book not found, redirect or show error
if (!$book) {
    header("Location: index-user.php");
    exit();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="/opac/views/index-user.php">Online Public Access Catalog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/books/index-user.php">Browse Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/borrows/index.php">My Borrowed Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/opac/views/requests/index.php">My Requests</a>
                </li>
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
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                    <p class="text-muted">By: <?php echo htmlspecialchars($book['author']); ?></p>
                    
                    <div class="d-grid gap-2 mb-3">
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#borrowModal">
                            <?php echo $book['copies'] > 0 ? 'Borrow' : 'Not Available'; ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Item Details</h4>
                    <hr>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Title:</h6>
                            <p><?php echo htmlspecialchars($book['title']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Author(s):</h6>
                            <p><?php echo htmlspecialchars($book['author']); ?></p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Call/Contribution Number:</h6>
                            <p><?php echo htmlspecialchars($book['call_number']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Published Year:</h6>
                            <p><?php echo htmlspecialchars($book['year']); ?></p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Category:</h6>
                            <p><?php echo htmlspecialchars($book['category']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Availability:</h6>
                            <p><?php echo htmlspecialchars($book['copies']); ?> out of <?php echo htmlspecialchars($book['total_copies']); ?> available</p>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <h6>Description:</h6>
                        <p><?php echo htmlspecialchars($book['description']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Borrow Confirmation Modal -->
<div class="modal fade" id="borrowModal" tabindex="-1" aria-labelledby="borrowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="borrowModalLabel">Confirm Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to reserve "<?php echo htmlspecialchars($book['title']); ?>"?</p>
                <?php if ($book['copies'] <= 0): ?>
                    <div class="alert alert-warning">This item is currently not available for borrowing.</div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="../process/reserve_book.php">
                    <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                    <button type="submit" class="btn btn-success" <?php echo $book['copies'] <= 0 ? 'disabled' : ''; ?>>
                        Confirm Reservation
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>