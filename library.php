<?php
include('config.php');
$query = $_SERVER['QUERY_STRING'];
parse_str($query, $params);

// Hapus 'q' kalau ada
unset($params['q']);
$page = isset($params['page']) ? max(1, (int)$params['page']) : 1;
if (isset($params['search'])) {
  $search_query = htmlspecialchars($params['search'], ENT_QUOTES, 'UTF-8'); // Bersihin input
  $api_link = "$url_api/api.php?s=" . urlencode($search_query) . "&page=" . urlencode($page);
} elseif (isset($params['genre'])) {
  $genre_query = urlencode($params['genre']);
  $api_link = "$url_api/api.php?genre=$genre_query&page=$page";
} else {
  $api_link = "$url_api/api.php?daftar=" . urlencode($page);
}
$api_url = $api_link;

$data = [];
if ($api_url) {
  $response = file_get_contents($api_url);
  $data = json_decode($response, true);
}
// Ambil daftar komik
$komik_list = $data['data']['komik'] ?? [];
$total_halaman = $data['data']['total_halaman'] ?? 1; // Default 1 halaman kalau tidak ada
$total_komik = count($komik_list);

unset($params['page']);
$queryString = http_build_query($params);
$baseUrl = '?' . ($queryString ? $queryString . '&' : '');

?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Komik - <?=$site_name?></title>
  <link rel="canonical" href="<?=$site_url?>/library.php" />
  <!-- SEO Meta Tags -->
  <meta name="description" content="Temukan koleksi manga terlengkap di <?=$site_name?>. Cari manga favorit kamu berdasarkan judul, genre, atau penulis.">
  <meta name="keywords" content="<?=$site_name?>, manga, baca manga, manga online, manga indonesia, komik, komik online">
  <meta name="author" content="Whyudacok">
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?=$site_url?>/library.php">
  <meta property="og:title" content="Daftar Manga - <?=$site_name?>">
  <meta property="og:description" content="Temukan koleksi manga terlengkap di <?=$site_name?>. Cari manga favorit kamu berdasarkan judul, genre, atau penulis.">
  <meta property="og:image" content="<?=$image_og?>">
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?=$site_url?>/library.php">
  <meta property="twitter:title" content="Daftar Manga - <?=$site_name?>">
  <meta property="twitter:description" content="Temukan koleksi manga terlengkap di <?=$site_name?>. Cari manga favorit kamu berdasarkan judul, genre, atau penulis.">
  <meta property="twitter:image" content="<?=$image_og?>">
  <!-- Schema.org markup -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "<?=$site_name?>",
      "url": "<?=$site_url?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "<?=$site_url?>/library.php?search={search_term_string}",
        "query-input": "required name=search_term_string"
      },
      "description": "Baca manga terbaru dan terpopuler secara online dengan kualitas terbaik di <?=$site_name?>."
    }
  </script>
  <?php include('includes/header.php'); ?>
