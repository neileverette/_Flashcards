<?php require_once('Connections/GREWords.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_GREWords, $GREWords);
$query_Word = "SELECT word FROM words";
$Word = mysql_query($query_Word, $GREWords) or die(mysql_error());
$row_Word = mysql_fetch_assoc($Word);
$totalRows_Word = mysql_num_rows($Word);

mysql_select_db($database_GREWords, $GREWords);
$query_All_Words = "SELECT word FROM words ORDER BY word ASC";
$All_Words = mysql_query($query_All_Words, $GREWords) or die(mysql_error());
$row_All_Words = mysql_fetch_assoc($All_Words);
$totalRows_All_Words = mysql_num_rows($All_Words);
?>


<!DOCTYPE HTML>
<html>
<head>
<?php require_once('_inlcudes/header.shtml'); ?>

<title>Words</title>
</head>

<body>
<header><a href="index.php">BACK</a></header>

<!-- CREATES A LOOP FOR LINKS TO ANCHORS A-Z -->
<?php foreach(range('A','Z') as $i) echo " | ".$i; ?>
<table border="1">
  <tr>
    <!--<td>word</td>-->
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Word['word']; ?></td>
    </tr>
    <?php } while ($row_Word = mysql_fetch_assoc($Word)); ?>
</table>
<?php foreach(range('A','Z') as $i) echo "<p>".$i."</p>"; ?>

<a name="A"></a>
<?php require_once('_inlcudes/footer.shtml'); ?>

</body>
</html>
<?php
mysql_free_result($Word);

mysql_free_result($All_Words);
?>
