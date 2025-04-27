# 17. Tips Tambahan untuk Praktik API

Berikut beberapa tips tambahan supaya kamu makin lancar:

### 1. Gunakan Fitur "Pre-request Script"
Sebelum mengirim request, kamu bisa jalankan skrip. Misal, generate token otomatis atau set timestamp:

```javascript
pm.environment.set("current_time", new Date().toISOString());
```

### 2. Dynamic Variables di Body
Kamu bisa pakai environment variable langsung di body atau URL, misalnya:

```json
{
  "name": "{{user_name}}",
  "email": "{{user_email}}"
}
```
Ini membuat request kamu lebih fleksibel dan gampang diubah-ubah.

### 3. Test Lebih Lengkap
Selain cek status, kamu bisa juga cek struktur respons:

```javascript
pm.test("Respons punya field name", function () {
    let jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('name');
});
```

### 4. Gunakan Folder dan Subfolder
Kalau proyek API-mu sudah banyak, pakai folder/subfolder di Collection Postman supaya rapi, contohnya:

```
User Management
 ├── Get All Users
 ├── Create User
 ├── Update User
 └── Delete User
```

### 5. Dokumentasi Otomatis
Postman bisa otomatis membuat dokumentasi dari Collection kamu. Pilih tab **View Documentation**, lalu lengkapi deskripsi tiap request.

---
