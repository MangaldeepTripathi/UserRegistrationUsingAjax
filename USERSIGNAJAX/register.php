<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Nexavir</title>
<style>
.focus-red:focus{
	border: 1px solid red !important;
}


</style>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
	  $(".submit").click(function(){
		  var uname= $("#uname").val();
		  var umobile= $("#umobile").val();
		  var uemail= $("#uemail").val();
		  var upassword= $("#upassword").val();
		  var ucpassword= $("#ucpassword").val();
		  var ucountry= $("#ucountry").val();
		  var ustate= $("#ustate").val();
		  var ucity= $("#ucity").val();
		  var uaddress= $("#uaddress").val();
		  var upincode= $("#upincode").val();
		  var submit= $(".submit").val();
		  var info= {submit:submit,uname:uname,umobile:umobile,uemail:uemail,upassword:upassword,ucpassword:ucpassword,ucountry:ucountry,ustate:ustate,ucity:ucity,uaddress:uaddress,upincode:upincode};
		  
		  $.ajax({
			     type:"POST",
				 url:"register_mail.php",
				 data:info,
				 cache:false,
				 success: function(response){
					 //alert(response);
					 $("#status1").html(response);
				   }
			    });
	  });
});

</script>-->





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$(document).on('submit', '#user_form', function(event){
event.preventDefault();
//alert('test');
$.ajax({
url: "register_mail.php",       // Url to which the request is send
type: "POST",                      // Type of request to be send, called as method
data:  new FormData(this),         // Data sent to server, a set of key/value pairs representing form fields and values
contentType: false,               // The content type used when sending data to the server. Default is: “application/x-www-form-urlencoded”
cache: false,                    // To unable request pages to be cached
processData:false,              // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
success: function(data)          // A function to be called if request succeeds
{
//$('#loading').hide();
//alert(data);
$("#status1").html(data);
}
});
});
 });

</script>

</head>

<body>
        
                    	<!----><form method="post" id="user_form" enctype="multipart/form-data">
                            <table class="table-width">
                               <tr>
                                    <td colspan="3"><p id="status1" style="color:#E80D11;"></p></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="3"><p>Full name: </p> <input type="text" name="uname" id="uname"/></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><p>Mobile number: </p> <input type="text" name="umobile" id="umobile"/></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><p>Email: </p> <input type="text" name="uemail" id="uemail"/></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><p>Password: </p> <input type="password" name="upassword" id="upassword"/></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><p>Confirm password: </p> <input type="password" name="ucpassword" id="ucpassword"/></td>
                                </tr>
                                <tr>
                                    <td><p>Country: </p>
                                        <select name="ucountry" id="ucountry" class="countries">
                                           <option value="">Select Country</option>
                                           <!--<option value="India">India</option>-->
                                       </select>
                                    </td>
                                    <td style="text-align:left;"><p>Select State: </p>
                                        <select name="ustate" id="ustate" class="states">
                                           <option value="">Select State</option>
                                           <!-- <option value="Uttar Pradesh">Uttar Pradesh</option>-->
                                       </select>
                                    </td>
                                    <td><p>Select City: </p>
                                        <select name="ucity" id="ucity" class="cities">
                                        <option value="">Select City</option>
                                           <!--<option value="Varansi">Varansi</option>-->
                                       </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><p>Address: </p>
                                    
                                        <textarea name="uaddress" id="uaddress"/></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><p>Pincode: </p>
                                        <input type="text" name="upincode" id="upincode"/>
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td colspan="3"><p>Picture: </p>
                                        <input type="file" name="picture" id="picture"/>
                                        <input type="hidden" name="operation" id="operation" value="Add">
                                    </td>
                                </tr>
                                
                                 <tr>
         <td colspan="3" align="center"><input type="submit" class="submit" name="submit" id="submit-address" value="Register"></td>
                                </tr>
                            </table>
                        <!----></form>
      <!--For Dropdown code Start-->
    <!----> <script src="js/location.js"></script>
    <!--For Dropdown code End -->
</body>
</html>
