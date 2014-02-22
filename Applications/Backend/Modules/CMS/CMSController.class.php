<?php
namespace Applications\Backend\Modules\CMS;

class CMSController extends \Library\BackController
{
	public function executeIndex(\Library\HTTPRequest $request)
	{
		$this->page->addVar('title', 'Spa - CMS');
		$this->page->addVar('class_cms', 'active');
	}

	public function executeLink(\Library\HTTPRequest $request)
	{
		$this->page->addVar('title', 'Spa - Liens');
		$this->page->addVar('class_cms', 'active');
	}
}
?>