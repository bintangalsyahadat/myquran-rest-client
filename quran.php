<?php
$pageTitle = "Al-Qur'an Digital & Audio Murottal";
include 'includes/header.php';
?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
  
  <!-- HERO BANNER LENGKAP -->
  <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-amber-700 via-amber-800 to-slate-900 text-white p-7 sm:p-12 shadow-2xl shadow-amber-950/20 border border-amber-500/20">
    <div class="absolute -top-24 -left-24 w-72 h-72 bg-amber-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-orange-400/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-10 text-[260px] pointer-events-none font-arabic select-none">
      القرآن
    </div>

    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
      <div class="space-y-4 max-w-2xl">
        <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-amber-200 text-xs font-semibold tracking-wide">
          <i class="fa-solid fa-book-open"></i> 114 Surah + Murottal Syaikh Misyari Rasyid
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
          <i class="fa-solid fa-headphones-simple"></i>
        </div>
        <div class="text-xl font-extrabold text-white">Audio Murottal HD</div>
        <div class="text-xs text-amber-200/80 mt-1">Syaikh Misyari Rasyid Al-Afasy</div>
      </div>
    </div>
  </div>

  <!-- KONTEN AREA (STARTER TEMPLATE) -->
  <div class="p-12 text-center border-2 border-dashed border-slate-300 rounded-[2rem] bg-white/50 space-y-3">
    <div class="w-12 h-12 mx-auto rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
      <i class="fa-solid fa-code"></i>
    </div>
    <h3 class="text-lg font-bold text-slate-800">Ruang Kerja Menu Al-Qur'an</h3>
    <p class="text-sm text-slate-500 max-w-md mx-auto">
      Silakan kembangkan fitur daftar 114 surah, modal baca ayat, dan audio murottal di file ini. Baca panduan spesifikasi di <code>AGENTS.md</code>.
    </p>
  </div>

</div>

<?php include 'includes/footer.php'; ?>
