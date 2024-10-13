
    <form action="Test.php" method="post">
    <tr>
        
            <td>
            <label>Query</label>
            <input type="text" name="query" placeholder="1">
            </td>
            <button type="submit">Submit</button>
          
    </tr>
   
    </form>

<?
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
if(isset($_POST['query'])){
    $result = $link->query($_POST['query']);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    foreach($data as $value){
        print_r($value);
    }
    
}

?>

