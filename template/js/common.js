$(function(){
    
$('#search-input').keypress(function(e){
   
       var keyCode = e ? (e.which ? e.which : e.keyCode) : event.keyCode;
       if(keyCode == 13){
        doSearch();
       }
    });
    $('.btn-search').click(function(){
       doSearch(); 
    });
});


function doSearch()
{
    var keyword =   $('#search-input').val().trim();
    if(keyword !== ''){
        document.location.href = '/search?keyword=' + keyword;
    }
}
