<?php
include ('./header.php');
require_once('./dao/customerDao.php');
?>
    <body>

            <div id="content" class="clearfix">
                <aside>
                        <h2>Mailing Address</h2>
                        <h3>1385 Woodroffe Ave<br>
                            Ottawa, ON K4C1A4</h3>
                        <h2>Phone Number</h2>
                        <h3>(613)727-4723</h3>
                        <h2>Fax Number</h2>
                        <h3>(613)555-1212</h3>
                        <h2>Email Address</h2>
                        <h3>info@wpeatery.com</h3>
                </aside>
                <div class="main">
                    <h1>Removed users Lists</h1>
                    <form name="frmNewsletter" id="frmNewsletter" method="post" action="newsletterSignup.php">
                        <table>
							<?php
							    $customerDAO = new customerDAO();
								$list = $customerDAO->getDeletedCustomerNames();
								if(strlen($list)!=0){
									$array=explode(" : ",$list);
									$length=count($array);
									echo '<tr><th>Name:</th><th>Phone Number:</th><th>Email Adress:</th></tr>';
									for ($x=1; $x<$length; $x++) {
									  echo '<tr>';
									  $customerinfo=explode(",",$array[$x]);
									  for ($y=0; $y<count($customerinfo); $y++){
										  echo '<td>' . $customerinfo[$y] . '</td>';
									  }
									} 
								}
								
							?>
                        </table>
                    </form>
                </div>
            </div>
            <?php include 'footer.php';?>
    </body>
</html>
