# 55. Deploy API ke Internet (Gratis)

## Opsi Platform:

| Platform    | Kelebihan                                               | URL                                        |
| ----------- | ------------------------------------------------------- | ------------------------------------------ |
| **Render**  | Gratis, mudah deploy, support Node.js & MongoDB         | [https://render.com](https://render.com)   |
| **Railway** | Mudah, ada GUI database, auto deploy dari GitHub        | [https://railway.app](https://railway.app) |
| **Vercel**  | Cocok untuk frontend, backend bisa juga (Edge Function) | [https://vercel.com](https://vercel.com)   |

Kita pakai **Render** untuk deploy Node.js API + MongoDB Atlas.

---

## A. Setup MongoDB Atlas (Database Online)

1. Buka [https://www.mongodb.com/cloud/atlas](https://www.mongodb.com/cloud/atlas)
2. Buat akun dan project baru
3. Buat cluster gratis (Shared → M0)
4. Tambah **Database User**

   * Username: `admin`, Password: `admin123` (atau terserah)
5. Tambah IP: Allow Access from Anywhere (`0.0.0.0/0`)
6. Salin connection string:

   ```
   mongodb+srv://admin:admin123@cluster0.abcd.mongodb.net/mydb?retryWrites=true&w=majority
   ```
7. Ganti Mongo URI di `.env`:

   ```env
   MONGO_URI=mongodb+srv://admin:admin123@cluster0.abcd.mongodb.net/mydb
   JWT_SECRET=super_secret_123
   ```

---

## B. Persiapan Proyek

1. Pastikan file `index.js` membaca `.env`:

```javascript
require("dotenv").config();
mongoose.connect(process.env.MONGO_URI, { ... });
```

2. Edit `package.json`:
   Tambahkan script start:

```json
"scripts": {
  "start": "node index.js"
}
```

---

## C. Upload ke GitHub

1. Inisialisasi git repo:

```bash
git init
git add .
git commit -m "init api"
```

2. Buat repo di GitHub → lalu:

```bash
git remote add origin https://github.com/namamu/simple-api
git push -u origin master
```

---

## D. Deploy ke Render

1. Login ke [https://render.com](https://render.com)
2. Klik **New > Web Service**
3. Hubungkan ke repo GitHub kamu
4. Atur:

   * **Build Command**: `npm install`
   * **Start Command**: `npm start`
   * **Environment**:

     * `MONGO_URI` → dari MongoDB Atlas
     * `JWT_SECRET` → sesuai `.env` kamu
5. Tunggu deploy selesai (\~2-5 menit)

Kamu akan dapat URL seperti:

```
https://simple-api-pachan.onrender.com
```

---

## E. Uji API Secara Online

1. Buka Postman
2. Ubah base URL jadi:

```
https://simple-api-pachan.onrender.com/users
```

3. Coba login, post user, dll.

✅ Sekarang API kamu **online** dan bisa dipakai siapa saja!

---

# 56. Langkah Selanjutnya (Opsional)

Sekarang kamu bisa pilih arah lanjutan:

### 🔗 Integrasi ke Frontend:

* Android Kotlin (pakai Retrofit / Ktor)
* React / React Native (pakai Axios atau Fetch)

### 🧪 Tambahkan Unit Test:

* Gunakan `Jest` atau `Supertest` untuk testing otomatis

### 📖 Buat Dokumentasi Swagger:

* Untuk tampilkan endpoint API kamu secara interaktif

### 🧠 Tambahkan Fitur Lanjutan:

* Role-based access (admin/user)
* Upload gambar ke Cloudinary
* Email verifikasi dan reset password

---
