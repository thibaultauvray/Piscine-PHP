<?php
abstract class House{
	abstract public function getHouseName();
	abstract public function getHouseMotto();
	abstract public function getHouseSeat();

	public function introduce()
	{
		print("House ");
		print($this->getHouseName());
		print(" of ");
		print($this->getHouseSeat());
		print(' :  "');
		print($this->getHouseMotto());
		print('"' . PHP_EOL);
	}	
}

?>