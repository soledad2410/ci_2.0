<?php
class Plugin extends Admin_Controller {

	private $plugin_id;

	public function Plugin() {
		parent::__construct();
		$this->load->model(array('menu_model', 'plugin_model'));

	}

	/**
	 * Plugin::change_widget_position()
	 *
	 * @param int $plugin_id
	 * @param int $position
	 * @param int $queu
	 * @return json
	 */
	public function change_widget_position($plugin_id, $position, $queu) {
		$swap_id = $this->plugin_model->get_by_key('tblplugin', 'plugin_id', null, null, array('position_name' => $position, 'plugin_queu' => $queu));

		if ($this->plugin_model->update_data('tblplugin', array('position_name' => $position, 'plugin_queu' => $queu), array('plugin_id' => $plugin_id))) {
			echo json_encode(array('code' => 'success'));
		} else {
			echo json_encode(array('code' => 'false'));
		}
	}

	/**
	 * Plugin::index()
	 *
	 * @return void
	 */
	public function index() {

		$select_array = array('tblplugin.plugin_id', 'tblplugin.layout_name', 'tblplugin.plugintemplate_id', 'tblplugin.plugin_title', 'tblplugin.plugin_queu', 'tblplugin.position_name', 'tblplugin.plugin_visible', 'tblplugintype.plugintype_title', 'template');
		$where_array = array('tbllang.lang_shortname' => $_SESSION['lang_admin'], 'tblplugintype.plugintype_visible' => 1, 'tblplugin.domain_id' => $this->domain_id);
		if (($template = $this->input->get('template'))) {
			$where_array = array_merge(array('tblplugin.template' => $template));
		}
		$message = '';
		// Insert new record
		if ($this->input->post()) {
			$insert_data = $this->input->post();
			$insert_data['domain_id'] = $this->domain_id;
			$message = $this->add_plugin($insert_data);
		}
		// End insert
		$data['message'] = $message;
		$data['total'] = $this->plugin_model->load_plugin($select_array, $where_array)->num_rows();
		if ($this->input->get('phrase')) {
			$where_array = array_merge($where_array, array('tblplugin.plugin_title LIKE ' => '%' . $this->input->get('phrase') . '%'));
		}
		if ($this->input->get('type')) {
			$where_array = array_merge($where_array, array('tblplugintype.plugintype_id' => $this->input->get('type')));
		}
		if ($this->input->get('position')) {
			$where_array = array_merge($where_array, array('tblplugin.position_name' => $this->input->get('position')));
		}

		$data['templates'] = $this->plugin_model->select_query('tbltemplate');
		$data['title'] = 'Quản trị khối nội dung website';
		$data['plugins'] = $this->plugin_model->load_plugin($select_array, $where_array, false, false, array('tblplugin.template' => 'ASC', 'tblplugin.position_name' => 'ASC', 'tblplugin.plugin_queu' => 'ASC'));
		$data['positions'] = $this->plugin_model->load_plugin_position();
		$data['groups'] = $this->plugin_model->select_query('tblgroup', false, array('tblgroup.group_level > ' => 3));
		$data['plugintypes'] = $this->plugin_model->load_plugin_type(false, array('tblplugintype.plugintype_visible' => 1));
		$current_layout = $this->plugin_model->get_by_key('tbltemplate', 'layout_name', 'template_default', 1);
		$cate_array = $this->menu_model->load_menu(array('menu_id', 'menu_title', 'menu_string', 'tblmenu.parent_id'),array('tbllang.lang_shortname' => $this->my_lang, 'tblmenu.domain_id' => $this->domain_id), null, null, null, true);
		$data['trees'] = $this->menu_model->build_cate_tree($cate_array);

		$data['current_layout'] = LAYOUT_DIR . $current_layout;
		$data['layout_name'] = $this->layout;
		$this->load->view('back_end/plugin/index_plugin', $data);
	}

	/**
	 * Plugin::load_plugin_template()
	 *
	 * @return void
	 */
	public function load_plugin_template() {
		$plugintype_id = $this->input->get('id');
		$template = $this->input->get('template');
		$plugin_template = $this->plugin_model->load_layout_plugin_template($plugintype_id, $template);

		echo json_encode($plugin_template);
	}

	public function get_layout_position() {
		$layout = $this->input->get('layout');
		$template = $this->input->get('template');
		$configs = $this->plugin_model->load_template_layouts($template, $layout);

		echo json_encode($configs['positions']['position']);
	}
	/**
	 * Plugin::save_plugin()
	 *
	 * @return void
	 */
	private function add_plugin($post_data) {
		$plugin_queu = (int) $this->plugin_model->get_top('tblplugin', 'plugin_queu') + 1;
		$lang_id = $this->plugin_model->get_by_key('tbllang', 'lang_id', 'lang_shortname', $_SESSION['lang_admin']);
		$insert_data = array_merge(array('plugin_queu' => $plugin_queu, 'lang_id' => $lang_id, 'tblplugin.layout_name' => $this->layout), $post_data);
		if (isset($post_data['config'])) {
			$plugin_config = implode('|', $post_data['config']);
			$insert_data['config'] = $plugin_config;
			unset($insert_data['plugin_config']);
		}
		if (isset($post_data['configvalue'])) {
			$insert_data['configvalue'] = implode('|', $post_data['configvalue']);
		}
		if (isset($post_data['menu_ids'])) {$insert_data['menu_ids'] = implode('|', $post_data['menu_ids']);}
		if (isset($post_data['page_ids'])) {$insert_data['page_ids'] = implode('|', $post_data['page_ids']);}
		if (isset($post_data['plugin_privilege'])) {$insert_data['plugin_privilege'] = implode('|', $post_data['plugin_privilege']);}
		$message = $this->plugin_model->insert_data('tblplugin', $insert_data) ? admin_success("Thêm mới khối nội dung thành công") : admin_error("Có lỗi xảy ra,thêm mới khối nội dung thất bại");
		return $message;
	}

	/**
	 * Plugin::load_plugin_table()
	 *
	 * @return void
	 */
	public function load_plugin_table() {
		$data['current_layout'] = LAYOUT_DIR . $this->layout;
		$select_array = array('tblplugin.plugin_id', 'tblplugin.plugintemplate_id', 'tblplugin.layout_name', 'tblplugin.plugin_title', 'tblplugin.plugin_queu', 'tblplugin.position_name', 'tblplugin.plugin_visible', 'tblplugintype.plugintype_title');

		$data['plugins'] = $this->plugin_model->load_plugin(
			$select_array
			, array('tbllang.lang_shortname' => $_SESSION['lang_admin'], 'tblplugintype.plugintype_visible' => 1, 'tblplugin.layout_name' => $this->layout), false, false, array('tblplugin.position_name' => 'ASC', 'tblplugin.plugin_queu' => 'ASC'));
		$this->load->view('back_end/plugin/table_plugin', $data);
	}

