<?php
    
    $data = [
        "sell_add_id_product" => $_POST['sell_add_id_product'],
        "sell_add_date" => $_POST['sell_add_date'],
        "sell_add_count" => $_POST['sell_add_count'],
        "sell_add_summ" => $_POST['sell_add_summ']
    ];


$connection = mysqli_connect("127.0.0.1","root","root", "disk");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'INSERT INTO sell(id_product, date, count, summ) VALUES('  . $data["sell_add_id_product"]  . ',' . '"' . $data["sell_add_date"] . '", '  . $data["sell_add_count"] . ',' . $data["sell_add_summ"] . ')';
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>