function clock(){
    var currentTime = new Date ( );
    var currentHours = currentTime.getHours ( );
var currentMinutes = currentTime.getMinutes ( );
var currentSeconds = currentTime.getSeconds ( );
var currentDate = currentTime.getDate();
var currentMonth = currentTime.getMonth();
var currentYear = currentTime.getFullYear();
currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
currentHours = ( currentHours == 0 ) ? 12 : currentHours;
var currentTimeString = currentHours + " : " + currentMinutes + " : " + currentSeconds + " " + timeOfDay+ "  "+currentDate+"/"+currentMonth+"/"+currentYear;

$(".clock").html(currentTimeString);
}

function validate_form(form_id){
    var elements=$("#"+form_id+" :input");
      for(var i=0;i<elements.length;i++){
        if(elements[i].getAttribute("name")!=null){
        var element_val=elements[i].value.trim();
        var options=elements[i].getAttribute("class");
        var min_length=elements[i].getAttribute("minlength");
        var max_length=elements[i].getAttribute("maxlength");
        var min=elements[i].getAttribute("min");
        var max=elements[i].getAttribute("max");
        // validate required

        if(options=="required_field" && element_val.trim().length==0){
            alert("Thông tin này không được trống");elements[i].focus();return false;
        }
        // validate min length
       if(min_length!=null){
        if(element_val.length<=min_length){
           alert("Số ký tự phải lớn hơn "+min_length);elements[i].focus();return false;

        }
       }
       //validate max length

              if(max_length!=null){
        if(element_val.length >= max_length){
           alert("Số ký tự phải nhỏ hơn "+max_length);elements[i].focus();return false;

        }
       }
        // validate email
           if(options=="email_field" && !check_email(element_val)){
            alert("Địa chỉ email không đúng định dạng");elements[i].focus;return false;
        }

        // validate number
            if(options=="numbered_field" && isNaN(element_val)){alert("Phải nhập số");elements[i].focus();return false;}
            if(options=="numbered_field" && !isNaN(element_val)){
                if(min!=null && element_val<min){
                  alert("Số nhập vào phải lớn từ "+min);elements[i].focus();return false;
                }
                if(max!=null && element_val > max){
                  alert("Số nhập vào phải bé từ "+max);elements[i].focus();return false;
                }
            }

      }

      }
      return true;
}

 function submit_form(form_id,type_submit,url_submit){
    var elements=$("#"+form_id+" :input");
    var string='';
    for(var i=0;i<elements.length;i++){
    if(elements[i].getAttribute("name")!=null){
        var element_val=elements[i].value;
        if(elements[i].getAttribute("type")=="checkbox" || elements[i].getAttribute("type")=="radio" ){
            if(elements[i].checked==false){
                element_val='off';
            }
          }
       if(elements[i].getAttribute("class")=="ckeditor"){
        var instance=elements[i].getAttribute("name");
        element_val=CKEDITOR.instances[instance].getData();
       };
        string+=elements[i].getAttribute("name")+"="+element_val+"&";
  }
}
  var result = $.ajax({
        type:type_submit,
        url:url_submit,
        data:string,
        async: false,

    }).responseText;

   return result;
  }

 function edit_admin(name){
var  user_name=name;
 if(user_name!='0'){
        var url=base_url+'admin/user/update_admin.html';
var result=submit_form('frm_list_admin','get',url);

if(result=='0'){alert('Tài khoản của bạn không được quyền sửa thông tin các tài khoản khác');return;}

    $(document).ready(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':500,
            'width':800,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url+'?user_name='+user_name,
            'onClosed': function(){$("#frm_list_admin").load(base_url+'admin/user/load_user_table.html'); },
        });
});
    }
  }





  function edit_plugin(id,redirect_url){
   var plugin_id=id;
    if(plugin_id!==0){
    var url=base_url+'admin/plugin/edit_plugin/'+plugin_id+'.html';

$(document).ready(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':500,
            'width':800,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url,
              'onClosed': function(){document.location.href=redirect_url;},
        });
});


}
}

