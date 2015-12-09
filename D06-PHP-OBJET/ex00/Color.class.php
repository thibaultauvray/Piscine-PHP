<?php

Class Color
{
	public static $verbose = False;
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	private $rgbArray;

	private function hex2RGB($hexStr)
	{
		$tmp = intval($hexStr);
		$tmp = dechex($tmp);		
		$len = 6 - strlen($tmp);
		$i = 0;
		while ($i < $len)
		{
			$hex = $hex."0";
			$i++;
		}
		$hex = $hex.$tmp;
		$hexStr = $hex;
		$rgbArray = array();

		if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        	$colorVal = hexdec($hexStr);
        	$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        	$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        	$rgbArray['blue'] = 0xFF & $colorVal;
    	}

    	elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        	$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        	$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        	$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    	} 
    	else 
    	{
        	return false; //Invalid hex color code
    	}
    	return ($rgbArray);
	}

	static function doc()
	{
		return (file_get_contents('Color.doc.txt'));
	}
	public function __construct( array $kwargs )
	{
		if (array_key_exists('rgb', $kwargs))
		{
			$rgbArray = $this->hex2RGB($kwargs['rgb']);
			$this->red = $rgbArray['red'];
			$this->green = $rgbArray['green'];
			$this->blue = $rgbArray['blue'];
		}
		else if ($kwargs['red'] !== NULL && $kwargs['green'] !== NULL && $kwargs['blue'] !== NULL)
		{
			foreach ($kwargs as $key => $val)
				$val = intval($val);
			$this->red = round($kwargs['red']);
			$this->green = round($kwargs['green']);
			$this->blue = round($kwargs['blue']);
		}
		if ($this->red < 0)
			$this->red = 0;
		if ($this->green < 0)
			$this->green = 0;
		if ($this->blue < 0)
			$this->blue = 0;
		if ($this->red > 255)
			$this->red = 255;
		if ($this->green > 255)
			$this->green = 255;
		if ($this->blue > 255)
			$this->blue = 255;
		if (self::$verbose === True)
			print('Color( red: '.sprintf("%3s",$this->red).', green: '.sprintf("%3s",$this->green).', blue: '.sprintf("%3s", $this->blue).' ) constructed.'.PHP_EOL);
	}

	public function __destruct()
	{
		if (self::$verbose === True)
			print('Color( red: '.sprintf("%3s", $this->red).', green: '.sprintf("%3s", $this->green).', blue: '.sprintf("%3s", $this->blue).' ) destructed.'.PHP_EOL);
	}
	public function __toString()
	{
		return('Color( red: ' . sprintf("%3s", $this->red) .', green: ' . sprintf("%3s", $this->green) . ', blue: '. sprintf("%3s", $this->blue) .' )');
	}
	public function add ( $color)
	{

		return (new Color( array( 'red' => $color->red + $this->red, 'green' => $color->green + $this->green, 'blue' => $color->blue + $this->blue )));
	}
	public function sub( $color)
	{
		return (new Color( array( 'red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $$this->blue - $color->blue)));
	}
	public function mult ( $color)
	{
		$red = $color * $this->red;
		$green = $color * $this->green;
		$blue = $color * $this->blue;
		return (new Color( array( 'red' => $color * $this->red, 'green' => $color * $this->green, 'blue' => $color * $this->blue)));
	}

}


?>