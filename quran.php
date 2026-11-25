<?php
$pageTitle = "Al-Qur'an Digital & Audio Murottal";
include 'includes/header.php';
?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
  
  <!-- HERO BANNER -->
  <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-amber-700 via-amber-800 to-slate-900 text-white p-7 sm:p-12 shadow-2xl shadow-amber-950/20 border border-amber-500/20">
    <div class="absolute -top-24 -left-24 w-72 h-72 bg-amber-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-orange-400/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-10 text-[260px] pointer-events-none font-arabic select-none">
      القرآن
    </div>

    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
      <div class="space-y-4 max-w-2xl">
        <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-amber-200 text-xs font-semibold tracking-wide">
          <i class="fa-solid fa-book-open"></i> 114 Surah Lengkap
        </div>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">
          Kalamullah Penenang Jiwa, <br>
          <span class="bg-gradient-to-r from-amber-300 via-orange-200 to-yellow-100 bg-clip-text text-transparent">Baca & Dengarkan.</span>
        </h1>
        <p class="text-amber-100/80 text-sm sm:text-base leading-relaxed">
          Teks Arab berharakat jelas, transliterasi Latin untuk pemula, terjemahan Indonesia, serta pemutar audio per ayat yang interaktif.
        </p>
      </div>

      <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-6 min-w-[260px] shadow-xl text-center flex flex-col justify-center">
        <div class="w-12 h-12 rounded-2xl bg-amber-500/30 text-amber-300 flex items-center justify-center text-xl mx-auto mb-2">
          <i class="fa-solid fa-book-quran"></i>
        </div>
        <div class="text-xl font-extrabold text-white">114 Surah</div>
        <div class="text-xs text-amber-200/80 mt-1">Makkiyyah & Madaniyyah</div>
      </div>
    </div>

    <!-- WIDGET TERAKHIR DIBACA (LAST READ BOOKMARK) -->
    <div id="lastReadBanner" class="hidden relative z-10 mt-8 pt-6 border-t border-white/10">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-black/25 backdrop-blur-xl border border-white/15 px-5 py-4 rounded-3xl shadow-lg">
        <div class="flex items-center gap-3.5">
          <div class="w-10 h-10 rounded-2xl bg-amber-500 text-white flex items-center justify-center text-base shadow-md shadow-amber-500/20 shrink-0">
            <i class="fa-solid fa-bookmark text-white"></i>
          </div>
          <div>
            <div class="text-[11px] font-semibold uppercase tracking-wider text-amber-300/80">Terakhir Dibaca</div>
            <div class="text-sm sm:text-base font-extrabold text-white flex items-center gap-2 mt-0.5">
              <span id="lastReadSurahName">Al-Fatihah</span>
              <span id="lastReadAyahText" class="text-xs font-semibold text-amber-200/80 bg-white/10 px-2 py-0.5 rounded-lg border border-white/10">Ayat 1</span>
            </div>
          </div>
        </div>
        <button id="btnResumeLastRead" type="button" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-2xl bg-amber-500 hover:bg-amber-600 text-white font-extrabold text-xs shadow-md shadow-amber-500/20 transition-all duration-200 hover:scale-[1.03] active:scale-95 shrink-0 self-start sm:self-auto">
          <span class="text-white">Lanjut Membaca</span>
          <i class="fa-solid fa-arrow-right text-[11px] text-white"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- HEADER BAR & SEARCH BAR SECTION (Hidden secara default, hanya tampil jika data surah berhasil dimuat) -->
  <section id="surahHeaderSection" class="hidden glass-card rounded-3xl p-4 sm:p-6 shadow-sm space-y-4">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
      <!-- Title & Badge -->
      <div class="flex items-center justify-between gap-3">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center text-lg shadow-inner shrink-0">
            <i class="fa-solid fa-list"></i>
          </div>
          <div>
            <h2 class="text-sm sm:text-base font-extrabold text-slate-900">Daftar Surah Al-Qur'an</h2>
            <p class="text-xs text-slate-400">Pilih surah untuk membaca ayat-ayatnya</p>
          </div>
        </div>
        <!-- Badge di mobile sebaris dengan judul -->
        <span id="surahCountBadge" class="md:hidden text-[11px] font-bold text-amber-700 bg-amber-50 border border-amber-100 px-3 py-1 rounded-xl shrink-0 whitespace-nowrap">
          114 Surah
        </span>
      </div>

      <!-- Search Input & Badge Desktop -->
      <div class="flex items-center gap-3 w-full md:w-auto">
        <div class="relative w-full md:w-80">
          <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
          <input 
            type="text" 
            id="searchSurahInput" 
            placeholder="Cari surah (contoh: Yasin, Al-Kahf, 18)..." 
            class="w-full pl-11 pr-10 py-2.5 bg-white border border-slate-200/90 rounded-2xl text-xs sm:text-sm focus:outline-none focus:ring-4 focus:ring-amber-500/10 focus:border-amber-600 transition shadow-sm"
          >
          <!-- Tombol Clear Search -->
          <button id="clearSearchBtn" type="button" class="hidden absolute right-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-400 hover:text-slate-600 flex items-center justify-center text-xs transition">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

        <!-- Badge di desktop -->
        <div id="surahCountBadgeDesktop" class="hidden md:inline-flex text-xs font-bold text-amber-700 bg-amber-50 border border-amber-100 px-4 py-2.5 rounded-2xl shrink-0 whitespace-nowrap">
          Total: 114 Surah
        </div>
      </div>
    </div>

    <!-- FILTER TABS: SEMUA, MAKKIYYAH, MADANIYYAH -->
    <div class="pt-2 border-t border-slate-100 flex items-center gap-2 overflow-x-auto no-scrollbar">
      <button type="button" onclick="filterByRevelation('all')" id="filterTab-all" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-amber-600 text-white shadow-sm shadow-amber-600/20">
        Semua (114)
      </button>
      <button type="button" onclick="filterByRevelation('makkiyyah')" id="filterTab-makkiyyah" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-100 text-slate-600 hover:bg-slate-200">
        Makkiyyah (86)
      </button>
      <button type="button" onclick="filterByRevelation('madaniyyah')" id="filterTab-madaniyyah" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-100 text-slate-600 hover:bg-slate-200">
        Madaniyyah (28)
      </button>
    </div>
  </section>

  <!-- GRID LIST 114 SURAH -->
  <section class="space-y-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="surahGrid">
      <div class="col-span-full py-16 text-center text-slate-400">
        <i class="fa-solid fa-spinner fa-spin text-2xl mr-2 text-amber-600"></i> Mengambil 114 surah dari API...
      </div>
    </div>
  </section>

</div>

