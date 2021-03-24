<?php
    
    $data = [
        "disc_update_id_disc" => $_POST['disc_update_id_disc'],
        "disc_update_disp" => $_POST['disc_update_disp'],
        "disc_update_date" => $_POST['disc_update_date'],
        "disc_update_fio" => $_POST['disc_update_fio'],
        "disc_update_squad" => $_POST['disc_update_squad']
    ];



$connection = mysqli_connect("127.0.0.1","root","root", "junral");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'UPDATE disc SET disp =  '  . '"' . $data["disc_update_disp"] . '",' .  'date = "' . $data["disc_update_date"] . '", fio = "'  . $data["disc_update_fio"] . '", squad = "' . $data["disc_update_squad"] . '" WHERE id_disc = ' . $data["disc_update_id_disc"];
    
    $result = mysqli_query($connection, $sql);
    var_dump($sql);
?>