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
  </div>

  <!-- HEADER BAR & SEARCH BAR SECTION (Hidden secara default, hanya tampil jika data surah berhasil dimuat) -->
  <section id="surahHeaderSection" class="hidden glass-card rounded-3xl p-4 sm:p-6 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div class="flex items-center justify-between sm:justify-start gap-3">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center text-lg shadow-inner shrink-0">
          <i class="fa-solid fa-list"></i>
        </div>
        <div>
          <h2 class="text-sm sm:text-base font-extrabold text-slate-900">Daftar Surah Al-Qur'an</h2>
          <p class="text-xs text-slate-400">Pilih surah untuk membaca ayat-ayatnya</p>
        </div>
      </div>
      <!-- Badge di mobile -->
      <span id="surahCountBadge" class="sm:hidden text-[11px] font-bold text-amber-700 bg-amber-50 border border-amber-100 px-3 py-1 rounded-xl shrink-0 whitespace-nowrap">
        114 Surah
      </span>
    </div>

    <!-- Badge di desktop -->
    <div id="surahCountBadgeDesktop" class="hidden sm:inline-flex text-xs font-bold text-amber-700 bg-amber-50 border border-amber-100 px-4 py-2 rounded-2xl shrink-0 whitespace-nowrap">
      Total: 114 Surah
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

    if (surahs.length === 0) {
      grid.innerHTML = `<div class="col-span-full text-center py-12 text-slate-400">Surah tidak ditemukan.</div>`;
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
        <div class="group relative overflow-hidden bg-white rounded-3xl p-5 border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-amber-400/80 hover:-translate-y-1 transition-all flex items-center justify-between cursor-pointer">
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

  // Inisialisasi awal
  loadSurahList();
</script>

<?php include 'includes/footer.php'; ?>
