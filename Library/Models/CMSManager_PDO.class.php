<?php
namespace Library\Models;
 
use \Library\Entities\CMS;
 
class CMSManager_PDO extends CMSManager
{
	public function getUnique($id)
	{
		$requete = $this->dao->prepare('SELECT id_cms AS id, titre, description, contenu FROM cms WHERE id_cms = :id');
		$requete->bindValue(':id', $id, \PDO::PARAM_STR);
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\CMS');
		if ($cms = $requete->fetch())
		{
			return $cms;
		}
		return null;
	}
	
	protected function update(CMS $cms)
	{
	    $requete = $this->dao->prepare('UPDATE cours SET titre = :titre, description = :description, contenu = :contenu WHERE id_cms = :id');
		$requete->bindValue(':titre', $cms['titre']);
		$requete->bindValue(':description', $cms['description']);
		$requete->bindValue(':contenu', $cms['contenu']);
		$requete->bindValue(':id', $cms['id']);
	    $requete->execute();
	}  
}