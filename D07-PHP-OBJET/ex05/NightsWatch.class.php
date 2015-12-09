<?php
Class NightsWatch implements IFighter
{
	private $array;

	public function recruit( $some )
	{
		if ($some instanceof IFighter)
		{
			$this->array[] = $some;
		}
	}

	public function fight()
	{
		foreach ($this->array as $key => $value) {
			$value->fight();
		}
	}
}

?>