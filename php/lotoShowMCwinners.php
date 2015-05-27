<?php
//  Local config allows for dynamic definition of file paths and single point for private paths
include "Config.php";

// Connects to bolitec_loto Database 
//  Include the db connection script from non public_html location
include PRIVATE_DB."dbConfig.php";

// When no session is found check to see if the login form is posted
if (isset($_POST['lotoshow'])) {

	$pickdt = $_POST['p_date'];
	$today = date('Y-m-d');
  $pick_save = "";
  echo nl2br("<html><head><title>lotoShow</title></head><center><body BACKGROUND='../loto_background.jpg' BGCOLOR='#FFFFFF' TEXT='#66066' LINK='#000080' VLINK='#000080' alink='#0000FF'>\n");
  $MsgTitle = "Below are your picks and winning series since\n$pickdt";
	$MsgType = "Your winners are highlighted in green.\n";
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
					
  $MyMatches = mysqli_query($link, "SELECT 'Wins' as wintxt,win_date, win_1, win_2, win_3, win_4, win_5 FROM ".$tbl_name." WHERE win_date >= '$pickdt' 
  		                                  union all 
  		                                  select 'Picks', pick_date, pick_1, pick_2, pick_3, pick_4, pick_5 from ".$tbl_name2." 
  		                                  inner join ".$tbl_name." on win_date = pick_date
  		                                  where pick_date >= '$pickdt' and pick_date <= '$today' order by win_date, wintxt desc") 
								or die('-lotoShowMCwinners.php (select Mass Cash winners info)- '.mysqli_error().'');
	while($getMatches = mysqli_fetch_array( $MyMatches )) 
	{ 
	  // Loop and display each item detail for given member logon
	  $win_src 	= $getMatches['wintxt'];
	  $win_date    	= $getMatches['win_date'];
	  $win_1    	= $getMatches['win_1'];
	  $win_2      = $getMatches['win_2'];
	  $win_3      = $getMatches['win_3'];
	  $win_4 		  = $getMatches['win_4'];
	  $win_5      = $getMatches['win_5'];
 	
		if ($win_date != $pick_save and $pick_save != ""){
			echo nl2br("<tr><td colspan='7' width='350' bgcolor='#F1F1F9' align='center'>\n</td></tr>");
		}
		
		// Initialize background every time we come thru		
		$col_src = "#F1F1F9";
		$col_font = "#66066";
		$col_date = "#F1F1F9";
		$col_1 = "#F1F1F9";
		$col_2 = "#F1F1F9";
		$col_3 = "#F1F1F9";
		$col_4 = "#F1F1F9";
		$col_5 = "#F1F1F9";
			
		if ($win_src == "Wins"){
				$sav = array($win_1, $win_2, $win_3, $win_4, $win_5);
				//echo nl2br("<td><tr>Array: ".$sav[0]."\n</td></tr>");
				//echo nl2br("<td><tr>$win_src: ".$win_src."\n</td></tr>");
		}

		if ($win_src == "Picks"){
			$col_src = "#66066";
			$col_font = "#66FF33";
		for ($n = 0; $n < 5; $n++){
			if ($sav[$n] == $win_1){
			    $col_1 = "#66FF33"; 
			  }
			if ($sav[$n] == $win_2){
			    $col_2 = "#66FF33"; 
			  }
			if ($sav[$n] == $win_3){
			    $col_3 = "#66FF33"; 
			  }
			if ($sav[$n] == $win_4){
			    $col_4 = "#66FF33"; 
			  }
			if ($sav[$n] == $win_5){
			    $col_5 = "#66FF33"; 
			  }
			}
		}
		$pick_save = $win_date;
		// echo nl2br($win_src."  ".$win_date."  ".$win_1.'-'.$win_2.'-'.$win_3.'-'.$win_4.'-'.$win_5."\n");
    echo nl2br("<tr><td width='50' bgcolor='".$col_src."' align='center'><font color='".$col_font."' face='arial,helvetica' size='2'>".$win_src."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_date."' align='center'><font face='arial,helvetica' size='2'>".$win_date."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_1."' align='center'><font face='arial,helvetica' size='2'>".$win_1."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_2."' align='center'><font face='arial,helvetica' size='2'>".$win_2."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_3."' align='center'><font face='arial,helvetica' size='2'>".$win_3."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_4."' align='center'><font face='arial,helvetica' size='2'>".$win_4."\n</font></td>");
    echo nl2br("<td width='50' bgcolor='".$col_5."' align='center'><font face='arial,helvetica' size='2'>".$win_5."\n</font></td></tr>");

	}
  echo nl2br("</table>\n");
	echo nl2br("<a href='../php/lotoShowMCwinners.php'>Back</a>\n");
  echo nl2br("</html>");
	unset($_POST['lotoshow']);
	exit();
} 
else 
{ 
// Refresh the html form
//	include '/home/lbolivar/public_html/jacobita/Jacobeo.html';
//	exit();
	echo nl2br("<html><head><title>lotoShow</title></head><center>");
	if (! isset($_POST['lotoshow'])){
				echo nl2br("Welcome to the lotoApp for Mass Cash Lottery!\n\n");
				$today = date('Y-m-d', strtotime('-7 days'));				
		} else {
			echo nl2br("All fields are required and must be entered!\n");
	}
?>

<body BACKGROUND="../loto_background.jpg" BGCOLOR="#FFFFFF" TEXT="#66066" LINK="#000080" VLINK="#000080" alink="#0000FF">
<form name="lotoshow" action="lotoShowMCwinners.php" method="post"> 

<table width="250" bgcolor="#660066" cellpadding="0" border="0" colspan="0" cellspacing="0">
	<caption><font color="#66aa88">Mass Cash lotoShow</font></caption>
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
		<font face="arial,helvetica" size="2"><input type="submit" name="lotoshow"  value="Go" class="button" />
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
