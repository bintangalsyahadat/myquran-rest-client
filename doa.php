<?php
$pageTitle = "Kumpulan Doa & Dzikir Harian";
include 'includes/header.php';
?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
  
  <!-- ================= HERO BANNER ================= -->
  <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-sky-700 via-sky-800 to-slate-900 text-white p-7 sm:p-12 shadow-2xl shadow-sky-950/20 border border-sky-500/20">
    <!-- Decorative Blurs -->
    <div class="absolute -top-24 -left-24 w-72 h-72 bg-sky-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-teal-400/20 rounded-full blur-3xl pointer-events-none"></div>
    <!-- Arabic Calligraphy Watermark -->
    <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-10 text-[220px] sm:text-[260px] pointer-events-none font-arabic select-none">
      دعاء
    </div>

    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
      <div class="space-y-4 max-w-2xl">
        <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-sky-200 text-xs font-semibold tracking-wide">
          <i class="fa-solid fa-hands-praying text-amber-300"></i>
          <span id="heroBadgeTotal">Memuat Koleksi Doa...</span>
        </div>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">
          Senjata & Perisai Muslim, <br>
          <span class="bg-gradient-to-r from-sky-300 via-teal-200 to-amber-200 bg-clip-text text-transparent">Lafadzkan Doa Harian.</span>
        </h1>
        <p class="text-sky-100/80 text-sm sm:text-base leading-relaxed">
          Koleksi doa sehari-hari lengkap dengan kaligrafi Arab berharakat, transliterasi Latin untuk memudahkan pelafalan bagi pemula, terjemahan Indonesia, serta filter kategori instan.
        </p>
      </div>

      <!-- HIGHLIGHT STATS CARD -->
      <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-6 sm:p-7 min-w-[270px] shadow-xl flex flex-col justify-between space-y-4">
        <div class="flex items-center justify-between border-b border-white/10 pb-4">
          <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-sky-500/30 text-sky-200 flex items-center justify-center text-lg">
              <i class="fa-solid fa-book-bookmark"></i>
            </div>
            <div>
              <div class="text-[11px] font-semibold uppercase tracking-wider text-sky-200/80">Koleksi Doa</div>
              <div id="statTotalDoa" class="text-2xl font-black text-white">227+</div>
            </div>
          </div>
          <span class="px-2.5 py-1 rounded-lg bg-emerald-500/20 text-emerald-300 text-[11px] font-bold border border-emerald-400/20">Sahih</span>
        </div>

        <div class="grid grid-cols-2 gap-3 text-center">
          <div class="p-2.5 rounded-2xl bg-white/5 border border-white/10">
            <div id="statTotalCategories" class="text-lg font-bold text-sky-200">-</div>
            <div class="text-[10px] text-sky-100/70">Kategori Grup</div>
          </div>
          <div class="p-2.5 rounded-2xl bg-white/5 border border-white/10">
            <div id="statBookmarks" class="text-lg font-bold text-amber-300">0</div>
            <div class="text-[10px] text-sky-100/70">Tersimpan</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= SEARCH & FILTER CONTROL BAR ================= -->
  <div id="filterSection" class="glass-card rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-200/80 space-y-5">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
      <div>
        <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2.5">
          <span class="w-9 h-9 rounded-2xl bg-sky-100 text-sky-700 flex items-center justify-center text-sm shadow-sm">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
          Cari & Filter Kategori Doa
        </h2>
        <p class="text-xs sm:text-sm text-slate-500 mt-1">
          Cari berdasarkan nama doa, lafadz latin, atau arti tanpa memuat ulang halaman
        </p>
      </div>

      <!-- Quick Action: Filter Favorit / Reset -->
      <div class="flex items-center gap-2">
        <button 
          id="btnFilterBookmark" 
          type="button" 
          class="inline-flex items-center gap-2 px-4 py-2 rounded-2xl bg-slate-100 hover:bg-amber-50 text-slate-700 hover:text-amber-700 text-xs font-bold border border-slate-200 hover:border-amber-200 transition-all shadow-sm">
          <i class="fa-solid fa-star text-amber-500"></i>
          <span>Favorit (<span id="bookmarkCountLabel">0</span>)</span>
        </button>
        <button 
          id="btnResetFilter" 
          type="button" 
          class="inline-flex items-center gap-1.5 px-3 py-2 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold transition-all">
          <i class="fa-solid fa-rotate-left"></i>
          <span>Reset</span>
        </button>
      </div>
    </div>

    <!-- Inputs Row: Search Input & Category Dropdown -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-3.5">
      <!-- Search Bar -->
      <div class="md:col-span-7 relative">
        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm pointer-events-none">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <input 
          type="text" 
          id="searchInput" 
          placeholder="Cari doa (contoh: makan, tidur, keluar rumah, orang tua, rezeki)..." 
          autocomplete="off"
          class="w-full pl-11 pr-10 py-3.5 bg-slate-50 hover:bg-white focus:bg-white border border-slate-200 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition shadow-sm"
        />
        <button 
          id="btnClearSearch" 
          type="button" 
          class="hidden absolute right-3.5 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-slate-200 hover:bg-slate-300 text-slate-600 flex items-center justify-center text-xs transition">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <!-- Dropdown Kategori Grup -->
      <div class="md:col-span-5 relative">
        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm pointer-events-none">
          <i class="fa-solid fa-layer-group"></i>
        </div>
        <select 
          id="categorySelect" 
          class="w-full pl-11 pr-10 py-3.5 bg-slate-50 hover:bg-white focus:bg-white border border-slate-200 rounded-2xl text-slate-800 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition shadow-sm appearance-none cursor-pointer">
          <option value="ALL">Semua Kategori Grup</option>
        </select>
        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xs">
          <i class="fa-solid fa-chevron-down"></i>
        </div>
      </div>
    </div>

    <!-- Quick Pill Badges (Popular categories) -->
    <div id="popularTagsContainer" class="flex flex-wrap items-center gap-2 pt-1 text-xs">
      <span class="text-slate-400 font-medium mr-1 flex items-center gap-1.5">
        <i class="fa-solid fa-tags text-[11px]"></i> Topik Populer:
      </span>
      <!-- Badges injected via JS -->
    </div>
  </div>

  <!-- ================= STATUS & RESULT SUMMARY BAR ================= -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-sm text-slate-500 px-2">
    <div id="resultInfoText" class="font-medium">
      Memuat daftar doa...
    </div>
    <div class="flex items-center gap-2 text-xs">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-50 text-sky-700 font-semibold border border-sky-200">
        <i class="fa-solid fa-circle-info text-[11px]"></i>
        10 Doa per Halaman
      </span>
    </div>
  </div>

  <!-- ================= DOA LIST CONTAINER ================= -->
  <div id="doaListContainer" class="space-y-6">
    <!-- SKELETON LOADER (Default saat fetch berlangsung) -->
    <div id="loadingSkeleton" class="space-y-5">
      <?php for ($i = 0; $i < 3; $i++): ?>
      <div class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-md space-y-4 animate-pulse">
        <div class="flex items-center justify-between">
          <div class="h-6 w-32 bg-slate-200 rounded-xl"></div>
          <div class="flex gap-2">
            <div class="h-9 w-9 bg-slate-200 rounded-xl"></div>
            <div class="h-9 w-9 bg-slate-200 rounded-xl"></div>
          </div>
        </div>
        <div class="h-7 w-2/3 bg-slate-200 rounded-xl"></div>
        <div class="h-20 bg-slate-100 rounded-2xl"></div>
        <div class="h-16 bg-sky-100/50 rounded-2xl"></div>
        <div class="h-12 bg-slate-100 rounded-2xl"></div>
      </div>
      <?php endfor; ?>
    </div>
  </div>

  <!-- ================= EMPTY / ERROR STATES ================= -->
  <div id="emptyState" class="hidden glass-card rounded-3xl p-12 text-center border border-slate-200/80 shadow-lg space-y-4">
    <div class="w-16 h-16 mx-auto rounded-3xl bg-sky-50 text-sky-600 flex items-center justify-center text-2xl shadow-inner">
      <i class="fa-solid fa-magnifying-glass"></i>
    </div>
    <h3 class="text-xl font-extrabold text-slate-800">Doa Tidak Ditemukan</h3>
    <p class="text-sm text-slate-500 max-w-md mx-auto">
      Tidak ada doa yang sesuai dengan kata kunci atau filter kategori yang Anda pilih. Silakan gunakan kata kunci lain.
    </p>
    <div>
      <button 
        id="btnResetEmpty" 
        type="button" 
        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold shadow-md shadow-sky-600/20 transition-all">
        <i class="fa-solid fa-rotate-left"></i>
        <span>Kembalikan Semua Doa</span>
      </button>
    </div>
  </div>

  <div id="errorState" class="hidden glass-card rounded-3xl p-10 text-center border border-red-200 shadow-lg space-y-4 bg-red-50/50">
    <div class="w-16 h-16 mx-auto rounded-3xl bg-red-100 text-red-600 flex items-center justify-center text-2xl shadow-inner">
      <i class="fa-solid fa-triangle-exclamation"></i>
    </div>
    <h3 class="text-xl font-extrabold text-slate-800">Gagal Mengambil Data Doa</h3>
    <p class="text-sm text-slate-600 max-w-md mx-auto">
      Koneksi ke server API doa terganggu. Silakan periksa jaringan internet Anda atau muat ulang data.
    </p>
    <div class="flex items-center justify-center gap-3">
      <button 
        id="btnRetryFetch" 
        type="button" 
        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold shadow-md shadow-sky-600/20 transition-all">
        <i class="fa-solid fa-arrow-rotate-right"></i>
        <span>Coba Lagi</span>
      </button>
      <button 
        id="btnLoadFallback" 
        type="button" 
        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold border border-slate-200 transition-all">
        <i class="fa-solid fa-database"></i>
        <span>Muat Data Cadangan</span>
      </button>
    </div>
  </div>

  <!-- ================= SMART PAGINATION CONTROLS ================= -->
  <div id="paginationContainer" class="hidden flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-slate-200">
    <div class="text-xs sm:text-sm text-slate-500 font-medium">
      Halaman <span id="currentPageNum" class="font-bold text-slate-800">1</span> dari <span id="totalPagesNum" class="font-bold text-slate-800">1</span>
    </div>

    <!-- Page Buttons -->
    <div class="flex items-center gap-1.5 flex-wrap justify-center" id="paginationButtons">
      <!-- Buttons injected by JS -->
    </div>
  </div>

