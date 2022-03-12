<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\LoginModel;


class Twitterin extends BaseController
{
    public $loginModel;
	protected $twitteroauth;
	function __construct(){
		require_once APPPATH. 'Libraries/vendor/autoload.php';
		helper(['form', 'url']);
		$this->loginModel 	    = new LoginModel();
		$this->session 		    = session();
		$this->email 		    = \Config\Services::email();

	}

	public function auth()
	{
		//Configuration details as received from Twitter  Dashboard.
		$consumerKey = 'YOUR CONSUMER_KEY'; 	
		$consumerSecret = 'YOUR CONSUMER SECRET KEY';
		$callbackUrl = 'YOUR CALLBACK LINK';
		
		//Retrieve session tokens stored from Login button.
		$request_token = [];
		$request_token['oauth_token']  			= $this->session->get('oToken');
		$request_token['oauth_token_secret'] 	= $this->session->get('otSecret');
		
		//Pickup of new token after user approval.
		$newToken = $this->request->getVar('oauth_token');

		if (isset($newToken) && $request_token['oauth_token'] !== $newToken) {
			// Check if there is NO any oauth_token passed in request. 
			session()->setTempdata('error', 'Sorry! Something is wrong. Try again.', 3);
			return redirect()->to('login');
		}
		
		//TwitterOAuth instance with the temporary request tokens retrieved from login session.
		$connection = new TwitterOAuth($consumerKey, $consumerSecret, $request_token['oauth_token'], $request_token['oauth_token_secret']);

		$oVerifier = $this->request->getVar('oauth_verifier');
		$access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $oVerifier]);

		//Start on storing user details
		$this->session->set('accessToken', $access_token['access_token']);
		
		$request_token['oauth_token']  = $this->session->get('accessToken');

		//Last connection stage to Twitter to get full user details.
		$connection = new TwitterOAuth($consumerKey, $consumerSecret, $access_token['oauth_token'], $access_token['oauth_token_secret']);

		//At this point we will use the access token that is authorized to act as the user, to get their account details.
		$params = array('include_email' => 'true', 'include_entities' => 'false', 'skip_status' => 'true');
		$user = $connection->get('account/verify_credentials', $params);

		$name = explode(" ",$user->name); 
				$first_name = isset($name[0])?$name[0]:''; 
				$last_name = isset($name[1])?$name[1]:'';
		
		//Capturing Twitter User details into Database
		$userdata = [
			'provider'       		=> Twitter,
			'vcode'    				=> $user->id,
			'first_name'            => $first_name,
			'last_name'             => $last_name,
			'email'                 => $user->email,
			'profile_pic'           => $user->profile_image_url, 
			'created_at'            => date("Y-m-d H:i:s")
		];
	
	if($this->loginModel->twitter_user_exists($user->email))
	{
		
	$this->loginModel->updateTwitterUser($userdata, $user->email);
	}
	else
	{
		$this->loginModel->createTwitterUser($userdata);
	}
	//Successfull Login
	return redirect()->to('/home');
	}
	

	
}