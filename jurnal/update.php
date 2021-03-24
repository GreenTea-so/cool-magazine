<?php
    
    $data = [
        "update_id_student" => $_POST['update_id_student'],
        "update_name" => $_POST['update_name'],
        "update_squad" => $_POST['update_squad']
    ];



$connection = mysqli_connect("127.0.0.1","root","root", "junral");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'UPDATE students SET FIO = ' . '"' . $data["update_name"] . '"' . ',' . 'squad = "' . $data["update_squad"] . '" WHERE id_student = ' . $data["update_id_student"];
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>