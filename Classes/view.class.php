<?php 
/* DBZ VIEW */
class View 
	{  
    public function __construct () { }
    
    //menu list of table link
    public static function MenuTable ($db_name, $array_table) 
		{
		$menu = "<div>DB : ".$db_name;
		  
		foreach ($array_table as $K => $TABLE) 
			{
			$menu .= " <a href='?T=".$TABLE[0]."'>[ ".strtoupper($TABLE[0])." ]</a>";
			}
		  
		$menu .= "</div>";
		  
		return $menu;
		}
    
    //data table
    public static function DataTable($db_name, $array_data)
		{
		$list = "<a href='?T=".$_GET["T"]."&amp;REQ=DEL_TABLE'>- DELETE TABLE ".strtoupper($_GET["T"])."</a><br>";
		$list .= "<a href='?T=".$_GET["T"]."&amp;REQ=ADD_ENTITIES'>- ADD ENTITIES TO ".strtoupper($_GET["T"])."</a><br>";
		$list .= "<table>"; //open table
		$i = 0; //iteraction counter
		$a = 0;
      
		//get table name
		foreach ($array_data[0] as $key => $value) 
			{
			if($i%2 == 0)
				{
				$list .= "<th>".$key."</th>";
				$titre[$a]=$key;
				$a++;
				}        
			$i++;
			}
		  
		//get table data
		foreach ($array_data as $k => $DATA) 
			{        
			$list .= "<tr>";   //open row     
			for($i = 0; $i < COUNT($DATA)/2; $i++)
				{
				$list .= "<td>".$DATA[$i]."</td>";
				}   
			$list .= "<td><a href='?ID=".$DATA[0]."&amp;PRIMARY=".$titre[0]."&amp;T=".$_GET["T"]."&amp;REQ=UPDATE_DATA'><img src='./Fichiers/images/modifier.png'></a></td>"; 
			$list .= "<td><a href='?ID=".$DATA[0]."&amp;PRIMARY=".$titre[0]."&amp;T=".$_GET["T"]."&amp;REQ=DEL_DATA'><img src='./Fichiers/images/supprimer.png'></a></td>";   
			$list .= "</tr>"; // close row
			}      
		$list .= "</table>";  //close table  
		return $list;      
		}   
		
	public static function DeleteTable ($db_name, $array_data)
		{
			
		}
    
    //html final rendering
    public static function HTML ($title, $contener) 
		{
		echo "<html>
				<head>
					<title>".$title."</title>
					<link rel='stylesheet' type='text/css' href='Fichiers/css/style.css' />
				</head>
				<body>
					<img src='Fichiers/images/logo.jpg' height='80'/><br />
					<p>TODO: You must reload the page to see the changes.</p><br />
					<p>TODO: ADD/MODIFY ENTITIES are not functionnal, only form it working.</p><hr />
					</hr>".$contener."
				</body>
			</html>";
		}

	public static function DEL_TABLE() 
		{
	      echo "La table a bien été supprimée ";
	    }

    public static function DEL_DATA() 
		{
       echo "La ligne a bien été supprimée ";
    	}

    public static function MOD_ENTITIES($db_name, $array_data) 
		{
		$form = "<form method='POST' action='model.class.php'>";
		$i = 0; //iteraction counter
		$a = 0;

		foreach ($array_data[0] as $key => $value) 
			{
			if($i%2 == 0)
				{
				$form .= $key;
				$form .= "<input type='text' name='".$key."'' value='".$value."'>";
				}        
			$i++;
			}    
		$form .= "<input type='submit' name='sendmodify' value='send'>";
		$form .= "</form>";

		return $form;
        }  

    public static function ADD_ENTITIES($db_name, $array_data) 
		{
		$form = "<form method='POST' action='model.class.php'>";
		$i = 0; //iteraction counter
		$a = 0;

		foreach ($array_data[0] as $key => $value) 
			{
			if($i%2 == 0)
				{
				$form .= $key;
				$form .= "<input type='text' name='".$key."'>";
				}        
			$i++;
			}    
		$form .= "<input type='submit' name='sendadd' value='send'>";
		$form .= "</form>";

		return $form;
    	} 
    
	}
?>