<?php 
class buku_tamu{

	private $db;

	function __construct($DB_con){
		$this->db = $DB_con;
	}

	public function tampildata($query,$tampil){
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
			?>
			<tbody>
				<tr>
					<td><?php echo $row['NAMA']; ?></td>
					<td><?php echo $row['EMAIL']; ?></td>
					<td><?php echo $row['ISI']; ?></td>
					<?php if ($tampil=='admin'){ ?>
						<td align="center">
						<a href="?aksi=edit&ID_BT=<?php print($row['ID_BT']); ?>"><button type="button" class="btn-edit">Edit</button></a>
	    </td>
	    <td align="center">
      <a href="delete.php?delete_id=<?php print($row['ID_BT']); ?>"><button type="button" class="btn-hapus"> Hapus</button></a>
                </td>
					 <?php } ?>
				</tr>
			</tbody>
			<?php
		}
	}

	public function tambah($table,$NAMA,$EMAIL,$ISI)
	{
		try {
			$stmt = $this->db->prepare("INSERT INTO $table(NAMA,EMAIL,ISI) VALUES(:NAMA, :EMAIL, :ISI)");
			$stmt->bindparam(":NAMA",$NAMA);
			$stmt->bindparam(":EMAIL",$EMAIL);
			$stmt->bindparam(":ISI",$ISI);
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			
		}
	}

}
?>