<?php include("config.php");  ?>
<?php  
// Getting The Client Ip Address
function getIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
	{
       $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}

function fetch_all_product()
{
	 global $link;
	 $result= mysqli_query($link,"SELECT * FROM `products` order by id");
	 return $result;
}


  ?>