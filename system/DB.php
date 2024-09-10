<?php
class DB {
    private static $instance = null;

    // SQL sorgularını çalıştırmak için kullanılan method
    public static function query($sql) {
        // Eğer bağlantı daha önce yapılmadıysa yeni bir PDO instance oluştur
        if (self::$instance == null) {
            $dsn = "mysql:host=localhost;dbname=your_db"; // Veritabanı bağlantı bilgileri
            self::$instance = new PDO($dsn, 'username', 'password');
        }
        // Sorguyu çalıştır ve sonucu döndür
        return self::$instance->query($sql);
    }
}
?>
