Berikut adalah versi baru dari panduan Postman dalam format Markdown tanpa emotikon dan dengan bahasa yang lebih sederhana agar mudah dipahami:

---

# Panduan Dasar Postman

## Apa Itu Postman?

Postman adalah aplikasi yang digunakan untuk menguji API (Application Programming Interface). Dengan Postman, kamu bisa mengirim permintaan (request) ke server dan melihat jawaban (response) dari server tersebut. Ini sangat berguna bagi programmer backend, frontend, dan juga tester untuk memahami dan menguji API tanpa menulis kode terlebih dahulu.

---

## Mengapa Menggunakan Postman?

- Antarmuka mudah digunakan, cocok untuk pemula.
- Mendukung berbagai metode HTTP seperti GET, POST, PUT, DELETE, dan lainnya.
- Bisa menyimpan dan mengatur request agar rapi dan terorganisir.
- Mendukung penggunaan variabel untuk lingkungan yang berbeda (seperti development atau production).
- Bisa menjalankan skrip otomatis untuk pengujian.
- Dapat digunakan untuk kerja tim secara kolaboratif.

---

## Cara Menggunakan Postman

### 1. Menginstal Postman

1. Kunjungi situs: [https://www.postman.com/downloads/](https://www.postman.com/downloads/)
2. Pilih sistem operasi (Windows, macOS, atau Linux).
3. Unduh dan pasang aplikasinya.

---

### 2. Mengirim Request API

1. Klik tombol "New" lalu pilih "Request".
2. Pilih metode HTTP seperti GET atau POST.
3. Masukkan URL API yang ingin diuji.
4. Tambahkan jika perlu:
   - Params: data tambahan di URL seperti `?id=123`
   - Headers: seperti `Authorization`, `Content-Type`
   - Body: untuk POST atau PUT, biasanya dalam format JSON
5. Klik "Send".
6. Lihat respons yang muncul di bagian bawah.

---

### 3. Mengatur Headers, Params, dan Body

- **Headers**: Informasi tambahan untuk server.
  - Contoh: 
    - `Authorization: Bearer <token>`
    - `Content-Type: application/json`

- **Params (Query Parameters)**: Data di URL.
  - Contoh: `https://api.example.com/users?id=5`

- **Body**: Isi data yang dikirim, biasanya untuk POST, PUT, PATCH.
  - Pilih tab "Body" lalu format `raw` dan tipe `JSON`.

Contoh:
```json
{
  "username": "pachanpanatto",
  "email": "user@example.com"
}
```

---

### 4. Menggunakan Environment Variable

1. Klik ikon roda gigi lalu pilih "Manage Environments".
2. Buat environment baru dan tambahkan variabel.
   - Contoh: `base_url = https://api.example.com`
3. Gunakan di URL seperti ini: `{{base_url}}/users`

---

### 5. Menambahkan Skrip Otomatis

Postman mendukung skrip menggunakan JavaScript:

- **Pre-request Script**: dijalankan sebelum request dikirim.
- **Test Script**: dijalankan setelah mendapat respons.

Contoh test status:
```javascript
pm.test("Status code harus 200", function () {
    pm.response.to.have.status(200);
});
```

Contoh test isi body:
```javascript
pm.test("Username sesuai", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.username).to.eql("pachanpanatto");
});
```

---
