
<?php
session_start();

if (!isset($_SESSION['aukerak'])) {
    $_SESSION['aukerak'] = [
        "Bai" => 0,
        "Ez" => 0,
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['option'])) {
    $response = $_POST['option'];
    if (isset($_SESSION['aukerak'][$response])) {
        $_SESSION['aukerak'][$response]++;
    }
}

$totalVotes = array_sum($_SESSION['aukerak']);
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
        <p>Zure erantzuna erregistratu dugu.</p>
        <canvas id="resultsChart" width="400" height="400"></canvas>
        <p>Jasotako bozken guztira: <?php echo $totalVotes; ?></p>
        <p><a href="INKESTA-html.html">Bueltatu bozkatzeko orrira</a></p>
    </div>
    <script>
        const data = {
            labels: ["Bai", "Ez"],
            datasets: [{
                label: 'Bozkak',
                data: [
                    <?php echo $_SESSION['responses']['Bai']; ?>,
                    <?php echo $_SESSION['responses']['Ez']; ?>,
                ],
                backgroundColor: ['#4CAF50', '#F44336', '#FFC107']
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
