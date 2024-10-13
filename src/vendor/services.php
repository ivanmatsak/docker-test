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
if(isset($_POST['sms'])){
    $sms= $_POST['sms'];
    $min= $_POST['min'];
    $tariff= $_POST['tariff'];
    $id =0;
    $stmt = mysqli_prepare($link, "INSERT INTO CompanyServices(Id, SmsPackage, MinutesPackage, Tariff) values(?, ?,?,?)");
    mysqli_stmt_bind_param($stmt, "isss", $id, $sms,$min,$tariff);
    
    print("Record Inserted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
if(isset($_POST['id'])){
    $id= $_POST['id'];
    $stmt = mysqli_prepare($link, "DELETE FROM CompanyServices WHERE Id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    print("Record Deleted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
$result = $link->query('SELECT * FROM CompanyServices');
$data = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="table">
<table>
<tr>
<td>
    Id
</td>
<td>
SmsPackage
</td>
<td>
MinutesPackage
</td>
<td>
Tariff
</td>
</tr>
    <?foreach($data as $value){?>
        <tr>
        <td>
            <?echo $value['Id'];?>
        </td>
        <td>
            <?echo $value['SmsPackage'];?>
        </td>
        <td>
            <?echo $value['MinutesPackage'];?>
        </td>
        <td>
            <?echo $value['Tariff'];?>
        </td>
        </tr>
        
    <?}?>
          
    </table>
    <?if(isset($_COOKIE['login'])):?>
    <?if($_COOKIE['login']=="admin"):?>
    <label>Add record to database</label>
    <form action="services.php" method="post">
    <tr>
        
            <td>
            <label>SmsPackage</label>
            <input type="text" name="sms" placeholder="500">
            </td>
            <td>
            <label>MinutesPackage</label>
            <input type="text" name="min" placeholder="500">
            </td>
            <td>
            <label>Tariff</label>
            <input type="text" name="tariff" placeholder="20 rub">
            </td>
            <button type="submit">Add</button>
          
    </tr>
   
    </form>
    <label>Delete record from database</label>
    <form action="services.php" method="post">
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