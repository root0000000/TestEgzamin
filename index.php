<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZGŁOSZENIA</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'zgloszenia';

    $connection = mysqli_connect($server, $user, $password, $database);

    if (!$connection) {
        echo mysqli_error($connection);
    }
    ?>
    <header>
        <h1>Zgłoszenia wydarzeń</h1>
    </header>
    <main>
        <section class="lewy">
            <h2>Personel</h2>
            <form method="post">
                <input type="radio" name="status" id="policjant" value="policjant" checked>
                <label for="policjant">policjant</label>
                <input type="radio" name="status" id="ratownik" value="ratownik">
                <label for="ratownik">ratownik</label>
                <button>Pokaż</button>
            </form>
            <?php
            if (isset($_POST["status"])) {
                $option = $_POST['status'];
                echo "<h3>Wybrano opcję: $option</h3>";
                $query = "SELECT personel.id, personel.imie, personel.nazwisko FROM personel WHERE personel.status = '{$option}'";
                echo
                    "<div id='table1'>
                    <table>
                <tr>
                    <th>id</th>
                    <th>imie</th>
                    <th>nazwisko</th>
                </tr>";

                $result = mysqli_query($connection, $query);
                $rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['imie'] . "</td>";
                    echo "<td>" . $row['nazwisko'] . "</td>";
                    echo "</tr>";
                }
                $result = mysqli_query($connection, $query);

                echo "</table> </div>";
            }
            ?>
        </section>
        <section class="prawy">
            <h2>Nowe zgłoszenie</h2>
            <ol>
                <?php
                $query = 'SELECT personel.id, personel.nazwisko FROM personel WHERE personel.id NOT IN (SELECT rejestr.id_personel FROM rejestr);';
                $wynik = mysqli_query($connection, $query);

                for ($i = 0; $i < mysqli_num_rows($wynik); $i++) {
                    $dane = mysqli_fetch_array($wynik);
                    echo "<li>$dane[id] $dane[nazwisko]</li>";
                }
                ?>
            </ol>
            <form action="" method="post">
                <label for="inp">Wybierz id osoby z listy: </label>
                <input type="number" id="inp" name="Osoba">
                <button type="submit">Dodaj zgłoszenie</button>
                <?php
                if (isset($_POST["Osoba"])) {
                    $option1 = $_POST['Osoba'];
                    $query1 = "INSERT INTO rejestr(data, id_personel, id_pojazd) VALUES (CURRENT_DATE, $option1, 14);";
                    $result = mysqli_query($connection, $query1);
                }
                $query = mysqli_close($connection)
                    ?>
            </form>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 000000000</p>
    </footer>
</body>

</html>
