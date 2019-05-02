let winner = false;
 /* Code included inside $( document ).ready() will only run once the page Document Object Model
  *is ready for JavaScript code to execute*/
$( document ).ready(function() {

    let player1='<i class="fa fa-times"></i>';
    let player2='<i class="fa fa-circle"></i>';

    let username1 = $('#username1').val();
    let username2 = $('#username2').val();


    let currentTurn =1;
    let movesMade =0;

    /*nimm jedes quadrat auf der seite und addiere es zu dieser variable*/
    let sqr = $(".square");

    /*new click event on every square we click*/
    sqr.on('click',function (event) {
        movesMade++;

        /*if current turns equal to one we know its player's turn*/
        if (currentTurn ===1){
            event.target.innerHTML = player1;
            event.target.style.color = "#fea8b3";
            event.target.style.background = "#9a8262";
            currentTurn++;
        }else{
            event.target.innerHTML = player2;
            event.target.style.color = "#5b5426";
            event.target.style.background = "#e8ca93";
            currentTurn--;

        }

        /*Der gewinner bekommt 100 pt, der verlierer 50 pt*/
        if(!winner) {
            if (checkForWinner(movesMade)) {
                let theWinner = currentTurn === 1 ? player2 : player1;
                if(theWinner == player1){
                    fetchHighscoreData({
                        username1: username1,
                        username2: username2,
                        points1: 100,
                        points2: 20
                    });
                } else if(theWinner == player2){
                    fetchHighscoreData({
                        username1: username1,
                        username2: username2,
                        points1: 20,
                        points2: 100
                    });
                } else {
                    fetchHighscoreData({
                        username1: username1,
                        username2: username2,
                        points1: 20,
                        points2: 20
                    });
                }
                document.getElementById('winner-display').style.display = 'block';
                sqr.unbind();
            }
            ;
        }
    });

    /*fetch the data, to display in highscore class*/
   function fetchHighscoreData(data){
       $.ajax({
           url: "/OurGame2/index",
           method: "POST",
           data: data
       });
    }
    /*check for winner after 4 moves+*/
    function checkForWinner(movesMade) {
        if (movesMade>4) {
            let moves = Array.prototype.slice.call($(".square"));
            let results = moves.map(function (square) {
                return square.innerHTML;
            });

            /*Die Winning combos welche  möglich sind*/
            let winningCombos = [
                [0, 1, 2],
                [3, 4, 5],
                [6, 7, 8],
                [0, 3, 6],
                [1, 4, 7],
                [2, 5, 8],
                [0, 4, 8],
                [2, 4, 6],
            ];
            return winningCombos.find(function(combo) {
                if (results[combo[0]] !== "" && results[combo[1]] !== "" && results[combo[2]] !== "" && results[combo[0]] === results[combo[1]] && results[combo[1]] === results[combo[2]]) {
                    winner = true;
                    return true;
                } else {
                    return false;
                }
            });
        }
    }
});