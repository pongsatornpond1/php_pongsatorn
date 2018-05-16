<?php require_once('Connections/myconnect.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO helpwork (`date`, nameop, `work`, `number`) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['date'], "text"),
                       GetSQLValueString($_POST['nameop'], "text"),
                       GetSQLValueString($_POST['work'], "text"),
                       GetSQLValueString($_POST['number'], "text"));

  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($insertSQL, $myconnect) or die(mysql_error());

  $insertGoTo = "Helpit.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p align="center">บันทึกข้อมูลการแจ้งปัญหา / งานซ่อม</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <div align="center">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">วันที่แจ้ง:</td>
        <td><input type="text" name="date" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">ชื่ออุปกรณ์:</td>
        <td><input type="text" name="nameop" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">ปัญหา/งาน:</td>
        <td><input type="text" name="work" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">เบอร์ติดต่อ</td>
        <td><input type="text" name="number" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><div align="center">
          <input type="submit" value="บันทึก" />
        </div></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1" />
  </div>
</form>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>