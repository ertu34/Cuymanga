<?php
include('config.php');
$komil_id = $_GET['id'] ?? null;
$url = "$url_api/api.php?komik=$komil_id";
$response = file_get_contents($url);
$data = json_decode($response, true);

$status = $data['status'] ?? false;
$message = $data['message'] ?? 'Terjadi kesalahan'; //lupa klo ada sistem cache:v
$komik_data = $data['data'] ?? [];
$detail = $komik_data['detail'] ?? [];
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$komik_data['judul'] ?? 'N/A' ?> - <?=$site_name ?></title>
  <link rel="canonical" href="<?=$site_url ?>/komik.php<?=$komik_id ?>" />
  <!-- SEO Meta Tags -->
  <meta name="description" content="<?= substr($komik_data['desk'] ?? 'N/A', 0, 160) ?>...">
  <meta name="keywords" content="<?=$site_name ?>, manga, baca manga, manga online, manga indonesia, komik, komik online">
  <meta name="author" content="Whyudacok">
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?=$site_url ?>/komik.php<?=$komik_id ?>">
  <meta property="og:title" content="<?=$komik_data['judul'] ?? 'N/A' ?> - <?=$site_name ?>">
  <meta property="og:description" content="<?= substr($komik_data['desk'] ?? 'N/A', 0, 160) ?>...">
  <meta property="og:image" content="<?=$komik_data['gambar'] ?? 'N/A' ?>">
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?=$site_url ?>/komik.php<?=$komik_id ?>">
  <meta property="twitter:title" content="<?=$komik_data['judul'] ?? 'N/A' ?> - <?=$site_name ?>">
  <meta property="twitter:description" content="<?= substr($komik_data['desk'] ?? 'N/A', 0, 160) ?>...">
  <meta property="twitter:image" content="<?=$komik_data['gambar'] ?? 'N/A' ?>">
  <!-- Schema.org markup -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "<?=$site_name ?>",
      "url": "<?=$site_url ?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "<?=$site_url ?>/library.php.php?search={search_term_string}",
        "query-input": "required name=search_term_string"
      },
      "description": "Baca manga terbaru dan terpopuler secara online dengan kualitas terbaik di <?=$site_name ?>."
    }
  </script>
  <?php include('includes/header.php'); ?>
