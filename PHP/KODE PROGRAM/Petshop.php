<?php
class Petshop {
    private $id;        
    private $nama; 
    private $kategori; 
    private $harga;    
    private $foto;     
    private $next;      // Pointer ke peralatan berikutnya (Linked List)

    // Konstruktor untuk inisialisasi objek peralatan petshop
    public function __construct($id, $nama, $kategori, $harga, $foto) {
        $this->id = $id;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->harga = $harga;
        $this->foto = $foto;
        $this->next = null;  // Awalnya tidak ada elemen berikutnya
    }

    // Getter
    public function getId() {
        return $this->id;
    }
    public function getNama() {
        return $this->nama;
    }
    public function getKategori() {
        return $this->kategori;
    }
    public function getHarga() {
        return $this->harga;
    }
    public function getFoto() {
        return $this->foto;
    }
    public function getNext() {
        return $this->next;
    }

    // Setter
    public function setNama($nama) {
        $this->nama = $nama;
    }
    public function setKategori($kategori) {
        $this->kategori = $kategori;
    }
    public function setHarga($harga) {
        $this->harga = $harga;
    }
    public function setFoto($foto) {
        $this->foto = $foto;
    }
    public function setNext($next) {
        $this->next = $next;
    }

    // MENAMPILKAN PERALATAN 
    public function tampilkanPeralatan($cariNama = "") {
        $temp = $this;  // Mulai dari kepala linked list
        $found = false;
        echo "<h4>Hasil Pencarian:</h4><ul>";

        // Loop untuk menelusuri semua peralatan dalam linked list
        while ($temp !== null) {
            // Jika pencarian kosong atau nama cocok dengan input user
            if ($cariNama === "" || stripos($temp->getNama(), $cariNama) !== false) {
                $found = true;
                echo "<li>ID: " . $temp->getId() . 
                    ", Nama: " . $temp->getNama() . 
                    ", Kategori: " . $temp->getKategori() . 
                    ", Harga: Rp " . number_format($temp->getHarga()) . 
                    "<br><img src='uploads/" . $temp->getFoto() . "' width='100'><br>
                    <a href='?hapus=" . $temp->getId() . "'>Hapus</a> |
                    <a href='?ubah=" . $temp->getId() . "'>Ubah</a></li><br>";
            }
            $temp = $temp->getNext();  // Pindah ke elemen berikutnya
        }

        // Jika tidak ada yang ditemukan
        if (!$found) {
            echo "<p>Data tidak ditemukan.</p>";
        }

        echo "</ul>";
    }

    //  MENAMBAH PERALATAN 
    public function tambahPeralatan($id, $nama, $kategori, $harga, $foto) {
        $newPeralatan = new Petshop($id, $nama, $kategori, $harga, $foto); // Buat objek baru
        $temp = $this;
        
        // Cari elemen terakhir dalam linked list
        while ($temp->getNext() !== null) {
            $temp = $temp->getNext();
        }
        $temp->setNext($newPeralatan); // Tambahkan peralatan baru di akhir linked list
    }

    //  MENGHAPUS PERALATAN 
    public function hapusPeralatan($id) {
        // Jika elemen pertama yang ingin dihapus
        if ($this->id == $id) {
            return $this->next; // Mengembalikan node berikutnya sebagai head baru
        }

        $temp = $this;

        // Mencari node sebelum yang ingin dihapus
        while ($temp->getNext() !== null) {
            if ($temp->getNext()->getId() == $id) {
                $temp->setNext($temp->getNext()->getNext()); // Lewati node yang akan dihapus
                return $this;
            }
            $temp = $temp->getNext();
        }
        return $this;
    }

    //  MENGUBAH DATA PERALATAN 
    public function ubahPeralatan($id, $nama, $kategori, $harga, $foto) {
        $temp = $this; // Mulai dari head linked list

        // Cari peralatan berdasarkan ID
        while ($temp !== null) {
            if ($temp->getId() == $id) {
                $temp->setNama($nama);
                $temp->setKategori($kategori);
                $temp->setHarga($harga);
                
                // Jika foto baru ada, update foto
                if ($foto !== null && $foto !== "") { 
                    $temp->setFoto($foto);
                }
                break;
            }
            $temp = $temp->getNext(); // Pindah ke peralatan berikutnya
        }
    }  
}
?>
