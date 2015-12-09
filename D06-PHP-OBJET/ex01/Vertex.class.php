<?php
	require_once('Color.class.php');

	Class Vertex
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w;
		private $_color;
		public static $verbose = False;

		static function doc()
		{
			return (file_get_contents('Vertex.doc.txt'));
		}
		public function __get($attr)
		{
			return ($this->$attr);
		}

		public function getX()
		{
			return ($this->_x);
		}
		public function getY()
		{
			return ($this->_y);
		}
		public function getZ()
		{
			return ($this->_z);
		}
		public function getW()
		{
			return ($this->_w);
		}
		public function getC()
		{
			return ($this->_color);
		}
		public function setX($x_values)
		{
			return ($this->_x = $x_values);
		}
		public function setY($y_values)
		{
			return ($this->_y = $y_values);
		}
		public function setZ($z_values)
		{
			return ($this->_z = $z_values);
		}
		public function setW($w_values)
		{
			return ($this->_w = $w_values);
		}
		public function setC($color_values)
		{
			return ($this->_Color = $color_values);
		}

		public function __construct( array $kwargs )
		{
			$this->_w = 1.00;
			$this->_color = $this->setC(new Color(array( 'red' =>   255, 'green' =>   255, 'blue' => 255 )));
			if ($kwargs['x'] !== NULL && $kwargs['y'] !== NULL && $kwargs['z'] !== NULL)
			{
				$this->_x = $kwargs['x'];
				$this->_y = $kwargs['y'];
				$this->_z = $kwargs['z'];
				if (array_key_exists('w', $kwargs))
					$this->_w = $kwargs['w'];
				if (array_key_exists('color', $kwargs))
					$this->_color = $kwargs['color'];
			}
			if (self::$verbose === True)
			{
				print('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).', '.$this->_color.' ) constructed'.PHP_EOL);			
			}
		}

		public function __destruct()
		{
			if (self::$verbose === True)
			{
				print('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).', '.$this->_color.' ) destructed'.PHP_EOL);			
			}
		}

		public function __toString()
		{
			if (self::$verbose === True)
				return('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).', '.$this->_color.' )');
			else
				return('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).' )');

		}

	}

?>