$.fn.clearForm = function() {
    return this.each(function() {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form')
            return $(':input',this).clearForm();
        if (type == 'text' || type == 'password' || tag == 'textarea')
            this.value = '';
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = -1;
    });
};
$(function()
{
    
/**
* Force input is number
**/

 $('.numbered_field').on('keypress',function(event) {
  // Backspace, tab, enter, end, home, left, right
  // We don't support the del key in Opera because del == . == 46.
  var controlKeys = [8, 9, 13, 35, 36, 37, 39];
  // IE doesn't support indexOf
  var isControlKey = controlKeys.join(",").match(new RegExp(event.which));
  // Some browsers just don't raise events for control keys. Easy.
  // e.g. Safari backspace.
  if (!event.which || // Control keys in most browsers. e.g. Firefox tab is 0
      (49 <= event.which && event.which <= 57) || // Always 1 through 9
      (48 == event.which && $(this).attr("value")) || // No 0 first digit
      isControlKey) { // Opera assigns values for control keys.
    return;
  } else {
    event.preventDefault();
  }
});

    
       $('select').each(function(){
       if($(this).attr('data')){
           var selectedVal = $(this).attr('data');

           $(this).children('option').each(function(){
               if($(this).val() == selectedVal){
                   $(this).attr('selected','selected');
               }
           });
       }
    });
    $('input[type="radio"]').each(function(){
         if($(this).attr('data')){
          var select_val = $(this).attr('data');
          var el_val = $(this).val();
          if(select_val === el_val){$(this).attr('checked','checked');}
      }
    }); 
        $('input[type="checkbox"]').each(function(){
         if($(this).attr('data')){
          var select_val = $(this).attr('data');
          var el_val = $(this).val();
          if(select_val === el_val){$(this).attr('checked','checked');}
      }
    }); 
});
function check_email(email){
   AtPos = email.indexOf("@")
   StopPos = email.lastIndexOf(".")
    if (email == "") {
    return false;
    }
    if (AtPos == -1 || StopPos == -1) {
    return false;
    }
    if (StopPos < AtPos) {
    return false;
    }

    if (StopPos - AtPos == 1) {
    return false;
    }
return true;
}
function clock(){
var currentTime = new Date ( );
var currentHours = currentTime.getHours ( );
var currentMinutes = currentTime.getMinutes ( );
var currentSeconds = currentTime.getSeconds ( );
currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
currentHours = ( currentHours == 0 ) ? 12 : currentHours;
var currentTimeString = currentHours + " : " + currentMinutes + " : " + currentSeconds + " " + timeOfDay;

$(".clock").html(currentTimeString);
}

function display_error(message){
    $("#message-error").fadeIn('slow');;
    $("#message-success").hide('slow');
    $("#error-message").html(message);
}
function display_success(message){
    $("#message-success").hide();
    $("#message-error").fadeIn('slow');

    $("#success-message").html(message);
}
function checkName(name,minLength,maxLength){
    var regx=/^[a-zA-Z]+[a-zA-Z0-9-_]*$/;
    if(regx.test(name)){
        if(minLength!=null && name.length < minLength){return false;}
        if(maxLength!=null && name.length > maxLength){return false;}
        return true;

    }else{return false;
    }
}
function checkImageFile(name)
{
    var regx = /^([/|.|\w|\s])*\.(jpg|png|gif|JPEG|PNG|GIF)$/;
    if(regx.test(name)){return true;}else{return false;}
}
function validate_form(form_id){
    var elements=$("#"+form_id+" :input");
    var error = 0;
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
                $(elements[i]).addClass('error-input');
                $(elements[i]).after('<span class="error">(*) Thông tin này không được trống</span>');
                error ++;
            }
            // validate min length
            if(min_length!=null){
                 if(element_val.length < min_length){
                $(elements[i]).addClass('error-input');
                $(elements[i]).after('<span class="error">(*) Số ký tự phải lớn hơn hoặc bằng '+min_length+'</span>');
                error ++;
                }

            }
            //validate max length

            if(max_length!=null){
                if(element_val.length >= max_length){
                    $(elements[i]).addClass('error-input');
                    $(elements[i]).after('<span class="error">(*) Số ký tự phải nhỏ hơn '+max_length+'</span>');
                    error ++;


                }
            }
            // validate email
            if(options=="email_field" && !check_email(element_val)){
                $(elements[i]).addClass('error-input');
                $(elements[i]).after('<span class="error">(*) Địa chỉ email không đúng định dạng</span>');
                error ++;

            }

            // Validate name field
            if(options=='name_field' && !checkName(element_val,4,20)){
                $(elements[i]).addClass('error-input');
                $(elements[i]).after('<span class="error">(*) Thông tin không được chứa ký tự đặc biệt và khoảng trắng,từ 4 tới 20 ký tự</span>');
                error ++;
            }
            // Validate image field file
            if(options == 'image_field' && !checkImageFile(element_val)){
                $(elements[i]).addClass('error-input');
                $(elements[i]).after('<span class="error">(*) Chỉ chấp nhận các định dạng ảnh .png,.jpg,.jpeg,.gif</span>');
                error ++;

            }

            // validate number
            if(options=="numbered_field" && isNaN(element_val)){
                $(elements[i]).addClass('error-input');
                $(elements[i]).after('<span class="error">(*) Phải nhập số</span>');
                error ++;

            }
            if(options=="numbered_field" && !isNaN(element_val)){
                if(min!=null && element_val<min){
                    $(elements[i]).addClass('error-input');
                    $(elements[i]).after('<span class="error">(*) Số nhập vào phải lớn từ '+min+'</span>');
                    error ++;

                }
                if(max!=null && element_val > max){
                    $(elements[i]).addClass('error-input');
                    $(elements[i]).after('<span class="error">(*) Số nhập vào phải bé hơn  '+max+'</span>');
                    error ++;

                }
            }

        }

    }
    if(error >0 ){return false;} else {
        return true;
    }

}


// Submit form via ajax very important
  function submit_form(form_id,type_submit,url_submit){
    var elements=$("#"+form_id+" :input");
    var string='';
    var data={};
 for(var i=0;i<elements.length;i++){

    if(elements[i].getAttribute("name")!=null){
      var element_val=elements[i].value.trim();
      var name=elements[i].getAttribute("name");
      // Check elements sent is checkbox
        if(elements[i].type=="checkbox"){
            if(elements[i].checked==true){element_val=elements[i].value;}else{element_val='off';}

        }
        // Check elements sent is radio
        if(elements[i].type=="radio"){
            element_val=$('input[name='+name+']:checked','#'+form_id).val();
        }
        // Check elements sent is ckeditor
        if(elements[i].getAttribute("class")=="ckeditor" || elements[i].getAttribute("class")=="text-editor" ){

            element_val=CKEDITOR.instances[name].getData()
        }
        // Check element sent is array
        var AtPos = name.lastIndexOf("[")
        var StopPos = name.lastIndexOf("]")

        if(StopPos-AtPos==1 && StopPos>0 && AtPos > 0 ){
            if(data[name]=="undefined" ){data[name]=''}
        data[name]=data[name]+'|'+element_val ;

        }else{
       data[name]=element_val;
       }
    }
 }
  var result = $.ajax({
        type:type_submit,
        url:url_submit,

        data:data,
        beforeSend:function(){$('.loading').show();},
        success:function(){$('.loading').hide();},
        async: false,

    }).responseText;

   return result;
  }
  function reset_form(form_id){
    document.getElementById(form_id).reset();
  }

   function get_checkbox_checked_value(form_id){
          var elements= $("#"+form_id+" :input");
           var id=0;
          for(var i=0;i<elements.length;i++){
         if(elements[i].type=="checkbox"){
            if(elements[i].checked==true && elements[i].value!="on"){
               id=elements[i].value;
               break;

            }
        }

         }

         return id;

   }



function clearForm(form) {


        $(':input', form).each(function() {

          var type = this.type;
         var tag = this.tagName.toLowerCase(); // normalize case

          if (type == 'text' || type == 'password' || tag == 'textarea')

            this.value = "";

          else if (type == 'checkbox' || type == 'radio')

            this.checked = false;

            else if (tag == 'select')

            this.selectedIndex = -1;

        });

      };



function get_ck(id,multi,filePath){
  	var finder = new CKFinder();
	finder.basePath = 'asset/ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
    if(multi==true){
        finder.selectActionFunction =set_other_image;
    }else{
	finder.selectActionFunction =set_file_field;
    }

    if(filePath!=null){
    finder.startupPath=filePath;
    }
    finder.selectActionData=id;
	finder.popup();

}

function set_file_field(file_url,data){
    document.getElementById( data["selectActionData"] ).value = file_url;
    $("#"+data["selectActionData"]+"-thumb").html("<img src='"+file_url+"' height='70'/>");
}

function set_other_image(file_url,data){
    var els=data["selectActionData"];

    document.getElementById(data["selectActionData"]).value += file_url+'|';

     $("#"+data["selectActionData"]+"-thumb").append("<img src='"+file_url+"' height='70' onclick='remove_image(this,\""+els+"\");' title='click here to remove this image' style='cursor:pointer'/>");
}
function remove_image(els,id){

    var image=$(els).attr("src");
    var value=$("#"+id).val();
    $("#"+id).val(value.replace(image+'|',''))
   $(els).remove();
}
function open_popup(open_url,closed_url,width,height){
    var width_frame=700;
    var height_frame=350;
    if(width!=null){width_frame=width;}
    if(height!=null){height_frame=height;}
        $(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':height_frame,
            'width':width_frame,
            'transitionIn'		: 'none',
			'transitionOut'		: 'none',
            'type': 'iframe',
            'href': open_url,
            'beforeClose': function(){document.location.href = closed_url;}
        });
});
}

