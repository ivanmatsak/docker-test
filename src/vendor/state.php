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
if(isset($_POST['balance'])){
    $balance= $_POST['balance'];
    $date= $_POST['date'];
    $service= $_POST['service'];
    $region= $_POST['region'];
    $id =0;
    $stmt = mysqli_prepare($link, "INSERT INTO StateOfNumber(Id, Balance, ConnectingDate,UsedService,Region) values(?, ?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "issii", $id, $balance,$date,$service,$region);
    
    print("Record Inserted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
if(isset($_POST['id'])){
    $id= $_POST['id'];
    $stmt = mysqli_prepare($link, "DELETE FROM StateOfNumber WHERE Id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    print("Record Deleted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
$result = $link->query('SELECT * FROM StateOfNumber');
$data = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="table">
<table>
<tr>
<td>
    Id
</td>
<td>
Balance
</td>
<td>
ConnectingDate
</td>
<td>
UsedService
</td>
<td>
Region
</td>

</tr>
    <?foreach($data as $value){?>
        <tr>
        <td>
            <?echo $value['Id'];?>
        </td>
        <td>
            <?echo $value['Balance'];?>
        </td>
        <td>
            <?echo $value['ConnectingDate'];?>
        </td>
        <td>
            <?echo $value['UsedService'];?>
        </td>
        <td>
            <?echo $value['Region'];?>
        </td>
        </tr>
        
    <?}?>
          
    </table>
    <?if(isset($_COOKIE['login'])):?>
    <?if($_COOKIE['login']=="admin"):?>
    <label>Add record to database</label>
    <form action="state.php" method="post">
    <tr>
        
            <td>
            <label>Balance</label>
            <input type="text" name="balance" placeholder="100 р">
            </td>
            <td>
            <label>ConnectingDate</label>
            <input type="text" name="date" placeholder="01.01.2020">
            </td>
            <td>
            <label>UsedService</label>
            <input type="text" name="service" placeholder="1">
            </td>
            <td>
            <label>Region</label>
            <input type="text" name="region" placeholder="1">
            </td>
            <button type="submit">Add</button>
          
    </tr>
   
    </form>
    <label>Delete record from database</label>
    <form action="state.php" method="post">
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