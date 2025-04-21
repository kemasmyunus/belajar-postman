# 14. Studi Kasus: API User Management

Bayangkan kamu sedang mengembangkan atau menguji API sederhana untuk manajemen pengguna (user). Berikut beberapa endpoint yang tersedia:

| Metode | URL                                      | Keterangan                  |
|--------|------------------------------------------|-----------------------------|
| GET    | `/users`                                 | Menampilkan semua user     |
| GET    | `/users/{id}`                            | Menampilkan user tertentu  |
| POST   | `/users`                                 | Menambahkan user baru      |
| PUT    | `/users/{id}`                            | Mengubah seluruh data user |
| PATCH  | `/users/{id}`                            | Mengubah sebagian data     |
| DELETE | `/users/{id}`                            | Menghapus user             |

Untuk latihan, kita bisa pakai API publik:
```
https://jsonplaceholder.typicode.com/users
```

---

## A. Menampilkan Semua User (GET)

**Langkah:**
1. Pilih metode **GET**.
2. URL: `https://jsonplaceholder.typicode.com/users`
3. Klik **Send**.

**Hasil**: Akan muncul daftar user dalam format JSON.

---

## B. Menambahkan User Baru (POST)

URL: `https://jsonplaceholder.typicode.com/users`

**Langkah:**
1. Metode: **POST**
2. Di tab Body → pilih `raw` → `JSON`
3. Isi JSON:
```json
{
  "name": "Pachan Panatto",
  "username": "pachanpanatto",
  "email": "pachan@example.com"
}
```
4. Klik **Send**

**Catatan**: API ini tidak benar-benar menyimpan data (karena dummy API), tapi kamu tetap akan mendapatkan respons dengan data yang dikirim dan ID baru.

---

## C. Mengedit Data User (PUT)

URL: `https://jsonplaceholder.typicode.com/users/1`

**Langkah:**
1. Metode: **PUT**
2. Isi Body dengan data baru:
```json
{
  "name": "Pachan Update",
  "username": "pachanupdated",
  "email": "updated@example.com"
}
```

**Perbedaan PUT vs PATCH**:  
- PUT menggantikan seluruh data.
- PATCH hanya mengubah sebagian.

---

## D. Menghapus User (DELETE)

URL: `https://jsonplaceholder.typicode.com/users/1`

**Langkah:**
1. Metode: **DELETE**
2. Klik **Send**

API ini tidak benar-benar menghapus data (hanya simulasi), tapi akan mengembalikan status 200 atau 204.

---

## E. Menambahkan Skrip Test Otomatis

Misalnya, kita ingin memastikan respons saat GET user memiliki status 200 dan field `username` tidak kosong:

```javascript
pm.test("Status harus 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Username tidak kosong", function () {
    let data = pm.response.json();
    pm.expect(data[0].username).to.not.be.empty;
});
```

---

## 15. Challenge

Coba buat **Collection baru** bernama `User API`.

Isi koleksi itu dengan request berikut:

- `GET /users` → tampilkan semua user
- `GET /users/1` → tampilkan user pertama
- `POST /users` → tambah user
- `PUT /users/1` → ubah data user
- `DELETE /users/1` → hapus user

Tambahkan:
- **Test Script** untuk semua request
- Gunakan **environment variable** bernama `base_url = https://jsonplaceholder.typicode.com`
- Simpan token atau header umum (jika ada) ke environment

---