	/**
	 * Plugin::up_plugin()
	 *
	 * @return void
	 */
	public function up_plugin() {
		$plugin_id = $this->input->get('plugin_id');
		$position = ($this->input->get('position')) ? $this->input->get('position') : $this->plugin_model->get_by_key('tblplugin', 'position_name', 'plugin_id', $plugin_id);
		$layout = $this->plugin_model->get_by_key('tblplugin', 'layout_name', 'plugin_id', $plugin_id);
		$current_queu = $this->plugin_model->get_by_key('tblplugin', 'plugin_queu', 'plugin_id', $plugin_id);
		$next_plugin = $this->plugin_model->load_plugin(array('tblplugin.plugin_queu,tblplugin.plugin_id'),
			array('tblplugin.position_name' => $position, 'tblplugin.layout_name' => $layout, 'tbllang.lang_shortname' => $_SESSION['lang_admin'], 'tblplugin.plugin_queu < ' => $current_queu), 0, 1, array('tblplugin.plugin_queu' => 'DESC'), true
		);

		if (count($next_plugin) == 1) {

			$this->plugin_model->db->update('tblplugin', array('plugin_queu' => $next_plugin['0']['plugin_queu']), array('plugin_id' => $plugin_id));
			$this->plugin_model->db->update('tblplugin', array('plugin_queu' => $current_queu), array('plugin_id' => $next_plugin['0']['plugin_id']));

		}
	}
	/**
	 * Plugin::down_plugin()
	 *
	 * @return void
	 */
	public function down_plugin() {
		$plugin_id = $this->input->get('plugin_id');
		$position = $position = ($this->input->get('position')) ? $this->input->get('position') : $this->plugin_model->get_by_key('tblplugin', 'position_name', 'plugin_id', $plugin_id);
		$current_queu = $this->plugin_model->get_by_key('tblplugin', 'plugin_queu', 'plugin_id', $plugin_id);
		$layout = $this->plugin_model->get_by_key('tblplugin', 'layout_name', 'plugin_id', $plugin_id);
		$next_plugin = $this->plugin_model->load_plugin(array('tblplugin.plugin_queu,tblplugin.plugin_id'),
			array('tblplugin.position_name' => $position, 'tblplugin.layout_name' => $layout, 'tbllang.lang_shortname' => $_SESSION['lang_admin'], 'tblplugin.plugin_queu > ' => $current_queu), 0, 1, array('tblplugin.plugin_queu' => 'ASC'), true
		);
		if (count($next_plugin) == 1) {

			$this->plugin_model->db->update('tblplugin', array('plugin_queu' => $next_plugin['0']['plugin_queu']), array('plugin_id' => $plugin_id));
			$this->plugin_model->db->update('tblplugin', array('plugin_queu' => $current_queu), array('plugin_id' => $next_plugin['0']['plugin_id']));

		}
	}

	/**
	 * Plugin::edit_plugin()
	 *
	 * @return
	 */
	public function edit_plugin($id = FALSE) {

		$plugin_id = $id;
		if (!$plugin_id) {return false;}
		$message = '';
		// Save edit plugin
		if ($this->input->post()) {

			$update_data = $this->input->post();
			if ($this->input->post('config')) {

				$update_data['config'] = implode('|', $this->input->post('config'));
				$update_data['configvalue'] = implode('|', $this->input->post('configvalue'));
			}
			$update_data['menu_ids'] = isset($update_data['menu_ids']) ? implode('|', $update_data['menu_ids']) : '';
			$update_data['page_ids'] = isset($update_data['page_ids']) ? implode('|', $update_data['page_ids']) : '';
			$update_data['plugin_privilege'] = isset($update_data['plugin_privilege']) ? implode('|', $update_data['plugin_privilege']) : '';
			$update_data['plugin_visible'] = isset($update_data['plugin_visible']) ? $update_data['plugin_visible'] : 0;
			if ($this->input->post('plugin_filter')) {
				$update_data['plugin_filter'] = implode('|', $this->input->post('plugin_filter'));
			} else { $update_data['plugin_filter'] = '';}
			$message = $this->plugin_model->db->update('tblplugin', $update_data, array('plugin_id' => $plugin_id)) ? admin_success('Cập nhập khối nội dung thành công') : admin_error('Có lỗi xảy ra,cập nhập khối nội dung thất bại');
		}
		$plugin_info = $this->plugin_model->load_plugin(false, array('tblplugin.plugin_id' => $plugin_id), false, false, false, true);
		$data['plugin'] = prep_form($plugin_info['0']);
		$template = $this->plugin_model->load_layout_plugin_template($plugin_info['0']['plugintype_name'], $plugin_info['0']['template']);
		$data['template_description'] = '';
		foreach ($template as $temp) {
			if ($temp['type'] == $plugin_info['0']['plugintype_name']) {
				$data['template_description'] = $temp['description'];
			}
		}

		$data['positions'] = $this->plugin_model->load_plugin_position($plugin_info['0']['template']);
		$data['templates'] = $template;
		$menu_array = explode('|', $plugin_info['0']['menu_ids']);
		$page_array = explode('|', $plugin_info['0']['page_ids']);

		$data['page_checkbox'] = $this->menu_model->select_query('tblmodule', array('module_id', 'module_description'), array('parent_id > ' => 0, 'module_active' => 1));
		$cate_array = $this->menu_model->load_menu(array('menu_id', 'menu_title', 'menu_string', 'tblmenu.parent_id'), array('tbllang.lang_shortname' => $this->my_lang, 'tblmenu.domain_id' => $this->domain_id), null, null, null, true);
		$data['trees'] = $this->menu_model->build_cate_tree($cate_array);
		$data['menu_array'] = $menu_array;
		$data['page_array'] = $page_array;

		$data['message'] = $message;

		$this->load->view('back_end/plugin/edit_plugin', $data);
	}

