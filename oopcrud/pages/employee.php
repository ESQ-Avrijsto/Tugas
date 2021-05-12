<?php 
	require_once('./class/class.Employee.php');
	$objEmployee=newEmployee();
	if(isset($_POST['btnSubmit'])){
		$objEmployee->ssn=$_POST['ssn'];
		$objEmployee->fname=$_POST['fname'];
		$objEmployee->address=$_POST['address'];
		if(isset($_GET['ssn'])){
			$objEmployee->ssn=$_GET['ssn'];
			$objEmployee->UpdateEmployee();}
		else{
			$objEmployee->AddEmployee();}
	}
	echo"<script>alert('$objEmployee->message');</script>";
	if($objEmployee->hasil){
		echo'<script>window.location="index.php?p=employeeList";</script>';}
	elseif(isset($_GET['ssn'])){
		$objEmployee->ssn=$_GET['ssn'];
		$objEmployee->SelectOneEmployee();}
?>

<div>
		<h4 class="title">
			<span class="text">
				<strong>Employee</strong>
			</span>
		</h4>
		<form action="" method="post">
			<table class="table">
				<tr>
					<td>SSN</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="ssn" value="<?php echo $objEmployee->ssn;?>"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td>:</td>
					<td><input type="text"class="form-control"ssn="fname"name="fname"value="<?php echo $objEmployee->fname;?>"></td>
				</tr>
					<textarea class="form-control"name="address"rows="3"cols="19"><?php echo $objEmployee->address;?>
					</textarea>
						</td>
								<tr>
									<td colspan="2">
									</td>
										<td>
											<input  type="submit"class="btnbtn-success"value="Save"name="btnSubmit">
											<a href="index.php?p=employeeList"class="btnbtn-warning">Cancel</a>
										</td>

								</tr>
			</table>
		</form>
</div>