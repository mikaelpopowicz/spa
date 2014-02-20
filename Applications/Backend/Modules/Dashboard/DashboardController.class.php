<?php
namespace Applications\Backend\Modules\Dashboard;

class DashboardController extends \Library\BackController
{
	
	public function executeIndex(\Library\HTTPRequest $request)
	{
		$this->page->addVar('title', 'Spa - Administration');
	}

	public function executeShowParam(\Library\HTTPRequest $request)
	{
		$this->page->addVar('title', 'Spa - Configuration');
		$this->page->addVar('class_param', 'active');
	}
}
?>