<script>
  let allSurahs = [];

  // Fetch 114 Surah dari REST API MyQuran
  async function loadSurahList() {
    const grid = document.getElementById('surahGrid');
    const headerSection = document.getElementById('surahHeaderSection');
    const badgeMobile = document.getElementById('surahCountBadge');
    const badgeDesktop = document.getElementById('surahCountBadgeDesktop');

    // Sembunyikan header bar saat loading awal
    if (headerSection) headerSection.classList.add('hidden');
    grid.innerHTML = `
      <div class="col-span-full py-16 text-center text-slate-400">
        <i class="fa-solid fa-spinner fa-spin text-2xl mr-2 text-amber-600"></i> Mengambil 114 surah dari API...
      </div>
    `;

    try {
      const res = await fetch('https://api.myquran.com/v2/quran/surat/semua');
      const data = await res.json();

      if (data.status && data.data && data.data.length > 0) {
        allSurahs = data.data;
        if (badgeMobile) badgeMobile.textContent = `${allSurahs.length} Surah`;
        if (badgeDesktop) badgeDesktop.textContent = `Total: ${allSurahs.length} Surah`;
        // Tampilkan header bar hanya ketika data surah berhasil didapat
        if (headerSection) headerSection.classList.remove('hidden');
        loadLastReadBookmark(); // Tampilkan widget bookmark jika ada
        renderSurahs(allSurahs);
      } else {
        if (headerSection) headerSection.classList.add('hidden');
        grid.innerHTML = `
          <div class="col-span-full py-16 px-4">
            <div class="max-w-md mx-auto text-center bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm space-y-4">
              <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-500 flex items-center justify-center text-2xl mx-auto shadow-inner">
                <i class="fa-solid fa-triangle-exclamation"></i>
              </div>
              <div class="space-y-1">
                <h3 class="font-extrabold text-base text-slate-900">Gagal Memuat Daftar Surah</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                  Terjadi kendala saat mengambil data dari server API MyQuran. Silakan periksa koneksi internet Anda.
                </p>
              </div>
              <button onclick="loadSurahList()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs shadow-md shadow-amber-600/20 hover:scale-105 active:scale-95 transition-all">
                <i class="fa-solid fa-rotate-right"></i>
                <span>Coba Muat Ulang</span>
              </button>
            </div>
          </div>
        `;
        if (badgeMobile) {
          badgeMobile.textContent = 'Gagal';
          badgeMobile.className = 'sm:hidden text-[11px] font-bold text-rose-700 bg-rose-50 border border-rose-100 px-3 py-1 rounded-xl shrink-0 whitespace-nowrap';
        }
        if (badgeDesktop) {
          badgeDesktop.textContent = 'Gagal Memuat';
          badgeDesktop.className = 'hidden sm:inline-flex text-xs font-bold text-rose-700 bg-rose-50 border border-rose-100 px-4 py-2 rounded-2xl shrink-0 whitespace-nowrap';
        }
      }
    } catch (err) {
      console.error(err);
      if (headerSection) headerSection.classList.add('hidden');
      grid.innerHTML = `
        <div class="col-span-full py-16 px-4">
          <div class="max-w-md mx-auto text-center bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm space-y-4">
            <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl mx-auto shadow-inner">
              <i class="fa-solid fa-wifi"></i>
            </div>
            <div class="space-y-1">
              <h3 class="font-extrabold text-base text-slate-900">Koneksi Internet Terputus</h3>
              <p class="text-xs text-slate-500 leading-relaxed">
                Tidak dapat terhubung ke server. Pastikan perangkat Anda terhubung ke internet dan coba lagi.
              </p>
            </div>
            <button onclick="loadSurahList()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs shadow-md shadow-amber-600/20 hover:scale-105 active:scale-95 transition-all">
              <i class="fa-solid fa-rotate-right"></i>
              <span>Coba Lagi</span>
            </button>
          </div>
        </div>
      `;
      if (badgeMobile) {
        badgeMobile.textContent = 'Offline';
        badgeMobile.className = 'sm:hidden text-[11px] font-bold text-amber-700 bg-amber-50 border border-amber-100 px-3 py-1 rounded-xl shrink-0 whitespace-nowrap';
      }
      if (badgeDesktop) {
        badgeDesktop.textContent = 'Koneksi Terputus';
        badgeDesktop.className = 'hidden sm:inline-flex text-xs font-bold text-amber-700 bg-amber-50 border border-amber-100 px-4 py-2 rounded-2xl shrink-0 whitespace-nowrap';
      }
    }
  }

  // Render Card Surah Grid
  function renderSurahs(surahs) {
    const grid = document.getElementById('surahGrid');
    const badgeMobile = document.getElementById('surahCountBadge');
    const badgeDesktop = document.getElementById('surahCountBadgeDesktop');

    if (badgeMobile) badgeMobile.textContent = `${surahs.length} Surah`;
    if (badgeDesktop) badgeDesktop.textContent = `Total: ${surahs.length} Surah`;

    if (surahs.length === 0) {
      grid.innerHTML = `
        <div class="col-span-full py-16 px-4">
          <div class="max-w-md mx-auto text-center bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm space-y-4">
            <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl mx-auto shadow-inner">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="space-y-1">
              <h3 class="font-extrabold text-base text-slate-900">Surah Tidak Ditemukan</h3>
              <p class="text-xs text-slate-500 leading-relaxed">
                Tidak ada nama surah, arti, atau nomor yang cocok dengan kata kunci pencarian Anda.
              </p>
            </div>
            <button onclick="clearSearch()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all">
              <i class="fa-solid fa-xmark"></i>
              <span>Bersihkan Pencarian</span>
            </button>
          </div>
        </div>
      `;
      return;
    }

    grid.innerHTML = surahs.map(s => {
      const nomor = s.number || s.nomor;
      const namaLatin = s.name_id || s.name_en || s.nama_latin;
      const namaArab = s.name_short || s.nama || '';
      const arti = s.translation_id || s.arti || '';
      const totalAyat = s.number_of_verses || s.jumlah_ayat || 0;
      const tempatTurun = s.revelation_id || s.tempat_turun || '';

      return `
        <div onclick="openSurahDetail(${nomor}, '${namaLatin.replace(/'/g, "\\'")}', '${namaArab}', '${arti.replace(/'/g, "\\'")}', ${totalAyat})" class="group relative overflow-hidden bg-white rounded-3xl p-5 border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-amber-400/80 hover:-translate-y-1 transition-all flex items-center justify-between cursor-pointer">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-700 font-extrabold flex items-center justify-center text-sm group-hover:bg-amber-600 group-hover:text-white transition-all shadow-inner">
              ${nomor}
            </div>
            <div>
              <h3 class="font-extrabold text-base text-slate-900 group-hover:text-amber-700 transition">${namaLatin}</h3>
              <p class="text-xs text-slate-400 mt-0.5">${arti} &bull; <span class="font-semibold text-slate-600">${totalAyat} Ayat</span></p>
            </div>
          </div>
          <div class="text-right">
            <div class="font-arabic text-2xl font-bold text-slate-800 group-hover:text-amber-800 transition">${namaArab}</div>
            <div class="text-[10px] text-slate-400 uppercase font-bold tracking-wider mt-1">${tempatTurun}</div>
          </div>
        </div>
      `;
    }).join('');
  }

  let currentFilterRevelation = 'all';

  // Filter Pills: Semua, Makkiyyah, Madaniyyah
  function filterByRevelation(type) {
    currentFilterRevelation = type;
    
    // Update styling tabs
    ['all', 'makkiyyah', 'madaniyyah'].forEach(tab => {
      const btn = document.getElementById(`filterTab-${tab}`);
      if (!btn) return;
      if (tab === type) {
        btn.className = 'px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-amber-600 text-white shadow-sm shadow-amber-600/20';
      } else {
        btn.className = 'px-3.5 py-1.5 rounded-xl text-xs font-bold transition bg-slate-100 text-slate-600 hover:bg-slate-200';
      }
    });

    applySurahFilters();
  }

  function applySurahFilters() {
    const keyword = (searchInput ? searchInput.value : '').toLowerCase().trim();

    const filtered = allSurahs.filter(s => {
      const namaLatin = (s.name_id || s.nama_latin || '').toLowerCase();
      const arti = (s.translation_id || s.arti || '').toLowerCase();
      const nomor = String(s.number || s.nomor);
      const tempatTurun = (s.revelation_id || s.tempat_turun || '').toLowerCase();

      // Cocokkan keyword
      const matchKeyword = !keyword || namaLatin.includes(keyword) || arti.includes(keyword) || nomor === keyword;

      // Cocokkan tempat turun
      let matchRevelation = true;
      if (currentFilterRevelation === 'makkiyyah') {
        matchRevelation = tempatTurun.includes('makki') || tempatTurun.includes('mekah');
      } else if (currentFilterRevelation === 'madaniyyah') {
        matchRevelation = tempatTurun.includes('madani') || tempatTurun.includes('madinah');
      }

      return matchKeyword && matchRevelation;
    });

    renderSurahs(filtered);
  }

  // Real-time Search Filter Surah
  const searchInput = document.getElementById('searchSurahInput');
  const clearBtn = document.getElementById('clearSearchBtn');

  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      const keyword = e.target.value.toLowerCase().trim();

      // Tampilkan/sembunyikan tombol clear
      if (clearBtn) {
        if (keyword.length > 0) {
          clearBtn.classList.remove('hidden');
        } else {
          clearBtn.classList.add('hidden');
        }
      }

      applySurahFilters();
    });
  }

  function clearSearch() {
    if (searchInput) {
      searchInput.value = '';
      if (clearBtn) clearBtn.classList.add('hidden');
      applySurahFilters();
      searchInput.focus();
    }
  }

  // Load dan Tampilkan Widget Terakhir Dibaca dari localStorage
  function loadLastReadBookmark() {
    try {
      const raw = localStorage.getItem('myquran_last_read');
      if (!raw) return;
      const data = JSON.parse(raw);
      if (!data || !data.surahNumber) return;

      const banner = document.getElementById('lastReadBanner');
      const nameEl = document.getElementById('lastReadSurahName');
      const ayahEl = document.getElementById('lastReadAyahText');
      const btn = document.getElementById('btnResumeLastRead');

      if (banner && nameEl && btn) {
        nameEl.textContent = data.surahName || `Surah ${data.surahNumber}`;
        if (ayahEl) ayahEl.textContent = `(Ayat ${data.ayahNumber || 1})`;
        btn.onclick = () => {
          openSurahDetail(
            data.surahNumber, 
            data.surahName, 
            data.surahArab || '', 
            data.arti || '', 
            data.totalAyat || 0,
            data.ayahNumber || 1
          );
        };
        banner.classList.remove('hidden');
      }
    } catch (e) {
      console.error(e);
    }
  }

  // Simpan Terakhir Dibaca ke localStorage
  function saveLastReadBookmark(ayahNo) {
    if (!currentSurahNumber || !ayahNo) return;
    try {
      const payload = {
        surahNumber: currentSurahNumber,
        surahName: currentSurahLatinName,
        surahArab: currentSurahArabName,
        arti: currentSurahArti,
        totalAyat: currentSurahTotalAyat,
        ayahNumber: ayahNo,
        timestamp: new Date().toISOString()
      };
      localStorage.setItem('myquran_last_read', JSON.stringify(payload));
      loadLastReadBookmark();
    } catch (e) {
      console.error(e);
    }
  }

  if (clearBtn) {
    clearBtn.addEventListener('click', clearSearch);
  }

  // Inisialisasi awal
  loadSurahList();
