<?php
namespace config;

require_once 'env.php';

class database {
    // deklarasi parameter koneksi database
    private $host;          // server database, default “localhost” atau “127.0.0.1”
    private $username;      // username database, default “root”
    private $password;      // password database, default kosong
    private $database;      // memilih database yang akan digunakan

    protected $mysqli;

    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->username = getenv('DB_USERNAME');      // username database, default “root”
        $this->password = getenv('DB_PASSWORD');      // password database, default kosong
        $this->database = getenv('DB_DATABASE');

        // buat koneksi database
        $this->mysqli = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        // cek koneksi
        // jika koneksi gagal 
        if (!$this->mysqli) {
            // tampilkan pesan gagal koneksi
            die('Koneksi Database Gagal : ' . mysqli_connect_error());
        }
        return $this->mysqli;
    }
}
