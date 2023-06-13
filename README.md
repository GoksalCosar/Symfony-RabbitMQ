## Symfony-RabbitMQ
Bu projem de Symfony ile RabbitMQ kullanımı için örnek bir proje yaptım. 

### Proje Çalıştırılması
Projeyi ilk olarak ayğa kaldırmadan önce yapmamız gereken bir adet bir şeyimiz var, oda
ngnix.conf da yer alan ``server_name messenger.info`` kısmındaki ``messenger.info`` kısmını bizim
host dosyamıza eklememiz gereklidir. Host dosyamıza gerekli hostname ekledikten sonra projemizi 
artık dokcer ile ayağa kaldırabiliriz. Aşağıdaki komutu kullanarak docker ayağa kaldırabilirsiniz.

``docker compose up --build``<br>

Ekstra olarak eğer herhangi bir veri tabanı işlemi için terminal kullanmanız gerekirse, örnek
olarak migration alma vb. veri taban bağlantısı gerekli olan terminal kodlarında bizim
docker container içerisine girip komutu çalıştırmamız gerekli. Aşağıdaki komutu kullanarak
docker container içerisine girebiliriz.

``docker compose exec php bash`` <br>
 
Yukarıdaki kodumuzda "php" yazan kısım bizim içine gireceğimiz container_name'dir.

### RabbitMQ'da Biriken Mesajları Handle Etme

RabbitMQ'da biriken mesajlar bizim handle etmemiz için bir komut kullanmamız gerek, eğer komutu 
kullanmazsak RabbitMQ'da mesajlar sürekli birikir. Aşağıdaki komutu Docker'da ilgili container içerisine
girip yapıştıralım.

``php bin/console messenger:consume``