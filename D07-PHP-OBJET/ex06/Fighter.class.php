<?php
abstract class Fighter
{
	abstract function fight($k);

	public $type_soldier;
	public function __construct( $type )
	{
		$this->type_soldier = $type;
	}
	public function getType()
	{
		return ($this->type_soldier);
	}

	public function __clone()
	{
		
	}

}

?>