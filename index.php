<?php
$pageTitle = "Jadwal Sholat & Waktu Realtime";
include 'includes/header.php';
?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
  
  <!-- HERO BANNER LENGKAP -->
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
          <span id="bannerLocationBadge">KOTA JAKARTA, INDONESIA</span>
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
          <div class="text-[11px] font-bold uppercase tracking-wider text-amber-300 flex items-center gap-1.5">
            <i class="fa-solid fa-bell animate-bounce"></i> Sholat Selanjutnya:
          </div>
          <div class="flex items-baseline justify-between mt-1">
            <div id="nextPrayerName" class="text-xl font-extrabold text-white">Memuat...</div>
            <div id="nextPrayerTime" class="text-sm font-mono font-bold text-emerald-300 bg-white/10 px-2.5 py-1 rounded-lg">--:--</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- KONTEN AREA (STARTER TEMPLATE) -->
  <div class="p-12 text-center border-2 border-dashed border-slate-300 rounded-[2rem] bg-white/50 space-y-3">
    <div class="w-12 h-12 mx-auto rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
      <i class="fa-solid fa-code"></i>
    </div>
    <h3 class="text-lg font-bold text-slate-800">Ruang Kerja Menu Jadwal Sholat</h3>
    <p class="text-sm text-slate-500 max-w-md mx-auto">
      Silakan kembangkan fitur jadwal sholat (pencarian kota dan card waktu sholat) di bawah ini. Baca panduan spesifikasi di <code>AGENTS.md</code>.
    </p>
  </div>

</div>

<script>
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
  }
  setInterval(updateClock, 1000);
  updateClock();
</script>

<?php include 'includes/footer.php'; ?>
