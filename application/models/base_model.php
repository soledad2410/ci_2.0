<?php

Class Base_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Base_model::get_array()
	 *
	 * @param resource $mysql_resource
	 * @return array
	 */
	public function get_array($mysql_resource) {
		$result = array();

		foreach ($mysql_resource->result_array() as $rows) {
			$result[] = $rows;
		}
		return $result;
	}

	/**
	 * Base_model::select_query()
	 *
	 * @param mixed $table
	 * @param mixed $cols
	 * @param array $where
	 * @param array $joins
	 * @param int $start
	 * @param int $limit
	 * @param array $order
	 * @param bool $return_array
	 * @param array $where_in
	 * @return
	 */
	public function select_query($table, $cols = false, $where = false, $joins = false, $start = false, $limit = false, $order = false, $return_array = false, $where_in = false) {
		$col_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : '';
		$this->db->select($col_select)->from($table);
		if ($where) {
			$this->db->where($where);
		}
		if ($where_in) {
			foreach ($where_in as $key => $value) {
				$this->db->where_in($key, $value);
			}
		}
		if ($joins) {
			foreach ($joins as $table => $join_cond) {
				$this->db->join($table, $join_cond);
			}
		}
		if ($limit) {$this->db->limit($limit, $start);}
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		//     var_dump($this->db);
		$query = $this->db->get();

		if ($return_array) {return $this->get_array($query);} else {return $query;}
	}

	/**
	 * Base_model::get_latest_record()
	 *
	 * @param mixed $table
	 * @param bool $where
	 * @param mixed $order
	 * @return record|boolean
	 */
	public function get_latest_record($table, $where = false, $order) {
		$row = $this->select_query($table, false, $where, false, 0, 1, $order, true);
		if (count($row) == 1) {
			return $row['0'];
		}
		return false;
	}

	/**
	 * Base_model::select_query_distinct()
	 *
	 * @param mixed $tables
	 * @param mixed $cols_distinct
	 * @param bool $where
	 * @param bool $join
	 * @param bool $start
	 * @param bool $limit
	 * @param bool $order
	 * @param bool $return_array
	 * @param bool $where
	 * @return void
	 */
	public function select_query_distinct($tables, $cols_distinct, $where = false, $joins = false, $start = false, $limit = false, $order = false, $return_array = false, $where_in = false) {
		$this->db->select($cols_distinct);
		$this->db->from($tables);
		$this->db->distinct();
		if ($where) {
			$this->db->where($where);
		}
		if ($where_in) {
			foreach ($where_in as $key => $value) {
				$this->db->where_in($key, $value);
			}
		}
		if ($joins) {
			foreach ($joins as $table => $join_cond) {
				$this->db->join($table, $join_cond);
			}
		}
		if ($limit) {$this->db->limit($limit, $start);}
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		//     var_dump($this->db);
		$query = $this->db->get();

		if ($return_array) {return $this->get_array($query);} else {return $query;}

	}
	/**
	 * Base_model::get_by_key()
	 *
	 * @param string $table
	 * @param string $column
	 * @param mixed $key
	 * @param mixed $value
	 * @return value column select
	 */
	public function get_by_key($table, $col, $key = null, $value = null, $where = null, $join = false) {
		$this->db->select($col)->from($table);
		if (isset($key) AND isset($value)) {$this->db->where($key, $value);}
		if (isset($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if ($join) {
			foreach ($join as $key => $value) {
				$this->db->join($key, $value);
			}

		}
		$query = $this->db->get();
		$return_value = false;
		foreach ($query->result() as $rows) {
			$return_value = $rows->$col;
		}
		return $return_value;
	}

	/**
	 * Base_model::get_top()
	 *
	 * @param string $table
	 * @param string $column
	 * @param array $where
	 * @param array $order
	 * @param bool $min
	 * @return top
	 */
	public function get_top($table, $column, $where = null, $order = null, $min = false) {
		($min == true) ? $this->db->select_min($column) : $this->db->select_max($column);
		$this->db->from($table);
		if (isset($where)) {
			$this->db->where($where);
		}
		if (isset($order)) {
			$this->db->order_by($order);
		}
		$query = $this->db->get();
		$rows = $this->get_array($query);
		$result = (empty($rows['0'])) ? 0 : $rows['0'][$column];

		return $result;

	}

	/**
	 * Base_model::check_unique()
	 *
	 * @param string $check_table
	 * @param string $check_column
	 * @param string $check_value
	 * @return boolean
	 */
	public function check_unique($check_table, $check_column, $check_value) {
		$this->db->select("*")->from($check_table)->where($check_column, $check_value);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {return false;} else {return true;}
	}

	/**
	 * Base_model::get_config()
	 *
	 * @param mixed $config_name
	 * @param string $lang_shortname
	 * @return config value
	 */
	public function get_config($config_name, $lang_shortname, $domain_id = null) {
		$this->db->select(['config_value','config_name'])->from('tblconfigvalue')->join('tblconfig', 'tblconfig.config_id=tblconfigvalue.config_id')->join('tbllang', 'tblconfigvalue.lang_shortname=tbllang.lang_shortname');
        
		$where = array('tblconfig.config_name' => $config_name, 'tbllang.lang_shortname' => $lang_shortname);
        if($config_name == false){
            $where = array( 'tbllang.lang_shortname' => $lang_shortname);    
        }
		if ($domain_id) {
			$where = array_merge($where, array('tblconfig.domain_id' => $domain_id));
		}
        
		$this->db->where($where);
		$query = $this->db->get();
		$rows = $this->get_array($query);
		$result = (empty($rows['0']['config_value'])) ? false : $rows['0']['config_value'];
        if($config_name == false){
            return $rows;
        }
		return $result;
	}
    
    public function serialize_config($lang_shortname, $domain_id){
        $this->db->select(['config_value','config_name'])->from('tblconfigvalue')->join('tblconfig', 'tblconfig.config_id=tblconfigvalue.config_id')->join('tbllang', 'tblconfigvalue.lang_shortname=tbllang.lang_shortname');
        $where = array( 'tbllang.lang_shortname' => $lang_shortname,'tblconfig.domain_id' => $domain_id);    
     
        
		$this->db->where($where);
		$query = $this->db->get();
		$rows = $this->get_array($query);
		$result = array();
        foreach($rows as $name=>$value)
        {
            $result[$value['config_name']] = $value['config_value'];
        }
        
		return $result;
	}
 

	/**
	 * Base_model::get_cate_template()
	 *
	 * @param mixed $cate_id
	 * @return void
	 */
	public function get_cate_template($cate_id) {
		$result = $this->get_by_key('tblmenu', 'template_id', 'menu_id', $cate_id);
		if (!$result) {return false;} else {return $result['0']['template_name'];}
	}

	/**
	 * Base_model::insert_data()
	 *
	 * @param string $table
	 * @param array $insert_data
	 * @param bool $return_lastestid
	 * @return mixed
	 */
	public function insert_data($table, $insert_data, $return_lastestid = false) {
		$columns = array_flip($this->db->list_fields($table));

		foreach ($insert_data as $key => $value) {
			if (!isset($columns[$key])) {
				unset($insert_data[$key]);
			}
		}
		if ($return_lastestid) {
			if ($this->db->insert($table, $insert_data)) {return $this->db->insert_id();}
			return false;
		}
		return $this->db->insert($table, $insert_data);
	}

	public function update_data($table, $update_data, $where = null) {
		$columns = array_flip($this->db->list_fields($table));
		foreach ($update_data as $key => $value) {
			if (!isset($columns[$key])) {
				unset($update_data[$key]);
			}
		}
		return $this->db->update($table, $update_data, $where);
	}

	/**
	 * Base_model::get_keyword()
	 *
	 * @param mixed $keyword_name
	 * @param mixed $lang_shortname
	 * @return void
	 */
	public function get_keyword($lang_shortname) {
		$data = $this->select_query('tbllangkeyword', array('tblkeyword.keyword_name', 'keyword_value'), array('tbllang.lang_shortname' => $lang_shortname), array('tbllang' => 'tbllangkeyword.lang_id=tbllang.lang_id', 'tblkeyword' => 'tbllangkeyword.keyword_id=tblkeyword.keyword_id'),
			FALSE, FALSE, FALSE, TRUE
		);
		$keyword = array();
		foreach ($data as $key) {
			$keyword[$key['keyword_name']] = $key['keyword_value'];
		}
		return $keyword;
	}

	public function multiple_insert($table, $cols_name, $rows) {
		$table_prefix = $this->db->dbprefix;
		$query = 'INSERT INTO ' . $table_prefix . $table;
		if ($cols_name) {
			$query .= ' (' . implode(',', $cols_name) . ')';
		}
		$query .= ' VALUES ';
		$total_row = count($rows);
		$rows = array_values($rows);
		array_walk_recursive($rows, array($this, '_prepare_insert_value'));
		for ($i = 0; $i < $total_row; $i++) {
			$rows[$i] = $this->_prepare_cols($cols_name, $rows[$i]);
			$rows[$i] = implode(',', $rows[$i]);
		}
		$query .= '(' . implode(') , (', $rows) . ')';
		//  return $query;
		return $this->db->query($query);
	}

	private function _prepare_insert_value(&$value) {
		$value = "'" . mysql_real_escape_string($value) . "'";

	}
	/**
	 * Base_model::multiple_update()
	 *
	 * @param mixed $table
	 * @param mixed $updates_value = array(col1=>array('key1'=>'$val1','key2'=>'$val2'),..., $coln=>array('keyn'=>'$valn','keym'=>'$valm'))
	 * @param mixed $cols_id_name
	 * @return
	 */
	public function multiple_update($table, $updates_value, $cols_id_name) {
		$query = 'UPDATE ' . $this->db->dbprefix . ' SET ';
		$query .= implode(',', array_walk($this, 'prepare_multiple_cols_updates', $cols_id_name));
		$query .= 'WHERE ';
		$array_col = array_keys($updates_value);
		$array_col = $array_col['0'];
		$keys = array_keys($array_col);

		$query .= implode(' OR ', array_walk($keys, $this, '_prepare_cols_where_update', $cols_id_name));

		return $this->db->query($query);

	}
	// array(col1=>array('key1'=>'$val1','key2'=>'$val2'),$col2=>array('key1'=>'$val3','key2'=>'$val4'))
	// To
	// col1 = CASE
	// WHEN $cols_id = $key1 THEN $val1
	// WHEN $cols_id = $key2 THEN $val3
	// ELSE cols1 END,
	private function _prepare_multiple_cols_updates(&$val, &$key, $col_id) {
		$new_val = " '$col_name' = CASE ";
		foreach ($val as $key => $value) {
			$new_val .= "WHEN '$col_id' = '$key' THEN '$value' ";
		}
		$new_val .= "ELSE '$key END ";
		$val = $new_val;
	}
	private function _prepare_cols_where_update(&$val, &$key, $cols_id) {
		$val = "'$cols_id'= '$val'";
	}
	/**
	 * Base_model::_prepare_cols()
	 *
	 * @param array $cols_name
	 * @param array $values
	 * @return void
	 */
	private function _prepare_cols($cols_name, $values) {
		$total_cols = count($cols_name);
		$total_value = count($values);
		if ($total_cols > $total_value) {
			$merge = array_fill(0, $total_cols - $total_value, "''");
			$values = array_merge($values, $merge);
		}
		if ($total_value > $total_cols) {
			$values = array_slice($values, 0, $total_cols);

		}

		return $values;
	}

	function a2rraytoa1rray($val, $key, &$arr_result) {
		array_push($arr_result, $val);

	}

	/**
	 * Base_model::get_row_array()
	 *
	 * @param string $table
	 * @param array $where
	 * @return array
	 */
	public function get_row_array($table, $where) {
		$row = $this->select_query($table, false, $where, false, 0, 1, false, true);
		if (count($row) == 1) {
			return $row['0'];
		}
	}

	public function increase_view($table, $column, $where = array(), $increase = 1) {
		$this->db->set($column, "$column+$increase", FALSE);
		foreach ($where as $col => $val) {
			$this->db->where($col, $val);
		}
		$this->db->update($table);
	}

}
?>