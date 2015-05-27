<?php
//  Local config allows for dynamic definition of file paths and single point for private paths
include "Config.php";

// Connects to bolitec_loto Database 
//  Include the db connection script from non public_html location
include PRIVATE_DB."dbConfig.php";



// When no session is found check to see if the login form is posted
if (isset($_POST['lotoanaly'])) {

	$pickdt = $_POST['p_date'];
	$today = date('Y-m-d');
  $pick_save = "";
  echo nl2br("<html><head><title>lotoAnaly</title></head><center><body BACKGROUND='../loto_background.jpg' BGCOLOR='#FFFFFF' TEXT='#66066' LINK='#000080' VLINK='#000080' alink='#0000FF'>\n");
  $MsgTitle = "The following are analytical reports of the winning MassCash winners since\n$pickdt";
	$MsgType = "This first report shows winners total counts by column.\n";
  echo nl2br($MsgTitle."\n\n");
  echo nl2br($MsgType."\n");
  echo nl2br("<table width='350' bgcolor='#660066' cellpadding='0' border='0' colspan='0' cellspacing='0'>");


// init color background
			$col_src = "#F1F1F9";
			$col_date = "#F1F1F9";
			$col_1 = "#F1F1F9";
			$col_2 = "#F1F1F9";
			$col_3 = "#F1F1F9";
			$col_4 = "#F1F1F9";
			$col_5 = "#F1F1F9";
					
  $c1 = 0;
  $c2 = 0;
  $c3 = 0;
  $c4 = 0;
  $c5 = 0;
  $tot_1= $tot_2= $tot_3= $tot_4= $tot_5= $tot_6= $tot_7 = 0;
  $tot_8= $tot_9= $tot_10= $tot_11= $tot_12= $tot_13= $tot_14 = 0;
  $tot_15= $tot_16= $tot_17= $tot_18= $tot_19= $tot_20= $tot_21 = 0;
  $tot_22= $tot_23= $tot_24= $tot_25= $tot_26= $tot_27= $tot_28 = 0;
  $tot_29= $tot_30= $tot_31= $tot_32= $tot_33= $tot_34= $tot_35 = 0;
  $colwin = mysqli_query($link, "SELECT 'c1' as col,win_1, count(*) FROM ".$tbl_name." WHERE win_date >= '$pickdt' group by 1,2 
																		union all
																	 SELECT 'c2',win_2, count(*) FROM ".$tbl_name." WHERE win_date >= '$pickdt' group by 1,2
																	 	union all
																	 SELECT 'c3',win_3, count(*) FROM ".$tbl_name." WHERE win_date >= '$pickdt' group by 1,2 
																		union all
																	 SELECT 'c4',win_4, count(*) FROM ".$tbl_name." WHERE win_date >= '$pickdt' group by 1,2								
																		union all
																	 SELECT 'c5',win_5, count(*) FROM ".$tbl_name." WHERE win_date >= '$pickdt' group by 1,2
																	 order by 2,1								
																	 ")
												or die('-lotoMCanalytics.php (select Mass Cash analytics info)- '.mysqli_error().'');

  echo nl2br("<caption><font color='#66aa88'>MassCash Totals By Column</font></caption>\n");
	while($getcolwin = mysqli_fetch_array( $colwin )) 
	{ 
	  // Loop and display each item detail for given member logon
	  $col 	= $getcolwin['col'];
	  //$win_date    	= $getMatches['win_date'];
	  $win    	= $getcolwin['win_1'];
	  $cnt      = $getcolwin['count(*)'];
	  //$win_3      = $getMatches['win_3'];
	  //$win_4 		  = $getMatches['win_4'];
	  //$win_5      = $getMatches['win_5'];
 	
//		if ($win_date != $pick_save and $pick_save != ""){
//			echo nl2br("<tr><td colspan='7' width='350' bgcolor='#F1F1F9' align='center'>\n</td></tr>");
//		}
		
		// Initialize background every time we come thru		
		$col_src = "#F1F1F9";
		$col_font = "#66066";
		$col_date = "#F1F1F9";
		$col_1 = "#F1F1F9";
		$col_2 = "#F1F1F9";
		$col_3 = "#F1F1F9";
		$col_4 = "#F1F1F9";
		$col_5 = "#F1F1F9";
			
//		if ($win_src == "Wins"){
//				$sav = array($win_1, $win_2, $win_3, $win_4, $win_5);
//				//echo nl2br("<td><tr>Array: ".$sav[0]."\n</td></tr>");
//				//echo nl2br("<td><tr>$win_src: ".$win_src."\n</td></tr>");
//		}

//		if ($win_src == "Picks"){
//			$col_src = "#66066";
//			$col_font = "#66FF33";
//		for ($n = 0; $n < 5; $n++){
			if ($col == 'c1'){
//			    $win_1 = $col."-".$win."-".$cnt;
			    $c1=$c1+1; 			  
			    }
			if ($col == 'c2'){
//			    $win_2 = $col."-".$win."-".$cnt;
			    $c2=$c2+1; 			  
			  }
			if ($col == 'c3'){
//			    $win_3 = $col."-".$win."-".$cnt;
			    $c3=$c3+1; 			  
			  }
			if ($col == 'c4'){
//			    $win_4 = $col."-".$win."-".$cnt;
			    $c4=$c4+1; 			  
			  }
			if ($col == 'c5'){
//			    $win_5 = $col."-".$win."-".$cnt;
			    $c5=$c5+1; 			  
			  }
//			}
//	}

	  if (($c1>1 or $c2>1 or $c3>1 or $c4>1 or $c5>1) or
	  		($c1>1 and $c2==0 and $c3==0 and $c4==0 and $c5==0) or
	  		(($c1>1 or $c2>1) and $c3==0 and $c4==0 and $c5==0) or
	  		(($c1>1 or $c2>1 or $c3>1) and $c4==0 and $c5==0) or
	  		(($c1>1 or $c2>1 or $c3>1 or $c4>1) and $c5==0)  ){
	  	if ($c1>0){
	  		$c1 = $c1 -1;
	  	}
	  	if ($c2>0){
		  	$c2 = $c2-1;
		  }
		  if($c3>0){
		  	$c3 =  $c3-1;
		  }
		  if($c4>0){
		  	$c4 =  $c4-1;
		  }
	  	if($c5>0){
		  	$c5 =  $c5-1;
		  }

		$pick_save = $win_date;
		// echo nl2br($win_src."  ".$win_date."  ".$win_1.'-'.$win_2.'-'.$win_3.'-'.$win_4.'-'.$win_5."\n");
//    echo nl2br("<tr><td width='50' bgcolor='".$col_src."' align='center'><font color='".$col_font."' face='arial,helvetica' size='2'>".$win_src."\n</font></td>");
//    echo nl2br("<td width='50' bgcolor='".$col_date."' align='center'><font face='arial,helvetica' size='2'>".$win_date."\n</font></td>");
    echo nl2br("<td><td width='70' bgcolor='".$col_1."' align='left'><font face='arial,helvetica' size='2'>".$win_1."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_2."' align='left'><font face='arial,helvetica' size='2'>".$win_2."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_3."' align='left'><font face='arial,helvetica' size='2'>".$win_3."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_4."' align='left'><font face='arial,helvetica' size='2'>".$win_4."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_5."' align='left'><font face='arial,helvetica' size='2'>".$win_5."\n</font></td></tr>");

		$win_1 ="";
		$win_2 ="";
		$win_3 ="";
		$win_4 ="";
		$win_5 ="";

		}
	//  Do a switch test to load display variable.
		switch ($col){
//			if ($col == 'c1'){
			case 'c1':
			    $win_1 = "N".$win."=".$cnt;
//			    $c1=$c1+1; 
					break;			  
//			    }
//			if ($col == 'c2'){
			case 'c2':
			    $win_2 = "N".$win."=".$cnt;
//			    $c2=$c2+1; 			  
					break;			  
//			  }
//			if ($col == 'c3'){
			case 'c3':
			    $win_3 = "N".$win."=".$cnt;
//			    $c3=$c3+1; 			  
					break;			  
//			  }
//			if ($col == 'c4'){
			case 'c4':
			    $win_4 = "N".$win."=".$cnt;
//			    $c4=$c4+1; 			  
					break;			  
//			  }
			case 'c5':
//			if ($col == 'c5'){
			    $win_5 = "N".$win."=".$cnt;
//			    $c5=$c5+1; 			  
					break;			  
		}
		$sav_1 = $win_1;
		$sav_2 = $win_2;
		$sav_3 = $win_3;
		$sav_4 = $win_4;
		$sav_5 = $win_5;

	//  Do a switch test to load totals by number.
		switch ($win){
			case '1':
			    $tot_1 = $tot_1 + $cnt;
					break;			  
			case '2':
			    $tot_2 = $tot_2 + $cnt;
					break;			  
			case '3':
			    $tot_3 = $tot_3 + $cnt;
					break;			  
			case '4':
			    $tot_4 = $tot_4 + $cnt;
					break;			  
			case '5':
			    $tot_5 = $tot_5 + $cnt;
					break;			  
			case '6':
			    $tot_6 = $tot_6 + $cnt;
					break;			  
			case '7':
			    $tot_7 = $tot_7 + $cnt;
					break;			  
			case '8':
			    $tot_8 = $tot_8 + $cnt;
					break;			  
			case '9':
			    $tot_9 = $tot_9 + $cnt;
					break;			  
			case '10':
			    $tot_10 = $tot_10 + $cnt;
					break;			  
			case '11':
			    $tot_11 = $tot_11 + $cnt;
					break;			  
			case '12':
			    $tot_12 = $tot_12 + $cnt;
					break;			  
			case '13':
			    $tot_13 = $tot_13 + $cnt;
					break;			  
			case '14':
			    $tot_14 = $tot_14 + $cnt;
					break;			  
			case '15':
			    $tot_15 = $tot_15 + $cnt;
					break;			  
			case '16':
			    $tot_16 = $tot_16 + $cnt;
					break;			  
			case '17':
			    $tot_17 = $tot_17 + $cnt;
					break;			  
			case '18':
			    $tot_18 = $tot_18 + $cnt;
					break;			  
			case '19':
			    $tot_19 = $tot_19 + $cnt;
					break;			  
			case '20':
			    $tot_20 = $tot_20 + $cnt;
					break;			  
			case '21':
			    $tot_21 = $tot_21 + $cnt;
					break;			  
			case '22':
			    $tot_22 = $tot_22 + $cnt;
					break;			  
			case '23':
			    $tot_23 = $tot_23 + $cnt;
					break;			  
			case '24':
			    $tot_24 = $tot_24 + $cnt;
					break;			  
			case '25':
			    $tot_25 = $tot_25 + $cnt;
					break;			  
			case '26':
			    $tot_26 = $tot_26 + $cnt;
					break;			  
			case '27':
			    $tot_27 = $tot_27 + $cnt;
					break;			  
			case '28':
			    $tot_28 = $tot_28 + $cnt;
					break;			  
			case '29':
			    $tot_29 = $tot_29 + $cnt;
					break;			  
			case '30':
			    $tot_30 = $tot_30 + $cnt;
					break;			  
			case '31':
			    $tot_31 = $tot_31 + $cnt;
					break;			  
			case '32':
			    $tot_32 = $tot_32 + $cnt;
					break;			  
			case '33':
			    $tot_33 = $tot_33 + $cnt;
					break;			  
			case '34':
			    $tot_34 = $tot_34 + $cnt;
					break;			  
			case '35':
			    $tot_35 = $tot_35 + $cnt;
					break;			  
			  }

	}
//Flush last row to print from loop above.
    echo nl2br("<td><td width='70' bgcolor='".$col_1."' align='left'><font face='arial,helvetica' size='2'>".$sav_1."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_2."' align='left'><font face='arial,helvetica' size='2'>".$sav_2."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_3."' align='left'><font face='arial,helvetica' size='2'>".$sav_3."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_4."' align='left'><font face='arial,helvetica' size='2'>".$sav_4."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_5."' align='left'><font face='arial,helvetica' size='2'>".$sav_5."\n</font></td></tr>");


  $row = array(	array($tot_1, $tot_8, $tot_15, $tot_22, $tot_29),
               	array($tot_2, $tot_9, $tot_16, $tot_23, $tot_30),
  							array($tot_3, $tot_10,$tot_17, $tot_24, $tot_31),
  							array($tot_4, $tot_11,$tot_18, $tot_25, $tot_32),
  							array($tot_5, $tot_12,$tot_19, $tot_26, $tot_33),
  							array($tot_6, $tot_13,$tot_20, $tot_27, $tot_34),
  							array($tot_7, $tot_14,$tot_21, $tot_28, $tot_35));
  echo nl2br("</table><table width='350' bgcolor='#660066' cellpadding='0' border='0' colspan='0' cellspacing='0'>\n");
  echo nl2br("<caption><font color='#66aa88'>MassCash Totals By Winning Number</font></caption>\n");
  //echo nl2br("<td>".$row[0][2]."</td>\n");
	//echo nl2br("<td width='50' bgcolor='".$col_1."' align='left'><font face='arial,helvetica' size='2'>N3=".$row[0][2]."\n</font></td>");


	//$sort= array("Nbr" => "0Count");
	for ($n = 0; $n < 7; $n++){
    echo nl2br("<tr><td width='70' bgcolor='".$col_1."' align='right'><font face='arial,helvetica' size='2'>N".($n+1)."=".$row[$n][0]."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_2."' align='right'><font face='arial,helvetica' size='2'>N".($n+8)."=".$row[$n][1]."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_3."' align='right'><font face='arial,helvetica' size='2'>N".($n+15)."=".$row[$n][2]."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_4."' align='right'><font face='arial,helvetica' size='2'>N".($n+22)."=".$row[$n][3]."\n</font></td>");
    echo nl2br("<td width='70' bgcolor='".$col_5."' align='right'><font face='arial,helvetica' size='2'>N".($n+29)."=".$row[$n][4]."\n</font></td></tr>");
		$sort[$n+1]= $row[$n][0];
		$sort[$n+8]= $row[$n][1];
		$sort[$n+15]= $row[$n][2];
		$sort[$n+22]= $row[$n][3];
		$sort[$n+29]= $row[$n][4];
	}

  echo nl2br("</table><table width='350' bgcolor='#660066' cellpadding='0' border='0' colspan='0' cellspacing='0'>\n\n");
	echo nl2br("<caption><font color='#66aa88'>MassCash Totals in Descending Sort</font></caption><td>\n");
	$t = 1;
	arsort($sort);
  foreach ($sort as $s => $sv ){
  	echo nl2br("<td width='70' bgcolor='".$col_1."' align='right'><font face='arial,helvetica' size='2'>N".$s."=".$sv."</font></td>");
  	if ($t > 4){
  		echo nl2br("</tr><td>");
  		$t = 0;
  	}
  	$t= $t + 1;
  }
  echo nl2br("</tr></table>\n<a href='../php/lotoMCanalytics.php'>Back</a>\n");
  echo nl2br("</html>");
	unset($_POST['lotoanaly']);
	exit();
} 
else 
{ 
// Refresh the html form
//	include '/home/lbolivar/public_html/jacobita/Jacobeo.html';
//	exit();
	echo nl2br("<html><head><title>lotoAnaly</title></head><center>");
	if (! isset($_POST['lotoanaly'])){
				echo nl2br("Welcome to the lotoAnalytics tool for Mass Cash Lottery!\n\n");
				$today = date('Y-m-d', strtotime('-7 days'));				
		} else {
			echo nl2br("All fields are required and must be entered!\n");
	}
?>

<body BACKGROUND="../loto_background.jpg" BGCOLOR="#FFFFFF" TEXT="#66066" LINK="#000080" VLINK="#000080" alink="#0000FF">
<form name="lotoanaly" action="lotoMCanalytics.php" method="post"> 

<table width="250" bgcolor="#660066" cellpadding="0" border="0" colspan="0" cellspacing="0">
	<caption><font color="#66aa88">Mass Cash lotoAnaly</font></caption>
	<tr>
		<td width="125" colspan="3" bgcolor="#F1F1F9" align="right"><font face="arial,helvetica" size="2">Start Date:</td>
		<td width="125" colspan="2" bgcolor="#F1F1F9" align="left"><input type="text" name="p_date" size="10" maxlength="10" value="<?php echo ($today)?>"></td> 
	</tr>

<!--	<tr>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-1:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-2:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-3:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-4:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-5:</td>
  </tr>
	<tr>
		<td width="50" bgcolor="#F1F1F9" align="center"><input type="text" name="N1" size="2" maxlength="2"></td> 
		<td width="50" Bgcolor="#F1F1F9" align="center"><input type="text" name="N2" size="2" maxlength="2"></td>
		<td width="50" bgcolor="#F1F1F9" align="center"><input type="text" name="N3" size="2" maxlength="2"></td> 
		<td width="50" bgcolor="#F1F1F9" align="center"><input type="text" name="N4" size="2" maxlength="2"></td> 
		<td width="50" Bgcolor="#F1F1F9" align="center"><input type="text" name="N5" size="2" maxlength="2"></td>
  </tr>  
  -->
	<tr>
		<td width="50" colspan="1" align="center" bgcolor="#F1F1F9">
		<font face="arial,helvetica" size="2"><input type="submit" name="lotoanaly"  value="Go" class="button" />
		<td width="200" colspan="4" align="center" bgcolor="#F1F1F9"></td>
		</tr>
		<td width="250" colspan="5" align="left" bgcolor="#F1F1F9">
		<font face="arial,helvetica" size="2">
	
	
		<ul>
		<li><a href="../index.html">Home</a></li>
		<li><a href="../php/lotoMyMassCashPicks.php">Add My Picks</a></li>
		<li><a href="../php/lotoMassCashWinUpd.php">Add Winners</a></li>
		<li><a href="../php/lotoFindMCwinners.php">Find Winners</a></li>
		<li><a href="../php/lotogen.php">LotoGen</a></li>
		<li><a href="../php/lotoMCanalytics.php">Series Analytics</a></li>
		<li><a href="../php/lotoShowMCwinners.php">Show Winners</a></li>
	</ul>	</td></tr>

</form>
</table> 
</center>
</html>
<?php
} 
?>
