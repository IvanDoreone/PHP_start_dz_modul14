<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Royal SPA saloon</title>
    
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<header>
    <div class="mainheader">
        <div class="header">
        <h1>Wellcome to the Royal Beauty SPA &#9825;</h1>
        </div>
        <div class="header1">
         <span id="tel">&#9990; +001 222 333 222  &#64; info@royalspa.com</span>
         </div>
        
    </div>
</header>
<a class="home" href="index.php">Вернуться на главную</a>
<a class="home" href="functions.php">&nbsp;&nbsp;&nbsp;На страничку пользовательских функций</a>
<?php
session_start();

$price1 = 2000;
$price2 = 3000;
$price3 = 4500;
$username = isset($_POST['login']) ? $_POST['login'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// обработка файла с паролями users.php
$usersAll = file('users.php');
$usersAll2 = implode($usersAll);
$usersAll3 = explode(" ", $usersAll2);
$usersAll4 = array_chunk($usersAll3, 2);
$keys = array_column($usersAll4, '0');
array_pop($keys);
$trimmed_keys = array_map('trim', $keys);
$values = array_column($usersAll4, '1');
$usersTrue = array_combine($trimmed_keys, $values);

if (null !== $username || null !== $password) {

    // Если пароль из users.php совпадает с паролем из формы
    if (sha1($password) == $usersTrue[$username]) {
    
         // Стартуем сессию:
        session_start(); 
        
   	    // Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION['auth'] = true; 
        
        // Пишем в сессию логин и id пользователя
        $_SESSION['id'] = $users['admin']['id']; 
        $_SESSION['login'] = $username; 
        $_SESSION['pass'] = $password;

    } else { ?>
    <div id="lk">
    <span class="regg"><?php echo 'Неверный пароль! Попробуйте снова на главной странице';?></span>
    <?php }
}
?>
    </div>
<?php
// авторизация нового пользователя
$newusername = isset($_POST['newlogin']) ? $_POST['newlogin'] : null;
$newpassword = isset($_POST['newpassword']) ? $_POST['newpassword'] : null;

if (null !== $newusername || null !== $newpassword) {
    //array_push($users, [$newusername => ['id' => $newusername, 'password' => $newpassword]]);
    //$users[$newusername] = ['id' => $newusername, 'password' => sha1($newpassword)];
if (!array_key_exists($newusername, $usersTrue)) {
    file_put_contents('users.php', [$newusername, ' ', sha1($newpassword), ' ', "\n"], FILE_APPEND);
    fclose('users.php');
}
   session_start(); 
   $_SESSION['auth'] = true; 
   
   $_SESSION['id'] = $users[$newusername]['id']; 
   $_SESSION['login'] = $newusername; 
   
}

$auth = isset($_SESSION['auth']) ? $_SESSION['auth'] : null;


// если авторизованы
if ($auth) {
?>
<div id="lk">
<form action="index.php" method="post">

<?php echo 'Добро пожаловать, '?>  
<span class="regg"><?php echo $_SESSION['login']?></span>
<?php echo ' !'; ?>
<input name="reset" type="submit" value="Выйти" id="reset">
</form>
<?php
if (isset($_POST['reset'])) {
    
    file_put_contents('time.php', null);
    $auth = false;
    session_destroy();
    //header("Refresh: 0");
}
?>
</div>



<?php



if ($auth) {
        $_SESSION['time'] = time();
        $timeout = $_SESSION['time'] + 86400;
        if (!isset(file('time.php')[0])) {
        file_put_contents('time.php', $timeout);
        } 
        $timeleft = file('time.php')[0] - time() -1;
    ?>
    <div class="lk1">
        <img src="uploads/heart.jpg" alt="" id="photobd">
        <div id="textbd">
        <h5><?php echo $_SESSION['login']?>!</h5>
        </h5>Для вас наше особое предложение: При покупке любой процедуры - доброе слово в подарок!</h5>
        <h5>Срок действия акции ограничен, истекает через <span clacc="timeleft"><?php echo gmdate("H:i:s", $timeleft) ?>;</span></h5>
        </div>
    </div>    
   
    <?php } ?>






<?php

// обработка файла с днями раждения bithdays.php
$bithdaysAll = file('bithdays.php');
$bithdaysAll2 = implode($bithdaysAll);
$bithdaysAll3 = explode(" ", $bithdaysAll2);
$bithdaysAll4 = array_chunk($bithdaysAll3, 2);
$keysbithdays = array_column($bithdaysAll4, '0');
array_pop($keysbithdays);
$trimmed_keysbithdays = array_map('trim', $keysbithdays);
$valuesbithdays = array_column($bithdaysAll4, '1');
$usersTruebithdays = array_combine($trimmed_keysbithdays, $valuesbithdays);

$bd = $_SESSION['login'];

if (isset($_POST['birthday'])) {
$burthday = $_POST['birthday'] ;
} 
else {
    $burthday = $usersTruebithdays[$bd];
}


if (!isset($_POST['birthday']) && !isset($burthday)) {
?>

<div id="lk1">
    
    <img src="uploads/bd.jpg" alt="" id="photobd">
    <div id="textbd">
    <h5 ><?php echo $_SESSION['login']?>, ведите ваш день рождения, и мы подготовим для вас что-то приятное!</h5>
<form action="#"  method="post" >
<p><input type="date" name="birthday" autocomplete="off" placeholder=""></p>
<p><input name="submit" type="submit" value="Подтвердить"></p>
</form>
</div>
</div>

<?php
} else {
?>

<?php
$current .= $bd;
$current .= ' ';
$current .= $burthday;
$current .= ' ';
$current .= "\n";



if (!isset($usersTruebithdays[$bd])) {
file_put_contents('bithdays.php', $current, FILE_APPEND);
fclose('users.php');
}
}



if (substr($usersTruebithdays[$bd], 5, 5) == date ("m-d")) {

$price1 = $price1 * 0.95;
$price2 = $price2 * 0.95;
$price3 = $price3 * 0.95;

?>
<div class="lk1">
    
    <img src="uploads/10procent.jpg" alt="" id="photobd">
    <div id="textbd">
    <h5 ><?php echo $_SESSION['login']?>, в честь Вашего дня рождения для вас скидка 5% на все!</h5>

</div>
</div>


<?php
} elseif (substr($usersTruebithdays[$bd], 5, 5) != date ("m-d") && isset($_POST['birthday']))  {
    ?>
    <div id="lk1">
    
    <img src="uploads/bd.jpg" alt="" id="photobd">
    <div id="textbd">
    <h5 ><?php echo $_SESSION['login']?>, Спасибо за информацию! в день рождения, Вас будет ждать скидка 5% на все!</h5>

</div>
</div>

<?php

}
?>


<div class="action">
    <img src="uploads/akcia.jpg" alt="procedura1" id="photaction">
    <div id="textaction">
        <h5>Акция красивая зима</h5>
        <p>При заказе любых двух процедур - третья в подарок!</p>
        <p><a href="#">Узнать подробности</a></p>

    </div>
</div>
<section>
<div class="action">  
<div id="image">
    <img src="uploads/spa1.jpg" alt="procedura1" id="photospa">
</div>
<div id="text" class="textoffer">
    
        <h5>СПА-процедуры для лица</h5>
         <p>
         Избавиться от следов усталости и недосыпания, убрать первые морщинки, сделать кожу более упругой – со всеми этими целями «справляются» методы СПА для лица. В салонах вам предложат скрабы и пилинги, витаминные и глиняные маски, массаж и аппаратные процедуры. Для закрепления результата стоит обратить внимание на лосьоны, кремы и косметику на основе морских минералов.
         </p>      
     
     
         <p>
        <span class="price">Cтоимоcть процедуры: </span> <span class="pricetag"><?php echo $price1?></span> <span class="priceorder"> <a href="#">Заказать</a> </span> </a>
        </p> 
     </div>
</div>
<div class="action">
</section>
<section>
<div class="action"> 
    <div id="image">
        <img src="uploads/spa2.jpg" alt="procedura1" id="photospa">
    </div>
    <div id="text" class="textoffer">
        
            <h5>СПА-процедуры для рук</h5>
             <p>
                Часто в СПА-программы для рук включают только маникюр, но, на самом деле, в них входит целый ритуал ухода за кожей рук – расслабляющие ванночки с добавлением морской соли, омолаживающие маски, массаж с аромамаслами. Большой популярностью в последние годы пользуется парафинотерапия, причем не только у женщин, но и мужчин, ведь ухоженные руки хочется иметь всем. Также в салоне вам помогут подобрать подходящий крем для рук, которым можно (и нужно) пользоваться дома.
             </p>      
         
         
             <p>
            <span class="price">Cтоимоcть процедуры: </span> <span class="pricetag"><?php echo $price2?></span> <span class="priceorder"> <a href="#">Заказать</a> </span> </a>
            </p> 
         </div>
    </div>
</div>   
    </section>
    <section>
    <div class="action">
        <div id="image">
            <img src="uploads/spa3.jpeg" alt="procedura1" id="photospa">
        </div>
        <div id="text" class="textoffer">
            
                <h5>СПА-процедуры для ног</h5>
                 <p>
                    Красивые ножки – «визитная карточка» женщины, поэтому различные SPA-комплексы для ног стали «мастхэвом» для дам любого возраста. В зависимости от индивидуальных особенностей и потребностей вам могут посоветовать противоотечные и антиварикозные процедуры. Ванночки с солью и эфирными маслами помогут избавиться от усталости в ногах, специальные обертывания (грязевые, водорослевые, даже шоколадные) – от некрасивых «звездочек» и чересчур заметных вен, ручной и гидромассаж будет способствовать обретению легкости походки.
                 </p>      
             
             
                 <p>
                <span class="price">Cтоимоcть процедуры: </span> <span class="pricetag"><?php echo $price3?></span> <span class="priceorder"> <a href="#">Заказать</a> </span> </a>
                </p> 
             </div>
        </div>
        </div>
        </section>
        <footer>
            <div class="foot">
            <div class="footer">
                <p class="price"><a class="footer_a" href="#">Контакты</a></p>
            </div>
            <div class="footer">
                <p class="price"><a class="footer_a" href="#">Наши специалисты</a></p>
            </div>
            <div class="footer">
                <p class="price"><a class="footer_a" href="#">Интерьер</a></p>
            </div>
            <div class="footer">
                <p class="price"><a class="footer_a" href="#">Тренды СПА</a></p>
            </div>
            <div class="footer">
                <p class="price"><a class="footer_a" href="#">Косметология</a></p>
            </div>
            <div class="footer">
                <p class="price"><a class="footer_a" href="#">Задать вопрос</a></p>
            </div>
        </div>
        </footer>



        <a href="index.php">Вернуться на главную</a>

<?php } 

?>



</body>
</html>