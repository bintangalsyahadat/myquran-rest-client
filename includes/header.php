<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($pageTitle) ? $pageTitle . ' - MyQuran' : 'MyQuran - REST Client Platform'; ?></title>
  
  <!-- Favicon / Title Icon (Kaaba Emblem) -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='25' fill='%23047857'/><path d='M28 35 L72 35 L72 75 L28 75 Z' fill='%23111827'/><rect x='28' y='42' width='44' height='6' fill='%23fbbf24'/><path d='M44 55 L56 55 L56 75 L44 75 Z' fill='%23d97706'/></svg>">
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Google Fonts: Plus Jakarta Sans & Amiri -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Font Awesome 6 Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
            arabic: ['"Amiri"', 'serif'],
          },
          colors: {
            brand: {
              50: '#ecfdf5',
              100: '#d1fae5',
              500: '#10b981',
              600: '#059669',
              700: '#047857',
              800: '#065f46',
              900: '#064e3b',
              950: '#022c22'
            }
          }
        }
      }
    }
  </script>
  
  <style>
    .islamic-pattern {
      background-color: #032b21;
      background-image: radial-gradient(rgba(16, 185, 129, 0.15) 1px, transparent 0);
      background-size: 24px 24px;
    }
    .glass-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(226, 232, 240, 0.8);
    }
  </style>
