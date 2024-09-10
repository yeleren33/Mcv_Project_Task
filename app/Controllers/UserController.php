<?php
class UserController {
    // Kullanıcının ID'sini gösteren bir method
    public function show($id) {
        // Eğer id değeri 1 ise JSON formatında veri döndür
        if ($id == 1) {
            // Bu return ile tarayıcı JSON formatında veri gösterir
            header('Content-Type: application/json'); // Yanıt tipini JSON olarak ayarlar
            return json_encode(['user_id' => $id, 'username' => 'Berkay']);
        }

        // Aksi takdirde, view dosyasını yükler ve HTML döner
        return $this->view('user-view.php', ['user_id' => $id]);
    }

    // View dosyasını yükler ve ilgili değişkenleri template'e gönderir
    private function view($view, $data) {
        extract($data); // Değişkenleri array'den çıkarır
        include "../app/Views/$view"; // View dosyasını yükler
    }
}
?>