function pushup_plugin(id,url){
     var url_submit=base_url+'admin/plugin/up_plugin.html?plugin_id='+id;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
      document.location.href=url;
    }
   });
}
function pushdown_plugin(id,url){
     var url_submit=base_url+'admin/plugin/down_plugin.html?plugin_id='+id;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
      document.location.href=url;
    }
   });
}


$(document).ready(function() {

})

function setting_block(action,id){
   var redirect_url=document.URL;
    var plugin_id=id;
     switch(action){
    case 'edit':
    edit_plugin(id,redirect_url);
    break;
    case 'up':
    pushup_plugin(id,redirect_url);
    break;
    case 'down':
    pushdown_plugin(id,redirect_url);
    break;
    case 'update':
    document.location.target='_blank';
    document.location.href=base_url+'admin/plugin/plugin_content.html?plugin_id='+id;
    break;
    case 'delete':
    var check=confirm('Xóa khối nội dung,các nội dung bị xóa sẽ không thể phục hồi.');
    if(check){
        $.ajax({
            type:'post',
            url:base_url+'admin/plugin/delete_plugin/'+id+'.html',
            success:function(data){
                if(data=='0'){
                    alert('Xóa khối nội dung thành công');
                    $(".widget").each(function(){
                        if($(this).attr("title")==id){$(this).remove();}
                    });
                }else{
                    alert('Có lỗi xảy ra,xóa khối nội dung thất bại');
                }
            }
            })
    }
    break;
    break;
   }
}

function admin_task(task){
    if(task!='0'){
        window.open(task);
    }
}

function hide_taskbar(){
    $("#layout-config").fadeOut("slow");
}



function edit_product(product_id){
    window.open(base_url+'admin/product/edit_product/'+product_id+'.html');
}
function edit_article(id){
    window.open(base_url+'admin/article/edit_article/'+id+'.html');
}
function delete_article(id){
    var check=confirm("Bạn có muốn xóa bài viết này không");
    if(check){
        $.ajax({
        type:'get',
        'url':base_url+'admin/article/delete_article/'+id+'.html',
        success:function(){
          $(".box-news").each(function(){
            if(parseInt($(this).attr("title"))==id){
                $(this).remove();
            }
        })
       }
    })
}
}
function up_article(id){
$.ajax({
        type:'get',
        'url':base_url+'admin/article/up_article/'+id+'.html',
        success:function(){
        document.location.href=document.URL;

        }
    })
}
function down_article(id){
$.ajax({
        type:'get',
        'url':base_url+'admin/article/down_article/'+id+'.html',
        success:function(){
        document.location.href=document.URL;
        }
    })
}
function up_product(product_id){
    $.ajax({
        type:'get',
        'url':base_url+'admin/product/up_product.html',
        data:({'id':product_id}),
        success:function(data){
        document.location.href=document.URL;

        }
    })
}
function down_product(product_id){
    $.ajax({
        type:'get',
        'url':base_url+'admin/product/down_product.html',
        data:({'id':product_id}),
        success:function(data){

       document.location.href=document.URL;

    }
    })
}

function delete_product(id){
    var check=confirm("Bạn có muốn xóa sản phẩm này không?");
    if(check){
        $.ajax({
        type:'get',
        'url':base_url+'admin/product/delete_product.html',
        data:({'id':id}),
        success:function(){
        $(".box-product").each(function(){
            if(parseInt($(this).attr("title"))==id){
                $(this).remove();
            }
        })

        }
    })
    }
}
$(document).ready(function(){
    $('.widget').mouseover(function(){
        $(this).find(".config").show();
    });
    $('.widget').mouseout(function(){
        $(this).find(".config").hide();
    });

    $(".options-task").mouseover(function(){
        $(this).find(".admin-task").show();
    });
        $(".options-task").mouseout(function(){
        $(this).find(".admin-task").hide();
    });

    $('#show-hide-taskbar').click(function(){
        if($("#layout-config").is(":visible")){
            $("#layout-config").slideUp("slow");
            $("#show-hide-taskbar").attr("class","show-taskbar").attr("title","Hiển thị taskbar");
        }else{
          $("#layout-config").slideDown();
            $("#show-hide-taskbar").attr("class","hide-taskbar").attr("title","Ẩn taskbar");
        }
    })
})

