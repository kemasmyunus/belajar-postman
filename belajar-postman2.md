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

## 11. Mock Server

**Mock Server** memungkinkan kamu membuat simulasi API tanpa backend asli. Ini berguna jika tim frontend ingin mulai kerja meski backend belum selesai.

### Cara Membuat:
1. Klik **New** → **Mock Server**.
2. Pilih koleksi request yang ingin dimock.
3. Tentukan respons yang ingin diberikan.
4. Mock server akan punya URL sendiri.

---

## 12. Best Practices (Praktik Terbaik)

Berikut beberapa tips supaya penggunaan Postman makin rapi dan efisien:

- Gunakan **Collections** untuk mengelompokkan API berdasarkan fitur.
- Gunakan **Environment Variables** agar mudah berpindah antara dev/staging/production.
- Simpan **token login** ke variabel agar tidak diketik ulang.
- Tambahkan **Test Script** untuk setiap request, meskipun sederhana (misalnya cek status 200).
- Beri nama request dan folder secara jelas, misalnya `GET - List Users`, `POST - Create User`, dll.
- Gunakan **description** untuk menjelaskan tujuan request.

---

## 13. Praktik Simulasi

### Simulasi 1: GET Request ke API Publik

URL: `https://jsonplaceholder.typicode.com/posts/1`

Langkah:
1. Pilih metode **GET**.
2. Masukkan URL di atas.
3. Klik **Send**.
4. Lihat respons JSON berisi data post.

### Simulasi 2: POST Request

URL: `https://jsonplaceholder.typicode.com/posts`

Body:
```json
{
  "title": "Belajar Postman",
  "body": "Ini adalah percobaan POST",
  "userId": 1
}
```

Langkah:
1. Pilih metode **POST**.
2. Masukkan URL.
3. Di tab Body → pilih `raw` → `JSON`.
4. Tempelkan isi body di atas.
5. Klik **Send**.
6. Lihat respons, seharusnya ada data baru dengan `id`.

---