function swapElements(el1,el2)
{
    var div1 = $(el1);
    var div2 = $(el2);
    
    var tdiv1 = div1.clone();
    var tdiv2 = div2.clone();
    
    if(!div2.is(':empty')){
        div1.replaceWith(tdiv2);
        div2.replaceWith(tdiv1);
    
    }
}

function delete_article(id){
    var check=confirm('Bạn có muốn xóa bài viết đã chọn không?');
    if(check){
    if(id!=null){
        document.location.href=base_url+'admin/article/delete_article/'+id+'.html';
    }else{
        submit_form('frm_list_article','post',base_url+'admin/article/delete_article.html');

        $("#frm_list_article input").each(function(){
            if($(this).is(":checked") && $(this).val()!=0){
                $(this).parent('td').parent('tr').remove();
            }
        })
    }
    }

}

// Change admin language

function select_lang(lang){
    var url='admin/config/change_lang/'+lang+'.html';
    document.location.href=url;
}

// Push up article

function article_up(article_id){
    var url=base_url+'admin/article/up_article/'+article_id+'.html';
    $.ajax({type:'get',url:url,beforeSend:function(){$(".loading").show();},success:function(){$(".loading").hide();}})
    load_table_article();
}

// Push down article


function article_down(article_id){
    var url=base_url+'admin/article/down_article/'+article_id+'.html';
    $.ajax({type:'get',url:url,beforeSend:function(){$(".loading").show();},success:function(){$(".loading").hide();}})
    load_table_article();
}


function edit_article(){
        var id=get_checkbox_checked_value('frm_list_article');
     if(id!=null){
            var url=base_url+'admin/article/edit_article/'+id+'.html';
            document.location.href=url;
        }
}


    // load article by options
  function load_article(){
    var from=$("#floor_date").val();
    var to=$("#ceil_date").val();
    var cate=$("#menu").val();
    var keyword=$("#search").val();
    var limit=$("#num-page").val();
    var url=base_url+'admin/article/index.html?';
    if(from.trim()!=''){url+='from='+from+'&';}
    if(to.trim()!=''){url+='to='+to+'&';}
    if(cate!=0){url+='cate='+cate+'&';}
    if(keyword.trim()!=''){url+='keyword='+keyword+'&';}
    url+='limit='+limit+'&';
    document.location.href=url;
  }

  function load_article2(){

    var limit=20;
    var cate=$("#menu_article").val();
    var keyword=$("#search_article").val();
    var url=base_url+'admin/plugin/news/'+$("#plugin_id").val()+'.html?';
    if(cate!=0){url+='cate='+cate+'&';}
    if(keyword.trim()!=''){url+='keyword='+keyword+'&';}
    url+='limit='+limit+'&';
    document.location.href=url;
  }

  // Save user
  function save_add_user(){

    if(validate_form('frm_add_user')){
        var password=$("#user_pwd").val();
        var re_password=$("#re_user_pwd").val();
        if(password!=re_password){alert('Nhập lại mật khẩu không chính xác');$("#re_user_pwd").focus();return false;}

    }else{
        return false;
    }



  }

  function delete_admin(){
    var check=confirm('Quyền xóa tài khoản chỉ được thực hiện bởi tài khoản nhóm admin ,bạn có muốn xóa các tài khoản đã chọn không?');
    if(check){
    var submit_url=base_url+'admin/user/delete_admin.html';
    var result=submit_form('frm_list_admin','post',submit_url);
    switch(result){
        case '0':
        alert('Tài koản của bạn không có quyền xóa các tài khoản quản trị khác');
        default:
         $("#frm_list_admin").load(base_url+'admin/user/load_user_table.html');
        break;
    }
    }
  }

  // update user info
  function show_change_password(){
    if($("#check_change").is(":checked")){
        $(".change-pass").show();
    }else{$(".change-pass").hide();}
  }
  function get_cate_template(){
    var id=$("#module_id").find('option:selected').attr("title");
    $("#template").load(base_url+'admin/menu/load_template.html?id='+id);
  }

  function save_add_menu(){
   if(validate_form('frm_add_menu')){
    var module_id=$("#module_id").val();
    var menu_url = $('#menu_url').val().trim();
    if(module_id=='0' && menu_url == ''){alert('Bạn chưa chưa chọn trang cho danh mục');$("#module_id").focus();return false;}
    if($("#template_id").val()=='0' && menu_url == ''){alert('Bạn chưa chọn kiểu hiển thị danh mục');$("#template_id").focus();return false;}
    return true;
   }else{
   return false;
   }
  }


 function load_product(){
    var min=$("#min_price").val();
    var max=$("#max_price").val();
    var cate=$("#menu").val();
    var keyword=$("#search").val();
    var limit=$("#num-page").val();
    var url=base_url+'admin/product/index.html?';
    if(min && min.trim()!=''){url+='min='+min+'&';}
    if(max && max.trim()!=''){url+='max='+max+'&';}
    if(cate!=0){url+='cate='+cate+'&';}
    if(keyword.trim()!=''){url+='keyword='+keyword+'&';}
    url+='limit='+limit+'&';
    document.location.href=url;
 }
 function load_table2_product(){

    var min=$("#min_price").val();
    var max=$("#max_price").val();
    var cate=$("#menu_product").val();
    var keyword=$("#search_product").val();
    var limit=20;
    var url=base_url+'admin/plugin/product/'+$("#plugin_id").val()+'.html?';
    if(min && min.trim()!=''){url+='min='+min+'&';}
    if(max && max.trim()!=''){url+='max='+max+'&';}
    if(cate!=0){url+='cate='+cate+'&';}
    if(keyword.trim()!=''){url+='keyword='+keyword+'&';}
    url+='limit='+limit+'&';
    document.location.href=url;

 }


 function load_table_product(){
    var min=$("#min_price").val();
    var max=$("#max_price").val();
    var cate=$("#menu").val();
    var keyword=$("#search").val();
    var limit=$("#num-page").val();
    var url=base_url+'admin/product/table_product.html?';
    if(min.trim()!=''){url+='min='+min+'&';}
    if(max.trim()!=''){url+='max='+max+'&';}
    if(cate!=0){url+='cate='+cate+'&';}
    if(keyword.trim()!=''){url+='keyword='+keyword+'&';}
    url+='limit='+limit+'&';
    url+='page='+$("#current_page").val();
     $("#frm_list_product").load(url);

 }

 function load_table_article(){
     var from=$("#floor_date").val();
    var to=$("#ceil_date").val();
    var cate=$("#menu").val();
    var keyword=$("#search").val();
    var limit=$("#num-page").val();
    var url=base_url+'admin/article/table_article.html?';
    if(from.trim()!=''){url+='from='+from+'&';}
    if(to.trim()!=''){url+='to='+to+'&';}
    if(cate!=0){url+='cate='+cate+'&';}
    if(keyword.trim()!=''){url+='keyword='+keyword+'&';}
    url+='limit='+limit+'&';
     $("#frm_list_article").load(url);
 }

 function load_product_update_price(){
        var min=$("#min_price").val();
    var max=$("#max_price").val();
    var cate=$("#menu").val();
    var keyword=$("#search").val();
    var limit=$("#num-page").val();
    var url=base_url+'admin/product/price.html?';
    if(min.trim()!=''){url+='min='+min+'&';}
    if(max.trim()!=''){url+='max='+max+'&';}
    if(cate!=0){url+='cate='+cate+'&';}
    if(keyword.trim()!=''){url+='keyword='+keyword+'&';}
    url+='limit='+limit+'&';
    url+='page='+$("#current_page").val();
    document.location.href=url;
 }

 function load_nsxlogo(id){
    $.ajax({type:'get',url:base_url+'admin/product/get_logo'})
 }
function product_active(){
    if($("#product_visible").is(":checked")){
        $("#product_home").removeAttr("disabled").removeAttr("checked");
      $("#product_hot").removeAttr("disabled").removeAttr("checked");
        $("#product_new").removeAttr("disabled").removeAttr("checked");
        $("#product_bestsell").removeAttr("disabled").removeAttr("checked");
    }else{
         $("#product_home").attr("checked",false).attr("disabled","disabled");
       $("#product_hot").attr("checked",false).attr("disabled","disabled");

       $("#product_new").attr("checked",false).attr("disabled","disabled");

       $("#product_bestsell").attr("checked",false).attr("disabled","disabled");

    }
}

function input_nhasx(){
    if($("#new_nhasx").is(":checked")){$("#nhasx").show();$("#select_nhasx").hide();}
    else{
        $("#select_nhasx").show();
        $("#nhasx").hide();
    }
}
function addProductAttr(id){

    var content  =  '<div class="field" style="margin-left:50px">';
        if(id=='0'){
        content +=            '<div class="label" ><label for="autocomplete">Tên thuộc tính</label></div>';
        }
        else{
        content +=            '<div class="label" style="margin-left:40px"><label for="autocomplete">Giá trị</label></div>';            
        }
        content +=            '<div class="input">';
        content +=            '<input type="text" name="parent_' + id +'[]" class="required_field"  size="20"  />';
        content +=            '</div>';
        content +=            '<img title="Xóa Cấu hình này" src="html/resources/images/icons/remove.png" width="24" height="24" onclick="$(this).parent().remove();" style="cursor: pointer;" />';

        content +=  '</div>';

        if(id=='0'){
    $(".product_properties").append(content);
    }
    else{
        $('.field[title="'+id+'"]').append(content);
    }
}
function add_product_properties(){
    var title = $('div.product_properties').children('div.field:last-child').attr('title');
    
    var new_title = 1;
    if (title != null) {new_title = title;new_title++;}
    var content = '';
        content += '    <div class="field" title="'+new_title+'">';
        content += '    <div class="label" ><label for="autocomplete">Tên thuộc tính</label></div>';
        content += '    <div class="input" >';
        content += '    <input type="text" name="' + new_title + '" class="required_field"  size="20"  />';
        content += '    </div>';
        content += '    <img style="float: left;cursor:pointer;" title="Xóa Cấu hình này" src="html/resources/images/icons/remove.png" width="24" height="24" onclick="$(this).parent().remove();" />';
        content += '<img style="float: left;cursor:pointer;" title="Thêm mới thuộc tính" src="html/resources/images/icons/add.png" width="24" height="24" onclick="add_product_properties2(\''+new_title+'\');"/>';
        content += '</div>';
        content += '';
    $(".product_properties").append(content);
}
function add_product_properties2(el_queu)
{
    var title = $('div.product_properties').children('.field[title="' +el_queu+ '"]').children('div.field:last-child').attr('title');
    var count = 0;
    if(title != null)
    {
         count = title.replace(el_queu + '_','');

    }
    count ++;
    var new_title = el_queu + '_' + count;
    var content = '';
        content += '    <div class="field" title="'+new_title+'" style="margin-left:50px;">';
        content += '    <div class="label" style="margin-left:40px" ><label for="autocomplete">Giá trị</label></div>';
        content += '    <div class="input" >';
        content += '    <input type="text" name="' + new_title + '" class="required_field"  size="20"  />';
        content += '    </div>';
        content += '    <img style="float: left;cursor:pointer;" title="Xóa Cấu hình này" src="html/resources/images/icons/remove.png" width="24" height="24" onclick="$(this).parent().remove();" />';
        content += '</div>';
        content += '';
        $('div.product_properties').children('.field[title="' +el_queu + '"]').append(content);

}

