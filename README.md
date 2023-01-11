<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

![image](https://user-images.githubusercontent.com/67504077/211742101-e03dd97c-f399-4cea-9db6-0ce2ddf82664.png)

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Service Provider

Laravel hizmet kapsayıcısı, sınıf bağımlılıklarını yönetmek ve bağımlılık enjeksiyonu gerçekleştirmek için güçlü bir araçtır. Bağımlılık enjeksiyonu, esasen şu anlama gelen süslü bir deyimdir: sınıf bağımlılıkları, yapıcı veya bazı durumlarda "ayarlayıcı" yöntemleri aracılığıyla sınıfa "enjekte edilir".

## Service Container

Servis sağlayıcılar, tüm Laravel uygulama önyükleme işlemlerinin merkezi yeridir. Laravel'in tüm temel hizmetlerinin yanı sıra kendi uygulamanız, hizmet sağlayıcılar aracılığıyla önyüklenir.

Ancak, "önyüklemeli" ile ne demek istiyoruz? Genel olarak, hizmet kapsayıcısı bağlamalarının, olay dinleyicilerinin, ara katman yazılımının ve hatta yolların kaydedilmesi dahil olmak üzere bir şeylerin kaydedilmesini kastediyoruz. Hizmet sağlayıcılar, uygulamanızı yapılandırmak için merkezi yerdir.

Laravel'in içerdiği dosyayı açarsanız (config/app.php) göreceksiniz. Bunların tümü, uygulamanız için yüklenecek olan hizmet sağlayıcı sınıflarıdır. Varsayılan olarak, bu dizide bir dizi Laravel çekirdek hizmet sağlayıcısı listelenir. Bu sağlayıcılar, posta gönderici, sıra, önbellek ve diğerleri gibi temel Laravel bileşenlerini önyükler. Bu sağlayıcıların çoğu "ertelenmiş" sağlayıcılardır, yani her istekte yüklenmeyecekler, yalnızca sağladıkları hizmetlere gerçekten ihtiyaç duyulduğunda yükleneceklerdir.

## Facades

Laravel belgeleri boyunca, "cepheler" aracılığıyla Laravel'in özellikleriyle etkileşime giren kod örneklerini göreceksiniz. Cepheler, uygulamanın hizmet kapsayıcısında bulunan sınıflara "statik" bir arabirim sağlar . Laravel, Laravel'in neredeyse tüm özelliklerine erişim sağlayan birçok cepheye sahip olarak gönderilir.

Laravel cepheleri, geleneksel statik yöntemlerden daha fazla test edilebilirlik ve esneklik sağlarken, kısa ve anlamlı bir sözdiziminin faydasını sağlayarak, hizmet konteynerindeki temel sınıflara "statik proxy'ler" olarak hizmet eder. 

## Package

Laravel, web uygulamaları için en popüler çerçevelerden biridir ve basit ve hızlı bir geliştirme ortamı sunar. Daha fazla işlevsellik eklemenizi sağlayan paketlere sahiptir. Bu paketler, bir Laravel uygulamasını geliştirmek için rotalara, denetleyicilere, görünümlere ve yapılandırmalara sahiptir.

Laravel paketleri, ilişkisel veritabanlarına erişmenin farklı yollarını kullanmanıza ve bağımlılık enjeksiyonları gerçekleştirmenize izin verir. Şu anda, rezervasyon ve seyahatten e-Ticaret ve eğitime kadar her türlü işlevi sunan 500'den fazla Laravel paketimiz var.

Laravel, birkaç görünüm, denetleyici veya model içeren paketler gibi davranan modüllere sahiptir. Bu modül veya paket Laravel'de korunur ve test edilir ve artık korunmayan, yeniden yayınlanmış, yeniden düzenlenmiş ve sürdürülen bir masa tenisi/modül sürümü olabilir. AsgardCMS'de de kullanılmaktadır .

Laravel Paket Yöneticisi, Laravel projeniz için hızlı ama basit paket yönetimi sağlar. Bir paketi besteci aracılığıyla hızlı bir şekilde kurmanıza izin verir ve ardından paket tarafından verilen Hizmet Sağlayıcıların ve Dış Mekanların herhangi birini veya tümünü otomatik olarak kaydeder.

## CI/CD

CI/CD ve Envoy ile Laravel uygulamasını dağıtın
Bu yazıda Sürekli Entegrasyon ve Sürekli Dağıtım hakkında bilgi edineceksiniz.
Asıl entegrasyona geçmeden önce, CI/CD'nin temel kavramını anlayalım . CI/CD , Sürekli Entegrasyon( CI ) ve Sürekli Dağıtım( CD ) anlamına gelir. CI/CD, herhangi bir zamanda güncellemeleri yayınlayabileceğiniz bir yazılım geliştirme yöntemidir.

Sürekli Entegrasyona (CI) Giriş:
Sürekli Entegrasyon (CI), geliştiricilerin günde birçok kez kodu entegre etmesini/kodu git deposuna işlemesini gerektiren bir geliştirme uygulamasıdır. git deposuna yapılan her gönderim, otomatik bir derleme betiği tarafından doğrulanır, geliştiricilerin sorunları erkenden tespit etmesine ve yeni hatalar ortaya çıkarma şansını azaltmasına olanak tanır.

Sürekli Entegrasyon, genellikle bir ana şubeye, ardından özel bir sunucuya yapılan bir "git push" sonrasında gerçekleşir, otomatik bir süreç uygulamayı oluşturur ve bir dizi test çalıştırır. bir ana daldaki bir uygulamaya gönderilen her değişiklik, otomatik olarak ve sürekli olarak oluşturulur ve test edilir.

Sürekli Dağıtıma Giriş(CD)
Sürekli Dağıtım, yazılım işlevlerinin otomatikleştirilmiş dağıtım süreci aracılığıyla teslim edildiği bir yaklaşımdır. Sürekli Dağıtım yöntemi, kodun otomatik olarak kontrol edilmesini sağlar ancak değişikliklerin bir sunucuda dağıtımını manuel olarak tetiklemek için insan müdahalesi gerektirir.

## Caching

Uygulamanız tarafından gerçekleştirilen veri alma veya işleme görevlerinden bazıları CPU'yu yoğun kullanabilir veya tamamlanması birkaç saniye sürebilir. Bu durumda, alınan verilerin bir süreliğine önbelleğe alınması yaygın bir uygulamadır, böylece aynı veriler için sonraki isteklerde hızlı bir şekilde alınabilir. Önbelleğe alınan veriler genellikle Memcached veya Redis gibi çok hızlı bir veri deposunda saklanır .

Neyse ki Laravel, çeşitli önbellek arka uçları için etkileyici, birleşik bir API sunarak, onların çarpıcı hızlı veri alma avantajlarından yararlanmanıza ve web uygulamanızı hızlandırmanıza olanak tanır.

## Architecture

![image](https://user-images.githubusercontent.com/67504077/211740042-c2bdd9b5-3fe0-4e12-b920-d303c135382d.png)

![image](https://user-images.githubusercontent.com/67504077/211740197-538ac244-74a9-4aa3-a639-4b1382568d90.png)

