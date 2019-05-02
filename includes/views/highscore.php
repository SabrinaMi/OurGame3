<?php
    echo $this->header;
?>

<h3>Highscore <button class="btn btn-info" onclick="window.history.back()">Zurück zum Spiel</button></h3><p></p>

<?php
    if($this->highscore == null){
        echo "Kein Highscore vorhanden.";
    } else {
        ?>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Points</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                foreach($this->highscore as $row){
                    echo '<tr><th scope="row">' . $i . '</th><td>' . $row["name"] . '</td><td>' . $row["points"] . '</td>';
                    $i++;
                }
            ?>
            </tbody>
        </table>
        <?php
    }
    echo $this->footer;
?>
