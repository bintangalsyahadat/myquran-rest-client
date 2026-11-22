# 📋 Product Requirement Document (PRD) & AI Guidelines
**Project Name:** MyQuran - Modern Islamic REST Client Platform  
**Target Architecture:** Multi-Page Application (MPA) berbasis **PHP Native**  
**Design Standard:** Tailwind CSS (CDN), Google Fonts (Plus Jakarta Sans & Amiri), Font Awesome 6  
**Data Source:** Public REST API (`api.myquran.com` & `equran.id`)

---

## 🤖 1. Context for AI Agents (Vibe Coding Guide)
Dokumen ini dibuat agar **AI Coding Assistant / Agent** (Cursor, Windsurf, GitHub Copilot, Claude Code, Gemini CLI, ChatGPT, dll.) dapat langsung memahami:
1. Arsitektur kode PHP Native & batas isolasi file masing-masing halaman.
2. Aturan Design System dan tampilan visual yang seragam.
3. **Aturan Git Workflow yang WAJIB dipatuhi** dari pembuatan branch, penulisan commit, hingga push dan pembuatan Pull Request.

> ⚠️ **CRITICAL RULES FOR ALL AI AGENTS:**
> 1. **ISOLASI FILE:** Dilarang mengedit file halaman yang bukan tanggung jawab Anda. Hanya fokus pada file halaman yang sedang dikerjakan.
> 2. **NO BUILD TOOLS:** Dilarang menambahkan `package.json`, Node.js compiler, Webpack, atau Vite. Tetap gunakan PHP Native + Tailwind CDN + Vanilla JS agar langsung jalan di XAMPP Windows.
> 3. **NO FULL RELOAD:** Wajib menggunakan JavaScript `fetch()` / AJAX untuk interaksi dinamis (search, audio, filter kategori, pagination).
> 4. **GIT DISCIPLINE:** Dilarang menyarankan user untuk push langsung ke branch `main`.

---

## 🔄 2. Standar Git Workflow (Wajib Dipahami AI Agent)

AI Assistant wajib mengikuti alur **GitHub Flow**:

```text
[main branch (selalu stabil)]
      │
      ├───► 1. Sync Terbaru: git checkout main && git pull origin main
      │
      ├───► 2. Buat Feature Branch: git checkout -b feature/<nama-halaman>
      │
      ├───► 3. Kerjakan Kode & Commit: git add . && git commit -m "..."
      │
      ├───► 4. Push ke GitHub: git push -u origin feature/<nama-halaman>
      │
      ├───► 5. Buka Pull Request (PR) & Tautkan Issue (Closes #X)
      │
      └───► 6. Review & Squash Merge oleh Maintainer
```

