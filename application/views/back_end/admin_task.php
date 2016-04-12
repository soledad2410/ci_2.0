<?
$CI=&get_instance();
?>
<div id="layout-config">
        <ul>
        <li> <a onclick="edit_admin('<?=$CI->user['user_name']?>')"><b><?=$CI->user['user_name']?></b></a></li>
        <li class="options-task">
        <a href="javascript:void(0)" onclick="show_admin_task()">Chọn tác vụ</a>
        <span></span>
        <div class="admin-task">
            <ul>
                <li><a href="admin/article/add_article.html" target="_blank">Viết bài</a></li>
                <li><a href="admin/product/add_product.html" target="_blank">Thêm sản phẩm</a></li>
                <li><a href="admin/plugin/plugin.html#form" target="_blank">Thêm khối nội dung</a></li>
            </ul>
        </div>
        </li>
        
      <li><a href="admin/admin/index.html">Vào trang quản trị</a></li>
         
         <li><a href="javascript:void(0)" onclick="change_web_template()">Chọn giao diện website</a></li>
         <li class="logout" ><a href="admin/admin/logout.html">Đăng xuất</a></li>
       <li class="clock"></li>
         </ul>
</div>
<div id="options-layout-config">
<div class="hide-taskbar" id="show-hide-taskbar" title="ẩn taskbar"></div>
</div>