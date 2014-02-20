<?php
namespace Library\Models;

use \Library\Entities\CMS;
 
abstract class CMSManager extends \Library\Manager
{
	/**
	* Méthode retournant une news précise.
	* @param $id int L'identifiant de la news à récupérer
	* @return News La news demandée
	*/
	abstract public function getUnique($id);
	
	/**
	* Méthode permettant d'enregistrer un cours
	* @param $cours Cours Le cours à enregistrer
	* @return void
	*/
	abstract protected function update(CMS $cms);
}