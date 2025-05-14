# 51. Implementasi JWT Authentication di Backend

## A. Install Library JWT

```bash
npm install jsonwebtoken
```

---

## B. Buat File `.env` (opsional tapi aman)

Install `dotenv`:

```bash
npm install dotenv
```

Lalu di root folder, buat `.env`:

```
JWT_SECRET=rahasia_super_aman
```

Dan di `index.js`:

```javascript
require("dotenv").config();
const JWT_SECRET = process.env.JWT_SECRET || "default_secret";
```

---

## C. Buat Route Login dengan JWT

Tambahkan di bawah endpoint lain:

```javascript
const jwt = require("jsonwebtoken");

// Dummy login (nanti bisa diganti cek ke DB)
app.post("/auth/login", (req, res) => {
    const { email, password } = req.body;
    if (email === "admin@example.com" && password === "123456") {
        const payload = { email, role: "admin" };
        const token = jwt.sign(payload, JWT_SECRET, { expiresIn: "15m" });
        const refreshToken = jwt.sign(payload, JWT_SECRET, { expiresIn: "1d" });

        return res.json({
            access_token: token,
            refresh_token: refreshToken
        });
    }

    res.status(401).json({ message: "Email/password salah" });
});
```

---

## D. Middleware Autentikasi JWT

Tambahkan fungsi ini:

```javascript
function authenticateJWT(req, res, next) {
    const authHeader = req.headers.authorization;
    if (!authHeader || !authHeader.startsWith("Bearer ")) {
        return res.status(401).json({ message: "Token tidak ditemukan" });
    }

    const token = authHeader.split(" ")[1];
    jwt.verify(token, JWT_SECRET, (err, user) => {
        if (err) return res.status(403).json({ message: "Token tidak valid atau expired" });
        req.user = user;
        next();
    });
}
```

---

## E. Endpoint Private Pakai Middleware

```javascript
app.get("/profile", authenticateJWT, (req, res) => {
    res.json({ message: "Halo, " + req.user.email, role: req.user.role });
});
```

---

## F. Endpoint Refresh Token

```javascript
app.post("/auth/refresh", (req, res) => {
    const { refresh_token } = req.body;
    if (!refresh_token) return res.status(400).json({ message: "Refresh token kosong" });

    try {
        const decoded = jwt.verify(refresh_token, JWT_SECRET);
        const newAccessToken = jwt.sign({ email: decoded.email, role: decoded.role }, JWT_SECRET, { expiresIn: "15m" });
        res.json({ access_token: newAccessToken });
    } catch {
        res.status(401).json({ message: "Refresh token tidak valid" });
    }
});
```

---
