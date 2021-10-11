<?php
require("includes/common.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="padding-top: 50px;">
        <!-- Header -->
        <?php
        include 'includes/header.php';
        ?>
        <!--Header end-->

        <div id="content">
            <!--Main banner image-->
            <div id = "admin_image">
                <div class="container">	
                    <center>
                        <div id="banner_content">
                            <div class="panel-heading">
                                <h1>Sixth</h1>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i></i><p>
                                <form action="6.php" method="POST">
                                    
                                    <h4>- Get a start date S and an end date E as input and print, for each branch, the branch Id and name and the average fine paid by the borrowers for documents borrowed from this branch during the corresponding period of time.
                                    </h4><div class="form-group">
                                        <input type="id" class="form-control"  placeholder="Start Date" name="sd" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="id" class="form-control"  placeholder="End Date" name="ed" required = "true">
                                    </div>                                    
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><h4>BID<h4></th>
                                                    <th><h4>B Name<h4></th>
                                                    <th><h4>Avg Fine</h4></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sd=$_POST['sd'];
                                                $ed=$_POST['ed'];
                                                $query = "Select b3.LName, b3.BID, Avg(IF( DATEDIFF('".$ed."', b2.'".$sd."')>30, DATEDIFF('".$ed."', b2.'".$sd."')*0.2,NULL)) from borrows b1, borrowing b2 , branch b3 WHERE b1.Bor_No=b2.Bor_No and b1.BID = b3.BID";
                                                $result = mysqli_query($con, $query)or die( mysqli_error($con));                                                
                                                while($row = mysqli_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row["BID"] ?></td>
                                                    <td><?php echo $row["LName"] ?></td>                                                    
                                                    <td><?php echo $row['COUNT(R.RID)'] ?></td>                                            
                                                </tr>
                                                
                                                <?php }                                                
                                                        ?>
                                            </tbody>
                                        </table>
                                </form>
                                    <br/>
                            </div>
                        </div>                  
                            
                        </div>
                    </center>
                </div>
            </div>
            <!--Main banner image end-->         
            
         
        </div>        
        <!--Footer-->
        <?php
        include 'includes/footer.php';
        ?>
        <!--Footer end-->
   
    </body> 
</html>