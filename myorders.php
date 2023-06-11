<?php
include "db.php";
include "header.php";        
?>
<link href="css/myorders.css" rel="stylesheet"/>					
<section class="section main main-raised">       
	<div class="container-fluid ">
		<div class="wrap cf">
            <h1 class="projTitle">All Your Orders</h1>
            <div class="heading cf">
                <h1>My Orders</h1>
                <h1 style="margin-left:55%">qty</h1>
                <a href="store.php" class="continue">Continue Shopping</a>
            </div>
            <div class="cart">
                <ul class="cartWrap">
                    <?php
                        if (isset($_SESSION["uid"])) {
                            $sql="SELECT b.o_id,a.p_id,a.p_name,a.p_price,a.p_img,b.total_amt FROM products a,orders b WHERE a.p_id=b.p_id AND b.u_id='$_SESSION[uid]' ORDER BY `b`.`o_id` DESC";
                            $query = mysqli_query($con,$sql);
                            //display cart item in dropdown menu
                            
                            if (mysqli_num_rows($query) > 0) {
                                $prev_old = 0;
                                $prev_total = 0;
                                $i = 1;
                                $numRows = mysqli_num_rows($query);
                                while ($row=mysqli_fetch_array($query)) {
                                    
                                    $p_id = $row["p_id"];
                                    $p_name = $row["p_name"];
                                    $p_price = $row["p_price"];
                                    $p_img = $row["product_image"];
                                    $qty = $row["qty"];
                                    $total_amt=$row["total_amt"];
                                    $o_id=$row["o_id"];
                                    
                                    if ($prev_old==0 || $prev_old==$o_id){
                                        $prev_old=$o_id;
                                        $prev_total = $total_amt;
                                        $i++;
                                        echo '
                                            <li class="items even">
                                                <tr>
                                                <div class="infoWrap"> 
                                                    <div class="cartSection">
                                                        <img src="product_images/'.$p_img.'" alt="'.$p_name.'" class="itemImg" />
                                                        <p class="itemNumber">#'.$p_id.'</p>
                                                        <h3>'.$p_name.'</h3>
                                                        <p> '.$qty.' x &#x20B9; '.$p_price.'</p>
                                                        <p class="stockStatus"> Delivered</p>
                                                    </div>  
                                                
                                                    <div class="prodTotal cartSection"><p>'.$qty.'</p></div>
                                                    <td>
                                                    <div class="prodTotal cartSection">
                                                        <p>&#x20B9; '.$p_price.'</p>
                                                    </div>
                                                    </td>
                                                    <div class="cartSection removeWrap">
                                                        <a href="#" class="remove">x</a>
                                                    </div>
                                                </div>
                                                </tr>
                                            </li>'
                                        ;
                                    }else{
                                        $prev_old=$order_id;
                                        $i++;
                                        echo'
                                            <div class="subtotal cf">
                                                <ul>
                                                    <li class="totalRow"><span class="label">Subtotal</span><span class="value">&#x20B9; '.$prev_total.'</span></li>
                                                    <li class="totalRow"><span class="label">Shipping</span><span class="value">&#x20B9; 0.00</span></li>
                                                    <li class="totalRow"><span class="label">Tax</span><span class="value">&#x20B9; 0.00</span></li>
                                                    <li class="totalRow final"><span class="label">Total</span><span class="value">&#x20B9;'.$prev_total.'</span></li>
                                            
                                                </ul>
                                            </div>
                                            <div class="cart">
                                                <ul class="cartWrap">
                                                    <li class="items even">
                                                        <tr>
                                                            <div class="infoWrap"> 
                                                                <div class="cartSection">
                                                                    <img src="product_images/'.$p_img.'" alt="'.$p_name.'" class="itemImg" />
                                                                    <p class="itemNumber">#'.$p_id.'</p>
                                                                    <h3>'.$p_name.'</h3>
                                                                    <p> '.$qty.' x &#x20B9; '.$p_price.'</p>
                                                                    <p class="stockStatus out"> Shipping</p>
                                                                </div>  
                                                                <div class="prodTotal cartSection"><p>'.$qty.'</p></div>
                                                                <td>
                                                                    <div class="prodTotal cartSection">
                                                                        <p>&#x20B9; '.$p_price.'</p>
                                                                    </div>
                                                                </td>
                                                                <div class="cartSection removeWrap">
                                                                    <a href="#" class="remove">x</a>
                                                                </div>
                                                            </div>
                                                        </tr>
                                                    </li>
                                                </ul>
                                            </div>
                                        ';
                                        $prev_total = $total_amt;
                                    }
                                    if($i==$numRows+1){
                                        echo '
                                            <div class="subtotal cf">
                                                <ul>
                                                    <li class="totalRow"><span class="label">Subtotal</span><span class="value">&#x20B9; '.$prev_total.'</span></li>
                                                    <li class="totalRow"><span class="label">Shipping</span><span class="value">&#x20B9; 0.00</span></li>
                                                    <li class="totalRow"><span class="label">Tax</span><span class="value">&#x20B9; 0.00</span></li>
                                                    <li class="totalRow final"><span class="label">Total</span><span class="value">&#x20B9;'.$prev_total.'</span></li>
                                                </ul>
                                            </div>
                                        ';
                                    }
                                }
                            }else{
                            }
                        }
                    ?>
                </ul>
            </div> 
            <!--<li class="items even">Item 2</li>-->
        </div>
    </div>
</section>
<?php
include "footer.php";
?>