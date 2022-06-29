<?php
   include_once '../dbconfig.php';
   include_once 'class.admin.php';
   $admin = new admin($DB_con);
   session_start();

   if(isset($_POST['btn-del']))
   {
      $ID_BT = $_GET['delete_id'];
      $admin->delete($ID_BT);
      header("Location: delete.php?deleted"); 
   }

?>

<?php include_once 'header.php'; ?>
<br/><br/><br/><br/>
<div class="clearfix"></div>

<div class="container">

   <?php
      if(isset($_GET['deleted']))
      {
   ?>
   <div class="alert alert-success">
   <strong>Success!</strong> record was deleted... 
   </div>
   <?php
      }
      else
      {
      ?>
      <div class="alert alert-danger">
      <strong>Sure !</strong> to remove the following record ? 
      </div>
   <?php
      }
   ?> 
</div>

<div class="clearfix"></div>

<div class="container">
  
  <?php
  if(isset($_GET['delete_id']))
  {
   ?>
         <table class='table table-bordered'>
         <tr>
         <th>ID</th>
         <th>Nama</th>
         <th>Email</th>
         <th>Isi</th>
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM table_buku_tamu WHERE ID_BT=:ID_BT");
         $stmt->execute(array(":ID_BT"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['ID_BT']); ?></td>
             <td><?php print($row['NAMA']); ?></td>
             <td><?php print($row['EMAIL']); ?></td>
             <td><?php print($row['ISI']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
  }
  ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="ID_BT" value="<?php echo $row['ID_BT']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
 <?php
}
else
{
 ?>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div> 