</script>

<!-- ================= MODAL DIALOG PEMBACAAN AYAT (3 LAPIS) ================= -->
<div id="ayatModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-md hidden flex items-center justify-center p-3 sm:p-6 transition-all">
  <div class="bg-white w-full max-w-4xl max-h-[92vh] rounded-[2rem] shadow-2xl flex flex-col overflow-hidden border border-slate-100">
    
    <!-- Modal Header -->
    <div class="p-4 sm:p-6 border-b border-slate-200/80 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gradient-to-r from-amber-50/60 via-white to-white">
      <div>
        <h3 id="modalSurahTitle" class="text-lg sm:text-xl font-extrabold text-slate-900 flex items-center gap-2">
          <span>Nama Surah</span>
        </h3>
        <p id="modalSurahSubtitle" class="text-xs text-slate-500 mt-0.5">Arti & rincian ayat</p>
      </div>
      
      <!-- Right Side Header: Jump to Ayah, Audio, & Close -->
      <div class="flex items-center gap-2 self-end sm:self-auto flex-wrap">
        <!-- Form Cari / Menuju Ayat -->
        <div class="flex items-center gap-1.5 bg-slate-100/90 p-1 rounded-xl border border-slate-200/80 text-xs">
          <span class="text-slate-400 pl-2 text-[11px] font-semibold hidden md:inline">Ayat</span>
          <input 
            type="number" 
            id="jumpAyahInput" 
            min="1" 
            placeholder="No" 
            class="w-12 sm:w-14 px-2 py-1 bg-white border border-slate-200 rounded-lg text-center font-bold text-slate-800 text-xs focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500"
            onkeydown="if(event.key==='Enter') jumpToAyah()"
          >
          <button 
            type="button" 
            onclick="jumpToAyah()" 
            class="px-2.5 py-1 bg-slate-800 hover:bg-slate-900 text-white rounded-lg font-bold text-[11px] transition shadow-xs flex items-center gap-1"
            title="Buka Ayat"
          >
            <span>Buka</span>
          </button>
        </div>

        <!-- Tombol Putar Full Surah Audio -->
        <button id="btnPlayFullSurah" onclick="toggleFullSurahAudio()" class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs shadow-md shadow-amber-500/20 transition-all duration-200 hover:scale-105 active:scale-95" title="Putar Murottal Full Surah">
          <i id="iconPlayFullSurah" class="fa-solid fa-play text-white"></i>
          <span id="labelPlayFullSurah" class="hidden sm:inline">Putar Surah</span>
        </button>

        <button onclick="closeAyatModal()" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center transition shrink-0" title="Tutup Modal">
          <i class="fa-solid fa-xmark text-sm"></i>
        </button>
      </div>
    </div>

    <!-- Active Audio Player Banner (Tampil saat audio ayat atau full surah sedang berbunyi) -->
    <div id="modalAudioBanner" class="hidden px-5 py-2.5 bg-amber-50/90 border-b border-amber-200/70 flex items-center justify-between text-xs text-amber-900">
      <div class="flex items-center gap-2.5 overflow-hidden">
        <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse shrink-0"></span>
        <span id="audioPlayingInfo" class="font-bold truncate text-[11px] sm:text-xs">Memutar audio...</span>
      </div>
      <div class="flex items-center gap-2 shrink-0">
        <button onclick="stopCurrentAudio()" class="px-2.5 py-1 rounded-lg bg-amber-200/70 hover:bg-amber-200 text-amber-900 font-bold text-[11px] transition">
          <i class="fa-solid fa-stop text-[10px] mr-1"></i> Berhenti
        </button>
      </div>
    </div>

    <!-- Modal Body (List Ayat) -->
    <div id="ayatListContainer" class="p-4 sm:p-6 overflow-y-auto space-y-5 flex-grow">
      <!-- Diisi dinamis oleh JavaScript -->
    </div>

    <!-- Modal Footer & Navigasi Surah Sebelumnya / Selanjutnya -->
    <div class="px-4 sm:px-6 py-3 border-t border-slate-100 bg-slate-50/80 flex items-center justify-between gap-2 text-xs">
      <!-- Tombol Surah Sebelumnya -->
      <button id="btnPrevSurah" onclick="navigateToSurah(-1)" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-slate-200 bg-white hover:bg-amber-50 hover:border-amber-300 hover:text-amber-800 font-bold transition text-slate-600 disabled:opacity-40 disabled:cursor-not-allowed">
        <i class="fa-solid fa-chevron-left text-[10px]"></i>
        <span class="hidden sm:inline">Surah Sebelumnya</span>
        <span class="sm:hidden">Sebelumnya</span>
      </button>

      <span class="text-slate-400 font-medium hidden md:inline">Sumber: Kemenag RI &bull; MyQuran v2</span>

      <!-- Tombol Surah Selanjutnya -->
      <button id="btnNextSurah" onclick="navigateToSurah(1)" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-slate-200 bg-white hover:bg-amber-50 hover:border-amber-300 hover:text-amber-800 font-bold transition text-slate-600 disabled:opacity-40 disabled:cursor-not-allowed">
        <span class="hidden sm:inline">Surah Selanjutnya</span>
        <span class="sm:hidden">Selanjutnya</span>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
      </button>
    </div>
  </div>
