<?php
    
    $data = [
        "add_name" => $_POST['add_name'],
        "add_squad" => $_POST['add_squad'],
    ];


$connection = mysqli_connect("127.0.0.1","root","root", "junral");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'INSERT INTO students(FIO, squad) VALUES(' . '"' . $data["add_name"] . '"' . ',' . '"' . $data["add_squad"] . '"' . ')';
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>