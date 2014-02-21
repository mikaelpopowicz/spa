<?php
namespace Library\Models;
 
use \Library\Entities\Article;
 
class ArticleManager_PDO extends ArticleManager
{
	public function getList()
	{
		$sql = 'SELECT id_article as id, id_cat AS categorie, c.id_m AS matiere, titre, description, contenu, dateArticle FROM article';
     
		$requete = $this->dao->query($sql);
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Article');
     
		$listeArticles = $requete->fetchAll();
     
		foreach ($listeArticles as $article)
		{
			$article->setDateArticle(new \DateTime($cours->dateArticle()));
		}
     
		$requete->closeCursor();
     
		return $listeArticles;
	}
	
	public function getListOf($categorie)
	{
		$requete = $this->dao->prepare('SELECT id_article as id, id_cat AS categorie, c.id_m AS matiere, titre, description, contenu, dateArticle FROM article FROM cours WHERE id_cat = :categorie');
		$requete->bindValue(':categorie', $categorie, \PDO::PARAM_STR);
		$requete->execute();
		
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Cours');
     
		$listeArticles = $requete->fetchAll();
     
		foreach ($listeArticles as $article)
		{
			$article->setDateArticle(new \DateTime($cours->dateArticle()));
		}
     
		$requete->closeCursor();
     
		return $listeArticles;
	}
	
	public function getUnique($id)
	{
		$requete = $this->dao->prepare('SELECT id_article as id, id_cat AS categorie, c.id_m AS matiere, titre, description, contenu, dateArticle FROM article FROM cours WHERE id_article = :id');
		$requete->bindValue(':id', $id, \PDO::PARAM_INT);
		$requete->execute();
     
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Cours');
     
		if ($article = $requete->fetch())
		{
			$article->setDateArticle(new \DateTime($cours->dateArticle()));
       
			return $article;
		}
     
		return null;
	}
	
	public function count()
	{
		return $this->dao->query('SELECT COUNT(*) FROM article')->fetchColumn();
	}
	
	protected function add(Article $article)
	{
		$requete = $this->dao->prepare('INSERT INTO article SET id_cat = :categorie, titre = :titre, description = :description, contenu = :contenu, dateArticle = SYSDATE() WHERE id_article = :id');
		
	    $requete->bindValue(':auteur', $article->auteur());
		$requete->bindValue(':matiere', $article->matiere());
	    $requete->bindValue(':titre', $article->titre());
		$requete->bindValue(':description', $article->description());
	    $requete->bindValue(':contenu', $article->contenu());
 
	    $requete->execute();
	}
	
	protected function modify(Article $article)
	{
	    $requete = $this->dao->prepare('UPDATE article SET id_cat = :categorie, titre = :titre, description = :description, contenu = :contenu WHERE id_article = :id');
	    $requete->bindValue(':categorie', $article['categorie']);
		$requete->bindValue(':titre', $article['titre']);
		$requete->bindValue(':description', $article['description']);
		$requete->bindValue(':contenu', $article['contenu']);
		$requete->bindValue(':id', $article['id']);
	    $requete->execute();
	}
	
  	public function delete(Article $article)
  	{
  		$this->dao->exec('DELETE FROM article WHERE id_c = '.$article['id']);
  	}
	  
	  
}