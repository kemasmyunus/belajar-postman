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

# 35. Validasi Header & Waktu Respons

### A. Validasi Header

Pastikan respons API memiliki header `Content-Type: application/json`.

```javascript
pm.test("Cek Content-Type adalah JSON", function () {
    pm.response.to.have.header("Content-Type");
    pm.expect(pm.response.headers.get("Content-Type")).to.include("application/json");
});
```

### B. Validasi Waktu Respons

Uji apakah respons diterima di bawah 1000ms:

```javascript
pm.test("Waktu respons di bawah 1000ms", function () {
    pm.expect(pm.response.responseTime).to.be.below(1000);
});
```

---
