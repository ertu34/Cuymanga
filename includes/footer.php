<footer class="bg-white dark:bg-neutral-800 border-t border-neutral-200 dark:border-neutral-700 py-6 animate-fade-in">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <div>
        <h3 class="text-base font-semibold mb-2 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
          </svg>
          <?=$site_name ?>
        </h3>
        <p class="text-xs text-neutral-600 dark:text-neutral-400 mb-2">
          Baca manga terbaru dan terpopuler secara online dengan kualitas terbaik di <?=$site_name ?>.
        </p>
        <div class="flex space-x-3">
          <a href="#" class="text-neutral-600 hover:text-primary-500 dark:text-neutral-400 dark:hover:text-primary-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 4.557c-..." />
            </svg>
          </a>
          <a href="#" class="text-neutral-600 hover:text-primary-500 dark:text-neutral-400 dark:hover:text-primary-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c..." />
            </svg>
          </a>
        </div>
      </div>
    </div>
    <div class="pt-6 border-t border-neutral-200 dark:border-neutral-700 text-center">
      <p class="text-xs text-neutral-600 dark:text-neutral-400">
        &copy; 2025 <?=$site_name ?>. Developed by <a href="https://github.com/whyudacok" class="text-xs font-bold text-neutral-600 hover:text-primary-500 dark:text-neutral-400 dark:hover:text-primary-500 transition-colors">Whyudacok</a>.
      </p>
    </div>
  </div>
</footer>
<!-- JavaScript -->
<script>
  // Tombol tuk dark mode
  const darkModeToggle = document.getElementById('darkModeToggle');
  const sidebarDarkModeToggle = document.getElementById('sidebarDarkModeToggle');
  const html = document.documentElement;

  // Cek preferensi dark mode dari localStorage atau sistem
  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    html.classList.add('dark'); // Aktifkan dark mode
  } else {
    html.classList.remove('dark'); // Nonaktifkan dark mode
  }

  // Fungsi toggle dark mode
  function toggleDarkMode() {
    html.classList.toggle('dark');
    localStorage.theme = html.classList.contains('dark') ? 'dark': 'light';
  }

  // Event listener untuk tombol dark mode
  if (darkModeToggle) {
    darkModeToggle.addEventListener('click', toggleDarkMode);
  }

  if (sidebarDarkModeToggle) {
    sidebarDarkModeToggle.addEventListener('click', toggleDarkMode);
  }

  // Navigasi samping (sidebar)
  const menuToggle = document.getElementById('menuToggle');
  const sideNavbar = document.getElementById('sideNavbar');
  const closeSideNavbar = document.getElementById('closeSideNavbar');
  const sideNavbarOverlay = document.getElementById('sideNavbarOverlay');

  function openSidebar() {
    sideNavbar.classList.remove('-translate-x-full'); // Tampilkan sidebar
    sideNavbarOverlay.classList.remove('hidden'); // Tampilkan overlay
    setTimeout(() => {
      sideNavbarOverlay.classList.add('backdrop-blur-sm'); // add efek blur
    }, 10);
  }

  function closeSidebar() {
    sideNavbar.classList.add('-translate-x-full'); // hidden sidebar
    sideNavbarOverlay.classList.remove('backdrop-blur-sm'); // Hapus efek blur
    setTimeout(() => {
      sideNavbarOverlay.classList.add('hidden'); // hidden overlay
    }, 300);
  }

  // Event listener untuk buka/tutup sidebar
  if (menuToggle) {
    menuToggle.addEventListener('click', openSidebar);
  }

  if (closeSideNavbar) {
    closeSideNavbar.addEventListener('click', closeSidebar);
  }

  if (sideNavbarOverlay) {
    sideNavbarOverlay.addEventListener('click', closeSidebar);
  }

  // Navbar melayang (floating navbar)
  let lastScrollY = window.scrollY;
  const navbar = document.querySelector('.navbar-float');

  window.addEventListener('scroll', () => {
    if (lastScrollY < window.scrollY && window.scrollY > 100) {
      navbar.classList.add('navbar-hidden'); // hidden scroll ke bawah
    } else {
      navbar.classList.remove('navbar-hidden'); // navbar scroll ke atas
    }
    lastScrollY = window.scrollY;
  });

  // Animasi di layar
  document.addEventListener('DOMContentLoaded', function () {
    const animateOnScroll = function () {
      const elements = document.querySelectorAll('.animate-item');

      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (elementPosition < windowHeight - 50) {
          element.classList.add('animate-fade-in'); // efek fade-in
        }
      });
    };
    animateOnScroll();

    window.addEventListener('scroll',
      animateOnScroll);
  });
</script>
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4816353,4,406,165,100,00001111']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