### Konvensi Penamaan Branch per Halaman:
* Menu 1 (Jadwal Sholat - Maintainer): `feature/jadwal-sholat`
* Menu 2 (Al-Qur'an - Dev 1): `feature/halaman-quran`
* Menu 3 (Doa Harian - Dev 2): `feature/halaman-doa`
* Menu 4 (Asmaul Husna - Dev 3): `feature/halaman-asmaul-husna`

### Konvensi Commit Message (Conventional Commits):
* `feat(quran): integrate 114 surah list and murottal audio player`
* `feat(doa): implement 227+ prayers with latin text and pagination`
* `feat(husna): add 99 asmaul husna cards and hijri calendar widget`
* `feat(sholat): add prayer times schedule and city search`
* `fix(<halaman>): resolve issue with api fetch`

---

## 🏗️ 3. Struktur Folder Project

```text
myquran-rest-client/
│
├── includes/              # Komponen layout bersama (Reusable PHP components)
│   ├── header.php         # Tag <head>, Favicon Ka'bah, Tailwind CDN, Google Fonts, & Top/Mobile Navbar
│   └── footer.php         # Footer platform dengan emblem Ka'bah & penutup tag </body>
│
├── index.php              # [Menu Halaman 1] Jadwal Sholat & Waktu Realtime (Maintainer)
├── quran.php              # [Menu Halaman 2] Al-Qur'an 114 Surah, Detail Ayat & Murottal (Dev 1)
├── doa.php                # [Menu Halaman 3] Kumpulan 227+ Doa Harian, Latin, & Pagination (Dev 2)
├── asmaul-husna.php       # [Menu Halaman 4] 99 Asmaul Husna & Kalender Hijriah (Dev 3)
│
├── AGENTS.md              # Dokumen panduan AI Agent & PRD ini
└── README.md              # Panduan Git Workflow & Cara Menjalankan di XAMPP Windows
```

> **Aturan Pemanggilan Komponen Bersama:**
> Setiap file halaman (`index.php`, `quran.php`, dsb) cukup membungkus kontennya dengan:
> ```php
> <?php 
> $pageTitle = "Nama Halaman";
> include 'includes/header.php'; 
> ?>
> 
> <!-- Konten Spesifik Halaman di Sini -->
> 
> <?php include 'includes/footer.php'; ?>
> ```

---

## 🎨 4. Design System & Standar Visual (Wajib Konsisten)

| Komponen UI | Nilai / Utility Tailwind CSS |
| :--- | :--- |
| **Background Dasar** | `bg-[#f8fafc]` (Slate-50 soft, bukan putih murni) |
| **Font Body (Latin)** | `'Plus Jakarta Sans', sans-serif` |
| **Font Kaligrafi Arab** | `'Amiri', serif` (`text-2xl` s/d `text-4xl`, line-height loose `leading-loose`) |
| **Corner Radius** | `rounded-3xl` (kontainer & card besar), `rounded-2xl` (input & button) |
| **Glassmorphism Effect** | Class `.glass-card`: `bg-white/85 backdrop-blur-xl border border-slate-200/80` |
| **Efek Hover Card** | `hover:shadow-xl hover:-translate-y-1 transition-all` |
| **Top Navbar** | Fixed/Sticky `h-20`, menu kapsul (*segmented tabs*), tombol link repository |
| **Mobile Navigation** | Hamburger menu drawer di atas + bottom bar navigasi di bawah layar |

---

## 📄 5. Spesifikasi Fungsional Menu Halaman

---

### 📍 Menu Halaman 1: Jadwal Sholat & Realtime Clock
* **File:** `index.php`
* **Warna Aksen:** Emerald Green (`brand-700: #047857`, `emerald-500`)
* **Spesifikasi Fitur:**
  1. **Hero Banner Modern:** Salam, lokasi aktif, serta widget jam digital berjalan per detik (`00:00:00`) menggunakan JavaScript `setInterval`.
  2. **Smart Next Prayer Calculator:** Menghitung waktu sholat berikutnya secara otomatis (Imsak, Subuh, Terbit, Dhuha, Dzuhur, Ashar, Maghrib, Isya).
  3. **Pencarian Wilayah Se-Indonesia Tanpa Reload:**
     * Form input pencarian kota/kabupaten.
     * Mengambil daftar kota via `fetch()` ke API MyQuran lalu menampilkan pilihan.
     * Mengganti jadwal 8 waktu sholat secara instan saat kota dipilih.
* **REST API Endpoints:**
  * Cari Kota: `GET https://api.myquran.com/v2/sholat/kota/cari/{nama_kota}`
  * Jadwal Sholat: `GET https://api.myquran.com/v2/sholat/jadwal/{id_kota}/{yyyy}/{mm}/{dd}`

---

### 📖 Menu Halaman 2: Al-Qur'an Digital & Audio Murottal
* **File:** `quran.php`
* **Warna Aksen:** Warm Amber / Gold (`amber-600`, `amber-500`)
* **Spesifikasi Fitur:**
  1. **Katalog 114 Surah:** Grid card surah lengkap dengan nomor urut (`number`), nama Latin (`name_id`), tulisan Arab (`name_short`), arti (`translation_id`), jumlah ayat (`number_of_verses`), dan tempat turun (`revelation_id`).
  2. **Instant Search Bar:** Filter pencarian surah berdasarkan nama surah, arti, atau nomor surah langsung saat user mengetik.
  3. **Modal Dialog Pembacaan Ayat:**
     * Pop-up menampilkan seluruh ayat dalam surah yang diklik via rentang ayat: `/v2/quran/ayat/{nomor}/1-{totalAyat}`.
     * Setiap ayat memiliki 3 lapisan: (1) Kaligrafi Arab berharakat (`arab`), (2) Transliterasi Latin (`latin`), (3) Terjemahan Indonesia (`text`).
  4. **Pemutar Murottal Audio HD:**
     * Tombol *"Putar Surah"* untuk mendengarkan full 1 surah (`surah.audio_url`).
     * Tombol *"Putar Audio"* per ayat (`ayat.audio`) dengan efek *highlight border* dan auto-scroll pada ayat yang sedang diputar (Qari: Syaikh Misyari Rasyid).
* **REST API Endpoints:**
  * Daftar 114 Surah: `GET https://api.myquran.com/v2/quran/surat/semua`
  * Detail Ayat Surah: `GET https://api.myquran.com/v2/quran/ayat/{nomor_surat}/1-{total_ayat}`
  * Audio Ayat: Disediakan langsung di properti `ayat.audio` dalam respon JSON.

---

### 🤲 Menu Halaman 3: Kumpulan Doa & Dzikir Harian
* **File:** `doa.php`
* **Warna Aksen:** Sky Blue (`sky-600`, `sky-500`)
* **Spesifikasi Fitur:**
  1. **Koleksi 227+ Doa Sahih:** Memuat doa sehari-hari lengkap (doa bangun tidur, sebelum makan, keluar rumah, orang tua, dsb).
  2. **Transliterasi Huruf Latin:** Wajib menampilkan kotak bacaan Latin berlatar biru muda (`item.tr`) agar mudah dibaca oleh siapapun yang belum lancar huruf Hijaiyah.
  3. **Filter Kategori Dropdown:** Pengelompokan doa berdasarkan kategori grup (`item.grup`).
  4. **Instant Search Bar:** Pencarian doa berdasarkan judul (`item.nama`), bacaan latin, maupun artinya (`item.idn`) tanpa reload.
  5. **Smart Pagination:**
     * Membatasi tampilan 10 doa per halaman.
     * Komponen navigasi nomor halaman (`< Prev`, `1`, `2`, `3` ... `Next >`) beserta auto-scroll ke atas saat halaman berganti.
  6. **Tombol Salin Doa:** Menyalin judul, lafadz Arab, dan teks Latin ke clipboard dalam 1 klik.
* **REST API Endpoints:**
  * Koleksi Doa Lengkap (Arab, Latin, Indo): `GET https://equran.id/api/doa`

---

### 🌙 Menu Halaman 4: Asmaul Husna & Kalender Hijriah
* **File:** `asmaul-husna.php`
* **Warna Aksen:** Royal Purple / Indigo (`purple-700`, `purple-500`)
* **Spesifikasi Fitur:**
  1. **Widget Penanggalan Kalender Hijriah:** Menampilkan konversi tanggal Masehi hari ini ke kalender Hijriah secara otomatis (`item.date[0] item.date[1] item.date[2] H`).
  2. **Grid 99 Nama Agung Allah (Asmaul Husna):**
     * Card mewah nomor 1 s/d 99 (`item.id`).
     * Nomor urut, kaligrafi teks Arab besar (`item.arab`), nama Latin (`item.latin`), dan arti/makna mendalam (`item.indo` / `item.arti`).
  3. **Filter Pencarian Instan:** Mencari nama Asmaul Husna berdasarkan nama Arab, Latin, maupun terjemahan artinya.
* **REST API Endpoints:**
  * 99 Asmaul Husna: `GET https://api.myquran.com/v2/husna/semua`
  * Kalender Hijriah: `GET https://api.myquran.com/v2/cal/hijr/{yyyy}/{mm}/{dd}`

---