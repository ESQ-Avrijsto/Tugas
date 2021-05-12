
	<h4 class="title">
		<span class="text">
		<strong>Employee list</strong>
		</span>
	</h4>
	<a class="btn btn-primary btn-lg" href="index.php?p=employee">add</a>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">SSN</th>
				<th scope="col">Name</th>
				<th scope="col">Address</th>
				<th scope="col">Action</th>
			</tr>
			<?php 
				require_once('./class/class.Employee.php');
				$objEmployee = new Employee();
				$arrayResult = $objEmployee->SelectAllEmployee();

				if (count($arrayResult)==0) {
					echo '<tr><td colspan="5">tidak ada data</td></tr>';
				}
				else{
					$no = 1;
					foreach ($arrayResult as $dataEmployee) {
						echo "<tr>";
						echo "<td>".$no.."</td>";
						echo "<td>".$dataEmployee->ssn."</td";
						echo "<td>".$dataEmployee->fname."</td";
						echo "<td>".$dataEmployee->address."</td";
						echo'<td><a class="btn btn-warning"href="index.php?p=employee&ssn='.$dataEmployee->ssn.'">Edit</a>|<a class="btn btn-danger"href="index.php?p=deleteemployee&ssn='.$dataEmployee->ssn.'"onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a></td>';
						echo'</tr>';
						$no++;
					}
				}
			?>
		</thead>
	</table>
