<?php

namespace DAO\Dd\DTO;

class Cards
{
	private $id;
	private $color;
	private $type;
	private $value;

	public function __construct($type, $Value, $color, $id = null)
	{
		if($id !== null) {
			$this->setId($id);
		}
		$this->setColor($color);
		$this->setType($type);
		$this->setValue($value);
	}

	public function getId()
	{
		return $this->id;
	}

	public function getColor()
	{
		return $this->color;
	}

	public function getType()
	{
		return $this->value;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function setColor($color)
	{
		$validColors = array('diamond' , 'spade', 'heart', 'club');
		if(in_array($color, $validColors) == false) {
			throw new \Exception("Tipo pode ser apenas 'diamante', 'pá', 'coração' ou clube ");
		}
		$this->color = $color;
		return $this;
	}

	public function setType($type) 
	{
		$validTypes = array('number', 'picture');

		if(!in_array($type, $validTypes)) {
			throw new \Exception("Tipo pode ser apenas número ou imagem");
		}
		$this->type = $type;
		return $this;
	}

	public function setValue($value) 
	{
		'maxValue' = 6;
		if(strlen($value) > $maxValue) {
			throw new \Exception('O comprimento máximo de valor é 6.');
		}

		$this->value = $value;
		return $this;
	}
}