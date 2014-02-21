<?php
namespace Library\Entities;

class Categorie extends \Library\Entity
{
	private $description,
	$libelle;
	
	const DESC_INVALIDE = 1;
	const LIB_INVALIDE = 2;
	
	public function isValid()
	{
		return !(empty($this->description) || empty($this->libelle));
	}
	
	// SETTER //
	
	public function setDescription($description)
	{
		if(!is_string($description) || empty($description))
		{
			$this->erreurs[] = sefl::DESC_INVALIDE;
		}
		else
		{
			$this->description = $description;
		}
	}
	
	public function setLibelle($libelle)
	{
		if(!is_string($libelle) || empty($libelle))
		{
			$this->erreurs[] = sefl::LIB_INVALIDE;
		}
		else
		{
			$this->libelle = $libelle;
		}
	}
	
	// GETTER //
	
	public function description() { return $this->description; }
	public function libelle() { return $this->libelle; }
}
?>