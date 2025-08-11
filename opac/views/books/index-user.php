<?php include '../partials/header.php'; ?>
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
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Library Collection</h2>
        </div>
    </div>

    <!-- Search and Filter Bar -->
    <div class="card mb-4">
        <div class="card-body">
            <form id="searchForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Search books..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <!-- Search By Radio Buttons -->
                        <div class="form-group">
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
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="categorySelect">
                            <option value="All Categories">All Categories</option>
                            <option value="Books">Books</option>
                            <option value="Thesis">Thesis</option>
                            <option value="Magazine">Magazine</option>
                            <option value="Journal">Journal</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="sortSelect">
                            <option value="title_asc">Sort by Title (A-Z)</option>
                            <option value="title_desc">Sort by Title (Z-A)</option>
                            <option value="year_newest">Sort by Year (Newest)</option>
                            <option value="year_oldest">Sort by Year (Oldest)</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Book List -->
    <div class="card">
        <div class="card-body">
            <div class="list-group" id="bookList">
                <?php
                $items = [
                    [
                        'id' => 1,
                        'title' => 'To Kill a Mockingbird',
                        'author' => 'Harper Lee',
                        'year' => 1960,
                        'call_number' => 'CN-1001',
                        'copies' => 3,
                        'category' => 'Books',
                        'type' => 'book'
                    ],
                    [
                        'id' => 2,
                        'title' => '1984',
                        'author' => 'George Orwell',
                        'year' => 1949,
                        'call_number' => 'CN-1002',
                        'copies' => 2,
                        'category' => 'Books',
                        'type' => 'book'
                    ],
                    [
                        'id' => 3,
                        'title' => 'Machine Learning Fundamentals',
                        'author' => 'Andrew Ng',
                        'year' => 2018,
                        'call_number' => 'CN-2001',
                        'copies' => 2,
                        'category' => 'Thesis',
                        'type' => 'thesis'
                    ],
                    [
                        'id' => 4,
                        'title' => 'National Geographic',
                        'author' => 'Various Authors',
                        'year' => 2023,
                        'call_number' => 'MG-3001',
                        'copies' => 5,
                        'category' => 'Magazine',
                        'type' => 'magazine'
                    ],
                    [
                        'id' => 5,
                        'title' => 'Time Magazine',
                        'author' => 'Various Editors',
                        'year' => 2023,
                        'call_number' => 'MG-3002',
                        'copies' => 3,
                        'category' => 'Magazine',
                        'type' => 'magazine'
                    ],
                    [
                        'id' => 6,
                        'title' => 'Journal of Computer Science',
                        'author' => 'Various Researchers',
                        'year' => 2022,
                        'call_number' => 'JN-4001',
                        'copies' => 4,
                        'category' => 'Journal',
                        'type' => 'journal'
                    ],
                    [
                        'id' => 7,
                        'title' => 'The Pragmatic Programmer',
                        'author' => 'Andrew Hunt',
                        'year' => 1999,
                        'call_number' => 'CN-3003',
                        'copies' => 3,
                        'category' => 'Books',
                        'type' => 'book'
                    ],
                    [
                        'id' => 8,
                        'title' => 'New England Journal of Medicine',
                        'author' => 'Medical Researchers',
                        'year' => 2023,
                        'call_number' => 'JN-4002',
                        'copies' => 2,
                        'category' => 'Journal',
                        'type' => 'journal'
                    ],
                    [
                        'id' => 9,
                        'title' => 'Scientific American',
                        'author' => 'Science Writers',
                        'year' => 2023,
                        'call_number' => 'MG-3003',
                        'copies' => 4,
                        'category' => 'Magazine',
                        'type' => 'magazine'
                    ],
                    [
                        'id' => 10,
                        'title' => 'Deep Learning Research Paper',
                        'author' => 'Yoshua Bengio',
                        'year' => 2021,
                        'call_number' => 'CN-2003',
                        'copies' => 1,
                        'category' => 'Thesis',
                        'type' => 'thesis'
                    ]
                ];
                
                foreach ($items as $item): ?>
                <div class="list-group-item list-group-item-action" 
                     data-title="<?php echo strtolower($item['title']); ?>" 
                     data-author="<?php echo strtolower($item['author']); ?>" 
                     data-year="<?php echo $item['year']; ?>" 
                     data-category="<?php echo $item['category']; ?>"
                     data-type="<?php echo $item['type']; ?>">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $item['title']; ?></h5>
                        <small><?php echo ($item['type'] === 'thesis') ? 'Contribution Number: ' : 'Call Number: '; ?><?php echo $item['call_number']; ?></small>
                    </div>
                    <p class="mb-1"><?php echo $item['author']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Published: <?php echo $item['year']; ?> | Available Copies: <?php echo $item['copies']; ?> | Category: <?php echo $item['category']; ?></small>
                        <div>
                            <a href="show-user.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-primary me-2">View Details</a>
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#borrowModal<?php echo $item['id']; ?>">Borrow</button>
                        </div>
                    </div>
                </div>
                
                <!-- Borrow Confirmation Modal -->
                <div class="modal fade" id="borrowModal<?php echo $item['id']; ?>" tabindex="-1" aria-labelledby="borrowModalLabel<?php echo $item['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="borrowModalLabel<?php echo $item['id']; ?>">Confirm Reservation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to reserve "<?php echo $item['title']; ?>"?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="#" class="btn btn-success">Confirm Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');
    const categorySelect = document.getElementById('categorySelect');
    const sortSelect = document.getElementById('sortSelect');
    const bookItems = Array.from(document.querySelectorAll('.list-group-item'));

    // Function to filter and sort items
    function filterAndSortItems() {
        const searchTerm = searchInput.value.toLowerCase();
        const searchBy = document.querySelector('input[name="searchBy"]:checked').value;
        const category = categorySelect.value;
        const sortBy = sortSelect.value;

        // Filter items
        const filteredItems = bookItems.filter(item => {
            const title = item.dataset.title;
            const author = item.dataset.author;
            const year = item.dataset.year;
            const itemCategory = item.dataset.category;
            
            // Check search term
            let matchesSearch = false;
            switch(searchBy) {
                case 'title':
                    matchesSearch = title.includes(searchTerm);
                    break;
                case 'author':
                    matchesSearch = author.includes(searchTerm);
                    break;
                case 'year':
                    matchesSearch = year.includes(searchTerm);
                    break;
                case 'keywords':
                    matchesSearch = title.includes(searchTerm) || author.includes(searchTerm) || year.includes(searchTerm);
                    break;
            }
            
            // Check category
            const matchesCategory = category === 'All Categories' || itemCategory === category;
            
            return matchesSearch && matchesCategory;
        });

        // Sort items
        filteredItems.sort((a, b) => {
            switch(sortBy) {
                case 'title_asc':
                    return a.dataset.title.localeCompare(b.dataset.title);
                case 'title_desc':
                    return b.dataset.title.localeCompare(a.dataset.title);
                case 'year_newest':
                    return parseInt(b.dataset.year) - parseInt(a.dataset.year);
                case 'year_oldest':
                    return parseInt(a.dataset.year) - parseInt(b.dataset.year);
                default:
                    return 0;
            }
        });

        // Update display
        bookItems.forEach(item => {
            item.style.display = 'none';
        });
        
        const bookList = document.getElementById('bookList');
        filteredItems.forEach(item => {
            item.style.display = 'block';
            bookList.appendChild(item); // Reorder items
        });
    }

    // Event listeners
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        filterAndSortItems();
    });

    categorySelect.addEventListener('change', filterAndSortItems);
    sortSelect.addEventListener('change', filterAndSortItems);

    // Initial load
    filterAndSortItems();
});
</script>