<?php

Router::layout('_main', function (){
    Router::get('', fn () => View::render('index/home', ['pageTitle' => 'Anasayfa']));
    Router::get('hakkimizda', fn () => View::render('index/about', "Hakkımızda"));
    Router::get('iletisim', fn () => View::render('index/contact', "İletişim"));
    Router::get('berat', fn () => View::render('index/beratogrenmekistiyor', ">Beberat"));

});




/* HTTP istek türleri. |||BUNLARI SİLMEYECEĞİM /// BUNLARI SİLMEYECEĞİM|||
 *  GET: Sadece veri almak için kullanılır.
 *  POST: Veri göndermek için kullanılır.
 *  PUT: Veri güncellemek için kullanılır.
 *  DELETE: Veri silmek için kullanılır.
 *
 *
 *  PATCH: Veri güncellemek için kullanılır. PUT ile benzerdir, ancak yalnızca belirli alanları günceller.
 *
 *  OPTIONS: Sunucu üzerindeki kaynaklar hakkında bilgi almak için kullanılır.
 *  HEAD: GET isteğine benzer, ancak yanıtın gövdesini almaz.
 *
 *  CONNECT: Sunucu ile proxy arasında bağlantı kurmak için kullanılır.
 *  TRACE: Sunucuya bir mesaj gönderir ve geri dönen mesajın orijinal isteği nasıl etkilediğini görmek için kullanılır.
 *  COPY: Bir kaynağı kopyalamak için kullanılır.
 *  LINK: Bir kaynağı başka bir kaynağa bağlamak için kullanılır.
 *  UNLINK: Bir kaynağı başka bir kaynaktan ayırmak için kullanılır.
 *  PURGE: Bir web önbelleğinden belirli bir kaynağı kaldırmak için kullanılır.
 * */




















