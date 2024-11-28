<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
{   header("Location: index.php"); }else{
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Result Management System | Dashboard</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(120deg, #f6d365, #fda085);
                margin: 0;
                color: #333;
            }
            .main-wrapper {
                max-width: 1200px;
                margin: auto;
                padding: 20px;
            }
            .title {
                color: #333;
                font-size: 28px;
                font-weight: bold;
            }
            .dashboard-stat {
                text-decoration: none;
                display: block;
                padding: 20px;
                border-radius: 10px;
                background: white;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                position: relative;
                transition: transform 0.3s ease;
            }
            .dashboard-stat:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            }
            .dashboard-stat .number {
                font-size: 36px;
                font-weight: bold;
                color: #555;
            }
            .dashboard-stat .name {
                font-size: 18px;
                color: #777;
            }
            .dashboard-stat .bg-icon {
                font-size: 50px;
                color: #f6d365;
                position: absolute;
                top: 10px;
                right: 10px;
            }
            .bg-primary {
                border-left: 5px solid #6a5acd;
            }
            .bg-danger {
                border-left: 5px solid #e74c3c;
            }
            .bg-warning {
                border-left: 5px solid #f39c12;
            }
            .bg-success {
                border-left: 5px solid #2ecc71;
            }
        </style>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="content-container">
                <h2 class="title">Dashboard</h2>
                <div class="row">
                    <div class="dashboard-stat bg-primary">
                        <?php 
                        $sql1 ="SELECT StudentId from tblstudents ";
                        $query1 = $dbh -> prepare($sql1);
                        $query1->execute();
                        $totalstudents=$query1->rowCount();
                        ?>
                        <span class="number counter"><?php echo htmlentities($totalstudents);?></span>
                        <span class="name">Registered Users</span>
                        <span class="bg-icon"><i class="fa fa-users"></i></span>
                    </div>

                    <div class="dashboard-stat bg-danger">
                        <?php 
                        $sql ="SELECT id from tblsubjects ";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $totalsubjects=$query->rowCount();
                        ?>
                        <span class="number counter"><?php echo htmlentities($totalsubjects);?></span>
                        <span class="name">Subjects Listed</span>
                        <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                    </div>

                    <div class="dashboard-stat bg-warning">
                        <?php 
                        $sql2 ="SELECT id from tblclasses ";
                        $query2 = $dbh -> prepare($sql2);
                        $query2->execute();
                        $totalclasses=$query2->rowCount();
                        ?>
                        <span class="number counter"><?php echo htmlentities($totalclasses);?></span>
                        <span class="name">Total Classes</span>
                        <span class="bg-icon"><i class="fa fa-bank"></i></span>
                    </div>

                    <div class="dashboard-stat bg-success">
                        <?php 
                        $sql3="SELECT distinct StudentId from tblresult ";
                        $query3 = $dbh -> prepare($sql3);
                        $query3->execute();
                        $totalresults=$query3->rowCount();
                        ?>
                        <span class="number counter"><?php echo htmlentities($totalresults);?></span>
                        <span class="name">Results Declared</span>
                        <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php } ?>