	/**
	 * Plugin::load_pluginconfig()
	 *
	 * @return void
	 */
	public function load_pluginconfig() {
		$plugintype_name = $this->input->get('id');
		$row = $this->plugin_model->get_row_array('tblplugintype',array('plugintype_name' => $plugintype_name));

		if ($row) {
			$select_val = array();
			if ($this->input->get('plugin')) {
				$row_plugin = $this->plugin_model->get_row_array('tblplugin', array('plugin_id' => $this->input->get('plugin')));
				$config = explode('|', trim($row_plugin['config']));
				$configvalue = explode('|', trim($row_plugin['configvalue']));
				$select_val = array_combine($config, $configvalue);

			}
			$config = array();
			$configs_name = explode('|', $row['pluginconfig_name']);
			$config_fieldtypes = explode('|', $row['field_type']);
			$configs_title = explode('|', $row['pluginconfig_title']);
			$config_val = explode('|', $row['field_value']);

			if (count($config_val) == count($configs_name) && count($config_val) == count($config_fieldtypes) && count($config_val) == count($configs_title) && count($config_val) > 1) {
				for ($i = 0; $i < count($config_val); $i++) {
					$config[] = array(
						'title' => trim($configs_title[$i]),
						'name' => trim($configs_name[$i]),
						'field' => trim($config_fieldtypes[$i]),
						'vals' => trim($config_val[$i]),
						'value' => isset($select_val[$configs_name[$i]]) ? $select_val[$configs_name[$i]] : false,
					);
				}
			}
			$row['config'] = $config;
			echo json_encode($row);
		}

	}
	/**
	 * Plugin::save_edit_plugin()
	 *
	 * @return void
	 */
	public function save_edit_plugin() {
		$update_array = $this->input->post();
		$plugin_id = $update_array['plugin_id'];
		$menu_array = $this->menu_model->load_menu('tblmenu.menu_id', array('tbllang.lang_shortname' => $_SESSION['lang']), null, null, null, true);
		$plugin_config = '';
		if ($this->input->post('plugin_config')) {
			$plugin_config = implode('|', $this->input->post('plugin_config'));
			$plugin_config = substr(strstr($plugin_config, '|'), 1);
			$update_array['plugin_configvalue'] = $plugin_config;

		}
		unset($update_array['plugin_config']);
		//   echo $plugin_config;
		$update_array['menu_ids'] = implode('|', $this->input->post('menu_ids'));
		$update_array['menu_ids'] = substr(strstr($update_array['menu_ids'], '|'), 1);
		$update_array['page_ids'] = implode('|', $this->input->post('page_ids'));
		$update_array['page_ids'] = substr(strstr($update_array['page_ids'], '|'), 1);
		//    echo $update_array['plugin_configvalue'];
		$this->plugin_model->db->update('tblplugin', $update_array, array('plugin_id' => $plugin_id));
		echo 0;
	}

	/**
	 * Plugin::delete_plugin()
	 *
	 * @return void
	 */
	public function delete_plugin($id = FALSE) {
		if ($id) {
			$tables = array('tblplugin', 'tblmedia', 'tblsupport');
			$this->plugin_model->db->delete($tables, array('plugin_id' => $id));
			echo 0;
			return;

		}
		$plugin_array = $this->input->post();
		foreach ($plugin_array as $key => $value) {
			$tables = array('tblplugin', 'tblmedia', 'tblsupport');
			$this->plugin_model->db->delete($tables, array('plugin_id' => $value));
		}
	}

	public function pluginmenu($id, $module) {
		$cate_array = $this->menu_model->load_menu(array('menu_id', 'menu_title', 'menu_string', 'tblmenu.parent_id', 'tblmodule.module_name'),array('tbllang.lang_shortname' => $this->my_lang, 'tblmenu.domain_id' => $this->domain_id), null, null, null, true);
		$data['trees'] = $this->menu_model->build_cate_tree($cate_array);
		if ($this->input->post()) {
			$update_data = array('plugin_submenu' => $this->input->post('plugin_submenu'));
			if ($this->plugin_model->db->update('tblplugin', $update_data, array('plugin_id' => $id))) {
				flash_data(admin_success('Câp nhập thông tin thành công'));
			} else {
				flash_data(admin_success('Câp nhập thông tin thất bại'));
			}

		}
		$data['plugin'] = $this->plugin_model->get_row_array('tblplugin', array('plugin_id' => $id));
		$data['title'] = 'Quản trị nội dung khối' . $data['plugin']['plugin_title'];
		$data['module'] = $module;
		$this->load->view('back_end/plugin/pluginmenu', $data);

	}

	/**
	 * Plugin::plugin_content()
	 *
	 * @return
	 */
	public function plugin_content() {
		$plugin_id = $this->input->get('plugin_id');
		if (!$plugin_id) {return false;}

		$plugin_info = $this->plugin_model->load_plugin('tblplugintype.plugintype_name', array('tblplugin.plugin_id' => $plugin_id), false, false, false, true);
		if (count($plugin_info) != 1) {return false;}
		$plugin_type = $plugin_info['0']['plugintype_name'];
		switch ($plugin_type) {
			case 'support':
				redirect(base_url() . 'admin/plugin/support/' . $plugin_id . '.html');
				break;
			case 'menu':
				redirect(base_url() . 'admin/plugin/menu/' . $plugin_id . '.html');
				break;
			case 'html':
				redirect(base_url() . 'admin/plugin/html/' . $plugin_id . '.html');
				break;
			case 'media':
				redirect(base_url() . 'admin/plugin/media/' . $plugin_id . '.html');
				break;
			case 'block_product':
				redirect(base_url() . 'admin/plugin/product/' . $plugin_id . '.html');
				break;
			case 'block_news':
				redirect(base_url() . 'admin/plugin/news/' . $plugin_id . '.html');
				break;
			case 'news':
				redirect(base_url() . 'admin/plugin/pluginmenu/' . $plugin_id . '/news_cate.html');
				break;
			case 'panorama':
				redirect(base_url() . 'admin/plugin/panorama/' . $plugin_id . '.html');
				break;
			case 'product':
				redirect(base_url() . 'admin/plugin/pluginmenu/' . $plugin_id . '/product_cate.html');
				break;
			default:
				redirect(base_url() . 'admin/plugin/noconfig/' . $plugin_id . '.html');
				break;

		}
	}

