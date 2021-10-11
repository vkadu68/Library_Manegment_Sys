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
                                <h1>First</h1>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i></i><p>
                                <form action="1.php" method="POST">
                                    
                                    <h4>- Get number N and branch number I as input and print the top N most frequent borrowers (Rid and name) in branch I and the number of books each has borrowed.
                                    </h4><br><div class="form-group">
                                        <input type="id" class="form-control"  placeholder="Number N" name="n1" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="id" class="form-control"  placeholder="Branch No." name="b1" required = "true">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
                                
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><h4>RID<h4></th>
                                                    <th><h4>Name<h4></th>
                                                    <th><h4>Count</h4></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                error_reporting($n1=$_POST['n1']);
                                                error_reporting($b1=$_POST['b1']);
                                                $query = "SELECT R.RID, R.RName , COUNT(R.RID) from reader AS R ,borrows AS B ,branch AS BR WHERE R.RID=B.RID and B.BID=BR.BID and B.BID='".$b1."' GROUP BY R.RID,R.RName ORDER BY R.RID ASC LIMIT ".$n1;
                                                $result = mysqli_query($con, $query)or die( mysqli_error($con));                                                
                                                while($row = mysqli_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row["RID"] ?></td>
                                                    <td><?php echo $row["RName"] ?></td>                                                    
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