function add_product_properties3(el_queu)
{

    var title = $('.field[title="'+el_queu+'"]').children('.field:last-child').attr('title');
    var count = 0;
    if (title != null)
    {
        count = title.replace(el_queu + '_','');
    }

    count ++;

    var new_title = el_queu + '_' + count;
    var content = '';
        content += '    <div class="field" title="'+new_title+'" style="margin-left:50px;">';
        content += '    <div class="label" ><label for="autocomplete">Tên thuộc tính</label></div>';
        content += '    <div class="input" >';
        content += '    <input type="text" name="' + new_title + '" class="required_field"  size="20"  />';
        content += '    </div>';
        content += '    <img style="float: left;cursor:pointer;" title="Xóa Cấu hình này" src="html/resources/images/icons/remove.png" width="24" height="24" onclick="$(this).parent().remove();" />';
        content += '</div>';
        content += '';
 $('.field[title="' +el_queu + '"]').append(content);
}
 // Add new product
 function validate_form_product(){

  if(validate_form('frm_add_product')){
        if($("#menu_id").val()==='0'){alert('Bạn chưa chọn danh mục sản phẩm');$("#menu_id").focus();return false;}

        if($("#producttype_id").val()==='0'){alert('Bạn chưa chọn loại sản phẩm');$("#producttype_id").focus();return false;}


        return;
   }else{
    return false;
   }

 }

 function load_product_attribute(cate_id,product_id){
    var url_submit=base_url+'admin/product/load_product_attribute/'+cate_id+'.html';
    $("#properties").load(url_submit);
 }


 function delete_product_config(els,id){
    var check=confirm("Bạn có muốn xóa thuộc tính này không,thuộc tính bị xóa sẽ không thể phục hồi");
    if(check){
        $.ajax({type:'get',url:base_url+'admin/product/delete_product_properties.html?id='+id,    beforeSend:function(){$('.loading').show();},success:function(data){$('.loading').hide();if(data=='0'){$(els).parent().remove();alert('Xóa thuộc tính thành công');}}})

    }
 }
 function delete_product_config_group(els,val){
      var check=confirm("Bạn có muốn xóa nhóm tính này không,thuộc tính bị xóa sẽ không thể phục hồi");
    if(check){
        $.ajax({type:'get',url:base_url+'admin/product/delete_product_group_properties.html?group='+val,success:function(data){if(data=='0'){$(els).parent().parent().remove();alert('Xóa nhóm thuộc tính thành công');}}})
    }
 }
 //product config

 function up_product(id){
    $.ajax({
        type:'get',
        'url':base_url+'admin/product/up_product.html',
        data:({'id':id}),
        success:function(){
        load_table_product();

        }
    })
 }
 function down_product(id){
      $.ajax({
        type:'get',
        'url':base_url+'admin/product/down_product.html',
        data:({'id':id}),
        success:function(){
        load_table_product();

        }
    })
 }

 function edit_product(){
       var id=get_checkbox_checked_value('frm_list_product');

 if(id!=0){
    document.location.href=base_url+'admin/product/edit_product.html?product_id='+id;
 }
 }

 function update_price(){
    var url_submit=base_url+'admin/product/update_price_ajax.html';

    if(submit_form('frm_list_product','post',url_submit)==0){
          $("#message-success").fadeIn("slow");
          $("#success-message").html("Cập nhập giá thành công");
    }else{
         $("#message-success").hide();
           $("#message-error").fadeIn("slow");
           $("#error-message").html("Có lỗi xảy ra,cập nhập giá");
    }
 }

 function save_edit_product(){
    if(validate_form('frm_edit_product'))
{

        var url_submit=base_url+'admin/product/save_edit_product.html';
        var result=submit_form('frm_edit_product','post',url_submit);
        if(result=='0'){alert('Sửa thông tin sản phẩm thành công');}else{
            alert('Có lỗi xảy ra,sửa thông tin sản phẩm thất bại');
        }

}
 }
 function delete_product(id){
    var check=confirm('Bạn có muốn sản phẩm này không?');
    if(check){
        if(id!=null){
            document.location.href=base_url+'admin/product/delete_product/'+id+'.html';
        }else{
    var url=base_url+'admin/product/delete_product.html';

    submit_form('frm_list_product','get',url);
    document.location.href=base_url+'admin/product.html';
    }

     }

 }

 // Web config

 function save_web_config(){
    if(validate_form('frm_web_config')){
    submit_form('frm_web_config','post',base_url+'admin/config/save_web_config.html');
        alert("Cập nhập cấu hình thành công");
        }


 }

 // SEO config
 function edit_cate_seo(){
     var cate_id=get_checkbox_checked_value('frm_list_seo');
    if(cate_id!==-1){
    var url=base_url+'admin/config/edit_seo.html?cate_id='+cate_id;
    //window.open(base_url+'admin/plugin/load_plugin_edit_form.html?id='+plugin_id);
//    document.location.href=base_url+'admin/plugin/index.html#frm_edit';
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
            'onClosed': function(){document.location.href=base_url+'admin/config/seo.html';},
        });
});
 }
 }
 function save_edit_seo(){
   var url_submit=base_url+'admin/config/save_edit_seo.html';
    var result=submit_form('frm_edit_seo','post',url_submit);
   if(result==='0'){alert('Cập nhập thành công');}else{
    alert('Có lỗi xảy ra,cập nhập thất bại');
   }

 }
 function save_mail_config(){
    if(validate_form('frm_mail_config'))
  var url_submit=base_url+'admin/config/save_mail_config.html';
   var result=submit_form('frm_mail_config','post',url_submit);
   if(result==='0'){alert('Cập nhập thành công');}else{
    alert('Có lỗi xảy ra,cập nhập thất bại');
   }
 }
 // Menu module


  function delete_cate(id){
    var check=confirm("Những danh mục còn chứa danh mục con hoặc dữ liệu sẽ không bị xóa");
    if(check){
        var url_submit=base_url+'admin/menu/delete_menu.html';

        if(id!=null){
           $.ajax({
            type:'post',
            url:url_submit,
            data:({'id':id}),
            beforeSend:function(){$("#loading").show();},
            success:function(data){
                $("#loading").hide();
                location.reload();


            }
           })
        }else{

    var result=submit_form('frm_list_cate','post',url_submit);

  location.reload();

    }
    }
  }

  function cate_up(menu_id){

    var url_submit=base_url+'admin/menu/up_cate.html?id='+menu_id;

   $.ajax({
    type:'get',
    url:url_submit,
    beforeSend:function(){$(".loading").show();},
    success:function(){
        location.reload();
    }
   });
  }

  function cate_down(menu_id){
        var url_submit=base_url+'admin/menu/down_cate.html?id='+menu_id;

   $.ajax({
    type:'get',
    url:url_submit,
    beforeSend:function(){$(".loading").show();},
    success:function(){
      location.reload();
    }
   });


  }
  function edit_cate(){
  var id=get_checkbox_checked_value('frm_list_cate');
  if(id!=0){
    document.location.href=base_url+"admin/menu/edit_cate/"+id+".html";
  }
  }
  function save_edit_menu(){
    if(validate_form('frm_edit_menu')){
    $("form#frm_edit_menu").submit();
    }
  }

  // Plugin module

  function load_plugin_config(){
    var value=$("#plugintype_id").find("option:selected").attr("title");
    var template = $('#template').val();
    
    $.get('/admin/plugin/load_plugin_template.html',{id:value,template:template},function(rs){
        var content ='<option>Chọn template</option>';
        for(var key in rs)
        {   
            content += '<option value="'+rs[key].file+'">'+rs[key].title+'</option>';
        }
        $('#plugintemplate_id').html(content);
    },'json');
    
    $.get('/admin/plugin/load_pluginconfig.html',{id:value},function(rs){
        $('.type-description').show();
         $("#plugintype_description").html(rs.plugintype_description);
         var config = rs.config;
         if(config.length >0)
         {
            var config_html = '';
            for(var key in config)
            {
                var config_field = '<input type="text" name="configvalue[]" value="'+config[key].vals+'"/>';
                switch(config[key].field)
                {
                    case 'radio':
                    var arr = config[key].vals.split(',');
                    config_field ='';
                    for( var k in arr)
                    {
                        var tmp = arr[k].split(':');
                        config_field += '<p><input type="radio" name="configvalue[]" value="'+tmp[1]+'">'+tmp[0]+'<br/></p>';
                    }
                    default:break
                }
                config_html+='<div class="field">';
							config_html+='<div class="label">';
							config_html+='	<label for="autocomplete">'+config[key].title+'</label>';
							config_html+='</div>';
							config_html+='<div class="input">';
      	                     config_html+='<input type="hidden"name="config[]" value="'+config[key].name+'">'
							config_html+= config_field;
						config_html+='	</div>';
					config_html+='</div>';
                    
                    
            }
            $('.config-area').show();
            $('#plugin-config').html(config_html);
         } else{
             $('#plugin-config').html('');
               $('.config-area').hide();
         }
    },'json');
    

  }
  function template_description(){
    var template =$("#template").val();
    var value=$("#plugintemplate_id").val();
    $.get('/admin/plugin/template_details.html',{plugin:value,template:template},function(rs){
        $('.template-description').show();
         $("#plugintemplate_description").html(rs.description);
    },'json');
   

  }


  function load_plugin(){
    var url=base_url+'admin/plugin.html?';
    var name = $("#search").val();
    if(name.trim()!=''){
        url+='phrase='+name+'&';
    }
    var type=$("#type").val();
    if(type!=0){
        url+='type='+type+'&';
    }
    var position=$("#position").val();
    if(position!=0){
        url+='position='+position+'&';
    }
    document.location.href=url;
  }
  function validate_form_add_plugin(){

     var plugintype_id=$("#plugintype_id").val();
     var plugintemplate_id=$("#plugintemplate_id").val();
     if(plugintype_id==='0'){
        alert("Bạn chưa chọn loại plugin");
        $("#plugintype_id").focus();
        return false;
     }
     if(plugintemplate_id==='0'){
        alert("Bạn chưa chọn kiểu hiển thị cho plugin này");
        $("#plugintemplate_id").focus();
        return false;
     }

  }

