<table class="table table-bordered">
	<thead>
	<tr>
	<th>Project Number</th>
	<th>Project Name</th>
	<th>Project Location</th>
	<th>Department Name</th>
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
		<?php
		require_once('./class/class.Project.php');
		$objProject = new Project();
		$arrayResult = $objProject->SelectAllProject();
		echo count($arrayResult);
			if(count($arrayResult) == 0){
			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
			}else{
			$no = 1;
				foreach ($arrayResult as $dataProject) {
					echo '<tr>';
					echo '<td>'.$dataProject->pnumber.'</td>';
					echo '<td>'.$dataProject->pname.'</td>';
					echo '<td>'.$dataProject->plocation.'</td>';
					echo '<td>'.$dataProject->dept->dname.'</td>';
					echo '</tr>';
					$no++;
				}
			}
		?>
	</tbody>
</table>