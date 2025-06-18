
<!DOCTYPE html>
<html>
    <head>
        <title>Numero Studenti per Città</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="text-center mb-4">
                                <i class="bi bi-graph-up text-success"></i>
                                Numero Studenti per Città
                            </h2>

                            <table class="table table-striped">
                                <thead class="table-success">
                                    <tr>
                                        <th>Nome Città</th>
                                        <th class="text-center">Numero Studenti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "StudentiFullStack");
                                    
                                    if (!$conn) {
                                        echo "<div class='alert alert-danger'>Errore di connessione!</div>";
                                        exit();
                                    }

                                    $sql = "SELECT c.Nome, COUNT(s.istat) as NumeroStudenti 
                                           FROM citta c 
                                           LEFT JOIN studente s ON c.CodiceIstat = s.istat 
                                           GROUP BY c.Nome 
                                           ORDER BY c.Nome";

                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['Nome'] . "</td>";
                                        echo "<td class='text-center'>" . $row['NumeroStudenti'] . "</td>";
                                        echo "</tr>";
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>

                            <div class="text-center mt-4">
                                <a href="gestionale.php" class="btn btn-success">
                                    Torna al Menu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>