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
		$list = "<table>"; //open table
		$i = 0; //iteraction counter
      
		//get table name
		foreach ($array_data[0] as $key => $value) 
			{
			if($i%2 == 0)
				{
				$list .= "<th>".$key."</th>";
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
					<img src='Fichiers/images/logo.jpg' height='80'/><br /><hr />
					</hr>".$contener."
				</body>
			</html>";
		}
    
	}
?>