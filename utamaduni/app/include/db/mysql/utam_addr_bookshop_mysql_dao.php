<?php
/*
 Copyright 2011 Román Ginés Martínez Ferrández <romangines@riseup.net>

 This file is part of phpgendao.

 phpgendao is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 phpgendao is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 */

include_once (dirname (__FILE__) . '/../dao/utam_addr_bookshop_dao.php');
include_once (dirname (__FILE__) . '/../dto/utam_addr_bookshop.php');
include_once (dirname (__FILE__) . '/core/array_list.php');
include_once (dirname (__FILE__) . '/core/sql_query.php');
include_once (dirname (__FILE__) . '/core/query_executor.php');
include_once (dirname (__FILE__) . '/core/transaction.php');

/**
 * Class that operate on table 'utam_addr_bookshop'. Database MySQL.
 *
 * @author: Román Ginés Martínez Ferrández <romangines@riseup.net>
 */
class utam_addr_bookshop_mysql_dao implements utam_addr_bookshop_dao
{
	/**
	 * Get domain object by primary key.
	 *
	 * @param String $id primary key.
	 * @return utam_addr_bookshop_mysql.
	 */
	public function load ($id)
	{
		$sql = 'SELECT * FROM utam_addr_bookshop a, utam_bookshop b WHERE a.id = ? and a.id = b.id';
		$query = new sql_query ($sql);
		$query -> set_number ($id);
		return $this -> get_row ($query);
	}

	/**
	 * Get all records from table.
	 */
	public function query_all ()
	{
		$sql = 'SELECT * FROM utam_addr_bookshop a, utam_bookshop b WHERE 0 = 0 and a.id = b.id';
		$query = new sql_query ($sql);
		return $this -> get_list ($query);
	}

	/**
	 * Get all records from table ordered by field.
	 *
	 * @param $order_col column name.
	 */
	public function query_all_order_by ($order_col)
	 {
		$sql = 'SELECT * FROM utam_addr_bookshop a, utam_bookshop b WHERE 0 = 0 and a.id = b.id ORDER BY ' . $order_col;
		$query = new sql_query ($sql);
		return $this -> get_list ($query);
	}

	/**
	 * Delete record from table.
	 *
	 * @param String $id utam_addr_bookshop primary key
	 */
	public function delete ($id)
	{
		$sql = 'DELETE FROM utam_addr_bookshop WHERE id = ?';
		$query = new sql_query ($sql);
		$query -> set_number ($id);
		return $this -> execute_update ($query);
	}

	/**
	 * Queries and deletes by column.
	 */
	public function query_by_id ($value)
	{
		$sql = 'SELECT * FROM utam_addr_bookshop a, utam_bookshop b WHERE a.id = ? and a.id = b.id';
		$query = new sql_query ($sql);
		$query -> set ($value);
		return $this -> get_list ($query);
	}

	public function delete_by_id ($value)
	{
		$sql = 'DELETE FROM utam_addr_bookshop WHERE id = ?';
		$query = new sql_query ($sql);
		$query -> set ($value);
		return $this -> execute_update ($query);
	}

	public function query_by_address ($value)
	{
		$sql = 'SELECT * FROM utam_addr_bookshop WHERE address = ?';
		$query = new sql_query ($sql);
		$query -> set ($value);
		return $this -> get_list ($query);
	}

	public function delete_by_address ($value)
	{
		$sql = 'DELETE FROM utam_addr_bookshop WHERE address = ?';
		$query = new sql_query ($sql);
		$query -> set ($value);
		return $this -> execute_update ($query);
	}

	/**
	 * Insert record to table.
	 *
	 * @param utam_addr_bookshop_mysql utam_addr_bookshop.
	 */
	public function insert ($utam_addr_bookshop)
	{
		$sql = 'INSERT INTO utam_addr_bookshop (id, address) VALUES (?, ?)';
		$query = new sql_query ($sql);

		$query -> set ($utam_addr_bookshop -> id);
		$query -> set ($utam_addr_bookshop -> address);

		$id = $this -> execute_insert ($query);
		$utam_addr_bookshop -> id = $id;
		return $id;
	}

	/**
	 * Update record in table.
	 *
	 * @param utam_addr_bookshop_mysql utam_addr_bookshop
	 */
	public function update ($utam_addr_bookshop)
	{
		$sql = 'UPDATE utam_addr_bookshop SET id = ?, address = ? WHERE id = ?';
		$query = new sql_query ($sql);

		$query -> set ($utam_addr_bookshop -> id);
		$query -> set ($utam_addr_bookshop -> address);

		$query -> set_number ($utam_addr_bookshop -> id);
		return $this -> execute_update ($query);
	}

	/**
	 * Delete all rows.
	 */
	public function clean ()
	{
		$sql = 'DELETE FROM utam_addr_bookshop';
		$query = new sql_query ($sql);
		return $this -> execute_update ($query);
	}

	/**
	 * Read row.
	 *
	 * @return utam_addr_bookshop_mysql
	 */
	protected function read_row ($row)
	{
		$utam_addr_bookshop = new utam_addr_bookshop ();

		$utam_addr_bookshop -> id = $row['id'];
		$utam_addr_bookshop -> address = $row['address'];

		return $utam_addr_bookshop;
	}

	protected function get_list ($query)
	{
		$tab = query_executor::execute ($query);
		$ret = array ();
		for ($i = 0; $i < count ($tab); $i++)
		{
			$ret[$i] = $this -> read_row ($tab[$i]);
		}
		return $ret;
	}

	/**
	 * Get row.
	 *
	 * @return utam_addr_bookshop_mysql.
	 */
	protected function get_row ($query)
	{
		$tab = query_executor::execute ($query);
		if (count ($tab) == 0)
		{
			return null;
		}
		return $this -> read_row ($tab[0]);
	}

	/**
	 * Execute sql query.
	 */
	protected function execute ($query)
	{
		return query_executor::execute ($query);
	}

	/**
	 * Execute sql query.
	 */
	protected function execute_update ($query)
	{
		 return query_executor::execute_update ($query);
	}

	/**
	 * Query for one row and one column.
	 */
	protected function query_single_result ($query)
	{
		return query_executor::query_for_string ($query);
	}

	/**
	 * Insert row to table.
	 */
	protected function execute_insert ($query)
	{
		return query_executor::execute_insert ($query);
	}
}
?>