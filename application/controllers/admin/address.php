<?php
/**
 * Address
 *
 * @package cms
 * @author syhung
 * @copyright 2012
 * @version $Id$
 * @access public
 */
Class Address extends Admin_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['location_model']);

    }

    public function index(){
        $data['title'] = 'Quản trị địa điểm';
        $url = base_url() . 'admin/address.html?';
        $where = false;
        $location_array = $this->location_model->load_locations();

        $data['locations'] = $this->location_model->build_locations_tree($location_array,0);
        $this->load->view('back_end/address/index_address', $data);

        //$data['types'] =




    }
    
    public function add()
    {
        if(!$this->input->post('region_id_edit'))
        {
           $parent_ids = $this->input->post('parent_id');
           $names = $this->input->post('region_name');
           $descrips = $this->input->post('region_description');
           $region_types = $this->input->post('region_type');
           $data = [];
           for($i = 0; $i <count($parent_ids) ;$i ++){
            if(isset($names[$i]) && isset($descrips[$i])) {
                $data[] = [$names[$i], $parent_ids[$i], $descrips[$i],$region_types[$i]];
            }
           }
           if(count($data) >0){
            $this->location_model->multiple_insert('tblregion',['region_name','parent_id','region_description','region_type'],$data);
            return json_encode(['code' => 'success']);
           }
            
        }
        
        if($this->input->post('region_id_edit'))
         {
             $ids = $this->input->post('region_id_edit');
             $names = $this->input->post('region_name_edit');
             $des = $this->input->post('region_des_edit');
             for($i = 0; $i <count($ids) ;$i ++)
             {
                if(isset($names[$i]) && trim($names[$i]) != ''){
                    $des[$i] = isset($des[$i]) ? $des[$i] : '';
                    $this->location_model->db->update('tblregion', ['region_name' => $names[$i],'region_description' => $des[$i]],['region_id'=>$ids[$i]]);
                }
             }
         }
    }
    
    public function delete()
    {
        if($this->input->post('location_id'))
        {
            $loc_ids = $this->input->post('location_id');
            $flag = true;
            foreach($loc_ids as $id)
            {
                if($this->location_model->select_query('tblregion',false, ['parent_id'=> $id])->num_rows() >0)
                {
                    $flag = false;
                
                } else {
                    $this->location_model->db->delete('tblregion',['region_id' => $id]);
                }
                    
                
            }
            if(!$flag)
            {
                   return json_encode(['code' => 'false']);
            }
            
        }
    }
    
    public function load_district($city_id)
    {
        echo json_encode($this->location_model->select_query('tblregion', ['region_id','region_name'], ['parent_id' => $city_id], false, false, false, false, true));
    }
    
            
        
}
?>