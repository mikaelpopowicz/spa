<?php
namespace Library\Entities;
 
class Comment extends \Library\Entity
{
	protected $article,
	$auteur,
	$commentaire,
	$dateComm;
   
	const AUTEUR_INVALIDE = 1;
	const CONTENU_INVALIDE = 2;
   
	public function isValid()
	{
		return !(empty($this->auteur) || empty($this->commentaire) || !empty($this->erreurs));
	}
   
	// SETTERS
   
	public function setArticle($article)
	{
		$this->article = $article;
	}
   
	public function setAuteur($auteur)
	{
		if (!is_string($auteur) || empty($auteur))
		{
			$this->erreurs[] = self::AUTEUR_INVALIDE;
		}
		else
		{
			$this->auteur = $auteur;
		}
	}
   
	public function setCommentaire($contenu)
	{
		if (!is_string($contenu) || empty($contenu))
		{
			$this->erreurs[] = self::CONTENU_INVALIDE;
		}
		else
		{
			$this->commentaire = $contenu;
		}
	}
   
	public function setDateComm(\DateTime $date)
	{
		$this->dateComm = $date;
	}
   
	// GETTERS

	public function article() { return $this->article; }
	public function auteur() { return $this->auteur; }
	public function commentaire() { return $this->commentaire; }
	public function dateComm() { return $this->dateComm; }
}