<?php
    $conn = mysqli_connect("localhost", "root", "", "egzamin3");

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div class="baner">
        <h1>BIURO PODRÓŻY</h1>
    </div>
    <div class="bloki">
        <div class="blok">
            <h2>KONTAKT</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555666777</p>
        </div>
        <div class="blok">
            <h2>GALERIA</h2>
            <?php
                $query = 'SELECT * FROM zdjecia ORDER BY podpis DESC';

                if ($result = $conn->query($query)) {
                
                    while ($row = $result->fetch_assoc()) {
                        $nazwa = $row["nazwaPliku"];
                        $alt = $row["podpis"];

                        echo '<img src="'.$nazwa.'" alt="'.$alt.'">';
                    }
                }
            ?>
        </div>
        <div class="blok">
            <h2>PROMOCJE</h2>
            <table>
            <tr>
                <th>Jesień</th>
                <th>Grupa 4+</th>
                <th>Grupa 10+</th>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
            </table>
        </div>
    </div>
    <div class="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php
                $query = 'SELECT * FROM wycieczki WHERE dostepna=1';

                if ($result = $conn->query($query)) {
                
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $data = $row["dataWyjazdu"];
                        $cel = $row["cel"];
                        $cena = $row["cena"];

                        echo "$id. $data, $cel, cena: $cena </br>";
                    }
                }
                mysqli_close($conn);
            ?>
    </div>
    <div class="stopka">
        Stronę wykonał: ja
    </div>
</body>
</html>