<?php


Class MY_Router extends CI_Router{

    function MY_Router(){
        parent::__construct();
    }

    function _validate_request($segments)
    {


		if (count($segments) == 0)
		{
			return $segments;
		}
        if(count($segments) == 1 && $segments['0'] != 'rss'){
            $lang = 'vi';
            $temps = explode('_',$segments['0']);
            $menu_string = isset($temps['0']) ? $temps['0'] : $segments['0'];
            $page = isset($temps['1']) ? $temps['1'] : false;
            $cate_info = $this->get_cate_info($menu_string);
          //
            if(count($cate_info) > 1){

                $segments['0'] = $cate_info['module_name'];
                $segments['1'] = 'cate';

                switch($cate_info['module_name']){
                    case 'news_cate':
                        $segments['0'] ='news';
                    break;
                    case 'product_cate' :
                        $segments['0'] = 'product';
                        break;
                    case 'contact_index':
                        $segments['0'] = 'contact';
                        $segments['1'] = 'index';
                        break;
                    case 'gallery_cate':
                        $segments['0'] = 'gallery';
                        $segments['1'] = 'cate';

                        break;
                    default : break;
                }

                $segments['2'] = $cate_info['lang_shortname'];
                $segments['3'] = $cate_info['menu_id'];
                $segments['4'] = $menu_string;
                if($page){$segments['5'] = $page;}
            }

        }elseif(count($segments) == 1 && $segments['0'] == 'rss'){

            $segments['0'] = 'news';
            $segments['1'] = 'rss';

        }


         //var_dump($_SERVER['REQUEST_URI']);


        //var_dump($segments);echo '<br/>';
        //var_dump($http);

		// Does the requested controller exist in the root folder?
		if (file_exists(APPPATH.'controllers/'.$segments[0].EXT))
		{
			return $segments;
		}

		// Is the controller in a sub-folder?
		if (is_dir(APPPATH.'controllers/'.$segments[0]))
		{
			// Set the directory and remove it from the segment array
			$this->set_directory($segments[0]);
			$segments = array_slice($segments, 1);

			if (count($segments) > 0)
			{
				// Does the requested controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].EXT))
				{
					show_404($this->fetch_directory().$segments[0]);
				}
			}
			else
			{
				// Is the method being specified in the route?
				if (strpos($this->default_controller, '/') !== FALSE)
				{
					$x = explode('/', $this->default_controller);

					$this->set_class($x[0]);
					$this->set_method($x[1]);
				}
				else
				{
					$this->set_class($this->default_controller);
					$this->set_method('index');
				}

				// Does the default controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.EXT))
				{
					$this->directory = '';
					return array();
				}

			}

			return $segments;
		}


		// If we've gotten this far it means that the URI does not correlate to a valid
		// controller class.  We will now see if there is an override
		if ( ! empty($this->routes['404_override']))
		{
			$x = explode('/', $this->routes['404_override']);

			$this->set_class($x[0]);
			$this->set_method(isset($x[1]) ? $x[1] : 'index');

			return $x;
		}


		// Nothing else to do at this point but show a 404
		show_404($segments[0]);
	}

    function get_cate_info($menu_string)
    {
        include_once APPPATH.'config/database.php';

        $lang = 'vi';
   

         //Gather the DB connection settings

        $prefix = $db['default']['dbprefix'];
       
        
        $link = @mysql_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password']) or die('Could not connect to server.' ); //Connect to the DB server
        mysql_select_db($db['default']['database'], $link) or die('Could not select database.'); //Select the DB
        $query = 'SELECT '.$prefix.'tblmenu.menu_id,'.$prefix.'tblmodule.module_name,'.$prefix.'tbllang.lang_shortname FROM '.$prefix.'tblmenu,'.$prefix.'tblmodule, '.$prefix.'tbllang ,'.$prefix.'tbldomain ';
        $query .= 'WHERE '.$prefix.'tblmenu.module_id='.$prefix.'tblmodule.module_id AND '.$prefix.'tblmenu.lang_id='.$prefix.'tbllang.lang_id AND '.$prefix.'tbldomain.domain_id='.$prefix.'tblmenu.domain_id ';
        $query .= 'AND '.$prefix.'tblmenu.menu_string="'.$menu_string.'" AND '.$prefix.'tblmenu.menu_visible=1 AND ('.$prefix.'tbldomain.domain_name="'.$_SERVER['SERVER_NAME'].'" OR '.$prefix.'tbldomain.alias="'.$_SERVER['SERVER_NAME'].'")';
        if($results = mysql_fetch_array(mysql_query($query))){

         $cate_info = $results;
            mysql_close($link);
           
         return $cate_info;
        }




    }

}
