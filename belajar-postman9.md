# 34. Test Otomatis Multi-Response: Branching Logic

Dalam dunia nyata, satu endpoint bisa punya **berbagai kemungkinan respons**, misalnya:

* 200 OK (berhasil)
* 401 Unauthorized (token salah/expired)
* 403 Forbidden (akses ditolak)
* 500 Server Error

Kita bisa uji semua dalam satu test:

```javascript
const code = pm.response.code;

if (code === 200) {
    pm.test("Sukses ambil data", function () {
        let data = pm.response.json();
        pm.expect(data).to.have.property("name");
    });
} else if (code === 401) {
    pm.test("Token tidak valid / expired", function () {
        let res = pm.response.json();
        pm.expect(res.message || "").to.include("expired");
    });
} else if (code === 403) {
    pm.test("Akses ditolak", function () {
        pm.response.to.have.status(403);
    });
} else {
    pm.test("Harusnya tidak error server", function () {
        pm.expect(code).to.not.eql(500);
    });
}
```

---

# 35. Validasi Header dan Waktu Respons

### A. Validasi Header:

```javascript
pm.test("Cek Content-Type JSON", function () {
    pm.response.to.have.header("Content-Type");
    pm.expect(pm.response.headers.get("Content-Type")).to.include("application/json");
});
```

### B. Validasi waktu respons:

```javascript
pm.test("Response time < 1000ms", function () {
    pm.expect(pm.response.responseTime).to.be.below(1000);
});
```

---

---
