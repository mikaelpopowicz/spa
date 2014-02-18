<?php
namespace Library\Entities;

class News_list extends \Library\Entity
{
	private $email;
	
	const EMAIL_INVALIDE = 1;
	const PREG_MAIL = "#^[a-zA-Z1-9\.\-\_]+@{1}[a-zA-Z1-9\.\-\_]+\.{1}[a-z]{2,4}$#";
	
	public function isValid()
	{
		return !(empty($this->email) || !empty($this->erreurs));
	}
	
	// SETTER //
	
	public function setEmail($email)
	{
		if(!is_string($email) || empty($email) || !preg_match(self::PREG_MAIL, $email))
		{
			$this->erreurs[] = self::EMAIL_INVALIDE;
		}
		else
		{
			$this->email = $email;
		}
	}
	
	// GETTER //
	
	public function email() { return $this->email; }
}
?>