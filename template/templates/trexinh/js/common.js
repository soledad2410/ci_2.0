
$(document).ready(function() {
    
     $("html").niceScroll();
    
	$('nav').scrollToFixed();
	$('form.order').submit(function(e){
		e.preventDefault();
        var data  = $(this).serialize();

        $.post('/shopping/order', data,function(rs){
            if(rs.code == 'success'){
                alert('your message was send successfully, thank you!');

              location.reload();
            } else{
                 alert('Failed to complete your request,please try again later!');
            }
        },'json');
    });
    $('#add-cart').click(function(){
    	var id = $('#p-id').val();
    	var qty = $('#p-qty').val();
    	addCart(id,qty);
    });
    $('#buy-now').click(function(){
    	var id = $('#p-id').val();
    	var qty = $('#p-qty').val();
    	$.get('/shopping/add_cart?id='+id+'&qty='+qty,{},function(rs){document.location.href ='/shopping.html'},'json');
    });
    $('button.reset').click(function(){
    	$(this).closest('form').clearForm();
    });
	$('.main-slide ul').bxSlider({
	    slideWidth: 850,
	    minSlides: 1,
	    maxSlides: 1,
	    moveSlides: 1,
	    slideMargin: 0,
	    auto: true
	});
	$('.product-details .image .small ul').bxSlider({
		slideWidth: 118,
	    minSlides: 4,
	    maxSlides: 4,
	    moveSlides: 1,
	    slideMargin: 10,
	    hideControlOnEnd: true,
	    infiniteLoop: false
	});
	$('.product-details .bx-pager.bx-default-pager').remove();


	$('.product-details .small li').click(function(event) {
		var src = $(this).find('img').attr('src');
		var data_zoom_image = $(this).find('img').attr('data-zoom-image');
		$('.product-details .small li').removeClass('active');
		$(this).addClass('active');
		$('.product-details .large img').attr('src', src);
		$('.zoomWindowContainer div').stop().css("background-image","url("+ data_zoom_image +")");
	});

	$('.products-block h3').click(function(event) {
		var el = $(this).attr('data-tab');
		$('.products-block h3').removeClass('active');
		$(this).addClass('active');
		$('.products-block .products-list.home').fadeOut();
		$('.products-list.home#'+el).fadeIn();
	});

	$('.album-details .album').bxSlider({
		pagerCustom: '#album-thumbnail',
		slideWidth: 640,
	});

	$('.buy').click(function() {
		$('.user-info-form').slideToggle();
	});
	$('table[border="1"]').addClass('table-bordered');

	$('.search-form input[name="keyword"]').keyup(function(event) {
		if (event.which == 13) {
			do_search();
		}
	});
	$('.search-form button').on('click', function() {
		do_search();
	});
});

function addCart(id,qty) {
    $.get('/shopping/add_cart?id='+id+'&qty='+qty,{},function(rs){alert('Thêm giỏ hàng thành công');$('#count-cart').html(rs.count);},'json');
}

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

function removeCart(el) {
    var pId = $(el).attr('data');
    var cf = confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng?');
    if (cf == true) {
	    $.post('/shopping/unset_cart',{id:pId},function(rs){
	        $(el).parents('tr').remove();
	    },'json');
	}
}

function loadMoreProduct (button) {
	$(button).button('loading');
	var id = $(button).data('cate');
	var page = $(button).data('page');
	var str = '';
	$.get('/product/load_more.html?id='+id+'&page='+page, function(data) {
		for (var i = 0; i < data.products.length; i++) {
			str += '<li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 no-padding">';
			str += '<figure>';
			str += '<a href="'+data.products[i]['link']+'">';
			str += '<img src="'+data.products[i]['product_image']+'" alt="'+data.products[i]['product_name']+'"/>';
			str += '<span class="details">Chi tiết</span>';
			str += '</a>';
			str += '<h5><a href="'+data.products[i]['link']+'">'+data.products[i]['product_name']+'</a></h5>';
			str += '<p class="price">'+data.products[i]['product_price']+' vnđ</p>';
			str += '</figure>';
			str += '</li>';
		}
		$('.products-list').append(str);
		if (data.status == 'false') {
			$(button).remove();
		}
		$(button).button('reset');
	}, 'json');
	page++;
	$(button).data('page', page);
}

function do_search () {
	var el = $('.search-form input[name="keyword"]');
	var keyword = $(el).val();
	keyword = $.trim(keyword);
	if (keyword.length < 2) {
		alert('Hãy nhập từ khóa để tìm kiếm');
	} else {
		window.location.href = '/search.html?keyword=' + encodeURI(keyword);
	}
}