	/**
	 * Plugin::noconfig()
	 *
	 * @param mixed $plugin_id
	 * @return void
	 */
	public function noconfig($plugin_id) {
		$data['title'] = 'Quản trị nội dung khối nội dung ' . $this->plugin_model->get_by_key('tblplugin', 'plugin_title', 'plugin_id', $plugin_id);
		$data['message'] = admin_warning('Khối nội dung này không có chức năng quản trị nội dung');
		$this->load->view('back_end/plugin/noconfig', $data);
	}

	/**
	 * Plugin::support()
	 *
	 * @param mixed $plugin_id
	 * @return void
	 */
	public function support($plugin_id) {
		$plugin_title = $this->plugin_model->get_by_key('tblplugin', 'plugin_title', 'plugin_id', $plugin_id);

		$data['supports'] = $this->plugin_model->load_plugin_content('tblsupport', $plugin_id, false, false, false, false, array('support_queu' => 'ASC'));

		$plugin_info = $this->plugin_model->load_plugin(array('tblplugin.plugin_id', 'tblplugin.plugin_title'), array('tblplugin.plugin_id' => $plugin_id), false, false, false, true);
		$data['plugin'] = $plugin_info['0'];
		$data['title'] = 'Quản trị nội dung khối hỗ trợ trực tuyến : ' . $plugin_title;
		$this->load->view('back_end/plugin/support/index_support', $data);

	}

	/**
	 * Plugin::table_support()
	 *
	 * @param mixed $plugin_id
	 * @return void
	 */
	public function table_support($plugin_id) {
		$data['supports'] = $this->plugin_model->load_support($plugin_id, false, false, false, false, array('support_queu' => 'ASC'));
		$this->load->view('back_end/plugin/support/table_support', $data);
	}

	/**
	 * Plugin::add_support()
	 *
	 * @return void
	 */
	public function add_support() {
		$support_queu = (int) $this->plugin_model->get_top('tblsupport', 'support_queu') + 1;
		$insert_array = $this->input->post();
		$insert_array['support_queu'] = $support_queu;
		$this->plugin_model->db->insert('tblsupport', $insert_array);
		echo 0;
	}

	/**
	 * Plugin::delete_support()
	 *
	 * @return void
	 */
	public function delete_support() {
		foreach ($this->input->post() as $key => $value) {
			$this->plugin_model->db->delete('tblsupport', array('support_id' => $value));
		}
	}

	/**
	 * Plugin::up_support()
	 *
	 * @return void
	 */
	public function up_support() {
		$plugin_id = $this->input->get('plugin_id');
		$support_id = $this->input->get('support_id');

		$current_queu = $this->plugin_model->get_by_key('tblsupport', 'support_queu', 'support_id', $support_id);
		$next_support = $this->plugin_model->load_support($plugin_id, array('support_id', 'support_queu'),
			array('support_queu < ' => $current_queu), 0, 1, array('support_queu' => 'DESC'), true
		);
		if (count($next_support) == 1) {

			$this->plugin_model->db->update('tblsupport', array('support_queu' => $next_support['0']['support_queu']), array('support_id' => $support_id));
			$this->plugin_model->db->update('tblsupport', array('support_queu' => $current_queu), array('support_id' => $next_support['0']['support_id']));

		}

	}

	/**
	 * Plugin::down_support()
	 *
	 * @return void
	 */
	public function down_support() {
		{
			$plugin_id = $this->input->get('plugin_id');
			$support_id = $this->input->get('support_id');

			$current_queu = $this->plugin_model->get_by_key('tblsupport', 'support_queu', 'support_id', $support_id);

			$next_support = $this->plugin_model->load_support($plugin_id, array('support_id', 'support_queu'),
				array('support_queu > ' => $current_queu), 0, 1, array('support_queu' => 'ASC'), true
			);
			if (count($next_support) == 1) {
				$this->plugin_model->db->update('tblsupport', array('support_queu' => $next_support['0']['support_queu']), array('support_id' => $support_id));
				$this->plugin_model->db->update('tblsupport', array('support_queu' => $current_queu), array('support_id' => $next_support['0']['support_id']));

			}

		}

	}
	/**
	 * Plugin::edit_support()
	 *
	 * @return void
	 */
	public function edit_support() {
		$support_id = $this->input->get('support_id');

		$support_info = $this->plugin_model->load_support(false, false, array('support_id' => $support_id), false, false, false, true);
		$data['support'] = $support_info['0'];
		$this->load->view('back_end/plugin/support/edit_support', $data);

	}

	/**
	 * Plugin::save_edit_support()
	 *
	 * @return void
	 */
	public function save_edit_support() {
		$update_array = $this->input->post();
		$this->plugin_model->db->update('tblsupport', $update_array, array('support_id' => $update_array['support_id']));
		echo 0;
	}

	/**
	 * Plugin::adv()
	 *
	 * @param mixed $plugin_id
	 * @return void
	 */
	public function adv($plugin_id) {
		$plugin_title = $this->plugin_model->get_by_key('tblplugin', 'plugin_title', 'plugin_id', $plugin_id);

		$data['title'] = "Quản trị khối nội dung khối quảng cáo " . $plugin_title;
		$data['images'] = $this->plugin_model->load_plugin_content('tblimages', $plugin_id, array('plugin_id', 'image_id', 'image_href', 'image_title', 'image_visible', 'image_url', 'image_queu'), false, false, false, array('image_queu' => 'DESC'));
		$plugin_info = $this->plugin_model->load_plugin(array('tblplugin.plugin_id', 'tblplugin.plugin_title'), array('tblplugin.plugin_id' => $plugin_id), false, false, false, true);
		$data['plugin'] = $plugin_info['0'];
		$this->load->view('back_end/plugin/adv/index_adv', $data);
	}

	/**
	 * Plugin::add_adv()
	 *
	 * @return void
	 */
	public function add_adv() {
		$insert_array = $this->input->post();
		$insert_array['image_queu'] = (int) $this->plugin_model->get_top('tblimages', 'image_queu') + 1;
		$this->plugin_model->db->insert('tblimages', $insert_array);
		echo 0;
	}

	/**
	 * Plugin::table_adv()
	 *
	 * @param mixed $plugin_id
	 * @return void
	 */
	public function table_adv($plugin_id) {

		$data['images'] = $this->plugin_model->load_plugin_content('tblimages', $plugin_id, array('plugin_id', 'image_id', 'image_href', 'image_title', 'image_visible', 'image_url', 'image_queu'), false, false, false, array('image_queu' => 'DESC'));
		$this->load->view('back_end/plugin/adv/table_adv', $data);
	}