function change_web_template(){
    var url=base_url+'admin/config/choose_template.html';
 $(document).ready(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':800,
            'width':800,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url,
              'onClosed': function(){document.location.href=base_url;},
        });
});
}
$(document).ready(function(){

// Add product task
$(".box-product").each(function(){var id=$(this).attr("title");
if(id){
var config='<div class="admin-content-config"></div>';
var task='<div class="admin-content-task">';
                                    task+='<ul>';
                                    task+='<li><a href="javascript:void(0)" onclick="edit_product(\''+id+'\')">Sửa sản phẩm</a></li>';
                                    task+='<li><a href="javascript:void(0)" onclick="delete_product(\''+id+'\')">Xóa sản phẩm</a></li>';
                                    task+='<li><a href="javascript:void(0)" onclick="up_product(\''+id+'\')">Sắp xếp lên</a></li>';
                                    task+='<li><a href="javascript:void(0)" onclick="down_product(\''+id+'\')">Sắp xếp xuống</a></li>';
                                    task+='</ul>';
$(this).prepend(task);              task+='</div>';
$(this).prepend(config);
}
})


// Add article task
$(".box-news").each(function(){var id=$(this).attr("title");
if(id){
var config='<div class="admin-content-config"></div>';
var task='<div class="admin-content-task">';
                                    task+='<ul>';
                                    task+='<li><a href="javascript:void(0)" onclick="edit_article(\''+id+'\')">Sửa bài viết</a></li>';
                                    task+='<li><a href="javascript:void(0)" onclick="delete_article(\''+id+'\')">Xóa bài viết</a></li>';
                                    task+='<li><a href="javascript:void(0)" onclick="up_article(\''+id+'\')">Sắp xếp lên</a></li>';
                                    task+='<li><a href="javascript:void(0)" onclick="down_article(\''+id+'\')">Sắp xếp xuống</a></li>';
                                    task+='</ul>';
$(this).prepend(task);              task+='</div>';
$(this).prepend(config);
}
})

// Add widget task
$(".widget").each(function(){

    var id=$(this).attr("title");
    if(id){
    var task='<div class="config"><select class="block-config" name="'+id+'" onchange="setting_block(this.value,$(this).attr(\'name\'))">';
            task+='<option  value="0" title="template/scripts/move.png">Cấu hình</option>';
            task+='<option  value="edit" title="template/scripts/edit.png">Sửa</option>';
            task+='<option value="delete" title="template/scripts/delete.png">Xóa</option>';
             task+='<option value="up" title="template/scripts/up.png">Lên</option>';
             task+='<option value="down" title="template/scripts/down.png">Xuống</option>';
             task+='<option  value="update" title="template/scripts/update.png">Cập nhập nội dung</option>';
            task+='</select>';
            task+='</div>';
            $(this).prepend(task);
           }
});

// dd selectbox
try {
		oHandler = $(".block-config").msDropDown().data("dd");
		//alert($.msDropDown.version);
		//$.msDropDown.create("body select");
		$("#ver").html($.msDropDown.version);
		} catch(e) {
			alert("Error: "+e.message);
		}
  clock();
  setInterval('clock()',1000);

// Click and hover task
$(".admin-content-task").hover(function(){$(this).fadeIn()},function(){$(this).fadeOut()});
$(".admin-content-config").click(function(){
        if($(this).parent().children(".admin-content-task").is(":visible")){
    $(this).parent().children(".admin-content-task").fadeOut("slow");
    }else{
        $(this).parent().children(".admin-content-task").fadeIn ("slow");
    }
});
})




