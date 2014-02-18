<?php
namespace Library\Entities;

class CMS extends \Library\Entity
{
	private $titre,
	$description,
	$contenu;
	
	const TITRE_INVALIDE = 1;
	const DESC_INVALIDE = 2;
	const CONT_INVALIDE = 3;
	
	public function isValid()
	{
		return !(empty($this->titre) || empty($this->description) || empty($this->contenu));
	}
	
	// SETTER //
	
	public function setTitre($titre)
	{
		if(!is_string($titre) || empty($titre))
		{
			$this->erreurs[] = self::TITRE_INVALIDE;
		}
		else
		{
			$this->titre = $titre;
		}
	}
	
	public function setDescription($description)
	{
		if(!is_string($description) || empty($description))
		{
			$this->erreurs[] = self::DESC_INVALIDE;
		}
		else
		{
			$this->description = $description;
		}
	}
	
	public function setContenu($contenu)
	{
		if(!is_string($contenu) || empty($contenu))
		{
			$this->erreurs[] = self::CONT_INVALIDE;
		}
		else
		{
			$this->contenu = $contenu;
		}
	}
	
	// GETTER //
	
	public function titre() { return $this->titre; }
	public function description() { return $this->description; }
	public function contenu() { return $this->contenu; }
}
?>