# 27. Tips Debugging & Best Practice di Postman

### A. Gunakan Console Postman

Postman menyediakan **Console** (di bawah, icon `>` atau `View > Show Postman Console`) untuk melihat:

* Detail request/response
* Error parsing JSON
* Nilai environment variable saat runtime

**Contoh** debugging:

```javascript
console.log("Token saat ini:", pm.environment.get("auth_token"));
```

---

### B. Selalu Gunakan Environment & Variable

Manfaat:

* Mudah ganti base URL (`{{base_url}}`)
* Token dinamis (`{{auth_token}}`)
* Bisa buat beberapa environment: `dev`, `staging`, `prod`

**Tips**:

* Prefix nama variable (contoh: `dev_auth_token`)
* Simpan secrets/token di environment, bukan langsung di collection

---

### C. Struktur Folder & Collection

Agar rapi dan scalable:

```
📁 API Testing Project
│
├── 📁 Auth
│   ├── Login
│   └── Refresh Token
│
├── 📁 Users
│   ├── GET All Users
│   ├── GET User by ID
│   └── POST New User
│
└── 📁 Error Testing
    ├── 404 Test
    └── Token Expired
```

---

### D. Gunakan Test & Pre-request Script

**Pre-request Script** → logic sebelum request dijalankan
Contoh: generate timestamp, token, ID random

```javascript
pm.environment.set("timestamp", new Date().toISOString());
```

**Test Script** → validasi setelah response
Contoh: validasi status code, isi body, headers

```javascript
pm.test("Status code harus 200", function () {
    pm.response.to.have.status(200);
});
```

---