function plugin_up(plugin_id,position){
    var url_submit=base_url+'admin/plugin/up_plugin.html?plugin_id='+plugin_id+'&position='+position;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
    location.reload();
    }
   });
}
function plugin_down(plugin_id,position){
    var url_submit=base_url+'admin/plugin/down_plugin.html?plugin_id='+plugin_id+'&position='+position;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
     location.reload();
    }
   });
}

function edit_plugin(id){
    var plugin_id=get_checkbox_checked_value('frm_list_plugin');
    if(id!=null){plugin_id=id;}
    if(plugin_id!==0){
    var url=base_url+'admin/plugin/edit_plugin/'+plugin_id+'.html';
    open_popup(url,'/admin/plugin.html',900,500);


}
}

function save_edit_plugin(){
    var submit_url=base_url+'admin/plugin/save_edit_plugin.html';
    var result=submit_form('frm_edit_plugin','post',submit_url);
     if(result==='0'){
        alert('Cập nhập block thành công');

     }else{
        alert('Có lỗi xảy ra,cập nhập block thất bại')
     }
}

function delete_plugin(id){
    var check=confirm("Xóa khối nội dung sẽ xóa hết nội dung chứa trong khối đó,bạn có muốn xóa hay không?");
    if(check){
        var submit_url=base_url+'admin/plugin/delete_plugin.html';
        var result=submit_form('frm_list_plugin','post',submit_url);
        document.location.href=document.URL;
    }
}

// Slideshow
 // Add image to slideshow
function save_add_image(){
    var submit_url=base_url+'admin/plugin/save_add_image.html';
    if(validate_form('frm_add_image')){
    var result=submit_form('frm_add_image','post',submit_url);
    }
    if(result==='0'){alert('Thêm mới ảnh vào slide thành công');reset_form('frm_add_image');}
    else{alert('Có lỗi xảy ra,thêm mới ảnh thất bại');}
    $("#frm_list_images").load(base_url+'admin/plugin/slide_images/'+$("#plugin_id").val()+'.html');

    return;


}
// Delete image
function delete_image(){
     var check=confirm("Bạn có muốn xóa những ảnh trong slideshow đã chọn?");
     if(check){
    var submit_url=base_url+'admin/plugin/delete_image.html';
    submit_form('frm_list_images','post',submit_url);
    $("#frm_list_images").load(base_url+'admin/plugin/slide_images/'+$("#plugin_id").val()+'.html');
    }
}

// Edit image
function edit_image(id){
    var image_id=get_checkbox_checked_value('frm_list_images');
    if(id!=null){image_id=id;}
    if(image_id!==0){
    var url=base_url+'admin/plugin/load_image_edit_form.html?id='+image_id;
    //window.open(base_url+'admin/plugin/load_plugin_edit_form.html?id='+plugin_id);
//    document.location.href=base_url+'admin/plugin/index.html#frm_edit';
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
            'onClosed': function(){$("#frm_list_images").load(base_url+'admin/plugin/slide_images/'+$("#plugin_id").val()+'.html');}
        });
});


}
}

// save edit image
function save_edit_image(){
    var submit_url=base_url+'admin/slideshow/save_edit_image.html'
    if(validate_form('frm_edit_inage')){
    var result=submit_form('frm_edit_inage','post',submit_url);
    }
    if(result==='0'){alert('Sửa thông tin ảnh thành công');}
    else{alert('Có lỗi xảy ra,Sửa thông tin thất bại');}
}

// up image queu
function image_up(image_id,plugin_id){
   var url_submit=base_url+'admin/plugin/up_image.html?plugin_id='+plugin_id+'&image_id='+image_id;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
     $("#frm_list_images").load(base_url+'admin/plugin/slide_images/'+$("#plugin_id").val()+'.html');
    }
   });
}
// pushdown image
function image_down(image_id,plugin_id){
   var url_submit=base_url+'admin/plugin/down_image.html?plugin_id='+plugin_id+'&image_id='+image_id;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
    $("#frm_list_images").load(base_url+'admin/plugin/slide_images/'+$("#plugin_id").val()+'.html');
    }
   });
}

// Support online

//Add support
function save_add_support(){
    var submit_url=base_url+'admin/plugin/add_support.html';
    if(validate_form('frm_add_support')){
      var result=submit_form('frm_add_support','post',submit_url);
      if(result==='0'){alert('Thêm mới hỗ trợ trực tuyến thành công');
        location.reload();
      }
      else{alert('Thêm mới hỗ trợ trực tuyến thất bại');}
    }

}

// delete support
function delete_support(){
  var check=confirm("Bạn có muốn xóa những id hỗ trợ trực tuyến đã chọn?");
     if(check){
    var submit_url=base_url+'admin/plugin/delete_support.html';
    submit_form('frm_list_support','post',submit_url);
    $("#frm_list_support").load(base_url+'admin/plugin/table_support/'+$("#plugin_id").val()+'.html')
    }
}

// up support
function support_up(support_id,plugin_id){
      var url_submit=base_url+'admin/plugin/up_support.html?plugin_id='+plugin_id+'&support_id='+support_id;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
      $("#frm_list_support").load(base_url+'admin/plugin/table_support/'+$("#plugin_id").val()+'.html')
    }
   });
}
// down support
function support_down(support_id,plugin_id){
      var url_submit=base_url+'admin/plugin/down_support.html?plugin_id='+plugin_id+'&support_id='+support_id;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
      $("#frm_list_support").load(base_url+'admin/plugin/table_support/'+$("#plugin_id").val()+'.html')
    }
   });
}
// edit support
function edit_support()
{
     var support_id=get_checkbox_checked_value('frm_list_support');
    if(support_id!==0){
    var url=base_url+'admin/plugin/edit_support.html?support_id='+support_id;
    //window.open(base_url+'admin/plugin/load_plugin_edit_form.html?id='+plugin_id);
//    document.location.href=base_url+'admin/plugin/index.html#frm_edit';
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
            'onClosed': function(){location.reload();}
        });
});
}
}

// save edit support

function save_edit_support(){
    var submit_url=base_url+'admin/plugin/save_edit_support.html';
    if(validate_form('frm_edit_support')){
      var result=submit_form('frm_edit_support','post',submit_url);
      if(result==='0'){alert('Sửa thông tin hỗ trợ trực tuyến thành công');

      }
      else{alert('Có lỗi xảy ra,sửa thông tin thất bại');}
    }

}
// adv

function save_add_adv(){
        var submit_url=base_url+'admin/plugin/add_adv.html';
    if(validate_form('frm_add_adv')){
      var result=submit_form('frm_add_adv','post',submit_url);
      if(result==='0'){alert('Thêm mới quảng cáo thành công');
      $("#frm_list_adv").load(base_url+'admin/plugin/table_adv/'+$("#plugin_id").val()+'.html')
      }
      else{alert('Thêm mới quảng cáo thất bại');}
    }
}
// delete adv
function delete_adv(){
      var check=confirm("Bạn có muốn xóa những quảng cáo đã chọn?");
     if(check){
    var submit_url=base_url+'admin/plugin/delete_adv.html';
    submit_form('frm_list_adv','post',submit_url);
    $("#frm_list_adv").load(base_url+'admin/plugin/table_adv/'+$("#plugin_id").val()+'.html')
    }
}
function adv_up(image_id,plugin_id){
     var url_submit=base_url+'admin/plugin/up_image.html?plugin_id='+plugin_id+'&image_id='+image_id;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
     $("#frm_list_adv").load(base_url+'admin/plugin/table_adv/'+plugin_id+'.html')
    }
   });
}
function adv_down(image_id,plugin_id){
   var url_submit=base_url+'admin/plugin/down_image.html?plugin_id='+plugin_id+'&image_id='+image_id;
       $.ajax({
    type:'get',
    url:url_submit,
    success:function(){
      $("#frm_list_adv").load(base_url+'admin/plugin/table_adv/'+$("#plugin_id").val()+'.html')
    }
   });
}

