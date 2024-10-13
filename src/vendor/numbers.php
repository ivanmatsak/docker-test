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
if(isset($_POST['phoneNumber'])){
    $phone= $_POST['phoneNumber'];
    $id =0;
    $stmt = mysqli_prepare($link, "INSERT INTO AvailableNumbers(Id, PhoneNumber) values(?, ?)");
    mysqli_stmt_bind_param($stmt, "si", $id, $phone);
    
    print("Record Inserted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
if(isset($_POST['id'])){
    $id= $_POST['id'];
    $stmt = mysqli_prepare($link, "DELETE FROM AvailableNumbers WHERE Id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    print("Record Deleted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
$result = $link->query('SELECT * FROM AvailableNumbers');
$data = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="table">
<table>
<tr>
<td>
    Id
</td>
<td>
PhoneNumber
</td>

</tr>
    <?foreach($data as $value){?>
        <tr>
        <td>
            <?echo $value['Id'];?>
        </td>
        <td>
            <?echo $value['PhoneNumber'];?>
        </td>
        
        </tr>
        
    <?}?>
          
    </table>
    <?if(isset($_COOKIE['login'])):?>
    <?if($_COOKIE['login']=="admin"):?>
    <label>Add record to database</label>
    <form action="numbers.php" method="post">
    <tr>
        
            <td>
            <label>Phone number</label>
            <input type="text" name="phoneNumber" placeholder="+375291234567">
            </td>
            <button type="submit">Add</button>
          
    </tr>
   
    </form>
    <label>Delete record from database</label>
    <form action="numbers.php" method="post">
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
