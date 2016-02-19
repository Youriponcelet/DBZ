<?php 

/* DBZ FRONTAL CONTROLLER
** MVC CMS for database management */

// configuration
require_once("Config/config.script.php");

// connexion db
require_once("Classes/pdo.connexion.class.php");
$PDO = new Pdo_Connexion ($CONFIG['DB_INI_FILE']);

// model class
require_once("Classes/model.class.php");
$MODEL = new Model ($PDO->CNX);

// view class
require_once("Classes/view.class.php");

// html output increment
$OUTPUT = NULL;

// set the menu based on tables
$OUTPUT .= View::MenuTable ($MODEL->Name_DB(), $MODEL->List_Table());

// User click on a table
if(isset($_GET['T']))
	{
	$OUTPUT .= View::DataTable($MODEL->Name_DB(), $MODEL->EntitiesTable($_GET['T']));
	}

if(isset($_GET['REQ'])) 
	{
	if ($_GET['REQ'] == 'DEL_TABLE') //DELETE A TABLE
		{
		$OUTPUT .= View::DEL_TABLE($MODEL->DeleteTable($_GET['T']));
		}
	else if ($_GET['REQ'] == 'DEL_DATA') // DELETE A VALUE
		{
		$OUTPUT .= View::DEL_DATA($MODEL->DeleteData($_GET['T'], $_GET['PRIMARY'], $_GET['ID']));
		}
	else if ($_GET['REQ'] == 'UPDATE_DATA') // UPDATE AN ENTITIES
		{
		$OUTPUT .= View::MOD_ENTITIES($MODEL->Name_DB(), $MODEL->EntitiesTable($_GET['T']));
		}
	else if ($_GET['REQ'] == 'ADD_ENTITIES') // ADD AN ENTITIES
		{
		$OUTPUT .= View::ADD_ENTITIES($MODEL->Name_DB(), $MODEL->EntitiesTable($_GET['T']));
		}
	}



// output echo screen rendering 
View::HTML($CONFIG['MODULE_NAME'], $OUTPUT);

?>
