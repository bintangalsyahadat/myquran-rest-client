<?php
$pageTitle = "Jadwal Sholat & Waktu Realtime";
include 'includes/header.php';
?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
  
  <!-- ================= HERO BANNER LENGKAP ================= -->
  <div class="relative overflow-hidden rounded-[2.5rem] islamic-pattern text-white p-7 sm:p-12 shadow-2xl shadow-emerald-950/20 border border-emerald-500/20">
    <div class="absolute -top-24 -left-24 w-72 h-72 bg-emerald-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-teal-400/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-10 text-[260px] pointer-events-none font-arabic select-none">
      صلوة
    </div>

    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
      <div class="space-y-4 max-w-2xl">
        <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-emerald-300 text-xs font-semibold tracking-wide">
          <i class="fa-solid fa-location-dot"></i>
          <span id="bannerLocationBadge">MEMUAT WILAYAH...</span>
        </div>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">
          Tepat Waktu Menjaga <br>
          <span class="bg-gradient-to-r from-emerald-300 via-teal-200 to-amber-200 bg-clip-text text-transparent">Sholat 5 Waktu.</span>
        </h1>
        <p class="text-emerald-100/80 text-sm sm:text-base leading-relaxed">
          Jadwal terverifikasi akurat menurut hisab Kementerian Agama RI untuk seluruh kota dan kabupaten di Indonesia.
        </p>
      </div>

      <!-- NEXT PRAYER & DIGITAL CLOCK WIDGET -->
      <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-6 sm:p-7 min-w-[280px] shadow-xl flex flex-col justify-between space-y-4">
        <div>
          <div class="flex items-center justify-between text-xs font-semibold text-emerald-200/90 mb-1">
            <span>WAKTU REALTIME</span>
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
          </div>
          <div id="liveClock" class="text-4xl sm:text-5xl font-mono font-extrabold tracking-wider text-white">00:00:00</div>
          <div id="liveDate" class="text-xs text-emerald-200/80 mt-1 font-medium">Memuat tanggal...</div>
        </div>

        <div class="pt-4 border-t border-white/15">
          <div class="text-[11px] font-bold uppercase tracking-wider text-amber-300 flex items-center justify-between">
            <span class="flex items-center gap-1.5">
              <i class="fa-solid fa-bell animate-bounce"></i> Sholat Selanjutnya:
            </span>
            <span id="nextPrayerCountdown" class="text-[10px] font-mono text-emerald-200 bg-white/10 px-2 py-0.5 rounded-md">--:--:--</span>
          </div>
          <div class="flex items-baseline justify-between mt-1.5">
            <div id="nextPrayerName" class="text-xl font-extrabold text-white">Memuat...</div>
            <div id="nextPrayerTime" class="text-base font-mono font-bold text-emerald-300 bg-white/10 px-2.5 py-1 rounded-lg">--:--</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= FITUR PENCARIAN KOTA TANPA RELOAD (Z-INDEX TERTINGGI AGAR TIDAK TERTUTUP) ================= -->
  <div class="glass-card rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-200/80 space-y-5 relative z-40">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
      <div>
        <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2.5">
          <span class="w-9 h-9 rounded-2xl bg-brand-50 text-brand-700 flex items-center justify-center text-sm shadow-sm">
            <i class="fa-solid fa-map-location-dot"></i>
          </span>
          Pilih Wilayah / Kota
        </h2>
        <p class="text-xs sm:text-sm text-slate-500 mt-1">
          Cari jadwal sholat akurat untuk seluruh kabupaten dan kota di Indonesia
        </p>
      </div>

      <!-- Quick Status Badges -->
      <div class="flex items-center gap-2">
        <span id="statusIndicator" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">
          <i class="fa-solid fa-circle-check text-[10px]"></i>
          <span>Tersinkronisasi Kemenag</span>
        </span>
      </div>
    </div>

    <!-- Search Input & Autocomplete Dropdown Container -->
    <div class="relative z-50">
      <div class="relative flex items-center">
        <div class="absolute left-4 text-slate-400 text-base pointer-events-none">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <input 
          type="text" 
          id="citySearchInput"
          placeholder="Ketik nama kota atau kabupaten (contoh: Jakarta, Bandung, Surabaya, Medan)..." 
          autocomplete="off"
          class="w-full pl-12 pr-12 py-3.5 bg-slate-50 hover:bg-white focus:bg-white border border-slate-200 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition shadow-sm"
        />
        <div id="searchSpinner" class="hidden absolute right-4 text-brand-600">
          <i class="fa-solid fa-circle-notch fa-spin"></i>
        </div>
        <button 
          id="clearSearchBtn" 
          type="button" 
          class="hidden absolute right-4 text-slate-400 hover:text-slate-600 p-1"
          title="Hapus pencarian"
        >
          <i class="fa-solid fa-circle-xmark"></i>
        </button>
      </div>

      <!-- Autocomplete Dropdown List (Solid Putih 100% Opaque & Jelas Dibaca) -->
      <div 
        id="citySearchResults" 
        class="hidden absolute left-0 right-0 top-full mt-2 bg-white border-2 border-slate-200 rounded-2xl shadow-2xl max-h-80 overflow-y-auto z-50 divide-y divide-slate-100 ring-1 ring-black/10"
      >
        <!-- Hasil pencarian akan dirender oleh JavaScript di sini -->
      </div>
    </div>

    <!-- Quick Select Pills (Kota Populer) -->
    <div class="flex flex-wrap items-center gap-2 pt-1 text-xs">
      <span class="text-slate-400 font-semibold flex items-center gap-1 mr-1">
        <i class="fa-solid fa-fire text-amber-500"></i> Populer:
      </span>
      <button type="button" onclick="selectCity('1301', 'KOTA JAKARTA')" class="city-pill px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-brand-50 hover:text-brand-700 text-slate-600 font-semibold border border-slate-200/60 transition">
        Jakarta
      </button>
      <button type="button" onclick="selectCity('1203', 'KOTA BANDUNG')" class="city-pill px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-brand-50 hover:text-brand-700 text-slate-600 font-semibold border border-slate-200/60 transition">
        Bandung
      </button>
      <button type="button" onclick="selectCity('1638', 'KOTA SURABAYA')" class="city-pill px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-brand-50 hover:text-brand-700 text-slate-600 font-semibold border border-slate-200/60 transition">
        Surabaya
      </button>
      <button type="button" onclick="selectCity('1402', 'KOTA YOGYAKARTA')" class="city-pill px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-brand-50 hover:text-brand-700 text-slate-600 font-semibold border border-slate-200/60 transition">
        Yogyakarta
      </button>
      <button type="button" onclick="selectCity('0228', 'KOTA MEDAN')" class="city-pill px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-brand-50 hover:text-brand-700 text-slate-600 font-semibold border border-slate-200/60 transition">
        Medan
      </button>
      <button type="button" onclick="selectCity('2318', 'KOTA MAKASSAR')" class="city-pill px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-brand-50 hover:text-brand-700 text-slate-600 font-semibold border border-slate-200/60 transition">
        Makassar
      </button>
    </div>
  </div>

  <!-- ================= SUB-NAVBAR TAMPILAN JADWAL (HARI INI / PILIH TANGGAL / 1 BULAN) ================= -->
  <div class="glass-card rounded-2xl p-2.5 sm:p-3 border border-slate-200/80 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
    
    <!-- Tab Navigasi Tampilan -->
    <div class="flex items-center gap-1.5 p-1 bg-slate-100/90 rounded-xl w-full md:w-auto text-xs font-bold">
      <button 
        type="button" 
        id="tabTodayBtn" 
        onclick="switchScheduleTab('today')"
        class="flex-1 md:flex-none px-4 py-2 rounded-lg transition-all flex items-center justify-center gap-2 bg-white text-brand-700 shadow-sm"
      >
        <i class="fa-solid fa-clock"></i>
        <span>Hari Ini</span>
      </button>

      <button 
        type="button" 
        id="tabCustomDateBtn" 
        onclick="switchScheduleTab('custom')"
        class="flex-1 md:flex-none px-4 py-2 rounded-lg transition-all flex items-center justify-center gap-2 text-slate-600 hover:text-brand-700"
      >
        <i class="fa-regular fa-calendar-days"></i>
        <span>Pilih Tanggal</span>
      </button>

      <button 
        type="button" 
        id="tabMonthBtn" 
        onclick="switchScheduleTab('month')"
        class="flex-1 md:flex-none px-4 py-2 rounded-lg transition-all flex items-center justify-center gap-2 text-slate-600 hover:text-brand-700"
      >
        <i class="fa-solid fa-calendar-week"></i>
        <span>Jadwal 1 Bulan</span>
      </button>
    </div>

    <!-- Controls untuk Tab: Date Picker (Pilih Tanggal) -->
    <div id="customDateControl" class="hidden flex items-center gap-2 w-full md:w-auto justify-end">
      <span class="text-xs text-slate-500 font-semibold flex items-center gap-1">
        <i class="fa-solid fa-calendar text-brand-600"></i> Tanggal:
      </span>
      <input 
        type="date" 
        id="datePickerInput" 
        class="px-3.5 py-1.5 bg-slate-50 hover:bg-white focus:bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500 transition shadow-sm cursor-pointer"
      />
    </div>

    <!-- Controls untuk Tab: Month & Year Selector (Jadwal 1 Bulan) -->
    <div id="monthSelectorControl" class="hidden flex items-center gap-2 w-full md:w-auto justify-end flex-wrap sm:flex-nowrap">
      
      <!-- Pilihan Bulan -->
      <div class="flex items-center gap-2 bg-slate-50 hover:bg-white focus-within:bg-white border border-slate-200 rounded-xl px-3 py-1.5 shadow-sm transition">
        <i class="fa-regular fa-calendar-days text-brand-600 text-xs"></i>
        <select id="monthSelect" class="bg-transparent text-xs font-bold text-slate-800 focus:outline-none cursor-pointer">
          <!-- Bulan diisi oleh JavaScript -->
        </select>
      </div>

      <!-- Pilihan Tahun (Timedate Year Picker: Pilih Tahun Kapan Saja) -->
      <div class="flex items-center gap-2 bg-slate-50 hover:bg-white focus-within:bg-white border border-slate-200 rounded-xl px-3 py-1.5 shadow-sm transition">
        <i class="fa-regular fa-clock text-brand-600 text-xs"></i>
        <select id="yearSelect" class="bg-transparent text-xs font-bold text-slate-800 focus:outline-none cursor-pointer">
          <!-- Pilihan Tahun Lengkap diisi oleh JavaScript -->
        </select>
      </div>

      <button type="button" onclick="loadMonthlySchedule()" class="px-3.5 py-1.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
        <i class="fa-solid fa-arrows-rotate text-[11px]"></i>
        <span>Tampilkan</span>
      </button>
    </div>

  </div>

  <!-- ================= TAMPILAN 1: GRID 8 WAKTU SHOLAT (HARIAN & TANGGAL PILIHAN) ================= -->
  <div id="dailyScheduleView" class="space-y-4">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-1">
      <div>
        <h3 id="scheduleTitle" class="text-lg sm:text-xl font-extrabold text-slate-900 flex items-center gap-2 flex-wrap">
          <span>Jadwal Sholat</span>
          <span id="activeCityBadge" class="text-xs px-2.5 py-0.5 rounded-lg bg-brand-100 text-brand-800 font-bold">KOTA JAKARTA</span>
        </h3>
        <p id="scheduleDateSubtitle" class="text-xs text-slate-500 mt-0.5">Memuat tanggal...</p>
      </div>

      <div class="inline-flex items-center gap-2 text-xs text-slate-500 font-medium bg-white px-3 py-1.5 rounded-xl border border-slate-200/80 shadow-sm self-start sm:self-auto">
        <i class="fa-solid fa-compass text-brand-600"></i>
        <span>Waktu Indonesia Barat/Tengah/Timur (Sesuai Wilayah)</span>
      </div>
    </div>

    <!-- 8 Cards Grid Container (4 Kolom x 2 Baris: Rapi, Lega, & Proporsional) -->
    <div id="prayerCardsGrid" class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 gap-4 sm:gap-5">
      <!-- Loading Skeleton (Placeholder awal) -->
      <?php 
      $dummyPrayers = [
        ['name' => 'Imsak', 'icon' => 'fa-bell'],
        ['name' => 'Subuh', 'icon' => 'fa-cloud-sun'],
        ['name' => 'Terbit', 'icon' => 'fa-sun'],
        ['name' => 'Dhuha', 'icon' => 'fa-sun'],
        ['name' => 'Dzuhur', 'icon' => 'fa-sun'],
        ['name' => 'Ashar', 'icon' => 'fa-cloud-sun'],
        ['name' => 'Maghrib', 'icon' => 'fa-moon'],
        ['name' => 'Isya', 'icon' => 'fa-cloud-moon']
      ];
      foreach ($dummyPrayers as $p): 
      ?>
      <div class="glass-card rounded-3xl p-5 border border-slate-200/80 shadow-sm animate-pulse flex flex-col justify-between min-h-[160px] min-w-0">
        <div class="flex items-center justify-between gap-2">
          <div class="w-9 h-9 rounded-2xl bg-slate-200 shrink-0"></div>
          <div class="w-12 h-3.5 bg-slate-200 rounded shrink-0"></div>
        </div>
        <div class="space-y-2 mt-4">
          <div class="w-16 h-3 bg-slate-200 rounded"></div>
          <div class="w-24 h-7 bg-slate-200 rounded-xl"></div>
          <div class="w-14 h-2 bg-slate-200 rounded"></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- ================= TAMPILAN 2: TABEL JADWAL SHOLAT 1 BULAN PENUH ================= -->
  <div id="monthlyScheduleView" class="hidden space-y-4">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-1">
      <div>
        <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 flex items-center gap-2 flex-wrap">
          <span>Jadwal Sholat 1 Bulan Penuh</span>
          <span id="monthlyActiveCityBadge" class="text-xs px-2.5 py-0.5 rounded-lg bg-brand-100 text-brand-800 font-bold">KOTA JAKARTA</span>
        </h3>
        <p id="monthlyScheduleSubtitle" class="text-xs text-slate-500 mt-0.5">Memuat jadwal bulanan...</p>
      </div>

      <div class="flex items-center gap-2">
        <span class="inline-flex items-center gap-1.5 text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-xl font-semibold">
          <i class="fa-solid fa-circle-check text-[10px]"></i>
          <span>Baris Hijau = Hari Ini</span>
        </span>
      </div>
    </div>

    <!-- Monthly Table Container -->
    <div class="glass-card rounded-3xl border border-slate-200/80 shadow-xl overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-xs sm:text-sm">
          <thead>
            <tr class="bg-slate-100/90 text-slate-600 border-b border-slate-200/80 text-[11px] font-extrabold uppercase tracking-wider">
              <th class="py-4 px-4 text-center w-12">No</th>
              <th class="py-4 px-4 min-w-[150px]">Tanggal</th>
              <th class="py-4 px-3 text-center">Imsak</th>
              <th class="py-4 px-3 text-center">Subuh</th>
              <th class="py-4 px-3 text-center">Terbit</th>
              <th class="py-4 px-3 text-center">Dhuha</th>
              <th class="py-4 px-3 text-center">Dzuhur</th>
              <th class="py-4 px-3 text-center">Ashar</th>
              <th class="py-4 px-3 text-center">Maghrib</th>
              <th class="py-4 px-3 text-center">Isya</th>
            </tr>
          </thead>
          <tbody id="monthlyTableBody" class="divide-y divide-slate-100 font-medium">
            <!-- Data baris jadwal bulanan akan diisi oleh JavaScript -->
            <tr>
              <td colspan="10" class="py-12 text-center text-slate-400">
                <i class="fa-solid fa-spinner fa-spin text-2xl text-brand-600 mb-2 block"></i>
                <span>Sedang memuat jadwal sholat 1 bulan...</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ================= KARTU INSPIRASI & KUTIPAN AL-QUR'AN ================= -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
    
    <!-- Kutipan Sholat -->
    <div class="md:col-span-2 glass-card rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-md flex flex-col justify-between relative overflow-hidden group hover:shadow-xl transition-all">
      <div class="absolute -right-10 -bottom-10 opacity-5 text-9xl text-brand-700 pointer-events-none font-arabic">
        أَقِيمُوا
      </div>
      <div class="space-y-3 relative z-10">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-brand-50 text-brand-700 text-xs font-bold">
          <i class="fa-solid fa-quran"></i>
          Firman Allah SWT
        </div>
        <p class="text-base sm:text-lg text-slate-700 font-medium italic leading-relaxed">
          &ldquo;Dan dirikanlah sholat, tunaikanlah zakat, dan ruku'lah beserta orang-orang yang ruku'.&rdquo;
        </p>
        <div class="text-xs font-bold text-brand-700">
          (QS. Al-Baqarah: 43)
        </div>
      </div>
      <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
        <span>Menjaga sholat tepat waktu adalah amalan yang paling dicintai Allah.</span>
        <a href="quran.php" class="text-brand-600 font-bold hover:underline flex items-center gap-1">
          Baca Al-Qur'an <i class="fa-solid fa-arrow-right text-[10px]"></i>
        </a>
      </div>
    </div>

    <!-- Info Hisab Kemenag -->
    <div class="glass-card rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-md flex flex-col justify-between space-y-4 hover:shadow-xl transition-all">
      <div class="space-y-3">
        <div class="w-10 h-10 rounded-2xl bg-brand-50 text-brand-700 flex items-center justify-center text-lg shadow-sm">
          <i class="fa-solid fa-scale-balanced"></i>
        </div>
        <h4 class="font-extrabold text-slate-900 text-base">Standar Hisab Kemenag RI</h4>
        <p class="text-xs text-slate-500 leading-relaxed">
          Perhitungan waktu sholat mengacu pada data resmi Bimas Islam Kementerian Agama Republik Indonesia dengan akurasi koordinat astronomis setiap daerah.
        </p>
      </div>
      <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
        <span>Sumber: Bimas Islam</span>
        <span class="text-emerald-600 font-bold flex items-center gap-1">
          <i class="fa-solid fa-check"></i> Terverifikasi
        </span>
      </div>
    </div>

  </div>

  <!-- ================= REKOMENDASI PENJELAJAH FITUR LAINNYA DI MYQURAN ================= -->
  <div class="space-y-6 pt-6 border-t border-slate-200/80">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2">
      <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-bold mb-2 border border-brand-200/60">
          <i class="fa-solid fa-compass animate-spin text-[11px]" style="animation-duration: 10s;"></i>
          Jelajahi Ekosistem Platform
        </div>
        <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">
          Eksplorasi Fitur Islami Lainnya
        </h3>
        <p class="text-sm text-slate-500 mt-1">
          Lengkapi ibadah harian Anda dengan kumpulan fitur komprehensif tanpa reload halaman di MyQuran.
        </p>
      </div>
    </div>

    <!-- 3 Cards Rekomendasi Menu Lainnya -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
      <!-- Card 1: Al-Qur'an 114 Surah -->
      <a href="quran.php" class="group relative overflow-hidden rounded-3xl bg-white border border-slate-200/80 p-6 sm:p-7 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all flex flex-col justify-between">
        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-amber-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform"></div>
        <div class="space-y-4 relative z-10">
          <div class="flex items-center justify-between">
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl shadow-sm group-hover:bg-amber-600 group-hover:text-white transition-colors">
              <i class="fa-solid fa-book-quran"></i>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-amber-100 text-amber-800 text-[10px] font-extrabold uppercase tracking-wide">
              Audio Murottal
            </span>
          </div>
          <div>
            <h4 class="text-lg font-extrabold text-slate-900 group-hover:text-amber-600 transition-colors flex items-center gap-2">
              Baca, Dengarkan, Renungkan.
              <i class="fa-solid fa-arrow-right text-xs opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all"></i>
            </h4>
            <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
              Teks Arab berharakat jelas, transliterasi Latin pemula, arti Indonesia, serta pemutar audio murottal per ayat Syaikh Misyari Rasyid.
            </p>
          </div>
        </div>
        <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-amber-600 relative z-10">
          <span>Baca & Dengarkan</span>
          <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
        </div>
      </a>

      <!-- Card 2: 227+ Doa Harian -->
      <a href="doa.php" class="group relative overflow-hidden rounded-3xl bg-white border border-slate-200/80 p-6 sm:p-7 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all flex flex-col justify-between">
        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-sky-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform"></div>
        <div class="space-y-4 relative z-10">
          <div class="flex items-center justify-between">
            <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center text-xl shadow-sm group-hover:bg-sky-600 group-hover:text-white transition-colors">
              <i class="fa-solid fa-hands-praying"></i>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-sky-100 text-sky-800 text-[10px] font-extrabold uppercase tracking-wide">
              227+ Doa Sahih
            </span>
          </div>
          <div>
            <h4 class="text-lg font-extrabold text-slate-900 group-hover:text-sky-600 transition-colors flex items-center gap-2">
              Kumpulan Doa & Dzikir
              <i class="fa-solid fa-arrow-right text-xs opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all"></i>
            </h4>
            <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
              Koleksi doa harian sahih dari hadits dan Al-Qur'an, transliterasi huruf Latin, filter kategori doa, dan tombol salin 1-klik.
            </p>
          </div>
        </div>
        <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-sky-600 relative z-10">
          <span>Pelajari Doa Harian</span>
          <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
        </div>
      </a>

      <!-- Card 3: 99 Asmaul Husna -->
      <a href="asmaul-husna.php" class="group relative overflow-hidden rounded-3xl bg-white border border-slate-200/80 p-6 sm:p-7 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all flex flex-col justify-between">
        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-purple-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform"></div>
        <div class="space-y-4 relative z-10">
          <div class="flex items-center justify-between">
            <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl shadow-sm group-hover:bg-purple-600 group-hover:text-white transition-colors">
              <i class="fa-solid fa-star-and-crescent"></i>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-purple-100 text-purple-800 text-[10px] font-extrabold uppercase tracking-wide">
              99 Nama Agung
            </span>
          </div>
          <div>
            <h4 class="text-lg font-extrabold text-slate-900 group-hover:text-purple-600 transition-colors flex items-center gap-2">
              Mengenal Nama-Nama Indah-Nya
              <i class="fa-solid fa-arrow-right text-xs opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all"></i>
            </h4>
            <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
              Tadaburi 99 nama agung Allah SWT dengan kaligrafi teks Arab besar, makna mendalam, serta kalender penanggalan Hijriah otomatis.
            </p>
          </div>
        </div>
        <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-purple-600 relative z-10">
          <span>Tadaburi Asmaul Husna</span>
          <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
        </div>
      </a>

    </div>
  </div>

