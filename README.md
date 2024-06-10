# E-commerce Application

## Gambaran Umum
Proyek ini adalah aplikasi e-commerce yang dibangun menggunakan Laravel. Tujuan dari proyek ini adalah untuk menyediakan platform di mana pengguna dapat mendaftar, login, menambahkan produk ke keranjang, dan melakukan pemesanan. Admin dapat mengelola produk melalui antarmuka admin.

## Langkah-langkah Instalasi

### Persyaratan
- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL atau database lain yang didukung Laravel

### Instalasi
1. Clone repositori:
    ```bash
    git clone https://github.com/username/ecommerce.git
    cd ecommerce
    ```

2. Install dependencies PHP dengan Composer:
    ```bash
    composer install
    ```

3. Install dependencies JavaScript dengan npm:
    ```bash
    npm install
    npm run build
    ```

4. Copy file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```

5. Generate application key:
    ```bash
    php artisan key:generate
    ```

6. Konfigurasikan database di file `.env`:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ecommerce
    DB_USERNAME=root
    DB_PASSWORD=your_password
    ```

7. Jalankan migrasi dan seeder untuk membuat tabel dan data awal:
    ```bash
    php artisan migrate --seed
    ```

8. Jalankan server pengembangan:
    ```bash
    php artisan serve
    ```

Aplikasi akan berjalan di `http://127.0.0.1:8000`.

## Titik Akhir API

### Autentikasi
- **POST /register**: Mendaftarkan pengguna baru
    - **Body**:
        ```json
        {
            "name": "John Doe",
            "email": "john@example.com",
            "password": "password",
            "password_confirmation": "password"
        }
        ```

- **POST /login**: Login pengguna
    - **Body**:
        ```json
        {
            "email": "john@example.com",
            "password": "password"
        }
        ```

- **POST /logout**: Logout pengguna
    - **Body**: Tidak ada

### Profil
- **GET /profile**: Mendapatkan profil pengguna
- **PATCH /profile**: Mengupdate profil pengguna
    - **Body**:
        ```json
        {
            "name": "John Doe",
            "email": "john@example.com"
        }
        ```

### Produk
- **GET /admin/product**: Mendapatkan daftar produk
- **GET /admin/product/create**: Menampilkan formulir untuk menambahkan produk baru
- **POST /admin/product**: Menyimpan produk baru
    - **Body**:
        ```json
        {
            "name": "Product Name",
            "description": "Product Description",
            "price": 100,
            "stock": 10
        }
        ```
- **GET /admin/product/{id}/edit**: Menampilkan formulir untuk mengedit produk
- **PUT /admin/product/{id}**: Mengupdate produk
    - **Body**:
        ```json
        {
            "name": "Updated Product Name",
            "description": "Updated Product Description",
            "price": 150,
            "stock": 5
        }
        ```
- **DELETE /admin/product/{id}**: Menghapus produk

### Keranjang
- **GET /cart**: Menampilkan isi keranjang
- **POST /cart/add/{id}**: Menambahkan produk ke keranjang
    - **Body**: Tidak ada
- **DELETE /cart/{id}**: Menghapus produk dari keranjang
- **GET /cart/finish**: Menyelesaikan pembelian dan mengosongkan keranjang

### Pesanan
- **GET /orders**: Menampilkan daftar semua pesanan yang dilakukan oleh pengguna

## Pengaturan Tambahan
- Pastikan server database Anda berjalan dan sudah dikonfigurasi dengan benar di file `.env`.
- Pastikan file `.env` Anda diatur sesuai dengan konfigurasi lokal Anda.
- Jika menggunakan Laravel Breeze untuk autentikasi, pastikan untuk menjalankan perintah di bawah ini untuk menginstal paket Breeze:
    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    npm install
    npm run dev
    php artisan migrate
    ```

Itulah dokumentasi untuk menjalankan proyek ini di komputer lain. Jika ada pertanyaan lebih lanjut, silakan hubungi pengembang proyek.