function edit_adv(){
    var image_id=get_checkbox_checked_value('frm_list_adv');
    if(image_id!==0){
    var url=base_url+'admin/plugin/edit_adv.html?image_id='+image_id;
    //window.open(base_url+'admin/plugin/load_plugin_edit_form.html?id='+plugin_id);
//    document.location.href=base_url+'admin/plugin/index.html#frm_edit';
$(document).ready(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':600,
            'width':800,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url,
            'onClosed': function(){ $("#frm_list_adv").load(base_url+'admin/plugin/table_adv/'+$("#plugin_id").val()+'.html');}
        });
});
}
}
function save_edit_adv(){
   var submit_url=base_url+'admin/plugin/save_edit_adv.html';
    if(validate_form('frm_edit_adv')){
      var result=submit_form('frm_edit_adv','post',submit_url);
      if(result==='0'){alert('Sửa quảng cáo thành công');

      }
      else{alert('Có lỗi xảy ra,sửa thông tin thất bại');}
    }
}

function default_template(template_id){
var submit_url=base_url+'admin/config/default_template.html?id='+template_id;
$.ajax({
    type:'get',
    url:submit_url,
    success:function(){
        $(".box-template").load(base_url+'admin/config/table_template.html');
    }
})

}

function delete_template(template_id){
    var check=confirm('Bạn có muốn xóa giao diện này không');
    if(check){
 var submit_url=base_url+'admin/config/delete_template.html?id='+template_id;
$.ajax({
    type:'get',
    url:submit_url,
    success:function(){
        $(".box-template").load(base_url+'admin/config/table_template.html');
    }
})
}

}

function save_add_template(){
    if(validate_form('frm_add_template')){
        var submit_url=base_url+'admin/config/add_template.html';
        var result=submit_form('frm_add_template','post',submit_url);
        if(result==='1'){alert('Template này đã tồn tại');return;}
        if(result==='2'){alert('Template này chưa có hoặc chưa đầy đủ thông tin cần thiết');return;}
        if(result==='0'){alert('Thêm mới template thành công');$(".box-template").load(base_url+'admin/config/table_template.html');}
    }
}
function save_menu_block(){
  var submit_url=base_url+'admin/plugin/save_menu.html';
    $.post(submit_url,$('#frm_edit_submenu').serialize(),
        function(rs)
        {
            if(typeof  rs.code != 'undefined' && rs.code == 'success')
            {
                alert('Cập nhập thành công')

            }   else{alert('Có lỗi xảy ra,sửa thông tin thất bại');}
        }
        ,'json');

}
function check_all_menu(){
    if($("#checkall").is(":checked")){
        $(".menu_check").attr("checked","checked");
         $(".menu_check").removeAttr("disabled");
    }else{
        $(".menu_check").removeAttr("checked");
        $(".menu_check").attr("disabled","disabled");
    }
}
function add_layout(){
    if(validate_form('frm_add_layout')){
    var submit_url=base_url+'admin/system/save_layout.html';
    var result=submit_form('frm_add_layout','post',submit_url);
    if(result=='1'){alert('Tên layout này đã tồn tại');return;}
    if(result=='2'){alert('Layout này chưa có trên server');return;}
    if(result=='0'){alert('Thêm mới layout thành công');$("#frm_list_layout").load(base_url+'admin/system/table_layout.html');return;}

    alert('Có lỗi xảy ra,thêm mới layout thất bại');
    }
}

function delete_layout(id){
    var layout_id=get_checkbox_checked_value('frm_list_layout');
    if(id!=null){layout_id=id;}
    if(layout_id!=null){
        var check=confirm('Xóa layout sẽ xóa toàn bộ template có trong layout,bạn có muốn xóa layout này hay không?');
        if(check){
var submit_url=base_url+'admin/system/delete_layout.html?layout='+layout_id;
$.ajax({
    type:'get',
    url:submit_url,
    success:function(data){
        if(data=='1'){alert('Layout này đang sử dụng template website mặc định,không thể xóa layout');}else{
        $("#frm_list_layout").load(base_url+'admin/system/table_layout.html');
        }
    }
})
}
}
}
function edit_layout(id){
      var layout_id=get_checkbox_checked_value('frm_list_layout');
      if(layout_id!=null){
        var url=base_url+'admin/system/edit_layout.html?layout='+layout_id;
        $(document).ready(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':320,
            'width':600,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url,
            'onClosed': function(){ $("#frm_list_layout").load(base_url+'admin/system/table_layout.html');}
        });
});
      }
}

function save_edit_layout(){
    if(validate_form('frm_edit_layout')){
      var submit_url=base_url+'admin/system/save_edit_layout.html';
      var result=submit_form('frm_edit_layout','post',submit_url);
      if(result=='1'){
        alert('Layout này đang chứa template mặc định,không thể sửa hoặc xóa');
        return;
      }
        if(result=='2'){
        alert('Không tồn tại file layout này trong thư mục web layout');
        return;
      }

      if(result=='0'){alert('Cập nhập layout thành công');return;}
      alert('Có lỗi xảy ra,cập nhập layout thất bại');
    }
}

function add_module(){
    if(validate_form('frm_add_module')){
        var submit_url=base_url+'admin/system/save_add_module.html';
        var result=submit_form('frm_add_module','post',submit_url);
        if(result=='1'){
            alert('Tên module này đã tồn tại');return;
        }
        if(result=='0'){
            alert('Thêm mới module thành công');
            $("#frm_list_module").load(base_url+'admin/system/table_module.html');
            return;
        }
        alert('Có lỗi xảy ra,cập nhập layout thất bại');

    }
}

function delete_module(){
    var check=confirm('Chỉ xóa được các module không còn chứa các danh mục con,bạn có muốn xóa hay không?');
    if(check){
        var submit_url=base_url+'admin/system/delete_module.html';
        submit_form('frm_list_module','post',submit_url);
         $("#frm_list_module").load(base_url+'admin/system/table_module.html');
    }
}

function edit_module(){
       var module_id=get_checkbox_checked_value('frm_list_module');

      if(module_id!=null && module_id!==0){
        var url=base_url+'admin/system/edit_module.html?id='+module_id;
        $(document).ready(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':350,
            'width':600,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url,
            'onClosed': function(){  document.location.href=document.URL;}
        });
});
      }
}

function save_edit_module(){
   var submit_url=base_url+'admin/system/save_edit_module.html';
   var result= submit_form('frm_edit_module','post',submit_url);
   if(result=='0'){alert('Sửa thông tin module thành công');return;}
   alert('Có lỗi xảy ra,sửa thông tin module thất bại');
}

function add_plugintye_properties(){
    $(".plugin_type_properties").append('<div class="field"><div class="input" ><input placeholder="Tiêu đề cấu hình" type="text" size="40" class="required_field" name="pluginconfig_title[]"/></div><div style="margin-left:10px;" class="input"><input placeholder="Tên cấu hình" name="pluginconfig_name[]" type="text"/></div><div class="label" style="position:relative;margin-left:10px;left:0"><label>Loại trường</label></div><div style="margin-left:10px;" class="input"><select name="field_type[]"><option value="textbox">textbox</option><option value="radio">radio</option><option value="checkbox">checkbox</option></select></div><div style="float:left;margin-left:10px" class="input"><textarea name="field_value[]" cols="30" rows="10" placeholder="giá trị"></textarea></div><img width="24" height="24" style="cursor: pointer;" onclick="$(this).parent().remove();" src="html/resources/images/icons/remove.png" title="Xóa Cấu hình này"/></div>');

}

function save_add_plugintype(){
 if(validate_form('frm_add_plugintype')){
      var submit_url=base_url+'admin/system/save_add_plugintype.html';
     $.post(submit_url,$('#frm_add_plugintype').serialize(),function(rs){
        
     },'json');
}
}

function edit_plugintype(){
    var plugintype_id=get_checkbox_checked_value('frm_list_plugintype');
    if(plugintype_id!=null && plugintype_id!==0 ){
            var url=base_url+'admin/system/edit_plugintype.html?id='+plugintype_id;
        $(document).ready(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':400,
            'width':800,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url,
            'onClosed': function(){   document.location.href=base_url+'admin/system/plugin.html';}
        });
});
    }
}

function save_edit_plugintype(){
     var submit_url=base_url+'admin/system/save_edit_plugintype.html';
   var result= submit_form('frm_edit_plugintype','post',submit_url);
   if(result=='0'){alert('Sửa thông tin  thành công');return;}
   alert('Có lỗi xảy ra,sửa thông tin  thất bại');
}
function delete_plugintype(){
    var check=confirm('Chỉ xóa được các loại khối không còn chứa khối nội dung,bạn có muốn xóa hay không?');
    if(check){
        var submit_url=base_url+'admin/system/delete_plugintype.html';
        submit_form('frm_list_plugintype','post',submit_url);
        document.location.href=base_url+'admin/system/plugin.html';
    }
}

function save_add_plugintemplate(){
    if(validate_form('frm_add_plugintemplate')){
        var submit_url=base_url+'admin/plugin/save_add_template.html';
        var result=submit_form('frm_add_plugintemplate','post',submit_url);
        switch(result){
            case '1':alert('File template này không có trong thư mục layout hiện hành');
            break;
            case '0':alert('Thêm mới template khối nội dung thành công');document.location.href=base_url+'admin/plugin/template.html';
            break;
            default:alert('Có lỗi xảy ra,thêm mới thất bại')
            break;
        }
    }
}
function edit_plugin_template(){
    var id=get_checkbox_checked_value('frm_list_plugintemplate');
    if(id!==0){

            var url=base_url+'admin/plugin/edit_template.html?id='+id;
        $(document).ready(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':350,
            'width':700,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url,
            'onClosed': function(){   document.location.href=base_url+'admin/plugin/template.html';}
        });
});

    }
}

