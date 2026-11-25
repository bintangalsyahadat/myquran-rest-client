<?php
$pageTitle = "99 Asmaul Husna & Kalender Hijriah";
include 'includes/header.php';
?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
  
  <!-- HERO BANNER LENGKAP -->
  <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-purple-800 via-indigo-900 to-slate-900 text-white p-7 sm:p-12 shadow-2xl shadow-purple-950/20 border border-purple-500/20">
    <div class="absolute -top-24 -left-24 w-72 h-72 bg-purple-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-indigo-400/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-10 text-[260px] pointer-events-none font-arabic select-none">
      الله
    </div>

    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
      <div class="space-y-4 max-w-2xl">
        <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-purple-200 text-xs font-semibold tracking-wide">
          <i class="fa-solid fa-sparkles text-amber-300"></i>
          99 Nama-Nama Agung & Sempurna Allah SWT
        </div>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">
          Tadaburi Keagungan <br>
          <span class="bg-gradient-to-r from-purple-300 via-indigo-200 to-amber-200 bg-clip-text text-transparent">Asmaul Husna.</span>
        </h1>
        <p class="text-purple-100/80 text-sm sm:text-base leading-relaxed">
          Mengenal sifat-sifat Allah yang Maha Pengasih dan Maha Penyayang beserta konversi penanggalan kalender Islam (Hijriah).
        </p>
      </div>

      <!-- WIDGET KALENDER HIJRIAH & KONVERTER TANGGAL TANPA RELOAD -->
      <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-6 sm:p-7 min-w-[290px] sm:min-w-[320px] shadow-xl text-center flex flex-col justify-center space-y-3">
        <div class="text-[11px] uppercase font-bold tracking-widest text-purple-300 flex items-center justify-center gap-2">
          <i class="fa-solid fa-moon text-amber-300"></i>
          <span id="hijriWidgetLabel">Kalender Hijriah Hari Ini</span>
        </div>
        <div id="hijriDateText" class="text-2xl sm:text-3xl font-extrabold text-white tracking-wide pt-1">
          <i class="fa-solid fa-spinner fa-spin text-lg mr-2"></i> Memuat...
        </div>
        <div id="masehiDateText" class="text-xs text-purple-200/85 font-medium pt-2 border-t border-white/10">
          -
        </div>

        <!-- Konverter Tanggal Masehi -> Hijriah -->
        <div class="pt-2 flex items-center justify-center gap-2">
          <input
            type="date"
            id="hijriDatePicker"
            aria-label="Pilih tanggal Masehi untuk konversi Hijriah"
            class="bg-white/10 hover:bg-white/15 focus:bg-white/20 border border-white/20 rounded-xl px-3 py-1.5 text-xs text-white font-semibold focus:outline-none focus:ring-2 focus:ring-purple-300/60 transition [color-scheme:dark]"
          >
          <button
            type="button"
            id="hijriResetBtn"
            onclick="resetHijriToday()"
            class="hidden px-3 py-1.5 rounded-xl bg-purple-500/40 hover:bg-purple-500/60 border border-purple-300/30 text-white text-xs font-bold transition"
            title="Kembali ke tanggal hari ini"
          >
            Hari Ini
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- HEADER BAR, PENCARIAN INSTAN & FILTER SECTION -->
  <section id="husnaHeaderSection" class="hidden glass-card rounded-3xl p-4 sm:p-6 shadow-sm space-y-4">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
      <!-- Title & Mobile Badge -->
      <div class="flex items-center justify-between gap-3">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-2xl bg-purple-50 text-purple-700 flex items-center justify-center text-lg shadow-inner shrink-0">
            <i class="fa-solid fa-star-and-crescent"></i>
          </div>
          <div>
            <h2 class="text-sm sm:text-base font-extrabold text-slate-900">Daftar 99 Asmaul Husna</h2>
            <p class="text-xs text-slate-400">Cari nama Arab, Latin, arti, atau klik kartu untuk tadabbur</p>
          </div>
        </div>
        <span id="husnaCountBadge" class="md:hidden text-[11px] font-bold text-purple-700 bg-purple-50 border border-purple-100 px-3 py-1 rounded-xl shrink-0 whitespace-nowrap">
          99 Nama
        </span>
      </div>

      <!-- Search Input & Desktop Badge -->
      <div class="flex items-center gap-3 w-full md:w-auto">
        <div class="relative w-full md:w-80">
          <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
          <input
            type="text"
            id="searchHusnaInput"
            placeholder="Cari Asmaul Husna (contoh: Rahman, Pengasih, 1)..."
            autocomplete="off"
            class="w-full pl-11 pr-10 py-2.5 bg-white border border-slate-200/90 rounded-2xl text-xs sm:text-sm focus:outline-none focus:ring-4 focus:ring-purple-500/10 focus:border-purple-600 transition shadow-sm"
          >
          <button
            id="clearSearchBtn"
            type="button"
            onclick="clearSearch()"
            class="hidden absolute right-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-400 hover:text-slate-600 flex items-center justify-center text-xs transition"
            title="Hapus pencarian"
          >
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

        <div id="husnaCountBadgeDesktop" class="hidden md:inline-flex text-xs font-bold text-purple-700 bg-purple-50 border border-purple-100 px-4 py-2.5 rounded-2xl shrink-0 whitespace-nowrap">
          Total: 99 Nama
        </div>
      </div>
    </div>

    <!-- FILTER TABS: SEMUA, RENTANG NOMOR & FAVORIT -->
    <div class="pt-2 border-t border-slate-100 flex items-center gap-2 overflow-x-auto pb-1">
      <button type="button" onclick="setHusnaFilter('all')" id="filterTab-all" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-purple-700 text-white shadow-sm shadow-purple-700/20 whitespace-nowrap">
        Semua (99)
      </button>
      <button type="button" onclick="setHusnaFilter('1-33')" id="filterTab-1-33" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-100 text-slate-600 hover:bg-slate-200 whitespace-nowrap">
        1 - 33
      </button>
      <button type="button" onclick="setHusnaFilter('34-66')" id="filterTab-34-66" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-100 text-slate-600 hover:bg-slate-200 whitespace-nowrap">
        34 - 66
      </button>
      <button type="button" onclick="setHusnaFilter('67-99')" id="filterTab-67-99" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-100 text-slate-600 hover:bg-slate-200 whitespace-nowrap">
        67 - 99
      </button>
      <button type="button" onclick="setHusnaFilter('fav')" id="filterTab-fav" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-100 text-slate-600 hover:bg-slate-200 whitespace-nowrap inline-flex items-center gap-1.5">
        <i class="fa-solid fa-bookmark text-[10px]"></i>
        <span>Hafalan / Favorit (<span id="favCountLabel">0</span>)</span>
      </button>
    </div>
  </section>

  <!-- GRID 99 ASMAUL HUSNA -->
  <section class="space-y-4">
    <div id="husnaGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      <div class="col-span-full py-16 text-center text-slate-400">
        <i class="fa-solid fa-spinner fa-spin text-2xl mr-2 text-purple-600"></i> Mengambil 99 Asmaul Husna dari API...
      </div>
    </div>
  </section>

