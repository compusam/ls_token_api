<?php

if (!defined(_ACCESS_FILE))
{
	header('HTTP/1.0 403 Forbidden');
	exit("direct access not permitted");
}

class dbloader {
 
	private $conn;
	
	public function __construct(){
		
		try {
        	
        	$this->conn = new PDO(_DRIVER . ':host=' . _HOST . ';dbname=' . _BASE, _USER, _PASSWORD);        	
        	
        	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	
        	$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			
        	return $this->conn;
        	
        } catch(PDOException $ex) {
        	
        	die(json_encode(array('code' => -100, 'response' => null, 'message' => 'Unable to connect' . $ex)));
        }
	}
	
    public function selectQuery ($sql){
    	
    	try {

    		$dbh = new dbloader();
    			
	    	$query = $dbh->conn->prepare($sql);
	    	
	    	if($query->execute()) { 
	    		
	    		return $query->fetch();
	    	} else {    		
	    		return null;
	    	}
    		
    	} catch(Exception $e) {

    		throw new Exception("Error in selectQuery"  . $e->getMessage());
    	} 
    }
    
    public function selectQueryToArray ($sql){
    	 
    	try {

    		$dbh = new dbloader();
	    	
	    	$query = $dbh->conn->prepare($sql);
    
    		$row = $query->execute();
    		
    		$rowArray = new ArrayObject();
    		
    		while ($row = $query->fetch()) {
    			$rowArray->append($row);
    		}
    		
    		if(count($rowArray) > 0) {
    			return $rowArray;
    		} else {
    			return null;
    		}
    			
    	} catch(Exception $e) {
    
    		throw new Exception("Error in selectQueryToArray");
    	}
    }
    
    public function updateQuery ($sql){
    
    	try {

	    	$dbh = new dbloader();
	    	
	    	$query = $dbh->conn->prepare($sql);
    	 
	    	if($query->execute()) {
				return true;
			} else {
				throw new Exception("Error in updateQuery");
			}
		} catch(Exception $e) {
		
			throw new Exception("Error in updateQuery");
		} 
    }
    
    public function insertQuery ($sql){
    
    	try {
    
    		$id = 0;
    		
    		$dbh = new dbloader();
	    	
	    	$query = $dbh->conn->prepare($sql);
    		
    		if($query->execute()) {
    			$id = $dbh->conn->lastInsertId();
    		}
//echo $sql;
    		return $id;
    		
    	} catch(Exception $e) {
    
    		throw new Exception("Error in insertQuery");
    	}
    }
    
    public function __destruct() {
    	$this->conn = null;
    }
}
