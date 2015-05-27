<?php
//  Local config allows for dynamic definition of file paths and single point for private paths
include "Config.php";

// Connects to bolitec_loto Database 
//  Include the db connection script from non public_html location
include PRIVATE_DB."dbConfig.php";



// When no session is found check to see if the login form is posted
if (isset($_POST['p_date'])&&
              ($_POST['p_draw'])&&
              ($_POST['N1']) &&
              ($_POST['N2']) &&
              ($_POST['N3']) &&
              ($_POST['N4']) &&
              ($_POST['N5']) and              
               $_POST['pass'] == $passpass) 
{
  $MsgTitle = "<html><head><title>lotoAdd</title></head><center>You have entered the following series into the MyMassCashPicks table:";
	$MsgType = "Please ensure correct entry date and series";
  echo nl2br($MsgTitle."\n");
  echo nl2br($MsgType."\n");
//	echo nl2br($MsgType." ".$_POST['N1'].",".$_POST['N2'].",".$_POST['N3'].",".$_POST['N4'].",".$_POST['N5'].",".$_POST['N6'].",".$_POST['N7'].",".$_POST['N8'].",".$_POST['N9'].",".$_POST['N10']."\n");
//	include '/home/lbolivar/public_html/jacobita/JacobeoHdr.html';

  $draw = 0;
  $draw = $_POST['p_draw'];
  echo nl2br($draw." Draws \n");
  for ($n = 0; $n < $draw; $n++)
  {
  	   $pickdt = $_POST['p_date'];
       $pick_date = strftime("%Y-%m-%d", strtotime("$pickdt +$n day"));
       $n1 = $_POST['N1'];
       $n2 = $_POST['N2'];
       $n3 = $_POST['N3'];
       $n4 = $_POST['N4'];
       $n5 = $_POST['N5'];
					
			 if(!mysqli_query($link,"insert into ".$tbl_name2." values
						('$pick_date', $n1,$n2,$n3,$n4,$n5)")) 
			 {
        	$msg1 = "The following error and error# were returned";
					if (mysqli_errno() == 1062)
					{
						// echo mysql_errno().": duplicate key error returned from MySQL";
  					$msg2 = mysqli_errno().": duplicate key error returned from MySQL";
					}
					else
					{
						// echo mysql_errno().": error returned from MySQL";
						$msg2 = mysqli_errno().": error returned from MySQL";
					}
				  echo nl2br($msg1.".".$msg2."\n");
					exit();	
				}
	    	echo nl2br($pick_date."  ".$n1.'-'.$n2.'-'.$n3.'-'.$n4.'-'.$n5."\n");
	}
	echo nl2br("<a href='../php/lotoMyMassCashPicks.php'>Back</a>\n");
	unset($_POST['lotopick']);
	exit();
} 
else 
{ 
// Refresh the html form
//	include '/home/lbolivar/public_html/jacobita/Jacobeo.html';
//	exit();
	echo nl2br("<html><head><title>lotoAdd</title></head><center>");
	$today = date('Y-m-d');				
	if (isset($_POST['lotopick']) && $_POST['pass'] != $passpass){
				echo nl2br("If you are authorized to update loto database\n Please provide Pass Code!\n\n");
		} else {
			echo nl2br("All fields are required to process entry!\n\n");
	}
?>
<body BACKGROUND="../loto_background.jpg" BGCOLOR="#FFFFFF" TEXT="#66066" LINK="#000080" VLINK="#000080" alink="#0000FF">
<form name="lotopick" action="lotoMyMassCashPicks.php" method="post"> 
	<caption><font color="#66aa88">Mass Cash lotoAdd</font></caption>
<table width="250" bgcolor="#660066" cellpadding="0" border="0" colspan="0" cellspacing="0">
	<tr>
		<td width="125" colspan="3" bgcolor="#F1F1F9" align="right"><font face="arial,helvetica" size="2">Pass Code:</td>
		<td width="125" colspan="2" bgcolor="#F1F1F9" align="left"><input type="password" name="pass" size="12" maxlength="12"></td> 
	</tr>
	<tr>
		<td width="125" colspan="3" bgcolor="#F1F1F9" align="right"><font face="arial,helvetica" size="2">Start Date:</td>
		<td width="125" colspan="2" bgcolor="#F1F1F9" align="left"><input type="text" name="p_date" size="10" maxlength="10" value="<?php echo ($today)?>"></td> 
	</tr>
	<tr>
		<td width="125" colspan="3" bgcolor="#F1F1F9" align="right"><font face="arial,helvetica" size="2">Draws:</td>
		<td width="125" colspan="2" bgcolor="#F1F1F9" align="left"><input type="text" name="p_draw" size="5" maxlength="2"></td> 
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
</center>
	<tr>
		<td width="50" colspan="1" align="center" bgcolor="#F1F1F9">
		<font face="arial,helvetica" size="2"><input type="submit" name="lotopick"  value="Go" class="button" /></td>
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
		<li><a href="../php/lotoShowMCwinners.php">Show Winnners</a></li>
		</td></tr>
		
</table> 
</form>
</html>
<?php
} 
?>
