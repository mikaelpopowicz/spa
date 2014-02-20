<?php
namespace Applications\Backend\Modules\Connexion;
 
class ConnexionController extends \Library\BackController
{
	public function executeIndex(\Library\HTTPRequest $request)
	{
		$this->page->addVar('no_layout', true);
		$this->page->addVar('title', 'Connexion');
     
		if ($request->postExists('login'))
		{
			$login = $request->postData('login');
			$login = sha1(md5($login));
			
			$salt = $this->app->config()->get('salt');
			
			$password = $request->postData('password');
			$password = sha1(md5(sha1(md5($salt)).sha1(md5($password)).sha1(md5($salt))));
       
			if ($login == $this->app->config()->get('login') && $password == $this->app->config()->get('pass'))
			{
				$this->app->user()->setAuthenticated(true);
				$this->app->httpResponse()->redirect('/admin');
			}
			else
			{
				$this->page->addVar('erreurs', '<h4 class="text-danger text-center">Erreur de login ou de mot de passe</h3>');
			}
		}
	}
	
	public function executeLogout(\Library\HTTPRequest $request)
	{
		if($this->app->user()->isAuthenticated()) {
			$this->app->user()->delUser();
			$this->app->user()->setFlash('<script>noty({timeout: 3000, type: "information", layout: "top", text: "Vous êtes déconnecté"});</script>');
			if($request->getExists('request')) {
				$this->app->httpResponse()->redirect($request->getData('request'));
			} else {
				$this->app->httpResponse()->redirect('/admin');
			}
		} else {
			$this->app->httpResponse()->redirect('/admin');
		}
	}
}