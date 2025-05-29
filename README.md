# Nuxt + Laravel Sanctum SPA Authentication

Today we’re building a full SPA authentication system using **Nuxt.js**, **Laravel**, and **Laravel Sanctum**. This setup enables secure session-based authentication for a Nuxt frontend connected to a Laravel backend.

---

## 🗂 Project Structure

- `auth_system/` — Laravel backend
- `auth-system/` — Nuxt frontend

---

## ⚙️ Laravel Backend Setup (`auth_system`)

### 1. Clone the backend and install dependencies

```bash
git clone https://github.com/yourusername/laravel-nuxt-auth.git
cd auth_system
composer install
```

### 2. Set up the environment

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Configure your `.env` file

Add or update the following lines in your `.env`:

```env
SESSION_DOMAIN=localhost
SANCTUM_STATEFUL_DOMAINS=localhost:3000
ALLOWED_ORIGINS=http://localhost:3000
```

> ✅ Notes:
> - `SESSION_DOMAIN`: Should be set to your top-level domain in production (e.g., `.example.com`)
> - `SANCTUM_STATEFUL_DOMAINS`: List of frontend domains allowed to receive authentication cookies
> - `ALLOWED_ORIGINS`: For your CORS setup

### 4. Install Sanctum and migrate

Install all dependencies and run the migration:

```bash
composer install
php artisan vendor:publish 
php artisan migrate
```

---

## 🖥️ Nuxt Frontend Setup (`auth-system`)

### 1. Navigate to your Nuxt app

```bash
cd auth-system
```

### 2. Configure `nuxt.config.js`

Make sure it points to the Laravel backend:

```js
sanctum:{
    baseUrl: 'http://localhost:8000', // your backend url
    endpoints:{
      login: '/api/login', // your login api route
      logout: '/api/logout' // your logout api route
    },
    redirect:{
      onLogin: '/',
      onLogout: '/login'
    }
  },
  runtimeConfig:{
    public:{
      baseUrl: 'http://localhost:8000' // your api url
    }
  }
```

### 3. Install dependencies

```bash
npm install
```

### 4. Run the development server

```bash
npm run dev
```

---

## ▶️ Full Video Tutorial

📺 Watch the complete tutorial on my [YouTube channel](https://youtu.be/xGjk5712shE) for detailed setup and code walkthrough.

---

## 📜 License

This project is licensed under the MIT License.
