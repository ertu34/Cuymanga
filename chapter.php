<?php
include('config.php');
$chapter_id = $_GET['c'] ?? null;
$url = "$url_api/api.php?chapter=$chapter_id";
$response = file_get_contents($url);
$data = json_decode($response, true);

$status = $data['status'] ?? false;
$message = $data['message'] ?? 'Terjadi kesalahan';
$chapter_data = $data['data'] ?? [];
$info_komik = $chapter_data['info_komik'] ?? [];
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$chapter_data['judul'] ?? 'N/A' ?> - <?=$site_name ?></title>
  <link rel="canonical" href="<?=$site_url ?>/chapter.php/<?=$chapter_id?>" />
  <!-- SEO Meta Tags -->
  <meta name="description" content="Baca <?=$chapter_data['judul'] ?? 'N/A' ?> online di <?=$site_name ?>. <?= substr($info_komik['desk'] ?? 'N/A', 0, 130) ?>...">
  <meta name="keywords" content="<?=$site_name ?>, manga, baca manga, manga online, manga indonesia, komik, komik online">
  <meta name="author" content="Whyudacok">
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?=$site_url ?>/chapter.php/<?=$chapter_id?>">
  <meta property="og:title" content="<?=$chapter_data['judul'] ?? 'N/A' ?> - <?=$site_name ?>">
  <meta property="og:description" content="Baca <?=$chapter_data['judul'] ?? 'N/A' ?> online di <?=$site_name ?>. <?= substr($info_komik['desk'] ?? 'N/A', 0, 130) ?>...">
  <meta property="og:image" content="<?=$image_kit?><?=$chapter_data['thumbnail']['url'] ?? 'N/A' ?>">
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?=$site_url ?>/chapter.php/<?=$chapter_id?>">
  <meta property="twitter:title" content="<?=$chapter_data['judul'] ?? 'N/A' ?> - <?=$site_name ?>">
  <meta property="twitter:description" content="Baca <?=$chapter_data['judul'] ?? 'N/A' ?> online di <?=$site_name ?>. <?= substr($info_komik['desk'] ?? 'N/A', 0, 130) ?>...">
  <meta property="twitter:image" content="<?=$image_kit?><?=$chapter_data['thumbnail']['url'] ?? 'N/A' ?>">
  <!-- Schema.org markup -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "<?=$site_name ?>",
      "url": "<?=$site_url ?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "<?=$site_url ?>/library.php?search={search_term_string}",
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
    <!-- Chapter Header -->
    <section class="bg-white dark:bg-neutral-800 border-b border-neutral-200 dark:border-neutral-700 py-4 animate-fade-in">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
          <div>
            <h1 class="text-xl font-bold flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
              </svg>
              <?=$chapter_data['judul'] ?? 'N/A' ?>               </h1>
          </div>
          <div class="flex gap-2">
            <?php if (!empty($chapter_data['navigasi']['sebelumnya'])): ?>
            <a href="/chapter.php?c=<?= ltrim($chapter_data['navigasi']['sebelumnya'] ?? '#', '/') ?>"
              class="px-4 py-2 bg-neutral-100 dark:bg-neutral-700 hover:bg-neutral-200 dark:hover:bg-neutral-600 rounded-lg transition-colors flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 6l-6 6 6 6"></path>
              </svg>
              <span>Prev</span>
            </a>
            <?php endif; ?>
            <a href="/komik.php?id=<?= str_replace('/komik/', '', $chapter_data['semua_chapter'] ?? '#') ?>"
              class="px-4 py-2 bg-neutral-100 dark:bg-neutral-700 hover:bg-neutral-200 dark:hover:bg-neutral-600 rounded-lg transition-colors">
              All
            </a>
            <?php if (!empty($chapter_data['navigasi']['selanjutnya'])): ?>
            <a href="/chapter.php?c=<?= ltrim($chapter_data['navigasi']['selanjutnya'] ?? '#', '/') ?>"
              class="px-4 py-2 bg-neutral-100 dark:bg-neutral-700 hover:bg-neutral-200 dark:hover:bg-neutral-600 rounded-lg transition-colors flex items-center gap-1">
              <span>Next</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 6l6 6-6 6"></path>
              </svg>
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Chapter Content -->
    <section class="py-8">
      <div class="container mx-auto px-4 max-w-4xl">
        <div class="flex flex-col items-center">
          <?php foreach ($chapter_data['gambar'] ?? [] as $img): ?>
          <div class="w-full animate-fade-in" style="animation-delay: 0.<?=$img['id'] ?>s">
            <img src="<?=$image_kit?><?=$img['url'] ?>" alt="<?=$img['id'] ?>" class="w-full h-auto">
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <section class="bg-white dark:bg-neutral-800 border-t border-neutral-200 dark:border-neutral-700 py-3 animate-fade-in">
      <div class="container mx-auto px-4">
        <div class="flex justify-center items-center gap-2">
          <!-- Prev Chapter -->
          <?php if (!empty($chapter_data['navigasi']['sebelumnya'])): ?>
          <a href="/chapter.php?c=<?= ltrim($chapter_data['navigasi']['sebelumnya'] ?? '#', '/') ?>"
            class="px-4 py-2 bg-neutral-100 dark:bg-neutral-700 hover:bg-neutral-200 dark:hover:bg-neutral-600 rounded-lg transition-colors flex items-center gap-1 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M15 6l-6 6 6 6"></path>
            </svg>
            <span>Prev</span>
          </a>
          <?php endif; ?>
          <!-- Daftar Chapter -->
          <a href="/komik.php?id=<?= str_replace('/komik/', '', $chapter_data['semua_chapter'] ?? '#') ?>"
            class="px-4 py-2 bg-primary-500 hover:bg-primary-600 text-white rounded-lg transition-colors flex items-center gap-1 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
              <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            <span>All</span>
          </a>
          <!-- Next Chapter -->
          <?php if (!empty($chapter_data['navigasi']['selanjutnya'])): ?>
          <a href="/chapter.php?c=<?= ltrim($chapter_data['navigasi']['selanjutnya'] ?? '#', '/') ?>"
            class="px-4 py-2 bg-neutral-100 dark:bg-neutral-700 hover:bg-neutral-200 dark:hover:bg-neutral-600 rounded-lg transition-colors flex items-center gap-1 text-sm">
            <span>Next</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 6l6 6-6 6"></path>
            </svg>
          </a>
          <?php endif; ?>
        </div>
        <p class="text-neutral-600 dark:text-neutral-400 mt-3 ">
          <?=$info_komik['desk'] ?? 'N/A' ?>
        </p>
      </div>
    </section>
  </main>
  <?php include('includes/footer.php'); ?>
</body>
</html>
