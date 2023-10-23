<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body class="bg-secondary-1" id="home">
  <div class="flex justify-center align-center h-80 bg-primary-1">
    <div class="w-45">
      <h1 class="text-5xl font-bold text-secondary-1">Selamat Datang
        di Perpustakaan Digital</h1>
    </div>
    <div class="w-45">
      <img src="/img/home-reading-book.png" alt="" class="w-full">
    </div>
  </div>
  <main class="bg-secondary-1 text-primary-1 w-full">
    <div class="w-90 mx-auto py-10">
      <div class="flex justify-between mb-10">
        <h3 class="text-3xl font-bold">Pilih Buku Yang Anda Suka</h3>
        <div class="flex py-3 px-4 h-fit align-center gap-3 text-secondary-2 bg-primary-1 rounded-8 cursor-text" for="search" id="search-container">
          <label for="search"><i class="fa-solid fa-magnifying-glass font-bold"></i></label>
          <input type="text" name="search" id="search" placeholder="Cari Buku" class="font-inter font-bold text-secondary-1">
        </div>
      </div>

      <div id="books" class="flex justify-center">
        <div id="book-container">
          <!-- Books data -->
        </div>
        <div id="no-books-found" class="flex flex-column justify-center align-center w-full h-80" style="display: none;">
          <h3 class="text-3xl font-bold">Buku tidak ditemukan</h3>
        </div>
      </div>
    </div>
  </main>

  <!-- Icon -->
  <script src="https://kit.fontawesome.com/348e129488.js" crossorigin="anonymous"></script>
</body>

<script>
  const data = [{
      bookId: 1,
      bookTitle: 'Bumi',
      bookAuthor: 'Tere Liye',
      bookYear: 2021,
      bookImg: '/book/bumi.jpeg',
      bookSlug: 'bumi',
    },
    {
      bookId: 2,
      bookTitle: 'Bulan',
      bookAuthor: 'Tere Liye',
      bookYear: 2021,
      bookImg: '/book/bumi.jpeg',
      bookSlug: 'bulan',
    },
    {
      bookId: 3,
      bookTitle: 'Bulans',
      bookAuthor: 'Tere Liye',
      bookYear: 2023,
      bookImg: '/book/bumi.jpeg',
      bookSlug: 'bulans',
    }
  ];

  const bookContainer = document.querySelector('#book-container');
  const noBooksFoundContainer = document.querySelector('#no-books-found');
  const searchContainer = document.querySelector('#search-container');
  const searchInput = document.querySelector('#search');
  const originalBooks = [...data]; // Store a copy of the original book data;

  function displayBooks(books) {
    // bookContainer.innerHTML = ''; // Clear the existing book cards.
    bookContainer.style.display = 'grid'; // Display the book container
    noBooksFoundContainer.style.display = 'none'; // Hide the "Buku tidak ditemukan" message
    for (let i = 0; i < books.length; i++) {
      const book = books[i];
      const bookCard = document.createElement('div');
      bookCard.classList.add(
        'card',
        'flex',
        'flex-column',
      );
      bookCard.innerHTML = `
        <div class="book-img rounded-4 w-full overflow-hidden mb-4 position-relative">
          <div class="position-absolute flex w-full h-full align-center justify-center" id="img-link" style="display: none;">
            <a href="/book/${book.bookSlug}" class="text-secondary-2 rounded-8 px-8 py-4 bg-primary-1 font-bold">Lihat Buku</a>
          </div>
          <img src="${book.bookImg}" alt="" class="w-full">
        </div>
        <div>
          <h4 class="text-xl font-bold">${book.bookTitle} (${book.bookYear})</h4>
          <h5 class="text-base">${book.bookAuthor}</h5>
        </div>
      `;
      // bookCard.addEventListener('click', () => {
      //   window.location.href = `/book/${book.bookSlug}`;
      // });
      bookContainer.appendChild(bookCard);
    }
    showBookLink();
  }

  function showBookLink() {
    const bookImgs = document.querySelectorAll('.book-img');
    bookImgs.forEach((bookImg) => {
      bookImg.addEventListener('mouseover', () => {
        bookImg.querySelector('#img-link').style.display = 'flex';
      });
      bookImg.addEventListener('mouseout', () => {
        bookImg.querySelector('#img-link').style.display = 'none';
      });
    });
  }

  function displayNoBooksFoundMessage() {
    // Clear the existing book cards.
    bookContainer.innerHTML = '';
    bookContainer.style.display = 'none';
    // Display the "Buku tidak ditemukan" message in the middle.
    noBooksFoundContainer.style.display = 'flex';
  }

  // Display all books initially.
  displayBooks(data);

  searchContainer.addEventListener('click', () => {
    searchInput.focus();
  });

  searchInput.addEventListener('keyup', (e) => {
    const keyword = e.target.value.toLowerCase();
    if (keyword === '') {
      // If the search input is empty, display all books again.
      displayBooks(data);
    } else {
      const filteredBooks = originalBooks.filter((book) => {
        const bookTitle = book.bookTitle.toLowerCase();
        const bookAuthor = book.bookAuthor.toLowerCase();
        return bookTitle.includes(keyword) || bookAuthor.includes(keyword);
      });
      if (filteredBooks.length === 0) {
        // If no books match the search, display the message in the middle.
        displayNoBooksFoundMessage();
      } else {
        // Display the filtered books.
        displayBooks(filteredBooks);
      }
    }
  });
</script>

<?php foreach($books as $row): ?>
    <div>
        <h3><?= $row['title'] ?></h3>
        <p><?= $row['synopsis'] ?></p>
        <p><?= $row['author'] ?></p>
        <p><?= $row['publisher'] ?></p>
        <p><?= $row['price'] ?></p>
        <p><?= $row['created_at'] ?></p>
        <p>
            <a href="/<?= $row['slug']; ?>">
                <img src="img/books/<?= $row['book_img']; ?>" alt="<?= $row['book_img']; ?>" width="150px">
            </a>
        </p>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>