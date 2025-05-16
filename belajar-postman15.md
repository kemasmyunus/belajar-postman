# 57. Menambahkan Swagger di API Node.js

## A. Install Swagger

```bash
npm install swagger-ui-express swagger-jsdoc
```

---

## B. Setup Swagger di `index.js`

Tambahkan di atas router/endpoint kamu:

```javascript
const swaggerUi = require('swagger-ui-express');
const swaggerJsdoc = require('swagger-jsdoc');

const swaggerOptions = {
  definition: {
    openapi: '3.0.0',
    info: {
      title: 'Pachan API',
      version: '1.0.0',
      description: 'Dokumentasi API sederhana dengan Swagger',
    },
    servers: [
      {
        url: 'http://localhost:3000', // Ganti ke URL deploy kamu nanti
      },
    ],
  },
  apis: ['./index.js'], // bisa file lain juga
};

const swaggerSpec = swaggerJsdoc(swaggerOptions);
app.use('/api-docs', swaggerUi.serve, swaggerUi.setup(swaggerSpec));
```

---

## C. Tambahkan Komentar Swagger di Atas Route

Contoh:

```javascript
/**
 * @swagger
 * /users:
 *   get:
 *     summary: Mendapatkan semua user
 *     responses:
 *       200:
 *         description: Daftar user
 */
app.get("/users", async (req, res) => {
  const users = await User.find();
  res.json(users);
});

/**
 * @swagger
 * /users:
 *   post:
 *     summary: Membuat user baru
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             required:
 *               - name
 *               - email
 *             properties:
 *               name:
 *                 type: string
 *               email:
 *                 type: string
 *     responses:
 *       201:
 *         description: User berhasil dibuat
 */
app.post("/users", async (req, res) => {
  const { name, email } = req.body;
  if (!name || !email)
    return res.status(400).json({ message: "Invalid data" });
  const newUser = new User({ name, email });
  await newUser.save();
  res.status(201).json(newUser);
});
```

Lanjutkan menambahkan komentar di semua route penting: login, refresh token, get by ID, update, delete, dll.

---

## D. Jalankan dan Akses Swagger UI

```bash
node index.js
```

Buka di browser:

```
http://localhost:3000/api-docs
```

✅ Kamu akan melihat GUI Swagger interaktif untuk coba semua endpoint!

---

## E. Jika Sudah Online (Contoh Render)

Ganti `url` di `servers`:

```js
servers: [
  {
    url: 'https://simple-api-pachan.onrender.com',
  },
],
```

Lalu akses:

```
https://simple-api-pachan.onrender.com/api-docs
```

---


# 58. Hasil yang Kamu Capai Sekarang 💪

✅ API dengan database MongoDB
✅ Otentikasi JWT (secure & refresh token)
✅ Testing manual via Postman
✅ Dokumentasi API otomatis via Swagger
✅ Online dan bisa diakses dari mana saja

---
