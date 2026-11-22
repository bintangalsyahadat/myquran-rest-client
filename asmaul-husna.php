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
          Mengenal sifat-sifat Allah yang Maha Pengasih dan Maha Penyayang beserta penanggalan kalender Islam (Hijriah).
        </p>
      </div>

      <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-6 sm:p-7 min-w-[280px] shadow-xl text-center flex flex-col justify-center space-y-2">
        <div class="text-[11px] uppercase font-bold tracking-widest text-purple-300 flex items-center justify-center gap-2">
          <i class="fa-solid fa-moon"></i> Kalender Hijriah Hari Ini
        </div>
        <div id="hijriDateText" class="text-2xl sm:text-3xl font-extrabold text-white tracking-wide pt-1">
          <i class="fa-solid fa-spinner fa-spin text-lg mr-2"></i> Memuat...
        </div>
        <div id="masehiDateText" class="text-xs text-purple-200/80 font-medium pt-1 border-t border-white/10">
          -
        </div>
      </div>
    </div>
  </div>

  <!-- KONTEN AREA (STARTER TEMPLATE) -->
  <div class="p-12 text-center border-2 border-dashed border-slate-300 rounded-[2rem] bg-white/50 space-y-3">
    <div class="w-12 h-12 mx-auto rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl">
      <i class="fa-solid fa-code"></i>
    </div>
    <h3 class="text-lg font-bold text-slate-800">Ruang Kerja Menu Asmaul Husna</h3>
    <p class="text-sm text-slate-500 max-w-md mx-auto">
      Silakan kembangkan fitur 99 Asmaul Husna dan filter pencariannya di file ini. Baca panduan spesifikasi di <code>AGENTS.md</code>.
    </p>
  </div>

</div>

<script>
  async function loadHijriCalendar() {
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');

    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const masehiEl = document.getElementById('masehiDateText');
    const hijriEl = document.getElementById('hijriDateText');
    if (masehiEl) masehiEl.textContent = today.toLocaleDateString('id-ID', options);

    try {
      const res = await fetch(`https://api.myquran.com/v2/cal/hijr/${yyyy}/${mm}/${dd}`);
      const data = await res.json();
      if (data.status && data.data && data.data.date && hijriEl) {
        const h = data.data.date;
        hijriEl.textContent = `${h[0]} ${h[1]} ${h[2]} H`;
      }
    } catch (err) {
      if (hijriEl) hijriEl.textContent = "Kalender Hijriah";
    }
  }
  loadHijriCalendar();
</script>

<?php include 'includes/footer.php'; ?>
