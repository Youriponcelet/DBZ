<?php 
/* DBZ MODELE KAMEHAMEHA */
class Model 
	{
  
	private $PDO = NULL;
  
	public function __construct ($pdo) 
		{
		$this->PDO = $pdo;
		}
	  
	// db name
	public function Name_DB ()
		{
		return $this->PDO->Query('select database()')->fetchColumn();
		}
	  
	// list table
	public function List_Table () 
		{
		$SQL = "show tables";
		$RES = $this->PDO->prepare($SQL);
		$RES->execute();
		return $RES->fetchAll();
		}
	  
	// list data table
	public function EntitiesTable($Name_Table)
		{
		$SQL = "select * from " . $Name_Table;
		$RES = $this->PDO->prepare($SQL);
		$RES->execute();
		return $RES->fetchAll();
		}
	
	// delete the table
	public function DeleteTable($Name_Table)
		{
		$REQ = "delete from ".$Name_Table;
		$RES = $this->PDO->prepare($REQ);
		$RES->execute();
		}
	  
	}
?>