	/**
	 * Plugin::delete_adv()
	 *
	 * @return void
	 */
	public function delete_adv() {
		foreach ($this->input->post() as $key => $value) {
			$this->plugin_model->db->delete('tblimages', array('image_id' => $value));
		}
	}

	/**
	 * Plugin::edit_adv()
	 *
	 * @return void
	 */
	public function edit_adv() {
		$data['title'] = "Sửa thông tin quảng cáo";
		$image_id = $this->input->get('image_id');
		$image_info = $this->plugin_model->load_plugin_content('tblimages', false, false, array('image_id' => $image_id), false, false, false, true);
		$data['image'] = $image_info['0'];
		$this->load->view('back_end/plugin/adv/edit_adv', $data);
	}

	/**
	 * Plugin::save_edit_adv()
	 *
	 * @return void
	 */
	public function save_edit_adv() {
		$update_array = $this->input->post();
		$this->plugin_model->db->update('tblimages', $update_array, array('image_id' => $update_array['image_id']));
		echo 0;
	}

	/**
	 * Plugin::menu()
	 *
	 * @param mixed $plugin_id
	 * @return void
	 */
	public function menu($plugin_id, $module = false) {

		$data['menu_array'] = $this->menu_model->load_menu(array('tblmenu.menu_id', 'tblmenu.menu_title', 'menu_url', 'module_description'), array('tblmenu.menu_visible' => 1, 'tblmenu.menu_level' => 1, 'tbllang.lang_shortname' => $_SESSION['lang_admin'], 'tblmenu.domain_id' => $this->domain_id), null, null, array('tblmenu.menu_queu' => 'ASC'));
		if ($module) {
			$data['menu_array'] = $this->menu_model->load_menu(array('tblmenu.menu_id', 'tblmenu.menu_title', 'menu_url', 'module_description'), array('tblmenu.menu_visible' => 1, 'tblmenu.menu_level' => 1, 'tbllang.lang_shortname' => $_SESSION['lang_admin'], 'tblmodule.module_name' => $module), null, null, array('tblmenu.menu_queu' => 'ASC'));
		}

		$plugin_info = $this->plugin_model->load_plugin(false, array('tblplugin.plugin_id' => $plugin_id), false, false, false, true);
		$data['menu_in_plugin'] = explode('|', $plugin_info['0']['plugin_submenu']);
		$data['plugin'] = $plugin_info['0'];
		$data['title'] = 'Quản trị khối nội dung  ' . $plugin_info['0']['plugin_title'];
		$this->load->view('back_end/plugin/submenu/index_menu', $data);
	}

	/**
	 * Plugin::save_menu()
	 *
	 * @return void
	 */
	public function save_menu() {
		$plugin_id = $this->input->post('plugin_id');
		$menu_in_plugin = '';
		$insert_array = $this->input->post();
		$update_data = $this->input->post();
		foreach ($insert_array as $key => $value) {
			if ($value != 'off') {
				$menu_in_plugin .= $value . '|';
			}

		}
		$update_data['plugin_submenu'] = $menu_in_plugin;
		$this->plugin_model->update_data('tblplugin', $update_data, array('plugin_id' => $plugin_id));
		echo json_encode(array('code' => 'success'));
	}

	public function map_link($id) {
		$plugin_info = $this->plugin_model->load_plugin(false, array('tblplugin.plugin_id' => $id), false, false, false, true);
		if (count($plugin_info) != 1) {redirect($_SERVER["HTTP_REFERER"]);}
		$data['title'] = "Quản trị khối nội dung - Khối nội dung link liên kết " . $plugin_info['0']['plugin_title'];
		$data['links'] = $this->plugin_model->load_plugin_content('tblmaplink', $id);
		$data['plugin'] = $id;
		$this->load->view('back_end/plugin/maplink/index_maplink', $data);
	}
	function save_add_link() {
		$insert_array = $this->input->post();
		$this->plugin_model->db->insert('tblmaplink', $insert_array);
		echo 0;
	}

	function delete_link() {
		foreach ($this->input->post() as $key => $value) {
			$this->plugin_model->db->delete('tblmaplink', array('maplink_id' => $value));
		}
	}

	function html($id) {
		$plugin_info = $this->plugin_model->load_plugin(false, array('tblplugin.plugin_id' => $id), false, false, false, true);
		$data['title'] = 'Quản trị khối nội dung - Khối nội dung mã nhúng ' . $plugin_info['0']['plugin_title'];
		$data['plugin'] = $plugin_info['0'];
		$message = '';
		if ($this->input->post()) {
			$plugin_id = $this->input->post('plugin_id');
			$this->plugin_model->db->update('tblplugin', $this->input->post(), array('plugin_id' => $plugin_id));
			$message = admin_success('Cập nhập thành công');
		}
		$data['message'] = $message;
		$this->load->view('back_end/plugin/html/index_html', $data);
	}

	function save_html() {
		$plugin_id = $this->input->post('plugin_id');
		$this->plugin_model->db->update('tblplugin', $this->input->post(), array('plugin_id' => $plugin_id));
		echo 0;
	}

	/**
	 * Plugin::plugintype_description()
	 *
	 * @param mixed $id
	 * @return void
	 */
	function plugintype_description($id) {
		if ($id) {
			$description = $this->plugin_model->get_by_key('tblplugintype', 'plugintype_description', 'plugintype_name', $id);
			echo '<div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả loại khối nội dung</label>
							</div>
							<div class="input" style="background:#F2EBEB">
							<textarea cols="40" rows="3" readonly="true" class="field-description">' . $description . '</textarea>
							</div>
                      	</div>';
		}
	}

	/**
	 * Plugin::media()
	 *
	 * @param mixed $id
	 * @return void
	 */
	function media($id) {
		$plugin_info = $this->plugin_model->load_plugin(false, array('tblplugin.plugin_id' => $id), false, false, false, true);
		if (count($plugin_info) != 1) {redirect($_SERVER["HTTP_REFERER"]);}
		$data['title'] = "Quản trị khối nội dung - Khối nội dung media " . $plugin_info['0']['plugin_title'];
		$data['medias'] = $this->plugin_model->load_plugin_content('tblmedia', $id, FALSE, FALSE, FALSE, FALSE, array('tblmedia.media_queu' => 'DESC'));
		$data['plugin'] = $plugin_info['0'];
		$this->load->view('back_end/plugin/media/index_media', $data);
	}

