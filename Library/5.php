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
                                <h1>Fifth</h1>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i></i><p>
                                <form action="5.php" method="POST">
                                    <h4>- Get a year as input and print the 10 most popular books of that year in the library.
                                    </h4><div class="form-group">
                                        <input type="id" class="form-control"  placeholder="Year" name="yr" required = "true">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
                                    <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><h4>Title<h4></th>
                                                    <th><h4>Count<h4></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $yr=$_POST['yr'];
                                                $query = "SELECT D.Title, COUNT(D.DocID) from document AS D, borrows AS B ,borrowing AS BR WHERE D.DocID=B.DocID and BR.Bor_No=B.Bor_No and YEAR(BDTime)='".$yr."' GROUP BY B.DocID ORDER BY B.DocID DESC LIMIT 10";
                                                $result = mysqli_query($con, $query)or die( mysqli_error($con));                                                
                                                while($row = mysqli_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row["Title"] ?></td>                                                    
                                                    <td><?php echo $row['COUNT(D.DocID)'] ?></td>                                            
                                                </tr>
                                                
                                                <?php }                                                
                                                        ?>
                                            </tbody>
                                        </table>
                                </form>                                    <br/>
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