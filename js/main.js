$(document).ready(function(){
cat();
brand();
product();
cart_checkout();
pagenation();
count_cart();
	function cat(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {category:1},
			success: function(data){
				$("#get_category").html(data);
			}
		});
	}
	
	function brand(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {brand:1},
			success: function(data){
				$("#get_brand").html(data);
			}
		});
	}
	
	function product(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {product:1},
			success: function(data){
				$("#get_product").html(data);
			}
		});
	}
	// send the id of category form one page to another
	$("body").delegate('.category','click', function(event){
		event.preventDefault(); //prevent from loading the page
		var cid = $(this).attr('cid');
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {get_selected_category:1, cat_id:cid},
			success: function(data){
				$("#get_product").html(data);
			}
		});
	});
	
	// send the id of brand form one page to another
	$("body").delegate('.brand','click',function(event){
		event.preventDefault();
		var bid=$(this).attr('bid');
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {get_selected_brand:1,brand_id:bid},
			success: function(data){
			$("#get_product").html(data);
		}
		});
	});
	
   // search function ajax 
	$("#search_btn").click(function(){
		var keyword=$("#search").val();
		if(keyword !== ""){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {search:1,keyword:keyword},
			success: function(data){
			$("#get_product").html(data);
		}
		});
		}
	});
	
	// Sign Up form 
	$("#signup_btn").click(function(event){
		event.preventDefault();
		$.ajax({
			url: "register.php",
			method: "POST",
			data: $("form").serialize(),
			success: function(data){
			$("#signup_msg").html(data);
		}
		});
	});
	
	// Login Form using sending the variables
	$("#login").click(function(event){
		event.preventDefault();
		var email=$("#email").val();
		var password=$("#password").val();
		$.ajax({
			url: "login.php",
			method: "POST",
			data: {userLogin:1, userEmail:email, userPassword:password},
			success: function(data){
			if(data === 'true'){
				window.location.href="profile.php";
			}
			else{
				$("#login_msg").html(data);
			}
		}
		});
	});
	
	// Login Form using form request
	/*$("#login").click(function(event){
		event.preventDefault();
		$.ajax({
			url: "login.php",
			method: "POST",
			data: $("form").serialize(),
			success: function(data){
				alert(data);
			//$("#signup_msg").html(data);
		}
		});
	});*/
	
	// Add To Card
	$("body").delegate('#addToCard','click',function(event){
		event.preventDefault();
		var pid=$(this).attr('pid');
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {AddToCart:1,pid:pid},
			success: function(data){
				$("#AddToCard_msg").html(data);
			}
		});
		count_cart();
	});
	
	//Cart Container 
	$("#cart_container").click(function(event){
		event.preventDefault();
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {cart_container:1},
			success: function(data){
				$("#cart_contain").html(data);
			}
		});
	});
	
	// Cart Checkout
	function cart_checkout(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {cart_checkout:1},
			success: function(data){
				$("#cart_checkout").html(data);
			}
		});
	}
	
	// calculate the checkout pirce and quantity
	$("body").delegate(".quantity","keyup",function(){ // is used  when u type anything inside the quantity field 
		var pid=$(this).attr("pid");  // takes the id form php file
		var quantity= $("#quantity-"+pid).val();  // takes the value of quantity and concatinating with the id
		var price= $("#price-"+pid).val();
		var total= quantity * price;
		$("#total-"+pid).val(total); // writes the value of total in the total field
	});
	
	// Delete A product
	$("body").delegate(".delete","click",function(event){
		event.preventDefault();
		var pid=$(this).attr('delete_id');
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {delele_product:1,delete:pid},
			success: function(data){
				$("#cartcheckout_msg").html(data);
				cart_checkout(); // calling this function will let u to delete the product with giving message and no need to refresh ur page, if u did not call the function u must refresh the page every time u delete a product
			}
		});
	});
	
	// Update Product
	$("body").delegate(".update","click",function(event){
		event.preventDefault();
		var pid=$(this).attr("update_id");
		var quantity=$("#quantity-"+pid).val();
		var price=$("#price-"+pid).val();
		var total=$("#total-"+pid).val();
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {update_product:1,update:pid,quantity:quantity,price:price,total:total},
			success: function(data){
				$("#cartcheckout_msg").html(data);
				cart_checkout(); 
			}
		});
	});
	
	// pagenation
	function pagenation(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {page:1},
			success: function(data){
				$("#page_no").html(data);
			}
		});
	}
	
	// pagenation page number
	$("body").delegate('.page','click',function(event){
		event.preventDefault();
		var page_id=$(this).attr('page_id');
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {product:1,get_page_no:1,page_no:page_id},
			success: function(data){
				$("#get_product").html(data);
			}
		});
	});
	
	// notification
	function count_cart(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {count_cart:1},
			success: function(data){
				$(".badge").html(data);
			}
		});
	}
});