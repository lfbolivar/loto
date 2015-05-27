<?php
//  Local config allows for dynamic definition of file paths and single point for private paths
include "Config.php";

// Connects to bolitec_loto Database 
//  Include the db connection script from non public_html location
include PRIVATE_DB."dbConfig.php";

// When no session is found check to see if the login form is posted
if (isset ($_POST['p_date']) and
		($_POST['N1']) and
    ($_POST['N2']) and
    ($_POST['N3']) and
    ($_POST['N4']) and
    ($_POST['N5']) )              
//               $_POST['pass'] == $passpass) 
{
  $MsgTitle = "<html><head><title>lotoFind</title></head><center>You have provided the following start date and series\n search from the ".$tbl_name." table...\n";
	$MsgType = "Please ensure correct entry of series";
  echo nl2br($MsgTitle."\n");
//  echo nl2br($MsgType."\n");
  echo nl2br("<table width='350' bgcolor='#660066' cellpadding='0' border='0' colspan='0' cellspacing='0'>");
//	echo nl2br($MsgType." ".$_POST['N1'].",".$_POST['N2'].",".$_POST['N3'].",".$_POST['N4'].",".$_POST['N5'].",".$_POST['N6'].",".$_POST['N7'].",".$_POST['N8'].",".$_POST['N9'].",".$_POST['N10']."\n");
//	include '/home/lbolivar/public_html/jacobita/JacobeoHdr.html';

  $pickdt = $_POST['p_date'];
  $pick_date = strftime("%Y-%m-%d", strtotime("$pickdt"));
  $n1 = $_POST['N1'];
  $n2 = $_POST['N2'];
  $n3 = $_POST['N3'];
  $n4 = $_POST['N4'];
  $n5 = $_POST['N5'];
  $itm = $_POST['itm'];
	echo nl2br($pickdt."\n".$n1.'-'.$n2.'-'.$n3.'-'.$n4.'-'.$n5."\n");
	$sav = array($n1, $n2, $n3, $n4, $n5);
					
	$MyMatches = mysqli_query($link,"select win_date, win_1, win_2, win_3, win_4, win_5 from ".$tbl_name." 
			 				where (win_1 in ($n1,$n2,$n3,$n4,$n5)
			 				      or win_2 in ($n1,$n2,$n3,$n4,$n5)
			 				      or win_3 in ($n1,$n2,$n3,$n4,$n5)
			 				      or win_4 in ($n1,$n2,$n3,$n4,$n5)
			 				     or win_5 in ($n1,$n2,$n3,$n4,$n5)) and win_date >= '$pickdt'") 
							or die('-lotoFindMCwinners.php (select Mass Cash winners info)- '.mysqli_error().'');
		while($getMatches = mysqli_fetch_array( $MyMatches )) 
		{ 
	  // Loop and display each item detail for given member logon
//	  $win_src 	= $getMatches['wintxt'];
		  $win_date    	= $getMatches['win_date'];
		  $win_1    	= $getMatches['win_1'];
		  $win_2      = $getMatches['win_2'];
		  $win_3      = $getMatches['win_3'];
		  $win_4 		  = $getMatches['win_4'];
		  $win_5      = $getMatches['win_5'];
 	
//		if ($win_date != $pick_save and $pick_save != ""){
		if (($itm == "on" and $inthemoney > 2) or $itm != "on"){
					echo nl2br("<tr><td colspan='7' width='350' bgcolor='#F1F1F9' align='center'>\n</td></tr>");
		}
		
		// Initialize background every time we come thru		
//		$col_src = "#F1F1F9";
			$col_date = "#F1F1F9";
			$col_1 = "#F1F1F9";	
			$col_2 = "#F1F1F9";
			$col_3 = "#F1F1F9";
			$col_4 = "#F1F1F9";
			$col_5 = "#F1F1F9";
			
//		if ($win_src == "Wins"){
//			$sav = array($win_1, $win_2, $win_3, $win_4, $win_5);
				//echo nl2br("<td><tr>Array: ".$sav[0]."\n</td></tr>");
				//echo nl2br("<td><tr>$win_src: ".$win_src."\n</td></tr>");
//		}

//		if ($win_src == "Picks"){
			$inthemoney = 0;
			for ($n = 0; $n < 5; $n++){
			if ($win_1 == $sav[$n]){
			    $col_1 = "#66FF33"; 
			    $inthemoney = $inthemoney +1;
			  }
			if ($win_2 == $sav[$n]){
			    $col_2 = "#66FF33"; 
			    $inthemoney = $inthemoney +1;
			  }
			if ($win_3 == $sav[$n]){
			    $col_3 = "#66FF33"; 
			    $inthemoney = $inthemoney +1;
			  }
			if ($win_4 == $sav[$n]){
			    $col_4 = "#66FF33"; 
			    $inthemoney = $inthemoney +1;
			  }
			if ($win_5 == $sav[$n]){
			    $col_5 = "#66FF33"; 
			    $inthemoney = $inthemoney +1;
			  }
			}
//		}
		$pick_save = $win_date;
		//echo nl2br("$itm=".$itm."\n");
		if (($itm == "on" and $inthemoney > 2) or $itm != "on"){
		// echo nl2br($win_src."  ".$win_date."  ".$win_1.'-'.$win_2.'-'.$win_3.'-'.$win_4.'-'.$win_5."\n");
//    echo nl2br("<tr><td width='50' bgcolor='".$col_src."' align='center'><font face='arial,helvetica' size='2'>".$win_src."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_date."' align='center'><font face='arial,helvetica' size='2'>".$win_date."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_1."' align='center'><font face='arial,helvetica' size='2'>".$win_1."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_2."' align='center'><font face='arial,helvetica' size='2'>".$win_2."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_3."' align='center'><font face='arial,helvetica' size='2'>".$win_3."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_4."' align='center'><font face='arial,helvetica' size='2'>".$win_4."\n</font></td>");
		if ($inthemoney > 2){
    	echo nl2br("<td width='50' bgcolor='".$col_5."' align='center'><font face='arial,helvetica' size='2'>".$win_5."\n</font></td>");
    	echo nl2br("<td width='50' bgcolor='#66066' align='center'><font face='arial,helvetica' color='#66FF33' size='2'>$".$inthemoney."x \n</font></td></tr>");
    } else {
    	  echo nl2br("<td width='50' bgcolor='".$col_5."' align='center'><font face='arial,helvetica' size='2'>".$win_5."\n</font></td>");
    		echo nl2br("<td width='50' bgcolor='".$col_date."' align='center'><font face='arial,helvetica' size='2'>\n</font></td></tr>");
		}
	}
	}
  echo nl2br("</table>\n");
	echo nl2br("<a href='../php/lotoFindMCwinners.php'>Back</a>\n");
  echo nl2br("</html>");
	unset($_POST['lotoFind']);
	exit();
}
else 
{ 
// Refresh the html form
//	include '/home/lbolivar/public_html/jacobita/Jacobeo.html';
//	exit();
	echo nl2br("<html><head><title>lotoFind</title></head><center>");
	$today = date('Y-m-d', strtotime('-7 days'));				
	if (isset($_POST['lotoFind'])){
			echo nl2br("Draw date and series are required to process search!\n\n");
		}else{
			echo nl2br("Enter a start date and series to find your winners!\nCheck 'In The Money' to show money winners only (optional)\n\n");			
	}
?>
<body BACKGROUND="../loto_background.jpg" BGCOLOR="#FFFFFF" TEXT="#66066" LINK="#000080" VLINK="#000080" alink="#0000FF">
<form name="lotoFind" action="lotoFindMCwinners.php" method="post"> 
<table width="250" bgcolor="#660066" cellpadding="0" border="0" colspan="0" cellspacing="0">
	<caption><font color="#66aa88">Mass Cash lotoFind</font></caption>
<!--	<tr>
		<td width="125" colspan="3" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">Pass Code:</td>
		<td width="125" colspan="2" bgcolor="#F1F1F9" align="center"><input type="password" name="pass" size="12" maxlength="12"></td> 
	</tr>
		-->
	<tr>
		<td width="125" colspan="3" bgcolor="#F1F1F9" align="right"><font face="arial,helvetica" size="2">Start Date:</font></td>
		<td width="125" colspan="2" bgcolor="#F1F1F9" align="left"><input type="text" name="p_date" size="10" maxlength="10" value="<?php echo ($today)?>"></td> 
	</tr>
	<tr>
		<td width="125" colspan="3" bgcolor="#F1F1F9" align="right"><font face="arial,helvetica" size="2">In The Money:</font></td>
		<td width="125" colspan="2" bgcolor="#F1F1F9" align="lrft"><input type="checkbox" name="itm" value="on" size="1" maxlength="1"></td> 
	</tr>

	<tr>
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
	<tr>
		<td width="50" colspan="1" align="center" bgcolor="#F1F1F9">
		<font face="arial,helvetica" size="2"><input type="submit" name="lotoFind"  value="Go" class="button" />
		<td width="200" colspan="4" align="center" bgcolor="#F1F1F9"></td>
		</tr>
		<td width="250" colspan="5" align="left" bgcolor="#F1F1F9">
		<font face="arial,helvetica" size="2">

		<ul>
		<li><a href="../index.html">Home</a></li>
		<li><a href="../php/lotoMyMassCashPicks.php">Add MyPicks</a></li>
		<li><a href="../php/lotoMassCashWinUpd.php">Add Winners</a></li>
		<li><a href="../php/lotoFindMCwinners.php">Find Winners</a></li>
		<li><a href="../php/lotogen.php">LotoGen</a></li>
		<li><a href="../php/lotoMCanalytics.php">Series Analytics</a></li>
		<li><a href="../php/lotoShowMCwinners.php">Show Winners</a></li>
		</td></tr>
</form>
</table> 
</center>
</html>
<?php
} 
?>