<?php

class Lib
{

    private $obj;
    public function Lib()
    {
        $this->obj = &get_instance();
        $this->obj->load->model('base_model');
        $this->obj->load->model('menu_model');
    }

    /**
     * Lib::to_ansi_character()
     *
     * @param string $text
     * @param bool $space
     * @return
     */
    public function to_ansi_character($text, $space = false)
    {
        $text = html_entity_decode($text);
        $text = preg_replace("/(ä|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
        $text = str_replace("ç", "c", $text);
        $text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
        $text = preg_replace("/(ì|í|î|ị|ỉ|ĩ)/", 'i', $text);
        $text = preg_replace("/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
        $text = preg_replace("/(ü|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
        $text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
        $text = preg_replace("/(đ)/", 'd', $text);
        //CHU HOA
        $text = preg_replace("/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
        $text = str_replace("Ç", "C", $text);
        $text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
        $text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
        $text = preg_replace("/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
        $text = preg_replace("/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
        $text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
        $text = preg_replace("/(Đ)/", 'D', $text);
        $text = preg_replace("/(̀|́|̉|$|>)/", '', $text);
        $text = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $text);

        $text = strtolower($text);
        $text = preg_replace('/\s\s+/', ' ', $text);
        $text = trim(preg_replace('/[^a-z0-9 ]/', '', $text));
        if (!$space)
        {
            $text = str_replace(" ", '-', $text);
        }
        $text = str_replace("----", "-", $text);
        $text = str_replace("---", "-", $text);
        $text = str_replace("--", "-", $text);
        return $text;
    }
    /**
     * Lib::embed_flash()
     *
     * @param mixed $url
     * @param mixed $width
     * @param mixed $height
     * @return void
     */
    public function embed_flash($url, $width = 100, $height = 100)
    {
        return '<object height="' . $height . '" width="' . $width .
            '" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0">
          <param name="movie" value="' . $banner . '">
          <param name="quality" value="high">
          <param name="menu" value="false">
          <param name="WMode" value="Transparent">
          <embed height="' . $height . '" width="' . $width . '" src="' . $url .
            '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="Transparent">
        </object>';
    }
    /**
     * Lib::emit_cate_url()
     *
     * @param mixed $cate_id
     * @return void
     */
    public function emit_cate_url($cate_id, $page = false, $cond = false)
    {
        if ($cate_id == 0)
        {
            return base_url();
        }
        $cate_info = $this->obj->menu_model->load_menu(array('tblmenu.menu_title', 'tblmodule.module_name'), array('tblmenu.menu_id' => $cate_id), null, null, null, true);
        if (count($cate_info) == 1)
        {
            $url = base_url() . substr($cate_info['0']['module_name'], 0, 3) . '/c' . $cate_id . '/' . $this->to_ansi_character($cate_info['0']['menu_title']);
            if ($page)
            {
                $url .= '/page' . $page;
            }

            $url .= '.html';
            if ($cate_info['0']['module_name'] == 'contact_index')
            {
                $url = base_url() . 'contact' . '/c' . $cate_id . '/' . $this->to_ansi_character($cate_info['0']['menu_title']) . '.html';
            }
            if ($cond)
            {
                $url .= $cond;
            }
            return $url;
        }

    }

    /**
     * Lib::emit_news_url()
     *
     * @param mixed $news_id
     * @return void
     */
    public function emit_news_url($news_id)
    {
        $news_info = $this->obj->menu_model->select_query('tblarticle', array('tblarticle.article_title', 'tblmodule.module_name'), array('tblarticle.article_id' => $news_id), array('tblmenu' =>
            'tblmenu.menu_id=tblarticle.menu_id', 'tblmodule' => 'tblmodule.module_id=tblmenu.module_id'), false, false, false, true);
        if (count($news_info) == 1)
        {
            $url = base_url() . substr($news_info['0']['module_name'], 0, 3) . '/a' . $news_id . '/' . $this->to_ansi_character($news_info['0']['article_title']) . '.html';
            return $url;
        }

    }

    /**
     * Lib::emit_product_url()
     *
     * @param mixed $product_id
     * @return void
     */
    public function emit_product_url($product_id)
    {
        $product_info = $this->obj->menu_model->select_query('tblproduct', array('tblproduct.product_name', 'tblmodule.module_name'), array('tblproduct.product_id' => $product_id), array('tblmenu' =>
            'tblmenu.menu_id=tblproduct.menu_id', 'tblmodule' => 'tblmodule.module_id=tblmenu.module_id'), false, false, false, true);
        if (count($product_info) == 1)
        {
            $url = base_url() . substr($product_info['0']['module_name'], 0, 3) . '/p' . $product_id . '/' . $this->to_ansi_character($product_info['0']['product_name']) . '.html';
            return $url;
        }
    }

    public function send_mail()
    {

    }

    public function emit_page_list($cate_id = false, $total, $limit, $current_page, $url = false, $cond = false)
    {
        $list = '';
        $page = 1;
        if ($limit > 0)
        {
            $page = ceil($total / $limit);
        }
        if ($page > 1)
        {

            $list .= '<ul>';
            for ($i = 1; $i <= $page; $i++)
            {
                if ($i == $current_page)
                {
                    if ($url)
                    {
                        $list .= '<li class="current"><a href="' . $url . 'page=' . $i . '">' . $i . '</li>';
                    } else
                    {
                        $list .= '<li class="current"><a href="' . $this->emit_cate_url($cate_id, $i, $cond) . '">' . $i . '</li>';
                    }
                } else
                {
                    if ($url)
                    {
                        $list .= '<li><a href="' . $url . 'page=' . $i . '">' . $i . '</li>';
                    } else
                    {
                        $list .= '<li><a href="' . $this->emit_cate_url($cate_id, $i, $cond) . '">' . $i . '</li>';
                    }
                }

            }
            $list .= '</ul>';
        }
        return $list;
    }

    /**
     * Lib::add_product_task()
     *
     * @param mixed $product_id
     * @return
     */
    public function add_product_task($product_id)
    {
        if (isset($_SESSION['admin']))
        {
            $task = '<div class="product-task"><a title="Sửa sản phẩm" onClick="edit_product(\'' . $product_id . '\')">Sửa</a>,<a title="Xóa sản phẩm" onClick="delete_product(\'' . $product_id . '\')">Xóa</a>,<a title="Sắp xếp sản phẩm lên" onClick="up_product(\'' .
                $product_id . '\')">Lên</a>,<a title="Sắp xếp sản phẩm xuống" onClick="down_product(\'' . $product_id . '\')">Xuống</a></div>';
            return $task;
        }
    }


    function emit_breadcrumb()
    {
        $string = '';
        $module = $this->obj->uri->rsegment(1);
        $function = $this->obj->uri->rsegment(2);
        $id = $this->obj->uri->rsegment(3);

        $page = $module . '_' . $function;
        if ($page == 'home_index')
        {
            return $string;
        }
        $check_is_cate_page = ($this->obj->menu_model->get_by_key('tblmodule', 'module_menu', 'module_name', $page) == 1) ? true : false;
        if ($check_is_cate_page)
        {
            return '<ul>' . $this->emit_cate_breadcrumb($id) . '</ul>';
        }
        $string .= '<ul>';
        switch ($page)
        {
            case 'news_details':
                $news_info = $this->obj->menu_model->select_query('tblarticle', array('menu_id', 'article_title'), array('article_id' => $id), false, false, false, false, true);
                $string .= $this->emit_cate_breadcrumb($news_info['0']['menu_id'], false);
                $string .= '<li class="visited"><a href="' . $this->emit_news_url($id) . '" title="' . $news_info['0']['article_title'] . '">' . $news_info['0']['article_title'] . '</a></li>';

                break;
            case 'product_details':
                $product_info = $this->obj->menu_model->select_query('tblproduct', array('menu_id', 'product_name'), array('product_id' => $id), false, false, false, false, true);
                $string .= $this->emit_cate_breadcrumb($product_info['0']['menu_id'], false);
                $string .= '<li class="visited"><a href="' . $this->emit_product_url($id) . '" title="' . $product_info['0']['product_name'] . '">' . $product_info['0']['product_name'] . '</a></li>';
                break;
            default:
                $string .= '<li><a href="' . base_url() . '" title="Trang chủ">Trang chủ</a></li>';
                $title = $this->obj->menu_model->get_by_key('tblmodule', 'module_description', 'module_name', $page);
                $string .= '<li class="visited"><a href="' . $_SERVER['REQUEST_URI'] . '" title="' . $title . '">' . $title . '<a></li>';
        }
        $string .= '</ul>';

        return $string;


    }

    function emit_cate_breadcrumb($cate_id, $options = true)
    {
        $string = '';
        $cate_array = explode('|', $this->obj->menu_model->load_parent_recursion($cate_id));
        $cate_array = array_reverse($cate_array);
        foreach ($cate_array as $cate)
        {
            $title = 'Trang chủ';
            if ($cate != 0)
            {
                $title = $this->obj->menu_model->get_by_key('tblmenu', 'menu_title', 'menu_id', $cate);
            }
            if ($cate = $cate_id)
            {
                $string .= '<li class="visited"><a href="' . $this->emit_cate_url($cate) . '" title="' . $title . '">' . $title . '</a></li>';
            } else
            {
                $string .= '<li><a href="' . $this->emit_cate_url($cate) . '" title="' . $title . '">' . $title . '</a></li>';
            }
        }
        return $string;
    }
}


function dowload($file_name)
{

}


?>