</head>
<body class="bg-neutral-100 text-neutral-900 dark:bg-neutral-900 dark:text-neutral-100 transition-colors duration-300">
  <?php include('includes/navbar.php'); ?>
  <!-- Main Content -->
  <main class="min-h-screen pt-16">
    <section class="py-8 bg-white dark:bg-neutral-800 animate-fade-in">
      <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
          <h1 class="text-2xl font-bold mb-6 text-center flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            Cari Manga
          </h1>
          <form action="/library.php" method="get" class="mb-8">
            <div class="relative">
              <input type="text" name="search" value="" placeholder="Masukkan judul manga..." class="w-full px-4 py-3 pl-10 bg-neutral-100 dark:bg-neutral-700 border border-neutral-200 dark:border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
              </svg>
              <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary-500 hover:bg-primary-600 text-white p-2 rounded-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </button>
            </div>
          </form>
          <?php if (isset($params['search'])): ?>
          <div class="text-center mb-8 animate-fade-in">
            <p class="text-neutral-600 dark:text-neutral-400">
              Hasil pencarian untuk "<?=$search_query ?>" (<?=$total_komik ?> hasil)
            </p>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <?php if (!$api_url): ?>
    <p class="text-red-500 font-semibold text-center">
      ada yang salah dengan Parameter
    </p>
    <?php elseif (!$data || !$data['status']): ?>
    <p class="text-red-500 font-semibold text-center">
      ada yang salah dengan API!
    </p>
    <?php else : ?>
    <!-- Manga List -->
    <section class="py-8 animate-fade-in">
      <div class="container mx-auto px-4">
        <?php if ($total_komik == 0): ?>
        <div class="text-center py-12 animate-fade-in">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-neutral-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
            <line x1="9" y1="9" x2="9.01" y2="9"></line>
            <line x1="15" y1="9" x2="15.01" y2="9"></line>
          </svg>
          <h2 class="text-xl font-semibold mb-2">Tidak ada hasil yang ditemukan</h2>
          <p class="text-neutral-600 dark:text-neutral-400">
            Coba cari dengan kata kunci lain
          </p>
        </div>
        <?php else : ?>
        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-4 w-full">
          <?php foreach ($komik_list as $komik): ?>
          <div class="relative group animate-fade-in" style="animation-delay: 0s">
            <div class="relative group">
              <a href="/komik.php?id=<?=$komik['link'] = str_replace('/komik/', '', $komik['link'])?>"
                class="group/card relative block w-full aspect-[3/4] rounded-lg overflow-hidden snap-start transform transition-all duration-300 hover:-translate-y-1 shadow-lg shadow-black/10 hover:shadow-[0_0_40px_rgba(249,115,22,0.15)]">
                <div class="absolute inset-0">
                  <img src="<?=$komik['gambar'] ?>"
                  alt="<?=$komik['judul'] ?>"
                  class="h-full w-full object-cover transition-all duration-500 ease-out transform group-hover/card:scale-105"
                  loading="lazy">
                  <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-900/90 to-transparent opacity-50"></div>
                  <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/20 to-transparent"></div>
                  <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 blur-2xl rounded-full transform translate-x-16 -translate-y-16"></div>
                </div>
                <div class="relative h-full flex flex-col justify-end p-4">
                  <div class="absolute top-2 left-3 right-3 flex justify-between">
                    <span class="px-2 py-[2px] rounded-full text-[10px] sm:text-xs font-medium bg-primary-500 text-white"><?=$komik['tipe'] ?></span>
                    <span class="px-2 py-[2px] rounded-full text-[10px] sm:text-xs font-medium bg-primary-500 text-white"><?=$komik['rating'] ?></span>
                  </div>
                  <hr class="border-t border-neutral-700 my-2">
                  <h3 class="text-xs sm:text-sm md:text-base font-semibold text-neutral-50 line-clamp-2  text-center leading-tight max-w-[80%] mx-auto truncate-2 group-hover/card:text-primary transition-colors">
                    <?=$komik['judul'] ?>
                  </h3>
                </div>
              </a>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="flex justify-center items-center space-x-2 mt-7">
        <?php if ($page > 1): ?>
        <a href="<?= $baseUrl ?>page=<?= $page - 1; ?>" class="px-2 py-1 text-sm hover:text-primary-500 dark:hover:border-primary-500 hover:border-primary-500 border border-neutral-700 dark:border-neutral-500 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </a>
        <?php endif; ?>
        <?php
        $startPage = max(1, floor(($page - 1) / 5) * 5 + 1);
        $endPage = min($startPage + 4, $total_halaman);
        for ($i = $startPage; $i <= $endPage; $i++):
        ?>
        <?php if ($i == $page): ?>
        <span class="px-3 py-1 text-sm font-semibold text-primary-500 border border-primary-500 rounded-lg"><?= $i; ?></span>
        <?php else : ?>
        <a href="<?= $baseUrl ?>page=<?= $i; ?>" class="px-3 py-1 text-sm border border-neutral-700 dark:border-neutral-500 rounded-lg hover:text-primary-500 dark:hover:border-primary-500 hover:border-primary-500"><?= $i; ?></a>
        <?php endif; ?>
        <?php endfor; ?>
        <?php if ($endPage < $total_halaman): ?>
        <a href="<?= $baseUrl ?>page=<?= $total_halaman; ?>" class="px-3 py-1 text-sm border border-neutral-700 dark:border-neutral-500 rounded-lg hover:text-primary-500 dark:hover:border-primary-500 hover:border-primary-500"><?= $total_halaman; ?></a>
        <?php endif; ?>
        <?php if ($page < $total_halaman): ?>
        <a href="<?= $baseUrl ?>page=<?= $page + 1; ?>" class="px-2 py-1 text-sm hover:text-primary-500 dark:hover:border-primary-500 hover:border-primary-500 border border-neutral-700 dark:border-neutral-500 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </a>
        <?php endif; ?>
      </div>
    </section>
  </main>
  <?php include('includes/footer.php'); ?>
</body>
</html>