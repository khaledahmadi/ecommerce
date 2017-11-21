$(document).ready(function(){
	cart_modal();
// update admin part

	//first trick
	$(".upload").on(".update_admin",function(e) {
		e.preventDefault();
		$.ajax({
		url: "update.php",
		type: "POST",
		data: new FormData(this),
		contentType: false,
		processData:false,
		cache: false,
		success:function(event){
			if(event === 'true'){
				window.location.href="add.php";
			}
			}
		});
	});	
	  
	// second trick
	/*$("body").delegate(".update_admin","click",function(event){
		event.preventDefault();
		var pid=$(this).attr('pid');
		var category=$("#category-"+pid).val();
		var brand=$("#brand-"+pid).val();
		var product_name=$("#product_name-"+pid).val();
		var price=$("#price-"+pid).val();
		var desc=$("#desc-"+pid).val();
		var image=$("#image-"+pid).val();
		var keyword=$("#keyword-"+pid).val();
		$.ajax({
			url: "update.php",
			method: "POST",
			data: {p_update:1,pid:pid,category:category,brand:brand,product_name:product_name,price:price,desc:desc,image:image,keyword:keyword},
			success: function(data){
				if(data === 'true'){
				window.location.href="add.php";
			}
			}
		});
	});*/
	 
	function cart_modal(){
		$.ajax({
			url: "update.php",
			method: "POST",
			data: {cart_modal:1},
			success: function(data){
				$("#cart_modal").html(data);
				$('#zctb1').DataTable();
			}
		});
	}
	 
	 $('#zctb').DataTable();

 });
