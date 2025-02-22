import java.util.Scanner;

class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Petshop head = null; // Inisialisasi linked list kosong
        int nextID = 1; // Variabel untuk memberikan ID unik ke setiap peralatan
        int pilihan; // Variabel buat nyimpen pilihan menu

        do {
            // Tampilkan menu utama
            System.out.println("\n==== MENU PETSHOP ====");
            System.out.println("1. Tampilkan Data Peralatan");
            System.out.println("2. Tambah Data Peralatan");
            System.out.println("3. Ubah Data Peralatan");
            System.out.println("4. Hapus Data Peralatan");
            System.out.println("5. Cari Data Peralatan");
            System.out.println("0. Keluar");
            System.out.print("Pilihan: ");
            
            pilihan = scanner.nextInt();
            scanner.nextLine(); // Buat ngilangin newline biar input berikutnya aman

            switch (pilihan) {
                case 1:
                    // Menampilkan semua peralatan yang ada di daftar
                    if (head != null) {
                        head.tampilkanPeralatan();
                    } else {
                        System.out.println("Tidak ada Peralatan.");
                    }
                    break;
                
                case 2:
                    // Menambah peralatan baru ke daftar
                    System.out.print("Masukkan Nama Produk: ");
                    String nama = scanner.nextLine();
                    System.out.print("Masukkan Kategori Produk: ");
                    String kategori = scanner.nextLine();
                    System.out.print("Masukkan Harga Produk: ");
                    int harga = scanner.nextInt();

                    head = Petshop.tambahPeralatan(head, nextID++, nama, kategori, harga);
                    break;
                
                case 3:
                    // Mengubah data peralatan berdasarkan ID
                    System.out.print("Masukkan ID Peralatan yang ingin diubah: ");
                    int id = scanner.nextInt();
                    scanner.nextLine(); // Konsumsi newline biar input ga bermasalah

                    if (head != null) {
                        head.ubahPeralatan(id, scanner);
                    } else {
                        System.out.println("Tidak ada data peralatan.");
                    }
                    break;
                
                case 4:
                    // Menghapus peralatan berdasarkan ID
                    System.out.print("Masukkan ID Peralatan yang ingin dihapus: ");
                    int idHapus = scanner.nextInt();

                    head = Petshop.hapusPeralatan(head, idHapus);
                    break;
                
                case 5:
                    // Mencari peralatan berdasarkan nama
                    System.out.print("Masukkan Nama Peralatan yang dicari: ");
                    String namaCari = scanner.nextLine();

                    if (head != null) {
                        head.cariPeralatan(namaCari);
                    } else {
                        System.out.println("Tidak ada data peralatan.");
                    }
                    break;
                
                case 0:
                    // Keluar dari program
                    System.out.println("Terima kasih telah menggunakan sistem Petshop!\nSampai Jumpa!");
                    break;
                
                default:
                    // Jika input menu tidak valid
                    System.out.println("Pilihan tidak valid.");
            }
        } while (pilihan != 0); // Program terus berjalan sampai pengguna memilih 0

        scanner.close(); // Tutup scanner biar gak ada memory leak
    }
}
