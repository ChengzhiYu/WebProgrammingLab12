<?php

require_once('abstractDAO.php');
require_once('./model/customer.php');
class customerDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
	
    public function getCustomers(){
        $result = $this->mysqli->query('SELECT * FROM mailinglist');
        $customers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                $customer = new Customer($row['_id'], $row['customerName'], $row['phoneNumber'], $row['emailAddress'], $row['deletedCustomerNames'], $row['referrer']);
                $customers[] = $customer;
            }
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }
    
	public function getDuplicateEmail($email){
		$query = 'SELECT * FROM mailinglist where emailAddress = ?';

		$stmt = $this->mysqli->prepare($query);

		$stmt->bind_param('s', $email);

        $stmt->execute();
		$stmt->bind_result($id,$name,$phone,$email,$list,$refer);
		$boolean = false;
		while ($stmt->fetch()) {
			$boolean = true;
		}
		return $boolean;
    }
	
    public function getDeletedCustomerNames(){
        $result = $this->mysqli->query('SELECT distinct(deletedCustomerNames) FROM mailinglist');
        $customers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
				$deletedCustomerNames = $row['deletedCustomerNames'];
            }
            $result->free();
            return $deletedCustomerNames;
        }
		else
			return "";
        $result->free();
        return false;
    }

    public function addCustomer($customer){
        if(!$this->mysqli->connect_errno){
            $query = 'INSERT INTO mailinglist(customerName, phoneNumber, emailAddress, deletedCustomerNames, referrer) VALUES (?,?,?,?,?)';

            $stmt = $this->mysqli->prepare($query);

            $stmt->bind_param('sssss', 
                    $customer->getCustomerName(), 
                    $customer->getPhoneNumber(), 
                    $customer->getEmailAddress(),
					$customer->getDeletedCustomerNames(), 
                    $customer->getReferrer());

            $stmt->execute();

            if($stmt->error){
                return $stmt->error;
            } else {
                return $customer->getCustomerName().' added successfully!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }

public function deleteCustomer($customerid){
        if(!$this->mysqli->connect_errno){
			$name="";$phoneNumber="";$emailAddress="";$deletedCustomerNames="";
			$query= 'select * from mailinglist where _id = ?';
			$stmt = $this->mysqli->prepare($query);
			$stmt->bind_param('i', $customerid);
			$stmt->execute();
			
			$result = $stmt->get_result();
			if($result->num_rows == 1) {
				$temp = $result->fetch_assoc();
				$name = $temp['customerName'];
				$phoneNumber=$temp['phoneNumber'];
				$emailAddress= $temp['emailAddress'];
				$deletedCustomerNames = $temp['deletedCustomerNames'];
				$result->free();
			}
			
			$query = 'DELETE FROM mailinglist WHERE _id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $customerid);
            $stmt->execute();
			
			$query = 'UPDATE mailinglist SET deletedCustomerNames = ?';
			$stmt = $this->mysqli->prepare($query);
			$newvalue = $deletedCustomerNames.":".$name.",".$phoneNumber.",".$emailAddress;
			
			$stmt->bind_param('s', $newvalue);
			$stmt->execute();
			
            if($stmt->error){
				return false;
			} else {
				
				return true;
			}
        } else {
			return false;
        }
    }
    
    public function editEmployee($deletedCustomerNames){
        if(!$this->mysqli->connect_errno){
            $query = 'UPDATE mailinglist SET deletedCustomerNames = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('s', $deletedCustomerNames);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return $stmt->affected_rows;
            }
        } else {
            return false;
        }
    }
}

?>
