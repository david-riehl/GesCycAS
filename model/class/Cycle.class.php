<?php


class Cycle
{
	private $id = 0;
	private $nom = "";
	private $debut = "";
	private $nbseances = 0;
	private $actif = false;
	
	public function __construct(array $info)
	{
		$this->hydrate($info);
	}
	
	public function setId($var)
	{
		$this->id = $var;
	}
	
	public function setNom($var)
	{
		$this->nom = $var;
	}
	
	public function setDebut($var)
	{
		$this->debut = $var;
	}
	
	public function setNbseances($var)
	{
		$this->nbseances = $var;
	}
	
	public function setActif($var)
	{
		$this->actif = $var;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getNom()
	{
		return $this->nom;
	}
	
	public function getDebut()
	{
		return $this->debut;
	}
	
	public function getNbseances()
	{
		return $this->nbseances;
	}
	
	public function getActif()
	{
		return $this->actif;
	}
	
	public function hydrate(array $info)
	{
		foreach ($info as $key => $value)
		{
			$method = 'set'.ucfirst($key);
					
			 
			if (method_exists($this, $method))
			{
			   
				$this->$method($value);
			  }
		}
	}
}


?>
