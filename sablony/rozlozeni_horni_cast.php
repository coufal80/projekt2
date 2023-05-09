<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        <?= htmlspecialchars($titulek) ?>
    </title>
    <meta name="description" content="<?= $popis ?>" />
    <link rel="stylesheet" href="styl.css" type="text/css" />
</head>

<body>

    <header>
        <h1>
            <?= htmlspecialchars($titulek) ?>
        </h1>
    </header>

    <nav>
        <ul>
            <li><a href="home.php">Domů</a></li>
            <li><a href="klienti_vypis.php">Klienti</a></li>
            <li><a href="sluzby_vypis.php">Služby</a></li>
        </ul>
        <div class="cistic"></div>
    </nav>


    <article>

        <!-- tato šablona se vklada pred kazdou podtranku -->