<?php


	class Employee extends Connection
	{
		private $ssn = '';
		private $fname = '';
		private $address = '';
		private $hasil = false;
		private $message = '';

		public function __get($atribute)
		{
			if (property_exists($this, $atribute)) {
				return $this->$atribute;
			}
		}

		public function __set($atribut, $value){
			if (property_exists($this, $atribut)) {
				$this->$atribut = $value;
			}
		}

		public function AddEmployee(){
			$sql = "INSERT INTO employee(ssn, fname, address) VALUES('$this->ssn', '$this->fname', '$this->address')";
				$this->hasil = mysqli_query($this->connection, $sql);
			if ($this->hasil) {
				$this->message = 'Data erhasil ditambahkan!';
			}
			else{
				$this->message = 'Data gagal ditambahkan!';
			}
		}

		public function UpdateEmployee(){
			$sql = "UPDATE employee SET fname = '$this->fname', address = '$this->address' WHERE ssn = '$this->ssn'";

				$this->hasil = mysqli_query($this->connection, $sql)

			if ($this->hasil) {
				$this->message = 'Data berhasil diubah!';
			}
			else{
				$this->message = 'Data gagal diubah!';
			}
		}

		public function DeleteEmployee(){
			$sql = "DELETE FROM employee WHERE ssn='$this->ssn'";
				$this->hasil = mysqli_query($this->connection, $sql);
			
			if ($this->hasil) {
				$this->message = 'Data berasil dihapus!';
			}
			else{
				$this->message = 'Data gagal dihapus!'
			}

		}

		public function SelectAllEmployee(){
			$sql = "SELECT * FROM employee";
			$result = mysqli_query($this->connection, $sql);
			$arrResult = Array();
			$cnt = 0;

			if (mysqli_num_rows($result)>0) {
				while ($data = mysqli_fetch_array($result)) {
					$objEmployee = new Employee();
					$objEmployee->ssn=$data['ssn'];
					$objEmployee->fname=$data['fname'];
					$objEmployee->address=$data['address'];
					$arrResult[$cnt] = $objEmployee;
					$count++
				}
			}

			return $arrResult;
		}

		public function SelectOneEmployee(){
			$sql = "SELECT * FROM employee WHERE ssn='$this->ssn'";
			$resultOne = mysqli_query($this->connection, $sql);
			if (mysql_num_rows($resultOne)) {
				$this->hasil = true;

				$data = mysql_fetch_assoc($resultOne);
				$this->fname = $data['fname'];
				$this->address = $data['address'];
			}
		}
	}
?>