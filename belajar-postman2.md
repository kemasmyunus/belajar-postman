## 7. Collection Runner

**Collection Runner** digunakan untuk menjalankan banyak request sekaligus secara otomatis. Cocok untuk mengetes semua endpoint API atau skenario tertentu.

### Cara Menggunakan:

1. Buka salah satu **Collection**.
2. Klik tombol **Runner** di kanan atas.
3. Pilih request yang ingin dijalankan.
4. Masukkan variabel jika diperlukan (misalnya file data).
5. Klik **Run**.

Kamu bisa mengatur berapa kali request dijalankan (loop) dan bisa juga menjalankan dengan data dari file `.csv` atau `.json`.

---

## 8. Monitor API secara Berkala

**Monitors** adalah fitur untuk menjalankan koleksi secara otomatis pada jadwal tertentu (seperti setiap jam, setiap hari, dll).

### Contoh Penggunaan:
- Memastikan API selalu hidup.
- Memantau performa API (lama respon, error, dsb).

### Cara Membuat Monitor:
1. Klik tab **Monitor** di Postman.
2. Pilih koleksi yang ingin dimonitor.
3. Atur jadwal dan environment.
4. Hasilnya bisa dikirim ke email atau dashboard.

---

## 9. Postman Console

Seperti "Console" di browser, Postman juga punya **Postman Console**.

### Fungsinya:
- Melihat detail dari request dan response.
- Debugging ketika ada yang tidak sesuai.
- Menampilkan hasil dari skrip yang kamu tulis (pakai `console.log()`).

### Cara Mengakses:
- Klik menu **View > Show Postman Console** atau tekan shortcut `Ctrl + Alt + C`.

---

## 10. Mengimpor API dari File/OpenAPI

Jika kamu punya file dokumentasi API dalam format seperti **OpenAPI**, **Swagger**, atau **Postman Collection**, kamu bisa langsung mengimpornya.

### Caranya:
1. Klik tombol **Import**.
2. Pilih file `.json`, `.yaml`, atau dari URL.
3. Postman akan membuatkan koleksi secara otomatis.

Ini sangat membantu untuk menghemat waktu karena tidak perlu menulis request satu per satu.

---