</head>
<body class="bg-neutral-100 text-neutral-900 dark:bg-neutral-900 dark:text-neutral-100 transition-colors duration-300">
  <?php include('includes/navbar.php'); ?>
  <!-- Main Content -->
  <main class="min-h-screen pt-16">
    <section class="relative pt-4 pb-8 md:pt-8 md:pb-16 overflow-hidden animate-fade-in">
      <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-neutral-900 to-neutral-800 opacity-90"></div>
        <img src="<?=$komik_data['gambar'] ?? 'N/A' ?>" alt="<?=$komik_data['judul'] ?? 'N/A' ?>" class="w-full h-full object-cover opacity-20 blur-[10px]">
      </div>
      <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row gap-4 md:gap-8">
          <div class="flex-shrink-0 mx-auto md:mx-0">
            <div class="w-48 md:w-64 aspect-[3/4] rounded-lg overflow-hidden shadow-lg">
              <img src="<?=$komik_data['gambar'] ?? 'N/A' ?>" alt="<?=$komik_data['judul'] ?? 'N/A' ?>" class="w-full h-full object-cover">
            </div>
          </div>
          <!-- Manga Info -->
          <div class="flex-grow text-white">
            <div class="flex flex-col md:hidden mb-2">
              <h1 class="text-xl  sm:text-2xl md:text-3xl font-bold mb-2"><?=$komik_data['judul'] ?? 'N/A' ?></h1>
              <div class="flex flex-wrap gap-2 mb-2">
                <?php foreach ($komik_data['genre'] ?? [] as $g): ?><span class="px-2 py-1 bg-primary-500/40 backdrop-blur-sm rounded-full text-xs"><a href="/library.php?genre=<?= basename($g['link'] ?? '#') ?>"><?=$g['nama'] ?? 'N/A' ?></a></span><?php endforeach; ?>
              </div>
            </div>
            <div class="hidden md:block">
              <h1 class="text-2xl md:text-4xl font-bold mb-4"><?=$komik_data['judul'] ?? 'N/A' ?></h1>
              <div class="flex flex-wrap gap-2 mb-4">
                <?php foreach ($komik_data['genre'] ?? [] as $g): ?><span class="px-3 py-1 bg-primary-500/40 backdrop-blur-sm rounded-full text-sm"><a href="/library.php?genre=<?= basename($g['link'] ?? '#') ?>"><?=$g['nama'] ?? 'N/A' ?></a></span><?php endforeach; ?>
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 mb-4 md:mb-6">
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <div>
                  <h3 class="text-neutral-400 text-xs md:text-sm">Ilustrator</h3>
                  <p class="text-sm">
                    <?=$detail['ilustrator'] ?? 'N/A' ?>
                  </p>
                </div>
              </div>
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <div>
                  <h3 class="text-neutral-400 text-xs md:text-sm">Author</h3>
                  <p class="text-sm">
                    <?=$detail['pengarang'] ?? 'N/A' ?>
                  </p>
                </div>
              </div>
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <div>
                  <h3 class="text-neutral-400 text-xs md:text-sm">Status</h3>
                  <p class="text-sm">
                    <?=$detail['status'] ?? 'N/A' ?>
                  </p>
                </div>
              </div>
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <div>
                  <h3 class="text-neutral-400 text-xs md:text-sm">Type</h3>
                  <p class="text-sm">
                    <?=$detail['jenis_komik'] ?? 'N/A' ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap gap-2 md:gap-4">
              <?php if (!empty($komik_data['chapter_terbaru']['link_chapter'])): ?>
              <a href="/chapter.php?c=<?= ltrim($komik_data['chapter_terbaru']['link_chapter'], '/') ?>"
                class="px-4 py-2 md:px-6 md:py-3 bg-primary-500 hover:bg-primary-600 text-white font-medium rounded-lg transition-colors inline-flex items-center text-sm md:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 mr-1 md:mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                  <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                Baca Chapter Terbaru
              </a>
              <?php endif; ?>
              <?php if (!empty($komik_data['chapter_awal']['link_chapter'])): ?>
              <a href="/chapter.php?c=<?= ltrim($komik_data['chapter_awal']['link_chapter'], '/') ?>"
                class="px-4 py-2 md:px-6 md:py-3 bg-neutral-700 hover:bg-neutral-600 text-white font-medium rounded-lg transition-colors inline-flex items-center text-sm md:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 mr-1 md:mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="23 4 23 10 17 10"></polyline>
                  <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                </svg>
                Baca Dari Awal
              </a>
              <?php endif; ?>
              <button id="addBookmark" class="px-4 py-2 md:px-6 md:py-3 bg-primary-500 hover:bg-primary-600 text-white font-medium rounded-lg transition-colors inline-flex items-center text-sm md:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                </svg>
                Tambah ke Bookmark
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Manga Synopsis -->
    <section class="py-4 md:py-8 bg-white dark:bg-neutral-800 animate-fade-in">
      <div class="container mx-auto px-4">
        <h2 class="text-lg sm:text-xl md:text-2xl font-bold mb-2 md:mb-4 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <line x1="16" y1="13" x2="8" y2="13"></line>
            <line x1="16" y1="17" x2="8" y2="17"></line>
            <polyline points="10 9 9 9 8 9"></polyline>
          </svg>
          Sinopsis
        </h2>
        <p class="text-neutral-700 dark:text-neutral-300 text-sm sm:text-base leading-snug md:leading-relaxed">
          <?=$komik_data['desk'] ?? 'N/A' ?>
        </p>
      </div>
    </section>
    <!-- Chapter List -->
    <section class="py-8 animate-fade-in">
      <div class="container mx-auto px-4">
        <div class="bg-white dark:bg-neutral-800 rounded-xl shadow-sm p-6">
          <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <h2 class="text-2xl font-bold flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
              </svg>
              Daftar Chapter
            </h2>
            <div class="flex flex-row gap-2 w-full sm:w-auto">
              <!-- Search Input -->
              <div class="relative flex-grow max-w-[180px] sm:max-w-md">
                <input type="number" id="chapterSearch" placeholder="Cari chapter..." class="w-full px-3 py-1.5 pl-10 bg-neutral-100 dark:bg-neutral-700 border border-neutral-200 dark:border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm sm:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
              </div>
              <!-- Sort Toggle -->
              <div class="flex-shrink-0">
                <button id="sortToggle" class="px-3 py-1.5 bg-neutral-100 dark:bg-neutral-700 border border-neutral-200 dark:border-neutral-600 rounded-lg hover:bg-neutral-200 dark:hover:bg-neutral-600 transition-colors flex items-center gap-2 text-sm sm:text-base">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l4-4 4 4m-4-4v14"></path>
                    <path d="M21 15l-4 4-4-4m4 4V5"></path>
                  </svg>
                  <span id="sortLabel">Terbaru</span>
                </button>
              </div>
            </div>
          </div>
          <div id="chapterList" class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-96 overflow-y-auto">
            <?php foreach ($komik_data['daftar_chapter'] ?? [] as $chap): ?>
            <a href="/chapter.php?c=<?= ltrim($chap['link_chapter'] ?? '#', '/') ?>"
              class="flex items-center p-4 bg-neutral-50 dark:bg-neutral-700/50 rounded-lg hover:bg-neutral-100 dark:hover:bg-neutral-700 transition-colors transform hover:-translate-y-1 duration-300 group animate-fade-in"
              style="animation-delay: 0.05s">
              <div class="flex-shrink-0 mr-4 bg-primary-100 dark:bg-primary-900/30 text-primary-500 rounded-full w-12 h-12 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                  <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
              </div>
              <div class="flex-grow">
                <h3 class="font-medium group-hover:text-primary-500 transition-colors"><?=$chap['judul_chapter'] ?? 'N/A' ?></h3>
              </div>
              <div class="flex-shrink-0 flex items-center">
                <span class="text-sm text-neutral-500 dark:text-neutral-400 mr-2"><?=$chap['waktu_rilis'] ?? 'N/A' ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-neutral-400 group-hover:text-primary-500 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </div>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const chapterSearch = document.getElementById('chapterSearch');
      const chapterList = document.getElementById('chapterList');
      const sortToggle = document.getElementById('sortToggle');
      const sortLabel = document.getElementById('sortLabel');
      const chapters = Array.from(chapterList.children);
      let isNewestFirst = true;

      chapterSearch.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        chapters.forEach(chapter => {
          const chapterTitle = chapter.querySelector('h3').textContent.toLowerCase();
          const isVisible = chapterTitle.includes(searchTerm);
          chapter.style.display = isVisible ? 'flex': 'none';
        });
      });

      // Sort functionality
      sortToggle.addEventListener('click', function() {
        isNewestFirst = !isNewestFirst;
        sortLabel.textContent = isNewestFirst ? 'Terbaru': 'Terlama';
        chapters.forEach(chapter => {
          chapterList.removeChild(chapter);
        });

        // Sort chapter
        chapters.sort((a, b) => {
          const aNumber = parseInt(a.querySelector('h3').textContent.match(/\d+/)[0]);
          const bNumber = parseInt(b.querySelector('h3').textContent.match(/\d+/)[0]);

          return isNewestFirst ? bNumber - aNumber: aNumber - bNumber;
        });
        chapters.forEach(chapter => {
          chapterList.appendChild(chapter);
        });
      });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const addBookmarkBtn = document.getElementById('addBookmark');
      const mangaId = <?= $komik_data['id'] ?? 1 ?>;
      const mangaTitle = "<?= addslashes($komik_data['judul'] ?? 'N/A') ?>";
      const mangaImage = "<?= $komik_data['gambar'] ?? 'N/A' ?>";
      const mangaLink = window.location.href;

      addBookmarkBtn.addEventListener('click', function() {
        let bookmarks = JSON.parse(localStorage.getItem('mangaBookmarks')) || [];
        const isBookmarked = bookmarks.some(bookmark => bookmark.id === mangaId);

        if (!isBookmarked) {
          bookmarks.push({
            id: mangaId,
            title: mangaTitle,
            img: mangaImage,
            link: mangaLink
          });
          localStorage.setItem('mangaBookmarks', JSON.stringify(bookmarks));
          alert('Manga berhasil ditambahkan ke bookmark!');
          addBookmarkBtn.textContent = 'Sudah di Bookmark';
          addBookmarkBtn.disabled = true;
        } else {
          alert('Manga ini sudah ada di bookmark kamu.');
        }
      });

      // Periksa apakah manga sudah ditandai saat halaman di load
      let bookmarks = JSON.parse(localStorage.getItem('mangaBookmarks')) || [];
      const isBookmarked = bookmarks.some(bookmark => bookmark.id === mangaId);

      if (isBookmarked) {
        addBookmarkBtn.textContent = 'Sudah di Bookmark';
        addBookmarkBtn.disabled = true;
      }
    });
  </script>
  <?php include('includes/footer.php'); ?>
</body>
</html>