<?php
require_once('./dao/customerDAO.php');
if(isset($_GET['action'])){
    
    if($_GET['action'] == "delete"){
        if(isset($_GET['customerID'])){
            $customerDAO = new customerDAO();
			$originalList = $customerDAO->getDeletedCustomerNames().' : ';
			$newList = $originalList.$_GET['customerName'].','.$_GET['phoneNumber'].','.$_GET['emailAddress'];
            $success = $customerDAO->deleteCustomer($_GET['customerID']);
            if($success){
				$customerDAO->editEmployee($newList);
                header('Location:mailing_list.php?deleted=true');
            } else {
                header('Location:mailing_list.php?deleted=false');
            }
        }
    }
}
?>
