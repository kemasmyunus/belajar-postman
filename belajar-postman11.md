# 45. Membuat Backend API Sederhana (Node.js + Express)

### A. Persiapan Proyek

1. Install [Node.js](https://nodejs.org/) jika belum
2. Inisialisasi proyek:

```bash
mkdir simple-api
cd simple-api
npm init -y
npm install express body-parser cors
```

---

### B. Buat File `index.js`

```javascript
const express = require("express");
const app = express();
const PORT = 3000;

app.use(express.json());
app.use(require("cors")());

let users = []; // Simulasi database sementara

// GET all users
app.get("/users", (req, res) => {
    res.json(users);
});

// GET user by ID
app.get("/users/:id", (req, res) => {
    const user = users.find(u => u.id === Number(req.params.id));
    if (!user) return res.status(404).json({ message: "User not found" });
    res.json(user);
});

// POST create user
app.post("/users", (req, res) => {
    const { name, email } = req.body;
    if (!name || !email) return res.status(400).json({ message: "Invalid data" });
    const newUser = { id: Date.now(), name, email };
    users.push(newUser);
    res.status(201).json(newUser);
});

// PUT update user
app.put("/users/:id", (req, res) => {
    const user = users.find(u => u.id === Number(req.params.id));
    if (!user) return res.status(404).json({ message: "User not found" });
    const { name, email } = req.body;
    if (name) user.name = name;
    if (email) user.email = email;
    res.json(user);
});

// DELETE user
app.delete("/users/:id", (req, res) => {
    const index = users.findIndex(u => u.id === Number(req.params.id));
    if (index === -1) return res.status(404).json({ message: "User not found" });
    users.splice(index, 1);
    res.status(200).json({ message: "User deleted" });
});

app.listen(PORT, () => console.log(`API running on http://localhost:${PORT}`));
```

---

### C. Jalankan API Lokal

```bash
node index.js
```

API sekarang aktif di `http://localhost:3000`

---

### D. Uji dengan Postman

Buat collection `User CRUD`:

* **GET /users** → lihat semua user
* **POST /users** → tambahkan user
* **GET /users/\:id** → cek user
* **PUT /users/\:id** → update user
* **DELETE /users/\:id** → hapus user

---
