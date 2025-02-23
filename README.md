# TP1DPBO2025C1

Saya Nina Wulandari dengan NIM 2312091 mengerjakan Latihan Praktikum 1 dan Tugas Praktikum 1 dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Fitur dalam Keseluruhan Program
* Menampilkan data yang tersedia
* Menambahkan data baru
* Mengubah data yang sudah ada
* Menghapus data yang diinginkan
* Mencari data yang diinginkan berdasarkan nama produk

# Deskripsi Kode C++, PYTHON dan JAVA
Terdapat 1 class Petshop yang memiliki 4 atribut utama:
* ID (unik increment untuk setiap produk)
* Nama
* Kategori
* Harga
* next sebagai pointer

Untuk fungsi/method didefinisikan dalam class, eksekusi fungsi/methodnya serta inputan user untuk menu ada di dalam main.

# Alur Program C++, PYTHON dan JAVA
* Program dimulai dengan menampilkan menu perintah sebanyak 6 menu dengan rincian.
1. Tampilkan Data Peralatan → Menampilkan semua data yang tersedia.
2. Tambah Data Peralatan → Menambahkan data sesuai masukan 
3. Ubah Data Peralatan → Mengubah data berdasarkan ID.
4. Hapus Data Peralatan → Menghapus data berdasarkan ID.
5. Cari Data Peralatan → Mencari data berdasarkan nama peralatan.
0. Keluar → Menyelesaikan program.
   
* User akan memilih salah satu menu, kemudian program akan memanggil fungsi dalam class yang sesuai dengan menu yang dipilih.
* Fungsi akan diproses sesuai dengan pilihan user.
* Untuk fungsi tambah, user akan input nama, kategori, dan harga sedangkan id akan langsung terdefinisi setiap input tanpa diinput user.
* Untuk fungsi ubah dan hapus akan cek id terlebih dahulu sebelum mengubah atau menghapus. Jika id ditemukan menu ubah akan meminta data baru sedangkan untuk menu hapus akan berhasil menghapus. Jika id tidak ditemukan akan menampilkan gagal menemukan id dan proses ubah atau hapus tidak berhasil.
* Untuk fungsi cari akan mencari nama yang diinputkan user tanpa case sensitivity dengan lowercase ataupun uppercase
* Output program hanya akan berlaku pada sesi saat itu saja ketika user belum pilih menu keluar.
* Setelah keluar hasil program akan dimulai dari mula lagi.

# Deskripsi Kode PHP
Terdapat 1 class Petshop yang memiliki 5 atribut utama:
* ID (unik increment untuk setiap produk)
* Nama
* Kategori
* Harga
* Foto
* next sebagai pointer

Untuk fungsi-fungsi ada di dalam class. Kemudian class tersebut diakses di index yang mana index berisi tampilan html, form input, pencarian, pengelolaan session, serta eksekusi CRUD

# Alur Program PHP
* Dalam halaman index program akan menampilkan form tambah data, menu cari data, menampilkan daftar data, dan button untuk reset data (keluar sesi).
* User menambahkan data di form tambah data kemudian klik tambah peralatan, maka data baru akan langsung muncul dalam daftar.
* Dalam setiap data di tampilan daftar peralatan terdapat menu edit dan hapus. Jika user pilih edit maka akan mengubah form tambah data menjadi ubah data, kemudian user isi kembali data yang baru. Jika user pilih hapus maka data tersebut akan langsung terhapus dalam daftar.
* Untuk menu cari, user cari peralatan berdasarkan nama. Jika ditemukan akan muncul dalam daftar, jika tidak ditemukan akan menampilkan text bahwa peralatan tidak ditemukan.
* Button reset data digunakan untuk mengakhiri sesi saat ini sehingga seluruh data akan terhapus dan dimulai dari awal, jika tidak klik reset maka data yang dahulu akan tetap ada dalam sesi selanjutnya.
