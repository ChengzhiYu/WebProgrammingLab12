<!DOCTYPE html>
<html>
    <body>
        <div id="wrapper">
		<?php include 'header.php';?>
		<?php include 'menuItem.php';?>
		<?php
			$i = 0;
			$products = [];

			while ($i < 6){

				if($i%2==0){
					$products[$i] = new MenuItem("The WP Burger ".str_repeat("*",$i+1).($i+1),"Freshly made all-beef patty served up with homefries","$14");
				}else{
					$products[$i] = new MenuItem("WP Kebobs ".str_repeat("*",$i+1).($i+1),"Tender cuts of beef and chicken, served with your choice of side","$17");
				}
				$i++;
			}
		?>
            <div id="content" class="clearfix">
                <aside>
						<h2><?php date_default_timezone_set ("America/Toronto"); 
								  echo date('l')."'s Specials"?></h2>
						<?php 
							$i = 0;

							while ($i < 6){

								echo "<hr>";
								if($i%2==0){
									echo "<img src=\"images/burger_small.jpg\" alt=\"Burger\" title=\"Monday's Special - Burger\">";
								}else{
									echo "<img src=\"images/kebobs.jpg\" alt=\"Kebobs\" title=\"WP Kebobs\">";
								}
								echo "<h3>".$products[$i]->getItemName()."</h3>";
								echo "<p>".$products[$i]->getDescription()." - ".$products[$i]->getPrice()."</p>";
								$i++;
							}
						?>
                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
            </div>
			<?php include 'footer.php';?>
        </div>
    </body>
</html>
