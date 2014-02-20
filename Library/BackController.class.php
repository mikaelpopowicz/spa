<?php
namespace Library;
 
abstract class BackController extends ApplicationComponent
{
	protected $action = '';
	protected $module = '';
	protected $page = null;
	protected $view = '';
	protected $managers = null;
   
	public function __construct(Application $app, $module, $action)
	{
		parent::__construct($app);
     	
		$this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion());
		$this->page = new Page($app);
		$this->page->addVar("js", array());
		$this->page->addVar("includes", array());
		if($app->name() == "Frontend") {
			$this->page->addVar("class_accueil", "");
			$this->page->addVar("class_spa", "");
			$this->page->addVar("class_service", "");
			$this->page->addVar("class_produit", "");
			$this->page->addVar("class_contact", "");
			$this->page->addVar("class_blog", "");
		} else if ($app->name() == "Backend") {
			$this->page->addVar("class_cms", "");
			$this->page->addVar("class_blog", "");
		}
		
     
		$this->setModule($module);
		$this->setAction($action);
		$this->setView($action);
	}
   
	public function execute()
	{
		$method = 'execute'.ucfirst($this->action);
     
		if (!is_callable(array($this, $method)))
		{
			throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas définie sur ce module');
		}
     
		$this->$method($this->app->httpRequest());
	}
   
	public function page()
	{
		return $this->page;
	}
   
	public function setModule($module)
	{
		if (!is_string($module) || empty($module))
		{
			throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
		}
     
		$this->module = $module;
	}
   
	public function setAction($action)
	{
		if (!is_string($action) || empty($action))
		{
			throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
		}
     
		$this->action = $action;
	}
   
	public function setView($view)
	{
		if (!is_string($view) || empty($view))
		{
			throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
		}
     
		$this->view = $view;
		
		$this->page->setContentFile(__DIR__.'/../Applications/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
	}
}