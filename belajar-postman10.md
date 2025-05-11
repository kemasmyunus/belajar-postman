# 40. Studi Kasus: Autentikasi JWT – Alur Lengkap

Simulasi alur login, akses data dengan token, dan refresh token.

### A. Login → Simpan Token

**Endpoint**: `POST /auth/login`
**Body**:

```json
{
  "email": "pachan@example.com",
  "password": "rahasia123"
}
```

**Test Script**:

```javascript
let res = pm.response.json();
pm.test("Login berhasil", function () {
    pm.response.to.have.status(200);
    pm.expect(res).to.have.property("access_token");
    pm.expect(res).to.have.property("refresh_token");
});

pm.environment.set("access_token", res.access_token);
pm.environment.set("refresh_token", res.refresh_token);
```

---

### B. Akses Endpoint Butuh Token

**GET /profile**
Gunakan Authorization → Bearer Token → `{{access_token}}`

**Test Script**:

```javascript
pm.test("Profile bisa diakses", function () {
    pm.response.to.have.status(200);
    let data = pm.response.json();
    pm.expect(data).to.have.property("name");
});
```

---

### C. Refresh Token Jika Token Expired

Jika access token invalid (expired), jalankan:
**POST /auth/refresh**

**Body**:

```json
{
  "refresh_token": "{{refresh_token}}"
}
```

**Test Script**:

```javascript
let newToken = pm.response.json().access_token;
pm.environment.set("access_token", newToken);
console.log("Token diperbarui.");
```

Kamu bisa integrasikan alur ini via script kondisional:

```javascript
if (pm.response.code === 401 && pm.response.json().message.includes("expired")) {
    // Trigger refresh token
    postman.setNextRequest("Refresh Token");
}
```

---

# 41. Test Bersyarat: `postman.setNextRequest()`

Kamu bisa **atur flow testing otomatis**, contohnya:

```
[Login] → [GET Profile] → [If expired → Refresh] → [Retry Profile]
```

Gunakan:

```javascript
postman.setNextRequest("Nama Request Berikutnya");
```

Jika ingin **akhiri flow**:

```javascript
postman.setNextRequest(null);
```

---
