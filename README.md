# Personal Journal App

![screenshot](/Screenshot%202024-05-23%20at%2011-58-49%20Document.png)

## Cara menjalankan program secara local

1. pastikan sudah menginstal xampp atau software sejenis lalu download program dan tempatkan dalam htdocs folder
2. kunjungi [http://localhost/phpmyadmin/]() dan buat database bernama journal
3. pada database journal kunjungi menu sql dan jalankan kode berikut:
    ```sql
    CREATE TABLE posts (
    id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    subject varchar(128) not null,
    content varchar(1000) not null
    );
    ```
4. setelah menyelesaikan tahap diatas kunjungi link berikut: [http://localhost/WisnuBayu%20220401010079/index.php]()