</head>
<body class="bg-[#f8fafc] text-slate-800 font-sans flex flex-col min-h-screen selection:bg-brand-500 selection:text-white pb-20 md:pb-0">

  <!-- ================= TOPBAR BRANDING ================= -->
  <header class="bg-white/80 backdrop-blur-xl sticky top-0 z-50 border-b border-slate-200/80 transition-all">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <!-- Logo -->
        <a href="index.php" class="flex items-center gap-3 group">
          <div class="relative w-11 h-11 rounded-2xl bg-gradient-to-tr from-brand-700 to-emerald-500 flex items-center justify-center text-white shadow-lg shadow-brand-700/25 group-hover:scale-105 transition-transform">
            <i class="fa-solid fa-kaaba text-lg"></i>
          </div>
          <div>
            <span class="font-extrabold text-xl text-slate-900 tracking-tight flex items-center gap-1">
              My<span class="bg-gradient-to-r from-brand-600 to-teal-500 bg-clip-text text-transparent">Quran</span>
            </span>
            <span class="text-[11px] block text-slate-400 font-medium tracking-wide">REST Client Platform</span>
          </div>
        </a>

        <!-- Desktop Navigation Tabs (Hidden on Mobile) -->
        <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
        <nav class="hidden md:flex items-center p-1.5 bg-slate-100/80 rounded-2xl border border-slate-200/60 text-sm">
          <a href="index.php" class="px-4 py-2 rounded-xl font-bold <?= ($currentPage == 'index.php') ? 'bg-white text-brand-700 shadow-sm shadow-slate-200' : 'text-slate-600 hover:text-brand-600'; ?> flex items-center gap-2 transition">
            <i class="fa-solid fa-clock"></i> Jadwal Sholat
          </a>
          <a href="quran.php" class="px-4 py-2 rounded-xl font-bold <?= ($currentPage == 'quran.php') ? 'bg-white text-amber-700 shadow-sm shadow-slate-200' : 'text-slate-600 hover:text-amber-600'; ?> flex items-center gap-2 transition">
            <i class="fa-solid fa-book-quran"></i> Al-Qur'an
          </a>
          <a href="doa.php" class="px-4 py-2 rounded-xl font-bold <?= ($currentPage == 'doa.php') ? 'bg-white text-sky-700 shadow-sm shadow-slate-200' : 'text-slate-600 hover:text-sky-600'; ?> flex items-center gap-2 transition">
            <i class="fa-solid fa-hands-praying"></i> Doa Harian
          </a>
          <a href="asmaul-husna.php" class="px-4 py-2 rounded-xl font-bold <?= ($currentPage == 'asmaul-husna.php') ? 'bg-white text-purple-700 shadow-sm shadow-slate-200' : 'text-slate-600 hover:text-purple-600'; ?> flex items-center gap-2 transition">
            <i class="fa-solid fa-star-and-crescent"></i> Asmaul Husna
          </a>
        </nav>

        <!-- Right Side: Repository & Mobile Hamburger -->
        <div class="flex items-center gap-2 sm:gap-3">
          <!-- Repo Link -->
          <a href="https://github.com/bintangalsyahadat/myquran-rest-client" target="_blank" rel="noopener noreferrer" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-2 sm:px-3.5 sm:py-2 rounded-xl font-semibold flex items-center gap-2 border border-slate-200/80 transition-all hover:shadow-sm">
            <i class="fa-brands fa-github text-sm"></i>
            <span class="hidden sm:inline">Repository</span>
          </a>

          <!-- Mobile Hamburger Toggle Button -->
          <button id="mobileMenuBtn" type="button" class="md:hidden w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center transition border border-slate-200/80" aria-label="Toggle Navigation">
            <i id="menuIcon" class="fa-solid fa-bars text-base"></i>
          </button>
        </div>
      </div>

      <!-- Mobile Dropdown Menu Drawer -->
      <div id="mobileMenuDropdown" class="hidden md:hidden border-t border-slate-200/80 py-3 space-y-1 transition-all">
        <a href="index.php" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold text-sm <?= ($currentPage == 'index.php') ? 'bg-brand-50 text-brand-700' : 'text-slate-600 hover:bg-slate-100'; ?>">
          <i class="fa-solid fa-clock w-5 text-center"></i> Jadwal Sholat
        </a>
        <a href="quran.php" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold text-sm <?= ($currentPage == 'quran.php') ? 'bg-amber-50 text-amber-700' : 'text-slate-600 hover:bg-slate-100'; ?>">
          <i class="fa-solid fa-book-quran w-5 text-center"></i> Al-Qur'an
        </a>
        <a href="doa.php" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold text-sm <?= ($currentPage == 'doa.php') ? 'bg-sky-50 text-sky-700' : 'text-slate-600 hover:bg-slate-100'; ?>">
          <i class="fa-solid fa-hands-praying w-5 text-center"></i> Doa Harian
        </a>
        <a href="asmaul-husna.php" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold text-sm <?= ($currentPage == 'asmaul-husna.php') ? 'bg-purple-50 text-purple-700' : 'text-slate-600 hover:bg-slate-100'; ?>">
          <i class="fa-solid fa-star-and-crescent w-5 text-center"></i> Asmaul Husna
        </a>
      </div>
    </div>
  </header>

  <!-- ================= MOBILE BOTTOM NAVIGATION (Aplikasi Modern Mobile App Style) ================= -->
  <nav class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-xl border-t border-slate-200/90 px-3 py-2 flex items-center justify-around shadow-2xl">
    <a href="index.php" class="flex flex-col items-center gap-1 text-[10px] font-bold <?= ($currentPage == 'index.php') ? 'text-brand-700' : 'text-slate-400 hover:text-slate-600'; ?>">
      <div class="w-8 h-8 rounded-xl flex items-center justify-center <?= ($currentPage == 'index.php') ? 'bg-brand-50 text-brand-700' : ''; ?>">
        <i class="fa-solid fa-clock text-sm"></i>
      </div>
      <span>Sholat</span>
    </a>
    <a href="quran.php" class="flex flex-col items-center gap-1 text-[10px] font-bold <?= ($currentPage == 'quran.php') ? 'text-amber-700' : 'text-slate-400 hover:text-slate-600'; ?>">
      <div class="w-8 h-8 rounded-xl flex items-center justify-center <?= ($currentPage == 'quran.php') ? 'bg-amber-50 text-amber-700' : ''; ?>">
        <i class="fa-solid fa-book-quran text-sm"></i>
      </div>
      <span>Qur'an</span>
    </a>
    <a href="doa.php" class="flex flex-col items-center gap-1 text-[10px] font-bold <?= ($currentPage == 'doa.php') ? 'text-sky-700' : 'text-slate-400 hover:text-slate-600'; ?>">
      <div class="w-8 h-8 rounded-xl flex items-center justify-center <?= ($currentPage == 'doa.php') ? 'bg-sky-50 text-sky-700' : ''; ?>">
        <i class="fa-solid fa-hands-praying text-sm"></i>
      </div>
      <span>Doa</span>
    </a>
    <a href="asmaul-husna.php" class="flex flex-col items-center gap-1 text-[10px] font-bold <?= ($currentPage == 'asmaul-husna.php') ? 'text-purple-700' : 'text-slate-400 hover:text-slate-600'; ?>">
      <div class="w-8 h-8 rounded-xl flex items-center justify-center <?= ($currentPage == 'asmaul-husna.php') ? 'bg-purple-50 text-purple-700' : ''; ?>">
        <i class="fa-solid fa-star-and-crescent text-sm"></i>
      </div>
      <span>Husna</span>
    </a>
  </nav>

  <script>
    // Hamburger menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenuDropdown = document.getElementById('mobileMenuDropdown');
    const menuIcon = document.getElementById('menuIcon');

    if (mobileMenuBtn && mobileMenuDropdown) {
      mobileMenuBtn.addEventListener('click', () => {
        mobileMenuDropdown.classList.toggle('hidden');
        if (mobileMenuDropdown.classList.contains('hidden')) {
          menuIcon.className = 'fa-solid fa-bars text-base';
        } else {
          menuIcon.className = 'fa-solid fa-xmark text-base';
        }
      });
    }
  </script>

  <main class="flex-grow">
