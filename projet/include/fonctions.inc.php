<?php
	function tableM($N = 10)
	{
		echo "<table>
			<thead>
				<tr>
					<th>X</th>";
					
						for($i = 1 ; $i <= $N ; $i++)
						{
							echo "<th>$i</th>";
						}
					
				echo "</tr>
			</thead>
			<tbody>";
			
					for($i = 1 ; $i <= $N ; $i++)
					{
						echo "<tr><th>$i</th>";
						
						for($j = 1 ; $j <= $N ; $j++)
						{								
							echo "<td>" . $i * $j . "</td>";
						}
						
						echo "</tr>";
					}	
			echo "</tbody>	
		</table>	";
	}
		
	function basesNum($N = 17)
	{
		echo"<table>
			<thead>
				<tr>
					<th>Binaire</th><th>Octal</th><th>Décimal</th><th>Hexadécimal</th>
				</tr>
			</thead>
			<tbody>";
					for($i = 0 ; $i <= $N ; $i++)
					{
						echo "<tr><td>";
						printf("%08b", $i);
						echo "</td><td>";
						printf("%02o", $i);
						echo "</td><td>";
						printf("%02d", $i);
						echo "</td><td>";
						printf("%02X", $i);
						echo "</td></tr>";
					}
			echo "</tbody>	
		</table>";
	}
	
	function tableASCII()
	{
		echo "<table>
						<thead>
							<tr>
								<th> </th>";
									for($i = 0 ; $i < 16 ; $i++)
									{
										echo "<th>";
										printf("%2X", $i);
										echo "</th>";
									}
								

							echo "</tr>
						</thead>
						<tbody>";
								for($j = 2 ; $j <= 7 ; $j++)
								{
									echo "<tr><th>";
									printf("%d", $j);
									echo "</th>";
									
									for($k = 0 ; $k < 16 ; $k++) 
									{
										$val = hexdec($j.dechex($k));
										
										if($val > 47 AND $val < 58)
											echo "<td class=\"chiffre\">";
										else if($val > 64 AND $val < 91)
											echo "<td class=\"majuscules\">";
										else if($val > 96 AND $val < 123)
											echo "<td class=\"minuscules\">";
										else
											echo "<td>";
										
										printf("%s", chr($val));
										echo "</td>";
									}
									echo "</tr>";
								}	
		
						echo "</tbody>	
					</table>	";
	}	
	
	
	function palette()
	{
		printf("\n\t\t\t\t\t");
		echo "<table>";							
		
		for($i = 0 ; $i < 16 ; $i+=3) 
		{
			for($j = 0 ; $j < 16 ; $j+=3)
			{
				printf("\n\t\t\t\t\t\t");
				if($j % 2 == 0)
					echo "<tr>";
				for($k = 0 ; $k < 16 ; $k+=3)
				{
					printf("\n\t\t\t\t\t\t\t");
					echo '<td style="background-color: ';
					printf("#%X%X%X%X%X%X", $i, $i, $j, $j, $k, $k);
					if(($i + $j + $k) < 16)
						echo "; color: white";
					echo '">';
					printf("#%X%X%X%X%X%X", $i, $i, $j, $j, $k, $k);
					echo '</td>';
				}
				printf("\n\t\t\t\t\t\t");
				if($j % 2 == 1)
					echo "</tr>";
			}
			 
		}		
		printf("\n\t\t\t\t\t");
		echo "</table>";		
	}
	
	function systemeSolaire($aff = "l") 
	{
		$str = "";
		$planetes = array("Mercure", "Venus", "Terre", "Mars", "Jupiter", "Saturne", "Uranus", "Neptune");
		
		$str .= "<table>\n";
		$str .= "\t<tr>\n";
		
		foreach($planetes as $nom)
		{
			if($aff == "c")
				$str .= "\t\t<tr><td>$nom</td></tr>\n";
			else
				$str .= "\t\t<td>$nom</td>\n";
			
		}
		
		$str .= "\t</tr>\n";
		$str .= "</table>\n";
		
		return $str;
		
		
	}
						
					
	define("MAX", "17");
	
	function basesNumMax($N = 17)
	{
		$N > MAX ? $N = MAX : $N = $N;
		echo"<table>
			<thead>
				<tr>
					<th>Binaire</th><th>Octal</th><th>Décimal</th><th>Hexadécimal</th>
				</tr>
			</thead>
			<tbody>";
					for($i = 0 ; $i <= $N ; $i++)
					{
						echo "<tr><td>";
						printf("%08b", $i);
						echo "</td><td>";
						printf("%02o", $i);
						echo "</td><td>";
						printf("%02d", $i);
						echo "</td><td>";
						printf("%02X", $i);
						echo "</td></tr>";
					}
			echo "</tbody>	
		</table>";
	}
						
	
	
?>	