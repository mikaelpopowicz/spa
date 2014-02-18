<?php
namespace Library\Entities;

class Article \Library\Entity
{
	protected $categorie,
	$titre,
	$description,
	$contenu;
	
	const TITRE_INVALIDE = 1;
	const DESC_INVALIDE = 2
	const CONTENU_INVALIDE = 3;
	
	public function isValid()
	{
		return !(empty($this->titre) || !empty($this->erreurs));
	}
	
	// SETTERS //
	
	public function setCategorie($categorie)
	{
		$this->categorie = $categorie;
	}
	
	public function setTitre($titre)
	{
		if (!is_string($titre) || empty($titre))
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
		if (!is_string($description) || empty($description))
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
		if (!is_string($contenu) || empty($contenu))
		{
			$this->erreurs[] = self::CONTENU_INVALIDE;
		}
		else
		{
			$this->contenu = $contenu;
		}
	}
	
	// GETTERS //
	
	public function categorie() { return $this->categorie; }
	public function titre() { return $this->titre; }
	public function description() { return $this->description; }
	public function contenu() { return $this->contenu; }
}
?>