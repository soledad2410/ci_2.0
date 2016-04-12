<?php

/**
 * Article
 *
 * @package CI
 * @author syhung_it
 * @copyright 2011
 * @version 1.0
 * @access public
 */
class Article extends Admin_Controller
{


    /**
     * Article::Article()
     *
     * @return void
     */
    public function Article()
    {
        parent::__construct();


        $this->load->model('article_model');
        $this->load->model('menu_model');
        $this->load->model('config_model');
        $this->load->model('url_model');
    }

    /**
     * Article::index()
     *
     * @return void
     */
    public function index()
    {


        $url = 'admin/article/index.html?';
        $cond = '';
        if ($this->input->get('cate'))
        {
            $cond .= "cate=" . $this->input->get('cate') . "&";
        }
        if ($this->input->get('from'))
        {
            $cond .= "from=" . $this->input->get('from') . "&";
        }
        if ($this->input->get('to'))
        {
            $cond .= "to=" . $this->input->get('to') . "&";
        }
        if ($this->input->get('keyword'))
        {
            $cond .= "keyword=" . $this->input->get('keyword') . "&";
        }
        if ($this->input->get('limit'))
        {
            $cond .= "limit=" . $this->input->get('limit') . "&";
        }
        $data['title'] = "Quản lý bài viết";
        $data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id', 'menu_title', 'menu_level', 'tblmenu.parent_id'), array('tblmodule.module_name = ' => 'news_cate','tblmenu.domain_id'=>$this->domain_id));
        
       
        // Select articles by options
        // All article
        $query = $this->article_model->load_article_recursive(array('tblarticle.article_id', 'tblarticle.article_title', 'tblmenu.menu_id', 'tblarticle.article_author', 'tblarticle.user_name',
            'tblarticle.article_datetime', 'tblarticle.article_queu', 'tblmenu.menu_title'), $this->input->get('cate'), array('tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id), array('tblmodule.module_name' => 'news_cate'), $this->input->get('keyword'), $this->
            input->get('from'), $this->input->get('to'), array('tblarticle.article_queu' => 'DESC'), false, false);


        $data['total'] = $query->num_rows();
        // Current article page
        $current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        $data['config_news'] = $this->config_model->load_config('tblconfig.config_id', array('config_active' => 1, 'tblconfig.config_module' => 'news','tblconfig.domain_id'=>$this->domain_id));
        $data['page'] = page_count($query->num_rows(), $limit);
        $data['url'] = $url . $cond;
        $data['current_page'] = $current_page;
        $data['result_from'] = $limit * ($current_page - 1) + 1;
        $data['result_to'] = $limit * $current_page;
        $query1 = $this->article_model->load_article_recursive(array('tblarticle.article_id', 'tblarticle.article_visible','tblarticle.article_title', 'tblmenu.menu_id', 'tblarticle.article_author', 'tblarticle.user_name',
            'tblarticle.article_datetime', 'tblarticle.article_queu', 'tblmenu.menu_title','article_image'), $this->input->get('cate'), array('tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id), array('tblmodule.module_name' => 'news_cate'), $this->input->get('keyword'), $this->
            input->get('from'), $this->input->get('to'), array('tblarticle.article_queu' => 'DESC'), $limit, ($current_page - 1) * $limit);
        $data['articles'] = $query1;
        $this->load->view('back_end/article/index_article.php', $data);

    }

    /**
     * Article::add_article()
     *
     * @return void
     */
    public function add_article()
    {
        $message = '';
       
        if ($this->input->post())
        {
            $insert_array = $this->input->post();
            $date = $this->input->post('article_datetime');
            list($day, $month, $year) = explode('-', $date);
            $time = mktime(date('H', time()), date('m', time()), date('s', time()), $month, $day, $year);
            $insert_array['article_datetime'] = $time;
            $insert_array['user_name'] = $this->user['user_name'];
            $insert_array['article_comment_privilege']=($this->input->post('article_comment_privilege'))?implode('|',$this->input->post('article_comment_privilege')):'';
            $insert_array['lang'] = $this->my_lang;
            $insert_array['domain_id'] = $this->domain_id;
            $insert_array['article_tags'] = $this->input->post('article_tags');
            if(!startsWith($this->input->post('article_tags'),',')){
                $insert_array['article_tags'] = ',' .  $insert_array['article_tags'];
            }
            if(!endsWith($this->input->post('article_tags'),','))
            {
                $insert_array['article_tags'] =  $insert_array['article_tags'] . ',' ;
            }
            //$top_id = $this->article_model->insert_data('tblarticle',$insert_array,'article_id');
            if ($this->article_model->save_article($insert_array))
            {
                //$url=$this->url_model->emit_news_url($top_id);
                //$this->url_model->submit_google_url($url);
                $this->url_model->emit_sitemap($_SESSION['lang_admin']);
                $message = admin_success('Thêm mới bài viết thành công');
            } else
            {
                $message = admin_error('Có lỗi xảy ra,thêm mới bài viết thất bại');
            }
        }
        $data['groups']=$this->article_model->select_query('tblgroup',false,array('group_level > '=>3));
        $data['message'] = $message;
        $data['title'] = "Quản lý bài viết-Thêm mới bài viết";
         $cate_array = $this->menu_model->load_menu(array('menu_id','tblmenu.parent_id','tblmodule.module_name','menu_title','menu_string'),array('tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id),null,null,null,true);
        $data['trees'] = $this->menu_model->build_cate_tree($cate_array);
        $data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id',
            'menu_title', 'menu_level','menu_string' ,'tblmenu.parent_id'), array('tblmodule.module_name ' =>
            'news_cate', 'tbllang.lang_shortname' => $this->my_lang));
        $this->load->view('back_end/article/add_article', $data);


    }

    /**
     * Article::table_article()
     *
     * @return void
     */
    public function table_article()
    {   $limit=($this->input->get('limit'))?$this->input->get('limit'):10;
        $current_page=$this->input->get('page')?$this->input->get('page'):1;
        $query1 = $this->article_model->load_article_recursive(array('tblarticle.article_id','tblarticle.article_visible', 'tblarticle.article_title', 'tblmenu.menu_id', 'tblarticle.article_author', 'tblarticle.user_name',
            'tblarticle.article_datetime', 'tblarticle.article_queu', 'tblmenu.menu_title'), $this->input->get('cate'), false, array('tblmodule.module_name' => 'news_cate', 'lang_shortname' => $this->my_lang), $this->input->get('keyword'), $this->
            input->get('from'), $this->input->get('to'), array('tblarticle.article_queu' => 'DESC'), $limit, ($current_page - 1) * $limit);
        $data['articles'] = $query1;
        $this->load->view('back_end/article/table_article', $data);
    }


    /**
     * Article::up_article()
     *
     * @param int $article_id
     * @return void
     */
    public function up_article($article_id)
    {
        $this->article_model->push_up($article_id);

    }

    /**
     * Article::down_article()
     *
     * @param mixed $article_id
     * @return void
     */
    public function down_article($article_id)
    {
        $this->article_model->push_down($article_id);

    }


    /**
     * Article::delete_article()
     *
     * @param bool $id
     * @return void
     */
    public function delete_article($id=FALSE)
    {
        if ($id)
        {
            $this->article_model->db->delete('tblarticle', array('article_id' => $id));
            $url=$this->url_model->emit_news_url($id);
            $this->url_model->emit_sitemap($_SESSION['lang_admin']);
            redirect($_SERVER['HTTP_REFERER']);
        }
        foreach ($this->input->post() as $key => $value)
        {
            $this->article_model->db->delete('tblarticle', array('article_id' => $value));
        }
    }

    /**
     * Article::edit_article()
     *
     * @param mixed $id
     * @return void
     */
    public function edit_article($id)
    {

        $article_id = $id;
        $article = $this->article_model->load_article('article_id', array('article_id' => $article_id));
        if ($article->num_rows() != 1)
        {
            redirect(base_url().'admin/article.html');
        }
        $message = '';
        // Submit edit article
        if ($this->input->post())
        {
            $update_array = $this->input->post();
            $date = $this->input->post('article_datetime');

            $update_array['article_datetime'] = mktime_date_vi($this->input->post('article_datetime'),'-');
            $update_array['user_name'] = $this->user['user_name'];
            $update_array['article_visible'] = $this->input->post('article_visible') ? 1 : 0;
            $update_array['article_home'] = $this->input->post('article_home') ? 1 : 0;
            $update_array['article_hot'] = $this->input->post('article_hot') ? 1 : 0;
            $update_array['article_comment_privilege'] = $this->input->post('article_comment_privilege') ? implode('|',$this->input->post('article_comment_privilege')):'';
            $update_array['article_tags'] = $this->input->post('article_tags');
            if(!startsWith($this->input->post('article_tags'),',')){
                $update_array['article_tags'] = ',' .  $update_array['article_tags'];
            }
            if(!endsWith($this->input->post('article_tags'),','))
            {
                $update_array['article_tags'] =  $update_array['article_tags'] . ',' ;
            }
            if ($this->article_model->db->update('tblarticle', $update_array, array('article_id' => $article_id)))
            {
                $url=$this->url_model->emit_news_url($article_id);
                $this->url_model->emit_sitemap($_SESSION['lang_admin']);
                $message = admin_success('Sửa bài viết thành công');
            } else
            {
                $message = admin_error('Có lỗi xảy ra,sửa bài viết thất bại');
            }

        }
        $cate_array = $this->menu_model->load_menu(array('menu_id','tblmenu.parent_id','tblmodule.module_name','menu_title','menu_string'),array('tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id),null,null,null,true);
        $data['trees'] = $this->menu_model->build_cate_tree($cate_array); 
        $data['message'] = $message;
        $article_info = $this->article_model->load_article(false, array('article_id' => $article_id), false, false, false, false, false . false, false, false, true);
        $data['title'] = "Quản lý bài viết-Sửa bài viết";
        $data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id', 'menu_title', 'menu_level', 'tblmenu.parent_id'), array('tblmodule.module_name = ' => 'news_cate','tblmenu.domain_id'=>$this->domain_id), 'select_box', (int)$article_info['0']['menu_id']);
        $data['groups']=$this->article_model->select_query('tblgroup',false,array('group_level > '=>3));
        $data['article'] = prep_form($article_info['0']);
    
        $this->load->view('back_end/article/edit_article', $data);

    }

    /**
     * Article::comment()
     *
     * @return void
     */
    public function comment()
    {

        $url = 'admin/article/comment.html?';
        $cond = '';
        $where = array('tbllang.lang_shortname' => $this->my_lang);
        if ($this->input->get('article_id'))
        {
            $cond .= "article_id=" . $this->input->get('article_id') . "&";
            $where = array_merge($where, array('tblarticle.article_id' => $this->input->get('article_id')));
        }
        if ($this->input->get('from'))
        {
            $cond .= "from=" . $this->input->get('from') . "&";
            list($day, $month, $year) = explode('-', $this->input->get('from'));
            $from_time = mktime(0, 0, 0, $month, $day, $year);
            $where = array_merge($where, array('tblarticlecomment.comment_date > ' => $from_time));
        }
        if ($this->input->get('to'))
        {
            $cond .= "to=" . $this->input->get('to') . "&";
            list($day, $month, $year) = explode('-', $this->input->get('to'));
            $to_time = mktime(23, 59, 59, $month, $day, $year);
            $where = array_merge($where, array('tblarticlecomment.comment_date < ' => $to_time));
        }
        if ($this->input->get('keyword'))
        {
            $cond .= "keyword=" . $this->input->get('keyword') . "&";
            $where = array_merge($where, array('tblarticlecomment.comment_title LIKE ' => '%' . urldecode($this->input->get('keyword')) . '%'));

        }
        if ($this->input->get('limit'))
        {
            $cond .= "limit=" . $this->input->get('limit') . "&";
        }
        $join_array = array('tblarticle' => 'tblarticle.article_id=tblarticlecomment.article_id', 'tblmenu' => 'tblmenu.menu_id=tblarticle.menu_id', 'tbllang' => 'tblmenu.lang_id=tbllang.lang_id');
        $data['title'] = "Quản lý bài viết-Bình luận bài viết";
        $total = $this->article_model->select_query('tblarticlecomment', 'comment_id', false, $join_array)->num_rows();

        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        $select_array = array('tblarticle.article_title', 'tblarticle.article_id', 'tblarticlecomment.comment_id', 'tblarticlecomment.comment_title', 'tblarticlecomment.comment_date',
            'tblarticlecomment.cus_name', 'tblarticlecomment.comment_read', 'tblarticlecomment.comment_visible', 'tblarticlecomment.ip_address');


        $total_page = page_count($total, $limit);
        $data['comments'] = $this->article_model->select_query('tblarticlecomment', $select_array, $where, $join_array, ($page - 1) * $limit, $limit, array('tblarticlecomment.comment_date' => 'DESC'));
        $data['page'] = $total_page;
        $data['result_from'] = ($page - 1) * $limit;
        $data['result_to'] = $page * $limit;
        $data['total_all'] = $total;
        $data['current_page'] = $page;
        $data['url'] = $url . $cond;

        $this->load->view('back_end/article/comment', $data);
        //

    }

    /**
     * Article::view_comment()
     *
     * @param mixed $id
     * @return void
     */
    public function view_comment($id)
    {
        $data['title'] = "Quản lý bài viết-Xem bình luận bài viết";
        $comment_info = $this->article_model->select_query('tblarticlecomment', false, array('comment_id' => $id), array('tblarticle' => 'tblarticle.article_id=tblarticlecomment.article_id'));
        if ($comment_info->num_rows() == 0)
        {
            redirect(base_url() . 'admin/article/comment.html');
        }
        $comment = $this->article_model->get_array($comment_info);
        $data['comment'] = $comment['0'];
        $this->article_model->db->update('tblarticlecomment', array('comment_read' => 1), array('comment_id' => $id));
        $this->load->view('back_end/article/view_comment', $data);

    }

    /**
     * Article::save_comment()
     *
     * @return void
     */
    public function save_comment()
    {
        $this->article_model->db->update('tblarticlecomment', $this->input->post(), array('comment_id' => $this->input->post('comment_id')));
        echo 0;
    }


    /**
     * Article::delete_comment()
     *
     * @param bool $id
     * @return void
     */
    public function delete_comment($id=FALSE)
    {
        if ($id)
        {
            $this->article_model->db->delete('tblarticlecomment', array('comment_id' => $id));
            redirect(base_url() . 'admin/article/comment.html');
        }

        foreach ($this->input->post() as $key => $value)
        {
            $this->article_model->db->delete('tblarticlecomment', array('comment_id' => $value));
        }
    }

    /**
     * Article::active_comment()
     *
     * @return void
     */
    public function active_comment()
    {
        foreach ($this->input->post() as $key => $value)
        {
            $this->article_model->db->update('tblarticlecomment', array('comment_visible' => 1), array('comment_id' => $value));
        }
    }
    /**
     * Article::deactive_comment()
     *
     * @return void
     */
    public function deactive_comment()
    {
        foreach ($this->input->post() as $key => $value)
        {
            $this->article_model->db->update('tblarticlecomment', array('comment_visible' => 0), array('comment_id' => $value));
        }
    }
    
    public function swap_position()
    {
        $id1 = $this->input->post("id");
        $queu = $this->input->post('queu');
        $queu_1 = $this->article_model->get_by_key('tblarticle','article_queu','article_id',$id1);
        $id2 = $this->article_model->get_by_key('tblarticle','article_id','article_queu',$queu);
        $this->article_model->update_data('tblarticle',array('article_queu'=>$queu),array('article_id'=>$id1));
        if($id2){
            $this->article_model->update_data('tblarticle',array('article_queu'=>$queu_1),array('article_id'=>$id2));
            echo json_encode(array('code'=>'success','swapped_id'=>$id2,'queu'=>$queu_1));
            return;    
        }
        echo json_encode(array('code'=>'success'));
        return;
    }


}

?>