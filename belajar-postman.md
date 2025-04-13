# 📌 Panduan Dasar Postman

## 🔹 Apa Itu Postman?
**Postman** adalah alat bantu (tool) untuk menguji API (Application Programming Interface). Dengan Postman, kamu dapat mengirim berbagai jenis permintaan ke server dan melihat responsnya, tanpa harus menulis kode program terlebih dahulu. Cocok untuk pengembang backend, frontend, maupun penguji (tester).

---

## 🔹 Mengapa Menggunakan Postman?
- ✅ **Antarmuka yang mudah digunakan** – Cocok untuk pemula maupun profesional.
- 🔁 **Mendukung berbagai metode HTTP** – Seperti GET, POST, PUT, PATCH, DELETE.
- 📁 **Menyimpan dan mengelola request** – Bisa membuat struktur koleksi API untuk proyek.
- 🌐 **Environment Variables** – Bisa pakai variabel untuk berpindah antar lingkungan (dev, staging, production).
- 🤖 **Otomasi dan Skrip Pengujian** – Gunakan JavaScript untuk validasi otomatis hasil respons API.
- 👥 **Kolaborasi Tim** – Mudah berbagi koleksi API dengan tim lewat fitur workspace dan export/import.

---

## 🔹 Cara Menggunakan Postman

### 1️⃣ Menginstal Postman
1. Buka [https://www.postman.com/downloads/](https://www.postman.com/downloads/)
2. Pilih sesuai sistem operasi: **Windows**, **macOS**, atau **Linux**.
3. Instal dan buka aplikasi Postman.

---

### 2️⃣ Menjalankan Request API
1. Klik tombol **"New"** → **Request**.
2. Pilih metode HTTP: `GET`, `POST`, `PUT`, `DELETE`, dll.
3. Masukkan URL API yang ingin diuji.
4. Tambahkan:
   - **Headers**: Misalnya `Content-Type`, `Authorization`, dsb.
   - **Params**: Untuk parameter query seperti `?id=123`.
   - **Body**: Untuk data JSON atau form (khusus POST/PUT/PATCH).
5. Klik **"Send"** untuk mengirim request.
6. Lihat respons di bagian bawah, lengkap dengan status, waktu, dan data.

---

### 3️⃣ Menambahkan Headers, Params, dan Body
- **Headers**: Informasi tambahan, contoh:
  - `Authorization: Bearer <token>`
  - `Content-Type: application/json`
- **Params (Query Parameters)**:
  - Tambahkan di tab *Params* → key-value akan otomatis muncul di URL.
  - Contoh: `GET https://api.example.com/users?id=5`
- **Body**: Diisi untuk `POST`, `PUT`, atau `PATCH` request.
  - Pilih format: `raw` → `JSON`, `form-data`, `x-www-form-urlencoded`.

Contoh isi body JSON:
```json
{
  "username": "pachanpanatto",
  "email": "user@example.com"
}
```

---

### 4️⃣ Menggunakan Environment Variables
Gunakan environment untuk menyimpan nilai yang dapat digunakan ulang:
1. Klik ⚙️ **"Manage Environments"**.
2. Buat environment baru → isi nama dan variabel:
   - Misalnya: `base_url = https://api.example.com`
3. Dalam request, gunakan dengan kurung kurawal ganda:
   - `{{base_url}}/users`

---

### 5️⃣ Otomasi dengan Skrip
Postman menyediakan dua jenis skrip menggunakan JavaScript:
- **Pre-request Script** – Dijalankan sebelum request dikirim.
- **Test Script** – Dijalankan setelah menerima respons.

Contoh skrip test untuk cek status code:
```javascript
pm.test("Status code harus 200", function () {
    pm.response.to.have.status(200);
});
```

Contoh cek isi body JSON:
```javascript
pm.test("Username sesuai", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.username).to.eql("pachanpanatto");
});
```

---

### 6️⃣ Menyimpan & Membagikan Koleksi API
- Klik **Save** untuk menyimpan request ke dalam **Collections**.
- Buat struktur folder untuk mengatur API berdasarkan fitur/module.
- Gunakan fitur **Export/Import** untuk membagikan koleksi ke tim.
- Atau, gunakan **Postman Workspace** untuk kolaborasi langsung.

---

## 🔹 Mengenal Respons API

### ⚙️ Struktur Respons Umum
Respons biasanya berbentuk JSON:
```json
{
  "status": "success",
  "data": {
    "id": 1,
    "name": "Example"
  }
}
```

### 🧾 Status Code HTTP Umum
| Kode | Arti                     |
|------|--------------------------|
| 200  | OK – Request berhasil    |
| 201  | Created – Data berhasil dibuat |
| 400  | Bad Request – Ada kesalahan input |
| 401  | Unauthorized – Butuh autentikasi |
| 403  | Forbidden – Tidak diizinkan |
| 404  | Not Found – Resource tidak ditemukan |
| 500  | Internal Server Error – Masalah di server |

---

## 🔹 Tips Tambahan
- 🧪 Gunakan **Collection Runner** untuk menguji banyak request sekaligus.
- 🔑 Simpan token login menggunakan **variable global/environment**.
- 📚 Dokumentasi API bisa di-*import* dari file OpenAPI/Swagger.
- 🧠 Tambahkan **assertions** di test script untuk memastikan API sesuai ekspektasi.

---

## 🔹 Kesimpulan
Postman sangat powerful untuk menguji dan memahami cara kerja API. Baik untuk pemula maupun profesional, Postman menawarkan fitur lengkap mulai dari pengujian manual, otomatisasi, hingga kolaborasi tim.