	/**
	 * Plugin::table_media()
	 *
	 * @param mixed $id
	 * @return void
	 */
	function table_media($id) {
		$data['medias'] = $this->plugin_model->load_plugin_content('tblmedia', $id, FALSE, FALSE, FALSE, FALSE, array('tblmedia.media_queu' => 'DESC'));
		$data['plugin'] = $id;
		$this->load->view('back_end/plugin/media/table_media', $data);
	}

	/**
	 * Plugin::edit_media()
	 *
	 * @param mixed $id
	 * @return void
	 */
	public function edit_media($id) {
		$media_info = $this->plugin_model->select_query('tblmedia', FALSE, array('media_id' => $id));
		if ($media_info->num_rows() != 1) {return;}
		$message = '';

		if ($this->input->post()) {
			$update_array = $this->input->post();
			$update_array['media_publish'] = ((int) $this->input->post('media_publish') == 0) ? 0 : mktime_date_vi($this->input->post('media_publish'), '-');
			$update_array['media_expire'] = ((int) $this->input->post('media_expire') == 0) ? mktime_date_vi('01-01-2020', '-') : mktime_date_vi($this->input->post('media_expire'), '-');
			$update_array['media_visible'] = (int) $this->input->post('media_visible');
			if ($this->plugin_model->db->update('tblmedia', $update_array, array('media_id' => $update_array['media_id']))) {
				$message = admin_success("Sửa thông tin media thành công");
			} else {
				$message = admin_error("Có lỗi xảy ra,sửa thông tin media thất bại");
			}

		}
		$media_info = $this->plugin_model->select_query('tblmedia', FALSE, array('media_id' => $id), FALSE, FALSE, FALSE, FALSE, TRUE);
		if (count($media_info) != 1) {return;}
		$data['message'] = $message;
		$data['title'] = 'Sửa thông tin media';
		$data['media'] = prep_form($media_info['0']);
		$this->load->view('back_end/plugin/media/edit_media', $data);
	}

	/**
	 * Plugin::save_media()
	 *
	 * @return void
	 */
	function save_media() {
		$insert_array = $this->input->post();
		$plugin_id = $this->input->post('plugin_id');
		$insert_array['media_publish'] = ((int) $this->input->post('media_publish') == 0) ? 0 : mktime_date_vi($this->input->post('media_publish'), '-');
		$insert_array['media_expire'] = ((int) $this->input->post('media_expire') == 0) ? mktime_date_vi('01-01-2020', '-') : mktime_date_vi($this->input->post('media_expire'), '-');
		$insert_array['media_queu'] = (int) $this->plugin_model->get_top('tblmedia', 'media_queu') + 1;
		$this->plugin_model->db->insert('tblmedia', $insert_array);
		echo 0;
	}

	/**
	 * Plugin::delete_media()
	 *
	 * @return void
	 */
	function delete_media() {
		foreach ($this->input->post() as $key => $value) {
			$this->plugin_model->db->delete('tblmedia', array('media_id' => $value));
		}
		echo 0;
	}

	/**
	 * Plugin::up_media()
	 *
	 * @return void
	 */
	function up_media() {
		$media_id = $this->input->post('id');
		$plugin_id = $this->plugin_model->get_by_key('tblmedia', 'plugin_id', 'media_id', $media_id);
		$current_queu = $this->plugin_model->get_by_key('tblmedia', 'media_queu', 'media_id', $media_id);
		$next_media = $this->plugin_model->select_query('tblmedia', array('media_id', 'media_queu'), array('plugin_id' => $plugin_id, 'media_queu > ' => $current_queu), FALSE, 0, 1, array('media_queu' => 'ASC'), TRUE);
		if (count($next_media) == 1) {
			$this->plugin_model->db->update('tblmedia', array('media_queu' => $next_media['0']['media_queu']), array('media_id' => $media_id));
			$this->plugin_model->db->update('tblmedia', array('media_queu' => $current_queu), array('media_id' => $next_media['0']['media_id']));

		}
	}
	/**
	 * Plugin::down_media()
	 *
	 * @return void
	 */
	public function down_media() {
		$media_id = $this->input->post('id');
		$plugin_id = $this->plugin_model->get_by_key('tblmedia', 'plugin_id', 'media_id', $media_id);
		$current_queu = $this->plugin_model->get_by_key('tblmedia', 'media_queu', 'media_id', $media_id);
		$next_media = $this->plugin_model->select_query('tblmedia', array('media_id', 'media_queu'), array('plugin_id' => $plugin_id, 'media_queu < ' => $current_queu), FALSE, 0, 1, array('media_queu' => 'DESC'), TRUE);
		if (count($next_media) == 1) {
			$this->plugin_model->db->update('tblmedia', array('media_queu' => $next_media['0']['media_queu']), array('media_id' => $media_id));
			$this->plugin_model->db->update('tblmedia', array('media_queu' => $current_queu), array('media_id' => $next_media['0']['media_id']));

		}
	}

	public function product($plugin_id) {
		$this->load->model('product_model');
		$product_id_array = explode('|', $this->product_model->get_by_key('tblplugin', 'block_product', 'plugin_id', $plugin_id));
		$product_array = $this->plugin_model->select_query('tblproduct', FALSE, FALSE, array('tblmenu' => 'tblmenu.menu_id=tblproduct.menu_id'), FALSE, FALSE, array('tblproduct.product_date' => 'DESC'), FALSE, array('product_id' => $product_id_array));
		$data['product_in_block'] = $product_array;
		$data['plugin_id'] = $plugin_id;
		// Product list
		$url = 'admin/plugin/product/' . $plugin_id . '.html?';
		$cond = '';
		if ($this->input->get('cate')) {
			$cond .= "cate=" . $this->input->get('cate') . "&";
		}
		if ($this->input->get('min')) {
			$cond .= "min=" . str_replace('.', '', $this->input->get('min')) . "&";
		}
		if ($this->input->get('max')) {
			$cond .= "max=" . str_replace('.', '', $this->input->get('max')) . "&";
		}
		if ($this->input->get('keyword')) {
			$cond .= "keyword=" . $this->input->get('keyword') . "&";
		}
		if ($this->input->get('limit')) {
			$cond .= "limit=" . $this->input->get('limit') . "&";
		}
		$data['all_product'] = $this->product_model->load_product_recursive(false, 0, false, false, false, false,
			array('tbllang.lang_shortname' => $_SESSION['lang_admin']))->num_rows();
		$total_product_query = $this->product_model->load_product_recursive(false, $this->
				input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
					input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
			('tbllang.lang_shortname' => $_SESSION['lang_admin']), false, false, false,
			array('tblmenu.menu_queu' => 'ASC', 'tblproduct.product_queu' => 'DESC'));
		$data['total'] = $total_product_query->num_rows();

		$current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
		$limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
		$data['products'] = $this->product_model->load_product_recursive(false, $this->
				input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
					input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
			('tbllang.lang_shortname' => $_SESSION['lang_admin']), $limit, ($current_page -
				1) * $limit, false, array('tblproduct.product_queu' => 'DESC'));
		$data['block_id_array'] = explode('|', trim($this->product_model->get_by_key('tblplugin', 'block_product', 'plugin_id', $plugin_id)));

		$data['block_content'] = $this->product_model->get_by_key('tblplugin', 'block_product', 'plugin_id', $plugin_id);
		$data['result_from'] = $limit * ($current_page - 1) + 1;
		$data['result_to'] = $limit * $current_page;
		$data['page'] = page_count($total_product_query->num_rows(), $limit);
		$data['url'] = $url . $cond;
		$data['current_page'] = $current_page;
		//End product list
		$data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id', 'menu_title', 'menu_level', 'tblmenu.parent_id'), array('tblmodule.module_name = ' => 'product_cate', 'tbllang.lang_shortname' => $this->my_lang));
		$data['title'] = 'Trang quản lý khối nội dung sản phẩm';
		$this->load->view('back_end/plugin/product/index_product', $data);

	}

