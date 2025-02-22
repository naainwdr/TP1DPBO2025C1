from Petshop import Petshop  # Import class Petshop dari file Petshop.py

def main():
    head = None  # Inisialisasi linked list, awalnya kosong
    next_id = 1  # ID untuk peralatan baru dimulai dari 1

    while True:  # Loop utama untuk menu interaktif
        print("\n==== MENU PETSHOP ====")
        print("1. Tampilkan Data Peralatan")
        print("2. Tambah Data Peralatan")
        print("3. Ubah Data Peralatan")
        print("4. Hapus Data Peralatan")
        print("5. Cari Data Peralatan")
        print("0. Keluar")
        pilihan = input("Pilihan: ")  # Input pilihan dari user

        if pilihan == "1":
            # Menampilkan semua data peralatan
            if head:
                head.tampilkan_peralatan()
            else:
                print("Tidak ada Peralatan.")  # Jika list kosong

        elif pilihan == "2":
            # Menambahkan data peralatan baru
            nama = input("Masukkan Nama Produk: ")
            kategori = input("Masukkan Kategori Produk: ")
            harga = int(input("Masukkan Harga Produk: "))

            if head is None:
                head = Petshop(next_id, nama, kategori, harga)  # Node pertama
                print("Peralatan berhasil ditambahkan.")
            else:
                head.tambah_peralatan(next_id, nama, kategori, harga)  # Tambah di akhir

            next_id += 1  # Pastikan ID bertambah agar unik

        elif pilihan == "3":
            # Mengubah data peralatan berdasarkan ID
            id_edit = int(input("Masukkan ID Peralatan yang ingin diubah: "))

            if head:
                head.ubah_peralatan(id_edit)
            else:
                print("ID tidak ditemukan.")  # Jika list kosong

        elif pilihan == "4":
            # Menghapus peralatan berdasarkan ID
            id_hapus = int(input("Masukkan ID Peralatan yang ingin dihapus: "))
            if head:
                head = head.hapus_peralatan(id_hapus)  # Head bisa berubah jika node pertama dihapus
            else:
                print("Tidak ada data peralatan.")  # Jika list kosong

        elif pilihan == "5":
            # Mencari peralatan berdasarkan nama
            nama_cari = input("Masukkan Nama Peralatan yang dicari: ")
            if head:
                head.cari_peralatan(nama_cari)
            else:
                print("Tidak ada data peralatan.")  # Jika list kosong

        elif pilihan == "0":
            # Keluar dari program
            print("Terima kasih telah menggunakan sistem Petshop!\nSampai Jumpa!")
            break

        else:
            print("Pilihan tidak valid.")  # Jika input tidak sesuai dengan opsi menu


# Pastikan program dijalankan hanya jika file ini yang dieksekusi langsung
if __name__ == "__main__":
    main()
