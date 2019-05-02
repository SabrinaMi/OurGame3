<?php

echo $this->header;
?>

    <div class="board-container flex-container flex-column flex-center">
        <input type="hidden" id="username1" value="<?php echo $this->username1 ?>">
        <input type="hidden" id="username2" value="<?php echo $this->username2 ?>">
        <div class ="title">TIC TAC TOE</div>
        <div class="btn-group">
            <button class="btn btn-info m-4" onclick="window.location.reload()">Try refreshing!</button>
            <button class="btn btn-success m-4" onclick="window.location='/OurGame2/highscore'">Zum Highscore!</button>
            <button class="btn btn-danger m-4" onclick="window.location='/OurGame2/logout'">Ausloggen!</button>
        </div>
        <div style="font-size: 14pt; background-color: rgba(255,255,255,0.5); padding: 5px; margin-top: 5px;">
            Spieler 1: <?php echo $this->username1 ?><br>
            Spieler 2: <?php echo $this->username2 ?>
        </div>
        <div id="winner-display" class="m-4" style="display:none">
            <h1 class="heading "> Das Spiel ist vorbei, Sie haben gewonnen!</h1>
        </div>
        <div class="board flex-container flex-wrap">
            <div class="square flex-center flex-container rounded-corners top-left-filler" data="1"></div>
            <div class="square flex-center flex-container rounded-corners top-mid-filler" data="2"></div>
            <div class="square flex-center flex-container rounded-corners top-right-filler" data="3"></div>
            <div class="square flex-center flex-container rounded-corners mid-left-filler" data="4"></div>
            <div class="square flex-center flex-container rounded-corners mid-mid-filler" data="5"></div>
            <div class="square flex-center flex-container rounded-corners mid-right-filler" data="6"></div>
            <div class="square flex-center flex-container rounded-corners bottom-left-filler" data="7"></div>
            <div class="square flex-center flex-container rounded-corners bottom-mid-filler" data="8"></div>
            <div class="square flex-center flex-container rounded-corners" data="9"></div>
            <div class="credits">This game was created by Nina Pfister, Sabrina Mitternöckler and Theresa Schmotz.</br>Enjoy! </div>
        </div>
    </div>


<?php

echo $this->footer;

?>