</div>

<!-- ================= MODAL DETAIL ASMAUL HUSNA ================= -->
<div id="husnaDetailModal" class="fixed inset-0 z-[65] bg-slate-950/60 backdrop-blur-sm hidden flex items-center justify-center p-4 transition-all" onclick="handleModalBackdropClick(event)">
  <div class="bg-white w-full max-w-lg rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden" onclick="event.stopPropagation()">
    <!-- Modal Header -->
    <div class="bg-gradient-to-br from-purple-800 via-indigo-900 to-slate-900 text-white px-6 py-5 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <span id="modalHusnaNumber" class="w-10 h-10 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center font-extrabold text-sm">
          1
        </span>
        <div>
          <div class="text-[11px] uppercase tracking-wider text-purple-200 font-bold">Asmaul Husna</div>
          <h3 id="modalHusnaTitle" class="font-extrabold text-base sm:text-lg text-white">Ar-Rahmânu</h3>
        </div>
      </div>
      <button type="button" onclick="closeHusnaModal()" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <!-- Modal Body -->
    <div class="p-6 sm:p-8 space-y-6 text-center">
      <div class="bg-purple-50/70 border border-purple-100 rounded-3xl py-8 px-4">
        <div id="modalHusnaArab" class="font-arabic text-5xl sm:text-6xl font-bold text-slate-900 leading-loose" dir="rtl">
          الرَّحْمـٰنُ
        </div>
      </div>

      <div class="space-y-2">
        <div id="modalHusnaLatin" class="text-2xl font-extrabold text-purple-800">Ar-Rahmânu</div>
        <p id="modalHusnaIndo" class="text-sm sm:text-base text-slate-600 font-medium leading-relaxed">
          Yang Maha Pengasih
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-2.5 pt-2">
        <button type="button" id="modalCopyBtn" onclick="copyCurrentModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs shadow-md shadow-purple-700/20 transition">
          <i class="fa-regular fa-copy"></i>
          <span>Salin</span>
        </button>
        <button type="button" id="modalFavBtn" onclick="toggleFavoriteCurrentModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-slate-100 hover:bg-purple-50 text-slate-700 font-bold text-xs transition">
          <i class="fa-regular fa-bookmark"></i>
          <span>Tandai Hafalan</span>
        </button>
      </div>
    </div>

    <!-- Modal Footer Navigation -->
    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
      <button type="button" id="modalPrevBtn" onclick="navigateModal(-1)" class="inline-flex items-center gap-2 px-4 py-2 rounded-2xl bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold text-xs transition disabled:opacity-40 disabled:pointer-events-none">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Sebelumnya</span>
      </button>
      <span id="modalCounterText" class="text-xs font-bold text-slate-400">1 / 99</span>
      <button type="button" id="modalNextBtn" onclick="navigateModal(1)" class="inline-flex items-center gap-2 px-4 py-2 rounded-2xl bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold text-xs transition disabled:opacity-40 disabled:pointer-events-none">
        <span>Berikutnya</span>
        <i class="fa-solid fa-arrow-right"></i>
      </button>
    </div>
  </div>
