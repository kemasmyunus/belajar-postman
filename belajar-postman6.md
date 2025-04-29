# 23. Studi Kasus: Error Handling & Validasi Respons

## A. Cek Error 404: User Tidak Ditemukan

**URL**: `GET https://jsonplaceholder.typicode.com/users/9999`

Langkah:
- Kirim request dengan ID user yang tidak ada.

**Test Script**:
```javascript
pm.test("Harus dapat status 404 atau kosong", function () {
    pm.expect(pm.response.code).to.be.oneOf([404, 200]); // jsonplaceholder kadang tetap kasih 200 tapi kosong
    let data = pm.response.json();
    pm.expect(data).to.be.empty;
});
```

---

## B. Cek Error 400: Data Tidak Valid (Simulasi)

Karena `jsonplaceholder` tidak benar-benar validasi, kita **simulasikan**:

```json
{
  "name": "",
  "email": "tidak_valid"
}
```

Di test script kamu bisa buat:
```javascript
pm.test("Field name dan email seharusnya valid", function () {
    let jsonData = pm.request.body;
    pm.expect(jsonData).to.not.include("");
});
```

---

# 24. Simulasi Token Expired & Refresh Token

### A. Simulasi Token Expired

Buat Environment:
| Variable     | Value               |
|--------------|---------------------|
| auth_token   | expired_token_dummy |

Gunakan di Authorization tab → Bearer Token: `{{auth_token}}`

**Test Script** di response:
```javascript
pm.test("Cek apakah token expired", function () {
    let res = pm.response.json();
    pm.expect(res.message || "").to.include("expired");
});
```

---

### B. Refresh Token (Simulasi)

Jika response token expired, kamu bisa otomatis refresh token:

```javascript
if (pm.response.code === 401 && pm.response.json().message.includes("expired")) {
    // Simulasi refresh token
    pm.environment.set("auth_token", "new_dummy_token");
    console.log("Token expired. Token baru sudah diset.");
}
```

Di dunia nyata, kamu akan buat request baru ke endpoint seperti `/auth/refresh`.

---
