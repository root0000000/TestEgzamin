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

    if(!$connection){
        echo('db')
    }
    ?>
    <header>
        <h1>Zgłoszenia wydarzeń</h1>
    </header>
    <main>
        <section class="lewy">
            <h2>Personel</h2>
            <form action="" method="post">
                <input type="radio" name="radio" id="policjant" checked>
                <label for="policjant">policjant</label>
                <input type="radio" name="radio" id="ratownik">
                <label for="ratownik">ratownik</label>
                <button>Pokaż</button>
            </form>
            <table>
                <tr>
                    <th>id</th>
                    <th>imie</th>
                    <th>nazwisko</th>
                </tr>
            </table>
        </section>
        <section class="prawy">
            <h2>Nowe zgłoszenie</h2>
            <ol></ol>
            <form action="" method="post">
                <label for="inp">Wybierz id osoby z listy: </label>
                <input type="number" id="inp">
                <button>Dodaj zgłoszenie</button>
            </form>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 000000000</p>
    </footer>
</body>

</html>