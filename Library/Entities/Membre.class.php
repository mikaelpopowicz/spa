<?php
namespace Library\Entities;
 
class Membre extends \Library\Entity
{
	protected $nom,
	$prenom,
	$email,
	$password,
	$active,
	$salt,
	$token,
	$dateMembre,
	$news;

	const NOM_INVALIDE = 1;
	const EMAIL_INVALIDE = 2;
	const PASS_INVALIDE = 3;
	const PREG_MAIL = "#^[a-zA-Z1-9\.\-\_]+@{1}[a-zA-Z1-9\.\-\_]+\.{1}[a-z]{2,4}$#";
	
	public function isValid()
	{
		return !(empty($this->password) || empty($this->email) || empty($this->nom));
	}
	
	
	// SETTERS
	
	public function setUsername($user) 
	{
		if (!is_string($user) || empty($user))
		{
			$this->erreurs[] = self::USER_INVALIDE;
			$this->username = "";
		}
		else
		{
			$this->username = $user;
		}
	}
	
	public function setNom($nom)
	{
		if (!is_string($nom) || empty($nom))
		{
			$this->erreurs[] = self::NOM_INVALIDE;
			$this->nom = "";
		}
		else
		{
			$this->nom = $nom;
		}
	}
	
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	}
	
	public function setEmail($email)
	{
		if (is_string($email) && !empty($email))
		{
			if (preg_match(self::PREG_MAIL, $email))
			{
				$this->email = $email;
			}
			else
			{
				$this->erreurs[] = self::EMAIL_INVALIDE;
				$this->email = "";
			}
		}
		else
		{
			$this->erreurs[] = self::EMAIL_INVALIDE;
			$this->email = "";
		}
	}
	
	public function setPassword($pass)
	{
		if (!is_string($pass) || empty($pass))
		{
			$this->erreurs[] = self::PASS_INVALIDE;
		}
		else
		{
			$this->password = $pass;
		}
	}
	
	public function setActive($active)
	{
		$this->active = $active;
	}
	
	public function setSalt($salt)
	{
		$this->salt = $salt;
	}
	
	public function setToken($token)
	{
		$this->token = $token;
	}
	
	public function setDateMembre(\DateTime $date)
	{
		$this->dateMembre = $date;
	}
	
	
	// GETTERS
	
	public function nom() { return $this->nom; }
	public function prenom() { return $this->prenom; }
	public function email() { return $this->email; }
	public function password() { return $this->password; }
	public function active() { return $this->active; }
	public function salt() { return $this->salt; }
	public function token() { return $this->token; }
	public function dateMembre() { return $this->dateMembre; }
	public function news() { return $this->news; }
}
?>