<?php

namespace Application\Model;

class SempleModel
{
	private $engine;
	private $primary;
	private $text;

	public function getEngine()
	{
		return $this->engine;
	}

	public function setEngine($engine)
	{
		$this->engine = $engine;
		return $this;
	}

	public function getPrimary()
	{
		return $this->primary;
	}

	public function setPrimary($primary)
	{
		if(!is_int($primary)) {
			throw new \Exception("Primário ({$primary}) deve ser um número inteiro!");
		}
		$this->primary = $primary;
		return $this;
	}

	public function getText()
	{
		return $this->text;
	}

	public function setText($text)
	{
		return $this->text;
	}
}