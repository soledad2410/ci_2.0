<?php

class Article_model extends Base_model {

	function __construct() {
		parent::__construct();
		$this->load->model('menu_model');
	}

	/**
	 * Article_model::save_article()
	 *
	 * @param array $values
	 * @return void
	 */
	public function save_article($values) {
		$article_queu = (int) $this->get_top('tblarticle', 'article_queu', null) + 1;
		$insert_data = array_merge($values, array('article_queu' => $article_queu));
		$insert_data['article_content'] = $insert_data['article_content'];
		return $this->db->insert('tblarticle', $insert_data);
	}

	/**
	 * Article_model::load_article()
	 *
	 * @param mixed $cols
	 * @param array $where
	 * @param array $order
	 * @param string $like
	 * @param date $from
	 * @param date $to
	 * @param int $limit
	 * @param int $offset
	 * @param int $menu_id
	 * @param bool $return_array
	 * @return
	 */
	public function load_article($cols = false, $where = false, $order = false, $like = false, $from = false, $to = false, $limit = false, $offset = false, $menu_id = false, $return_array = false) {
		$column_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : "*";
		$this->db->select($column_select)->from('tblarticle')->join('tblmenu', 'tblmenu.menu_id=tblarticle.menu_id')->join('tblmodule', 'tblmodule.module_id=tblmenu.module_id');
		$this->db->join('tbllang', 'tbllang.lang_id=tblmenu.lang_id');
		if (($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if ($menu_id) {
			$this->db->where('tblmenu.menu_id', $menu_id);
		}
		if (($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		if ($like) {
			$this->db->like('tblarticle.article_title', urldecode($like));
		}
		if ($from) {
			list($day, $month, $year) = explode('-', $from);
			$from_time = mktime(0, 0, 0, $month, $day, $year);
			$this->db->where('tblarticle.article_datetime >', $from_time);
		}
		if ($to) {
			list($day, $month, $year) = explode('-', $to);
			$to_time = mktime(23, 59, 59, $month, $day, $year);
			$this->db->where('tblarticle.article_datetime <', $to_time);
		}

		$this->db->limit($limit, $offset);

		$query = $this->db->get();
		if ($return_array == true) {
			return $this->get_array($query);
		} else {
			return $query;
		}

	}

	/**
	 * Article_model::load_article_recursive()
	 *
	 * @param bool $cols
	 * @param mixed $cate_id
	 * @param bool $where_article
	 * @param bool $where_cate
	 * @param bool $order
	 * @param bool $limit
	 * @param bool $start
	 * @param bool $return_array
	 * @return
	 * @uses Load article recursion by menu
	 */
	function load_article_recursive($cols = false, $cate_id, $where_article = false, $where_cate = false, $like = false, $from = false, $to = false, $order = false, $limit = false, $start = false, $return_array = false) {
		$column_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : "*";
		$menu_array = $this->menu_model->load_menu_recursive('tblmenu.menu_id', $cate_id, $where_cate, array('tblmenu.menu_queu' => 'ASC'));
		$array_cate = array($cate_id);
		foreach ($menu_array as $menu) {
			$array_cate[] = $menu['menu_id'];
		}
		$this->db->select($column_select)->from('tblarticle')->where_in('tblarticle.menu_id', $array_cate)->join('tblmenu', 'tblmenu.menu_id=tblarticle.menu_id')->join('tbllang',
			'tblmenu.lang_id=tbllang.lang_id');
		if ($where_article) {
			$this->db->where($where_article);
		}

		if ($like) {
			$this->db->like('tblarticle.article_title', urldecode($like));
		}
		if ($from) {
			list($day, $month, $year) = explode('-', $from);
			$from_time = mktime(0, 0, 0, $month, $day, $year);
			$this->db->where('tblarticle.article_datetime >', $from_time);
		}
		if ($to) {
			list($day, $month, $year) = explode('-', $to);
			$to_time = mktime(23, 59, 59, $month, $day, $year);
			$this->db->where('tblarticle.article_datetime <', $to_time);
		}
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);

			}
		}
		if ($limit) {
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if ($return_array) {
			return $this->get_array($query);
		} else {
			return $query;
		}
	}

	/**
	 * Article_model::push_up()
	 *
	 * @param int $article_id
	 * @uses push up article
	 * @return void
	 */
	public function push_up($article_id) {
		$menu_id = $this->get_by_key('tblarticle', 'menu_id', 'article_id', $article_id);
		$current_queu = $this->get_by_key('tblarticle', 'article_queu', 'article_id', $article_id);
		$new_queu = 1;
		$next_article = $this->load_article(array('tblarticle.article_id', 'tblarticle.article_queu'), array('tblarticle.menu_id' => $menu_id, 'tblarticle.article_queu > ' => $current_queu), array('tblarticle.article_queu' =>
			'ASC'), false, false, false, 1, 0, false, true);
		if (count($next_article) == 1) {
			$new_queu = $next_article['0']['article_queu'];
			$this->db->update('tblarticle', array('article_queu' => $new_queu), array('article_id' => $article_id));
			$this->db->update('tblarticle', array('article_queu' => $current_queu), array('article_id' => $next_article['0']['article_id']));

		}

	}

	/**
	 * Article_model::push_down()
	 *
	 * @param mixed $article_id
	 * @return void
	 */
	public function push_down($article_id) {
		$menu_id = $this->get_by_key('tblarticle', 'menu_id', 'article_id', $article_id);
		$current_queu = $this->get_by_key('tblarticle', 'article_queu', 'article_id', $article_id);
		$new_queu = 1;
		$next_article = $this->load_article(array('tblarticle.article_id', 'tblarticle.article_queu'), array('tblarticle.menu_id' => $menu_id, 'tblarticle.article_queu < ' => $current_queu), array('tblarticle.article_queu' =>
			'DESC'), false, false, false, 1, 0, false, true);
		if (count($next_article) == 1) {

			$new_queu = $next_article['0']['article_queu'];
			$this->db->update('tblarticle', array('article_queu' => $new_queu), array('article_id' => $article_id));
			$this->db->update('tblarticle', array('article_queu' => $current_queu), array('article_id' => $next_article['0']['article_id']));

		}

	}

	/**
	 * Article_model::load_article_frontend()
	 *
	 * @param bool $cols
	 * @param bool $where
	 * @param bool $start
	 * @param bool $limit
	 * @param bool $return_array
	 * @return void
	 */
	public function load_article_frontend($cols = FALSE, $where = FALSE, $start = FALSE, $limit = FALSE, $return_array = FALSE, $order = false) {
		$column_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : "*";
		$this->db->select($column_select)->from('tblarticle');
		$this->db->join('tblmenu', 'tblarticle.menu_id=tblmenu.menu_id');
		$this->db->join('tblmodule', 'tblmenu.module_id=tblmodule.module_id');
		$this->db->join('tbllang', 'tblmenu.lang_id=tbllang.lang_id');
		$this->db->where('tblmodule.module_active', 1);
		$this->db->where('tbllang.lang_active', 1);
		$this->db->where('tblmenu.menu_visible', 1);
		$this->db->where('tblarticle.article_visible', 1);
		if (isset($where['extra_cond'])) {
			$this->db->where($where['extra_cond']);
			unset($where['extra_cond']);
		}
		if ($where) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if ($limit) {
			$this->db->limit($limit, $start);
		}
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		} else {
			$this->db->order_by('article_queu', 'DESC');
		}
		$query = $this->db->get();
		if ($return_array) {return $this->get_array($query);} else {return $query;}

	}

	/**
	 * Article_model::load_article_frontend_recursive()
	 *
	 * @param mixed $menu_id
	 * @param bool $cols
	 * @param bool $where
	 * @param bool $start
	 * @param bool $limit
	 * @param bool $return_array
	 * @return
	 */
	public function load_article_frontend_recursive($menu_id, $cols = FALSE, $where = FALSE, $start = FALSE, $limit = FALSE, $return_array = FALSE) {
		$column_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : "*";
		$menu_array = $this->menu_model->menu_recursive_frontend($menu_id, 'tblmenu.menu_id');
		$array_cate = array($menu_id);
		foreach ($menu_array as $menu) {
			$array_cate[] = $menu['menu_id'];
		}
		$this->db->select($column_select)->from('tblarticle')->where_in('tblarticle.menu_id', $array_cate)->join('tblmenu', 'tblmenu.menu_id=tblarticle.menu_id')->join('tbllang',
			'tblmenu.lang_id=tbllang.lang_id');
		$this->db->where('tblarticle.article_visible', 1);
		if ($where) {
			foreach ($where as $key => $value) {
				if ($key != 'year' && $key != 'month') {
					$this->db->where($key, $value);
				}
			}
		}
		if (isset($where['year'])) {
			$min_time = mktime(0, 0, 0, 1, 1, $where['year']);
			$max_time = mktime(23, 59, 59, 12, 31, $where['year']);
			if (isset($where['month'])) {
				$min_time = mktime(0, 0, 0, $where['month'], 1, $where['year']);
				$max_time = mktime(0, 0, 0, $where['month'], 31, $where['year']);
			}
			$this->db->where('article_datetime > ', $min_time);
			$this->db->where('article_datetime < ', $max_time);
		}

		$this->db->order_by('tblarticle.article_queu', 'DESC');
		if ($limit) {
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if ($return_array) {
			return $this->get_array($query);
		} else {
			return $query;
		}
	}

	public function load_related_news_by_tags($news_item, $cols = false, $where = false, $start, $limit, $order = false) {
		$tags_array = array();
		if (!isset($news_item['article_tags']) || trim($news_item['article_tags']) == '') {$tags_array = array();} else {
			$tags_array = explode(',', $news_item['article_tags']);
			$tags_array = array_filter($tags_array);
		}
		if (count($tags_array) == 0) {return $this->load_article_frontend_recursive($news_item['menu_id'], $cols, $where, $start, $limit, true);}
		$str = "(";
		$or_where = array();
		foreach ($tags_array as $tag) {
			$tag = trim($tag);

			$or_where[] = "vnvic_tblarticle.article_tags LIKE '%,$tag,%'";
		}
		$str .= implode(' OR ', $or_where);
		$str .= ")";

		$where = $where ? array_merge($where, array('extra_cond' => $str, 'tblarticle.article_id NOT LIKE ' => $news_item['article_id'])) : array('extra_cond' => $str, 'tblarticle.article_id NOT LIKE ' => $news_item['article_id']);

		return $this->load_article_frontend($cols, $where, $start, $limit, true, $order);
	}

}

?>