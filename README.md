# MyQuran - Modern Islamic REST Client Platform

Aplikasi web REST Client Islami modern berbasis **PHP Native** dan **Tailwind CSS** yang mengonsumsi data dari Public REST API secara *realtime*.

Platform ini dirancang dengan arsitektur **Multi-Page Application (MPA)** yang ringan, tanpa memerlukan database MySQL lokal, dan siap dijalankan langsung di server lokal **XAMPP (Windows)**.

---

## 📑 Daftar Menu Halaman (Pembagian Fitur)

Setiap halaman menu berdiri sendiri sebagai file PHP independen untuk mendukung kolaborasi tim yang terstruktur:

| No | Menu Halaman | File | Penanggung Jawab | Deskripsi Fitur Utama | Sumber REST API |
| :---: | :--- | :--- | :--- | :--- | :--- |
| 1 | **Jadwal Sholat** | `index.php` | **Maintainer** (Ketua) | Jadwal 8 waktu sholat, jam digital realtime, & live pencarian kota se-Indonesia | `api.myquran.com` |
| 2 | **Al-Qur'an Digital** | `quran.php` | **Developer 1** | Katalog 114 surah, modal baca ayat lengkap (Arab, Latin, Indo), & audio murottal | `api.myquran.com` |
| 3 | **Doa & Dzikir Harian** | `doa.php` | **Developer 2** | Koleksi 227+ doa sahih, bacaan transliterasi Latin, filter kategori, & pagination | `equran.id` |
| 4 | **Asmaul Husna** | `asmaul-husna.php` | **Developer 3** | 99 nama agung Allah SWT beserta makna, fitur pencarian, & widget kalender Hijriah | `api.myquran.com` |

---

## 🔄 Git Workflow & Kolaborasi Tim

Sesuai materi perkuliahan **Git Workflow & GitHub Projects**, proyek ini menerapkan alur kerja **GitHub Flow** yang terstruktur untuk mencegah konflik dan mencatat kontribusi individu secara transparan.

```text
[Main Branch (Selalu Stabil)] 
       │
       ├───► Buat Branch Baru: feature/nama-fitur
       │           │
       │     Kerja & Commit (git add & git commit)
       │           │
       │     Push ke Remote (git push origin feature/...)
       │           │
       │     Buka Pull Request (PR) & Hubungkan ke Issue (Closes #X)
       │           │
       │     Code Review & Approval oleh Maintainer
       │           ▼
       └───► Merge Pull Request ke Main Branch (Squash and merge)
```

### 🚀 Alur Kerja Harian Developer (Step-by-Step)

#### 1. Sinkronisasi (WAJIB Sebelum Mulai Coding)
Selalu pastikan Anda memulai dari branch `main` versi terbaru:
```bash
git checkout main
git pull origin main
```

#### 2. Pindahkan Kartu Tugas di GitHub Projects
Buka tab **Projects** di repositori GitHub, lalu seret tugas Anda dari kolom **To Do** ke **In Progress**.

#### 3. Buat Feature Branch Baru
Buat dan berpindah ke branch fitur Anda:
```bash
# Contoh untuk Menu 2 (Al-Qur'an):
git checkout -b feature/halaman-quran

# Contoh untuk Menu 3 (Doa):
git checkout -b feature/halaman-doa

# Contoh untuk Menu 4 (Asmaul Husna):
git checkout -b feature/halaman-asmaul-husna
```

#### 4. Kerjakan Fitur & Simpan Perubahan (Commit)
Edit file halaman Anda sesuai spesifikasi. Simpan perubahan dengan pesan commit yang jelas:
```bash
git add .
git commit -m "feat: implement 114 surah list and audio murottal"
```

#### 5. Push ke GitHub
Unggah branch fitur Anda ke repositori GitHub:
```bash
git push -u origin feature/nama-fitur
```

#### 6. Buka Pull Request (PR)
1. Buka repositori di browser GitHub, klik tombol **Compare & pull request**.
2. Beri judul dan deskripsi PR yang informatif.
3. Tautkan ke nomor issue yang bersangkutan (contoh: ketik `Closes #2` agar issue otomatis tertutup saat PR di-merge).
4. Minta review kepada **Maintainer**.
5. Di GitHub Projects, pindahkan kartu tugas dari **In Progress** ke **In Review**.

