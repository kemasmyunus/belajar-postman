# 20. Studi Kasus Lanjutan: Simulasi Proyek API Sungguhan

Bayangkan kamu dipekerjakan di sebuah tim pengembang untuk mengelola API **User Management**. Berikut standar kerja yang biasanya dipakai:

---

## A. Flow Kerja Sederhana

1. **Buat Environment di Postman**  
   Nama: `UserManagementEnvironment`
   
   Variable:
   | Nama       | Nilai                                          |
   |------------|-------------------------------------------------|
   | base_url   | `https://jsonplaceholder.typicode.com`          |
   | user_id    | _(nanti diisi otomatis setelah POST user)_      |

2. **Rancang Urutan Request**:
   - `POST /users` → Tambah user baru
   - `GET /users/{{user_id}}` → Ambil user baru
   - `PUT /users/{{user_id}}` → Update user tersebut
   - `DELETE /users/{{user_id}}` → Hapus user tersebut

---

## B. Script yang Lebih Dinamis

### 1. Simpan ID user baru setelah POST
Di `Tests` tab request **POST /users**, tambahkan:

```javascript
let jsonData = pm.response.json();
pm.environment.set("user_id", jsonData.id);
```

Ini akan **otomatis menyimpan** ID ke environment supaya bisa dipakai di request berikutnya.

---

### 2. Validasi Respons untuk Setiap Request

Misalnya untuk **GET /users/{{user_id}}**, di `Tests`:

```javascript
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Data user sesuai", function () {
    let data = pm.response.json();
    pm.expect(data).to.have.property('id', parseInt(pm.environment.get("user_id")));
});
```

---

### 3. Setup Authorization (Opsional)

Kalau API butuh token, di tab **Authorization** kamu tinggal pilih:
- **Type**: Bearer Token
- **Token**: `{{auth_token}}`

Lalu buat variable `auth_token` di Environment.

Kalau belum butuh token, bagian ini bisa dilewati.

---

## C. Menyusun Collection Lebih Advance

**Struktur yang rapi**:

```
User Management
 ├── 01 - Create New User
 ├── 02 - Get Created User
 ├── 03 - Update User
 ├── 04 - Delete User
```

Setiap request disusun **berurutan** sesuai flow real project.

---

# 21. Bonus: Membuat Collection Test Runner

Kalau mau tes semua sekaligus:

1. Klik **Runner** di Postman.
2. Pilih Collection kamu (`User API`).
3. Pilih Environment (`UserManagementEnvironment`).
4. Klik **Run**.

Hasilnya: Semua request jalan **otomatis berurutan** dan semua test dievaluasi!

---

# 22. Rangkuman Skill yang Kamu Kuasai

✅ **Setup environment & dynamic variable**  
✅ **Automated testing per request**  
✅ **Simpan & gunakan data antar request (chaining)**  
✅ **Batch testing pakai Collection Runner**  
✅ **Struktur Collection rapi ala profesional**  

---
