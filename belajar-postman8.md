# 30. Studi Kasus: Testing CRUD Lengkap (Users)

Simulasi pengujian API lengkap **Create → Read → Update → Delete (CRUD)** menggunakan mock API `jsonplaceholder.typicode.com` atau mock server buatan sendiri.

---

## A. POST - Create User

**Endpoint**: `POST https://jsonplaceholder.typicode.com/users`

**Body (JSON)**:

```json
{
  "name": "Pachan User",
  "email": "pachan@example.com"
}
```

**Test Script**:

```javascript
pm.test("Harus berhasil membuat user", function () {
    pm.response.to.have.status(201);
    let data = pm.response.json();
    pm.expect(data).to.have.property("id");
    pm.environment.set("new_user_id", data.id);
});
```

---

## B. GET - Read User

**Endpoint**:
`GET https://jsonplaceholder.typicode.com/users/{{new_user_id}}`

**Test Script**:

```javascript
pm.test("Data user harus valid", function () {
    pm.response.to.have.status(200);
    let data = pm.response.json();
    pm.expect(data).to.have.property("id");
    pm.expect(data).to.have.property("name");
});
```

---

## C. PUT - Update User

**Endpoint**:
`PUT https://jsonplaceholder.typicode.com/users/{{new_user_id}}`

**Body (JSON)**:

```json
{
  "name": "Pachan Updated",
  "email": "updated@example.com"
}
```

**Test Script**:

```javascript
pm.test("User harus berhasil diupdate", function () {
    pm.response.to.have.status(200);
    let data = pm.response.json();
    pm.expect(data.name).to.eql("Pachan Updated");
});
```

---

## D. DELETE - Delete User

**Endpoint**:
`DELETE https://jsonplaceholder.typicode.com/users/{{new_user_id}}`

**Test Script**:

```javascript
pm.test("User harus berhasil dihapus", function () {
    pm.response.to.have.status(200);
});
```

---
