## Installation ⚒️

Installing and running system expert is super easy, please Follow below steps and you will be ready to rock 🤘

1. Open the terminal in your root directory of expertsystem.
2. Use the following command to install the composer

```bash
composer install
```
3. Use the following command to install the package
```
npm install && npm run dev
```
4. Run the following command to generate the key

```bash
php artisan key:generate
```
5. To migrate database
```
php artisan migrate
```
6. To seeding database
```bash
php artisan db:seed
```
7. To add storage, you need to run the the following command in the project directory
```bash
php artisan storage:link
```
8. To serve the application, you need to run the following command in the project directory

```bash
php artisan serve
```
9. Now navigate to the given address, and you will see your application is running.🥳

## What's Included 📦
| Fitur           | Super Admin |  Pakar  |  Staff  |
| --------------- | :---------: | :-----: | :-----: |
| Data Users      | &check;     | &cross; | &cross; |
| Data Jenis Ikan | &check;     | &check; | &cross; |
| Data Ikan       | &check;     | &check; | &cross; |
| Data Penyakit   | &check;     | &check; | &cross; |
| Data Gejala     | &check;     | &check; | &cross; |
| Data Aturan     | &check;     | &check; | &cross; |
| Laporan Diagnosa| &check;     | &check; | &cross; |
| Formulir        | &check;     | &cross; | &check; |
| Diagnosa        | &check;     | &cross; | &check; |

## For Login
### Super Admin
- username : super@gmail.com
- password : password

### Pakar
- username : pakar@gmail.com
- password : password

### Staff Lapangan
- username : staff@gmail.com
- password : password


## Browser Support 🖥️

At present, we officially aim to support the last two versions of the following browsers:

- Chrome (latest)
- FireFox (latest)
- Safari (latest)
- Microsoft Edge (latest)
- Opera (latest)

## License ©

- Copyright © Moh. Yahya
- Licensed under [MIT](LICENSE)
