<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookmark - <?=$site_name ?></title>
  <link rel="canonical" href="<?=$site_url ?>/bookmark" />
  <!-- SEO Meta Tags -->
  <meta name="description" content="Daftar manga yang kamu simpan untuk dibaca nanti.">
  <meta name="keywords" content="<?=$site_name ?>, manga, baca manga, manga online, manga indonesia, komik, komik online">
  <meta name="author" content="Whyudacok">
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?=$site_url ?>/bookmark">
  <meta property="og:title" content="Bookmark - <?=$site_name ?>">
  <meta property="og:description" content="Daftar manga yang kamu simpan untuk dibaca nanti.">
  <meta property="og:image" content="<?=$image_og ?>">
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?=$site_url ?>/bookmark">
  <meta property="twitter:title" content="Bookmark - <?=$site_name ?>">
  <meta property="twitter:description" content="Daftar manga yang kamu simpan untuk dibaca nanti.">
  <meta property="twitter:image" content="<?=$image_og ?>">
  <!-- Schema.org markup -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "<?=$site_name ?>",
      "url": "<?=$site_url ?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "<?=$site_url ?>library?search={search_term_string}",
        "query-input": "required name=search_term_string"
      },
      "description": "Baca manga terbaru dan terpopuler secara online dengan kualitas terbaik di MangaKu."
    }
  </script>
  <?php include('includes/header.php'); ?>
</head>
<body class="bg-neutral-100 text-neutral-900 dark:bg-neutral-900 dark:text-neutral-100 transition-colors duration-300">
  <?php include('includes/navbar.php'); ?>
  <!-- Main Content -->
  <main class="min-h-screen pt-16">
    <section class="py-12 bg-neutral-100 dark:bg-neutral-800">
      <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8 text-center text-neutral-800 dark:text-white">Bookmark Manga</h1>
        <div id="bookmarkList" class="grid grid-cols-3 gap-4 sm:grid-cols-2 lg:grid-cols-3 w-full">
        </div>
        <div id="emptyBookmark" class="text-center py-12 hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-neutral-400 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
          </svg>
          <h2 class="text-xl font-semibold text-neutral-600 dark:text-neutral-400 mb-2">Belum ada bookmark</h2>
          <p class="text-neutral-500 dark:text-neutral-500">
            Mulai menambahkan manga ke bookmark Anda!
          </p>
        </div>
      </div>
    </section>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const bookmarkList = document.getElementById('bookmarkList');
        const emptyBookmark = document.getElementById('emptyBookmark');

        function loadBookmarks() {
          const bookmarks = JSON.parse(localStorage.getItem('mangaBookmarks')) || [];
          bookmarkList.innerHTML = '';

          if (bookmarks.length === 0) {
            emptyBookmark.classList.remove('hidden');
          } else {
            emptyBookmark.classList.add('hidden');
            bookmarks.forEach((bookmark, index) => {
              const bookmarkItem = createBookmarkItem(bookmark, index);
              bookmarkList.appendChild(bookmarkItem);
            });
          }
        }

        function createBookmarkItem(bookmark, index) {
          const item = document.createElement('div');
          item.className = 'bg-white dark:bg-neutral-800 rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg animate-fade-in';
          item.style.animationDelay = "0s";
          item.innerHTML = `
          <a href="${bookmark.link}" class="block relative w-full aspect-[3/4] overflow-hidden">
          <img src="${bookmark.img}" alt="${bookmark.title}" class="absolute inset-0 w-full h-full object-cover">
          </a>
          <div class="p-2">
          <h3 class="font-semibold text-xs mb-1 line-clamp-1">
          <a href="${bookmark.link}" class="hover:text-primary-500 transition-colors">${bookmark.title}</a>
          </h3>
          <button onclick="removeBookmark(${index})" class="w-full mt-1 px-2 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600 transition-colors">
          Hapus
          </button>
          </div>
          `;
          return item;
        }

        window.removeBookmark = function(index) {
          let bookmarks = JSON.parse(localStorage.getItem('mangaBookmarks')) || [];
          bookmarks.splice(index, 1);
          localStorage.setItem('mangaBookmarks', JSON.stringify(bookmarks));
          loadBookmarks();
        }

        loadBookmarks();
      });
    </script>

  </main>
  <?php include('includes/footer.php'); ?>
</body>
</html>