---

### 🛡️ Alur Kerja Maintainer (Review & Merge)

1. Buka tab **Pull requests** di GitHub, pilih PR yang masuk.
2. Buka tab **Files changed** untuk memeriksa perubahan baris kode:
   * Pastikan developer hanya memodifikasi file halamannya sendiri.
   * Pastikan layout navbar dan footer tidak rusak.
3. Klik tombol **Review changes**:
   * Pilih **Comment / Request changes** jika memerlukan perbaikan.
   * Pilih **Approve** jika kode sudah sesuai standar.
4. Klik **Merge pull request** (disarankan memilih opsi **Squash and merge** agar riwayat commit di `main` tetap rapi).
5. Kartu tugas di GitHub Projects akan otomatis berpindah ke **Done**.

---

### ⚠️ Cara Menangani Merge Conflict (Jika Terjadi)

Jika GitHub menampilkan peringatan *"Can't automatically merge"*, developer dapat menyelesaikannya di komputer lokal:

1. Tarik pembaruan dari `main` ke branch fitur Anda:
   ```bash
   git checkout feature/nama-fitur
   git pull origin main
   ```
2. Git akan menandai baris yang bertabrakan dengan penanda `<<<<<<<`, `=======`, dan `>>>>>>>`.
3. Buka file yang berkonflik di text editor (VS Code), diskusikan dengan rekan tim, lalu rapikan kode yang benar.
4. Simpan file, lalu lakukan commit penyelesaian:
   ```bash
   git add .
   git commit -m "fix: resolve merge conflict with main"
   git push origin feature/nama-fitur
   ```
5. Pull Request di GitHub otomatis ter-update dan siap untuk di-merge.

---

## 💻 Panduan Menjalankan di Localhost (XAMPP Windows)

### 1. Letakkan Folder Project di `htdocs`
Pindahkan atau *clone* folder project ke dalam direktori XAMPP Windows:
```text
C:\xampp\htdocs\myquran-rest-client
```

*Lewat Git Bash / CMD:*
```bash
cd C:\xampp\htdocs
git clone https://github.com/bintangalsyahadat/myquran-rest-client.git
```

### 2. Jalankan Apache di XAMPP Control Panel
1. Buka aplikasi **XAMPP Control Panel**.
2. Pada baris **Apache**, klik tombol **Start** (pastikan berstatus hijau).
   *(Catatan: Modul MySQL tidak perlu dijalankan karena aplikasi ini murni mengonsumsi data dari REST API publik).*

### 3. Buka di Web Browser
Ketikkan alamat berikut di browser:
```text
http://localhost/myquran-rest-client
```

---

## 🛠️ Struktur Folder Project

```text
myquran-rest-client/
│
├── includes/
│   ├── header.php          # Topbar Navbar, Responsive Mobile Menu, CDN Tailwind, & Favicon
│   └── footer.php          # Footer platform & emblem Ka'bah konsisten
│
├── index.php               # Halaman Menu 1: Jadwal Sholat & Waktu Realtime (Maintainer)
├── quran.php               # Halaman Menu 2: Al-Qur'an 114 Surah & Murottal (Dev 1)
├── doa.php                 # Halaman Menu 3: Kumpulan Doa, Latin, & Pagination (Dev 2)
├── asmaul-husna.php        # Halaman Menu 4: 99 Asmaul Husna & Kalender Hijriah (Dev 3)
│
├── AGENTS.md               # Product Requirement Document (PRD) & Panduan AI Assistant
└── README.md               # Dokumentasi alur kerja Git & panduan instalasi
```

---

## 🤖 Catatan Pengembangan dengan AI Assistant (Vibe Coding)

Bagi anggota tim yang menggunakan AI Assistant (Cursor, GitHub Copilot, ChatGPT, dll.):
* Silakan gunakan panduan teknis yang telah disediakan di file **[AGENTS.md](AGENTS.md)**.
* Pastikan AI Assistant mempertahankan penggunaan JavaScript `fetch()` / AJAX agar fitur pencarian, filter, dan pagination berjalan mulus **tanpa reload halaman**.
