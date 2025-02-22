import java.util.Scanner;

class Petshop {
    // Atribut untuk menyimpan informasi peralatan petshop
    private int id;
    private String nama;
    private String kategori;
    private int harga;
    private Petshop next; // Pointer ke peralatan berikutnya (linked list)

    // Konstruktor default (untuk objek kosong)
    public Petshop() {
        this.id = 0;
        this.nama = "";
        this.kategori = "";
        this.harga = 0;
        this.next = null;
    }

    // Konstruktor untuk membuat objek dengan data langsung
    public Petshop(int id, String nama, String kategori, int harga) {
        this.id = id;
        this.nama = nama;
        this.kategori = kategori;
        this.harga = harga;
        this.next = null;
    }

    // Getter dan Setter untuk mengakses dan mengubah data
    public int getId() { 
		return id; 
	}
    public void setId(int id) {
		this.id = id; 
	}

    public String getNama() {
		return nama; 
	}
    public void setNama(String nama) { 
		this.nama = nama; 
	}

    public String getKategori() { 
		return kategori; 
	}
    public void setKategori(String kategori) { 
		this.kategori = kategori; 
	}

    public int getHarga() {
		return harga; 
	}
    public void setHarga(int harga) {
		this.harga = harga;	
	}

    public Petshop getNext() {
		return next; 
	}
    public void setNext(Petshop next) {
		this.next = next; 
	}

    // Menampilkan semua peralatan yang ada dalam daftar
    public void tampilkanPeralatan() {
        Petshop temp = this;
        System.out.println("Daftar Peralatan Petshop:");
        while (temp != null) {
            System.out.println("ID: " + temp.getId() +
                               ", Nama Produk: " + temp.getNama() +
                               ", Kategori Produk: " + temp.getKategori() +
                               ", Harga Produk: " + temp.getHarga());
            temp = temp.getNext(); // Pindah ke elemen berikutnya dalam linked list
        }
    }

    // Menambahkan peralatan baru ke dalam daftar
    public static Petshop tambahPeralatan(Petshop head, int nextID, String nama, String kategori, int harga) {
        Petshop newPeralatan = new Petshop(nextID, nama, kategori, harga);
        
        // Jika list masih kosong, langsung return peralatan baru sebagai head
        if (head == null) {
			System.out.println("Peralatan berhasil ditambahkan.");
            return newPeralatan;
        }

        // Cari sampai elemen terakhir untuk menambahkan peralatan di akhir
        Petshop temp = head;
        while (temp.getNext() != null) {
            temp = temp.getNext();
        }
        temp.setNext(newPeralatan); // Tambahkan peralatan baru di akhir list

        System.out.println("Peralatan berhasil ditambahkan.");
        return head;
    }

    // Mengubah data peralatan berdasarkan ID
    public void ubahPeralatan(int id, Scanner scanner) {
        Petshop temp = this;
        
        // Loop untuk mencari peralatan dengan ID yang sesuai
        while (temp != null) {
            if (temp.getId() == id) {
                // Jika ID ditemukan, minta input baru
                System.out.print("Masukkan Nama Baru: ");
                String namaBaru = scanner.nextLine();
                System.out.print("Masukkan Kategori Baru: ");
                String kategoriBaru = scanner.nextLine();
                System.out.print("Masukkan Harga Baru: ");
                int hargaBaru = scanner.nextInt();

                // Perbarui data
                temp.setNama(namaBaru);
                temp.setKategori(kategoriBaru);
                temp.setHarga(hargaBaru);
                System.out.println("Peralatan berhasil diperbarui.");
                return;
            }
            temp = temp.getNext(); // Pindah ke elemen berikutnya dalam list
        }
        
        // Jika ID tidak ditemukan
        System.out.println("ID tidak ditemukan.");
    }

    // Menghapus peralatan berdasarkan ID
    public static Petshop hapusPeralatan(Petshop head, int id) {
        // Jika list kosong, langsung beri pesan
        if (head == null) {
            System.out.println("Tidak ada Peralatan untuk dihapus.");
            return null;
        }

        // Jika peralatan yang mau dihapus ada di kepala list
        if (head.getId() == id) {
            System.out.println("Peralatan dengan ID " + id + " berhasil dihapus.");
            return head.getNext(); // Geser head ke elemen berikutnya
        }

        // Cari peralatan dengan ID yang sesuai
        Petshop temp = head;
        while (temp.getNext() != null && temp.getNext().getId() != id) {
            temp = temp.getNext();
        }

        // Jika ID tidak ditemukan
        if (temp.getNext() == null) {
            System.out.println("Peralatan dengan ID " + id + " tidak ditemukan.");
            return head;
        }

        // Hapus elemen dengan menghubungkan node sebelumnya ke node setelahnya
        temp.setNext(temp.getNext().getNext());
        System.out.println("Peralatan berhasil dihapus.");
        return head;
    }

    // Mencari peralatan berdasarkan nama
    public void cariPeralatan(String nama) {
        Petshop temp = this;
        boolean found = false;

        while (temp != null) {
            // Cek apakah nama sesuai (tidak case sensitive)
            if (temp.getNama().equalsIgnoreCase(nama)) {
                System.out.println("Peralatan ditemukan:");
                System.out.println("ID: " + temp.getId() +
                                   ", Nama Produk: " + temp.getNama() +
                                   ", Kategori Produk: " + temp.getKategori() +
                                   ", Harga Produk: " + temp.getHarga());
                found = true;
            }
            temp = temp.getNext(); // Pindah ke elemen berikutnya
        }

        // Jika tidak ditemukan
        if (!found) {
            System.out.println("Peralatan dengan nama '" + nama + "' tidak ditemukan.");
        }
    }
}
