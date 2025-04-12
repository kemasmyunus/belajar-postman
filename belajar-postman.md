# 📌 Panduan Dasar Postman

## 🔹 Apa Itu Postman?
**Postman** adalah alat bantu (tool) untuk menguji *API* (Application Programming Interface). Dengan Postman, kita bisa mengirim berbagai jenis permintaan (*request*) ke server dan melihat responsnya tanpa harus menulis kode program terlebih dahulu.

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
