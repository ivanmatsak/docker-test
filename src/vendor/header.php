
<style>
   li{
    display: inline;
   }
   
body{
    height: auto;
    font-family: Montserrat, sans-serif;
    display: flex;
    
    justify-content: center;
}

form{
    display: flex;
    flex-direction: column;
    width: 400px;
}

input{
    margin: 10px 0;
    padding: 10px;
    border: unset;
    border-bottom: 2px solid #e3e3e3;
}

button{
    padding: 10px;
    border: unset;
    background: #e3e3e3;
    cursor: pointer;
}
button:hover { background: rgb(232,95,76); }
button:active { background: rgb(152,15,0); }

msg{
    color: crimson;
}
</style>
<?echo "<div>";?>
<ul >
    <li ><a href="numbers.php">Available numbers</a></li>
    <li ><a href="clients.php">Clients</a></li>
    <li ><a href="services.php">Company services</a></li>
    <li ><a href="region.php">Region</a></li>
    <li ><a href="state.php">State of number</a></li>
    <li ><a href="Test.php">Query</a></li>
    <li ><a href="list.php">Exit</a></li>
</ul>
