<?php

require_once 'Vertex.class.php';

	Class Vector
	{
		private $_x = 1.0;
		private $_y = 1.0;
		private $_z = 1.0;
		private $_w = 0.0;
		public static $verbose = False;

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
		public function magnitude()
		{
			return (sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)));
		}
		public function normalize()
		{
			$norme = $this->magnitude();
			return (new Vector(['dest' => new Vertex(['x' => $this->_x / $norme, 'y' => $this->_y / $norme, 'z' => $this->_z / $norme])]));
		}

		public function add ($rhs)
		{
			$x = $this->getX() + $rhs->getX();
			$y = $this->getY() + $rhs->getY();
			$z = $this->getZ() + $rhs->getZ();
			$vec = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z, 'w' => 0 ) );
			return (new Vector(array('dest' => $vec)));
		}

		public function sub ($rhs)
		{
			$x = $this->getX() - $rhs->getX();
			$y = $this->getY() - $rhs->getY();
			$z = $this->getZ() - $rhs->getZ();
			$vec = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z, 'w' => 0 ) );
			return (new Vector(array('dest' => $vec)));
		}

		public function scalarProduct($k)
		{
			return (new Vector(['dest' => new Vertex(['x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k])]));
		}

		public function dotProduct($rhs)
		{
			$x = $this->getX() * $rhs->getX();
			$y = $this->getY() * $rhs->getY();
			$z = $this->getZ() * $rhs->getZ();
			return ($x + $y + $z);
		}

		public function cos($rhs)
		{
			return ($this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z) / 
			sqrt(($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z) * ($rhs->_x * $rhs->_x +
				  $rhs->_y * $rhs->_y + $rhs->_z * $rhs->_z));

		}

		public function crossProduct($rhs)
		{
		return new Vector(array("x" =>	$this->_y * $rhs->_z -
										$this->_z * $rhs->_y,
								"y" =>	$this->_z * $rhs->_x -
										$this->_x * $rhs->_z,
								"z" =>	$this->_x * $rhs->_y -
										$this->_y * $rhs->_x));

		}
		public function opposite()
		{
			$x = $this->getX() * -1;
			$y = $this->getY() * -1;
			$z = $this->getZ() * -1;
			$tab = new Vertex ( array('x' => $x, 'y' => $y, 'z' => $z, 'w' => $this->getW()));
			return (new Vector( array('dest' => $tab)));
		}
		static function doc()
		{
			return (file_get_contents('Vector.doc.txt'));
		}
		public function __construct( array $kwargs )
		{
		if (array_key_exists("x", $kwargs) &&
			array_key_exists("y", $kwargs) &&
			array_key_exists("z", $kwargs))
		{
			$this->_x = $kwargs["x"];
			$this->_y = $kwargs["y"];
			$this->_z = $kwargs["z"];
		}
		else
		{
			if (!array_key_exists("orig", $kwargs) )
				$kwargs["orig"] = new Vertex(array("x" => 0.0,
												   "y" => 0.0,
												   "z" => 0.0));
			$this->_x = $kwargs["dest"]->getX() - $kwargs["orig"]->getX();
			$this->_y = $kwargs["dest"]->getY() - $kwargs["orig"]->getY();
			$this->_z = $kwargs["dest"]->getZ() - $kwargs["orig"]->getZ();
			$this->_w = 0.0;
		}

			if (self::$verbose === True)
				print('Vector( x:'.sprintf("%.2f", $this->getX()).', y:'.sprintf("%.2f", $this->getY()).', z:'.sprintf("%.2f", $this->getZ()).', w:'.sprintf("%.2f", $this->getW()).' ) constructed'.PHP_EOL);

		}
		public function __toString()
		{
			return('Vector( x:'.sprintf("%.2f", $this->getX()).', y:'.sprintf("%.2f", $this->getY()).', z:'.sprintf("%.2f", $this->getZ()).', w:'.sprintf("%.2f", $this->getW()).' )');
		}
		public function __destruct()
		{
			print('Vector( x:'.sprintf("%.2f", $this->getX()).', y:'.sprintf("%.2f", $this->getY()).', z:'.sprintf("%.2f", $this->getZ()).', w:'.sprintf("%.2f", $this->getW()).' ) destructed'.PHP_EOL);
		}

	} 