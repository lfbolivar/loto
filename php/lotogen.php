<?php

// When no session is found check to see if the login form is posted
if (isset($_POST['N1']) && 
					($_POST['N2']) && 
					($_POST['N3']) && 
					($_POST['N4']) && 
					($_POST['N5']) &&
					($_POST['N6'])) 
{
  $MsgTitle = "<html><head><title>lotoGen</title></head><center>Lotogen will generate all possible series\n";
	$MsgType = "for numbers:";
    echo nl2br($MsgTitle."\n");
    echo nl2br($MsgType."\n");
//	echo nl2br($MsgType." ".$_POST['N1'].",".$_POST['N2'].",".$_POST['N3'].",".$_POST['N4'].",".$_POST['N5'].",".$_POST['N6'].",".$_POST['N7'].",".$_POST['N8'].",".$_POST['N9'].",".$_POST['N10']."\n");
//	include '/home/lbolivar/public_html/jacobita/JacobeoHdr.html';

 
    if (isset($_POST['N1']))
    {
    	$numbers[0] = $_POST['N1'];
    }
    if (isset($_POST['N2']))
    {
      $numbers[1] = $_POST['N2'];
    }
    if (isset($_POST['N3']))
    {
      $numbers[2] = $_POST['N3'];
    }
    if (isset($_POST['N4']))
    {
      $numbers[3] = $_POST['N4'];
    }
    if (isset($_POST['N5']))
    {
      $numbers[4] = $_POST['N5'];
    }
    if (isset($_POST['N6']))
    {
      $numbers[5] = $_POST['N6'];
    }
    if (isset($_POST['N1']))
    {
      $numbers[6] = $_POST['N7'];
    }
    if (isset($_POST['N1']))
    {
      $numbers[7] = $_POST['N8'];
    }
    if (isset($_POST['N1']))
    {
      $numbers[8] = $_POST['N9'];
    }
    if (isset($_POST['N1']))
    {
      $numbers[9] = $_POST['N10'];
    }

//	echo array_values($numbers);
//	echo nl2br('\n');

    $a = 0;
foreach ($numbers as $number)
{
		$a++;
		echo ($number); 
	  if ($a < count($numbers))
	  {
	  	echo (", ");
	  }
}
echo nl2br("\n"); 
 
$b = 0;
  for ($n1 = 0; $n1 < $a; $n1++)
	{
	  for ($n2 = $n1+1; $n2 < $a; $n2++)
	  {
	    for ($n3 = $n2+1; $n3 < $a; $n3++)
	    {
	    	for ($n4 = $n3+1; $n4 < $a; $n4++)
	    	{
	    		 for ($n5 = $n4+1; $n5 < $a; $n5++)
	    		 {
	    		 	 $b++;
	    		 	 echo nl2br($b." ) ".$numbers[$n1].', '.$numbers[$n2].', '.$numbers[$n3].', '.$numbers[$n4].', '.$numbers[$n5]."\n");
	    		 }
	      }
	    }  
	  }
//	  $a = $n1 + 1;
//		echo ('N'.$a.': '.$numbers[$n1].', '); 
	}
//  echo ($numbers[$n1].', ');    
//	echo nl2br('\n');
//	include '/home/lbolivar/public_html/jacobita/JacobeoFtr.html';
	echo nl2br("<a href='../php/lotogen.php'>Back</a>\n");
  echo nl2br("</html>");
	unset($_POST['lotogen']);
	exit();
} 
else 
{ 
// Refresh the html form
//	include '/home/lbolivar/public_html/jacobita/Jacobeo.html';
//	exit();
	echo nl2br("<html><head><title>lotoGen</title></head><center>");
	if (isset($_POST['lotogen'])){
		echo nl2br("All fields are required and must be entered!\n\n");
	}else{
		echo nl2br("lotoGen will generate all possible series for the given numbers\n(minimum of 6)\n\n");		
	}

?>
<html>
<body BACKGROUND="../loto_background.jpg" BGCOLOR="#FFFFFF" TEXT="#66066" LINK="#000080" VLINK="#000080" alink="#0000FF">
<form name="lotogen" action="lotogen.php" method="post"> 
<table width="500" bgcolor="#660066" cellpadding="0" border="0" colspan="0" cellspacing="0">
	<caption><font color="#66aa88">Mass Cash lotoGen</font></caption>
	<tr>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-1:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-2:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-3:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-4:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-5:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-6:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-7:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-8:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-9:</td>
		<td width="50" bgcolor="#F1F1F9" align="center"><font face="arial,helvetica" size="2">N-10:</td></tr>
	<tr>
		<td width="50" bgcolor="#F1F1F9" align="center"><input type="text" name="N1" size="2" maxlength="2"></td> 
		<td width="50" Bgcolor="#F1F1F9" align="center"><input type="text" name="N2" size="2" maxlength="2"></td>
		<td width="50" bgcolor="#F1F1F9" align="center"><input type="text" name="N3" size="2" maxlength="2"></td> 
		<td width="50" bgcolor="#F1F1F9" align="center"><input type="text" name="N4" size="2" maxlength="2"></td> 
		<td width="50" Bgcolor="#F1F1F9" align="center"><input type="text" name="N5" size="2" maxlength="2"></td>
		<td width="50" bgcolor="#F1F1F9" align="center"><input type="text" name="N6" size="2" maxlength="2"></td> 
		<td width="50" bgcolor="#F1F1F9" align="center"><input type="text" name="N7" size="2" maxlength="2"></td> 
		<td width="50" Bgcolor="#F1F1F9" align="center"><input type="text" name="N8" size="2" maxlength="2"></td>
		<td width="50" bgcolor="#F1F1F9" align="center"><input type="text" name="N9" size="2" maxlength="2"></td> 
		<td width="50" Bgcolor="#F1F1F9" align="center"><input type="text" name="N10" size="2" maxlength="2"></td></tr>
	<tr>
		<td width="50" colspan="1" align="center" bgcolor="#F1F1F9">
		<font face="arial,helvetica" size="2"><input type="submit" name="lotogen"  value="Go" class="button" />
		<td width="450" colspan="9" align="center" bgcolor="#F1F1F9"></td>
		</tr>
		<td width="500" colspan="10" align="left" bgcolor="#F1F1F9">
		<font face="arial,helvetica" size="2">
		<ul>
		<li><a href="../index.html">Home</a></li>
		<li><a href="../php/lotoMyMassCashPicks.php">Add My Picks</a></li>
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
