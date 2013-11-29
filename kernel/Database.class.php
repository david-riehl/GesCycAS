<?php
	/**
	 * Database Access Management Class
	 * @author D. [R]IEHL
	 * @version 1.0
	 */
	class Database
	{
		/**
		 * static constants definitions
		 */
		const host = "127.0.0.1";       # host
		// const host = "172.20.4.253";       # host
		const driver = "mysql";         # driver
		const user = "root";            # database user
		const password = "";            # database password
		const name = "exemple";         # database name
		const charset = "utf8";         # database querying charset
		const engine = "InnoDB";        # table default engine
		
		/**
		 * Database Handle
		 * @access private
		 * staticvar PDO  $dbh provides the database access
		 */
		private static $dbh;
		
		/**
		 * Return database host
		 * @access public
		 * @return string
		 */
		public static function get_host()
		{
			return self::host;
		}

		/**
		 * Return database driver
		 * @access public
		 * @return string
		 */
		public static function get_driver()
		{
			return self::driver;
		}

		/**
		 * Return database user
		 * @access public
		 * @return string
		 */
		public static function get_user()
		{
			return self::user;
		}

		/**
		 * Return database password
		 * @access public
		 * @return string
		 */
		public static function get_password()
		{
			return self::password;
		}

		/**
		 * Return database name
		 * @access public
		 * @return string
		 */
		public static function get_name()
		{
			return self::name;
		}
		
		/**
		 * Return database querying charset
		 * @access public
		 * @return string
		 */
		public static function get_charset()
		{
			return self::charset;
		}
		
		/**
		 * Return database generated connexion string
		 * @access public
		 * @return string
		 */
		public static function get_connexion_string()
		{
			return $connexion=self::driver.":host=".self::host.";";
		}
		
		/**
		 * Open database connexion and backup batabase system variables
		 * @access public
		 */
		public static function connect()
		{
			self::$dbh = new PDO(self::get_connexion_string(),self::user,self::password);
			$queriesString = "
				SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT;
				SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
				SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION;
				SET NAMES ".self::charset.";
				SET @OLD_TIME_ZONE=@@TIME_ZONE;
				SET TIME_ZONE='+00:00';
				SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
				SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
				SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
				SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0;
				";
			$queriesArray = explode(";",$queriesString);
			foreach ($queriesArray as $query)
			{
				self::$dbh->exec($query);
			}
		}
		
		/**
		 * Restore batabase system variables to old values and close database connexion
		 * @access public
		 */
		public static function disconnect()
		{
			$queriesString = "
				SET SQL_MODE=@OLD_SQL_MODE;
				SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
				SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
				SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT;
				SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS;
				SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION;
				SET SQL_NOTES=@OLD_SQL_NOTES;
				";
			$queriesArray = explode(";",$queriesString);
			
			foreach ($queriesArray as $query)
			{
				self::$dbh->exec($query);
			}
			self::$dbh = null;
		}

		/**
		 * Check database connexion object
		 * @access public
		 * @return bool
		 */
		public static function is_connected()
		{
			return is_object(self::$dbh);
		}
		
		/**
		 * Create database, tables, insert values, add foreign key constraints
		 * @access public
		 */
		public static function deploy()
		{
			global $PARAM;
			$files = get_files($PARAM['folders']['model']['class']);
			$sql = "";
			
			Database::connect();
			
			self::create_database();
			self::select_database();
			
			foreach($files as $file)
			{
				$class_name = substr($file,0,strlen($file)-10);
				$mapper = $class_name."_Mapper";
				$table = $mapper::get_name();
				$fields = $mapper::get_fields();
				$field_names = array();
				foreach($fields as $field)
				{
					$field_names[] = $field['name'];
				}
				$primary_key = $mapper::get_primary_key();
				$foreign_key = $mapper::get_foreign_key();
				$init_values = $mapper::get_init_values();
				$test_values = $mapper::get_test_values();
				
				
				self::create_table($table,$fields,$primary_key,$foreign_key);
				if(!empty($init_values))
				{
					self::insert_into($table,$field_names,$init_values);
				}
				if(!empty($test_values))
				{
					self::insert_into($table,$field_names,$test_values);
				}
			}
			self::import_csv_files();
			self::import_sql_files();
			foreach($files as $file)
			{
				$class_name = substr($file,0,strlen($file)-10);
				$mapper = $class_name."_Mapper";
				$table = $mapper::get_name();
				$foreign_key = $mapper::get_foreign_key();
				
				
				if(! empty($foreign_key))
				{
					self::add_constraint($table,$foreign_key);
				}
			}
			
			Database::disconnect();
		}
		
		/**
		 * Prepare a SQL Query
		 * @access public
		 * @return PDOStatement
		 */
		public static function prepare($sql)
		{
			return self::$dbh->prepare($sql);
		}
		
		/**
		 * Check out database existence
		 * @access public
		 * @return bool
		 */
		public static function database_exists()
		{
			$query = "show databases;";
			$stmt = self::$dbh->prepare($query);
			$stmt->execute();
			$row = array();
			while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) && $row['Database'] != self::name);
			return is_array($row);
		}
		
		/**
		 * Create database
		 * @access public
		 * @return bool
		 */
		public static function create_database()
		{
			$sql = '';
			$sql.= "\r\n";
			$sql.= '-- --------------------------------------------------------' . "\r\n";
			$sql.= "\r\n";
			$sql.= '--' . "\r\n";
			$sql.= '-- base de données `' . self::name . '`' . "\r\n";
			$sql.= '--' . "\r\n";
			$sql.= "\r\n";
			$sql.= 'DROP DATABASE IF EXISTS `'.self::name.'`;'."\r\n";
			$sql.= 'CREATE DATABASE `'.self::name.'`;';
			
			if(self::is_connected())
			{
				$outer_connection = true;
			}
			else
			{
				$outer_connection = false;
				Database::connect();
			}
			
			$sth = Database::prepare($sql);
			$result = $sth->execute();
			if(!$result)
			{
				var_dump($sql);
				var_dump($sth->errorInfo());
			}
			
			if(!$outer_connection)
			{
				Database::disconnect();
			}
			
			return $result;
		}
		
		/**
		 * Select the database to use
		 * @access public
		 * @return bool
		 */
		public static function select_database()
		{
			$sql = 'USE `'.self::name.'`;';
			$sth = Database::prepare($sql);
			$result = $sth->execute();
			return $result;
		}
		
		/**
		 * Check out database selection
		 * @access public
		 * @return bool
		 */
		public static function database_is_selected()
		{
			$sql = 'SELECT database();';
			$sth = Database::prepare($sql);
			$result = $sth->execute();
			$result = $sth->fetch(PDO::FETCH_ASSOC);
			if($result['database()'] != self::name)
			{
				var_dump($result['database()']);
			}
			return ($result['database()'] == self::name);
		}
		
		/**
		 * Create table
		 * @access public
		 * @param string $table table name
		 * @param array $fields fields definition
		 * @param array $primary_key primary key definition
		 * @param array $foreign_key foreign key definition
		 * @return bool
		 */
		public static function create_table()
		{
			switch(func_num_args())
			{
				case '4':
					$foreign_key = func_get_arg(3);
					// $foreign_key[$index]['foreign key'][$index]
					// $foreign_key[$index]['table']
					// $foreign_key[$index]['primary key'][$index]
				case '3':
					$primary_key = func_get_arg(2);
					// $primary_key[$index]
				case '2':
					$fields = func_get_arg(1);
					// $fields[$index]['name']
					// $fields[$index]['type']
					// $fields[$index]['size']
					// $fields[$index]['constraint']
					// $fields[$index]['default']
					// $fields[$index]['options']
					// $fields[$index]['unique']
					// $fields[$index]['primary']
					// $fields[$index]['references']
					// $fields[$index]['comment']
				case '1':
					$table = func_get_arg(0);
			}
			
			$sql = '';
			$sql.= "\r\n";
			$sql.= '-- --------------------------------------------------------' . "\r\n";
			$sql.= "\r\n";
			$sql.= '--' . "\r\n";
			$sql.= '-- structure de la table `' . $table . '`' . "\r\n";
			$sql.= '--' . "\r\n";
			$sql.= "\r\n";
			$sql.= 'CREATE TABLE IF NOT EXISTS `' . $table . '` (' . "\r\n";
			
			foreach($fields as $field)
			{
				$sql.= "\t" . '`' . $field['name'] . '`';
				$sql.= ' ' . $field['type'];
				if($field['type'] == 'int' && ! isset($field['size']))
				{
					$field['size'] = 11;
				}
				if(isset($field['size']))
				{
					$sql.= '(' . $field['size'] . ')';
				}
				if(isset($field['constraint']))
				{
					$sql.= ' ' . $field['constraint'];
				}
				if(isset($field['default']))
				{
					$sql.= ' DEFAULT ' . $field['default'];
				}
				if(isset($field['options']))
				{
					$sql.= ' ' . $field['options'];
				}
				if(isset($field['unique']))
				{
					$sql.= ' UNIQUE KEY';
				}
				if(isset($field['primary']))
				{
					$sql.= ' PRIMARY KEY';
				}
				if(isset($field['references']))
				{
					$sql.= ' REFERENCES ' . $field['references'];
				}
				if(isset($field['comment']))
				{
					$sql.= ' COMMENT ' . "'" . $field['comment']."'";
				}
				$sql.= ',' . "\r\n";
			}
			if(isset($primary_key) && ! empty($primary_key))
			{
				$sql.= "\t" . 'PRIMARY KEY (';
				foreach($primary_key as $item)
				{
					$sql.= '`' . $item . '`,';
				}
				$sql = substr($sql,0,strlen($sql)-1);
				$sql.= ')';
				$sql.= ',' . "\r\n";
			}
			if(isset($foreign_key))
			{
				foreach($foreign_key as $item)
				{
					foreach($item['Foreign Key'] as $field)
					{
						$sql.= "\t" . 'KEY `' . $field . '` (`' . $field . '`),' . "\r\n";
					}
				}
			}
			
			$sql = substr($sql,0,strlen($sql)-3) . "\r\n";
			$sql.= ') ENGINE='.self::engine.'  DEFAULT CHARSET='.self::charset.';';
			
			if(self::is_connected())
			{
				$outer_connection = true;
			}
			else
			{
				$outer_connection = false;
				Database::connect();
				Database::select_database();
			}
			
			$sth = Database::prepare($sql);
			$result = $sth->execute();
			if(!$result)
			{
				var_dump($sql);
				var_dump($sth->errorInfo());
			}
			if(!$outer_connection)
			{
				Database::disconnect();
			}
			
			return $result;
		}
		
		/**
		 * Add foreign key constraints
		 * @access public
		 * @param string $table table name
		 * @param array $foreign_key foreign key definition
		 * @return bool
		 */
		public static function add_constraint()
		{
			$table = func_get_arg(0);
			$foreign_key = func_get_arg(1);
			// $foreign_key[$index]['foreign key'][$index]
			// $foreign_key[$index]['table']
			// $foreign_key[$index]['primary key'][$index]
			$sql = "";
			if(isset($foreign_key) && ! empty($foreign_key))
			{
				$sql.= "\r\n";
				$sql.= '--' . "\r\n";
				$sql.= '-- Contraintes pour la table `' . $table . '`' . "\r\n";
				$sql.= '--' . "\r\n";
				$sql.= 'ALTER TABLE `' . $table . '`' . "\r\n";
				foreach($foreign_key as $index => $constraint)
				{
					$sql.= '  ADD CONSTRAINT `' . $table . '_ibfk_' . ($index + 1) .'` FOREIGN KEY (';
					foreach($constraint['Foreign Key'] as $field)
					{
						$sql.='`' . $field . '`,';
					}
					$sql = substr($sql,0,strlen($sql)-1);
					
					$sql.= ') REFERENCES `' . $constraint['table']. '` (';
					
					foreach($constraint['Primary Key'] as $field)
					{
						$sql.= '`' . $field . '`,';
					}
					$sql = substr($sql,0,strlen($sql)-1);
					$sql.= '),' . "\r\n";
				}
				$sql = substr($sql,0,strlen($sql)-3);
				$sql.= ';';
			}
			
			if(self::is_connected())
			{
				$outer_connection = true;
			}
			else
			{
				$outer_connection = false;
				Database::connect();
				Database::select_database();
			}
			$sth = Database::prepare($sql);
			$result = $sth->execute();
			if(!$result)
			{
				var_dump($sql);
				var_dump($sth->errorInfo());
			}
			if(!$outer_connection)
			{
				Database::disconnect();
			}
			
			return $result;
		}
		
		/**
		 * Insert values into a table
		 * @access public
		 * @param string $table table name
		 * @param array $fields fields list
		 * @param array $values values list
		 * @return bool
		 */
		public static function insert_into()
		{
			$values = func_get_arg(2);
			// $values[$row_index][$value_index]
			$fields = func_get_arg(1);
			// $fields[$index]
			$table = func_get_arg(0);
			
			$sql = "";
			
			if(!empty($values))
			{
				$sql = "\r\n";
				$sql.= '--' . "\r\n";
				$sql.= '-- Contenu de la table `' . $table . '`' . "\r\n";
				$sql.= '--' . "\r\n";
				$sql.= "\r\n";
				$sql.= 'INSERT INTO `' . $table . '` (';
				foreach($fields as $field)
				{
					$sql.= '`' . $field . '`,';
				}
				$sql = substr($sql,0,strlen($sql)-1);
				$sql.= ') VALUES' . "\r\n";
				foreach($values as $row_index => $row)
				{
					$sql.= '(';
					foreach($row as $value_index => $value)
					{
						if(is_null($value))
						{
							$sql.= 'NULL,';
						}
						else
						{
							$sql.= ':row_'.$row_index.'_value_'.$value_index.',';
						}
					}
					$sql = substr($sql,0,strlen($sql)-1);
					$sql.= '),' . "\r\n";
				}
				$sql = substr($sql,0,strlen($sql)-3);
				$sql.= ';';
			}
			
			if(self::is_connected())
			{
				$outer_connection = true;
			}
			else
			{
				$outer_connection = false;
				Database::connect();
				Database::select_database();
			}
			$sth = Database::prepare($sql);
			
			foreach($values as $row_index => $row)
			{
				foreach($row as $value_index => $value)
				{
					if(! is_null($value))
					{
						$sth->bindValue(':row_'.$row_index.'_value_'.$value_index,$value);
					}
				}
			}
			
			
			
			$result = $sth->execute();
			if(!$result)
			{
				var_dump($sql);
				var_dump($sth->errorInfo());
			}
			if(!$outer_connection)
			{
				Database::disconnect();
			}
			
			return $result;
		}
		
		/**
		 * Update values in a table
		 * @access public
		 * @param string $table table name
		 * @param array $set fields and values list
		 * @param array $where condition definition
		 * @return bool
		 */
		public static function update()
		{
			if(func_num_args() == 3)
			{
				$where = func_get_arg(2);
				// $where[$index]['field']
				// $where[$index]['operator']
				// $where[$index]['values']
				// $where[$index]['fields']
			}
			$set = func_get_arg(1);
			// $set[$index]['field']
			// $set[$index]['value']
			$table = func_get_arg(0);
			
			$sql  = 'UPDATE `'.$table.'`'."\r\n";
			$sql .= 'SET'."\r\n";
			// $set[$index]['field']
			// $set[$index]['value']
			foreach($set as $index => $row)
			{
				$sql .= '`'.$row['field'].'` = :set_value_'.$index.','."\r\n";				
			}
			$sql = substr($sql,0,strlen($sql)-3);
			$sql .= "\r\n";
			
			// $where[$index]['field']
			// $where[$index]['operator']
			// $where[$index]['values']
			// $where[$index]['fields']
			if(isset($where))
			{
				if(! empty($where))
				{
					foreach($where as $index => $row)
					{
						if(!$index)
						{
							$sql .= 'WHERE ';
						}
						else
						{
							$sql .= "\t".'AND ';
						}
						$item = explode('.',$row['field']);
						switch(count($item))
						{
							case 1:
								$field = $item[0];
								$sql .= '`'.$field.'`';
								break;
							case 2:
								$table = $item[0];
								$field = $item[1];
								$sql .= '`'.$table.'`.`'.$field.'`';
								break;
						}
						$row['operator'] = strtoupper($row['operator']);
						switch($row['operator'])
						{
							case '=' :
							case '<=' :
							case '>=' :
							case '<' :
							case '>' :
							case '<>' :
							case 'LIKE' :
								if(isset($row['values']))
								{
									$sql .= ' '.$row['operator'].' :where_'.$index.'_value_0';
								}
								elseif(isset($row['fields']))
								{
									$item = explode('.',$row['fields'][0]);
									switch(count($item))
									{
										case 1:
											$field = $item[0];
											$sql .= ' '.$row['operator'].' `'.$field.'`';
											break;
										case 2:
											$table = $item[0];
											$field = $item[1];
											$sql .= ' '.$row['operator'].' `'.$table.'`.`'.$field.'`';
											break;
									}
								}
								break;
							case 'BETWEEN' :
								if(isset($row['values']))
								{
									$sql .= ' '.$row['operator'].' :where_'.$index.'_value_0 AND :where_'.$index.'_value_1';
								}
								elseif(isset($row['fields']))
								{
									$sql .= ' '.$row['operator'].' ';
									$item = explode('.',$row['fields'][0]);
									switch(count($item))
									{
										case 1:
											$field = $item[0];
											$sql .= '`'.$field.'`';
											break;
										case 2:
											$table = $item[0];
											$field = $item[1];
											$sql .= '`'.$table.'`.`'.$field.'`';
											break;
									}
									$sql .= ' AND ';
									$item = explode('.',$row['fields'][1]);
									switch(count($item))
									{
										case 1:
											$field = $item[0];
											$sql .= '`'.$field.'`';
											break;
										case 2:
											$table = $item[0];
											$field = $item[1];
											$sql .= '`'.$table.'`.`'.$field.'`';
											break;
									}
								}
								break;
							case 'IN' :
								$sql .= ' '.$row['operator'].' (';
								if(isset($row['values']))
								{
									foreach($row['values'] as $row_index => $value)
									{
										$sql .= ':where_'.$index.'_value_'.$row_index.',';
									}
								}
								if(isset($row['fields']))
								{
									foreach($row['fields'] as $row_index => $field)
									{
										$item = explode('.',$field);
										switch(count($item))
										{
											case 1:
												$field = $item[0];
												$sql .= '`'.$field.'`';
												break;
											case 2:
												$table = $item[0];
												$field = $item[1];
												$sql .= '`'.$table.'`.`'.$field.'`';
												break;
										}
										$sql .= ',';
									}
								}
								$sql = substr($sql,0,strlen($sql)-1);
								$sql .= ')';
								break;
						}
						$sql .= "\r\n";
					}
				}
				else
				{
					$sql .= 'WHERE 1'."\r\n";
				}
			}
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .= ';';
			
			if(self::is_connected())
			{
				$outer_connection = true;
			}
			else
			{
				$outer_connection = false;
				Database::connect();
				Database::select_database();
			}
			$sth = Database::prepare($sql);
			
			if(func_num_args() == 3)
			{
				// $where[$index]['field']
				// $where[$index]['operator']
				// $where[$index]['values']
				// $where[$index]['fields']
				foreach($where as $index => $row)
				{
					if(isset($row['values']))
					{
						foreach($row['values'] as $val_index => $value)
						{
							$sth->bindValue(':where_'.$index.'_value_'.$val_index,$value);
						}
					}
				}
			}
			// $set[$index]['field']
			// $set[$index]['value']
			foreach($set as $index => $row)
			{
				$sth->bindValue(':set_value_'.$index,$row['value']);
			}
			
			$result = $sth->execute();
			if(!$result)
			{
				var_dump($sql);
				var_dump($sth->errorInfo());
			}
			if(!$outer_connection)
			{
				Database::disconnect();
			}
			
			return $result;
		}
		
		/**
		 * Delete values from a table
		 * @access public
		 * @param string $table table name
		 * @param array $where condition definition
		 * @return bool
		 */
		public static function delete_from()
		{
			if(func_num_args() == 2)
			{
				$where = func_get_arg(1);
				// $where[$index]['field']
				// $where[$index]['operator']
				// $where[$index]['values']
				// $where[$index]['fields']
			}
			$table = func_get_arg(0);
			$sql  = 'DELETE FROM `'.$table.'`'."\r\n";
			
			// $where[$index]['field']
			// $where[$index]['operator']
			// $where[$index]['values']
			// $where[$index]['fields']
			if(isset($where))
			{
				if(! empty($where))
				{
					foreach($where as $index => $row)
					{
						if(!$index)
						{
							$sql .= 'WHERE ';
						}
						else
						{
							$sql .= "\t".'AND ';
						}
						$item = explode('.',$row['field']);
						switch(count($item))
						{
							case 1:
								$field = $item[0];
								$sql .= '`'.$field.'`';
								break;
							case 2:
								$table = $item[0];
								$field = $item[1];
								$sql .= '`'.$table.'`.`'.$field.'`';
								break;
						}
						$row['operator'] = strtoupper($row['operator']);
						switch($row['operator'])
						{
							case '=' :
							case '<=' :
							case '>=' :
							case '<' :
							case '>' :
							case '<>' :
							case 'LIKE' :
								if(isset($row['values']))
								{
									$sql .= ' '.$row['operator'].' :where_'.$index.'_value_0';
								}
								elseif(isset($row['fields']))
								{
									$item = explode('.',$row['fields'][0]);
									switch(count($item))
									{
										case 1:
											$field = $item[0];
											$sql .= ' '.$row['operator'].' `'.$field.'`';
											break;
										case 2:
											$table = $item[0];
											$field = $item[1];
											$sql .= ' '.$row['operator'].' `'.$table.'`.`'.$field.'`';
											break;
									}
								}
								break;
							case 'BETWEEN' :
								if(isset($row['values']))
								{
									$sql .= ' '.$row['operator'].' :where_'.$index.'_value_0 AND :where_'.$index.'_value_1';
								}
								elseif(isset($row['fields']))
								{
									$sql .= ' '.$row['operator'].' ';
									$item = explode('.',$row['fields'][0]);
									switch(count($item))
									{
										case 1:
											$field = $item[0];
											$sql .= '`'.$field.'`';
											break;
										case 2:
											$table = $item[0];
											$field = $item[1];
											$sql .= '`'.$table.'`.`'.$field.'`';
											break;
									}
									$sql .= ' AND ';
									$item = explode('.',$row['fields'][1]);
									switch(count($item))
									{
										case 1:
											$field = $item[0];
											$sql .= '`'.$field.'`';
											break;
										case 2:
											$table = $item[0];
											$field = $item[1];
											$sql .= '`'.$table.'`.`'.$field.'`';
											break;
									}
								}
								break;
							case 'IN' :
								$sql .= ' '.$row['operator'].' (';
								if(isset($row['values']))
								{
									foreach($row['values'] as $row_index => $value)
									{
										$sql .= ':where_'.$index.'_value_'.$row_index.',';
									}
								}
								if(isset($row['fields']))
								{
									foreach($row['fields'] as $row_index => $field)
									{
										$item = explode('.',$field);
										switch(count($item))
										{
											case 1:
												$field = $item[0];
												$sql .= '`'.$field.'`';
												break;
											case 2:
												$table = $item[0];
												$field = $item[1];
												$sql .= '`'.$table.'`.`'.$field.'`';
												break;
										}
										$sql .= ',';
									}
								}
								$sql = substr($sql,0,strlen($sql)-1);
								$sql .= ')';
								break;
						}
						$sql .= "\r\n";
					}
				}
				else
				{
					$sql .= 'WHERE 1'."\r\n";
				}
			}
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .= ';';
			
			if(self::is_connected())
			{
				$outer_connection = true;
			}
			else
			{
				$outer_connection = false;
				Database::connect();
				Database::select_database();
			}
			$sth = Database::prepare($sql);
			
			
			
			if(func_num_args() == 2)
			{
				// $where[$index]['field']
				// $where[$index]['operator']
				// $where[$index]['values']
				// $where[$index]['fields']
				foreach($where as $index => $row)
				{
					if(isset($row['values']))
					{
						foreach($row['values'] as $val_index => $value)
						{
							$sth->bindValue(':where_'.$index.'_value_'.$val_index,$value);
						}
					}
				}
			}
			
			
			
			$result = $sth->execute();
			if(!$result)
			{
				var_dump($sql);
				var_dump($sth->errorInfo());
			}
			if(!$outer_connection)
			{
				Database::disconnect();
			}
			
			return $result;
		}
		
		/**
		 * Select values from table
		 * @access public
		 * @param array $select fields or functions to display
		 * @param array $from tables to link
		 * @param array $where conditions
		 * @param array $group_gy fields to group
		 * @param array $having conditions on aggregat function result
		 * @param array $order_by fields to sort
		 * @param array $limit rows to display
		 * @return bool
		 */
		public static function select()
		{
			switch(func_num_args())
			{
				case '7':
					$limit = func_get_arg(6);
					// $limit['offset']
					// $limit['rows']
				case '6':
					$order_by = func_get_arg(5);
					// $order_by[$index]['field']
					// $order_by[$index]['direction']
				case '5':
					$having = func_get_arg(4);
					// $having[$index]['function']
					// $having[$index]['field']
					// $having[$index]['operator']
					// $having[$index]['values']
					// $having[$index]['fields']
				case '4':
					$group_by = func_get_arg(3);
					// $group_by[$index] => field
				case '3':
					$where = func_get_arg(2);
					// $where[$index]['field']
					// $where[$index]['operator']
					// $where[$index]['values']
					// $where[$index]['fields']
				case '2':
					$from = func_get_arg(1);
					// $from['table']
					// $from['alias']
					// $from['join'][$index]['table']
					// $from['join'][$index]['alias']
					// $from['join'][$index]['table1']['name']
					// $from['join'][$index]['table1']['key']
					// $from['join'][$index]['table2']['name']
					// $from['join'][$index]['table2']['key']
			}
			$select = func_get_arg(0);
			// $select['fields']
			// $select['functions']['index']['function']
			// $select['functions']['index']['field']
			// $select['functions']['index']['alias']
			
			$sql = 'SELECT ';
			if(! empty($select))
			{
				if(isset($select['fields']))
				{
					foreach($select['fields'] as $field)
					{
						$item = explode('.',$field);
						switch(count($item))
						{
							case 1:
								$field = $item[0];
								$sql .= '`'.$field.'`,';
								break;
							case 2:
								$table = $item[0];
								$field = $item[1];
								$sql .= '`'.$table.'`.`'.$field.'`,';
								break;
						}
					}
				}
				if(isset($select['functions']))
				{
					foreach($select['functions'] as $index => $row)
					{
						$row['function'] = strtoupper($row['function']);
						if(in_array($row['function'],array('COUNT','SUM','MIN','MAX','AVG')))
						{
							$sql .= $row['function'].'(';
							if(isset($row['field']))
							{
								$item = explode('.',$row['field']);
								switch(count($item))
								{
									case 1:
										$field = $item[0];
										$sql .= '`'.$field.'`';
										break;
									case 2:
										$table = $item[0];
										$field = $item[1];
										$sql .= '`'.$table.'`.`'.$field.'`';
										break;
								}
							}
							else
							{
								$sql .= '*';
							}
							$sql .= ')';
							if(isset($row['alias']))
							{
								$sql .= ' AS :select_alias_'.$index;
							}
							$sql .= ',';
						}
					}
				}
				$sql = substr($sql,0,strlen($sql)-1);
			}
			else
			{
				$sql .= "*";
			}
			$sql .= "\r\n";
			
			
			// $from['table']
			// $from['alias']
			// $from['join'][$index]['table']
			// $from['join'][$index]['alias']
			// $from['join'][$index]['table1']['name']
			// $from['join'][$index]['table1']['key']
			// $from['join'][$index]['table2']['name']
			// $from['join'][$index]['table2']['key']
			$sql .= 'FROM `'.$from['table'].'`';
			if(isset($from['alias']))
			{
				$sql .= ' `'.$from['alias'].'`';
			}
			$sql .= "\r\n";
			
			if(isset($from['join']))
			{
				foreach($from['join'] as $index => $join)
				{
					$sql .= "\t".'INNER JOIN `'.$join['table'].'`';
					if(isset($join['alias']))
					{
						$sql .= ' `'.$join['alias'].'`';
					}
					$sql .= "\r\n";
					$sql .= "\t\t".'ON `'.$join['table1']['name'].'`.`'.$join['table1']['key'].'` = `'.$join['table2']['name'].'`.`'.$join['table2']['key'].'`'."\r\n";
				}
			}
			
			// $where[$index]['field']
			// $where[$index]['operator']
			// $where[$index]['values']
			// $where[$index]['fields']
			if(isset($where))
			{
				if(! empty($where))
				{
					foreach($where as $index => $row)
					{
						if(!$index)
						{
							$sql .= 'WHERE ';
						}
						else
						{
							$sql .= "\t".'AND ';
						}
						$item = explode('.',$row['field']);
						switch(count($item))
						{
							case 1:
								$field = $item[0];
								$sql .= '`'.$field.'`';
								break;
							case 2:
								$table = $item[0];
								$field = $item[1];
								$sql .= '`'.$table.'`.`'.$field.'`';
								break;
						}
						$row['operator'] = strtoupper($row['operator']);
						switch($row['operator'])
						{
							case '=' :
							case '<=' :
							case '>=' :
							case '<' :
							case '>' :
							case '<>' :
							case 'LIKE' :
								if(isset($row['values']))
								{
									$sql .= ' '.$row['operator'].' :where_'.$index.'_value_0';
								}
								elseif(isset($row['fields']))
								{
									$item = explode('.',$row['fields'][0]);
									switch(count($item))
									{
										case 1:
											$field = $item[0];
											$sql .= ' '.$row['operator'].' `'.$field.'`';
											break;
										case 2:
											$table = $item[0];
											$field = $item[1];
											$sql .= ' '.$row['operator'].' `'.$table.'`.`'.$field.'`';
											break;
									}
								}
								break;
							case 'BETWEEN' :
								if(isset($row['values']))
								{
									$sql .= ' '.$row['operator'].' :where_'.$index.'_value_0 AND :where_'.$index.'_value_1';
								}
								elseif(isset($row['fields']))
								{
									$sql .= ' '.$row['operator'].' ';
									$item = explode('.',$row['fields'][0]);
									switch(count($item))
									{
										case 1:
											$field = $item[0];
											$sql .= '`'.$field.'`';
											break;
										case 2:
											$table = $item[0];
											$field = $item[1];
											$sql .= '`'.$table.'`.`'.$field.'`';
											break;
									}
									$sql .= ' AND ';
									$item = explode('.',$row['fields'][1]);
									switch(count($item))
									{
										case 1:
											$field = $item[0];
											$sql .= '`'.$field.'`';
											break;
										case 2:
											$table = $item[0];
											$field = $item[1];
											$sql .= '`'.$table.'`.`'.$field.'`';
											break;
									}
								}
								break;
							case 'IN' :
								$sql .= ' '.$row['operator'].' (';
								if(isset($row['values']))
								{
									foreach($row['values'] as $row_index => $value)
									{
										$sql .= ':where_'.$index.'_value_'.$row_index.',';
									}
								}
								if(isset($row['fields']))
								{
									foreach($row['fields'] as $row_index => $field)
									{
										$item = explode('.',$field);
										switch(count($item))
										{
											case 1:
												$field = $item[0];
												$sql .= '`'.$field.'`';
												break;
											case 2:
												$table = $item[0];
												$field = $item[1];
												$sql .= '`'.$table.'`.`'.$field.'`';
												break;
										}
										$sql .= ',';
									}
								}
								$sql = substr($sql,0,strlen($sql)-1);
								$sql .= ')';
								break;
						}
						$sql .= "\r\n";
					}
				}
				else
				{
					$sql .= 'WHERE 1'."\r\n";
				}
			}
			
			// $group_by[$index] => field
			if(isset($group_by))
			{
				if(! empty($group_by))
				{
					$sql .= 'GROUP BY ';
					foreach($group_by as $field)
					{
						$item = explode('.',$field);
						switch(count($item))
						{
							case 1:
								$field = $item[0];
								$sql .= '`'.$field.'`,';
								break;
							case 2:
								$table = $item[0];
								$field = $item[1];
								$sql .= '`'.$table.'`.`'.$field.'`,';
								break;
						}
					}
					$sql = substr($sql,0,strlen($sql)-1);
					$sql .= "\r\n";
				}
			}
			
			// $having[$index]['function']
			// $having[$index]['field']
			// $having[$index]['operator']
			// $having[$index]['values']
			// $having[$index]['fields']
			if(isset($having))
			{
				if(! empty($having))
				{
					foreach($having as $index => $row)
					{
						$row['function'] = strtoupper($row['function']);
						if(in_array($row['function'],array('COUNT','SUM','MIN','MAX','AVG')))
						{
							if(!$index)
							{
								$sql .= 'HAVING ';
							}
							else
							{
								$sql .= "\t".'AND ';
							}
							
							$sql .= $row['function'].'(';
							
							if(isset($row['field']))
							{
								$item = explode('.',$row['field']);
								switch(count($item))
								{
									case 1:
										$field = $item[0];
										$sql .= '`'.$field.'`';
										break;
									case 2:
										$table = $item[0];
										$field = $item[1];
										$sql .= '`'.$table.'`.`'.$field.'`';
										break;
								}
							}
							else
							{
								$sql .= '*';
							}
							$sql .= ')';
							
							$row['operator'] = strtoupper($row['operator']);
							switch($row['operator'])
							{
								case '=' :
								case '<=' :
								case '>=' :
								case '<' :
								case '>' :
								case '<>' :
								case 'LIKE' :
									if(isset($row['values']))
									{
										$sql .= ' '.$row['operator'].' :having_'.$index.'_value_0';
									}
									elseif(isset($row['fields']))
									{
										$item = explode('.',$row['fields'][0]);
										switch(count($item))
										{
											case 1:
												$field = $item[0];
												$sql .= ' '.$row['operator'].' `'.$field.'`';
												break;
											case 2:
												$table = $item[0];
												$field = $item[1];
												$sql .= ' '.$row['operator'].' `'.$table.'`.`'.$field.'`';
												break;
										}
									}
									break;
								case 'BETWEEN' :
									if(isset($row['values']))
									{
										$sql .= ' '.$row['operator'].' :having_'.$index.'_value_0 AND :where_'.$index.'_value_1';
									}
									elseif(isset($row['fields']))
									{
										$sql .= ' '.$row['operator'].' ';
										$item = explode('.',$row['fields'][0]);
										switch(count($item))
										{
											case 1:
												$field = $item[0];
												$sql .= '`'.$field.'`';
												break;
											case 2:
												$table = $item[0];
												$field = $item[1];
												$sql .= '`'.$table.'`.`'.$field.'`';
												break;
										}
										$sql .= ' AND ';
										$item = explode('.',$row['fields'][1]);
										switch(count($item))
										{
											case 1:
												$field = $item[0];
												$sql .= '`'.$field.'`';
												break;
											case 2:
												$table = $item[0];
												$field = $item[1];
												$sql .= '`'.$table.'`.`'.$field.'`';
												break;
										}
									}
									break;
								case 'IN' :
									$sql .= ' '.$row['operator'].' (';
									if(isset($row['values']))
									{
										foreach($row['values'] as $row_index => $value)
										{
											$sql .= ':having_'.$index.'_value_'.$row_index.',';
										}
									}
									if(isset($row['fields']))
									{
										foreach($row['fields'] as $row_index => $field)
										{
											$item = explode('.',$field);
											switch(count($item))
											{
												case 1:
													$field = $item[0];
													$sql .= '`'.$field.'`';
													break;
												case 2:
													$table = $item[0];
													$field = $item[1];
													$sql .= '`'.$table.'`.`'.$field.'`';
													break;
											}
											$sql .= ',';
										}
									}
									$sql = substr($sql,0,strlen($sql)-1);
									$sql .= ')';
									break;
							}
							$sql .= "\r\n";
						}
					}
				}
				else
				{
					$sql .= 'HAVING 1'."\r\n";
				}
			}
			
			// $order_by[$index]['field']
			// $order_by[$index]['direction']
			if(isset($order_by))
			{
				if(! empty($order_by))
				{
					$sql .= 'ORDER BY ';
					foreach($order_by as $index => $row)
					{
						$item = explode('.',$row['field']);
						switch(count($item))
						{
							case 1:
								$field = $item[0];
								$sql .= '`'.$field.'`';
								break;
							case 2:
								$table = $item[0];
								$field = $item[1];
								$sql .= '`'.$table.'`.`'.$field.'`';
								break;
						}
						if(isset($row['direction']))
						{
							$row['direction'] = strtoupper($row['direction']);
							if(in_array($row['direction'],array('ASC','DESC')))
							{
								$sql .= ' '.$row['direction'];
							}
						}
						$sql .= ',';
					}
					$sql = substr($sql,0,strlen($sql)-1);
					$sql .= "\r\n";
				}
			}
			
			// $limit['offset']
			// $limit['rows']
			if(isset($limit))
			{
				if(! empty($limit))
				{
					if(isset($limit['rows']))
					{
						$sql .= 'LIMIT ';
						if(isset($limit['offset']))
						{
							$sql .=':limit_offset,';
						}
						$sql .= ':limit_rows';
						$sql .= "\r\n";
					}
				}
			}
			
			
			
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .= ";";
			
			if(self::is_connected())
			{
				$outer_connection = true;
			}
			else
			{
				$outer_connection = false;
				Database::connect();
				Database::select_database();
			}
			$sth = Database::prepare($sql);
			
			
			
			switch(func_num_args())
			{
				case '7':
					// $limit['offset']
					// $limit['rows']
					if(isset($limit))
					{
						if(! empty($limit))
						{
							if(isset($limit['rows']))
							{
								if(isset($limit['offset']))
								{
									$sth->bindValue(':limit_offset',$limit['offset'],PDO::PARAM_INT);
								}
								$sth->bindValue(':limit_rows',$limit['rows'],PDO::PARAM_INT);
							}
						}
					}
				case '6':
					// $order_by[$index]['field']
					// $order_by[$index]['direction']
				case '5':
					// $having[$index]['function']
					// $having[$index]['field']
					// $having[$index]['operator']
					// $having[$index]['values']
					// $having[$index]['fields']
					foreach($having as $index => $row)
					{
						if(isset($row['values']))
						{
							foreach($row['values'] as $val_index => $value)
							{
								$sth->bindValue(':having_'.$index.'_value_'.$val_index,$value);
							}
						}
					}
				case '4':
					// $group_by[$index] => field
				case '3':
					// $where[$index]['field']
					// $where[$index]['operator']
					// $where[$index]['values']
					// $where[$index]['fields']
					foreach($where as $index => $row)
					{
						if(isset($row['values']))
						{
							foreach($row['values'] as $val_index => $value)
							{
								$sth->bindValue(':where_'.$index.'_value_'.$val_index,$value);
							}
						}
					}
				case '2':
					// $from['table']
					// $from['alias']
					// $from['join'][$index]['table']
					// $from['join'][$index]['alias']
					// $from['join'][$index]['table1']['name']
					// $from['join'][$index]['table1']['key']
					// $from['join'][$index]['table2']['name']
					// $from['join'][$index]['table2']['key']
				case '1':
					// $select['fields']
					// $select['functions']['index']['function']
					// $select['functions']['index']['field']
					// $select['functions']['index']['alias']
					if(isset($select['functions']))
					{
						foreach($select['functions'] as $index => $row)
						{
							if(isset($row['alias']))
							{
								$sth->bindValue(':select_alias_'.$index,$row['alias']);
							}
						}
					}
			}
			
			
			
			$result = $sth->execute();
			if(!$result)
			{
				var_dump($sql);
				var_dump($sth->errorInfo());
			}
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			if(!$outer_connection)
			{
				Database::disconnect();
			}
			
			return $result;
		}
		
		/**
		 * Import CSV Files in Database
		 * @access private
		 * @version 1.0
		 */
		public static function import_csv_files()
		{
			global $PARAM;
			$folder = $PARAM['folders']['scripts']['csv'];
			$files = get_files($folder);
			foreach($files as $file)
			{
				if (($handle = fopen($folder.'/'.$file, "r")))
				{
					$table = substr($file,0,strlen($file)-4);
					/*
					 * first row is fields list
					 */
					$fields = fgetcsv($handle,0,';');
					$values = array();
					while (($row_values = fgetcsv($handle,0,';')))
					{
						$values[] = $row_values;
					}
					fclose($handle);
					self::insert_into($table,$fields,$values);
				}
			}
		}
		
		/**
		 * Import SQL Files in Database
		 * @access private
		 * @version 1.0
		 */
		public static function import_sql_files()
		{
			global $PARAM;
			$folder = $PARAM['folders']['scripts']['sql'];
			$files = get_files($folder);
			foreach($files as $file)
			{
				if (($handle = fopen($folder.'/'.$file, "r")))
				{
					/*
					 * first row is fields list
					 */
					$query = "";
					while (($row = fgets($handle)))
					{
						$query .= $row;
					}
					fclose($handle);
					
					// self::$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
					try
					{
						$stmt = self::$dbh->prepare($query);
						$result = $stmt->execute();
					}
					catch (PDOException $e)
					{
						echo $e->getMessage();
						die();
					}
					return $result;
				}
			}
		}
	}
?>