#pragma once
#include <bits/stdc++.h>
#include "Petshop.cpp"

using namespace std;

int main() {
    Petshop* head = nullptr;
    int nextID = 1;
    int pilihan;

    do {
        cout << "\n==== MENU PETSHOP ====\n";
        cout << "1. Tampilkan Data Peralatan\n";
        cout << "2. Tambah Data Peralatan\n";
        cout << "3. Ubah Data Peralatan\n";
        cout << "4. Hapus Data Peralatan\n";
        cout << "5. Cari Data Peralatan\n";
        cout << "0. Keluar\n";
        cout << "Pilihan: ";
        cin >> pilihan;

        if (pilihan == 1) {
            if (head != nullptr) {
                head->tampilkanPeralatan();
            } else {
                cout << "Tidak ada Peralatan.\n";
            }
        } else if (pilihan == 2) {
            string nama, kategori;
            int harga;
            cout << "Masukkan Nama Produk: ";
            cin >> ws; getline(cin, nama);
            cout << "Masukkan Kategori Produk: ";
            getline(cin, kategori);
            cout << "Masukkan Harga Produk: ";
            cin >> harga;

			if (head == nullptr) {
                head = new Petshop(nextID++, nama, kategori, harga);
				cout << "Peralatan berhasil ditambahkan.\n";
            } else {
                head->tambahPeralatan(head, nextID, nama, kategori, harga);
            }
			
        } else if (pilihan == 3) {
            int id;
            string nama, kategori;
            int harga;
            cout << "Masukkan ID Peralatan yang ingin diubah: ";
            cin >> id;
            cout << "Masukkan Nama Baru: ";
            cin >> ws; getline(cin, nama);
            cout << "Masukkan Kategori Baru: ";
            getline(cin, kategori);
            cout << "Masukkan Harga Baru: ";
            cin >> harga;

            if (head != nullptr) {
                head->ubahPeralatan(id, nama, kategori, harga);  
            } 
			
        } else if (pilihan == 4) {
            int id;
            cout << "Masukkan ID Peralatan yang ingin dihapus: ";
            cin >> id;

            if (head != nullptr) {
                head->hapusPeralatan(head, id);
				cout << "Peralatan berhasil dihapus.\n";
            } 
			
        } else if (pilihan == 5) {
            string nama;
            cout << "Masukkan Nama Peralatan yang dicari: ";
            cin >> ws; getline(cin, nama);

            if (head != nullptr) {
                head->cariPeralatan(nama);
            } 
        }
    } while (pilihan != 0);

    cout << "Terima kasih telah menggunakan sistem Petshop!\nSampai Jumpa!\n";
    return 0;
}
