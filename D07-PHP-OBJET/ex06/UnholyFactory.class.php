<?php

class UnholyFactory
{
	private $array = array();
	private $fabricate = array();
	private $absorb;
	private $type_f;

	public function absorb( $type )
	{
		if ($type instanceof Fighter)
		{
			if (in_array($type, $this->array))
				print("(Factory already absorbed a fighter of type ");
			else
			{
				print("(Factory absorbed a fighter of type ");
				$this->array[] =  $type;
			}
			print($type->getType() . ")");
			print(PHP_EOL);
		}
		else
		{
			print("(Factory can't absorb this, it's not a fighter)");
			print(PHP_EOL);
		}
	}

	private function ft_change($rf)
	{
		if ($rf === "foot soldier")
			return "Footsoldier";
		else if ($rf === "llama")
			return "Llama";
		else if ($rf === "archer")
			return "Archer";
		else if ($rf === "assassin")
			return "Assassin";
	}

	public function fabricate( $rf )
	{
		$this->type_f = $this->ft_change($rf);
		foreach ($this->array as $key => $value) {
			if (get_class($value) === $this->type_f)
			{
				$new = clone $this->array[$key];
				print("(Factory fabricates a fighter of type " . $rf . ")". PHP_EOL);
				return ($new);
			}
		}
		print("(Factory hasn't absorbed any fighter of type ". $rf . ")". PHP_EOL);
	}

	public function fight( $t )
	{
		echo "OK";
		print_r($this->fabricate);
	}
}

?>