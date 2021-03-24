<?php
    
    $data = [
        "ocen_update_id_student" => $_POST['ocen_update_id_student'],
        "ocen_update_ball" => $_POST['ocen_update_ball'],
        "ocen_update_propusk" => $_POST['ocen_update_propusk']
    ];



$connection = mysqli_connect("127.0.0.1","root","root", "junral");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'UPDATE ocen SET ball = '  . $data["ocen_update_ball"] . ', propusk = "' . $data["ocen_update_propusk"]  . '" WHERE id_student = ' . $data["ocen_update_id_student"];
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>