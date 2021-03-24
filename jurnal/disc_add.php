<?php
    
    $data = [
        "disc_add_disp" => $_POST['disc_add_disp'],
        "disc_add_date" => $_POST['disc_add_date'],
        "disc_add_fio" => $_POST['disc_add_fio'],
        "disc_add_squad" => $_POST['disc_add_squad']
    ];


$connection = mysqli_connect("127.0.0.1","root","root", "junral");


if ($connection==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

} 
    $sql = 'INSERT INTO disc(disp, date, fio, squad) VALUES("'  . $data["disc_add_disp"] . '","'   . $data["disc_add_date"] . '", "' . $data["disc_add_fio"] . '","'  . $data["disc_add_squad"] . '")';
    
    $result = mysqli_query($connection, $sql);


    $result2 = mysqli_query($connection, 'select * from students where squad = "' . $data["disc_add_squad"] . '"');
    
    $result3 = mysqli_query($connection, "SELECT COUNT( * ) FROM disc");
    $res3 = mysqli_fetch_assoc($result3);
    while ($r1 = mysqli_fetch_assoc($result2)){
    $value = "10";
    $sql2 = 'INSERT INTO ocen(id_student, id_disc, ball, propusk) VALUES('  . $r1["id_student"] . ','   . $res3["COUNT( * )"] . ', ' . '0' . ',""'   . ')';
    $result4 = mysqli_query($connection, $sql2);
    }

    var_dump($sql2);
?>