<?php
	class Lieu_Mapper extends Data_Mapper
	{
		private static $name = "Lieu";

		
		public static $fields = array(
			array('name' => 'id','type' => 'int','constraint' => 'NOT NULL','options' => 'AUTO_INCREMENT'),
			array('name' => 'nom', 'type' => 'varchar', 'size' => 50,'constraint' => 'NOT NULL'),
		
		);
		
		public static $primary_key = array('id');
		public static $foreign_key = array();
		public static $values = array(
			'init' => array(
			),
			'test' => array(
			)
		);
		
		public static function get_name()
		{
			return self::$name;
		}
		
		public static function get_fields()
		{
			return self::$fields;
		}
		
		public static function get_primary_key()
		{
			return self::$primary_key;
		}
		
		public static function get_foreign_key()
		{
			return self::$foreign_key;
		}
		
		public static function get_init_values()
		{
			return self::$values['init'];
		}
		
		public static function get_test_values()
		{
			return self::$values['test'];
		}
		
		public static function insert()
		{
			$table = self::$name;
			$fields = func_get_arg(0);
			// $fields[$index]
			$values = func_get_arg(1);
			// $values[$row_index][$value_index]
			return Database::insert_into($table,$fields,$values);
		}
		
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
		
		public static function select()
		{
			$select = array();
			$where = array();
			$group_by = array();
			$having = array();
			$order_by = array();
			$limit = array();
			
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