	/**
	 * Plugin::update_product_block()
	 *
	 * @return void
	 */
	public function update_product_block() {
		$product_id = $this->input->post('product_id');
		$plugin_id = $this->input->post('plugin_id');
		$status = $this->input->post('status');
		if ($status == 1) {
			$info = $this->plugin_model->select_query('tblproduct', FALSE, array('product_id' => $product_id), array('tblmenu' => 'tblproduct.menu_id=tblmenu.menu_id'));
			$block = $this->plugin_model->get_by_key('tblplugin', 'block_product', 'plugin_id', $plugin_id);
			$block = trim($block) . $product_id . '|';
			$this->plugin_model->db->update('tblplugin', array('block_product' => $block), array('plugin_id' => $plugin_id));
			foreach ($info->result_array() as $product) {
				echo '<tr>
								<td class="title" style="width: 20%;"><div class="prod-name" title="' . $product['product_id'] . '"><a href="admin/product/edit_product/' . $product['product_id'] . '.html">' . $product['product_name'] . '</a></div></td>
                                <td class="title" style="width: 10%;"><a href="' . base_url() . 'admin/plugin/product/' . $plugin_id . '.html?cate=' . $product['menu_id'] . '">' . $product['menu_title'] . '</a></td>
								<td class="price"><img src="' . $product['product_image'] . '" height="40" /></td>
								<td class="date" id="dp1307331808406">' . date('H:m d-m-Y', $product['product_date']) . '</td>
								<td class="category">' . number_format($product['product_price'], 0, '.', '.') . 'VND</td>
                                <td class="queu"></td>
                                <td class="queu"></td>
                                <td class="queu"><img src="html/resources/images/icons/active_' . $product['product_visible'] . '.gif" width="16" height="16" alt="visible"/></td>
                                <td class="queu"><a href="javascript:void(0)" onclick="remove_product_from_block(\'' . $product['product_id'] . '\')"><img src="html/resources/images/delete.png" width="24" height="24" alt="delete"/></a></td>
                                <td class="selected last"><input type="checkbox"  name="' . $product['product_id'] . '" value="' . $product['product_id'] . '" /></td>
							</tr>';
			}

		}
		if ($status == 0) {
			$block = $this->plugin_model->get_by_key('tblplugin', 'block_product', 'plugin_id', $plugin_id);
			$block = str_replace($product_id . '|', '', trim($block));
			$this->plugin_model->db->update('tblplugin', array('block_product' => $block), array('plugin_id' => $plugin_id));
		}

	}

	public function news($plugin_id) {
		$this->load->model('article_model');
		$article_id_array = explode('|', $this->plugin_model->get_by_key('tblplugin', 'block_article', 'plugin_id', $plugin_id));
		$article_array = $this->plugin_model->select_query('tblarticle', FALSE, FALSE, array('tblmenu' => 'tblmenu.menu_id=tblarticle.menu_id'), FALSE, FALSE, array('tblarticle.article_datetime' => 'DESC'), FALSE, array('article_id' => $article_id_array));
		$data['articles_in_block'] = $article_array;
		$data['plugin_id'] = $plugin_id;
		$data['title'] = 'Trang quản lý nội dung khối nội dung tin tức';
		$data['article_id_array'] = $article_id_array;
		// List article
		$url = 'admin/plugin/news/' . $plugin_id . '?';
		$cond = '';
		if ($this->input->get('cate')) {
			$cond .= "cate=" . $this->input->get('cate') . "&";
		}
		if ($this->input->get('from')) {
			$cond .= "from=" . $this->input->get('from') . "&";
		}
		if ($this->input->get('to')) {
			$cond .= "to=" . $this->input->get('to') . "&";
		}
		if ($this->input->get('keyword')) {
			$cond .= "keyword=" . $this->input->get('keyword') . "&";
		}
		if ($this->input->get('limit')) {
			$cond .= "limit=" . $this->input->get('limit') . "&";
		}

		$data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id', 'menu_title', 'menu_level', 'tblmenu.parent_id'), array('tblmodule.module_name = ' => 'news_cate'));
		$data['article_page'] = $this->menu_model->get_by_key('tblconfigvalue', 'config_value', null, null, array('config_id' => 99, 'lang_shortname' => $_SESSION['lang_admin']));
		$data['article_other'] = $this->menu_model->get_by_key('tblconfigvalue', 'config_value', null, null, array('config_id' => 100, 'lang_shortname' => $_SESSION['lang_admin']));
		$data['show_article_datetime'] = $this->menu_model->get_by_key('tblconfigvalue', 'config_value', null, null, array('config_id' => 101, 'lang_shortname' => $_SESSION['lang_admin']));
		$data['show_article_author'] = $this->menu_model->get_by_key('tblconfigvalue', 'config_value', null, null, array('config_id' => 102, 'lang_shortname' => $_SESSION['lang_admin']));
		// Select articles by options
		// All article
		$query = $this->article_model->load_article_recursive(array('tblarticle.article_id', 'tblarticle.article_title', 'tblmenu.menu_id', 'tblarticle.article_author', 'tblarticle.user_name',
			'tblarticle.article_datetime', 'tblarticle.article_queu', 'tblmenu.menu_title'), $this->input->get('cate'), false, array('tblmodule.module_name' => 'news_cate'), $this->input->get('keyword'), $this->
				input->get('from'), $this->input->get('to'), array('tblarticle.article_queu' => 'DESC'), false, false);

		$data['total'] = $query->num_rows();
		// Current article page
		$current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
		$limit = ($this->input->get('limit')) ? $this->input->get('limit') : 6;
		$data['page'] = page_count($query->num_rows(), $limit);
		$data['url'] = $url . $cond;
		$data['current_page'] = $current_page;
		$data['result_from'] = $limit * ($current_page - 1) + 1;
		$data['result_to'] = $limit * $current_page;
		$query1 = $this->article_model->load_article_recursive(array('tblarticle.article_id', 'tblarticle.article_visible', 'tblarticle.article_title', 'tblmenu.menu_id', 'tblarticle.article_author', 'tblarticle.user_name',
			'tblarticle.article_datetime', 'tblarticle.article_queu', 'tblmenu.menu_title'), $this->input->get('cate'), false, array('tblmodule.module_name' => 'news_cate'), $this->input->get('keyword'), $this->
				input->get('from'), $this->input->get('to'), array('tblarticle.article_queu' => 'DESC'), $limit, ($current_page - 1) * $limit);
		$data['articles'] = $query1;

		// End list article
		$this->load->view('back_end/plugin/news/index_news', $data);
	}

