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
if(isset($_POST['number'])){
    $number= $_POST['number'];
    $state= $_POST['state'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $patro= $_POST['patro'];
    $age= $_POST['age'];
    $id =0;
    $stmt = mysqli_prepare($link, "INSERT INTO Clients(Id, NumberId, StateId, FirstName,LastName,Patronymic,Age) values(?, ?,?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "iiisssi", $id, $number,$state,$fname,$lname,$patro,$age);
    
    print("Record Inserted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
if(isset($_POST['id'])){
    $id= $_POST['id'];
    $stmt = mysqli_prepare($link, "DELETE FROM Clients WHERE Id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    print("Record Deleted.....");

   //Executing the statement
   mysqli_stmt_execute($stmt);
   unset($_POST);
}
$result = $link->query('SELECT * FROM Clients');
$data = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="table">
<table>
<tr>
<td>
    Id
</td>
<td>
NumberId
</td>
<td>
StateId
</td>
<td>
FirstName
</td>
<td>
LastName
</td>
<td>
Patronymic
</td>
<td>
Age
</td>
</tr>
    <?foreach($data as $value){?>
        <tr>
        <td>
            <?echo $value['Id'];?>
        </td>
        <td>
            <?echo $value['NumberId'];?>
        </td>
        <td>
            <?echo $value['StateId'];?>
        </td>
        <td>
            <?echo $value['FirstName'];?>
        </td>
        <td>
            <?echo $value['LastName'];?>
        </td>
        <td>
            <?echo $value['Patronymic'];?>
        </td>
        <td>
            <?echo $value['Age'];?>
        </td>
        </tr>
        
    <?}?>
          
    </table>
    <?if(isset($_COOKIE['login'])):?>
    <?if($_COOKIE['login']=="admin"):?>
    <label>Add record to database</label>
    <form action="clients.php" method="post">
    <tr>
        
            <td>
            <label>NumberId</label>
            <input type="text" name="number" placeholder="1">
            </td>
            <td>
            <label>StateId</label>
            <input type="text" name="state" placeholder="1">
            </td>
            <td>
            <label>FirstName</label>
            <input type="text" name="fname" placeholder="Ivan">
            </td>
            <td>
            <label>LastName</label>
            <input type="text" name="lname" placeholder="Ivanov">
            </td>
            <td>
            <label>Patronymic</label>
            <input type="text" name="patro" placeholder="Ivanovich">
            </td>
            <td>
            <label>Age</label>
            <input type="text" name="age" placeholder="20">
            </td>
            <button type="submit">Add</button>
          
    </tr>
   
    </form>
    <label>Delete record from database</label>
    <form action="clients.php" method="post">
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