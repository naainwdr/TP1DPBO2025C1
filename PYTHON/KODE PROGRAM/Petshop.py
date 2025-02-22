class Petshop:
    # Konstruktor untuk inisialisasi objek peralatan petshop
    def __init__(self, id, nama, kategori, harga):
        self._id = id  # ID unik untuk peralatan
        self._nama = nama  # Nama produk
        self._kategori = kategori  # Kategori produk
        self._harga = harga  # Harga produk
        self._next = None  # Pointer ke elemen berikutnya (linked list)

    # Getter dan Setter untuk atribut private (_id, _nama, _kategori, _harga)
    def get_id(self):
        return self._id

    def set_id(self, value):
        self._id = value

    def get_nama(self):
        return self._nama

    def set_nama(self, value):
        self._nama = value

    def get_kategori(self):
        return self._kategori

    def set_kategori(self, value):
        self._kategori = value

    def get_harga(self):
        return self._harga

    def set_harga(self, value):
        self._harga = value

    def get_next(self):
        return self._next

    def set_next(self, value):
        self._next = value

    # Menampilkan daftar peralatan petshop yang ada dalam linked list
    def tampilkan_peralatan(self):
        temp = self  # Mulai dari node saat ini
        print("\nDaftar Peralatan Petshop:")
        while temp:
            # Cetak informasi peralatan
            print(f"ID: {temp.get_id()}, Nama: {temp.get_nama()}, Kategori: {temp.get_kategori()}, Harga: {temp.get_harga()}")
            temp = temp.get_next()  # Pindah ke peralatan berikutnya

    # Menambahkan peralatan ke akhir linked list (AddLast)
    def tambah_peralatan(self, next_id, nama, kategori, harga):
        new_peralatan = Petshop(next_id, nama, kategori, harga)  # Buat node baru
        
        temp = self  # Mulai dari node saat ini
        while temp.get_next():  # Iterasi sampai ke elemen terakhir
            temp = temp.get_next()
        temp.set_next(new_peralatan)  # Tambahkan node baru di akhir list
        print("Peralatan berhasil ditambahkan.")
        return self  # Return head dari linked list

    # Mengubah data peralatan berdasarkan ID yang dicari
    def ubah_peralatan(self, id):
        temp = self  # Mulai dari node saat ini
        while temp:
            if temp.get_id() == id:  # Jika ID ditemukan, minta input untuk data baru
                nama_baru = input("Masukkan Nama Baru: ")
                kategori_baru = input("Masukkan Kategori Baru: ")
                harga_baru = int(input("Masukkan Harga Baru: "))
                
                # Perbarui data dengan input yang baru
                temp.set_nama(nama_baru)
                temp.set_kategori(kategori_baru)
                temp.set_harga(harga_baru)
                print("Peralatan berhasil diperbarui.")
                return
            temp = temp.get_next()  # Pindah ke elemen berikutnya
        print("ID tidak ditemukan.")  # Jika ID tidak ada

    # Menghapus peralatan berdasarkan ID
    def hapus_peralatan(self, id):
        if self is None:  # Jika linked list kosong
            print("Tidak ada Peralatan untuk dihapus.")
            return None

        if self.get_id() == id:  # Jika node pertama yang ingin dihapus
            print(f"Peralatan dengan ID {id} berhasil dihapus.")
            return self.get_next()  # Geser head ke elemen berikutnya

        temp = self  # Mulai dari node saat ini
        while temp.get_next() and temp.get_next().get_id() != id:
            temp = temp.get_next()  # Cari elemen yang akan dihapus

        if temp.get_next() is None:  # Jika tidak ditemukan
            print(f"Peralatan dengan ID {id} tidak ditemukan.")
            return self

        # Hapus elemen dengan menghubungkan node sebelumnya ke node setelahnya
        temp.set_next(temp.get_next().get_next())
        print("Peralatan berhasil dihapus.")
        return self  # Return head dari linked list

    # Mencari peralatan berdasarkan nama
    def cari_peralatan(self, nama):
        temp = self  # Mulai dari node saat ini
        found = False

        while temp:
            if temp.get_nama().lower() == nama.lower():  # Cek apakah nama cocok (case insensitive)
                print("Peralatan ditemukan:")
                print(f"ID: {temp.get_id()}, Nama: {temp.get_nama()}, Kategori: {temp.get_kategori()}, Harga: {temp.get_harga()}")
                found = True
            temp = temp.get_next()  # Pindah ke elemen berikutnya

        if not found:  # Jika tidak ditemukan
            print(f"Peralatan dengan nama '{nama}' tidak ditemukan.")
