<?php 

class WC_Gateway_Iute_CRUD {

	// clear table
	public function clear ($table)
	{
		global $wpdb;
		$wpdb->query("TRUNCATE TABLE $table");
	}

	// insert
	public function insert ($table, $data)
	{
		global $wpdb;
		return $wpdb->insert(
			$table, 
			$data
		);
	}

	// get
	public function get($table)
	{
		global $wpdb;
		return $wpdb->get_results( "SELECT * FROM $table");
	}

	// where
	public function get_row($table, $where)
	{
		global $wpdb;
		return $wpdb->get_row( "SELECT * FROM $table WHERE $where");
	}
}