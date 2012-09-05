<?php

if( $_SERVER[ 'SCRIPT_FILENAME' ] == __FILE__ )
	die( 'Access denied.' );

if( !class_exists( 'WPPSNonStaticClass' ) )
{
	/**
	 * @package WordPressPluginSkeleton
	 * @author Ian Dunn <ian@iandunn.name>
	 */
	class WPPSNonStaticClass
	{
		protected $foo, $bar;
		protected $readableProtectedVars, $writableProtectedVars;
		const FOO	= 'foo';
		const BAR	= 'bar';


		/*
		 * Magic methods
		 */

		/**
		 * Constructor
		 * @mvc Controller
		 * @author Ian Dunn <ian@iandunn.name>
		 */
		public function __construct( $foo, $bar )
		{
			$this->foo						= $foo;
			$this->bar						= $bar;

			$this->readableProtectedVars	= array( 'foo', 'bar' );
			$this->writableProtectedVars	= array( 'foo' );

			if( !$this->isValid() )
				throw new Exception( __METHOD__ . " error: constructor input was invalid." );
		}

		/**
		 * Public getter for protected variables
		 * @mvc Model
		 * @author Ian Dunn <ian@iandunn.name>
		 * @param string $variable
		 * @return mixed
		 */
		public function __get( $variable )
		{
			if( in_array( $variable, $this->readableProtectedVars ) )
				return $this->$variable;
			else
				throw new Exception( __METHOD__ . " error: $". $variable ." doesn't exist or isn't readable." );
		}

		/**
		 * Public setter for protected variables
		 * @mvc Model
		 * @author Ian Dunn <ian@iandunn.name>
		 * @param string $variable
		 * @param mixed $value
		 */
		public function __set( $variable, $value )
		{
			if( in_array( $variable, $this->writableProtectedVars ) )
			{
				$this->$variable = $value;
				
				if( !$this->isValid() )
					throw new Exception( __METHOD__ . ' error: input was invalid.' );
			}
			else
				throw new Exception( __METHOD__ . " error: $". $variable ." doesn't exist or isn't writable." );
		}



		/*
		 * Static methods
		 */

		/**
		 * Does static stuff
		 * @mvc Controller
		 * @author Ian Dunn <ian@iandunn.name>
		 */
		public static function doStaticStuff()
		{
			// Do static stuff
		}


		/*
	  	 * Non-static methods
		 */

		/**
		 * Checks that the object is in a correct state
		 * @mvc Model
		 * @author Ian Dunn <ian@iandunn.name>
		 * @return bool
		 */
		protected function isValid()
		{
			if( empty( $this->foo ) )
				return false;
			
			if( !is_numeric( $this->bar ) )
				return false;

			return true;
		}

		/**
		 * Does non-static stuff
		 * @mvc Model
		 * @author Ian Dunn <ian@iandunn.name>
		 * @return bool
		 */
		public function doNonStaticStuff()
		{
			// do non-static stuff
			
			return true;
		}
	} // end WPPSNonStaticClass
}

?>