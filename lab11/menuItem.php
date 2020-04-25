<?php

class MenuItem{
	private $itemName;
	private $description;
	private $price;
	
	function __construct($itemName,$description,$price){
		$this->itemName=$itemName;
		$this->description=$description;
		$this->price=$price;
	}
	
	function setItemName($itemName){
		$this->itemName=itemName;
	}
	
	function getItemName(){
		return isset($this->itemName)?$this->itemName:null;
	}
	
	function setDescription($description){
		$this->description=description;
	}
	
	function getDescription(){
		return isset($this->description)?$this->description:null;
	}
	
	function setPrice($price){
		$this->price=$price;
	}
	
	function getPrice(){
		return isset($this->price)?$this->price:null;
	}
}