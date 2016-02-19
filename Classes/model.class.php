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
		$SQL = "select * from ".$Name_Table;
		$RES = $this->PDO->prepare($SQL);
		$RES->execute();
		return $RES->fetchAll();
		}
	
	// delete the table
	public function DeleteTable($Name_Table)
		{
		$REQ = "DROP TABLE ".$Name_Table;
		$RES = $this->PDO->prepare($REQ);
		$RES->execute();
		}

	/*if(isset($POST['sendmodify'])) //if you send the form to update an entities
		{	
		// call the function mod_entites
		public function MOD_ENTITIES($Name_Table,$entities,$value)
			{
			// foreact value, make the request "UPDATE TABLE SET ENTITIES = VALUE"
			$REQ = "update " . $Name_Table . " set " . $entities . " = " . $value;
			$RES = $this->PDO->prepare($REQ);
			$RES->execute();
			}	
		}  

	if(isset($POST['sendmodify'])) //if you send the form to add an entities
		{	
		// call the function add_entites
		public function ADD_ENTITIES($Name_Table,$entities,$value)
			{
			// INSERT INTO table each value
			$REQ = "INSERT INTO " . $Name_Table . " set " . $entities . " = " . $value;
			$RES = $this->PDO->prepare($REQ);
			$RES->execute();
			}	
		}  */
	}
?>