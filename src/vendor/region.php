<?php
include ("header.php");

define('DB_HOST', 'mysql');
define('DB_NAME', 'php_docker');
define('DB_USER', 'root');
define('DB_PASSWORD', '1234');
$link=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);


/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_POST['tax'])){
    $tax= $_POST['tax'];
    $region= $_POST['region'];
    $number= $_POST['number'];
    $id =0;
    $stmt = mysqli_prepare($link, "INSERT INTO Region(Id, Tax, RegionName, OficeNumber) values(?, ?,?,?)");
    mysqli_stmt_bind_param($stmt, "issi", $id, $tax,$region,$number);
    
    print("Record Inserted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
if(isset($_POST['id'])){
    $id= $_POST['id'];
    $stmt = mysqli_prepare($link, "DELETE FROM Region WHERE Id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    print("Record Deleted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
$result = $link->query('SELECT * FROM Region');
$data = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="table">
<table>
<tr>
<td>
    Id
</td>
<td>
Tax
</td>
<td>
RegionName
</td>
<td>
OficeNumber
</td>
</tr>
    <?foreach($data as $value){?>
        <tr>
        <td>
            <?echo $value['Id'];?>
        </td>
        <td>
            <?echo $value['Tax'];?>
        </td>
        <td>
            <?echo $value['RegionName'];?>
        </td>
        <td>
            <?echo $value['OficeNumber'];?>
        </td>
        </tr>
        
    <?}?>
          
    </table>
    <?if(isset($_COOKIE['login'])):?>
    <?if($_COOKIE['login']=="admin"):?>
    <label>Add record to database</label>
    <form action="region.php" method="post">
    <tr>
        
            <td>
            <label>Tax</label>
            <input type="text" name="tax" placeholder="10%">
            </td>
            <td>
            <label>RegionName</label>
            <input type="text" name="region" placeholder="Moscow">
            </td>
            <td>
            <label>OficeNumber</label>
            <input type="text" name="number" placeholder="30">
            </td>
            <button type="submit">Add</button>
          
    </tr>
   
    </form>
    <label>Delete record from database</label>
    <form action="region.php" method="post">
    <tr>
        
            <td>
            <label>Id</label>
            <input type="text" name="id" placeholder="1">
            </td>
            <button type="submit">Delete</button>
          
    </tr>
   
    </form>
    <?endif;?>
    <?endif;?>
</div>
<?



mysqli_close($link);
?>
<?echo "</div>";?>
