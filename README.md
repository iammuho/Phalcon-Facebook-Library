Phalcon Facebook Library
========================

Phalcon PHP is a web framework delivered as a C extension providing high performance and lower resource consumption. 

This is a repository to add Phalcon a library for Facebook Php SDK. 

The code in this repository is written in PHP.

## Installation

### Installing via Github

Just clone the repository in a common location and replace the files or files some sections within your files.

```
git clone https://github.com/geass/Phalcon-Facebook-Library.git
```

## Usage

Add or register 2 classes of Mars Social Plugin. (MARS is my name and surname; Muhammet ARSlan) One of them; my class with common functions and the other facebook php sdk class.

```php

 $loader->registerClasses(
 array(
 "FacebookLibrary"   => __DIR__ . $config->application->libraryDir.'/Mars/Social/FacebookLibrary.php',
 "Facebook" => __DIR__ . $config->application->libraryDir.'/Mars/Social/sdk/facebook.php'
 
 ));
```

Set di

```php

	$di->set('facebook', function() use ($config){
	   
       $facebook = new Facebook(
       array(
       
           'appId' => 'your app id',
           'secret' => 'your app secret'
          
          ));
                
		$scope = 'user_status,email,publish_actions,offline_access,read_friendlists,status_update,user_birthday';
       
		$fb = new FacebookLibrary($facebook,$scope);
		return $fb;
	});
	
```

##Some Methods

###Facebook login Url

```php

	<?php echo $this->facebook->facebookLoginURL('redirect_uri');?>
	
```

###Facebook Login and get User Profile (array)

! It should be placed on after redirect from facebook cuz it will try to login facebook.

```php

	<?php print_r($this->facebook->fbLogin());?>
	
```

### Get User Profile Image

You will get the user_facebook_id from fbLogin() method. (with array index of "id")

```php

	<?php echo $this->facebook->getFacebookImage($user_facebook_id);?>
	
```





