
<?php
include ('./header.php');
require_once('./dao/customerDao.php');
?>

<?php
				try{
				$hasError = false;
				$errorMessages = Array();
				$customerDAO = new customerDAO();
				if(isset($_POST['phoneNumber'])&&isset($_POST['emailAddress'])&&isset($_POST['customerName'])){
					$phoneNumber = $_POST['phoneNumber'];
					if (!preg_match("/\d\d\d\d\d\d\d\d\d\d/",$phoneNumber)){ 
						$hasError = true;
						$errorMessages['phoneNumberError'] = 'Invalid phone number';
					}
					$emailAddress = $_POST['emailAddress'];
					if (!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+/",$emailAddress)){ 
						$hasError = true;
						$errorMessages['emailAddressError'] = 'Invalid email address';
					}
					
					if($customerDAO->getDuplicateEmail($emailAddress)){
						$hasError = true;
						$errorMessages['emailAddressDuplicate'] = 'Duplicated email address';
					}
					
					if(isset($_POST['referralNewspaper']))
						$referral = "newspaper";
					else if(isset($_POST['referralRadio']))
							$referral = "radio";
						else if(isset($_POST['referralTV']))
								$referral = "TV";
							else
								if(isset($_POST['other']))
									$referral = "other";
								else{
									$hasError = true;
									$errorMessages['noreffer'] = 'No referral selected';
								}
							
					$name = $_POST['customerName'];
					
					if(!$hasError){
						
						$deletedList = $customerDAO->getDeletedCustomerNames();
						
						$customer = new Customer(0, $name, $phoneNumber, $emailAddress, $deletedList, $referral);
			
						$addSuccess = $customerDAO->addCustomer($customer);
						
						echo '<h3>' . $addSuccess . '</h3>';
					}
				}
			?>
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
					<form name="frmNewsletter" id="frmNewsletter" method="post" action="" onsubmit="">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="customerName" id="customerName" size='40'></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber" size='40'>
								<?php
								if(isset($errorMessages['phoneNumberError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['phoneNumberError'] . '</span>';
								}
								?>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" size='40'>
								<?php
								if(isset($errorMessages['emailAddressError'])){
									echo '<span style=\'color:red\'>' . $errorMessages['emailAddressError'] . '</span>';
								}
								if(isset($errorMessages['emailAddressDuplicate'])){
									echo '<span style=\'color:red\'>' . $errorMessages['emailAddressDuplicate'] . '</span>';
								}
								?></td>
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>Newspaper<input type="radio" name="referralNewspaper" id="referralNewspaper" value="newspaper">
                                    Radio<input type="radio" name='referralRadio' id='referralRadio' value='radio'>
                                    TV<input type='radio' name='referralTV' id='referralTV' value='TV'>
                                    Other<input type='radio' name='referralOther' id='referralOther' value='other'>
									<?php
									if(isset($errorMessages['noreffer'])){
										echo '<span style=\'color:red\'>' . $errorMessages['noreffer'] . '</span>';
									}
									?>
                            </tr>
                            <tr>
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form">
								</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
			<?php
			
			}catch(Exception $e){
				
				echo '<h3>Error on page.</h3>';
				echo '<p>' . $e->getMessage() . '</p>';            
			}
			?>
            <?php include 'footer.php';?>
        </div>
    </body>
</html>

