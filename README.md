# Aplikasi Pemesanan Kendaraan

## Deskripsi
Aplikasi ini digunakan untuk melakukan pemesanan kendaraan dinas secara online, termasuk proses approval dan manajemen kendaraan.

---

# Informasi Teknologi

## Framework
- Laravel 9

## PHP Version
- PHP 8.2

## Database
- MySQL 8.0

## Web Server
- Apache / Nginx

---

# Akun Login

## Admin
| Username | Password |
|----------|-----------|
| admin@gmail.com | password |

## Approver 1
| Username | Password |
|----------|-----------|
| manager@gmail.com | password |

## Approver 2
| Username | Password |
|----------|-----------|
| pool@gmail.com | password |

## OPTIONAL APPROVER
| Username | Password |
|----------|-----------|
| supervisor@gmail.com | password |


---

# Cara Install Aplikasi

## 1. Download aplikasi via github
## 1. Buat database bernama "pemesanan"

php artisan optimize
php artisan migrate:fresh
php artisan db:seed
php artisan serve
