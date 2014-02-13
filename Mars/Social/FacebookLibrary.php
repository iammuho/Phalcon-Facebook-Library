<?php
/**
 * For Phalcon Facebook Library
 *
 * @package     Mars Social
 * @author		Muhammet ARSLAN (http://github.com/geass/)
 * @version		1.0
 */
 

 
class FacebookLibrary extends Phalcon\Mvc\User\Component 
{
    protected $_facebook;
    protected $scope;

    
    public function __construct($facebook,$scope)
    {
        
        $this->_facebook = $facebook;
        $this->scope = $scope;  // Scope from config

    }

    /**
     * Get Facebook Login Url
     * 
     * @param $redirect_uri(string)
     * @return login_url(string)
     * */
    function facebookLoginURL($redirect_url)
    {
        return $this->_facebook->getLoginUrl(array('redirect_uri' => $redirect_url,
                'scope' => $this->scope));
    }


    /**
     * Facebook Login
     * 
     * @return array|boolean
     * 
     * */

    function fbLogin()
    {

        // get User
        $fb_id = $this->_facebook->getUser();
        
        // Kullanıcı found!
                
        if (isset($fb_id)) {
            
           $this->_facebook->setAccessToken($this->_facebook->getAccessToken());

            $params = array('access_token' => $this->_facebook->getAccessToken());

            // get user profile
            $user_profile = $this->_facebook->api('/me', $params);
           
            //return info
            return $user_profile;


        } else {
            return false;
        }


    }


    /**
     * Get Facebook user profile image
     * 
     * @param fb_id(int)
     * @return location(string)
     * */
    function getFacebookImage($fb_id)
    {
        $array = get_headers('https://graph.facebook.com/' . $fb_id .
            '/picture?type=large', 1);
        return (isset($array['Location']) ? $array['Location'] : false);
    }


}