function save_edit_plugintemplate(){
    if(validate_form('frm_edit_plugintemplate')){
        var submit_url=base_url+'admin/plugin/save_edit_template.html';
        var result=submit_form('frm_edit_plugintemplate','post',submit_url);
        switch(result){
            case '1':
            alert('File template này không tồn tại trong thư mục layout hiện hành');
            break;
            case '2':
            alert('Template này đã tồn tại');
            break;
            case '0':
            alert('Cập nhập template thành công');
            break;
            default:
            alert('Có lỗi xảy ra,cập nhập template thất bại');
            break;
        }
    }
}
function delete_plugintemplate(){
    var check=confirm('Chỉ xóa được các template chưa được dùng');
    if(check){
      var submit_url=base_url+'admin/plugin/delete_template.html';
      submit_form('frm_list_plugintemplate','post',submit_url);
    document.location.href=base_url+'admin/plugin/template.html';
    }
}

function add_catetemplate(){
     if(validate_form('frm_add_catetemplate')){
        var submit_url=base_url+'admin/system/save_add_catetemplate.html';
        var result=submit_form('frm_add_catetemplate','post',submit_url);
        switch(result){
            case '1':
            alert('File template này không tồn tại trong thư mục layout hiện hành');
            break;
            case '2':
            alert('Template này không tồn tại trong thư mục layout hiện hành');
            break;
            case '0':
            alert('Thêm mới template thành công');
            document.location.href=base_url+'admin/system/cate_template.html';
            break;
            default:
            alert('Có lỗi xảy ra,cập nhập template thất bại');
            break;
        }
    }
}

function edit_catetemplate(){
    var id=get_checkbox_checked_value('frm_list_cate_template');
        if(id!==0){
          var url=base_url+'admin/system/edit_catetemplate.html?id='+id;
        $(document).ready(function () {
        $.fancybox({
            'scrolling':'auto',
            'autoDimensions':true,
            'height':350,
            'width':700,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url,
            'onClosed': function(){   document.location.href=base_url+'admin/system/cate_template.html';}
        });
});

    }

}
function check_menu(page){
    if($(".page"+page).is(":checked")){$(".menu"+page).attr("checked","checked");$(".menu"+page).removeAttr("disabled");}else{$(".menu"+page).removeAttr("checked");$(".menu"+page).attr("disabled","disabled")}
}

function add_config(){
     if(validate_form('frm_add_config')){
        var submit_url=base_url+'admin/system/save_add_config.html';
        var result=submit_form('frm_add_config','post',submit_url);
        switch(result){
            case '1':
            alert('Tên cấu hình này đã tồn tại');
            break;
             case '0':
            alert('Thêm mới cấu hình thành công');
            document.location.href=base_url+'admin/system/config.html';
            break;
            default:
            alert('Có lỗi xảy ra,Thêm mới cấu hình thất bại');
            break;
        }
    }
}

function check_new_module(){
    if($("#add_new_module").is(":checked")){$("#new_module").show();$("#config_module").hide();}else{$("#config_module").show();$("#new_module").hide();};
}

function delete_config(){
    var check=confirm('Xóa cấu hình hệ thống có thể ảnh hướng tới toàn bộ hoạt động của website');
    if(check){
        var url=base_url+'admin/system/delete_config.html';
        submit_form('frm_list_config','post',url);
       document.location.href=base_url+'admin/system/config.html';
    }

}

function edit_config(){
    var id=get_checkbox_checked_value('frm_list_config');

    if(id!='0'){
        var open_url=base_url+'admin/system/edit_config.html?id='+id;
        var close_url=base_url+'admin/system/config.html';

        open_popup(open_url,close_url);
    }
}
function save_edit_config(){
        if(validate_form('frm_edit_config')){
        var submit_url=base_url+'admin/system/save_edit_config.html';
        var result=submit_form('frm_edit_config','post',submit_url);
        switch(result){
         case '0':
            alert('Cập nhập cấu hình thành công');
            break;
            default:
            alert('Có lỗi xảy ra,cập nhập cấu hình thất bại');
            break;
        }
    }
}

function save_config(form_id){
    var submit_url=base_url+'admin/config/save_config.html';
    if(validate_form(form_id)){
    var result=submit_form(form_id,'post',submit_url);
    if(result.trim()=='0'){alert('Cập nhập cấu hình thành công');document.location.href=document.URL;return;}
    alert('Cập nhập cấu hình thất bại');
    }
}

function delete_order(order_id){
    if(order_id==null){
    var check=confirm('Bạn có muốn xóa các đơn hàng này không?');
    if(check){
    var url_submit=base_url+'admin/order/delete_order.html';
    submit_form('frm_list_order','post',url_submit);
    document.location.href=base_url+'admin/order.html';
    }
    }else{
        document.location.href=base_url+'admin/order.html?id='+order_id;
    }
}

function load_order(){
    var from=$("#floor_date").val();
    var to=$("#ceil_date").val();
    var status=$("#status").val();
    var name=$("#search").val();
    var limit=$("#num-page").val();
    var url=base_url+'admin/order.html?';
    if(from.trim()!=''){url+='from='+from+'&';}
    if(to.trim()!=''){url+='to='+to+'&';}
    if(status!=4){url+='status='+status+'&';}
    if(name.trim()!=''){url+='name='+name+'&';}
    url+='limit='+limit+'&';
    document.location.href=url;
}
function load_contact(){
    var from=$("#floor_date").val();
    var to=$("#ceil_date").val();

    var name=$("#search").val();
    var limit=$("#num-page").val();
    var url=base_url+'admin/contacts.html?';
    if(from.trim()!=''){url+='from='+from+'&';}
    if(to.trim()!=''){url+='to='+to+'&';}
    if(name.trim()!=''){url+='name='+name+'&';}
    url+='limit='+limit+'&';
    document.location.href=url;
}

function delete_contact(id){
    if(id==null){
    var check=confirm('Bạn có muốn xóa các liên hệ này không?');
    if(check){
        var url=base_url+'admin/contacts/delete_contact.html';
        submit_form('frm_list_contact','post',url);
        document.location.href=document.URL;
    }
    }else{
        document.location.href=base_url+'admin/contacts/delete_contact.html?id='+id;
    }
}

function save_edit_catetemplate(){
    var submit_url=base_url+'admin/system/save_edit_catetemplate.html';
    if(validate_form('frm_edit_catetemplate')){
        var result=submit_form('frm_edit_catetemplate','post',submit_url);
        if(result=='0'){alert('Cập nhập template thành công');}
    }

}

function delete_catetemplate(){
   var submit_url=base_url+'admin/system/delete_catetemplate.html';
   var check=confirm('Chỉ được xóa những template chưa được sử dụng');
   if(check){
    submit_form('frm_list_cate_template','post',submit_url);
   document.location.href=document.URL;
   }
}
function save_order(order_id){
  var submit_url=base_url+'admin/order/save_edit_order';
  var result=submit_form('frm_order_details','post',submit_url);
  if(result=='0'){alert('Cập nhập đơn hàng thành công');document.location.href=document.URL;}else{alert('Có lỗi xảy ra,cập nhập đơn hàng thất bại');}

}
function save_add_link(){
    if(validate_form('frm_add_link')){
        var submit_url=base_url+'admin/plugin/save_add_link.html';
        var result=submit_form('frm_add_link','post',submit_url);
        if(result=='0'){alert('Thêm mới liên kết thành công');document.location.href=document.URL;}else{alert('Có lỗi xảy ra,thêm mới thất bại');}
    }

}
function delete_link(){
    var check=confirm('Bạn có muốn xóa các liên kết đã chọn không?');
    if(check){
        submit_form('frm_list_link','post',base_url+'admin/plugin/delete_link.html');
        document.location.href=document.URL;
    }
}
function load_config(){
    var keyword=$("#search").val();
    var module=$("#module").val();
}
function save_add_productproperties(){
    if(validate_form('frm_add_productproperties')){
        var submit_url=base_url+'admin/product/save_add_properties';
        var result=submit_form('frm_add_productproperties','post',submit_url);
        if(result=='0'){alert('Thêm mới loại sản phẩm thành công');document.location.href=base_url+'admin/product/properties';}
    }
}

function edit_producttype(type_id){
    var id=(type_id==null)?get_checkbox_checked_value('frm_list_product_type'):type_id;

    document.location.href = base_url+'admin/product/edit_productype/'+type_id + '.html';
}
function delete_producttype(type_id){
    var id=(type_id==null)?get_checkbox_checked_value('frm_list_product_type'):type_id;
       var check=confirm('Xóa loại sản phẩm sẽ xóa tất cả các sản phẩm thuộc loại đó');
    if(check){
        $.ajax({type:'get',url:base_url+'admin/product/delete_product_type?id='+id,success:function(data){if(data=='0'){alert('Xóa thuộc tính thành công');document.location.href=base_url+'admin/product/properties.html';}else{alert('Có lỗi xảy ra,xóa thuộc tính thất bại');}}})
    }
}

function removeAttr(id){
    var check=confirm('Xóa thuộc tính sản phẩm đã tồn tại sẽ xóa thông tin về thuộc tính này trong tất cả sản phẩm cùng loại');
    if(check){
        $.ajax({type:'get',url:base_url+'admin/product/delete_product_attribute.html?id='+id,success:function(data){if(data=='0'){alert('Xóa thuộc tính thành công');$('.field[title="'+id+'"]').remove();}else{alert('Có lỗi xảy ra,xóa thuộc tính thất bại');}}})
    }
}
function save_edit_html(){
    var url_submit=base_url+'admin/plugin/save_html.html';
    var result=submit_form('frm_edit_html','post',url_submit);
    if(result=='0'){alert('Sửa thông tin thành công');}else{alert('Có lỗi xảy ra,sửa thông tin thất bại');}
}

