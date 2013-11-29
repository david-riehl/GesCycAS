<?php
	/**
	 * Abstract Class for basic Object to Relationnal Mapping
	 * @author D. [R]IEHL
	 * @version 1.0
	 * @abstract
	 */
	abstract class Data_Mapper
	{
		/**
		 * @access private
		 * @staticvar string $name name of the table
		 */
		private static $name = "";
		
		/**
		 * @access public
		 * @staticvar array $fields array describing the table's structure
		 */
		public static $fields = array(
			// array('name' => 'id','type' => 'int','constraint' => 'NOT NULL','options' => 'AUTO_INCREMENT'),
			// array('name' => 'nom', 'type' => 'varchar', 'size' => 20)
			// array('name' => 'id_', 'type' => 'int')
		);
		
		/**
		 * @access private
		 * @staticvar array $primary_key fields assigned as being the primary key
		 */
		private static $primary_key = array(/*'id'*/);
		
		/**
		 * @access private
		 * @staticvar array $foreign_key array fields participating in a foreign key
		 */
		private static $foreign_key = array(
			// array(
				// 'Foreign Key' => array('id_other'),
				// 'table' => 'other',
				// 'Primary Key' => array('id')
			// )
		);
		
		/**
		 * @access private
		 * @staticvar array $values default values to initiate the database or for tests
		 */
		private static $values = array(
			'init' => array(
				// array(1, "test 1", 1)
			),
			'test' => array(
				// array(1, "test 1", 1)
			)
		);
		
		/**
		 * Return table name
		 * @access public
		 * @return string
		 */
		public static function get_name()
		{
			return self::$name;
		}

		/**
		 * Return table structure
		 * @access public
		 * @return array
		 */
		public static function get_fields()
		{
			return self::$fields;
		}
		
		/**
		 * Return fields from primary key
		 * @access public
		 * @return array
		 */
		public static function get_primary_key()
		{
			return self::$primary_key;
		}
		
		/**
		 * Return fields involved in a foreign key
		 * @access public
		 * @return array
		 */
		public static function get_foreign_key()
		{
			return self::$foreign_key;
		}
		
		/**
		 * Return the initiate values
		 * @access public
		 * @return array
		 */
		public static function get_init_values()
		{
			return self::$values['init'];
		}
		
		/**
		 * Return the test values
		 * @access public
		 * @return array
		 */
		public static function get_test_values()
		{
			return self::$values['test'];
		}
		
		/**
		 * Return result from generic {@link Database::insert_into()} function
		 * @uses Database::insert_into()
		 * @access public
		 * @return array
		 */
		public static function insert()
		{
			$table = self::$name;
			$fields = func_get_arg(0);
			// $fields[$index]
			$values = func_get_arg(1);
			// $values[$row_index][$value_index]
			return Database::insert_into($table,$fields,$values);
		}
		
		/**
		 * Return result from generic {@link Database::update()} function
		 * @uses Database::update()
		 * @access public
		 * @return array
		 */
		public static function update()
		{
			$where = array();
			if(func_num_args()==2)
			{
				$where = func_get_arg(1);
				// $where[$index]['field']
				// $where[$index]['operator']
				// $where[$index]['values']
				// $where[$index]['fields']
			}
			$set = func_get_arg(0);
			// $set[$index]['field']
			// $set[$index]['value']
			$table = self::$name;
			return Database::update($table,$set,$where);
		}
		
		/**
		 * Return result from generic {@link Database::delete_from()} function
		 * @uses Database::delete_from()
		 * @access public
		 * @return array
		 */
		public static function delete()
		{
			$where = array();
			if(func_num_args()==1)
			{
				$where = func_get_arg(0);
				// $where[$index]['field']
				// $where[$index]['operator']
				// $where[$index]['values']
				// $where[$index]['fields']
			}
			$table = self::$name;
			return Database::delete_from($table,$where);
		}
		
		/**
		 * Return results from generic {@link Database::select()} function
		 * @uses Database::select()
		 * @access public
		 * @return array
		 */
		public static function select()
		{
			$where = array();
			$group_by = array();
			$having = array();
			$order_by = array();
			$limit = array();
			
			$num = func_num_args();
			var_dump($num);
			
			switch(func_num_args())
			{
				case '6':
					$limit = func_get_arg(5);
					// $limit['offset']
					// $limit['rows']
				case '5':
					$order_by = func_get_arg(4);
					// $order_by[$index]['field']
					// $order_by[$index]['direction']
				case '4':
					$having = func_get_arg(3);
					// $having[$index]['function']
					// $having[$index]['field']
					// $having[$index]['operator']
					// $having[$index]['values']
					// $having[$index]['fields']
				case '3':
					$group_by = func_get_arg(2);
					// $group_by[$index] => field
				case '2':
					$where = func_get_arg(1);
					// $where[$index]['field']
					// $where[$index]['operator']
					// $where[$index]['values']
					// $where[$index]['fields']
				case '1':
					$select = func_get_arg(0);
					var_dump($select);
					// $select['fields']
					// $select['functions']['index']['function']
					// $select['functions']['index']['field']
					// $select['functions']['index']['alias']
			}
			$from = array('table' => self::$name);
			return Database::select($select,$from,$where,$group_by,$having,$order_by,$limit);
		}
	}
?>