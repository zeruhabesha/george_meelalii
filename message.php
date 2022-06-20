         <?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:index.php");
}
           
////// code
$error='';
$msg='';
if(isset($_POST['submit']))
{
	$uid=$_SESSION['uid'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];

	$message=$_POST['messages'];
		$aid=$_POST['aid'];

	
	$status='0';
	if(!empty($name) && !empty($phone) && !empty($message))
	{
		
		$sql="INSERT INTO message (uid,name,email,phone,messages,aid,status) VALUES ('$uid','$name','$email','$phone','$message','$aid','$status')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Message Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Message Not Send Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}				?>   				

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.png">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<style>
.col-md-8{
	margin-left:600px;  
		 margin-top:-500px; 
}

</style>
<!--	Title
	=========================================================-->
<title>George_Meelalii Real Estate</title>
</head>
<body> 

<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Message</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Message</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


<div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Message</h2>
                        </div>
					</div>
                <div class="dashboard-personal-info p-5 bg-white">
                    <form action="#" method="post">
                        <h5 class="text-secondary border-bottom-on-white pb-3 mb-4">Message Form</h5>
						<?php echo $msg; ?><?php echo $error; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" name="name" placeholder="Enter Name">
                                </div>                
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
										<textarea class="form-control" name="messages" placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
								   <div class="form-group">
                                    <div class="form-group">
										<textarea class="form-control" name="aid" placeholder="Enter AID"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group mt-4">
                                        <button type="submit" name="submit" class="btn btn-primary w-100">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form></div>
						
						<div class="col-md-8">
                        <div class="tab-content mt-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                <div class="row">
								
								 <div class="col-md-6 col-lg-4">
                                        <div class="featured-thumb hover-zoomer mb-4">
                                          
                                           <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
													<th>Admin Name</th>
                                                     <th >Message</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
											<?php
													
												$query=mysqli_query($con,"select * from message");
												
												while($row=mysqli_fetch_row($query))
													{
														$uid=$_SESSION['uid'];
														if($uid == $row['1'])
														{
											?>
                                                <tr>
                                                    
                                                    <td><?php echo $row['7']; ?></td>
                                                    <td><?php echo $row['2']; ?></td>
                                                    <td><?php echo $row['5']; ?></td>
													<td><a href="messagedelete.php?id=<?php echo $row['0']; ?>">Delete</a></td>
                                                </tr>
													<?php } } ?>

                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
										<?php  ?>
									     </div>
                                        </div>
                                    </div> </div>
						
						
						