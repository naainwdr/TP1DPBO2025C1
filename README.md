# TP1DPBO2025C1

Saya Nina Wulandari dengan NIM 2312091 mengerjakan Latihan Praktikum 1 dan Tugas Praktikum 1 dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

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

