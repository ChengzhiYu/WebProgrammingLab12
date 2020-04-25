<?php
	class Customer{
		private $customerName;
		private $phoneNumber;
		private $emailAddress;
		private $deletedCustomerNames;
		private $referrer;
		private $customerid;
		
		function __construct($customerid, $customerName, $phoneNumber, $emailAddress, $deletedCustomerNames, $referrer){
			$this->setCustomerID($customerid);
			$this->setCustomerName($customerName);
			$this->setPhoneNumber($phoneNumber);
			$this->setEmailAddress($emailAddress);
			$this->setDeletedCustomerNames($deletedCustomerNames);
			$this->setReferrer($referrer);
		}
		
		public function getCustomerID(){
			return $this->customerid;
		}
		
		public function setCustomerID($customerID){
			$this->customerid = $customerID;
		}
		
		public function getCustomerName(){
			return $this->customerName;
		}
		
		public function setCustomerName($customerName){
			$this->customerName = $customerName;
		}
		
		public function getPhoneNumber(){
			return $this->phoneNumber;
		}
		
		public function setPhoneNumber($phoneNumber){
			$this->phoneNumber = $phoneNumber;
		}
		
		public function getEmailAddress(){
			return $this->emailAddress;
		}
		
		public function setEmailAddress($emailAddress){
			$this->emailAddress = $emailAddress;
		}
		
		public function getDeletedCustomerNames(){
			return $this->deletedCustomerNames;
		}
		
		public function setDeletedCustomerNames($deletedCustomerNames){
			$this->deletedCustomerNames = $deletedCustomerNames;
		}
		
		public function getReferrer(){
			return $this->referrer;
		}
		
		public function setReferrer($referrer){
			$this->referrer = $referrer;
		}
	}
?>