<?php

Class Jaime extends Lannister
{
	public function with( $obj )
	{
		if (get_parent_class($obj) !== 'Lannister')
		{
			return ("Let's do this");
		}
		elseif (get_class($obj) === "Cersei")
		{
			return ("With pleasure, but only in a tower in Winterfell, then");
		}
		else
		{
			return ("Not even if I'm drunk !");
		}
	}
}

?>