</div>

<!-- ================= NOTIFIKASI TOAST (COPY CLIPBOARD) ================= -->
<div id="toastNotification" class="fixed bottom-6 right-6 z-[80] bg-slate-900 text-white text-xs font-semibold px-4 py-3 rounded-2xl shadow-2xl border border-slate-800 flex items-center gap-2.5 transition-all duration-300 opacity-0 translate-y-3 pointer-events-none">
  <i class="fa-solid fa-circle-check text-emerald-400 text-sm"></i>
  <span id="toastMessage">Ayat berhasil disalin ke clipboard!</span>
</div>

<!-- ================= CUSTOM CONFIRMATION MODAL ================= -->
<div id="confirmSwitchModal" class="fixed inset-0 z-[60] bg-slate-950/60 backdrop-blur-sm hidden flex items-center justify-center p-4 transition-all">
  <div class="bg-white w-full max-w-sm rounded-[2rem] p-6 shadow-2xl border border-slate-100 text-center space-y-4 animate-in fade-in zoom-in-95 duration-200">
    <div id="confirmModalIcon" class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl mx-auto shadow-inner">
      <i class="fa-solid fa-book-open-reader"></i>
    </div>
    <div class="space-y-1.5">
      <h4 id="confirmModalTitle" class="text-base font-extrabold text-slate-900">Belum Selesai Membaca</h4>
      <p id="confirmSwitchMessage" class="text-xs text-slate-500 leading-relaxed">
        Anda baru membaca sebagian ayat. Yakin ingin langsung berpindah surah?
      </p>
    </div>
    <div class="flex items-center gap-2 pt-2">
      <button id="btnCancelSwitch" type="button" class="flex-1 py-2.5 rounded-xl border border-slate-200 text-slate-700 hover:bg-slate-100 font-bold text-xs transition">
        Batal
      </button>
      <button id="btnProceedSwitch" type="button" class="flex-1 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs shadow-md shadow-amber-600/20 transition">
        Ya, Pindah
      </button>
    </div>
  </div>
</div>

