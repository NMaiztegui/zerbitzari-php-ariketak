<?php
session_start();

if (!isset($_SESSION['aukerak'])) {
    $_SESSION['aukerak'] = [
        "Bai" => 0,
        "Ez" => 0,
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['option'])) {
    $ernatzuna = $_POST['option'];
    if (isset($_SESSION['aukerak'][$ernatzuna])) {
        $_SESSION['aukerak'][$ernatzuna]++;
        echo 'Zure erantzuna erregistratu da';
    }
}

$botoak = array_sum($_SESSION['aukerak']);
?>

<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkesta emaitzak</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <h1>Inkesta. Inkestaren emaitzak</h1>
    <div class="container">
        <canvas id="resultsChart" width="200" height="200"></canvas>
        <p>Jasotako bozken guztira: <?php echo $botoak; ?></p>
        <p><a href="INKESTA-html.html">Bueltatu bozkatzeko orrira</a></p>
    </div>
    <script>
        const data = {
            labels: ["Bai", "Ez"],
            datasets: [{
                label: 'Bozkak',
                data: [
                    <?php echo $_SESSION['aukerak']['Bai']; ?>,
                    <?php echo $_SESSION['aukerak']['Ez']; ?>,
                ],
                backgroundColor: ['#4CAF50', '#F44336']
            }]
        };

        const config = {
            type: 'pie',
            data: data
        };

        new Chart(document.getElementById('resultsChart'), config);
    </script>
</body>

</html>
