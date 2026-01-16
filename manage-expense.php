  <?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

//code deletion
if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tblexpense where ID='$rowid'");
if($query){
echo "<script>alert('Record successfully deleted');</script>";
echo "<script>window.location.href='manage-expense.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}

}

//code for update
if(isset($_POST['update']))
{
$expenseid=intval($_POST['expenseid']);
$dateexpense=$_POST['dateexpense'];
$item=$_POST['item'];
$costitem=$_POST['costitem'];
$query=mysqli_query($con,"update tblexpense set ExpenseDate='$dateexpense',ExpenseItem='$item',ExpenseCost='$costitem' where ID='$expenseid'");
if($query){
echo "<script>alert('Expense successfully updated');</script>";
echo "<script>window.location.href='manage-expense.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker || Manage Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Expense</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Expense</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="col-md-12">
							
							<div class="table-responsive">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Expense Item</th>
                  <th>Expense Cost</th>
                  <th>Expense Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select * from tblexpense where UserId='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <tr>
                  <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['ExpenseItem'];?></td>
                  <td><?php  echo $row['ExpenseCost'];?></td>
                  <td><?php  echo $row['ExpenseDate'];?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['ID'];?>">
                      <em class="fa fa-edit"></em> Update
                    </a>
                    <a href="manage-expense.php?delid=<?php echo $row['ID'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this expense?')">
                      <em class="fa fa-trash"></em> Delete
                    </a>
                  </td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
               
              </tbody>
            </table>
          </div>
						</div>
						
						<!-- Edit Modals -->
						<?php
						$userid=$_SESSION['detsuid'];
						$ret=mysqli_query($con,"select * from tblexpense where UserId='$userid'");
						while ($row=mysqli_fetch_array($ret)) {
						?>
						<!-- Edit Modal -->
						<div class="modal fade" id="editModal<?php echo $row['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['ID'];?>">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="editModalLabel<?php echo $row['ID'];?>">Update Expense</h4>
						      </div>
						      <form method="post" action="">
						        <div class="modal-body">
						          <input type="hidden" name="expenseid" value="<?php echo $row['ID'];?>">
						          <div class="form-group">
						            <label>Date of Expense</label>
						            <input class="form-control" type="date" value="<?php echo $row['ExpenseDate'];?>" name="dateexpense" required="true">
						          </div>
						          <div class="form-group">
						            <label>Item</label>
						            <input type="text" class="form-control" name="item" value="<?php echo $row['ExpenseItem'];?>" required="true">
						          </div>
						          <div class="form-group">
						            <label>Cost of Item</label>
						            <input class="form-control" type="text" value="<?php echo $row['ExpenseCost'];?>" required="true" name="costitem">
						          </div>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						          <button type="submit" class="btn btn-primary" name="update">Update Expense</button>
						        </div>
						      </form>
						    </div>
						  </div>
						</div>
						<?php } ?>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php include_once('includes/footer.php');?>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
<?php }  ?>