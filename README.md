# 🚀 Recruiting Laon - Project

Projeto **Fullstack** desenvolvido com:

- 🖥 Backend: Laravel 12
- ⚛ Frontend: React.js (JavaScript)
- 🗄 Banco de Dados: MySQL

---

# 📋 Requisitos

Antes de começar, você precisa ter instalado em sua máquina:

- PHP 8.0+
- Composer
- Node.js 18+
- NPM
- MySQL 8+
- Git

---

# 📥 Clonando o Projeto

```bash
git clone https://github.com/igordanbo/recruiting-laon.git
cd recruiting-laon
```

---

# 🖥 Backend - Laravel 12

## 1️⃣ Acesse a pasta do backend

```bash
cd recruiting-laon-backend
```

---

## 2️⃣ Instale as dependências

```bash
composer install
```

---

## 3️⃣ Configure o ambiente

Copie o arquivo `.env`:

```bash
cp .env.example .env
```

Configure os seguintes campos necessários para o cadastro de imagens:

```
APP_URL=http://localhost:8000
FILESYSTEM_DISK=public
```

Configure também o banco de dados no `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=recruiting-laon-database
DB_USERNAME=sua_username
DB_PASSWORD=sua_password
```

---

## 4️⃣ Gere a chave da aplicação

```bash
php artisan key:generate
```

---

## 5️⃣ Execute as migrations

```bash
php artisan migrate
```

---

## 6️⃣ Execute os seeders

```bash
php artisan db:seed
```

---

## 7️⃣ Suba o servidor

```bash
php artisan serve
```

O backend estará disponível em:

```
http://127.0.0.1:8000
```

---

# 📚 Documentação da API

A documentação completa da API está disponível no Postman:

🔗 https://www.postman.com/bobato/recruiting-laon-collection/documentation/40369322-f0527371-7354-45b8-99a9-3408a0d35362

---

# ⚛ Frontend - React.js

## 1️⃣ Acesse a pasta do frontend

```bash
cd recruiting-laon-frontend
```

---

## 2️⃣ Instale as dependências

```bash
npm install
```

---

## 3️⃣ Configure a URL da API

Edite o arquivo:

```
src/utils/api.js
```

Verifique se a `baseURL` está configurada para:

```
http://127.0.0.1:8000/api
```

---

## 4️⃣ Execute o projeto

```bash
npm start
```

O frontend estará disponível em:

```
http://localhost:3000
```
