# PBO2020-1908561095-UTS

Dibuat oleh:
- Putu Audi Pasuatmadi (1908561095)

</br></br>

## Cara Menjalankan Proyek
### Inisialisasi Database
- Pertama - tama, buat sebuah *database* bernama `pbo_db` pada `XAMPP` atau pihak lainnya.
- *Credentials* dapat diganti pada `src/Database.php` berdasarkan *Credentials* akses *database* yang digunakan.
- Buat sebuah tabel yang dinamakan *comments*, dengan perintah:
  ```sql
    CREATE TABLE comments (
        id bigint PRIMARY KEY AUTO_INCREMENT,
        comment TEXT NOT NULL
    )
  ```

### Menjalankan Proyek
- Proyek dapat dijalankan dengan memulai file `index.php` pada `localhost` atau lainnya.