	function update_article_block() {
		$article_id = $this->input->post('article_id');
		$plugin_id = $this->input->post('plugin_id');
		$status = $this->input->post('status');
		if ($article_id && $plugin_id) {
			if ($status == 1) {
				$info = $this->plugin_model->select_query('tblarticle', FALSE, array('article_id' => $article_id), array('tblmenu' => 'tblmenu.menu_id=tblarticle.menu_id'));
				$block = $this->plugin_model->get_by_key('tblplugin', 'block_article', 'plugin_id', $plugin_id);
				$block = trim($block) . $article_id . '|';
				$this->plugin_model->db->update('tblplugin', array('block_article' => $block), array('plugin_id' => $plugin_id));
				foreach ($info->result_array() as $article) {
					echo '<tr>
								<td class="title" style="width: 35%;"><a href="admin/article/edit_article/' . $article['article_id'] . '.html">' . $article['article_title'] . '</a></td>
                                <td class="name" style="width: 10%;text-align: center;">' . $article['user_name'] . '</td>
								<td class="price">' . $article['article_author'] . '</td>
								<td class="date" style="width: 15%;" id="dp1307331808406">' . date('H:m d-m-Y', $article['article_datetime']) . '</td>
								<td class="category"><a href="admin/article.html?cate=' . $article['menu_id'] . '">' . $article['menu_title'] . '</a></td>
                                <td class="queu"><img src="html/resources/images/icons/active_' . $article['article_visible'] . '.gif" width="16" height="16" alt="visible"/></td>
                                <td class="queu"><a href="javascript:void(0)" onclick="remove_article_from_block(\'' . $article['article_id'] . '\')"><img src="html/resources/images/delete.png" width="24" height="24" alt="delete"/></a></td>
                                <td class="queu"></td>
								<td class="selected last"><input type="checkbox"  name="' . $article['article_id'] . '" value="' . $article['article_id'] . '"/></td>
							</tr>';
				}
			} else {
				$block = $this->plugin_model->get_by_key('tblplugin', 'block_article', 'plugin_id', $plugin_id);
				$block = str_replace($article_id . '|', '', $block);
				$this->plugin_model->db->update('tblplugin', array('block_article' => $block), array('plugin_id' => $plugin_id));
			}
		}
	}

	/**
	 * Plugin::template_details()
	 *
	 * @return void
	 */
	function template_details() {
		$plugin = $this->input->get('plugin');
		$template = $this->input->get('template');
		$plugin_array = $this->plugin_model->load_layout_plugin_template(false, $template);

		if (isset($plugin_array['file']) && $plugin_array['file'] == $plugin) {
			echo json_encode($plugin_array);
			return;
		}
		if (isset($plugin_array['file']) && $plugin_array['file'] != $plugin) {
			echo json_encode(array());
			return;
		}
		foreach ($plugin_array as $item) {
			if ($item['file'] == $plugin) {
				echo json_encode($item);
			}
		}

	}

	function get_layout_by_template() {
		$template = $this->input->get('template');
		if (trim($template) != '') {
			$layouts = $this->plugin_model->load_template_layouts($template);

			echo json_encode($layouts);
			return;
		}
		echo json_encode(array());
		return;
	}

	public function swap_position() {
		$id1 = $this->input->post("id");
		$queu = $this->input->post('queu');
		$queu_1 = $this->plugin_model->get_by_key('tblplugin', 'plugin_queu', 'plugin_id', $id1);
		$id2 = $this->plugin_model->get_by_key('tblplugin', 'plugin_id', 'plugin_queu', $queu);
		$this->plugin_model->update_data('tblplugin', array('plugin_queu' => $queu), array('plugin_id' => $id1));
		if ($id2) {
			$this->plugin_model->update_data('tblplugin', array('plugin_queu' => $queu_1), array('plugin_id' => $id2));
			echo json_encode(array('code' => 'success', 'swapped_id' => $id2, 'queu' => $queu_1));
			return;
		}
		echo json_encode(array('code' => 'success'));
		return;
	}

	public function panorama($id) {
		$plugin = $this->plugin_model->get_row_array('tblplugin', array('plugin_id' => $id));
		$data['title'] = 'Quản lý khối nội dung panorama ' . $plugin['plugin_title'];
		$data['title'] = "Quản trị khối nội dung - Khối nội dung media " . $plugin['plugin_title'];
		if ($this->input->post()) {
			$update_data = $this->input->post();
			$this->plugin_model->update_data('tblplugin', $update_data, array('plugin_id' => $id));
			flash_data(admin_success('Cập nhập thông tin thành công'));
		}
		$data['albums'] = $this->plugin_model->select_query('tblgallery', false, array('type' => 'panorama'));
		$data['plugin'] = $plugin;
		$this->load->view('back_end/plugin/panorama/index', $data);
	}

}
?>