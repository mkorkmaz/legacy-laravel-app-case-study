## Legacy Laravel Currency Api

- Elimizde, uzun zaman önce bir firmaya, Laravel ile yazdırılmış eski bir api uygulamamız var. 
- Başka bir uygulama tarafından bu api uygulamasının veritabanına düzenli olarak veri basılmaktadır.
- Uygulamayı yazan firmayla çalışmaya uzun süre önce son verilmiş, sistem kendi kendine çalışır halde kullanılmaktadır.
- Firmamız var olan bu api uygulamasını güncellenip modernize edilerek sadece veri listeleme değil, veri girişinin de yapılmasına karar verdi.

Bu ihtiyaçtan dolayı firmamız tarafından Lead Developer olarak işe alındınız.

## Uygulamanın kurulumu ve ayağa kaldırılması

Bu uygulamayı çalıştırmak için makinenizde PHP 8.1+ çalışması, Docker olması ve Composer yüklü olması beklenmektedir.

Bu git repo'sunu klonlayıp kendi klasörüne terminalden girdikten sonra sırasıyla şu komutları çalıştırınız:
```shell
docker-compose up
composer install
php artisan migrate:fresh --seed
php artisan serve
```
docker-compose up komutundan sonra diğer komutları yeni bir terminal penceresinde ilgili directory'e giderek çalıştırabilirsiniz.

Uygulamanın user test'lerini http://127.0.0.1:8000/docs adresi üzerinden Api Dokümantasyonu üzerinden yapabilirsiniz.

Uygulama yazılırken Laravel Project dosya/klasör içeriğinde sadece şuralara dokunulmuştur:

```shell
- ./app/Http/
- ./app/Models
- ./database
- ./public/docs
- ./routes
```

## Sizden beklenenler:

### 1. Değişken, fonksiyon, attribute, class isimlendirmelerinde belli bir konvensiyonu kullanmak [Zorunlu]

Var olan kod birden çok kişi tarafından değişik zamanlarda yazılmış, güncellenmiştir. 
Önceden bir konvensiyon belirlenmediğinden uygulama genelinde bir tutarsızlık vardır.
Bu bağlamda aşağıdaki kurallara göre uygulamayı gözden geçirmeniz, gerekli değişiklikleri yapmanız beklenmeltedir:

- Uygulama PSR-12'yi extend eden Doctrine Coding Standard'a göre refaktör edilmelidir.
- Aksi belirtilmedikçe tüm isimlendirmelerde camelCase kullanılmalıdır.
- Class, Namespace isimleri PascalCase olmalıdır.
- Veritabanı, schema, tablo, kolon, index isimleri snake_case olmalıdır.
- Url parametreleri, konfigürasyon değerleri gibi isimlendirmelerde kebab-case kullanılmalıdır.

### 2. Openapi dokümantasyonunu düzenlemek [Zorunlu]

Codebase'de /public/docs altında openapi dokümantasyonu bulunmaktadır. 
Bu dokümantasyonu güncelleyerek API'ye şu özelliklerin kazandırmanız beklenmektedir:

- Var olan dokümanstasyonu isimlendirme konvensiyonuna göre elden geçirmek
- Kullanıcı login endpoint'lerini dokümante etmek.
- Yeni bir döviz kuru tanımlamak, var olanları güncellemek için endpoint'leri dokümante etmek.
- Var olan bir döviz kuru için ilgili tarihlerdeki değerlerinin girişi, güncellenmesi ve gerektiğinde silinebilmesi için gerekli endpointleri dokümante etmek.
- Basit bir kur hesaplama entpoint'i oluşturmak.
- Dokümantasyonu hazırlarken REST Api Guide'na uygun hareket etmek.


### 3. Uygulamayı Hexagonal Mimari(HA)'ye göre refaktör etmek [Opsiyonel]

Uygulama içinde business logic gerek controller method'larına gerek veritabanı tablo tanımlarına sızmış durumdadır.
Bu bağlamda:

- Domain kodunu implemantasyon detaylarından izole ederek HA'ya uygun olarak refaktör etmeniz beklenmektedir.
- Laravel'in ORM olarak kullandığı Eloquent bir Active Records uygulaması olduğundan HA'ya uygun refaktör ederken Repository Pattern kullanmanız beklenmektedir.
- Repository methodları içinde Eloquent modellerini kullanmaya devam edebilirsiniz.
- Açık SQL kodu yazmanız durumunda SQL Style Guide (https://www.sqlstyle.guide/) kullanmanız beklenmektedir.
- Class, method, attribute vb isimlendirmelerinde DDD perspektifinden yararlanmanız beklenmektedir.

### 4. Güncellenen API dokümantasyonuna göre uygulamayı genişletmek [Zorunlu]

Yazmış olduğunuz api dokümantasyonu implamente etmeniz beklenmektedir. Bu bağlamda:

- SOLID, Object Calisthenics ve Defensive Programming prensiplerine riayet etmeniz beklenmektedir.
- Kur hesaplama endpointinde kullanacağız hesaplama aracını ayrı bir servis gibi düşünüp kendi başına bir modül olarak yazınız.

### Git commit'leri [Zorunlu]

- Her commit tek bir konuyla ilgili olmalıdır.
- Her bir feature kodları için tek bir commit kullanılabilir.
- Commit mesajlarınız Conventional Commits Guide'ına uygun olmalıdır. Bu noktada şu cheat sheet'ten faydalanabilirsiniz: https://cheatography.com/albelop/cheat-sheets/conventional-commits/

### Yapılması zorunlu olmayan ama olması artı puan kazandıracak konular [Opsiyonel]

- Kur hesaplama modülü için unit test yazmanız.
- Kur hesaplama modülünü ayrı bir repository'e taşıyıp https://packagist.org üzerinden yayınlanan bir composer paketi haline getirmek.
- Psalm, Phpstan gibi static kod analysis tool'larını composer komutu ile çalırış hale getirip kullanmak. 
- Yazdığınız kodu Scrutinizer CI https://scrutinizer-ci.com/ değerlendirmeye alıp build:passing, coverage ve scrutinizer not badge'leri almak.
- Yazdığınız kodu klonlamak yerine fork edip uygulamanın son halini Merge Request ile iletmek.
- Bu guide içindeki yazım ve ifade yanlışlarını, yanlış verilmiş referans ya da komut örneklerini düzeltmek.  


