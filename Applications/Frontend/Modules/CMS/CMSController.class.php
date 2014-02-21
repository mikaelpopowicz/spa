<?php
namespace Applications\Frontend\Modules\CMS;

class CMSController extends \Library\BackController
{
	public function executeShowAccueil(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_accueil', 'active');
		$cms = $this->managers->getManagerOf('CMS')->getUnique('accueil');
		$this->page->addVar('title', 'SPA - '.$cms->titre());
		$this->page->addVar('desc', $cms->description());
		$this->page->addVar('contenu', $cms->contenu());
	}
	
	public function executeShowSpa(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_spa', 'active');
		$cms = $this->managers->getManagerOf('CMS')->getUnique('spa');
		$this->page->addVar('title', 'SPA - '.$cms->titre());
		$this->page->addVar('desc', $cms->description());
		$this->page->addVar('contenu', $cms->contenu());
	}
	
	public function executeShowService(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_service', 'active');
		$cms = $this->managers->getManagerOf('CMS')->getUnique('services');
		$this->page->addVar('title', 'SPA - '.$cms->titre());
		$this->page->addVar('desc', $cms->description());
		$this->page->addVar('contenu', $cms->contenu());
	}
	
	public function executeShowProduit(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_produit', 'active');
		$cms = $this->managers->getManagerOf('CMS')->getUnique('produits');
		$this->page->addVar('title', 'SPA - '.$cms->titre());
		$this->page->addVar('desc', $cms->description());
		$this->page->addVar('contenu', $cms->contenu());
	}
	
	public function executeShowContact(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_contact', 'active');
		$cms = $this->managers->getManagerOf('CMS')->getUnique('contact');
		$this->page->addVar('title', 'SPA - '.$cms->titre());
		$this->page->addVar('desc', $cms->description());
		$this->page->addVar('contenu', $cms->contenu());
	}
}
?>