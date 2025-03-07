<!-- Navbar -->
<header class="navbar-float fixed top-0 left-0 right-0 z-40 bg-white/80 dark:bg-neutral-800/80 backdrop-blur-md shadow-sm transition-all duration-300">
  <div class="container mx-auto px-4">
    <nav class="flex items-center justify-between h-16">
      <!-- Logo -->
      <div class="flex items-center">
        <button id="menuToggle" class="p-2 mr-2 rounded-full hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </button>
        <a href="<?=$site_url ?>/" class="flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
          </svg>
          <span class="font-bold text-xl"><?=$site_name ?></span>
        </a>
      </div>

      <!-- Right Side -->
      <div class="flex items-center space-x-4">
        <!-- Dark Mode Toggle -->
        <button id="darkModeToggle" class="p-2 rounded-full hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-colors">
          <!-- Sun icon for dark mode -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
          </svg>
          <!-- Moon icon for light mode -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 block dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
          </svg>
        </button>

        <!-- Search Button -->
        <a href="<?=$site_url ?>/library" class="p-2 rounded-full hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </a>
      </div>
    </nav>
  </div>
</header>

<!-- Side Navbar -->
<aside id="sideNavbar" class="fixed top-0 left-0 h-full w-64 bg-white dark:bg-neutral-800 shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
  <div class="flex flex-col h-full">
    <!-- Sidebar Header -->
    <div class="p-4 border-b border-neutral-200 dark:border-neutral-700">
      <div class="flex items-center justify-between">
        <a href="<?=$site_url ?>/" class="flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
          </svg>
          <span class="font-bold text-lg"><?=$site_name ?></span>
        </a>
        <button id="closeSideNavbar" class="p-2 rounded-full hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
    </div>

    <!-- Sidebar Content -->
    <div class="flex-1 overflow-y-auto">
      <nav class="p-4">
        <ul class="space-y-2">
          <li>
            <a href="<?=$site_url ?>/" class="flex items-center p-3 text-neutral-700 dark:text-neutral-300 rounded-lg hover:bg-neutral-100 dark:hover:bg-neutral-700 group transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-neutral-500 dark:text-neutral-400 group-hover:text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
              <span class="ml-3 group-hover:text-primary-500">Beranda</span>
            </a>
          </li>

          <li>
            <a href="/bookmark.php" class="flex items-center p-3 text-neutral-700 dark:text-neutral-300 rounded-lg hover:bg-neutral-100 dark:hover:bg-neutral-700 group transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-neutral-500 dark:text-neutral-400 group-hover:text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
              </svg>
              <span class="ml-3 group-hover:text-primary-500">Bookmark</span>
            </a>
          </li>
          <li>
            <a href="<?=$site_url ?>/library.php" class="flex items-center p-3 text-neutral-700 dark:text-neutral-300 rounded-lg hover:bg-neutral-100 dark:hover:bg-neutral-700 group transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-neutral-500 dark:text-neutral-400 group-hover:text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
              </svg>
              <span class="ml-3 group-hover:text-primary-500">Daftar Manga</span>
            </a>
          </li>
        </ul>

        <!-- Genre Section -->
        <div class="mt-6">
          <div class="px-3 py-2 text-xs font-semibold text-neutral-500 uppercase tracking-wider">
            Genre
          </div>
          <div class="grid grid-cols-2 gap-1 px-3">
            <a href="/library.php?genre=action" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Action</a>
            <a href="/library.php?genre=adventure" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Adventure</a>
            <a href="/library.php?genre=boys-love" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Boys&#039; Love</a>
            <a href="/library.php?genre=comedy" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Comedy</a>
            <a href="/library.php?genre=crime" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Crime</a>
            <a href="/library.php?genre=drama" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Drama</a>
            <a href="/library.php?genre=fantasy" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Fantasy</a>
            <a href="/library.php?genre=girls-love" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Girls&#039; Love</a>
            <a href="/library.php?genre=harem" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Harem</a>
            <a href="/library.php?genre=historical" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Historical</a>
            <a href="/library.php?genre=horror" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Horror</a>
            <a href="/library.php?genre=isekai" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Isekai</a>
            <a href="/library.php?genre=magical-girls" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Magical Girls</a>
            <a href="/library.php?genre=mecha" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Mecha</a>
            <a href="/library.php?genre=medical" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Medical</a>
            <a href="/library.php?genre=music" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Music</a>
            <a href="/library.php?genre=mystery" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Mystery</a>
            <a href="/library.php?genre=philosophical" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Philosophical</a>
            <a href="/library.php?genre=psychological" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Psychological</a>
            <a href="/library.php?genre=romance" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Romance</a>
            <a href="/library.php?genre=sci-fi" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Sci-Fi</a>
            <a href="/library.php?genre=shoujo-ai" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Shoujo Ai</a>
            <a href="/library.php?genre=shounen-ai" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Shounen Ai</a>
            <a href="/library.php?genre=slice-of-life" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Slice of Life</a>
            <a href="/library.php?genre=sports" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Sports</a>
            <a href="/library.php?genre=superhero" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Superhero</a>
            <a href="/library.php?genre=thriller" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Thriller</a>
            <a href="/library.php?genre=tragedy" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Tragedy</a>
            <a href="/library.php?genre=wuxia" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Wuxia</a>
            <a href="/library.php?genre=yuri" class="p-2 text-sm text-neutral-700 dark:text-neutral-300 hover:text-primary-500 dark:hover:text-primary-500">Yuri</a>
          </div>
        </div>
      </nav>
    </div>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-neutral-200 dark:border-neutral-700">
      <div class="flex items-center justify-between">
        <span class="text-sm text-neutral-500 dark:text-neutral-400">By <a href="https://github.com/whyudacok" class="text-xs font-bold text-neutral-600 hover:text-primary-500 dark:text-neutral-400 dark:hover:text-primary-500 dark:hover:text-primary-500">Whyudacok</a></span>
        <button id="sidebarDarkModeToggle" class="p-2 rounded-lg text-neutral-500 hover:text-primary-500 hover:bg-neutral-100 dark:hover:bg-neutral-700 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 block dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
          </svg>
        </button>
      </div>
    </div>
  </div>
</aside>

<!-- Overlay for Side Navbar -->
<div id="sideNavbarOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 hidden"></div>