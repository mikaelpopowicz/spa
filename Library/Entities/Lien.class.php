<?php
namespace Library\Entities;

class Lien extends \Library\Entity
{
	private $nom,
	$cible;
	
	const NOM_INVALIDE = 1;
	const CIBLE_INVALIDE = 2;
	
	public function isValid()
	{
		return !(empty($this->nom) || empty($this->cible));
	}
	
	// GETTER //
	
	public function setNom($nom)
	{
		if(!is_string($nom) || empty($nom))
		{
			$this->erreurs[] = self::NOM_INVALIDE;
		}
		else
		{
			$this->nom = $nom;
		}
	}
	
	public function setCible($cible)
	{
		if(!is_string($cible) || empty($cible))
		{
			$this->erreurs[] = self::CIBLE_INVALIDE;
		}
		else
		{
			$this->cible = $cible;
		}
	}
}
?>