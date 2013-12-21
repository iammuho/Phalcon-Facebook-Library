Phalcon Facebook Kütüphanesi
========================

Phalcon PHP C tabanından yazılmış yüksek performans ve düşük kaynak tüketimi sunan bir web frameworktür.

Bu Phalcon'a Facebook Php SDK için bir kütüphane ekleyen bir repositoridir.

Bu repositorideki kodlar PHP ile yazılmıştır.

## Yükleme

### GitHub ile yükleme

Bu repository'i ortak bir alana klonlayabilir ve dosyaları değiştirebilirsiniz ve ya dosyaların bazı kısımlarını mevcut dosyalarınızla değiştirebilirsiniz. 

```
git clone https://github.com/geass/Phalcon-Facebook-Library.git
```

## Kullanım

Mars Sosyal Plugin'in iki class'ını ekleyin ve ya kaydedin. (MARS benim ad ve soyadımın birleşmesinden oluşmuştur; Muhammet ARSlan) Onlardan birtanesi yaygın fonksiyonlardan oluşan benim hazırladığım class, diğeri ise facebook php sdk .

```php

 $loader->registerClasses(
 array(
 "FacebookLibrary"   => __DIR__ . $config->application->libraryDir.'/Mars/Social/FacebookLibrary.php',
 "Facebook" => __DIR__ . $config->application->libraryDir.'/Mars/Social/sdk/facebook.php'
 
 ));
```

Di ayarlaması

```php

	$di->set('facebook', function() use ($config){
	   
       $facebook = new Facebook(
       array(
       
           'appId' => 'facebook app id',
           'secret' => 'facebook app secret'
          
          ));
                
		$scope = 'user_status,email,publish_actions,offline_access,read_friendlists,status_update,user_birthday';
       
		$fb = new FacebookLibrary($facebook,$scope);
		return $fb;
	});
	
```

##Bazı Methodlar

###Facebook login Url

```php

	<?php echo $this->facebook->facebookLoginURL('redirect_uri');?>
	
```

###Facebook Login and ve kullanıcı bilgileri alma (array)

! Bu method facebook login'den dönülen sayfaya (redirect uri) eklenmeli.

```php

	<?php print_r($this->facebook->fbLogin());?>
	
```

### Kullanıcı profil resmini alma

user_facebook_id 'sini fbLogin() methodundan alabilirsiniz ("id" index'i ile)

```php

	<?php echo $this->facebook->getFacebookImage($user_facebook_id);?>
	
```




