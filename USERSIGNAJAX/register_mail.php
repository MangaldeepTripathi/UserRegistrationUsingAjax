<?php include("functions/config.php"); include("functions/function.php"); session_start(); 
  // print_r($_POST);
  
   if(isset($_POST['operation'])=="Add")
   {
	 date_default_timezone_set('Asia/Calcutta');
	 $ip= getIp();
	 $date=date("Y-m-d H:i:s");
	 
	   $fn= $_FILES['picture']['name'];
	   $type= $_FILES['picture']['type'];
	   $size= $_FILES['picture']['size'];
	   $tmp= $_FILES['picture']['tmp_name'];
	   $allowtypes = array('image/jpeg', 'image/gif', 'image/png'); // For Only Image
//$allowtypes = array('image/jpeg','image/png','application/pdf','application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //image and docx
	  
     $uname= mysqli_real_escape_string($link,$_POST['uname']);
	 $umobile= mysqli_real_escape_string($link,$_POST['umobile']);
	 $uemail= mysqli_real_escape_string($link,$_POST['uemail']);
	 $upassword= mysqli_real_escape_string($link,$_POST['upassword']);
	 $ucpassword= mysqli_real_escape_string($link,$_POST['ucpassword']);
	 $ucountry= mysqli_real_escape_string($link,$_POST['ucountry']);
	 $ustate= mysqli_real_escape_string($link,$_POST['ustate']);
	 $ucity= mysqli_real_escape_string($link,$_POST['ucity']);
	 $uaddress= mysqli_real_escape_string($link,$_POST['uaddress']);
	 $upincode= mysqli_real_escape_string($link,$_POST['upincode']);
	 
	 $mob= "/^[7-9][0-9]{9}$/";
	 $nam="/^[a-zA-Z ]*$/";
	 $pincode="/^[1-9][0-9]{5}$/";
	 if(empty($uname))
	 {
	  echo $errors= "Please Enter Your Name";
	  echo "<script>$('#uname').focus(); $('#uname').addClass('focus-red'); </script>";
	 }
	/* else if(!preg_match($nam,$uname))
	 {
	   echo $errors= "Please Provide Valid Name";
       echo "<script>$('#uname').focus(); $('#uname').addClass('focus-red'); </script>";
	}
	 else if(empty($umobile))
	 {
	  echo $errors= "Please Enter Mobile Number";
	  echo "<script>$('#umobile').focus();$('#umobile').addClass('focus-red');</script>"; 
	 }
	 else if(!preg_match($mob,$umobile))
	 {
		echo $error='Please Enter Valid Mobile Number';
		echo "<script>$('#umobile').focus();$('#umobile').addClass('focus-red');</script>"; 
	 }
	 else if(empty($uemail))
	 {
	  echo $error='Please Enter Email';
	  echo "<script>$('#uemail').focus(); $('#uemail').addClass('focus-red');</script>"; 
	 }
	 else if(!filter_var($uemail,FILTER_VALIDATE_EMAIL))
	 {
	  echo $error='Please Enter Valid Email Id';
	  echo "<script>$('#uemail').focus(); $('#uemail').addClass('focus-red');</script>"; 
	 }
	 else if(empty($upassword))
   {
	 echo $error='Please Enter Password';
	 echo "<script>$('#upassword').focus(); $('#upassword').addClass('focus-red');</script>"; 
	}
	else if(empty($ucpassword))
    {
	 echo $error='Please Enter Confirm Password';
	 echo "<script>$('#ucpassword').focus(); $('#ucpassword').addClass('focus-red');</script>"; 
	}
	else if($upassword!=$ucpassword)
   {
	 echo $error='Password and Confirm Password Does not Matches';
	 echo "<script>$('#ucpassword').focus(); $('#ucpassword').addClass('focus-red');</script>";
	}
	 else if(empty($ucountry))
   {
	 echo $error='Please Select Country';
	  echo "<script>$('#ucountry').focus(); $('#ucountry').addClass('focus-red');</script>";
	}
	else if(empty($ustate))
    {
	 echo $error='Please Select State';
	  echo "<script>$('#ustate').focus(); $('#ustate').addClass('focus-red');</script>";
	}
    else if(empty($ucity))
   {
	 echo $error='Please Select City';
	  echo "<script>$('#ucity').focus(); $('#ucity').addClass('focus-red');</script>";
	}
	 else if(empty($uaddress))
   {
	 echo $error='Please Enter Address';
	  echo "<script>$('#uaddress').focus(); $('#uaddress').addClass('focus-red');</script>";
	}
	 else if(empty($upincode))
   {
	 echo $error='Please Enter Pincode';
	  echo "<script>$('#upincode').focus(); $('#upincode').addClass('focus-red');</script>";
	}
	else if(!preg_match($pincode,$upincode))
	 {
		echo $error='Please Enter Valid Pincode ';
		 echo "<script>$('#upincode').focus(); $('#upincode').addClass('focus-red');</script>";
	 }*/
	else if(empty($fn))
   {
	 echo $error='Please Choose Picture';
	  echo "<script>$('#picture').focus(); $('#picture').addClass('focus-red');</script>";
	}
	
	//else if($size > 500*1024)=512000 // File Size Should be Less than 500 KB
	//else if($size > 512000)
	else if($size > 5242880)
   {
	  echo $error='Image is Too Large';
	  echo "<script>$('#picture').focus(); $('#picture').addClass('focus-red');</script>";
	}
	else if(!in_array($type,$allowtypes))
   {
	  echo $error='Only Png Jpg are allowed';
	  echo "<script>$('#picture').focus(); $('#picture').addClass('focus-red');</script>";
	}
	 
	 else
	  {
     $run= mysqli_query($link,"INSERT INTO `register`(`ip`,`uname`, `umobile`, `uemail`, `upassword`, `ucountry`, `ustate`, `ucity`, `uaddress`, `upincode`, `image`,`created`) VALUES ('$ip','$uname','$umobile','$uemail','$upassword','$ucountry','$ustate','$ucity','$uaddress','$upincode','$fn','$date') ");
	 move_uploaded_file($tmp,"upload/".$fn);
	 
	  $last = mysqli_insert_id($link);
	  if($run==true)
	  {
		echo $error='Your Registration successfully';
	  }
	  else
	  {
	    echo $error='Email Id Already Registered';
	  }
    }
}



// Login Section Start Here testing from server

if(isset($_POST['login']))
 {
	 
	$status='1';
	 $username= mysqli_real_escape_string($link, $_POST['username']);
	 $password= mysqli_real_escape_string($link, $_POST['password']);
	
	 $stmt= mysqli_prepare($link,"select `id`,`uemail`,`upassword`,`status` from `register` where `uemail`=? and `upassword`=? and `status`=?  ");
	if($stmt==true)
	{
		  mysqli_stmt_bind_param($stmt,"ssi",$username,$password,$status);
		  mysqli_stmt_bind_result($stmt,$id,$email,$pass,$type);
		  mysqli_stmt_execute($stmt);
		  mysqli_stmt_fetch($stmt);
	      if(!empty($email) and !empty($pass)and !empty($id))
	     {
			$_SESSION['uid']=$id;
			$_SESSION['uemail']=$email;
			echo '<script>location.href="index.php";</script>';
	     }
	     else
	    {
	     echo $msg='Please Enter Valid Email and Password';
	    }
	   mysqli_stmt_close($stmt);
 }
	 else
	{
		echo $msg='Error Creating Statement';
	 }
}


mysqli_close($link);
?>
