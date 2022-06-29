<?php 
class admin{

	private $db;

	function __construct($DB_con){
		$this->db = $DB_con;
	}

	public function ceklogin($username,$password)
	{
		try {
			$sql = "SELECT * FROM user WHERE username = :username AND password = :password";
			$stmt = $this->db->prepare($sql);
			$stmt->bindparam(':username',$username);
			$stmt->bindparam(':password',$password);
			$stmt->execute();

			$count = $stmt->rowCount();
			if ($count != 0) {
				$_SESSION['username'] = $username;
				header("Location: home.php");
				return;
			}else{
				echo "Anda tidak dapat login";
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function getID($ID_BT)
	{
		$stmt = $this->db->prepare("SELECT * FROM table_buku_tamu WHERE ID_BT=:ID_BT");
		$stmt->execute(array(":ID_BT"=>$ID_BT));
		$editRow = $stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update($ID_BT,$NAMA,$EMAIL,$ISI)
	{
		try {
			$stmt = $this->db->prepare("UPDATE table_buku_tamu SET NAMA=:NAMA, EMAIL=:EMAIL, ISI=:ISI WHERE ID_BT=:ID_BT");
			$stmt->bindparam(":ID_BT",$ID_BT);
			$stmt->bindparam(":NAMA",$NAMA);
			$stmt->bindparam(":EMAIL",$EMAIL);
			$stmt->bindparam(":ISI",$ISI);
			$stmt->execute();
			// header("Location: ?success");
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function delete($ID_BT)
	{
		$stmt = $this->db->prepare("DELETE FROM table_buku_tamu WHERE ID_BT=:ID_BT");
		$stmt->bindparam(":ID_BT",$ID_BT);
		$stmt->execute();
		return true;
	}

	public function logout()
	{
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
		return true;
	}

}
?>