<h3 style="text-align:center">Verifica o teu carrinho</h3>
<?php
	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
		$total 			= 0;
		$cart_box 		= '<ul class="view-cart">';

		foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
			$product_name = $product["product_name"];
			$product_description = $product["product_description"]; 
			$product_qty = $product["product_qty"];
			$product_price = $product["product_price"];
			$product_code = $product["product_code"];
			$product_size = $product["product_size"];
			
			$item_price = $product_price * $product_qty;  
			
			$cart_box .=  "<li> Cod: $product_code - $product_name $product_description (Quantidade : $product_qty | $product_size) <span> ".$item_price."€</span></li>";
		
			$subtotal = ($product_price * $product_qty); //Multiply item quantity * price
			$total = ($total + $subtotal); //Add up to total price
		}
		
		$grand_total = $total ; //grand total
		
		//Mostrar o valor Total
		$cart_box .= "<li class=\"view-cart-total\"> <hr>Valor a Pagar: ".$grand_total."€</li>";
		$cart_box .= "</ul>";
		
		echo $cart_box;
		$x=0;
		echo "
				<form action='https://www.paypal.com/cgi-bin/webscr' method='post'>

					<!-- Identify your business so that you can collect the payments. -->
					<input type='hidden' name='business' value='herschelgomez@xyzzyu.com'>

					<!-- Specify a Buy Now button. -->
					<input type='hidden' name='cmd' value='_xclick'>

					<!-- Specify details about the item that buyers will purchase. -->
					<input type='hidden' name='item_name' value='$product_name'>
					<input type='hidden' name='amount' value='$grand_total'>
					<input type='hidden' name='currency_code' value='EUR'>

					<!-- Display the payment button. -->
					<input type='image' name='submit' border='0'
					src='https://www.paypalobjects.com/webstatic/en_US/i/btn/png/silver-rect-paypalcheckout-26px.png'
					alt='Buy Now'>
					<img alt='' border='0' width='1' height='1'
					src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' >

				</form>"
		;
	}else{
		echo "O teu carrinho está vazio";
	}
?>
