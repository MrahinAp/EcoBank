Nama : Muhamad Rahin Almassyah Putra
       Anis khairun nisa
       Fauza Bil Amri

Nama instansi : STMIK BANDUNG
Judul Website : EcoBank

Cara Instalasi :
 Buka repository GitHub
 Klik tombol Code → Download ZIP
Extract file ZIP ke folder yang diinginkan
Lalu simpan project 

Jika menggunakan xammp simpan seperti ini

C:\xampp\htdocs\ (Project yang sudah di download)

Jika menggunakan Laragon simpan seperti ini

C:\laragon\www\(Project yang sudah di download)

Wajib terinstal composer dan masuk ke folder projectnya  lalu ketik di terminal 

composer install

Buka file .env, lalu sesuaikan bagian database seperti berikut:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root ( jika login phpMyAdmin ada usernamenya pake username nya)
DB_PASSWORD=( jika login phpMyAdmin ada password pake password nya)
 

Lalu siapkan databasenya menggunakan phpMyAdmin 

Di dalam repository sudah ada EcoBank.sql lalu import file tersebut  cara import nya buka phpMyAdmin dan buat database dengan nama database sesuai dengan yang ada di repository lalu klik import dan tinggal import databasenya 

Lalu tinggal run seperti biasa di terminal dengan cara php artisan serve
Jangan lupa laragon/xammp nya menyala

untuk login user : Username : Raysa
                   Password : Raysa123

untuk login admin : username : admin
                    password : admin
                    

Lalu tinggal run seperti biasa di terminal dengan cara php artisan serve
Jangan lupa laragon/xammp nya menyala
