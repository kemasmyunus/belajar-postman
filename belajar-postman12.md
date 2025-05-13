# 48. Menyimpan Data ke MongoDB (Pakai Mongoose)

### A. Install MongoDB dan Mongoose

> ✅ Pastikan MongoDB sudah diinstall atau gunakan MongoDB Atlas (gratis, berbasis cloud)

1. Tambahkan Mongoose ke proyek:

```bash
npm install mongoose
```

---

### B. Koneksi ke MongoDB

Edit `index.js`:

```javascript
const mongoose = require("mongoose");

mongoose.connect("mongodb://localhost:27017/pachan_api", {
    useNewUrlParser: true,
    useUnifiedTopology: true
})
.then(() => console.log("Terhubung ke MongoDB"))
.catch(err => console.error("Gagal koneksi MongoDB:", err));
```

---

### C. Buat Model User

Buat file `models/User.js`:

```javascript
const mongoose = require("mongoose");

const userSchema = new mongoose.Schema({
    name: { type: String, required: true },
    email: { type: String, required: true }
}, { timestamps: true });

module.exports = mongoose.model("User", userSchema);
```

---

### D. Gunakan Model di `index.js`

Ganti array `users` dengan model MongoDB:

```javascript
const User = require("./models/User");

// GET all users
app.get("/users", async (req, res) => {
    const users = await User.find();
    res.json(users);
});

// GET user by ID
app.get("/users/:id", async (req, res) => {
    try {
        const user = await User.findById(req.params.id);
        if (!user) return res.status(404).json({ message: "User not found" });
        res.json(user);
    } catch {
        res.status(400).json({ message: "Invalid ID format" });
    }
});

// POST create user
app.post("/users", async (req, res) => {
    const { name, email } = req.body;
    if (!name || !email) return res.status(400).json({ message: "Invalid data" });
    const newUser = new User({ name, email });
    await newUser.save();
    res.status(201).json(newUser);
});

// PUT update user
app.put("/users/:id", async (req, res) => {
    try {
        const user = await User.findByIdAndUpdate(
            req.params.id,
            req.body,
            { new: true }
        );
        if (!user) return res.status(404).json({ message: "User not found" });
        res.json(user);
    } catch {
        res.status(400).json({ message: "Invalid ID format" });
    }
});

// DELETE user
app.delete("/users/:id", async (req, res) => {
    try {
        const user = await User.findByIdAndDelete(req.params.id);
        if (!user) return res.status(404).json({ message: "User not found" });
        res.json({ message: "User deleted" });
    } catch {
        res.status(400).json({ message: "Invalid ID format" });
    }
});
```

---

### E. Jalankan Ulang Aplikasi

```bash
node index.js
```

✅ Sekarang datamu tersimpan **permanen di MongoDB**.

---

### F. Uji dengan Postman:

1. **POST /users** → Tambah user
2. **GET /users** → Lihat semua user
3. **GET /users/\:id** → Cek detail user
4. **PUT /users/\:id** → Update
5. **DELETE /users/\:id** → Hapus

---

# 49. Tambahan: Validasi dengan Mongoose

Perketat model:

```javascript
const userSchema = new mongoose.Schema({
    name: { type: String, required: true, minlength: 3 },
    email: { type: String, required: true, match: /.+\@.+\..+/ }
});
```

Coba POST user dengan email tidak valid → akan dapat error 400.

---

# 50. Arah Selanjutnya

Kamu sekarang sudah punya:
✅ API backend
✅ Penyimpanan MongoDB
✅ Postman untuk uji fungsionalitas

---

## Topik Selanjutnya (Opsional, sesuai minat kamu):

1. 🔐 Autentikasi JWT sungguhan (dengan token terenkripsi)
2. 🌐 Deploy API ke cloud (Render, Railway, Vercel)
3. 🧪 Testing otomatis pakai **Jest** atau **Supertest**
4. 📦 Buat dokumentasi otomatis API (pakai Swagger)

---
