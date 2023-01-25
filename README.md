
![Logo](https://mubatekno.com/wp-content/uploads/2021/08/ci4-cover.png)


# Toko buah

Project yang saya buat untuk memenuhi tugas UAS Pemrogaman Web Lanjut.


## Requirement
- Xampp(for PHP and MySQL)
- Composer
## Deployment

Silahkan clone project ini dan ikuti tutorial dibawah :

```bash
  composer install
```
Buat database dengan nama tokobuah
```bash
  php spark db:create tokobuah
```
Jalankan migrate database nya.
```bash
  php spark migrate
```
Jalankan seeder untuk data dummy database.
```bash
  php spark db:seed Users
  php spark db:seed Products
```
Default login seeder adalah :
```bash
  email : test@gmail.com || password : aufal
```
Terimakasih.





## Author

- [@aufall02](https://github.com/aufall02/)

