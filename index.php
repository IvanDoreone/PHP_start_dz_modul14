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
<a class="home" href="functions.php">&nbsp;&nbsp;&nbsp;На страничку пользовательских функций&nbsp;&nbsp;&nbsp;</a>
<?php

session_start();
if (!$_SESSION['auth']) {
file_put_contents('time.php', null);
}
?>

<?php
if ($_SESSION['auth']) { ?>
    <a class="home" href="progress.php">В личный кабинет</a>
    <?php
    }
if (!$_SESSION['auth']) { ?>


    <div id="lk">
        <div id="lk2">
            <a href="authorization.php">вход в личный кабинет</a>
        </div>
        <div id="lk2">
            ||
        </div>

        <div id="lk2">
            <a href="registration.php">регистрация</a>
        </div>
    </div>
<?php } 
else { ?>

    <div id="lk">
    <form action="index.php" method="post">

<?php echo 'Добро пожаловать, '?>  
<span class="regg"><?php echo $_SESSION['login']?></span>
<?php echo ' !'; ?>
<input name="reset" type="submit" value="Выйти" id="reset">
</form>
        
    </div>
    
<?php
}
if (isset($_POST['reset'])) {
    
    session_destroy();
    header("Refresh: 0");
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

    </div>
<div id="image">
    <img src="uploads/spa1.jpg" alt="procedura1" id="photospa">
</div>
<div id="text" class="textoffer">
    
        <h5>СПА-процедуры для лица</h5>
         <p>
         Избавиться от следов усталости и недосыпания, убрать первые морщинки, сделать кожу более упругой – со всеми этими целями «справляются» методы СПА для лица. В салонах вам предложат скрабы и пилинги, витаминные и глиняные маски, массаж и аппаратные процедуры. Для закрепления результата стоит обратить внимание на лосьоны, кремы и косметику на основе морских минералов.
         </p>      
     
     
         <p>
        <span class="price">Cтоимоcть процедуры: </span> <span class="pricetag">2000-00</span> <span class="priceorder"> <a href="#">Заказать</a> </span> </a>
        </p> 
     </div>
</div>
</section>
<section>
    <div id="image">
        <img src="uploads/spa2.jpg" alt="procedura1" id="photospa">
    </div>
    <div id="text" class="textoffer">
        
            <h5>СПА-процедуры для рук</h5>
             <p>
                Часто в СПА-программы для рук включают только маникюр, но, на самом деле, в них входит целый ритуал ухода за кожей рук – расслабляющие ванночки с добавлением морской соли, омолаживающие маски, массаж с аромамаслами. Большой популярностью в последние годы пользуется парафинотерапия, причем не только у женщин, но и мужчин, ведь ухоженные руки хочется иметь всем. Также в салоне вам помогут подобрать подходящий крем для рук, которым можно (и нужно) пользоваться дома.
             </p>      
         
         
             <p>
            <span class="price">Cтоимоcть процедуры: </span> <span class="pricetag">3500-00</span> <span class="priceorder"> <a href="#">Заказать</a> </span> </a>
            </p> 
         </div>
    </div>
    </section>
    <section>
        <div id="image">
            <img src="uploads/spa3.jpeg" alt="procedura1" id="photospa">
        </div>
        <div id="text" class="textoffer">
            
                <h5>СПА-процедуры для ног</h5>
                 <p>
                    Красивые ножки – «визитная карточка» женщины, поэтому различные SPA-комплексы для ног стали «мастхэвом» для дам любого возраста. В зависимости от индивидуальных особенностей и потребностей вам могут посоветовать противоотечные и антиварикозные процедуры. Ванночки с солью и эфирными маслами помогут избавиться от усталости в ногах, специальные обертывания (грязевые, водорослевые, даже шоколадные) – от некрасивых «звездочек» и чересчур заметных вен, ручной и гидромассаж будет способствовать обретению легкости походки.
                 </p>      
             
             
                 <p>
                <span class="price">Cтоимоcть процедуры: </span> <span class="pricetag">4500-00</span> <span class="priceorder"> <a href="#">Заказать</a> </span> </a>
                </p> 
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







</body>
</html>