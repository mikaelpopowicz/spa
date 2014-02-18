<?php
namespace Library\Entities;

class Mailing_pub extends \Library\Entity
{
	private $sujet,
	$message,
	$dateMail;
	
	const SUJ_INVALIDE = 1;
	const MESS_INVALIDE = 2;
	
	public function isValid()
	{
		return !(empty($this->sujet) || empty($this->message));
	}
	
	// SETTER //
	
	public function setSujet($sujet)
	{
		if(!is_string($sujet) || empty($sujet))
		{
			$this->erreurs[] = $sujet;
		}
		else
		{
			$this->sujet = $sujet;
		}
	}
	
	public function setMessage($message)
	{
		if(!is_string($message) || empty($message))
		{
			$this->erreurs[] = $message;
		}
		else
		{
			$this->message = $message;
		}
	}
	
	public function setDateMail(\DateTime $dateMail)
	{
		$this->dateMail = $dateMail;
	}
	
	// GETTER //
	
	public function sujet() { return $this->sujet; }
	public function message() { return $this->message; }
	public function dateMail() { return $this->dateMail; }
}
?>