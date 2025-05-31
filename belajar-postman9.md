# 34. Test Otomatis Multi-Response: Branching Logic

Dalam skenario nyata, satu endpoint bisa menghasilkan **beragam jenis respons**, tergantung situasi:

* `200 OK` – Berhasil
* `401 Unauthorized` – Token salah atau kedaluwarsa
* `403 Forbidden` – Akses ditolak
* `500 Internal Server Error` – Error dari server

Untuk mengujinya dalam **satu skrip**, gunakan percabangan seperti berikut:

```javascript
const code = pm.response.code;

if (code === 200) {
    pm.test("✅ Sukses ambil data", function () {
        const data = pm.response.json();
        pm.expect(data).to.have.property("name");
    });
} else if (code === 401) {
    pm.test("⚠️ Token tidak valid / expired", function () {
        const res = pm.response.json();
        pm.expect(res.message || "").to.include("expired");
    });
} else if (code === 403) {
    pm.test("⛔ Akses ditolak", function () {
        pm.response.to.have.status(403);
    });
} else {
    pm.test("🚨 Tidak boleh error server", function () {
        pm.expect(code).to.not.eql(500);
    });
}
```

---
