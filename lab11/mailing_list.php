
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
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="post" action="newsletterSignup.php">
                        <table>
							 <?php
							    $customerDAO = new customerDAO();
								$customers = $customerDAO->getCustomers();
								if($customers){
									echo '<tr><th>Name:</th><th>Phone Number:</th><th>Email Adress:</th><th>How did you hear about us?</th><th>Delete?</th></tr>';
									
									foreach($customers as $customer){
										echo '<tr>';
										echo '<td>' . $customer->getCustomerName() . '</td>';
										echo '<td>' . $customer->getPhoneNumber() . '</td>';
										echo '<td>' . $customer->getEmailAddress() . '</td>';
										echo '<td>' . $customer->getReferrer() . '</td>';
										echo '<td><a href=process_customer.php?action=delete&customerID=' . $customer->getCustomerID(). '&customerName=' . $customer->getCustomerName(). '&phoneNumber=' . $customer->getPhoneNumber(). '&&emailAddress=' . $customer->getEmailAddress(). '>
										<input type=\'button\' name=\'btnDelete\' id=\'btnDelete$i\' value=\'Delete\'></a></td>';
										echo '</tr>';
									}
								}
								
							?>
                        </table>
                    </form>
                </div>
            </div>
            <?php include 'footer.php';?>
        </div>
    </body>
</html>