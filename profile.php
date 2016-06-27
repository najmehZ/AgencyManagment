<?php session_start();
ob_start();
if($_SESSION['login']!=1)
	header("location:../adminlogin.php");
	
	include 'funcs/connect.php';
	include 'funcs/funcs.php';
	include 'funcs/date.php';
	include 'funcs/num2str.php';	
	
	
if(isset($_POST['username'])&&isset($_POST['password'])&& $_POST['Submit'])
{


$p= "UPDATE `customer_table` SET `username`='".$_POST['username']."',`password`='".$_POST['password']."',`fname`='".$_POST['fname']."',`lname`='".$_POST['lname']."',`address`='".$_POST['address']."',`tell`='".$_POST['tell']."' where `userid`='".$_SESSION['customerid']."'";
	mysql_query($p);
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>صفحه اصلی</title>
<script language="javascript" src="../editor/ckeditor.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<style type="text/css" media="screen">
		@import url(style.css );
		p,div,table{color:#333333; font-family:"B Lotus"}
	</style>




<script language="javascript">
	function checkinput(x1,x2,x3)
	{
		if(x1=='')
		{
			alert('لطفا نام کالا را وارد نمایید');
			document.getElementById('name').focus();
			return false;
		}
		else if(x2=='')
		{
			alert('لطفا دسته کالا را وارد نمایید');
			document.getElementById('catid').focus();
			return false;
		}
		else if(x3=='')
		{
			alert('لطفا قیمت کالا را وارد نمایید');
			document.getElementById('gheymat').focus();
			return false;
		}
		else
			return true;
	
	
	}


</script>

</head>
<body>
<div class="top"></div>
<div class="base">
<div class="middle">
<div class="logo">&nbsp; </div>
<div class="topmenu">
<div class="right"></div>
<?php include 'topmenu.php';?>
<div class="left">

</div><!--Top Menu -->

<div class="content">
<div class="content_top"></div>
<div class="content_bg">
<div id="right2">

	<?php include 'rightmenu.php'; ?>
				
	<?php include 'loginform.php'; ?>
	
</div><!--Right -->





<div id="left2">

<div class="post">
<div class="post_top">
  <h2><a href="#"></a>فرم مدیریت کاربران </h2>
</div>
<div class="post_body">
<div class="text">

<table width="100%" border="0" cellspacing="2" cellpadding="2" dir="rtl">
    <tr>
      <td colspan="7" bgcolor="#DCDCDC" dir="rtl">
	   <?php
				$r=mysql_query("select * from customer_table where userid=".$_SESSION['customerid']."");
		
				while($rows=mysql_fetch_assoc($r))
				{
				@$fname=$rows['fname'];
				@$lname=$rows['lname'];
				@$username=$rows['username'];
				@$password=$rows['password'];
				@$address=$rows['address'];
				@$tell=$rows['tell'];
		
				}
				
				?>
	  <form action="" method="post"   onsubmit="return checkinput(name.value,catid.value,gheymat.value);">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" dir="ltr">
 <tr>
          <td><label>
            <div align="right">
              <input name="fname" type="text" id="fname" value="<?php echo @$fname; ?>" /> 
            </div>
          </label></td>
          <td>نام  </td>
        </tr>
        <tr>
        <td><label>
            <div align="right">
              <input name="lname" type="text" id="lname" value="<?php echo @$lname; ?>" />
            </div>
          </label></td>
          <td>نام خانوادگی </td>
                  </tr>
       <tr>
          <td><label>
            <div align="right">
              <input name="username" type="text" id="username" value="<?php echo @$username; ?>"/>
            </div>
          </label></td>
          <td>نام کاربری </td>
        </tr>
        <tr>
          <td><label>
            <div align="right">
              <input name="password" type="text" id="password" value="<?php echo @$password; ?>"/>
            </div>
          </label></td>
          <td> کلمه عبور </td>
                  </tr>
        
                <tr>
                
          <td><label>
            <div align="right">
              <input name="address" type="text" id="endtime" value="<?php echo @$address; ?>"/>
            </div>
          </label></td>
          <td>آدرس </td>
                  </tr>
        <tr>
          <td><label>
            <div align="right">
              <input name="tell" type="text" id="starttime" value="<?php echo @$tell; ?>"/>
            </div>
          </label></td>
          <td>تلفن</td>
        </tr>
        

          <td colspan="4"><div align="center">
            <label>
            <input name="Submit" type="submit" class="auto-style2" value="  ثبت  " />
            </label>
            <label>
            <input name="Submit2" type="reset" class="auto-style2" value="پاک کردن" />
            </label>
          </div></td>
          </tr>
      </table>
	  </form>
	  </td>
    </tr>
	

  </table>
</div>
</div>
<div class="post_bottom"></div>
</div>



</div><!--Left -->



</div>




<div class="content_bottom"></div>
</div><!--Conetnt -->

<div class="footer">
<div class="footer_right"></div>
<div class="footer_body"><div class="text"> کلیه حقوق مادی و معنوی این وب سایت برای موبایل شاپ محفوظ می باشد <br />
</div>
</div>
<div class="footer_left"></div>
</div>  

<div class="clr"></div>



</div><!--Middle -->
</div><!--base -->
</body>
</html>