<script>
  // State untuk pagination chunking ayat MyQuran & deteksi ayat terlihat
  let currentSurahNumber = null;
  let currentSurahTotalAyat = 0;
  let currentSurahLatinName = '';
  let currentSurahArabName = '';
  let currentSurahArti = '';
  let currentLoadedAyatCount = 0;
  let highestVisibleAyah = 1; // Menyimpan nomor ayat tertinggi yang benar-benar pernah terlihat di layar
  const CHUNK_SIZE = 30; // Batas maksimal per request dari API MyQuran

  // Global Audio Controller State
  let globalAudio = new Audio();
  let currentAudioMode = null; // 'surah' | 'ayah' | null
  let currentPlayingAyahNo = null;
  let isAutoPlayingSurah = false; // Flag apakah sedang mode auto-play berurutan seluruh ayat
  let loadedAyatAudioMap = {}; // Cache map nomor ayat -> audio URL
  let loadedAyatDataMap = {}; // Cache data teks ayat untuk keperluan copy clipboard

  // Tampilkan Toast Notifikasi
  let toastTimer = null;
  function showToast(message) {
    const toast = document.getElementById('toastNotification');
    const msgEl = document.getElementById('toastMessage');
    if (!toast || !msgEl) return;

    msgEl.textContent = message;
    toast.classList.remove('opacity-0', 'translate-y-3', 'pointer-events-none');
    toast.classList.add('opacity-100', 'translate-y-0');

    if (toastTimer) clearTimeout(toastTimer);
    toastTimer = setTimeout(() => {
      toast.classList.remove('opacity-100', 'translate-y-0');
      toast.classList.add('opacity-0', 'translate-y-3', 'pointer-events-none');
    }, 2500);
  }

  // Fitur Salin Teks Ayat ke Clipboard
  function copyAyahText(ayahNo) {
    const data = loadedAyatDataMap[ayahNo];
    if (!data) {
      showToast('Data ayat belum siap disalin.');
      return;
    }

    const textToCopy = `QS. ${currentSurahLatinName} (${currentSurahNumber}:${ayahNo})\n\n${data.arab}\n\n"${data.latin || ''}"\n\nArtinya: ${data.text || ''}\n\n(Dikutip via MyQuran Platform - myquran.munn.web.id)`;

    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(textToCopy).then(() => {
        showToast(`Ayat ke-${ayahNo} berhasil disalin!`);
      }).catch(() => {
        fallbackCopyText(textToCopy, ayahNo);
      });
    } else {
      fallbackCopyText(textToCopy, ayahNo);
    }
  }

  function fallbackCopyText(text, ayahNo) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.opacity = '0';
    document.body.appendChild(textarea);
    textarea.select();
    try {
      document.execCommand('copy');
      showToast(`Ayat ke-${ayahNo} berhasil disalin!`);
    } catch (err) {
      showToast('Gagal menyalin teks ayat.');
    }
    document.body.removeChild(textarea);
  }

  // Fitur Lompat Langsung ke Nomor Ayat (Jump to Ayah)
  async function jumpToAyah() {
    const input = document.getElementById('jumpAyahInput');
    if (!input) return;

    const targetAyah = parseInt(input.value, 10);
    if (isNaN(targetAyah) || targetAyah < 1 || targetAyah > currentSurahTotalAyat) {
      alert(`Silakan masukkan nomor ayat antara 1 s/d ${currentSurahTotalAyat}.`);
      input.focus();
      return;
    }

    // Jika ayat target belum dimuat ke DOM, muat chunk bertahap hingga ayat tersebut termuat
    const banner = document.getElementById('modalAudioBanner');
    const audioInfo = document.getElementById('audioPlayingInfo');

    while (targetAyah > currentLoadedAyatCount && currentLoadedAyatCount < currentSurahTotalAyat) {
      if (audioInfo) {
        audioInfo.innerHTML = `Memuat ayat untuk mencapai nomor ${targetAyah}...`;
        banner.classList.remove('hidden');
      }
      await fetchNextAyatChunk();
    }

    if (banner && (!currentAudioMode || globalAudio.paused)) {
      banner.classList.add('hidden');
    }

    // Scroll langsung ke kartu ayat target
    const targetCard = document.getElementById(`ayat-${targetAyah}`);
    if (targetCard) {
      targetCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
      targetCard.classList.add('border-amber-500', 'ring-2', 'ring-amber-400/50');
      setTimeout(() => {
        if (currentPlayingAyahNo !== targetAyah) {
          targetCard.classList.remove('border-amber-500', 'ring-2', 'ring-amber-400/50');
        }
      }, 2000);
    }

    input.value = '';
  }

  // Event listener audio global saat selesai
  globalAudio.addEventListener('ended', async () => {
    if (isAutoPlayingSurah && currentAudioMode === 'surah') {
      const nextAyahNo = currentPlayingAyahNo + 1;
      if (nextAyahNo <= currentSurahTotalAyat) {
        await playNextAyahInSequence(nextAyahNo);
      } else {
        // Telah selesai seluruh ayat surah
        stopCurrentAudio();
      }
    } else {
      stopCurrentAudio();
    }
  });

  globalAudio.addEventListener('error', (e) => {
    console.error("Audio playback error:", e);
    const audioInfo = document.getElementById('audioPlayingInfo');
    if (audioInfo) audioInfo.textContent = 'Gagal memutar audio (format/link tidak dapat diakses).';
    setTimeout(() => {
      stopCurrentAudio();
    }, 2500);
  });

  // Hentikan audio yang sedang berjalan & reset tampilan UI
  function stopCurrentAudio() {
    isAutoPlayingSurah = false;
    if (!globalAudio.paused) {
      globalAudio.pause();
    }
    globalAudio.currentTime = 0;

    // Reset tombol Full Surah
    const iconFull = document.getElementById('iconPlayFullSurah');
    const labelFull = document.getElementById('labelPlayFullSurah');
    const btnFull = document.getElementById('btnPlayFullSurah');
    if (iconFull) iconFull.className = 'fa-solid fa-play text-white';
    if (labelFull) labelFull.textContent = 'Putar Surah';
    if (btnFull) {
      btnFull.className = 'inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs shadow-md shadow-amber-500/20 transition-all duration-200 hover:scale-105 active:scale-95';
    }

    // Reset highlight dan icon di ayat yang aktif
    if (currentPlayingAyahNo !== null) {
      const activeCard = document.getElementById(`ayat-${currentPlayingAyahNo}`);
      if (activeCard) {
        activeCard.classList.remove('border-amber-500', 'ring-2', 'ring-amber-400/50', 'bg-amber-50/40');
        activeCard.classList.add('border-slate-200/90', 'bg-slate-50');
      }
      const activeAyahBtn = document.getElementById(`btnPlayAyah-${currentPlayingAyahNo}`);
      if (activeAyahBtn) {
        activeAyahBtn.innerHTML = `<i class="fa-solid fa-play text-[10px]"></i><span>Audio</span>`;
        activeAyahBtn.className = 'inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-slate-200 bg-white hover:bg-amber-500 hover:border-amber-500 hover:text-white text-slate-700 text-xs font-bold transition shadow-sm hover:scale-105 active:scale-95';
      }
    }

    // Sembunyikan banner audio modal
    const banner = document.getElementById('modalAudioBanner');
    if (banner) banner.classList.add('hidden');

    currentAudioMode = null;
    currentPlayingAyahNo = null;
  }

  // Toggle pemutaran audio full 1 surah secara berurutan ayat per ayat (Auto-Scroll & Border Highlight)
  async function toggleFullSurahAudio() {
    const iconFull = document.getElementById('iconPlayFullSurah');
    const labelFull = document.getElementById('labelPlayFullSurah');
    const btnFull = document.getElementById('btnPlayFullSurah');
    const banner = document.getElementById('modalAudioBanner');
    const audioInfo = document.getElementById('audioPlayingInfo');

    // KASUS 1: Sedang memutar Full Surah -> Pause (Jeda)
    if (currentAudioMode === 'surah' && !globalAudio.paused) {
      globalAudio.pause();
      if (iconFull) iconFull.className = 'fa-solid fa-play text-amber-800';
      if (labelFull) labelFull.textContent = 'Lanjut Surah';
      if (btnFull) {
        btnFull.className = 'inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-xl bg-amber-100 hover:bg-amber-200 text-amber-900 border border-amber-300 font-bold text-xs shadow-sm transition-all duration-200 hover:scale-105 active:scale-95';
      }
      if (audioInfo) {
        audioInfo.innerHTML = `<span class="text-amber-700 italic font-semibold">(Dijeda)</span> Surah <b>${currentSurahLatinName}</b> &bull; Ayat ${currentPlayingAyahNo || 1} &bull; Misyari Rasyid`;
      }
      // Update juga tombol ayat yang sedang dijeda
      if (currentPlayingAyahNo) {
        const activeAyahBtn = document.getElementById(`btnPlayAyah-${currentPlayingAyahNo}`);
        if (activeAyahBtn) {
          activeAyahBtn.innerHTML = `<i class="fa-solid fa-play text-[10px]"></i><span>Lanjut</span>`;
          activeAyahBtn.className = 'inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-amber-100 hover:bg-amber-200 text-amber-900 border border-amber-300 text-xs font-bold transition shadow-sm hover:scale-105 active:scale-95';
        }
      }
      return;
    }

    // KASUS 2: Sedang dijeda di mode Surah -> Resume (Lanjutkan dari detik terakhir ayat aktif)
    if (currentAudioMode === 'surah' && globalAudio.paused && globalAudio.src) {
      try {
        await globalAudio.play();
        if (iconFull) iconFull.className = 'fa-solid fa-pause text-white';
        if (labelFull) labelFull.textContent = 'Jeda Surah';
        if (btnFull) {
          btnFull.className = 'inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs shadow-md shadow-amber-600/30 transition-all duration-200 hover:scale-105 active:scale-95';
        }
        if (audioInfo) {
          audioInfo.innerHTML = `Memutar Surah <b>${currentSurahLatinName}</b> &bull; <b>Ayat ${currentPlayingAyahNo}</b> dari ${currentSurahTotalAyat} &bull; Qari: Misyari Rasyid`;
          banner.classList.remove('hidden');
        }
        if (currentPlayingAyahNo) {
          const activeAyahBtn = document.getElementById(`btnPlayAyah-${currentPlayingAyahNo}`);
          if (activeAyahBtn) {
            activeAyahBtn.innerHTML = `<i class="fa-solid fa-pause text-[10px]"></i><span>Jeda</span>`;
            activeAyahBtn.className = 'inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold transition shadow-md shadow-amber-600/20 hover:scale-105 active:scale-95';
          }
        }
      } catch (e) {
        console.error(e);
      }
      return;
    }

    // KASUS 3: Memulai pemutaran surah berurutan dari ayat 1
    stopCurrentAudio();
    isAutoPlayingSurah = true;
    currentAudioMode = 'surah';

    if (iconFull) iconFull.className = 'fa-solid fa-pause text-white';
    if (labelFull) labelFull.textContent = 'Jeda Surah';
    if (btnFull) {
      btnFull.className = 'inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs shadow-md shadow-amber-600/30 transition-all duration-200 hover:scale-105 active:scale-95';
    }

    await playNextAyahInSequence(1);
  }

  // Putar ayat berikutnya dalam playlist berurutan (auto-fetch jika belum ada di DOM)
  async function playNextAyahInSequence(targetAyahNo) {
    if (!isAutoPlayingSurah) return;

    const banner = document.getElementById('modalAudioBanner');
    const audioInfo = document.getElementById('audioPlayingInfo');

    // Jika ayat target belum termuat (melewati chunk saat ini), ambil chunk berikutnya secara otomatis
    while (targetAyahNo > currentLoadedAyatCount && currentLoadedAyatCount < currentSurahTotalAyat) {
      if (audioInfo) {
        audioInfo.innerHTML = `Mengambil ayat ${targetAyahNo}...`;
        banner.classList.remove('hidden');
      }
      await fetchNextAyatChunk();
    }

    // Ambil URL audio dari cache
    let audioUrl = loadedAyatAudioMap[targetAyahNo];
    if (!audioUrl) {
      stopCurrentAudio();
      return;
    }

    // Bersihkan highlight ayat sebelumnya
    if (currentPlayingAyahNo !== null && currentPlayingAyahNo !== targetAyahNo) {
      const prevCard = document.getElementById(`ayat-${currentPlayingAyahNo}`);
      if (prevCard) {
        prevCard.classList.remove('border-amber-500', 'ring-2', 'ring-amber-400/50', 'bg-amber-50/40');
        prevCard.classList.add('border-slate-200/90', 'bg-slate-50');
      }
      const prevBtn = document.getElementById(`btnPlayAyah-${currentPlayingAyahNo}`);
      if (prevBtn) {
        prevBtn.innerHTML = `<i class="fa-solid fa-play text-[10px]"></i><span>Audio</span>`;
        prevBtn.classList.remove('bg-amber-600', 'text-white', 'border-amber-600');
        prevBtn.classList.add('bg-white', 'text-slate-600', 'border-slate-200');
      }
    }

    currentPlayingAyahNo = targetAyahNo;
    const currentCard = document.getElementById(`ayat-${targetAyahNo}`);
    const currentBtn = document.getElementById(`btnPlayAyah-${targetAyahNo}`);

    // Auto-scroll halus & sorot border ayat yang sedang dibaca
    if (currentCard) {
      currentCard.classList.remove('border-slate-200/90', 'bg-slate-50');
      currentCard.classList.add('border-amber-500', 'ring-2', 'ring-amber-400/50', 'bg-amber-50/40');
      currentCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    if (currentBtn) {
      currentBtn.innerHTML = `<i class="fa-solid fa-pause text-[10px]"></i><span>Jeda</span>`;
      currentBtn.classList.remove('bg-white', 'bg-amber-100', 'text-slate-600', 'text-amber-900', 'border-slate-200', 'border-amber-300');
      currentBtn.classList.add('bg-amber-600', 'text-white', 'border-amber-600');
    }

    if (banner && audioInfo) {
      audioInfo.innerHTML = `Memutar Surah <b>${currentSurahLatinName}</b> &bull; <b>Ayat ${targetAyahNo}</b> dari ${currentSurahTotalAyat} &bull; Qari: Misyari Rasyid`;
      banner.classList.remove('hidden');
    }

    try {
      globalAudio.src = audioUrl;
      await globalAudio.play();
    } catch (err) {
      console.error(err);
      stopCurrentAudio();
    }
  }

  // Putar audio per ayat secara mandiri (dengan fitur Pause & Resume, auto-scroll, dan border highlight)
  async function playAyatAudio(ayahNo, audioUrl) {
    const card = document.getElementById(`ayat-${ayahNo}`);
    const btn = document.getElementById(`btnPlayAyah-${ayahNo}`);
    const banner = document.getElementById('modalAudioBanner');
    const audioInfo = document.getElementById('audioPlayingInfo');

    // Jika sebelumnya sedang dalam mode auto-play surah, matikan flag surah agar fokus ke ayat tunggal
    isAutoPlayingSurah = false;

    // KASUS 1: Ayat yang sama sedang berbunyi -> Pause (Jeda)
    if (currentAudioMode === 'ayah' && currentPlayingAyahNo === ayahNo && !globalAudio.paused) {
      globalAudio.pause();
      if (btn) {
        btn.innerHTML = `<i class="fa-solid fa-play text-[10px]"></i><span>Lanjut</span>`;
        btn.classList.remove('bg-amber-600', 'text-white', 'border-amber-600');
        btn.classList.add('bg-amber-100', 'text-amber-900', 'border-amber-300');
      }
      if (audioInfo) {
        audioInfo.innerHTML = `<span class="text-amber-700 italic font-semibold">(Dijeda)</span> Surah <b>${currentSurahLatinName}</b> &bull; <b>Ayat ${ayahNo}</b>`;
      }
      return;
    }

    // KASUS 2: Ayat yang sama sedang dijeda -> Resume (Lanjutkan pemutaran)
    if (currentAudioMode === 'ayah' && currentPlayingAyahNo === ayahNo && globalAudio.paused && globalAudio.src) {
      try {
        await globalAudio.play();
        if (btn) {
          btn.innerHTML = `<i class="fa-solid fa-pause text-[10px]"></i><span>Jeda</span>`;
          btn.classList.remove('bg-white', 'bg-amber-100', 'text-slate-600', 'text-amber-900', 'border-slate-200', 'border-amber-300');
          btn.classList.add('bg-amber-600', 'text-white', 'border-amber-600');
        }
        if (audioInfo) {
          audioInfo.innerHTML = `Memutar Surah <b>${currentSurahLatinName}</b> &bull; <b>Ayat ${ayahNo}</b> &bull; Qari: Syaikh Misyari Rasyid`;
          banner.classList.remove('hidden');
        }
      } catch (e) {
        console.error(e);
      }
      return;
    }

    // KASUS 3: Memulai pemutaran ayat baru dari awal
    stopCurrentAudio();

    if (!audioUrl) {
      alert('Audio untuk ayat ini belum tersedia.');
      return;
    }

    // Perbaiki link cdn.alquran.cloud yang offline ke CDN resmi Islamic Network yang aktif
    let resolvedAudioUrl = audioUrl;
    if (resolvedAudioUrl.includes('cdn.alquran.cloud/media/audio/ayah/ar.alafasy/')) {
      const globalAyahId = resolvedAudioUrl.split('/').pop().trim();
      resolvedAudioUrl = `https://cdn.islamic.network/quran/audio/128/ar.alafasy/${globalAyahId}.mp3`;
    }

    // Berikan indikasi loading pada tombol ayat
    if (btn) {
      btn.innerHTML = `<i class="fa-solid fa-spinner fa-spin text-[10px]"></i><span>Memuat...</span>`;
    }

    try {
      globalAudio.src = resolvedAudioUrl;
      await globalAudio.play();

      currentAudioMode = 'ayah';
      currentPlayingAyahNo = ayahNo;

      // Highlight border & kartu ayat
      if (card) {
        card.classList.remove('border-slate-200/90', 'bg-slate-50');
        card.classList.add('border-amber-500', 'ring-2', 'ring-amber-400/50', 'bg-amber-50/40');
        // Auto-scroll halus ke ayat yang sedang diputar
        card.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }

      // Update button ayat ke state playing
      if (btn) {
        btn.innerHTML = `<i class="fa-solid fa-pause text-[10px]"></i><span>Jeda</span>`;
        btn.classList.remove('bg-white', 'bg-amber-100', 'text-slate-600', 'text-amber-900', 'border-slate-200', 'border-amber-300');
        btn.classList.add('bg-amber-600', 'text-white', 'border-amber-600');
      }

      // Update info banner
      if (banner && audioInfo) {
        audioInfo.innerHTML = `Memutar Surah <b>${currentSurahLatinName}</b> &bull; <b>Ayat ${ayahNo}</b> &bull; Qari: Syaikh Misyari Rasyid`;
        banner.classList.remove('hidden');
      }
    } catch (err) {
      console.error(err);
      stopCurrentAudio();
      alert('Tidak dapat memutar audio ayat ini. Silakan periksa koneksi internet Anda.');
    }
  }

  // Buka Modal Detail Ayat (Load Chunk Pertama 1-30)
  async function openSurahDetail(nomor, namaLatin, namaArab, arti, totalAyat, initialAyahToScroll = null) {
    // Hentikan audio jika sebelumnya ada yang sedang berputar
    stopCurrentAudio();
    loadedAyatAudioMap = {}; // Reset cache map audio surah baru
    loadedAyatDataMap = {}; // Reset cache map data teks surah baru

    const modal = document.getElementById('ayatModal');
    const title = document.getElementById('modalSurahTitle');
    const subtitle = document.getElementById('modalSurahSubtitle');
    const listContainer = document.getElementById('ayatListContainer');

    currentSurahNumber = nomor;
    currentSurahTotalAyat = totalAyat;
    currentSurahLatinName = namaLatin;
    currentSurahArabName = namaArab;
    currentSurahArti = arti;
    currentLoadedAyatCount = 0;
    highestVisibleAyah = initialAyahToScroll || 1; // Set ke ayat awal jika dari bookmark

    title.innerHTML = `${namaLatin} <span class="font-arabic font-normal text-amber-700 ml-2">(${namaArab})</span>`;
    subtitle.innerHTML = `Arti: ${arti} &bull; Total: ${totalAyat} Ayat`;
    
    listContainer.innerHTML = `
      <div id="ayatCardsWrapper" class="space-y-5"></div>
      <div id="loadMoreAyatArea" class="pt-4 text-center">
        <div class="py-16 text-slate-400 space-y-3">
          <i class="fa-solid fa-spinner fa-spin text-3xl text-amber-600"></i>
          <p class="text-xs font-semibold">Memuat ayat Surah ${namaLatin} dari API MyQuran...</p>
        </div>
      </div>
    `;

    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');

    // Update status disabled pada tombol navigasi footer
    const btnPrev = document.getElementById('btnPrevSurah');
    const btnNext = document.getElementById('btnNextSurah');
    if (btnPrev) btnPrev.disabled = currentSurahNumber <= 1;
    if (btnNext) btnNext.disabled = currentSurahNumber >= 114;

    // Ambil 30 ayat pertama
    await fetchNextAyatChunk();

    // Jika dipanggil dengan ayat tujuan tertentu (dari bookmark terakhir dibaca), muat chunk dan scroll ke ayat tersebut
    if (initialAyahToScroll && initialAyahToScroll > 1) {
      while (initialAyahToScroll > currentLoadedAyatCount && currentLoadedAyatCount < currentSurahTotalAyat) {
        await fetchNextAyatChunk();
      }
      setTimeout(() => {
        const targetCard = document.getElementById(`ayat-${initialAyahToScroll}`);
        if (targetCard) {
          targetCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
          targetCard.classList.add('border-amber-500', 'ring-2', 'ring-amber-400/50');
          setTimeout(() => targetCard.classList.remove('border-amber-500', 'ring-2', 'ring-amber-400/50'), 2500);
        }
      }, 300);
    }
  }

  // State untuk pending aksi konfirmasi (navigasi atau tutup modal)
  let pendingNavigationTarget = null;
  let isPendingCloseModal = false;

  // Navigasi Shortcut ke Surah Sebelumnya (-1) atau Selanjutnya (+1)
  function navigateToSurah(direction) {
    const targetNumber = currentSurahNumber + direction;
    if (targetNumber < 1 || targetNumber > 114) return;

    // Jika belum selesai membaca seluruh ayat, munculkan Custom Modal Konfirmasi
    if (highestVisibleAyah < currentSurahTotalAyat) {
      pendingNavigationTarget = targetNumber;
      isPendingCloseModal = false;
      const isNext = direction > 0;
      const confirmModal = document.getElementById('confirmSwitchModal');
      const confirmTitle = document.getElementById('confirmModalTitle');
      const confirmIcon = document.getElementById('confirmModalIcon');
      const confirmMsg = document.getElementById('confirmSwitchMessage');
      const btnProceed = document.getElementById('btnProceedSwitch');
      
      if (confirmTitle) confirmTitle.textContent = 'Belum Selesai Membaca';
      if (confirmIcon) confirmIcon.innerHTML = '<i class="fa-solid fa-book-open-reader"></i>';
      if (btnProceed) btnProceed.textContent = 'Ya, Pindah';

      if (confirmMsg) {
        confirmMsg.innerHTML = isNext
          ? `Anda baru membaca sampai ayat <span class="font-bold text-slate-800">${highestVisibleAyah}</span> dari <span class="font-bold text-slate-800">${currentSurahTotalAyat}</span> ayat. Yakin ingin langsung beralih ke surah berikutnya?`
          : `Anda baru membaca sampai ayat <span class="font-bold text-slate-800">${highestVisibleAyah}</span> dari <span class="font-bold text-slate-800">${currentSurahTotalAyat}</span> ayat. Yakin ingin kembali ke surah sebelumnya?`;
      }

      if (confirmModal) confirmModal.classList.remove('hidden');
      return;
    }

    // Jika sudah selesai membaca, langsung pindah
    executeSurahSwitch(targetNumber);
  }

  function executeSurahSwitch(targetNumber) {
    const targetSurah = allSurahs.find(s => Number(s.number || s.nomor) === targetNumber);
    if (targetSurah) {
      const nomor = Number(targetSurah.number || targetSurah.nomor);
      const namaLatin = targetSurah.name_id || targetSurah.name_en || targetSurah.nama_latin;
      const namaArab = targetSurah.name_short || targetSurah.nama || '';
      const arti = targetSurah.translation_id || targetSurah.arti || '';
      const totalAyat = Number(targetSurah.number_of_verses || targetSurah.jumlah_ayat || 0);

      // Buka modal untuk surah target
      openSurahDetail(nomor, namaLatin, namaArab, arti, totalAyat);
    }
  }

  // IntersectionObserver untuk melacak nomor ayat yang benar-benar pernah tampak di layar scroll
  let ayatObserver = null;

  function observeAyatVisibility() {
    const modalContainer = document.getElementById('ayatListContainer');
    if (!modalContainer) return;

    if (!ayatObserver) {
      ayatObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const rawId = entry.target.id; // contoh: "ayat-5"
            if (rawId && rawId.startsWith('ayat-')) {
              const ayahNumber = parseInt(rawId.replace('ayat-', ''), 10);
              if (!isNaN(ayahNumber) && ayahNumber > highestVisibleAyah) {
                highestVisibleAyah = ayahNumber;
                saveLastReadBookmark(highestVisibleAyah);
              }
            }
          }
        });
      }, {
        root: modalContainer,
        threshold: 0.2 // Terdeteksi ketika minimal 20% kartu ayat masuk ke area pandang layar
      });
    }

    // Amati semua kartu ayat
    document.querySelectorAll('#ayatCardsWrapper > div').forEach(card => {
      ayatObserver.observe(card);
    });
  }
  document.getElementById('btnCancelSwitch').addEventListener('click', () => {
    document.getElementById('confirmSwitchModal').classList.add('hidden');
    pendingNavigationTarget = null;
    isPendingCloseModal = false;
  });

  document.getElementById('btnProceedSwitch').addEventListener('click', () => {
    document.getElementById('confirmSwitchModal').classList.add('hidden');
    if (isPendingCloseModal) {
      isPendingCloseModal = false;
      forceCloseAyatModal();
    } else if (pendingNavigationTarget !== null) {
      executeSurahSwitch(pendingNavigationTarget);
      pendingNavigationTarget = null;
    }
  });

  // Fetch Chunk Ayat Berikutnya (1-30, 31-60, 61-90, dst)
  async function fetchNextAyatChunk() {
    const loadArea = document.getElementById('loadMoreAyatArea');
    const cardsWrapper = document.getElementById('ayatCardsWrapper');
    if (!loadArea || !cardsWrapper) return;

    const start = currentLoadedAyatCount + 1;
    const end = Math.min(currentLoadedAyatCount + CHUNK_SIZE, currentSurahTotalAyat);

    loadArea.innerHTML = `
      <div class="py-6 text-slate-400 flex items-center justify-center gap-2 text-xs font-semibold">
        <i class="fa-solid fa-spinner fa-spin text-amber-600"></i>
        <span>Memuat ayat ${start} - ${end}...</span>
      </div>
    `;

    try {
      const res = await fetch(`https://api.myquran.com/v2/quran/ayat/${currentSurahNumber}/${start}-${end}`);
      const data = await res.json();

      if (data.status && data.data) {
        const listAyat = Array.isArray(data.data) ? data.data : [data.data];
        
        // Simpan audio URL & data ayat ke cache loadedAyatAudioMap & loadedAyatDataMap
        listAyat.forEach(item => {
          let aUrl = item.audio || '';
          if (aUrl.includes('cdn.alquran.cloud/media/audio/ayah/ar.alafasy/')) {
            const globalAyahId = aUrl.split('/').pop().trim();
            aUrl = `https://cdn.islamic.network/quran/audio/128/ar.alafasy/${globalAyahId}.mp3`;
          }
          loadedAyatAudioMap[item.ayah] = aUrl;
          loadedAyatDataMap[item.ayah] = {
            arab: item.arab,
            latin: item.latin || '',
            text: item.text || item.artinya || ''
          };
        });

        const htmlAyat = listAyat.map(ayat => {
          const ayahNo = ayat.ayah;
          const ayahId = `ayat-${ayahNo}`;
          const audioUrl = loadedAyatAudioMap[ayahNo] || ayat.audio || '';

          return `
            <div id="${ayahId}" class="p-5 sm:p-6 rounded-3xl bg-slate-50 border border-slate-200/90 space-y-4 transition-all duration-300 hover:border-amber-300">
              <!-- Baris Nomor Ayat & Action Button -->
              <div class="flex items-center justify-between border-b border-slate-200/80 pb-3">
                <div class="flex items-center gap-2">
                  <span class="w-9 h-9 rounded-xl bg-amber-100/80 text-amber-900 text-xs font-extrabold flex items-center justify-center shadow-inner">
                    ${ayahNo}
                  </span>
                  <span class="text-xs text-slate-400 font-medium">Ayat ke-${ayahNo}</span>
                </div>

                <div class="flex items-center gap-1.5">
                  <!-- Tombol Putar Audio Ayat -->
                  ${audioUrl ? `
                    <button id="btnPlayAyah-${ayahNo}" onclick="playAyatAudio(${ayahNo}, '${audioUrl}')" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-slate-200 bg-white hover:bg-amber-500 hover:border-amber-500 hover:text-white text-slate-700 text-xs font-bold transition shadow-sm hover:scale-105 active:scale-95" title="Dengarkan Qari Misyari Rasyid untuk ayat ${ayahNo}">
                      <i class="fa-solid fa-play text-[10px]"></i>
                      <span>Audio</span>
                    </button>
                  ` : ''}

                  <!-- Tombol Salin Teks Ayat ke Clipboard -->
                  <button type="button" onclick="copyAyahText(${ayahNo})" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-100 text-slate-600 hover:text-slate-900 text-xs font-bold transition shadow-sm hover:scale-105 active:scale-95" title="Salin Arab, Latin, dan Terjemahan">
                    <i class="fa-regular fa-copy text-[11px]"></i>
                    <span class="hidden sm:inline">Salin</span>
                  </button>
                </div>
              </div>

              <!-- Lapisan 1: Kaligrafi Arab Berharakat -->
              <div class="font-arabic text-2xl sm:text-3xl text-right leading-loose text-slate-900 py-1">
                ${ayat.arab}
              </div>

              <!-- Lapisan 2: Transliterasi Huruf Latin -->
              ${ayat.latin ? `
                <div class="text-xs sm:text-sm text-amber-900 font-medium italic bg-amber-50/70 p-3.5 rounded-2xl border border-amber-100 leading-relaxed">
                  "${ayat.latin}"
                </div>
              ` : ''}

              <!-- Lapisan 3: Terjemahan Bahasa Indonesia -->
              <div class="text-xs sm:text-sm text-slate-600 leading-relaxed bg-white p-4 rounded-2xl border border-slate-100">
                <span class="font-bold text-slate-800">Artinya: </span>
                ${ayat.text || ayat.artinya || ''}
              </div>
            </div>
          `;
        }).join('');

        cardsWrapper.insertAdjacentHTML('beforeend', htmlAyat);
        currentLoadedAyatCount = end;

        // Pasang pengamat (Intersection Observer) pada kartu ayat baru untuk deteksi ayat yang terlihat di layar
        observeAyatVisibility();

        // Cek apakah masih ada ayat yang belum dimuat
        if (currentLoadedAyatCount < currentSurahTotalAyat) {
          const nextStart = currentLoadedAyatCount + 1;
          const nextEnd = Math.min(currentLoadedAyatCount + CHUNK_SIZE, currentSurahTotalAyat);
          loadArea.innerHTML = `
            <div class="py-4 space-y-2">
              <button onclick="fetchNextAyatChunk()" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs shadow-md shadow-amber-600/20 hover:scale-105 active:scale-95 transition-all">
                <i class="fa-solid fa-arrow-down"></i>
                <span>Muat Ayat Selanjutnya (${nextStart} - ${nextEnd})</span>
              </button>
              <p class="text-[11px] text-slate-400">Menampilkan ${currentLoadedAyatCount} dari ${currentSurahTotalAyat} ayat</p>
            </div>
          `;
        } else {
          // Ketika semua ayat selesai dimuat, tampilkan konfirmasi dan shortcut tombol ke surah berikutnya
          const nextSurahObj = allSurahs.find(s => Number(s.number || s.nomor) === currentSurahNumber + 1);
          const nextSurahBtn = nextSurahObj ? `
            <div class="pt-2">
              <button onclick="navigateToSurah(1)" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs shadow-md transition-all hover:scale-105 active:scale-95">
                <span>Lanjut Baca Surah ${nextSurahObj.name_id || nextSurahObj.nama_latin}</span>
                <i class="fa-solid fa-arrow-right"></i>
              </button>
            </div>
          ` : '';

          loadArea.innerHTML = `
            <div class="py-6 text-center space-y-3">
              <div class="text-slate-500 text-xs font-semibold flex items-center justify-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i>
                <span>Seluruh ${currentSurahTotalAyat} ayat telah selesai dibaca.</span>
              </div>
              ${nextSurahBtn}
            </div>
          `;
        }
      } else {
        loadArea.innerHTML = `
          <div class="py-6 text-center space-y-2">
            <p class="text-xs text-rose-500 font-bold">Gagal memuat ayat ${start} - ${end}.</p>
            <button onclick="fetchNextAyatChunk()" class="text-xs font-bold text-amber-700 hover:underline">Coba Lagi</button>
          </div>
        `;
      }
    } catch (err) {
      loadArea.innerHTML = `
        <div class="py-6 text-center space-y-2">
          <p class="text-xs text-rose-500 font-bold">Koneksi terputus saat mengambil ayat ${start} - ${end}.</p>
          <button onclick="fetchNextAyatChunk()" class="text-xs font-bold text-amber-700 hover:underline">Coba Lagi</button>
        </div>
      `;
    }
  }

  // Tutup Modal Pembacaan Ayat dengan Konfirmasi jika Audio Sedang Berjalan
  function closeAyatModal() {
    // Cek apakah audio sedang aktif (sedang berbunyi atau dijeda di tengah jalan)
    const isAudioActive = currentAudioMode !== null || (globalAudio && !globalAudio.paused);

    if (isAudioActive) {
      isPendingCloseModal = true;
      pendingNavigationTarget = null;

      const confirmModal = document.getElementById('confirmSwitchModal');
      const confirmTitle = document.getElementById('confirmModalTitle');
      const confirmIcon = document.getElementById('confirmModalIcon');
      const confirmMsg = document.getElementById('confirmSwitchMessage');
      const btnProceed = document.getElementById('btnProceedSwitch');

      if (confirmTitle) confirmTitle.textContent = 'Audio Sedang Berjalan';
      if (confirmIcon) confirmIcon.innerHTML = '<i class="fa-solid fa-volume-high text-amber-600"></i>';
      if (btnProceed) btnProceed.textContent = 'Ya, Tutup & Hentikan';

      if (confirmMsg) {
        confirmMsg.innerHTML = `Murottal audio Surah <span class="font-bold text-slate-800">${currentSurahLatinName}</span> masih aktif. Yakin ingin menutup halaman dan menghentikan audio?`;
      }

      if (confirmModal) confirmModal.classList.remove('hidden');
      return;
    }

    forceCloseAyatModal();
  }

  // Eksekusi penutupan modal ayat
  function forceCloseAyatModal() {
    stopCurrentAudio();
    document.getElementById('ayatModal').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      const confirmModal = document.getElementById('confirmSwitchModal');
      // Jika modal konfirmasi sedang terbuka, tutup modal konfirmasi terlebih dahulu
      if (confirmModal && !confirmModal.classList.contains('hidden')) {
        confirmModal.classList.add('hidden');
        pendingNavigationTarget = null;
        isPendingCloseModal = false;
        return;
      }
      const ayatModal = document.getElementById('ayatModal');
      if (ayatModal && !ayatModal.classList.contains('hidden')) {
        closeAyatModal();
      }
    }
  });
</script>

<?php include 'includes/footer.php'; ?>
