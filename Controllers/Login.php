<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use Abraham\TwitterOAuth\TwitterOAuth;

class Login extends BaseController
{
	
	public $loginModel;
	public $session;
	public $email;
	public $sessiondata;
	protected $twitter;
	public function __construct(){
		require_once APPPATH. 'Libraries/vendor/autoload.php';
		helper(['form', 'url']);
		
		$this->loginModel 		= new LoginModel();
		$this->session 			= session();
		$this->email 			= \Config\Services::email();

		//Twitter API Configuration
		$this->consumerKey = 'YOUR CONSUMER_KEY'; 	
		$this->consumerSecret = 'YOUR CONSUMER SECRET KEY';
		$this->callbackUrl = 'YOUR CALLBACK LINK';
		$this->connection = new TwitterOAuth($this->consumerKey, $this->consumerSecret);

	}
	
	
	
	public function index()
	{
		$data = [];
		
		//Onsite Login code .
		// -------- 
		// All here 
		// -------------
		
		
		// Twitter Button
		$request_token = $this->connection->oauth('oauth/request_token', array('oauth_callback' => $this->callbackUrl));
		$this->session->set('oToken', $request_token['oauth_token']);
		$this->session->set('otSecret', $request_token['oauth_token_secret']);
		$this->data['url'] = $this->connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));  
		
		
		return view('login', $this->data);
	}

}