</div>

<!-- TOAST NOTIFICATION -->
<div id="toastNotification" class="fixed bottom-24 lg:bottom-6 right-4 sm:right-6 z-[80] hidden items-center gap-2.5 px-4 py-3 rounded-2xl bg-slate-900 text-white text-xs font-bold shadow-xl border border-slate-700">
  <i id="toastIcon" class="fa-solid fa-circle-check text-purple-400"></i>
  <span id="toastMessage">Berhasil</span>
</div>

<script>
  const HUSNA_API_URL = 'https://api.myquran.com/v2/husna/semua';
  const HIJRI_API_BASE = 'https://api.myquran.com/v2/cal/hijr';
  const FAVORITE_STORAGE_KEY = 'myquran_husna_favorites';

  let allHusna = [];
  let currentFilter = 'all';
  let activeModalId = null;
  let toastTimeout = null;

  // ===================== HELPER UTILITIES =====================
  function escapeHtml(value) {
    return String(value ?? '')
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#39;');
  }

  function normalizeLatin(str) {
    return String(str ?? '')
      .normalize('NFD')
      .replace(/[\u0300-\u036f]/g, '')
      .replace(/[ḫḪ]/g, 'h')
      .replace(/[`'’\-]/g, '')
      .toLowerCase()
      .trim();
  }

  function showToast(message, isError = false) {
    const toast = document.getElementById('toastNotification');
    const toastMsg = document.getElementById('toastMessage');
    const toastIcon = document.getElementById('toastIcon');
    if (!toast || !toastMsg || !toastIcon) return;

    toastMsg.textContent = message;
    toastIcon.className = isError
      ? 'fa-solid fa-circle-exclamation text-amber-400'
      : 'fa-solid fa-circle-check text-purple-400';

    toast.classList.remove('hidden');
    toast.classList.add('flex');

    if (toastTimeout) clearTimeout(toastTimeout);
    toastTimeout = setTimeout(() => {
      toast.classList.add('hidden');
      toast.classList.remove('flex');
    }, 2600);
  }

  function getFavorites() {
    try {
      const raw = localStorage.getItem(FAVORITE_STORAGE_KEY);
      const parsed = raw ? JSON.parse(raw) : [];
      return Array.isArray(parsed) ? parsed : [];
    } catch (e) {
      return [];
    }
  }

  function saveFavorites(ids) {
    try {
      localStorage.setItem(FAVORITE_STORAGE_KEY, JSON.stringify(ids));
    } catch (e) {
      // Abaikan jika storage penuh / mode privat
    }
    updateFavoriteCountUI();
  }

  function updateFavoriteCountUI() {
    const label = document.getElementById('favCountLabel');
    if (label) label.textContent = getFavorites().length;
  }

  // ===================== KALENDER HIJRIAH =====================
  function formatIsoDate(dateObj) {
    const yyyy = dateObj.getFullYear();
    const mm = String(dateObj.getMonth() + 1).padStart(2, '0');
    const dd = String(dateObj.getDate()).padStart(2, '0');
    return `${yyyy}-${mm}-${dd}`;
  }

  async function loadHijriCalendar(targetDate = new Date(), isCustomDate = false) {
    const isoDate = formatIsoDate(targetDate);
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const masehiEl = document.getElementById('masehiDateText');
    const hijriEl = document.getElementById('hijriDateText');
    const labelEl = document.getElementById('hijriWidgetLabel');
    const pickerEl = document.getElementById('hijriDatePicker');
    const resetBtn = document.getElementById('hijriResetBtn');

    if (pickerEl && !pickerEl.value) pickerEl.value = isoDate;
    if (labelEl) labelEl.textContent = isCustomDate ? 'Konversi Kalender Hijriah' : 'Kalender Hijriah Hari Ini';
    if (resetBtn) resetBtn.classList.toggle('hidden', !isCustomDate);
    if (masehiEl) masehiEl.textContent = targetDate.toLocaleDateString('id-ID', options);
    if (hijriEl) hijriEl.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-lg mr-2"></i> Memuat...';

    try {
      const res = await fetch(`${HIJRI_API_BASE}/${isoDate}`);
      const data = await res.json();
      if (data.status && data.data && Array.isArray(data.data.date) && hijriEl) {
        // API v2 mengembalikan ["Rabu", "14 Jumadil Akhir 1448 H", "25-11-2026"]
        const hijriFormatted = data.data.date[1] || data.data.date.join(' ');
        hijriEl.textContent = hijriFormatted;
      } else if (hijriEl) {
        hijriEl.textContent = 'Kalender Hijriah';
      }
    } catch (err) {
      if (hijriEl) hijriEl.textContent = 'Gagal Memuat Hijriah';
    }
  }

  function resetHijriToday() {
    const today = new Date();
    const pickerEl = document.getElementById('hijriDatePicker');
    if (pickerEl) pickerEl.value = formatIsoDate(today);
    loadHijriCalendar(today, false);
  }

  const hijriDatePicker = document.getElementById('hijriDatePicker');
  if (hijriDatePicker) {
    hijriDatePicker.addEventListener('change', (e) => {
      if (!e.target.value) return;
      const [y, m, d] = e.target.value.split('-').map(Number);
      const selected = new Date(y, m - 1, d);
      const isToday = formatIsoDate(selected) === formatIsoDate(new Date());
      loadHijriCalendar(selected, !isToday);
    });
  }

  // ===================== FETCH & RENDER 99 ASMAUL HUSNA =====================
  async function loadAsmaulHusna() {
    const grid = document.getElementById('husnaGrid');
    const headerSection = document.getElementById('husnaHeaderSection');

    if (headerSection) headerSection.classList.add('hidden');
    if (grid) {
      grid.innerHTML = `
        <div class="col-span-full py-16 text-center text-slate-400">
          <i class="fa-solid fa-spinner fa-spin text-2xl mr-2 text-purple-600"></i> Mengambil 99 Asmaul Husna dari API...
        </div>
      `;
    }

    try {
      const res = await fetch(HUSNA_API_URL);
      const data = await res.json();

      if (data.status && Array.isArray(data.data) && data.data.length > 0) {
        allHusna = data.data;
        updateFavoriteCountUI();
        if (headerSection) headerSection.classList.remove('hidden');
        applyHusnaFilters();
      } else {
        renderErrorState(
          'Gagal Memuat Asmaul Husna',
          'Data dari server API MyQuran sedang tidak tersedia. Silakan coba muat ulang.',
          'fa-triangle-exclamation'
        );
      }
    } catch (err) {
      console.error(err);
      renderErrorState(
        'Koneksi Internet Terputus',
        'Tidak dapat terhubung ke server API MyQuran. Pastikan perangkat Anda terhubung ke internet.',
        'fa-wifi'
      );
    }
  }

  function renderErrorState(title, description, iconClass) {
    const grid = document.getElementById('husnaGrid');
    if (!grid) return;
    grid.innerHTML = `
      <div class="col-span-full py-16 px-4">
        <div class="max-w-md mx-auto text-center bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm space-y-4">
          <div class="w-16 h-16 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-2xl mx-auto shadow-inner">
            <i class="fa-solid ${iconClass}"></i>
          </div>
          <div class="space-y-1">
            <h3 class="font-extrabold text-base text-slate-900">${escapeHtml(title)}</h3>
            <p class="text-xs text-slate-500 leading-relaxed">${escapeHtml(description)}</p>
          </div>
          <button type="button" onclick="loadAsmaulHusna()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs shadow-md shadow-purple-700/20 hover:scale-105 active:scale-95 transition-all">
            <i class="fa-solid fa-rotate-right"></i>
            <span>Coba Muat Ulang</span>
          </button>
        </div>
      </div>
    `;
  }

  function getFilteredHusna() {
    const searchInput = document.getElementById('searchHusnaInput');
    const rawKeyword = (searchInput ? searchInput.value : '').trim();
    const keywordLower = rawKeyword.toLowerCase();
    const keywordNorm = normalizeLatin(rawKeyword);
    const favorites = getFavorites();

    return allHusna.filter((item) => {
      const idNum = Number(item.id);

      // Filter tab rentang / favorit
      if (currentFilter === '1-33' && (idNum < 1 || idNum > 33)) return false;
      if (currentFilter === '34-66' && (idNum < 34 || idNum > 66)) return false;
      if (currentFilter === '67-99' && (idNum < 67 || idNum > 99)) return false;
      if (currentFilter === 'fav' && !favorites.includes(idNum)) return false;

      if (!rawKeyword) return true;

      const arab = String(item.arab || '');
      const latinLower = String(item.latin || '').toLowerCase();
      const latinNorm = normalizeLatin(item.latin || '');
      const indoLower = String(item.indo || item.arti || '').toLowerCase();
      const idStr = String(idNum);

      return (
        idStr === keywordLower ||
        arab.includes(rawKeyword) ||
        latinLower.includes(keywordLower) ||
        (keywordNorm && latinNorm.includes(keywordNorm)) ||
        indoLower.includes(keywordLower)
      );
    });
  }

  function renderHusnaCards(list) {
    const grid = document.getElementById('husnaGrid');
    const badgeMobile = document.getElementById('husnaCountBadge');
    const badgeDesktop = document.getElementById('husnaCountBadgeDesktop');

    if (badgeMobile) badgeMobile.textContent = `${list.length} Nama`;
    if (badgeDesktop) badgeDesktop.textContent = `Total: ${list.length} Nama`;
    if (!grid) return;

    if (list.length === 0) {
      const isFavEmpty = currentFilter === 'fav' && !(document.getElementById('searchHusnaInput')?.value.trim());
      grid.innerHTML = `
        <div class="col-span-full py-16 px-4">
          <div class="max-w-md mx-auto text-center bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm space-y-4">
            <div class="w-16 h-16 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-2xl mx-auto shadow-inner">
              <i class="fa-solid ${isFavEmpty ? 'fa-bookmark' : 'fa-magnifying-glass'}"></i>
            </div>
            <div class="space-y-1">
              <h3 class="font-extrabold text-base text-slate-900">
                ${isFavEmpty ? 'Belum Ada Hafalan / Favorit' : 'Asmaul Husna Tidak Ditemukan'}
              </h3>
              <p class="text-xs text-slate-500 leading-relaxed">
                ${isFavEmpty
                  ? 'Klik ikon bookmark pada kartu Asmaul Husna untuk menandai nama-nama yang sedang Anda hafalkan.'
                  : 'Tidak ada nama Arab, Latin, arti, atau nomor urut yang cocok dengan kata kunci pencarian Anda.'}
              </p>
            </div>
            <button type="button" onclick="${isFavEmpty ? "setHusnaFilter('all')" : 'clearSearch()'}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all">
              <i class="fa-solid ${isFavEmpty ? 'fa-layer-group' : 'fa-xmark'}"></i>
              <span>${isFavEmpty ? 'Tampilkan Semua 99 Nama' : 'Bersihkan Pencarian'}</span>
            </button>
          </div>
        </div>
      `;
      return;
    }

    const favorites = getFavorites();

    grid.innerHTML = list.map((item) => {
      const id = Number(item.id);
      const arab = escapeHtml(item.arab || '');
      const latin = escapeHtml(item.latin || '');
      const arti = escapeHtml(item.indo || item.arti || '');
      const isFav = favorites.includes(id);

      return `
        <article
          id="husna-card-${id}"
          onclick="openHusnaModal(${id})"
          class="group relative overflow-hidden bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-purple-400/80 hover:-translate-y-1 transition-all cursor-pointer flex flex-col justify-between gap-4"
        >
          <!-- Baris Atas: Nomor Urut & Aksi Cepat -->
          <div class="flex items-center justify-between gap-2">
            <div class="w-10 h-10 rounded-2xl bg-purple-50 text-purple-700 group-hover:bg-purple-700 group-hover:text-white font-extrabold flex items-center justify-center text-sm transition-all shadow-inner">
              ${id}
            </div>

            <div class="flex items-center gap-1.5">
              <button
                type="button"
                onclick="copyHusna(${id}, event)"
                class="w-8 h-8 rounded-xl bg-slate-100 hover:bg-purple-50 text-slate-500 hover:text-purple-700 flex items-center justify-center text-xs transition"
                title="Salin Asmaul Husna"
              >
                <i class="fa-regular fa-copy"></i>
              </button>
              <button
                type="button"
                onclick="toggleFavorite(${id}, event)"
                class="w-8 h-8 rounded-xl ${isFav ? 'bg-purple-100 text-purple-700' : 'bg-slate-100 hover:bg-purple-50 text-slate-400 hover:text-purple-700'} flex items-center justify-center text-xs transition"
                title="${isFav ? 'Hapus dari hafalan' : 'Tandai sebagai hafalan'}"
              >
                <i class="fa-${isFav ? 'solid' : 'regular'} fa-bookmark"></i>
              </button>
            </div>
          </div>

          <!-- Tengah: Kaligrafi Arab -->
          <div class="py-2 text-right">
            <div class="font-arabic text-3xl sm:text-4xl font-bold text-slate-900 group-hover:text-purple-900 leading-loose transition" dir="rtl">
              ${arab}
            </div>
          </div>

          <!-- Bawah: Nama Latin & Arti -->
          <div class="pt-3 border-t border-slate-100 space-y-1">
            <h3 class="font-extrabold text-base text-slate-900 group-hover:text-purple-700 transition">
              ${latin}
            </h3>
            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
              ${arti}
            </p>
          </div>
        </article>
      `;
    }).join('');
  }

  function applyHusnaFilters() {
    const filtered = getFilteredHusna();
    renderHusnaCards(filtered);
  }

  function setHusnaFilter(filterKey) {
    currentFilter = filterKey;
    ['all', '1-33', '34-66', '67-99', 'fav'].forEach((tab) => {
      const btn = document.getElementById(`filterTab-${tab}`);
      if (!btn) return;
      if (tab === filterKey) {
        btn.className = 'px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-purple-700 text-white shadow-sm shadow-purple-700/20 whitespace-nowrap inline-flex items-center gap-1.5';
      } else {
        btn.className = 'px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-100 text-slate-600 hover:bg-slate-200 whitespace-nowrap inline-flex items-center gap-1.5';
      }
    });
    applyHusnaFilters();
  }

  const searchHusnaInput = document.getElementById('searchHusnaInput');
  const clearSearchBtn = document.getElementById('clearSearchBtn');

  if (searchHusnaInput) {
    searchHusnaInput.addEventListener('input', (e) => {
      const hasValue = e.target.value.trim().length > 0;
      if (clearSearchBtn) clearSearchBtn.classList.toggle('hidden', !hasValue);
      applyHusnaFilters();
    });
  }

  function clearSearch() {
    if (searchHusnaInput) {
      searchHusnaInput.value = '';
      if (clearSearchBtn) clearSearchBtn.classList.add('hidden');
      applyHusnaFilters();
      searchHusnaInput.focus();
    }
  }

  // ===================== INTERAKSI: FAVORIT & SALIN =====================
  function toggleFavorite(id, event) {
    if (event) event.stopPropagation();
    const numId = Number(id);
    const favs = getFavorites();
    const idx = favs.indexOf(numId);

    if (idx >= 0) {
      favs.splice(idx, 1);
      showToast('Dihapus dari daftar hafalan');
    } else {
      favs.push(numId);
      showToast('Ditandai ke daftar hafalan');
    }

    saveFavorites(favs);
    applyHusnaFilters();
    if (activeModalId === numId) updateModalFavoriteButton(numId);
  }

  async function copyHusna(id, event) {
    if (event) event.stopPropagation();
    const item = allHusna.find((h) => Number(h.id) === Number(id));
    if (!item) return;

    const arti = item.indo || item.arti || '';
    const textToCopy = `${item.id}. ${item.latin} (${item.arab}) - ${arti}`;

    try {
      await navigator.clipboard.writeText(textToCopy);
      showToast(`"${item.latin}" berhasil disalin`);
    } catch (err) {
      showToast('Gagal menyalin ke clipboard', true);
    }
  }

  // ===================== MODAL DETAIL ASMAUL HUSNA =====================
  function openHusnaModal(id) {
    const item = allHusna.find((h) => Number(h.id) === Number(id));
    if (!item) return;

    activeModalId = Number(item.id);
    const modal = document.getElementById('husnaDetailModal');
    const numEl = document.getElementById('modalHusnaNumber');
    const titleEl = document.getElementById('modalHusnaTitle');
    const arabEl = document.getElementById('modalHusnaArab');
    const latinEl = document.getElementById('modalHusnaLatin');
    const indoEl = document.getElementById('modalHusnaIndo');
    const counterEl = document.getElementById('modalCounterText');
    const prevBtn = document.getElementById('modalPrevBtn');
    const nextBtn = document.getElementById('modalNextBtn');

    if (numEl) numEl.textContent = item.id;
    if (titleEl) titleEl.textContent = item.latin || '';
    if (arabEl) arabEl.textContent = item.arab || '';
    if (latinEl) latinEl.textContent = item.latin || '';
    if (indoEl) indoEl.textContent = item.indo || item.arti || '';
    if (counterEl) counterEl.textContent = `${item.id} / ${allHusna.length}`;

    if (prevBtn) prevBtn.disabled = activeModalId <= 1;
    if (nextBtn) nextBtn.disabled = activeModalId >= allHusna.length;

    updateModalFavoriteButton(activeModalId);
    if (modal) modal.classList.remove('hidden');
  }

  function updateModalFavoriteButton(id) {
    const btn = document.getElementById('modalFavBtn');
    if (!btn) return;
    const isFav = getFavorites().includes(Number(id));
    btn.className = isFav
      ? 'inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-purple-100 hover:bg-purple-200 text-purple-800 font-bold text-xs transition'
      : 'inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-slate-100 hover:bg-purple-50 text-slate-700 font-bold text-xs transition';
    btn.innerHTML = `<i class="fa-${isFav ? 'solid' : 'regular'} fa-bookmark"></i><span>${isFav ? 'Sudah Ditandai' : 'Tandai Hafalan'}</span>`;
  }

  function closeHusnaModal() {
    const modal = document.getElementById('husnaDetailModal');
    if (modal) modal.classList.add('hidden');
    activeModalId = null;
  }

  function handleModalBackdropClick(e) {
    if (e.target.id === 'husnaDetailModal') {
      closeHusnaModal();
    }
  }

  function navigateModal(step) {
    if (activeModalId === null) return;
    const nextId = activeModalId + step;
    if (nextId >= 1 && nextId <= allHusna.length) {
      openHusnaModal(nextId);
    }
  }

  function copyCurrentModal() {
    if (activeModalId !== null) copyHusna(activeModalId);
  }

  function toggleFavoriteCurrentModal() {
    if (activeModalId !== null) toggleFavorite(activeModalId);
  }

  document.addEventListener('keydown', (e) => {
    const modal = document.getElementById('husnaDetailModal');
    if (!modal || modal.classList.contains('hidden')) return;
    if (e.key === 'Escape') closeHusnaModal();
    if (e.key === 'ArrowLeft') navigateModal(-1);
    if (e.key === 'ArrowRight') navigateModal(1);
  });

  // Muat data saat halaman siap
  loadHijriCalendar(new Date(), false);
  loadAsmaulHusna();
</script>

<?php include 'includes/footer.php'; ?>
