## Pendahuluan

Halo semua, khususnya mahasiswa PPWeb 152 Stikom Surabaya.

Selamat datang di *source code* contoh, sekaligus menjadi __materi UTS__ kita nanti. *Source code* / materi ini berisi contoh *action* __Create, Read, Update, Delete__ untuk entitas __Categories__ dan __Products__ saja.

Berikutnya akan saya tuliskan 3 hal berikut:

- Instalasi Source Code 
- Tentang UTS
    - Jadwal UTS
    - Penilaian UTS
- Live Demo 

## Instalasi Source Code

1. Klik tombol <code>Download .zip</code> besar di atas.
2. Extract file zip tersebut.
3. Buka <code>Command Line</code> atau <code>Git Bash</code> dari dalam folder hasil extract tadi.
4. Jalankan perintah <code>composer install</code>, tunggu sampai selesai.
5. Jalankan perintah <code>mv .env.example .env</code>, pastikan sekarang terdapat file <code>.env</code> di root aplikasi.
6. Jalankan perintah <code>php artisan key:generate</code>, pastikan sekarang di dalam file <code>.env</code> bagian <code>APP_KEY</code>. terisi angka/huruf random.
7. Di dalam file <code>.env</code>, ubah isian bagian <code>DB_DATABASE</code>, <code>DB_USERNAME</code>, dan <code>DB_PASSWORD</code> sesuai dengan keadaan sistem Anda.
8. Jalankan perintah <code>php artisan config:cache</code>, pastikan berjalan sukses.
9. Terakhir, jalankan perintah <code>php artisan serve</code> untuk menjalankan *web server* bawaan Laravel
10. Buka *web browser* favorit Anda, arahkan ke alamat: <code>http://localhost:8000</code>

## Tentang UTS

Secara singkat, UTS kita nanti adalah membuat __Create, Read, Update, Delete__ untuk entitas:

1. Customers
2. Employees
3. Shippers
4. Suppliers

Untuk entitas __Orders__ dan __Order Details__ kerjakan HANYA __Read__ (index dan show) saja.

### Jadwal UTS

Berikut adalah jadwal UTS kita.

Kelas | Hari / Tanggal | Jam | Ruang
--- | --- | --- | ---
P1 | Kamis / 21-Apr-2016 | 08:00 - 10:00 | *akan dikonfirmasi*
Q1 | Kamis / 21-Apr-2016 | 10:00 - 12:00 | *akan dikonfirmasi*
R1 | Kamis / 21-Apr-2016 | 13:00 - 15:00 | *akan dikonfirmasi*

Catatan:

1. Perhatikan kelas Anda. Jangan sampai salah jadwal!
2. Jika jadwal *crash* dengan yang lain, segera beritahu saya untuk penggantian jadwal

### Penilaian UTS

Berikut adalah daftar cara penilaian UTS ini.

No. | Entitas | Komponen Nilai | Nilai
--- | --- | --- | ---
1. | Customers | Create / Add New | 5 
2. |           | Read (index dan show) | 5
3. |           | Update / Edit | 5
4. |           | Delete (+ confirmation) | 5 
5. | Employees | Create / Add New | 5 
6. |           | Read (index dan show) | 5
7. |           | Update / Edit | 5
8. |           | Delete (+ confirmation) | 5 
9. | Shippers  | Create / Add New | 5 
10. |           | Read (index saja) | 5
11. |           | Update / Edit | 5
12. |           | Delete (+ confirmation) | 5 
13. | Suppliers | Create / Add New | 5 
14. |           | Read (index dan show) | 5
15. |           | Update / Edit | 5
16. |           | Delete (+ confirmation) | 5 
17. | Tampilan rapi & bagus |           | 10
18. | Tidak ada *error / bug* |           | 10
    |           | __TOTAL NILAI__ | 100

## Live Demo

Anda bisa melihat *live demo* dari *source code* ini di: *[under construction]*

Sementara *live demo* sedang diperbaiki, berikut adalah *screenshots* penampakan jika *source code* ini berhasil Anda install: http://1drv.ms/1NnHKal