</div>

<!-- ================= JAVASCRIPT LOGIC (VANILLA JS FETCH & CLOCK) ================= -->
<script>
  // State Aplikasi
  let activeCityId = '1301'; // Default: Kota Jakarta
  let activeCityName = 'KOTA JAKARTA';
  let activeTab = 'today'; // 'today' | 'custom' | 'month'
  let activeDate = new Date(); // Objek tanggal aktif
  let prayerData = null;
  let searchDebounceTimer = null;

  // Nama Bulan Bahasa Indonesia
  const monthNames = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
  ];

  // Konfigurasi 8 Waktu Sholat
  const prayerConfig = [
    { key: 'imsak', name: 'Imsak', icon: 'fa-solid fa-bell', arabic: 'الإمساك' },
    { key: 'subuh', name: 'Subuh', icon: 'fa-solid fa-cloud-sun', arabic: 'الصبح' },
    { key: 'terbit', name: 'Terbit', icon: 'fa-solid fa-sun', arabic: 'الشروق' },
    { key: 'dhuha', name: 'Dhuha', icon: 'fa-solid fa-sun-plant-wilt', arabic: 'الضحى' },
    { key: 'dzuhur', name: 'Dzuhur', icon: 'fa-solid fa-sun', arabic: 'الظهر' },
    { key: 'ashar', name: 'Ashar', icon: 'fa-solid fa-cloud-sun', arabic: 'العصر' },
    { key: 'maghrib', name: 'Maghrib', icon: 'fa-solid fa-moon', arabic: 'المغرب' },
    { key: 'isya', name: 'Isya', icon: 'fa-solid fa-cloud-moon', arabic: 'العشاء' }
  ];

  // 1. Digital Clock & Date Updater
  function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');

    const clockEl = document.getElementById('liveClock');
    const dateEl = document.getElementById('liveDate');

    if (clockEl) clockEl.textContent = `${hours}:${minutes}:${seconds}`;
    if (dateEl) {
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      dateEl.textContent = now.toLocaleDateString('id-ID', options);
    }

    // Refresh kalkulasi sholat berikutnya jika data jadwal hari ini tersedia
    if (prayerData && activeTab === 'today') {
      calculateNextPrayer(prayerData);
    }
  }

  // 2. Fetch Jadwal Sholat Harian dari API MyQuran
  async function loadPrayerSchedule(cityId, cityName, targetDate = new Date()) {
    activeCityId = cityId;
    activeCityName = cityName;
    activeDate = targetDate;

    // Update Badge Wilayah di Hero Banner dan Header Jadwal
    const bannerBadge = document.getElementById('bannerLocationBadge');
    const cityBadge = document.getElementById('activeCityBadge');
    const monthlyCityBadge = document.getElementById('monthlyActiveCityBadge');
    if (bannerBadge) bannerBadge.textContent = `${cityName}, INDONESIA`;
    if (cityBadge) cityBadge.textContent = cityName;
    if (monthlyCityBadge) monthlyCityBadge.textContent = cityName;

    const yyyy = targetDate.getFullYear();
    const mm = String(targetDate.getMonth() + 1).padStart(2, '0');
    const dd = String(targetDate.getDate()).padStart(2, '0');

    // Tampilkan Skeleton / Loading State
    renderSkeleton();

    try {
      const url = `https://api.myquran.com/v2/sholat/jadwal/${cityId}/${yyyy}/${mm}/${dd}`;
      const response = await fetch(url);
      const result = await response.json();

      if (result && result.status && result.data && result.data.jadwal) {
        prayerData = result.data.jadwal;
        
        // Update Subtitle Tanggal
        const dateSubtitle = document.getElementById('scheduleDateSubtitle');
        const isToday = isSameDay(targetDate, new Date());

        if (dateSubtitle && prayerData.tanggal) {
          const statusText = isToday ? 'Hari Ini' : 'Tanggal Pilihan';
          dateSubtitle.textContent = `${prayerData.tanggal} (${statusText}) • Sumber data hisab Kementerian Agama RI`;
        }

        if (isToday) {
          calculateNextPrayer(prayerData);
        } else {
          // Jika memilih tanggal selain hari ini, tampilkan kartu tanpa countdown sholat aktif hari ini
          renderPrayerCards(prayerData, null);
          const nameEl = document.getElementById('nextPrayerName');
          const timeEl = document.getElementById('nextPrayerTime');
          const countdownEl = document.getElementById('nextPrayerCountdown');
          if (nameEl) nameEl.textContent = 'Jadwal Tanggal';
          if (timeEl) timeEl.textContent = `${dd}/${mm}/${yyyy}`;
          if (countdownEl) countdownEl.textContent = 'Sesuai Tanggal';
        }
      } else {
        showErrorMessage('Data jadwal sholat tidak dapat ditemukan untuk wilayah ini.');
      }
    } catch (error) {
      console.error('Gagal mengambil jadwal sholat:', error);
      showErrorMessage('Gagal menghubungi server API MyQuran. Silakan periksa koneksi internet Anda.');
    }
  }

  // 3. Render 8 Kartu Waktu Sholat
  function renderPrayerCards(jadwal, nextPrayerKey = null) {
    const container = document.getElementById('prayerCardsGrid');
    if (!container) return;

    let html = '';

    prayerConfig.forEach(prayer => {
      const timeVal = jadwal[prayer.key] || '--:--';
      const isNext = (prayer.key === nextPrayerKey);

      if (isNext) {
        // Tampilan Kartu Sholat Aktif / Selanjutnya (Highlight Emerald Gradient)
        html += `
          <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-600 via-emerald-700 to-teal-800 text-white p-5 shadow-xl shadow-emerald-700/25 ring-2 ring-emerald-400/50 -translate-y-1 transition-all flex flex-col justify-between min-h-[160px] min-w-0">
            <div class="absolute -right-3 -bottom-3 text-6xl text-white/10 font-arabic pointer-events-none select-none leading-none">
              ${prayer.arabic}
            </div>
            <div class="flex items-center justify-between gap-2 relative z-10 min-w-0">
              <div class="w-9 h-9 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center text-white text-base shrink-0 shadow-inner">
                <i class="${prayer.icon}"></i>
              </div>
              <span class="inline-flex items-center gap-1.5 text-[10px] font-extrabold uppercase tracking-wide bg-amber-400 text-emerald-950 px-2.5 py-1 rounded-full shadow-md shrink-0 whitespace-nowrap">
                <i class="fa-solid fa-star text-[8px]"></i> Berikutnya
              </span>
            </div>
            <div class="relative z-10 mt-4 min-w-0">
              <div class="flex items-baseline justify-between gap-1">
                <span class="text-xs font-bold text-emerald-100 uppercase tracking-wider block truncate">${prayer.name}</span>
                <span class="text-xs font-arabic text-emerald-200/90 shrink-0">${prayer.arabic}</span>
              </div>
              <div class="text-3xl font-mono font-extrabold tracking-tight mt-1 text-white truncate">${timeVal}</div>
              <span class="text-[10px] text-emerald-200/80 block mt-0.5 font-medium truncate">Waktu Sholat Aktif</span>
            </div>
          </div>
        `;
      } else {
        // Tampilan Kartu Sholat Normal
        html += `
          <div class="glass-card rounded-3xl p-5 border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col justify-between min-h-[160px] min-w-0 group">
            <div class="flex items-center justify-between gap-2 min-w-0">
              <div class="w-9 h-9 rounded-2xl bg-slate-100 group-hover:bg-brand-50 text-slate-600 group-hover:text-brand-700 flex items-center justify-center text-base transition-colors shrink-0">
                <i class="${prayer.icon}"></i>
              </div>
              <span class="text-sm font-arabic text-slate-400 group-hover:text-brand-600 transition-colors shrink-0 truncate max-w-[50%] text-right">
                ${prayer.arabic}
              </span>
            </div>
            <div class="mt-4 min-w-0">
              <div class="flex items-baseline justify-between gap-1">
                <span class="text-xs font-bold text-slate-500 block uppercase tracking-wider truncate">${prayer.name}</span>
                <span class="text-[11px] text-slate-400 shrink-0"></span>
              </div>
              <div class="text-3xl font-mono font-extrabold text-slate-800 tracking-tight mt-1 truncate">${timeVal}</div>
              <span class="text-[10px] text-slate-400 block mt-0.5 truncate">Jadwal Harian</span>
            </div>
          </div>
        `;
      }
    });

    container.innerHTML = html;
  }

  // 4. Kalkulator Waktu Sholat Selanjutnya & Hitung Mundur (Countdown)
  function calculateNextPrayer(jadwal) {
    const now = new Date();
    const currentHours = now.getHours();
    const currentMinutes = now.getMinutes();
    const currentSeconds = now.getSeconds();
    const currentTimeInSeconds = (currentHours * 3600) + (currentMinutes * 60) + currentSeconds;

    let nextPrayer = null;
    let minDiffInSeconds = Infinity;

    prayerConfig.forEach(prayer => {
      const timeStr = jadwal[prayer.key];
      if (!timeStr) return;

      const [pHours, pMinutes] = timeStr.split(':').map(Number);
      const prayerTimeInSeconds = (pHours * 3600) + (pMinutes * 60);

      const diff = prayerTimeInSeconds - currentTimeInSeconds;
      if (diff > 0 && diff < minDiffInSeconds) {
        minDiffInSeconds = diff;
        nextPrayer = { ...prayer, time: timeStr, diffSeconds: diff };
      }
    });

    // Jika semua waktu sholat hari ini sudah terlewati, maka sholat berikutnya adalah Imsak/Subuh esok hari
    if (!nextPrayer) {
      const firstPrayer = prayerConfig[0];
      const timeStr = jadwal[firstPrayer.key] || '04:00';
      const [pHours, pMinutes] = timeStr.split(':').map(Number);
      const prayerTimeInSeconds = (pHours * 3600) + (pMinutes * 60) + (24 * 3600);
      const diff = prayerTimeInSeconds - currentTimeInSeconds;
      nextPrayer = { ...firstPrayer, time: timeStr, diffSeconds: diff };
    }

    // Update Hero Banner Widget
    const nameEl = document.getElementById('nextPrayerName');
    const timeEl = document.getElementById('nextPrayerTime');
    const countdownEl = document.getElementById('nextPrayerCountdown');

    if (nameEl) nameEl.textContent = nextPrayer.name;
    if (timeEl) timeEl.textContent = nextPrayer.time;

    if (countdownEl && nextPrayer.diffSeconds !== undefined) {
      const diff = nextPrayer.diffSeconds;
      const h = Math.floor(diff / 3600);
      const m = Math.floor((diff % 3600) / 60);
      const s = diff % 60;
      countdownEl.textContent = `-${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
    }

    // Re-render cards dengan highlight pada sholat berikutnya
    renderPrayerCards(jadwal, nextPrayer.key);
  }

  // 5. Fitur Tab Navigasi Jadwal (Hari Ini / Pilih Tanggal / 1 Bulan)
  function switchScheduleTab(tab) {
    activeTab = tab;

    const btnToday = document.getElementById('tabTodayBtn');
    const btnCustom = document.getElementById('tabCustomDateBtn');
    const btnMonth = document.getElementById('tabMonthBtn');

    const controlCustom = document.getElementById('customDateControl');
    const controlMonth = document.getElementById('monthSelectorControl');

    const viewDaily = document.getElementById('dailyScheduleView');
    const viewMonthly = document.getElementById('monthlyScheduleView');

    // Reset Style Button
    [btnToday, btnCustom, btnMonth].forEach(btn => {
      btn.className = 'flex-1 md:flex-none px-4 py-2 rounded-lg transition-all flex items-center justify-center gap-2 text-slate-600 hover:text-brand-700';
    });

    if (tab === 'today') {
      btnToday.className = 'flex-1 md:flex-none px-4 py-2 rounded-lg transition-all flex items-center justify-center gap-2 bg-white text-brand-700 shadow-sm';
      controlCustom.classList.add('hidden');
      controlMonth.classList.add('hidden');
      viewDaily.classList.remove('hidden');
      viewMonthly.classList.add('hidden');
      loadPrayerSchedule(activeCityId, activeCityName, new Date());
    } else if (tab === 'custom') {
      btnCustom.className = 'flex-1 md:flex-none px-4 py-2 rounded-lg transition-all flex items-center justify-center gap-2 bg-white text-brand-700 shadow-sm';
      controlCustom.classList.remove('hidden');
      controlMonth.classList.add('hidden');
      viewDaily.classList.remove('hidden');
      viewMonthly.classList.add('hidden');

      // Set input tanggal ke tanggal aktif
      const dateInput = document.getElementById('datePickerInput');
      if (dateInput) {
        dateInput.value = formatDateToInput(activeDate);
      }
    } else if (tab === 'month') {
      btnMonth.className = 'flex-1 md:flex-none px-4 py-2 rounded-lg transition-all flex items-center justify-center gap-2 bg-white text-brand-700 shadow-sm';
      controlCustom.classList.add('hidden');
      controlMonth.classList.remove('hidden');
      viewDaily.classList.add('hidden');
      viewMonthly.classList.remove('hidden');

      loadMonthlySchedule();
    }
  }

  // 6. Fetch Jadwal Sholat 1 Bulan Penuh dari API MyQuran
  async function loadMonthlySchedule() {
    const monthSelect = document.getElementById('monthSelect');
    const yearSelect = document.getElementById('yearSelect');
    const tableBody = document.getElementById('monthlyTableBody');
    const subtitle = document.getElementById('monthlyScheduleSubtitle');

    const selectedMonth = monthSelect ? monthSelect.value : String(new Date().getMonth() + 1).padStart(2, '0');
    const selectedYear = yearSelect ? yearSelect.value : String(new Date().getFullYear());

    if (subtitle) {
      const monthLabel = monthNames[parseInt(selectedMonth, 10) - 1];
      subtitle.textContent = `Bulan ${monthLabel} ${selectedYear} • Wilayah ${activeCityName} (Kemenag RI)`;
    }

    if (tableBody) {
      tableBody.innerHTML = `
        <tr>
          <td colspan="10" class="py-12 text-center text-slate-400">
            <i class="fa-solid fa-spinner fa-spin text-2xl text-brand-600 mb-2 block"></i>
            <span>Memuat jadwal sholat bulan ${monthNames[parseInt(selectedMonth, 10) - 1]} ${selectedYear}...</span>
          </td>
        </tr>
      `;
    }

    try {
      const url = `https://api.myquran.com/v2/sholat/jadwal/${activeCityId}/${selectedYear}/${selectedMonth}`;
      const response = await fetch(url);
      const result = await response.json();

      if (result && result.status && result.data && Array.isArray(result.data.jadwal)) {
        renderMonthlyTable(result.data.jadwal);
      } else {
        tableBody.innerHTML = `
          <tr>
            <td colspan="10" class="py-8 text-center text-rose-500 font-semibold">
              Data jadwal sholat bulanan tidak tersedia untuk periode ini.
            </td>
          </tr>
        `;
      }
    } catch (error) {
      console.error('Gagal mengambil jadwal bulanan:', error);
      if (tableBody) {
        tableBody.innerHTML = `
          <tr>
            <td colspan="10" class="py-8 text-center text-rose-500 font-semibold">
              <i class="fa-solid fa-triangle-exclamation mr-1"></i> Gagal menghubungi API MyQuran.
            </td>
          </tr>
        `;
      }
    }
  }

  // Render Tabel Jadwal Bulanan
  function renderMonthlyTable(jadwalList) {
    const tableBody = document.getElementById('monthlyTableBody');
    if (!tableBody) return;

    const todayStr = formatDateToInput(new Date());
    let html = '';

    jadwalList.forEach((item, index) => {
      const isToday = (item.date === todayStr);

      if (isToday) {
        html += `
          <tr class="bg-emerald-50/90 text-emerald-950 font-bold border-l-4 border-emerald-600 shadow-sm transition">
            <td class="py-3.5 px-4 text-center font-mono">${index + 1}</td>
            <td class="py-3.5 px-4 font-bold flex items-center gap-2">
              <span>${item.tanggal}</span>
              <span class="px-2 py-0.5 rounded-full bg-emerald-600 text-white text-[10px] font-extrabold uppercase">Hari Ini</span>
            </td>
            <td class="py-3.5 px-3 text-center font-mono text-emerald-900">${item.imsak}</td>
            <td class="py-3.5 px-3 text-center font-mono text-emerald-900">${item.subuh}</td>
            <td class="py-3.5 px-3 text-center font-mono text-emerald-900">${item.terbit}</td>
            <td class="py-3.5 px-3 text-center font-mono text-emerald-900">${item.dhuha}</td>
            <td class="py-3.5 px-3 text-center font-mono text-emerald-900">${item.dzuhur}</td>
            <td class="py-3.5 px-3 text-center font-mono text-emerald-900">${item.ashar}</td>
            <td class="py-3.5 px-3 text-center font-mono text-emerald-900">${item.maghrib}</td>
            <td class="py-3.5 px-3 text-center font-mono text-emerald-900">${item.isya}</td>
          </tr>
        `;
      } else {
        html += `
          <tr class="hover:bg-slate-50/80 transition text-slate-700">
            <td class="py-3 px-4 text-center text-slate-400 font-mono">${index + 1}</td>
            <td class="py-3 px-4 font-semibold text-slate-800">${item.tanggal}</td>
            <td class="py-3 px-3 text-center font-mono">${item.imsak}</td>
            <td class="py-3 px-3 text-center font-mono">${item.subuh}</td>
            <td class="py-3 px-3 text-center font-mono">${item.terbit}</td>
            <td class="py-3 px-3 text-center font-mono">${item.dhuha}</td>
            <td class="py-3 px-3 text-center font-mono">${item.dzuhur}</td>
            <td class="py-3 px-3 text-center font-mono">${item.ashar}</td>
            <td class="py-3 px-3 text-center font-mono">${item.maghrib}</td>
            <td class="py-3 px-3 text-center font-mono">${item.isya}</td>
          </tr>
        `;
      }
    });

    tableBody.innerHTML = html;
  }

  // 7. Fitur Pencarian Kota / Wilayah dengan Debounce & Autocomplete
  const searchInput = document.getElementById('citySearchInput');
  const searchResults = document.getElementById('citySearchResults');
  const searchSpinner = document.getElementById('searchSpinner');
  const clearBtn = document.getElementById('clearSearchBtn');

  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const query = this.value.trim();

      if (query.length > 0) {
        clearBtn.classList.remove('hidden');
      } else {
        clearBtn.classList.add('hidden');
        searchResults.classList.add('hidden');
        searchResults.innerHTML = '';
        return;
      }

      if (query.length < 2) {
        searchResults.classList.add('hidden');
        return;
      }

      // Debounce pemanggilan API (350ms)
      clearTimeout(searchDebounceTimer);
      searchDebounceTimer = setTimeout(() => {
        searchCities(query);
      }, 350);
    });
  }

  if (clearBtn) {
    clearBtn.addEventListener('click', () => {
      searchInput.value = '';
      clearBtn.classList.add('hidden');
      searchResults.classList.add('hidden');
      searchResults.innerHTML = '';
      searchInput.focus();
    });
  }

  // Request pencarian kota ke REST API MyQuran
  async function searchCities(query) {
    if (searchSpinner) searchSpinner.classList.remove('hidden');

    try {
      const url = `https://api.myquran.com/v2/sholat/kota/cari/${encodeURIComponent(query)}`;
      const response = await fetch(url);
      const result = await response.json();

      if (searchSpinner) searchSpinner.classList.add('hidden');

      if (result && result.status && Array.isArray(result.data) && result.data.length > 0) {
        renderSearchResults(result.data);
      } else {
        renderNoResults(query);
      }
    } catch (error) {
      console.error('Error mencari kota:', error);
      if (searchSpinner) searchSpinner.classList.add('hidden');
      renderSearchError();
    }
  }

  // Render Dropdown Hasil Pencarian
  function renderSearchResults(cities) {
    searchResults.innerHTML = '';
    
    cities.forEach(city => {
      const item = document.createElement('button');
      item.type = 'button';
      item.className = 'w-full text-left px-5 py-3.5 bg-white hover:bg-emerald-50 transition flex items-center justify-between group cursor-pointer';
      item.innerHTML = `
        <div class="flex items-center gap-3">
          <div class="w-8 h-8 rounded-xl bg-slate-100 group-hover:bg-brand-500 group-hover:text-white text-slate-600 flex items-center justify-center text-xs transition">
            <i class="fa-solid fa-location-dot"></i>
          </div>
          <div>
            <span class="text-sm font-bold text-slate-900 group-hover:text-brand-700 transition block">${city.lokasi}</span>
            <span class="text-[11px] text-slate-500">ID Wilayah: ${city.id}</span>
          </div>
        </div>
        <span class="text-xs font-bold text-brand-600 opacity-0 group-hover:opacity-100 transition flex items-center gap-1 bg-brand-50 px-2.5 py-1 rounded-lg">
          Pilih <i class="fa-solid fa-chevron-right text-[10px]"></i>
        </span>
      `;
      item.addEventListener('click', () => {
        selectCity(city.id, city.lokasi);
      });
      searchResults.appendChild(item);
    });

    searchResults.classList.remove('hidden');
  }

  function renderNoResults(query) {
    searchResults.innerHTML = `
      <div class="p-6 text-center text-slate-500 bg-white space-y-1">
        <i class="fa-solid fa-magnifying-glass text-xl text-slate-400"></i>
        <p class="text-xs font-bold text-slate-700">Kota "${query}" tidak ditemukan</p>
        <p class="text-[11px] text-slate-400">Pastikan ejaan benar (misal: "Bandung", "Surabaya", "Sleman")</p>
      </div>
    `;
    searchResults.classList.remove('hidden');
  }

  function renderSearchError() {
    searchResults.innerHTML = `
      <div class="p-4 text-center bg-white text-rose-600 text-xs font-semibold">
        <i class="fa-solid fa-triangle-exclamation mr-1"></i> Terjadi kesalahan koneksi saat mencari kota.
      </div>
    `;
    searchResults.classList.remove('hidden');
  }

  // Aksi ketika user memilih salah satu kota
  function selectCity(cityId, cityName) {
    if (searchInput) searchInput.value = cityName;
    if (clearBtn) clearBtn.classList.remove('hidden');
    if (searchResults) searchResults.classList.add('hidden');

    if (activeTab === 'month') {
      activeCityId = cityId;
      activeCityName = cityName;
      loadMonthlySchedule();
    } else {
      loadPrayerSchedule(cityId, cityName, activeDate);
    }
  }

  // Tutup dropdown jika user klik di luar area input/dropdown
  document.addEventListener('click', (e) => {
    if (searchResults && !searchResults.contains(e.target) && !searchInput.contains(e.target)) {
      searchResults.classList.add('hidden');
    }
  });

  // Date picker listener
  const datePicker = document.getElementById('datePickerInput');
  if (datePicker) {
    datePicker.addEventListener('change', function() {
      if (this.value) {
        const [y, m, d] = this.value.split('-').map(Number);
        const selectedDate = new Date(y, m - 1, d);
        loadPrayerSchedule(activeCityId, activeCityName, selectedDate);
      }
    });
  }

  // Helper Formatter
  function formatDateToInput(dateObj) {
    const yyyy = dateObj.getFullYear();
    const mm = String(dateObj.getMonth() + 1).padStart(2, '0');
    const dd = String(dateObj.getDate()).padStart(2, '0');
    return `${yyyy}-${mm}-${dd}`;
  }

  function isSameDay(d1, d2) {
    return d1.getFullYear() === d2.getFullYear() &&
           d1.getMonth() === d2.getMonth() &&
           d1.getDate() === d2.getDate();
  }

  // Inisialisasi Pilihan Bulan dan Tahun (Timedate Picker: Pilih Tahun Kapan Saja)
  function initMonthYearSelectors() {
    const monthSelect = document.getElementById('monthSelect');
    const yearSelect = document.getElementById('yearSelect');
    const now = new Date();
    const currentMonth = now.getMonth() + 1;
    const currentYear = now.getFullYear();

    if (monthSelect) {
      monthSelect.innerHTML = monthNames.map((name, i) => {
        const val = String(i + 1).padStart(2, '0');
        const selected = (i + 1 === currentMonth) ? 'selected' : '';
        return `<option value="${val}" ${selected}>Bulan ${name}</option>`;
      }).join('');

      monthSelect.addEventListener('change', () => {
        loadMonthlySchedule();
      });
    }

    if (yearSelect) {
      let yearsHtml = '';
      // Rentang pilihan tahun: 5 tahun terakhir dan 5 tahun ke depan dari tahun saat ini
      const startYear = currentYear - 5;
      const endYear = currentYear + 5;

      for (let y = startYear; y <= endYear; y++) {
        const selected = (y === currentYear) ? 'selected' : '';
        yearsHtml += `<option value="${y}" ${selected}>Tahun ${y}</option>`;
      }
      yearSelect.innerHTML = yearsHtml;

      yearSelect.addEventListener('change', () => {
        loadMonthlySchedule();
      });
    }
  }

  // Tampilkan Skeleton Saat Loading
  function renderSkeleton() {
    const container = document.getElementById('prayerCardsGrid');
    if (!container) return;

    let html = '';
    for (let i = 0; i < 8; i++) {
      html += `
        <div class="glass-card rounded-3xl p-5 border border-slate-200/80 shadow-sm animate-pulse flex flex-col justify-between min-h-[160px] min-w-0">
          <div class="flex items-center justify-between gap-2">
            <div class="w-9 h-9 rounded-2xl bg-slate-200 shrink-0"></div>
            <div class="w-12 h-3.5 bg-slate-200 rounded shrink-0"></div>
          </div>
          <div class="space-y-2 mt-4">
            <div class="w-16 h-3 bg-slate-200 rounded"></div>
            <div class="w-24 h-7 bg-slate-200 rounded-xl"></div>
            <div class="w-14 h-2 bg-slate-200 rounded"></div>
          </div>
        </div>
      `;
    }
    container.innerHTML = html;
  }

  function showErrorMessage(msg) {
    const container = document.getElementById('prayerCardsGrid');
    if (!container) return;
    container.innerHTML = `
      <div class="col-span-full p-8 text-center bg-rose-50 border border-rose-200 rounded-3xl space-y-3">
        <i class="fa-solid fa-circle-exclamation text-3xl text-rose-500"></i>
        <h4 class="text-sm font-bold text-rose-800">${msg}</h4>
        <button type="button" onclick="loadPrayerSchedule('${activeCityId}', '${activeCityName}', activeDate)" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-xl transition shadow">
          <i class="fa-solid fa-rotate-right mr-1"></i> Coba Lagi
        </button>
      </div>
    `;
  }

  // Inisialisasi saat halaman selesai dimuat
  document.addEventListener('DOMContentLoaded', () => {
    updateClock();
    setInterval(updateClock, 1000);
    initMonthYearSelectors();
    
    const dateInput = document.getElementById('datePickerInput');
    if (dateInput) dateInput.value = formatDateToInput(new Date());

    loadPrayerSchedule(activeCityId, activeCityName, new Date());
  });
</script>

<?php include 'includes/footer.php'; ?>
