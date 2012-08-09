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

/**
 * Connection properties.
 *
 * @author: Román Ginés Martínez Ferrández <romangines@riseup.net>
 */
class connection_property
{
	private static $host = 'localhost';
	private static $user = 'roman';
	private static $password = 'roman';
	private static $database = 'machafuko';

	public static function get_host ()
	{
		return connection_property::$host;
	}

	public static function get_user ()
	{
		return connection_property::$user;
	}

	public static function get_password ()
	{
		return connection_property::$password;
	}

	public static function get_database ()
	{
		return connection_property::$database;
	}
}
?>