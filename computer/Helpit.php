<?php require_once('Connections/myconnect.php'); ?>
<?php
mySql_query("SET NAMES UTF8");
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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_myconnect, $myconnect);
$query_Recordset1 = "SELECT * FROM helpwork";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $myconnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p align="center">||| รายการแจ้งปัญหา / งานซ่อม |||</p>
<p align="center"><a href="Add.php">+แจ้งปัญหา/งานซ่อม</a></p>
<div align="center">
  <table border="1">
    <tr>
      <td width="100">#</td>
      <td width="115">วันที่แจ้ง</td>
      <td width="121">ชื่อ-นามสกุล</td>
      <td width="137">ชื่ออุปกรณ์</td>
      <td width="121">ปัญหา/งาน</td>
      <td width="137">สาเหตุ/วิธีกสรแก้ปัญหา</td>
      <td width="114">ดูดำเนินการ</td>
      <td width="123">สถานะ</td>
      <td width="50">&nbsp;</td>
      <td width="48">&nbsp;</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['id']; ?></td>
        <td><?php echo $row_Recordset1['date']; ?></td>
        <td><?php echo $row_Recordset1['name']; ?></td>
        <td><?php echo $row_Recordset1['nameop']; ?></td>
        <td><?php echo $row_Recordset1['work']; ?></td>
        <td><?php echo $row_Recordset1['edit']; ?></td>
        <td><?php echo $row_Recordset1['wait']; ?></td>
        <td><?php echo $row_Recordset1['status']; ?></td>
        <td><a href="edit.php?<?php echo $row_Recordset1['id']; ?>=<?php echo $row_Recordset1['id']; ?>">Update</a></td>
        <td><a href="delete.php?<?php echo $row_Recordset1['id']; ?>=<?php echo $row_Recordset1['id']; ?>">Delete</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