// Update 29/8/2011
function save_edit_articlecomment(){
    var submit_url=base_url+'admin/article/save_comment.html';
    var result=submit_form('frm_comment_details','post',submit_url);
    if(result.trim()=='0'){alert('Cập nhập thành công');}else{alert('Có lỗi xảy ra,cập nhập thất bại');}
}
function delete_articlecomment(id){
    var check=confirm('Bạn có muốn xóa các bình luận đã chọn hay không?');
    if(check){
    if(id!=null){
        document.location.href=base_url+'admin/article/delete_comment.html?id='+id;
    }else{
        submit_form('frm_list_articlecomment','post',base_url+'admin/article/delete_comment.html');
        document.location.href=base_url+'admin/article/comment.html';
    }
    }
}

function active_articlecomment(){
     submit_form('frm_list_articlecomment','post',base_url+'admin/article/active_comment.html');
        document.location.href=base_url+'admin/article/comment.html';
}

function deactive_articlecomment(){
    submit_form('frm_list_articlecomment','post',base_url+'admin/article/deactive_comment.html');
        document.location.href=base_url+'admin/article/comment.html';
}
function load_articlecomment(){
      var from=$("#floor_date").val();
    var to=$("#ceil_date").val();

    var name=$("#search").val();
    var limit=$("#num-page").val();
    var url=base_url+'admin/article/comment.html?';
    if(from.trim()!=''){url+='from='+from+'&';}
    if(to.trim()!=''){url+='to='+to+'&';}
    if(name.trim()!=''){url+='keyword='+name+'&';}
    url+='limit='+limit+'&';
    document.location.href=url;
}

// Update 01-09-2011
function save_add_adminmenu(){
    if(validate_form('frm_add_adminmenu')){
    $("form#frm_add_adminmenu").submit();
    }
}

function edit_admincate(){
    var id=get_checkbox_checked_value('frm_list_admincate');
    if(id!='0'){
        open_popup(base_url+'admin/system/edit_menu/'+id+'.html',base_url+'admin/system/menu.html',800,500);
    }
}

function save_edit_adminmenu(){
        if(validate_form('frm_edit_adminmenu')){
    $("form#frm_edit_adminmenu").submit();
    }
}
function adminmenu_up(id){
    document.location.href=base_url+'admin/system/up_menu/'+id+'.html';
}
function adminmenu_down(id){
    document.location.href=base_url+'admin/system/down_menu/'+id+'.html';
}
// Update 04/09-2011
function delete_admincate(){
    var url=base_url+'admin/system/delete_admincate.html';
    submit_form('frm_list_admincate','post',url);
    document.location.href=base_url+'admin/system/menu.html';
}

function add_domain(){
    if(validate_form('frm_add_domain')){
        $("form#frm_add_domain").submit();
    }
}
function edit_domain(){
    var id=get_checkbox_checked_value('frm_list_domain');
    if(id!='0'){
         open_popup(base_url+'admin/system/edit_domain/'+id+'.html',base_url+'admin/system/domain.html',800,700);
    }

}
function save_edit_domain(){
    if(validate_form('frm_edit_domain')){
        $("form#frm_edit_domain").submit();
    }
}
function delete_domain(){
    var check=confirm('Bạn có muốn xóa các tên miền này không');
    if(check){
    submit_form('frm_list_domain','post',base_url+'admin/system/delete_domain.html');
    document.location.href=base_url+'admin/system/domain.html';
    }
}

function save_add_media(){
    if(validate_form("frm_add_media")){
        var result=submit_form('frm_add_media','post',base_url+'admin/plugin/save_media.html');
        if(result==0){
            alert('Thêm mới thành công');reset_form('frm_add_media');
            $("#frm_list_media").load(base_url+'admin/plugin/table_media/'+$("#plugin_id").val()+'.html');
        }
    }
}

function up_media(media_id){
    $.ajax({type:'post',url:base_url+"admin/plugin/up_media.html",data:({'id':media_id}),beforeSend:function(){$(".loading").show();},success:function(){$("#frm_list_media").load(base_url+"admin/plugin/table_media/"+$("#plugin_id").val()+".html");$(".loading").hide();}})
}
function down_media(media_id){
    $.ajax({type:'post',url:base_url+"admin/plugin/down_media.html",data:({'id':media_id}),beforeSend:function(){$(".loading").show();},success:function(){$("#frm_list_media").load(base_url+"admin/plugin/table_media/"+$("#plugin_id").val()+".html");$(".loading").hide();}})
}
function delete_media(){
    var check=confirm('Những dữ liệu bị xóa sẽ không thể phục hồi');
    if(check){
        var result=submit_form("frm_list_media",'post',base_url+'admin/plugin/delete_media.html');
        if(result==0){
        $("form#frm_list_media input").each(function(){
            if( parseInt($(this).attr("value"))>0 && $(this).attr("type")=="checkbox" && $(this).is(":checked")){
                $(this).parent("td").parent("tr").remove()
            }
        })
        }
    }
}
function edit_media(id){
    var media_id=get_checkbox_checked_value('frm_list_media');
    if(id){media_id=id;}
    if(media_id){

        open_popup(base_url+'admin/plugin/edit_media/'+media_id+'.html',base_url+'admin/plugin/media/'+$("#plugin_id").val()+'.html',800,800);
    }
}


function delete_member(id){
 var check=confirm('Tài khoản thành viên bị xóa,bao gồm tất cả các thông tin liên quan sẽ không thể khôi phục');
 if(check){
    if(id){
        document.location.href=base_url+'admin/member/delete_member/'+id+'.html';
    }else{
        submit_form('frm_list_member','post',base_url+'admin/member/delete_member.html');
        $("#frm_list_member input").each(function(){
            if($(this).is(":checked")){$(this).parent('td').parent('tr').remove();}
        })
    }
 }
}

function load_member(){
    var phrase=$("#search").val().trim();
    var group=$("#group").val().trim();
    var from=$("#floor_date").val().trim();
    var to=$("#ceil_date").val().trim();
    var limit=$("#limit").val();
    var url=base_url+'admin/member.html?';
    if(phrase!=''){
        url+='phrase='+phrase+'&';
    }
    if(from!=''){
        url+='from='+from+'&';
    }
    if(to!=''){
        url+='to='+to+'&';
    }
    if(parseInt(group)!='0'){
        url+='group='+group+'&';
    }
    if(limit){
        url+='limit='+limit+'&';
    }
    document.location.href=url;
}

$(document).ready(function(){
    //$(".date").datepicker( "option","dateFormat",'dd-mm-yy');
   	$("#date-picker").datepicker( "option","dateFormat",'dd-mm-yy');
    style_path = "html/resources/css/colors";
    $(".calendar").datepicker();
    $("#floor_date").datepicker( "option","dateFormat",'dd-mm-yy');
    $("#ceil_date").datepicker( "option","dateFormat",'dd-mm-yy');
	clock();
    setInterval('clock()',1000);

    $("form").bind('keydown',function(e){
        var key=e.keyCode;
        if(key==13){$(this).submit();}
    })
    	$("input.focus").focus(function () {
			 $("#message-error").fadeOut("slow");
				});

				$("input.focus").blur(function () {
					if ($.trim(this.value) == "") {
						this.value = (this.defaultValue ? this.defaultValue : "");
					}
				});
    	$("input:submit, input:reset").button();

})
function login(){
                var name=$("#username").val();
                var pwd=$("#password").val();
                var err=0;
                if ((name.trim()=='')){$("#message-error").fadeIn("slow");$("#error-message").html("Tên đăng nhập không được bỏ trống");err++;}
                if(pwd.trim()==''){$("#message-error").fadeIn("slow");$("#error-message").html("Mật khẩu đăng nhập không được bỏ trống");err++;}

                if(err==0){
                    $.ajax({
                        type:'post',
                        url:'admin/login/check_login.html',
                        data:'name='+name+'&pwd='+pwd,
                        beforeSend:function(){$(".loading").fadeIn("slow");},
                        success:function(data){
                        $(".loading").hide();
                        var check=data;
                        if(check=='0'){$("#message-error").fadeIn("slow");$("#error-message").html("Tên đăng nhập hoặc mật khẩu không đúng");}
                        if(check=='1'){$("#message-error").fadeIn("slow");$("#error-message").html("Tài khoản của bạn đã bị khóa");}
                        if(check=='2'){
                            document.location.href='admin/admin/index.html';
                        }
                        }
                    })
                }

            }
            function show_getpwd_form(){
             $(".login_form").hide();
             $(".getpwd_form").show();
            }
            function show_login_form(){
                 $(".login_form").show();
             $(".getpwd_form").hide();
            }
            $(document).ready(function(){
                $("#login input").bind('keyup',function(e){
                    var key=e.keyCode;

                    if(key==13){login();}
                })
                $("#resetpwd input").bind('keyup',function(e){
                    var key=e.keyCode;

                    if(key==13){reset_pwd();}
                })
            })

            function reset_pwd(){
                if(validate_form('resetpwd')){
                 var url=base_url+'admin/login/resetpassword.html';
                 var result=submit_form('resetpwd','post',url);
                 switch(result){
                    case '1':

                    alert('Mã xác nhận không chính xác');
                    $("#captcha").focus();
                    break;
                    case '2':
                    alert('Địa chỉ email hoặc tên truy cập không chính xác');
                    break;
                    case '3':
                    alert('Tài khoản của bạn đang bị khóa');
                    break;
                    case '0':
                    alert('Một email thay đổi mật khẩu đã được gửi tới hòm thư của bạn,bạn hãy kiểm tra email và làm theo các bước tiếp theo để thay đổi mật khẩu');
                    break;
                    default:
                    alert('Có lỗi xảy ra,lấy thông tin thất bại');
                    break
                 }
                }
            }