</div>

<!-- ================= TOAST NOTIFICATION CONTAINER ================= -->
<div id="toastNotification" class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 transition-all duration-300 pointer-events-none flex items-center gap-3 px-5 py-3.5 rounded-2xl bg-slate-900 text-white text-sm font-semibold shadow-2xl border border-slate-700/50">
  <div id="toastIcon" class="w-7 h-7 rounded-xl bg-sky-500 text-white flex items-center justify-center text-xs shrink-0">
    <i class="fa-solid fa-check"></i>
  </div>
  <span id="toastMessage">Teks berhasil disalin</span>
</div>

<!-- ================= JAVASCRIPT LOGIC (VANILLA JS) ================= -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  // CONFIG & CONSTANTS
  const API_URL = 'https://equran.id/api/doa';
  const ITEMS_PER_PAGE = 10;
  const STORAGE_KEY_BOOKMARKS = 'myquran_doa_bookmarks';

  // APP STATE
  let allDoa = [];
  let filteredDoa = [];
  let currentPage = 1;
  let currentCategory = 'ALL';
  let searchQuery = '';
  let onlyBookmarks = false;
  let bookmarkedIds = new Set(JSON.parse(localStorage.getItem(STORAGE_KEY_BOOKMARKS) || '[]'));

  // DOM ELEMENTS
  const doaListContainer = document.getElementById('doaListContainer');
  const loadingSkeleton = document.getElementById('loadingSkeleton');
  const emptyState = document.getElementById('emptyState');
  const errorState = document.getElementById('errorState');
  const searchInput = document.getElementById('searchInput');
  const btnClearSearch = document.getElementById('btnClearSearch');
  const categorySelect = document.getElementById('categorySelect');
  const popularTagsContainer = document.getElementById('popularTagsContainer');
  const resultInfoText = document.getElementById('resultInfoText');
  const paginationContainer = document.getElementById('paginationContainer');
  const paginationButtons = document.getElementById('paginationButtons');
  const currentPageNum = document.getElementById('currentPageNum');
  const totalPagesNum = document.getElementById('totalPagesNum');
  const btnResetFilter = document.getElementById('btnResetFilter');
  const btnResetEmpty = document.getElementById('btnResetEmpty');
  const btnFilterBookmark = document.getElementById('btnFilterBookmark');
  const bookmarkCountLabel = document.getElementById('bookmarkCountLabel');
  const statBookmarks = document.getElementById('statBookmarks');
  const statTotalDoa = document.getElementById('statTotalDoa');
  const statTotalCategories = document.getElementById('statTotalCategories');
  const heroBadgeTotal = document.getElementById('heroBadgeTotal');
  const btnRetryFetch = document.getElementById('btnRetryFetch');
  const btnLoadFallback = document.getElementById('btnLoadFallback');

  // UPDATE BOOKMARK STATS
  function updateBookmarkCounters() {
    const count = bookmarkedIds.size;
    if (bookmarkCountLabel) bookmarkCountLabel.textContent = count;
    if (statBookmarks) statBookmarks.textContent = count;
  }
  updateBookmarkCounters();

  // TOAST FEEDBACK HELPER
  let toastTimer = null;
  function showToast(message, iconClass = 'fa-check', bgClass = 'bg-sky-500') {
    const toast = document.getElementById('toastNotification');
    const toastMessage = document.getElementById('toastMessage');
    const toastIcon = document.getElementById('toastIcon');

    if (!toast || !toastMessage || !toastIcon) return;

    toastMessage.textContent = message;
    toastIcon.className = `w-7 h-7 rounded-xl ${bgClass} text-white flex items-center justify-center text-xs shrink-0`;
    toastIcon.innerHTML = `<i class="fa-solid ${iconClass}"></i>`;

    toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');
    toast.classList.add('translate-y-0', 'opacity-100');

    if (toastTimer) clearTimeout(toastTimer);
    toastTimer = setTimeout(() => {
      toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
      toast.classList.remove('translate-y-0', 'opacity-100');
    }, 2800);
  }

  // FALLBACK OFFLINE DATA (Menjamin aplikasi tidak pernah blank jika API external offline)
  const FALLBACK_DOA_DATA = [
    {
      id: 1,
      nama: "Doa Sebelum Tidur",
      ar: "بِاسْمِكَ اللّٰهُمَّ اَحْيَا وَاَمُوْتُ",
      tr: "Bismika Allahumma ahyaa wa amuut.",
      idn: "Dengan nama-Mu ya Allah, aku hidup dan aku mati.",
      grup: "Doa Sehari-hari"
    },
    {
      id: 2,
      nama: "Doa Bangun Tidur",
      ar: "اَلْحَمْدُ لِلّٰهِ الَّذِيْ اَحْيَانَا بَعْدَ مَا اَمَاتَنَا وَاِلَيْهِ النُّشُوْرُ",
      tr: "Alhamdulillahilladzi ahyana ba'da ma amatana wa ilaihin nusyur.",
      idn: "Segala puji bagi Allah yang telah menghidupkan kami setelah mematikan kami, dan kepada-Nya lah tempat kembali.",
      grup: "Doa Sehari-hari"
    },
    {
      id: 3,
      nama: "Doa Sebelum Makan",
      ar: "اَللّٰهُمَّ بَارِكْ لَنَا فِيْمَا رَزَقْتَنَا وَقِنَا عَذَابَ النَّارِ",
      tr: "Allahumma barik lana fima razaqtana waqina 'adzaban-nar.",
      idn: "Ya Allah, berkahilah kami dalam rezeki yang telah Engkau berikan kepada kami dan peliharalah kami dari siksa api neraka.",
      grup: "Doa Sehari-hari"
    },
    {
      id: 4,
      nama: "Doa Sesudah Makan",
      ar: "اَلْحَمْدُ لِلّٰهِ الَّذِيْ اَطْعَمَنَا وَسَقَانَا وَجَعَلَنَا مُسْلِمِيْنَ",
      tr: "Alhamdulillahilladzi ath'amana wa saqana wa ja'alana muslimin.",
      idn: "Segala puji bagi Allah yang memberi makan dan minum kepada kami, serta menjadikan kami orang-orang muslim.",
      grup: "Doa Sehari-hari"
    },
    {
      id: 5,
      nama: "Doa Masuk Kamar Mandi / Toilet",
      ar: "اَللّٰهُمَّ اِنِّيْ اَعُوْذُ بِكَ مِنَ الْخُبُثِ وَالْخَبَائِثِ",
      tr: "Allahumma inni a'udzubika minal khubutsi wal khaba'its.",
      idn: "Ya Allah, sesungguhnya aku berlindung kepada-Mu dari godaan setan laki-laki dan perempuan.",
      grup: "Bersuci & Ibadah"
    },
    {
      id: 6,
      nama: "Doa Keluar Kamar Mandi",
      ar: "غُفْرَانَكَ، اَلْحَمْدُ لِلّٰهِ الَّذِيْ اَذْهَبَ عَنِّي الْاَذَى وَعَافَانِيْ",
      tr: "Ghufranaka, alhamdulillahilladzi adzhaba 'annil adza wa 'afani.",
      idn: "Aku memohon ampunan-Mu. Segala puji bagi Allah yang telah menghilangkan penyakit dari tubuhku dan menyehatkanku.",
      grup: "Bersuci & Ibadah"
    },
    {
      id: 7,
      nama: "Doa Keluar Rumah",
      ar: "بِسْمِ اللّٰهِ تَوَكَّلْتُ عَلَى اللّٰهِ، لَا حَوْلَ وَلَا قُوَّةَ اِلَّا بِاللّٰهِ",
      tr: "Bismillahi tawakkaltu 'alallah, la hawla wa la quwwata illa billah.",
      idn: "Dengan nama Allah, aku bertawakal kepada Allah. Tiada daya dan kekuatan kecuali dengan pertolongan Allah.",
      grup: "Perjalanan & Aktivitas"
    },
    {
      id: 8,
      nama: "Doa Masuk Rumah",
      ar: "بِسْمِ اللّٰهِ وَلَجْنَا، وَبِسْمِ اللّٰهِ خَرَجْنَا، وَعَلَى رَبِّنَا تَوَكَّلْنَا",
      tr: "Bismillahi walajnaa, wa bismillahi kharajnaa, wa 'ala rabbinaa tawakkalnaa.",
      idn: "Dengan nama Allah kami masuk, dan dengan nama Allah kami keluar, dan kepada Tuhan kami, kami bertawakal.",
      grup: "Perjalanan & Aktivitas"
    },
    {
      id: 9,
      nama: "Doa untuk Kedua Orang Tua",
      ar: "رَبِّ اغْفِرْ لِيْ وَلِوَالِدَيَّ وَارْحَمْهُمَا كَمَا رَبَّيَانِيْ صَغِيْرًا",
      tr: "Rabbighfir li wa liwalidayya warhamhuma kama rabbayani shaghira.",
      idn: "Wahai Tuhanku, ampunilah aku dan kedua orang tuaku, dan kasihilah mereka keduanya sebagaimana mereka telah mendidikku di waktu kecil.",
      grup: "Keluarga & Akhlak"
    },
    {
      id: 10,
      nama: "Doa Kebaikan Dunia & Akhirat (Sapu Jagat)",
      ar: "رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ",
      tr: "Rabbana atina fid-dunya hasanah wa fil-akhirati hasanah wa qina 'adzaban-nar.",
      idn: "Ya Tuhan kami, berilah kami kebaikan di dunia dan kebaikan di akhirat dan lindungilah kami dari azab neraka.",
      grup: "Doa Al-Qur'an & Pilihan"
    },
    {
      id: 11,
      nama: "Doa Memohon Kemudahan Urusan",
      ar: "رَبِّ اشْرَحْ لِي صَدْرِي وَيَسِّرْ لِي أَمْرِي وَاحْلُلْ عُقْدَةً مِّن لِّسَانِي يَفْقَهُوا قَوْلِي",
      tr: "Rabbisyrah li shadri wa yassir li amri wahlul 'uqdatan min lisani yafqahu qawli.",
      idn: "Ya Tuhanku, lapangkanlah dadaku, mudahkanlah urusanku, dan lepaskanlah kekakuan dari lidahku, agar mereka mengerti perkataanku.",
      grup: "Doa Al-Qur'an & Pilihan"
    },
    {
      id: 12,
      nama: "Doa Perlindungan dari Kegelisahan dan Hutang",
      ar: "اللَّهُمَّ إِنِّي أَعُوذُ بِكَ مِنَ الْهَمِّ وَالْحَزَنِ، وَأَعُوذُ بِكَ مِنَ الْعَجْزِ وَالْكَسَلِ، وَأَعُوذُ بِكَ مِنَ الْجُبْنِ وَالْبُخْلِ، وَأَعُوذُ بِكَ مِنْ غَلَبَةِ الدَّيْنِ وَقَهْرِ الرِّجَالِ",
      tr: "Allahumma inni a'udzubika minal hammi wal hazan, wa a'udzubika minal 'ajzi wal kasal, wa a'udzubika minal jubni wal bukhl, wa a'udzubika min ghalabatid-daini wa qahrir-rijal.",
      idn: "Ya Allah, aku berlindung kepada-Mu dari kegelisahan dan kesedihan, dari kelemahan dan kemalasan, dari sifat pengecut dan kikir, serta dari lilitan hutang dan tekanan orang lain.",
      grup: "Perlindungan Diri"
    }
  ];

  // NORMALISASI DATA (Mendukung struktur equran.id atau fallback)
  function normalizeDoaItem(item, index) {
    return {
      id: item.id || (index + 1),
      nama: item.nama || item.title || item.judul || `Doa ${index + 1}`,
      ar: item.ar || item.arab || item.arabic || '',
      tr: item.tr || item.latin || '',
      idn: item.idn || item.arti || item.indo || item.translation || '',
      grup: item.grup || item.kategori || item.category || 'Doa Harian'
    };
  }

  // FETCH DOA DATA DARI REST API
  async function fetchDoaData() {
    showLoading();
    try {
      const response = await fetch(API_URL);
      if (!response.ok) {
        throw new Error(`HTTP Error status: ${response.status}`);
      }
      const data = await response.json();
      
      let rawList = [];
      if (Array.isArray(data)) {
        rawList = data;
      } else if (data && Array.isArray(data.data)) {
        rawList = data.data;
      } else {
        throw new Error('Format data API tidak valid');
      }

      if (rawList.length === 0) {
        throw new Error('Daftar doa kosong');
      }

      allDoa = rawList.map((item, idx) => normalizeDoaItem(item, idx));
      initAfterDataLoaded();
    } catch (err) {
      console.warn('Gagal fetch API equran.id/api/doa, mencoba fallback internal...', err);
      // Auto fallback agar pengguna tidak mendapati halaman rusak
      useFallbackData();
    }
  }

  function useFallbackData() {
    allDoa = FALLBACK_DOA_DATA.map((item, idx) => normalizeDoaItem(item, idx));
    initAfterDataLoaded();
    showToast('Menggunakan data doa terverifikasi offline', 'fa-info-circle', 'bg-amber-600');
  }

  // INITIALIZE UI SETELAH DATA TERSEDIA
  function initAfterDataLoaded() {
    hideLoading();
    
    // Update Stats
    const totalCount = allDoa.length;
    statTotalDoa.textContent = `${totalCount}+`;
    heroBadgeTotal.innerHTML = `<i class="fa-solid fa-hands-praying text-amber-300"></i> Koleksi ${totalCount} Doa Harian & Dzikir Sahih`;

    // Ambil semua kategori unik
    populateCategories();

    // Terapkan filter pertama kali
    applyFilters();
  }

  // POPULATE CATEGORIES & POPULAR PILLS
  function populateCategories() {
    const categoriesMap = {};
    allDoa.forEach(d => {
      const g = (d.grup || 'Umum').trim();
      categoriesMap[g] = (categoriesMap[g] || 0) + 1;
    });

    const categoryList = Object.keys(categoriesMap).sort();
    if (statTotalCategories) {
      statTotalCategories.textContent = categoryList.length;
    }

    // Populate Select
    categorySelect.innerHTML = '<option value="ALL">Semua Kategori Grup (' + allDoa.length + ')</option>';
    categoryList.forEach(cat => {
      const opt = document.createElement('option');
      opt.value = cat;
      opt.textContent = `${cat} (${categoriesMap[cat]})`;
      categorySelect.appendChild(opt);
    });

    // Populate Popular Pills (ambil hingga 6 teratas)
    const sortedByCount = [...categoryList].sort((a, b) => categoriesMap[b] - categoriesMap[a]).slice(0, 6);
    popularTagsContainer.innerHTML = `
      <span class="text-slate-400 font-medium mr-1 flex items-center gap-1.5">
        <i class="fa-solid fa-tags text-[11px]"></i> Topik Populer:
      </span>
      <button type="button" data-cat="ALL" class="pill-category px-3 py-1 rounded-xl bg-sky-600 text-white font-bold transition-all shadow-sm">
        Semua
      </button>
    `;

    sortedByCount.forEach(cat => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.dataset.cat = cat;
      btn.className = 'pill-category px-3 py-1 rounded-xl bg-slate-100 hover:bg-sky-50 text-slate-700 hover:text-sky-700 font-medium transition-all border border-slate-200/80';
      btn.textContent = cat;
      popularTagsContainer.appendChild(btn);
    });

    // Event listener untuk Pill tags
    popularTagsContainer.querySelectorAll('.pill-category').forEach(btn => {
      btn.addEventListener('click', () => {
        const cat = btn.dataset.cat;
        categorySelect.value = cat;
        currentCategory = cat;
        updatePillStyles();
        currentPage = 1;
        applyFilters();
      });
    });
  }

  function updatePillStyles() {
    popularTagsContainer.querySelectorAll('.pill-category').forEach(btn => {
      if (btn.dataset.cat === currentCategory) {
        btn.className = 'pill-category px-3 py-1 rounded-xl bg-sky-600 text-white font-bold transition-all shadow-sm';
      } else {
        btn.className = 'pill-category px-3 py-1 rounded-xl bg-slate-100 hover:bg-sky-50 text-slate-700 hover:text-sky-700 font-medium transition-all border border-slate-200/80';
      }
    });
  }

  // APPLY SEARCH, FILTER & BOOKMARK
  function applyFilters() {
    searchQuery = (searchInput.value || '').trim().toLowerCase();
    currentCategory = categorySelect.value || 'ALL';

    filteredDoa = allDoa.filter(item => {
      // Filter Kategori
      if (currentCategory !== 'ALL' && item.grup !== currentCategory) {
        return false;
      }

      // Filter Hanya Bookmark
      if (onlyBookmarks && !bookmarkedIds.has(item.id)) {
        return false;
      }

      // Filter Search Query (Nama, Latin, Arti)
      if (searchQuery) {
        const matchNama = item.nama && item.nama.toLowerCase().includes(searchQuery);
        const matchTr = item.tr && item.tr.toLowerCase().includes(searchQuery);
        const matchIdn = item.idn && item.idn.toLowerCase().includes(searchQuery);
        const matchGrup = item.grup && item.grup.toLowerCase().includes(searchQuery);
        return matchNama || matchTr || matchIdn || matchGrup;
      }

      return true;
    });

    // Update Clear Button Search
    if (searchQuery) {
      btnClearSearch.classList.remove('hidden');
    } else {
      btnClearSearch.classList.add('hidden');
    }

    // Reset pagination jika halaman sekarang melebihi total halaman baru
    const totalPages = Math.ceil(filteredDoa.length / ITEMS_PER_PAGE) || 1;
    if (currentPage > totalPages) {
      currentPage = 1;
    }

    renderCurrentPage();
  }

  // RENDER CURRENT PAGE OF DOA
  function renderCurrentPage() {
    const totalItems = filteredDoa.length;
    const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE) || 1;

    // Bersihkan kontainer
    doaListContainer.innerHTML = '';

    if (totalItems === 0) {
      emptyState.classList.remove('hidden');
      paginationContainer.classList.add('hidden');
      resultInfoText.textContent = 'Tidak ada doa yang cocok dengan pencarian';
      return;
    }

    emptyState.classList.add('hidden');
    errorState.classList.add('hidden');
    paginationContainer.classList.remove('hidden');

    const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
    const endIndex = Math.min(startIndex + ITEMS_PER_PAGE, totalItems);
    const pageItems = filteredDoa.slice(startIndex, endIndex);

    // Update Result Summary
    resultInfoText.innerHTML = `Menampilkan <span class="font-bold text-slate-800">${startIndex + 1}-${endIndex}</span> dari <span class="font-bold text-slate-800">${totalItems}</span> doa ${onlyBookmarks ? '(Favorit)' : ''}`;

    // Render Cards
    pageItems.forEach((item, idx) => {
      const card = createDoaCard(item, startIndex + idx + 1);
      doaListContainer.appendChild(card);
    });

    // Render Pagination Controls
    renderPagination(totalPages);
  }

  // CREATE CARD ELEMENT
  function createDoaCard(item, displayIndex) {
    const isBookmarked = bookmarkedIds.has(item.id);
    const card = document.createElement('div');
    card.className = 'glass-card rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-6 relative overflow-hidden group';

    card.innerHTML = `
      <!-- TOP BAR: BADGE, NUMBER & ACTIONS -->
      <div class="flex items-center justify-between gap-4 border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-2xl bg-sky-50 text-sky-700 flex items-center justify-center font-extrabold text-xs shadow-sm border border-sky-200/60 shrink-0">
            ${displayIndex}
          </div>
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-slate-100 text-slate-700 text-xs font-semibold border border-slate-200">
            <i class="fa-solid fa-layer-group text-[10px] text-sky-600"></i>
            ${escapeHtml(item.grup || 'Doa Harian')}
          </span>
        </div>

        <div class="flex items-center gap-1.5">
          <!-- Tombol Salin Doa -->
          <button 
            type="button" 
            class="btn-copy-doa w-9 h-9 rounded-2xl bg-slate-50 hover:bg-sky-50 text-slate-500 hover:text-sky-600 border border-slate-200/70 hover:border-sky-200 flex items-center justify-center text-xs transition-all shadow-sm"
            title="Salin Teks Doa Lengkap"
            data-index="${item.id}">
            <i class="fa-regular fa-copy"></i>
          </button>

          <!-- Tombol Bookmark / Favorit -->
          <button 
            type="button" 
            class="btn-bookmark-doa w-9 h-9 rounded-2xl ${isBookmarked ? 'bg-amber-50 text-amber-500 border-amber-200' : 'bg-slate-50 text-slate-400 hover:text-amber-500 border-slate-200/70'} hover:bg-amber-50 border flex items-center justify-center text-xs transition-all shadow-sm"
            title="${isBookmarked ? 'Hapus dari Favorit' : 'Simpan ke Favorit'}"
            data-id="${item.id}">
            <i class="${isBookmarked ? 'fa-solid fa-star' : 'fa-regular fa-star'}"></i>
          </button>
        </div>
      </div>

      <!-- NAMA DOA -->
      <div>
        <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 group-hover:text-sky-700 transition-colors">
          ${highlightText(item.nama, searchQuery)}
        </h3>
      </div>

      <!-- LAFADZ ARAB BERHARAKAT -->
      ${item.ar ? `
      <div class="py-2">
        <p class="font-arabic text-2xl sm:text-3xl text-right leading-loose text-slate-900 select-all" dir="rtl">
          ${item.ar}
        </p>
      </div>
      ` : ''}

      <!-- KOTAK TRANSLITERASI LATIN (WAJIB BIRU MUDA SESUAI AGENTS.MD) -->
      ${item.tr ? `
      <div class="bg-sky-50/90 text-sky-900 border border-sky-100 rounded-2xl p-4 sm:p-5 space-y-1.5 shadow-sm">
        <div class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-wider text-sky-700">
          <i class="fa-solid fa-font text-sky-500"></i>
          <span>Transliterasi Latin</span>
        </div>
        <p class="text-xs sm:text-sm italic leading-relaxed text-sky-950 font-medium select-all">
          "${highlightText(item.tr, searchQuery)}"
        </p>
      </div>
      ` : ''}

      <!-- TERJEMAHAN BAHASA INDONESIA -->
      ${item.idn ? `
      <div class="space-y-1 text-slate-700 pt-1">
        <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400">
          Artinya:
        </div>
        <p class="text-xs sm:text-sm leading-relaxed text-slate-600">
          ${highlightText(item.idn, searchQuery)}
        </p>
      </div>
      ` : ''}

      <!-- FOOTER CARD QUICK COPY BAR -->
      <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
        <span class="flex items-center gap-1.5">
          <i class="fa-solid fa-check text-emerald-500"></i> Sahih & Terverifikasi
        </span>
        <button 
          type="button" 
          class="btn-copy-doa inline-flex items-center gap-1.5 font-bold text-sky-600 hover:text-sky-700 transition"
          data-index="${item.id}">
          <i class="fa-regular fa-copy"></i>
          <span>Salin Doa</span>
        </button>
      </div>
    `;

    // Event listener untuk tombol Salin
    card.querySelectorAll('.btn-copy-doa').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        copyDoaToClipboard(item);
      });
    });

    // Event listener untuk Bookmark
    card.querySelectorAll('.btn-bookmark-doa').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        toggleBookmark(item.id, btn);
      });
    });

    return card;
  }

  // COPY DOA KE CLIPBOARD
  function copyDoaToClipboard(item) {
    const textToCopy = `🤲 ${item.nama}\n\n` +
      (item.ar ? `${item.ar}\n\n` : '') +
      (item.tr ? `Latin: ${item.tr}\n\n` : '') +
      (item.idn ? `Artinya: "${item.idn}"\n\n` : '') +
      `Kategori: ${item.grup || 'Doa Harian'} - Sumber: MyQuran Platform`;

    if (navigator.clipboard && window.isSecureContext) {
      navigator.clipboard.writeText(textToCopy).then(() => {
        showToast('Doa berhasil disalin ke clipboard!', 'fa-clipboard-check', 'bg-sky-600');
      }).catch(() => fallbackCopy(textToCopy));
    } else {
      fallbackCopy(textToCopy);
    }
  }

  function fallbackCopy(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.opacity = '0';
    document.body.appendChild(textarea);
    textarea.select();
    try {
      document.execCommand('copy');
      showToast('Doa berhasil disalin ke clipboard!', 'fa-clipboard-check', 'bg-sky-600');
    } catch (e) {
      showToast('Gagal menyalin doa', 'fa-triangle-exclamation', 'bg-red-500');
    }
    document.body.removeChild(textarea);
  }

  // TOGGLE BOOKMARK
  function toggleBookmark(id, buttonEl) {
    const icon = buttonEl.querySelector('i');
    if (bookmarkedIds.has(id)) {
      bookmarkedIds.delete(id);
      buttonEl.className = 'btn-bookmark-doa w-9 h-9 rounded-2xl bg-slate-50 text-slate-400 hover:text-amber-500 border-slate-200/70 border flex items-center justify-center text-xs transition-all shadow-sm';
      if (icon) icon.className = 'fa-regular fa-star';
      buttonEl.title = 'Simpan ke Favorit';
      showToast('Dihapus dari daftar favorit', 'fa-star-half-stroke', 'bg-slate-700');
    } else {
      bookmarkedIds.add(id);
      buttonEl.className = 'btn-bookmark-doa w-9 h-9 rounded-2xl bg-amber-50 text-amber-500 border-amber-200 border flex items-center justify-center text-xs transition-all shadow-sm';
      if (icon) icon.className = 'fa-solid fa-star';
      buttonEl.title = 'Hapus dari Favorit';
      showToast('Ditambahkan ke daftar favorit!', 'fa-star', 'bg-amber-500');
    }

    localStorage.setItem(STORAGE_KEY_BOOKMARKS, JSON.stringify([...bookmarkedIds]));
    updateBookmarkCounters();

    // Jika sedang dalam mode hanya bookmark, re-render tampilan
    if (onlyBookmarks) {
      applyFilters();
    }
  }

  // RENDER PAGINATION NUMBERS & CONTROLS
  function renderPagination(totalPages) {
    paginationButtons.innerHTML = '';
    currentPageNum.textContent = currentPage;
    totalPagesNum.textContent = totalPages;

    if (totalPages <= 1) {
      paginationContainer.classList.add('hidden');
      return;
    }
    paginationContainer.classList.remove('hidden');

    // Tombol Previous
    const prevBtn = document.createElement('button');
    prevBtn.type = 'button';
    prevBtn.disabled = currentPage === 1;
    prevBtn.className = `px-3.5 py-2 rounded-2xl text-xs font-bold transition-all flex items-center gap-1.5 ${
      currentPage === 1 
        ? 'bg-slate-100 text-slate-400 cursor-not-allowed' 
        : 'bg-white hover:bg-sky-50 text-slate-700 hover:text-sky-600 border border-slate-200 shadow-sm'
    }`;
    prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left text-[10px]"></i> <span>Prev</span>';
    prevBtn.addEventListener('click', () => {
      if (currentPage > 1) {
        goToPage(currentPage - 1);
      }
    });
    paginationButtons.appendChild(prevBtn);

    // Hitung range nomor halaman
    const delta = 2;
    const range = [];
    const rangeWithDots = [];
    let l;

    for (let i = 1; i <= totalPages; i++) {
      if (i === 1 || i === totalPages || (i >= currentPage - delta && i <= currentPage + delta)) {
        range.push(i);
      }
    }

    for (let i of range) {
      if (l) {
        if (i - l === 2) {
          rangeWithDots.push(l + 1);
        } else if (i - l !== 1) {
          rangeWithDots.push('...');
        }
      }
      rangeWithDots.push(i);
      l = i;
    }

    // Render Page Number Buttons
    rangeWithDots.forEach(p => {
      if (p === '...') {
        const dots = document.createElement('span');
        dots.className = 'px-2 py-1 text-slate-400 text-xs font-bold';
        dots.textContent = '...';
        paginationButtons.appendChild(dots);
      } else {
        const numBtn = document.createElement('button');
        numBtn.type = 'button';
        numBtn.className = `w-9 h-9 rounded-2xl text-xs font-bold transition-all flex items-center justify-center ${
          p === currentPage
            ? 'bg-sky-600 text-white shadow-md shadow-sky-600/30'
            : 'bg-white hover:bg-sky-50 text-slate-700 hover:text-sky-600 border border-slate-200 shadow-sm'
        }`;
        numBtn.textContent = p;
        numBtn.addEventListener('click', () => goToPage(p));
        paginationButtons.appendChild(numBtn);
      }
    });

    // Tombol Next
    const nextBtn = document.createElement('button');
    nextBtn.type = 'button';
    nextBtn.disabled = currentPage === totalPages;
    nextBtn.className = `px-3.5 py-2 rounded-2xl text-xs font-bold transition-all flex items-center gap-1.5 ${
      currentPage === totalPages 
        ? 'bg-slate-100 text-slate-400 cursor-not-allowed' 
        : 'bg-white hover:bg-sky-50 text-slate-700 hover:text-sky-600 border border-slate-200 shadow-sm'
    }`;
    nextBtn.innerHTML = '<span>Next</span> <i class="fa-solid fa-chevron-right text-[10px]"></i>';
    nextBtn.addEventListener('click', () => {
      if (currentPage < totalPages) {
        goToPage(currentPage + 1);
      }
    });
    paginationButtons.appendChild(nextBtn);
  }

  // GO TO SPECIFIC PAGE DENGAN AUTO SCROLL HALUS
  function goToPage(page) {
    currentPage = page;
    renderCurrentPage();

    // Auto scroll ke bagian atas daftar doa / search filter
    const filterSection = document.getElementById('filterSection');
    if (filterSection) {
      const topOffset = filterSection.getBoundingClientRect().top + window.pageYOffset - 90;
      window.scrollTo({
        top: topOffset,
        behavior: 'smooth'
      });
    }
  }

  // SEARCH INPUT EVENT (DEBOUNCE UNTUK PERFORMA HALUS)
  let searchTimeout = null;
  searchInput.addEventListener('input', () => {
    if (searchTimeout) clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
      currentPage = 1;
      applyFilters();
    }, 250);
  });

  // CLEAR SEARCH EVENT
  btnClearSearch.addEventListener('click', () => {
    searchInput.value = '';
    btnClearSearch.classList.add('hidden');
    currentPage = 1;
    applyFilters();
    searchInput.focus();
  });

  // CATEGORY SELECT CHANGE
  categorySelect.addEventListener('change', () => {
    currentCategory = categorySelect.value;
    updatePillStyles();
    currentPage = 1;
    applyFilters();
  });

  // RESET BUTTONS
  function resetAllFilters() {
    searchInput.value = '';
    categorySelect.value = 'ALL';
    currentCategory = 'ALL';
    onlyBookmarks = false;
    updateBookmarkFilterButton();
    updatePillStyles();
    currentPage = 1;
    applyFilters();
    showToast('Filter pencarian telah direset', 'fa-rotate-left', 'bg-slate-700');
  }

  btnResetFilter.addEventListener('click', resetAllFilters);
  btnResetEmpty.addEventListener('click', resetAllFilters);

  // FILTER BOOKMARK BUTTON
  function updateBookmarkFilterButton() {
    if (onlyBookmarks) {
      btnFilterBookmark.className = 'inline-flex items-center gap-2 px-4 py-2 rounded-2xl bg-amber-500 text-white text-xs font-bold border border-amber-600 transition-all shadow-md';
    } else {
      btnFilterBookmark.className = 'inline-flex items-center gap-2 px-4 py-2 rounded-2xl bg-slate-100 hover:bg-amber-50 text-slate-700 hover:text-amber-700 text-xs font-bold border border-slate-200 hover:border-amber-200 transition-all shadow-sm';
    }
  }

  btnFilterBookmark.addEventListener('click', () => {
    onlyBookmarks = !onlyBookmarks;
    updateBookmarkFilterButton();
    currentPage = 1;
    applyFilters();
  });

  // RETRY & FALLBACK BUTTONS
  btnRetryFetch.addEventListener('click', fetchDoaData);
  btnLoadFallback.addEventListener('click', useFallbackData);

  // LOADING STATES
  function showLoading() {
    loadingSkeleton.classList.remove('hidden');
    emptyState.classList.add('hidden');
    errorState.classList.add('hidden');
    paginationContainer.classList.add('hidden');
    resultInfoText.textContent = 'Menghubungkan ke API Doa...';
  }

  function hideLoading() {
    loadingSkeleton.classList.add('hidden');
  }

  // UTILITY: HIGHLIGHT TEXT
  function highlightText(text, query) {
    if (!text) return '';
    if (!query) return escapeHtml(text);
    const escapedText = escapeHtml(text);
    const escapedQuery = escapeHtml(query);
    const regex = new RegExp(`(${escapedQuery})`, 'gi');
    return escapedText.replace(regex, '<mark class="bg-amber-200 text-slate-900 rounded px-1 py-0.5 font-bold">$1</mark>');
  }

  // UTILITY: ESCAPE HTML
  function escapeHtml(str) {
    if (!str) return '';
    return str
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  // START INITIAL FETCH
  fetchDoaData();
});
</script>

<?php include 'includes/footer.php'; ?>
