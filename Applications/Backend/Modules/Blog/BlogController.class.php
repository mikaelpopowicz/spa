<?php
namespace Applications\Backend\Modules\Blog;

class BlogController extends \Library\BackController
{
	public function executeCategorie(\Library\HTTPRequest $request)
	{
		$this->page->addVar('title', 'Spa - Blog - Catégories');
		$this->page->addVar('class_blog', 'active');
	}

	public function executeArticle(\Library\HTTPRequest $request)
	{
		$this->page->addVar('title', 'Spa - Blog - Articles');
		$this->page->addVar('class_blog', 'active');
	}

	public function executeCommentaire(\Library\HTTPRequest $request)
	{
		$this->page->addVar('title', 'Spa - Blog - Commentaires');
		$this->page->addVar('class_blog', 'active');
	}
}
?>