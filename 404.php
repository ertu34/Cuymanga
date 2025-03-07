<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Tidak Ditemukan - <?=$site_name?></title>
  <meta name="robots" content="noindex, nofollow">
  <!-- SEO Meta Tags -->
  <meta name="description" content="Halaman yang Anda cari tidak ditemukan. Silakan kembali ke halaman utama.">
  <meta name="keywords" content="<?=$site_name?>, manga, baca manga, manga online, manga indonesia, komik, komik online">
  <meta name="author" content="Whyudacok">
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?=$site_url?>/404">
  <meta property="og:title" content="Halaman Tidak Ditemukan - <?=$site_name?>">
  <meta property="og:description" content="Halaman yang Anda cari tidak ditemukan. Silakan kembali ke halaman utama.">
  <meta property="og:image" content="<?=$image_og?>">
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?=$site_url?>/404">
  <meta property="twitter:title" content="Halaman Tidak Ditemukan - <?=$site_name?>">
  <meta property="twitter:description" content="Halaman yang Anda cari tidak ditemukan. Silakan kembali ke halaman utama.">
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
        "target": "<?=$site_url?>/library?search={search_term_string}",
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
    <section class="py-16 flex items-center justify-center min-h-[70vh] animate-fade-in">
      <div class="container mx-auto px-4 text-center">
        <div class="max-w-md mx-auto">
          <div class="mb-8 animate-fade-in" style="animation-delay: 0.2s;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
              <line x1="9" y1="9" x2="9.01" y2="9"></line>
              <line x1="15" y1="9" x2="15.01" y2="9"></line>
            </svg>
          </div>
          <h1 class="text-6xl font-bold mb-4 animate-fade-in" style="animation-delay: 0.4s;">404</h1>
          <h2 class="text-2xl font-semibold mb-4 animate-fade-in" style="animation-delay: 0.6s;">Halaman Tidak Ditemukan</h2>
          <p class="text-neutral-600 dark:text-neutral-400 mb-8 animate-fade-in" style="animation-delay: 0.8s;">
            Maaf, halaman yang Anda cari tidak ditemukan atau telah dipindahkan.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in" style="animation-delay: 1s;">
            <a href="/" class="px-6 py-3 bg-primary-500 hover:bg-primary-600 text-white font-medium rounded-lg transition-all duration-300 inline-flex items-center justify-center transform hover:-translate-y-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
              Kembali ke Beranda
            </a>
            <a href="/library" class="px-6 py-3 bg-neutral-200 dark:bg-neutral-700 hover:bg-neutral-300 dark:hover:bg-neutral-600 font-medium rounded-lg transition-all duration-300 inline-flex items-center justify-center transform hover:-translate-y-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
              </svg>
              Cari Manga
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include('includes/footer.php'); ?>
</body>
</html>