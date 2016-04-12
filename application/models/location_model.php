<?php

Class Location_Model extends Base_model
{
    
    public function build_locations_tree(array $elements,$parentId = 0)
    {
        $branch = array();
        foreach ($elements as $element)
        {
            if ($element['parent_id'] == $parentId) {
                $children = $this->build_locations_tree($elements, $element['region_id']);
                if ($children)
                {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
    
    public function load_locations()
    {
        return $this->select_query('tblregion',false,false,false,false,false,false,true);
    }
    
    public function load_by_parent($parent_id)
    {
         return $this->select_query('tblregion',array('region_id','region_name'),array('parent_id'=>$parent_id),false,false,false,false,true);
    }
    

    
}
?>