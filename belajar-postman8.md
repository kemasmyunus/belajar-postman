# 30. Studi Kasus: Testing CRUD Lengkap (Users)

Simulasi pengujian API lengkap **Create → Read → Update → Delete (CRUD)** menggunakan mock API `jsonplaceholder.typicode.com` atau mock server buatan sendiri.

---

## A. POST - Create User

**Endpoint**: `POST https://jsonplaceholder.typicode.com/users`

**Body (JSON)**:

```json
{
  "name": "Pachan User",
  "email": "pachan@example.com"
}
```

**Test Script**:

```javascript
pm.test("Harus berhasil membuat user", function () {
    pm.response.to.have.status(201);
    let data = pm.response.json();
    pm.expect(data).to.have.property("id");
    pm.environment.set("new_user_id", data.id);
});
```

---

## B. GET - Read User

**Endpoint**:
`GET https://jsonplaceholder.typicode.com/users/{{new_user_id}}`

**Test Script**:

```javascript
pm.test("Data user harus valid", function () {
    pm.response.to.have.status(200);
    let data = pm.response.json();
    pm.expect(data).to.have.property("id");
    pm.expect(data).to.have.property("name");
});
```

---

## C. PUT - Update User

**Endpoint**:
`PUT https://jsonplaceholder.typicode.com/users/{{new_user_id}}`

**Body (JSON)**:

```json
{
  "name": "Pachan Updated",
  "email": "updated@example.com"
}
```

**Test Script**:

```javascript
pm.test("User harus berhasil diupdate", function () {
    pm.response.to.have.status(200);
    let data = pm.response.json();
    pm.expect(data.name).to.eql("Pachan Updated");
});
```

---

## D. DELETE - Delete User

**Endpoint**:
`DELETE https://jsonplaceholder.typicode.com/users/{{new_user_id}}`

**Test Script**:

```javascript
pm.test("User harus berhasil dihapus", function () {
    pm.response.to.have.status(200);
});
```

---

# 31. Simulasi Chaining: CRUD Otomatis

Gabungkan semua request CRUD di satu Collection:

1. **POST** (buat user, simpan ID)
2. **GET** (cek data user dengan ID tadi)
3. **PUT** (update user)
4. **DELETE** (hapus user)

Gunakan `Test Script` dan `pm.environment.set()` untuk menyimpan ID antar-request.

---

# 32. Penggunaan Dynamic Data (Faker.js)

Di **Pre-request Script**, kamu bisa generate data acak:

```javascript
const faker = require('faker');

pm.environment.set("random_name", faker.name.findName());
pm.environment.set("random_email", faker.internet.email());
```

Gunakan di body JSON:

```json
{
  "name": "{{random_name}}",
  "email": "{{random_email}}"
}
```

Catatan: Postman versi terbaru menggunakan [Postman Sandbox](https://learning.postman.com/docs/writing-scripts/script-references/postman-sandbox-api-reference/) — `faker` bisa diganti dengan `pm.variables.replaceIn()` atau langsung pakai [dynamic variables](https://learning.postman.com/docs/writing-scripts/intro-to-scripts/#dynamic-variables).

---

# 33. Latihan Mandiri (Challenge)

Buat skenario pengujian seperti berikut:

1. Login → Ambil token
2. Gunakan token untuk akses endpoint `GET /profile`
3. Jika gagal (401), lakukan refresh token
4. Tambahkan validasi response `profile.name === "Pachanpanatto"`

---