function edit_admin(name){

    var user_name=get_checkbox_checked_value('frm_list_admin');
    if(name!=null){
        user_name=name;
    }
    if(user_name!='0'){
        var url=base_url+'admin/user/update_user/'+user_name+'.html';
        document.location.href=url;
    }
  }


function add_to_block(els){
    var id=$(els).val();
    var plugin_id=$("#plugin_id").val();
    if($(els).is(":checked")){
        $.ajax({type:'post',url:base_url+'admin/plugin/update_product_block.html',data:({'product_id':id,'status':1,'plugin_id':plugin_id}),beforeSend:function(){$(".loading").show();},success:function(data){

            $(".loading").hide();
            $("#frm_block_product").children("table").children("tbody").append(data);
        }})
    }else{
        $.ajax({type:'post',url:base_url+'admin/plugin/update_product_block.html',data:({'product_id':id,'status':0,'plugin_id':plugin_id}),beforeSend:function(){$(".loading").show();},success:function(data){

            $(".loading").hide();
            $("#frm_block_product input ").each(function(){if($(this).val()==id){$(this).parent('td').parent('tr').remove();}})
        }})
    }
    }
    function remove_product_from_block(id){
    var product_id=id;
    var plugin_id=$("#plugin_id").val();
    $.ajax({type:'post',url:base_url+'admin/plugin/update_product_block.html',data:({'product_id':id,'status':0,'plugin_id':plugin_id}),beforeSend:function(){$(".loading").show();},success:function(data){

            $(".loading").hide();
            $("#frm_block_product input ").each(function(){if($(this).val()==id){$(this).parent('td').parent('tr').remove();}})
            $("#frm_list_product input ").each(function(){
                if($(this).val()==id){$(this).removeAttr("checked");$(this).parent("td").parent("tr").removeClass("selected");}

            });
        }})

 }

function update_article_block(els){
    var id=$(els).val();
    var plugin_id=$("#plugin_id").val();
    if($(els).is(":checked")){
        $.ajax({type:'post',url:base_url+'admin/plugin/update_article_block.html',data:({'article_id':id,'status':1,'plugin_id':plugin_id}),beforeSend:function(){$(".loading").show();},success:function(data){

            $(".loading").hide();
            $("#frm_block_article").children("table").children("tbody").append(data);
        }})
    }else{
      $.ajax({type:'post',url:base_url+'admin/plugin/update_article_block.html',data:({'article_id':id,'status':0,'plugin_id':plugin_id}),beforeSend:function(){$(".loading").show();},success:function(data){
            $("#frm_block_article input ").each(function(){if($(this).val()==id){$(this).parent('td').parent('tr').remove();}})

            $(".loading").hide();
            }})

    }
}
function remove_article_from_block(id){
    var plugin_id=$("#plugin_id").val();
    $.ajax({type:'post',url:base_url+'admin/plugin/update_article_block.html',data:({'article_id':id,'status':0,'plugin_id':plugin_id}),beforeSend:function(){$(".loading").show();},success:function(data){
            $("#frm_block_article input ").each(function(){if($(this).val()==id){$(this).parent('td').parent('tr').remove();}})
            $("#frm_list_article input ").each(function(){
                if($(this).val()==id){$(this).removeAttr("checked");$(this).parent("td").parent("tr").removeClass("selected");}

            });
            $(".loading").hide();
            }})
}

//--Module langguage --//

function edit_lang(lang_id){
    open_popup(base_url+'admin/system/edit_lang/'+lang_id+'.html',base_url+'admin/system/language.html',800,300);
}

function delete_lang(lang_id){
    var check=confirm('Bạn có muốn xóa ngôn ngữ này không');
    if(check){
    document.location.href=base_url+'admin/system/delete_lang/'+lang_id+'.html';
    }
}

function lang_active(lang_id){
   document.location.href=base_url+'admin/config/lang_active/'+lang_id+'.html';
}

function lang_default(lang_id){
  document.location.href=base_url+'admin/config/lang_default/'+lang_id+'.html';
}
function addKeyword(){
    $.ajax({
        type:'post',
        url:base_url+'admin/system/add_keyword.html',
        data:$('form#frm_add_keyword').serialize(),
        beforeSend:function(){$("#loading").show();},
        success:function(data){
            $("#loading").hide();
            reset_form('frm_add_keyword');
            switch(data){
                case '0':
                alert('Thêm mới từ khóa thành công');$("#frm_list_keyword").load(base_url+'admin/system/table_keyword.html');
                break
                case '1':
                alert('Từ khóa này đã tồn tại');
                break;
                default:
                alert('Có lỗi xảy ra,thêm mới từ điển thất bại');
                break;
            }


        }
    })
}

// Gallery

function addImageUploadField(){
    var content = '<div class="field">';
        content += '<div style="margin-left: 120px;" class="input">';
        content += '<input type="file" size="40" class="required_field" name="image_upload[]" class="image_field"  multiple=""  /></div><img height="24" width="24" style="cursor: pointer;" onclick="($(this).parent().remove())" src="html/resources/images/icons/remove.png" title=""/>';
        content += '</div>';
        $('#upload-field').append(content);
}
$(document).ready(function(){

 $("#album-list-image .image-info").contextMenu({
	   menu: 'myMenu'
				},
	function(action, el, pos) {
	var title = $(el).attr('title');
    switch(action){

        case 'delete':
        var check = confirm('Bạn có muốn xóa ảnh này không');
        if (check) {
        $.ajax({
            type : 'get',
            data : ({'image':title}),
            url : base_url+'admin/galleries/delete_image.html',
            beforeSend : function(){
                $('.loading').show();
            },
            success : function(result){
                $('.loading').hide();
                if(result == '0'){$(el).remove();}
                else {alert('Có lỗi xảy ra, xóa ảnh thất bại');}
            }
        });
        }
        break;
        case 'edit' :
            var current_url = document.location.href +'#gallery';
            open_popup(base_url+'admin/galleries/edit_media/'+title+'.html',current_url,800,450);
        break;
        case 'edit-pano' :
        var album = $(el).attr('album');
        var pano  = $(el).attr('title');
         document.location.href = '/admin/galleries/edit_panorama/' + album;
        break;
        case 'delete-pano' :
        break;
        default:
        break;
    }
	});


$('#menu_title').change(function(){
    var str = $(this).val();
    
    $.ajax({type: 'get', url : base_url + 'admin/menu/to_ansi.html?str=' +str, success:function(data){$('#menu_string').val(data.trim())}});
})
});

function delete_group(id)
{
    var check = confirm('Xóa nhóm thành viên sẽ xóa tất cả các thành viên trong nhóm đó');
    if(check){
        document.location.href = base_url+'admin/admin/delete_group/' + id + '.html';
    }
}

function active_group(id,stt)
{
    document.location.href = base_url+'admin/admin/active_group/' + id + '/' + stt + '.html'
}
function addProductAttachment(el)
{   var id = $(el).val();
    var content = $(el).parent('td').parent('tr').html();
    content = '<tr class="' +id+ '">' + content + '</tr>';
    var value = $('#product_attachment').val();
    if($(el).is(':checked') && $(el).parent('td').parent('tr').attr('class') != id) { $('#product-attachment-table').children('tbody').append(content);
        value += id + '|';
        $('#product_attachment').val(value);

    }
    else{
        $('#product-attachment-table').find('input[value="'+id+'"]').parent('td').parent('tr').remove();
        $('input[name="'+id+'"]').removeAttr('checked');
        $('input[name="'+id+'"]').parent('td').parent('tr').removeClass('selected');
        value = value.replace(id + '|','');
        $('#product_attachment').val(value);
    }
}
function showProductPage(page)
{

    var cate_id = $('#menu_product').val();
    var products = $('#product_attachment').val();
    var product_url = base_url + 'admin/product/table_product3.html?cate_id=' + cate_id + '&products=' +products;
    var page_url = base_url + 'admin/product/page_product.html?cate_id='+cate_id;
    if(page != null )
    {
        product_url = base_url + 'admin/product/table_product3.html?cate_id=' + cate_id + '&products=' +products + '&page=' + page;
        page_url = base_url + 'admin/product/page_product.html?cate_id='+cate_id + '&page=' + page;
    }
    $('#product-list').children('tbody').load(product_url);
    $('.pager').load(page_url);

}
function delete_promotion(id)
{
    var check = confirm('Bạn có muốn xóa chương trình khuyến mãi này không');
    if (check)
    {
        document.location.href = base_url + 'admin/promotions/delete/' + id;
    }
}
$(function(){
    $('form input').each(function(){
        $(this).focus(function(){
            $(this).removeClass('error-input');
            $(this).parent().find('span.error').remove();
        });
    }) ;

    $('select').each(function(){
        if($(this).attr('data')){
            var selectedVal = $(this).attr('data');

            $(this).children('option').each(function(){
                if($(this).val() == selectedVal){
                    $(this).attr('selected','selected');
                }
            });
        }
    });
    $('input[type="radio"]').each(function(){
        if($(this).attr('data')){
            var select_val = $(this).attr('data');
            var el_val = $(this).val();
            if(select_val === el_val){$(this).attr('checked','checked');}
        }
    });
});

function emptyCache(){
    $.post('/admin/admin/clean_cache',{},function(rs){
        if(typeof rs.code != 'undefined' && rs.code == 'ok'){
            alert(rs.msg);
        }
    },'json');
}

$.fn.tab = function(){
    $(this).children('li').each(function(){
        var el_name = $(this).attr('rel');
        if(!$(this).is(':first-child')){
            $(el_name).hide();
        } else{
            $(el_name).show();
            $(this).addClass('active');
        }
        
       
        
    });
    $(this).children('li').click(function(){
       var active_el = $(this).attr('rel');
       $(this).parent().children('li').each(function(){
          var el_name = $(this).attr('rel');
          $(this).removeClass('active');
          $(el_name).hide();
       });  
       $(this).addClass('active');
       $(active_el).show();
    });
   
}


