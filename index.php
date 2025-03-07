<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$site_name ?> - Baca Manga Online Terlengkap</title>
  <link rel="canonical" href="<?=$site_url ?>" />
  <!-- SEO Meta Tags -->
  <meta name="description" content="Baca manga terbaru dan terpopuler secara online dengan kualitas terbaik di <?=$site_name ?>. Update setiap hari dengan koleksi manga terlengkap.">
  <meta name="keywords" content="manga, baca manga, manga online, manga indonesia, komik, komik online, baca manga bahasa Indonesia, <?=$site_name ?>">
  <meta name="author" content="Whyudacok">
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?=$site_url ?>">
  <meta property="og:title" content="<?=$site_name ?> - Baca Manga Online Terlengkap">
  <meta property="og:description" content="Baca manga terbaru dan terpopuler secara online dengan kualitas terbaik di <?=$site_name ?>. Update setiap hari dengan koleksi manga terlengkap.">
  <meta property="og:image" content="<?=$image_og ?>">
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?=$site_url ?>">
  <meta property="twitter:title" content="<?=$site_name ?> - Baca Manga Online Terlengkap">
  <meta property="twitter:description" content="Baca manga terbaru dan terpopuler secara online dengan kualitas terbaik di <?=$site_name ?>. Update setiap hari dengan koleksi manga terlengkap.">
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
        "target": "<?=$site_url ?>/library?search={search_term_string}",
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
    <!-- Popular Manga -->
    <?php
    $url = "$url_api/api.php?latest=1&page=1";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    $status = $data['status'] ?? false;
    $message = $data['message'] ?? 'Terjadi kesalahan';
    $komik = $data['data']['komik'] ?? [];
    $komik_populer = $data['data']['komik_populer'] ?? [];
    ?>
    <section class="py-12 bg-neutral-50 dark:bg-neutral-800/50 animate-fade-in">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
          <h2 class="text-2xl font-bold flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
            </svg>
            Komik Populer
          </h2>
        </div>
        <div class="flex overflow-x-auto space-x-4 p-4 scrollbar-hide">
          <?php foreach ($komik_populer as $kp): ?>
          <div class="relative group animate-fade-in shrink-0 w-[160px]">
            <div class="relative group">
              <a href="/komik.php?id=<?= basename($kp['link'] ?? '#') ?>"
                class="group/card relative block w-[160px] h-[220px] rounded-2xl overflow-hidden snap-start transform transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_0_40px_rgba(249,115,22,0.15)]">
                <div class="absolute inset-0">
                  <img src="<?=$kp['gambar'] ?? 'N/A' ?>"
                  alt="<?=$kp['judul'] ?? 'N/A' ?> "
                  class="h-full w-full object-cover transition-all duration-700 ease-out transform group-hover/card:scale-105"
                  loading="lazy">
                  <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-900/90 to-transparent opacity-20"></div>
                  <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/20 to-transparent"></div>
                  <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 blur-2xl rounded-full transform translate-x-16 -translate-y-16"></div>
                </div>
                <div class="relative h-full flex flex-col justify-end p-4">
                  <div class="absolute top-2 left-3 right-3 flex justify-between">
                    <span class="px-2 py-[2px] rounded-full text-[10px] font-medium bg-primary-500/50 text-white">
                      #<?=$kp['peringkat'] ?? '#' ?>
                    </span>
                    <span class="px-2 py-[2px] rounded-full text-[10px] font-medium bg-primary-500/50 text-white"><?=$kp['rating'] ?? 'N/A' ?> </span>
                  </div>
                  <hr class="border-t border-neutral-700 my-2">
                  <h3 class="text-sm font-semibold text-neutral-50 text-center leading-tight max-w-[80%] mx-auto truncate-2 group-hover/card:text-primary transition-colors">
                    <?=$kp['judul'] ?? 'N/A' ?>
                  </h3>
                </div>
              </a>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php if (!$status): ?>
    <p class="text-red-500 font-semibold text-center">
      API Error: <?= $message ?>
    </p>
    <?php endif; ?>
    <!-- Manga terbaru ye-->
    <section class="py-12 animate-fade-in">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
          <h2 class="text-2xl font-bold flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="23 4 23 10 17 10"></polyline>
              <polyline points="1 20 1 14 7 14"></polyline>
              <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
            </svg>
            Update Terbaru
          </h2>
          <a href="/library.php" class="text-primary-500 hover:text-primary-600 font-medium flex items-center">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </a>
        </div>
        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 w-full">
          <?php foreach ($komik as $k): ?>
          <div class="bg-white dark:bg-neutral-800 rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg animate-fade-in" style="animation-delay: 0s">
            <a href="/komik.php?id=<?= str_replace('/komik/', '', $k['link'] ?? '#') ?>" class="block relative pb-[120%]">
              <img src="<?=$k['gambar'] ?? 'N/A' ?>" alt="Hana wa Saku, Shura no Gotoku" class="absolute inset-0 w-full h-full object-cover">
              <div class="absolute top-2 left-2 bg-primary-500/50 text-white text-xs font-bold px-2 py-1 rounded">
                <?=$k['tipe'] ?? 'N/A' ?>
              </div>
            </a>
            <div class="p-3">
              <h3 class="font-semibold text-sm mb-1 line-clamp-1">
                <a href="/komik.php?id=<?= str_replace('/komik/', '', $k['link'] ?? '#') ?>" class="hover:text-primary-500 transition-colors">
                  <?=$k['judul'] ?? 'N/A' ?>            </a>
              </h3>
              <?php $c = $k['chapter'][0] ?? null; ?>
              <?php if ($c): ?>
              <div class="flex justify-between text-xs text-neutral-600 dark:text-neutral-400">
                <span> <a href="/chapter.php?c=<?= ltrim($c['link'] ?? '#', '/') ?>"><?= $c['judul'] ?? 'N/A' ?></a></span>
                <span><?= $c['tanggal_rilis'] ?? 'N/A' ?></span>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- Genres Section -->
    <section class="py-12 animate-fade-in">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
          <h2 class="text-2xl font-bold flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
              <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            Genre Manga
          </h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
          <a href="/library.php?genre=action"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 0.1s">
            <span class="font-medium">Action</span>
          </a>
          <a href="/library.php?genre=adventure"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 0.2s">
            <span class="font-medium">Adventure</span>
          </a>
          <a href="/library.php?genre=boys-love"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 0.3s">
            <span class="font-medium">Boys&#039; Love</span>
          </a>
          <a href="/library.php?genre=comedy"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 0.4s">
            <span class="font-medium">Comedy</span>
          </a>
          <a href="/library.php?genre=crime"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 0.5s">
            <span class="font-medium">Crime</span>
          </a>
          <a href="/library.php?genre=drama"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 0.6s">
            <span class="font-medium">Drama</span>
          </a>
          <a href="/library.php?genre=fantasy"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 0.7s">
            <span class="font-medium">Fantasy</span>
          </a>
          <a href="/library.php?genre=girls-love"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 0.8s">
            <span class="font-medium">Girls&#039; Love</span>
          </a>
          <a href="/library.php?genre=harem"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 0.9s">
            <span class="font-medium">Harem</span>
          </a>
          <a href="/library.php?genre=historical"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1s">
            <span class="font-medium">Historical</span>
          </a>
          <a href="/library.php?genre=horror"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1.1s">
            <span class="font-medium">Horror</span>
          </a>
          <a href="/library.php?genre=isekai"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1.2s">
            <span class="font-medium">Isekai</span>
          </a>
          <a href="/library.php?genre=magical-girls"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1.3s">
            <span class="font-medium">Magical Girls</span>
          </a>
          <a href="/library.php?genre=mecha"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1.4s">
            <span class="font-medium">Mecha</span>
          </a>
          <a href="/library.php?genre=medical"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1.5s">
            <span class="font-medium">Medical</span>
          </a>
          <a href="/library.php?genre=music"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1.6s">
            <span class="font-medium">Music</span>
          </a>
          <a href="/library.php?genre=mystery"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1.7s">
            <span class="font-medium">Mystery</span>
          </a>
          <a href="/library.php?genre=philosophical"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1.8s">
            <span class="font-medium">Philosophical</span>
          </a>
          <a href="/library.php?genre=psychological"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 1.9s">
            <span class="font-medium">Psychological</span>
          </a>
          <a href="/library.php?genre=romance"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2s">
            <span class="font-medium">Romance</span>
          </a>
          <a href="/library.php?genre=sci-fi"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2.1s">
            <span class="font-medium">Sci-Fi</span>
          </a>
          <a href="/library.php?genre=shoujo-ai"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2.2s">
            <span class="font-medium">Shoujo Ai</span>
          </a>
          <a href="/library.php?genre=shounen-ai"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2.3s">
            <span class="font-medium">Shounen Ai</span>
          </a>
          <a href="/library.php?genre=slice-of-life"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2.4s">
            <span class="font-medium">Slice of Life</span>
          </a>
          <a href="/library.php?genre=sports"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2.5s">
            <span class="font-medium">Sports</span>
          </a>
          <a href="/library.php?genre=superhero"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2.6s">
            <span class="font-medium">Superhero</span>
          </a>
          <a href="/library.php?genre=thriller"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2.7s">
            <span class="font-medium">Thriller</span>
          </a>
          <a href="/library.php?genre=tragedy"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2.8s">
            <span class="font-medium">Tragedy</span>
          </a>
          <a href="/library.php?genre=wuxia"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 2.9s">
            <span class="font-medium">Wuxia</span>
          </a>
          <a href="/library.php?genre=yuri"
            class="bg-white dark:bg-neutral-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 p-4 text-center transform hover:-translate-y-1 hover:bg-primary-50 dark:hover:bg-neutral-700 animate-fade-in"
            style="animation-delay: 3s">
            <span class="font-medium">Yuri</span>
          </a>
        </div>
      </div>
    </section>
  </main>
  <?php include('includes/footer.php'); ?>
</body>
</html>