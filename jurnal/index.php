<?php

$dbcnx = mysqli_connect("127.0.0.1","root","root", "junral");

if ($dbcnx==false) // Если дескриптор равен 0 соединение не установлено

{

echo("<P>В настоящий момент сервер базы данных не доступен, поэтому

корректное отображение страницы невозможно.</P>");

exit();

}

?>


<HTML>
<HEAD>
<title>Журнал</title>
<script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</HEAD>
<BODY>

<script>
    $(document).ready(function(){
        $('button.add').on('click', function(){
            var add_name = $('input.add_name').val()
            var add_squad = $('input.add_squad').val()
            console.log(add_name)
            $.ajax({
                method: "POST",
                url: "php.php",
                data: { add_name: add_name, add_squad: add_squad}
            })
            .done(function(msg) {
                //alert ("Data saved" + msg);
            });
        })
        
        $('button.update').on('click', function(){
            var update_id_student = $('input.update_id_student').val()
            var update_name = $('input.update_name').val()
            var update_squad = $('input.update_squad').val()
            console.log(update_name)
            
            $.ajax({
                method: "POST",
                url: "update.php",
                data: {update_id_student: update_id_student, update_name: update_name, update_squad: update_squad}
            })
            .done(function(msg) {
               // alert ("Data saved" + msg);
            });
        })
        
        $('button.disc_add').on('click', function(){
            var disc_add_disp = $('input.disc_add_disp').val()
            var disc_add_date = $('input.disc_add_date').val()
            var disc_add_fio = $('input.disc_add_fio').val()
            var disc_add_squad = $('input.disc_add_squad').val()
            
            
            
            $.ajax({
                method: "POST",
                url: "disc_add.php",
                data: { disc_add_disp: disc_add_disp, disc_add_date: disc_add_date, disc_add_fio: disc_add_fio, disc_add_squad: disc_add_squad}
            })
            .done(function(msg) {
                //alert ("Data saved" + msg);
            });
        
    });
        
    $('button.disc_update').on('click', function(){
            var disc_update_id_disc = $('input.disc_update_id_disc').val()
            var disc_update_disp = $('input.disc_update_disp').val()
            var disc_update_date = $('input.disc_update_date').val()
            var disc_update_fio = $('input.disc_update_fio').val()
            var disc_update_squad = $('input.disc_update_squad').val()
            
            
            $.ajax({
                method: "POST",
                url: "disc_update.php",
                data: {disc_update_id_disc: disc_update_id_disc, disc_update_disp: disc_update_disp, disc_update_date: disc_update_date, disc_update_fio: disc_update_fio, disc_update_squad: disc_update_squad}
            })
            .done(function(msg) {
              // alert ("Data saved" + msg);
            });
        })
        
       
        
    $('button.ocen_update').on('click', function(){
            var ocen_update_id_student = $('input.ocen_update_id_student').val()
            var ocen_update_ball = $('input.ocen_update_ball').val()
            var ocen_update_propusk = $('input.ocen_update_propusk').val()
            console.log(1)
            console.log(ocen_update_id_student)
            
            $.ajax({
                method: "POST",
                url: "ocen_update.php",
                data: {ocen_update_id_student: ocen_update_id_student ,ocen_update_ball: ocen_update_ball, ocen_update_propusk: ocen_update_propusk}
            })
            .done(function(msg) {
              //  alert ("Data saved" + msg);
            });
        })
    });
    
</script>

<h3>Студенты</h3>
<table>
   <tr>
       <td>ID студента</td>
       <td>Фамилия Имя Отчество</td>
       <td>Группа</td>
       
   </tr>
    <?php
        $result = mysqli_query($dbcnx, "select * from students");
        
        while ($r1 = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $r1["id_student"]; ?></td>
            <td><?php echo $r1["FIO"]; ?></td>
            <td><?php echo $r1["squad"]; ?></td>
        </tr>
    <?php
        }
    ?>
</table>
<br>
<input type="text" placeholder="Фамилия имя отчество" class="add_name">
<input type="text" placeholder="Группа" class="add_squad">
<button class = "add">Добавить студента</button>

<br>
<br>
<input type ="number" placeholder="ID студента" class="update_id_student">
<input type="text" placeholder="Фамилия имя отчество" class="update_name">
<input type="text" placeholder="Группа" class="update_squad">
<button class = "update">Изменить студента</button>
    
<h3>Дисциплины</h3>
<table>
   <tr>
       <td>Id дисциплины</td>
       <td>Дисциплина</td>
       <td>Дата</td>
       <td>Преподаватель</td>
       <td>Группа</td>
   </tr>
    <?php
        $result2 = mysqli_query($dbcnx, "select * from disc");
        
        while ($r2 = mysqli_fetch_assoc($result2)){
        ?>
        <tr>
            <td><?php echo $r2["id_disc"]; ?></td>
            <td><?php echo $r2["disp"]; ?></td>
            <td><?php echo $r2["date"]; ?></td>
            <td><?php echo $r2["fio"]; ?></td>
            <td><?php echo $r2["squad"]; ?></td>
        </tr>
    <?php
        }
    ?>
</table>

<br>
<input type ="text" placeholder="Дисциплина" class="disc_add_disp">
<input type="text" placeholder="Дата" class="disc_add_date">
<input type="text" placeholder="Преподаватель" class="disc_add_fio">
<input type="text" placeholder="Группа" class="disc_add_squad">
<button class = "disc_add">Добавить дисциплину</button>
    
<br>
<br>

    
<h3>Уроки</h3>

   
    <?php
        $result3 = mysqli_query($dbcnx, "select * from disc");
        
        while ($r3 = mysqli_fetch_assoc($result3)){
        ?>
            <p>Группа: <?php echo $r3["squad"]; ?></p>
            <table>
                <tr>
                   <td>ID студента</td>
                   <td>дисциплина</td>
                   <td>Оценка</td>
                   <td>Пропуск</td>
             </tr>
                <tr>
                    <?php
                    $result4 = mysqli_query($dbcnx, 'select * from students, ocen where ocen.id_student = students.id_student and ocen.id_disc = "' . $r3["id_disc"] . '"');

                    while ($r4 = mysqli_fetch_assoc($result4)){
                    ?>
                    <td><?php echo $r4["id_student"]; ?></td>
                    <td><?php echo $r3["disp"]; ?></td>
                    <td><?php echo $r4["ball"]; ?></td>
                    <td><?php echo $r4["propusk"]; ?></td>
                </tr>
                <?php
                    }
                ?>
                <?php
        }
    ?>
            </table>
    <br>
<input type ="number" placeholder="ID студента" class="ocen_update_id_student">
<input type="text" placeholder="Оценка" class="ocen_update_ball">
<input type="text" placeholder="Пропуск" class="ocen_update_propusk">
<button class = "ocen_update">Поставить оценку и пропуск</button>
    

    

    



</BODY>
</HTML>