#include <bits/stdc++.h>

using namespace std;

class Petshop {
private:
    int id;
    string nama;
    string kategori;
    int harga;
    Petshop* next; // Pointer untuk linked list

public:
    // Constructor 
    Petshop() {
        this->id = 0;
        this->nama = "";
        this->kategori = "";
        this->harga = 0;
        this->next = nullptr;
    }

    // Constructor dengan Parameter
    Petshop(int id, string nama, string kategori, int harga) {
        this->id = id;
        this->nama = nama;
        this->kategori = kategori;
        this->harga = harga;
        this->next = nullptr;
    }

    // Getter dan Setter
    int get_id() {
		return this->id; 
	}
	
    void set_id(int id) {
		this->id = id; 
	}

    string get_nama() {
		return this->nama; 
	}
	
    void set_nama(string nama) {
		this->nama = nama; 
	}

    string get_kategori() {
		return this->kategori; 
	}
	
    void set_kategori(string kategori) {
		this->kategori = kategori; 
	}

    int get_harga() {
		return this->harga; 
	}
	
    void set_harga(int harga) {
		this->harga = harga; 
	}

    Petshop* get_next() {
		return this->next; 
	}
	
    void set_next(Petshop* next) {
		this->next = next; 
	}

    // Menampilkan Peralatan yang ada di list
    void tampilkanPeralatan() {
        Petshop* temp = this;
        if (temp == nullptr) {
            cout << "Tidak ada Peralatan di dalam Petshop.\n";
            return;
        }

        cout << "Daftar Peralatan Petshop:\n";
        while (temp != nullptr) {
            cout << "ID: " << temp->get_id()
                 << ", Nama Produk: " << temp->get_nama()
                 << ", Kategori Produk: " << temp->get_kategori()
                 << ", Harga Produk: " << temp->get_harga() << endl;
            temp = temp->get_next();
        }
    }

    // Menambahkan Peralatan ke dalam list
    void tambahPeralatan(Petshop*& head, int& nextID, string nama, string kategori, int harga) {
        Petshop* newPeralatan = new Petshop(nextID++, nama, kategori, harga);

        if (head == nullptr) {
            head = newPeralatan;
			cout << "Peralatan berhasil ditambahkan.\n";
        } else {
            Petshop* temp = head;
            while (temp->get_next() != nullptr) {
                temp = temp->get_next();
            }
            temp->set_next(newPeralatan);
			cout << "Peralatan berhasil ditambahkan.\n";
        }
    }

    // Mengubah data Peralatan
    void ubahPeralatan(int id, string nama, string kategori, int harga) {
        Petshop* temp = this;
        while (temp != nullptr) {
            if (temp->get_id() == id) {
                temp->set_nama(nama);
                temp->set_kategori(kategori);
                temp->set_harga(harga);
				cout << "Peralatan berhasil diperbarui.\n";
                return;
            }
            temp = temp->get_next();
        }
        cout << "Peralatan dengan ID " << id << " tidak ditemukan.\n";
    }

    // Menghapus Peralatan dari list
    void hapusPeralatan(Petshop*& head, int id) {
        if (head == nullptr) {
            cout << "Tidak ada Peralatan untuk dihapus.\n";
            return;
        }

        if (head->get_id() == id) {
            Petshop* temp = head;
            head = head->get_next();
            delete temp;
            return;
        }

        Petshop* temp = head;
        while (temp->get_next() != nullptr && temp->get_next()->get_id() != id) {
            temp = temp->get_next();
        }

        if (temp->get_next() == nullptr) {
            cout << "Peralatan dengan ID " << id << " tidak ditemukan.\n";
            return;
        }

        Petshop* delNode = temp->get_next();
        temp->set_next(delNode->get_next());
        delete delNode;
        cout << "Peralatan berhasil dihapus.\n";
    }

    // Mencari Peralatan berdasarkan nama
    void cariPeralatan(string nama) {
        Petshop* temp = this;
        bool found = false;

        while (temp != nullptr) {
            if (temp->get_nama() == nama) {
                cout << "Peralatan ditemukan:\n";
                cout << "ID: " << temp->get_id()
                     << ", Nama Produk: " << temp->get_nama()
                     << ", Kategori Produk: " << temp->get_kategori()
                     << ", Harga Produk: " << temp->get_harga() << endl;
                found = true;
            }
            temp = temp->get_next();
        }

        if (!found) {
            cout << "Peralatan dengan nama '" << nama << "' tidak ditemukan.\n";
        }
    }

    // Destructor
    ~Petshop() {}
};
