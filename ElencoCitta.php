<!DOCTYPE html>
<html>
    <head>
        <title>Elenco Città</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body">
                            <?php 
                            $citta = $_POST['citta'];
                            $conn = mysqli_connect("localhost", "root", "", "StudentiFullStack");
                            
                            if (!$conn) {
                                echo "<div class='alert alert-danger'>Errore di connessione!</div>";
                            }

                            $sql = "SELECT s.nome, s.cognome, c.Nome as NomeCitta 
                                    FROM studente s, citta c 
                                    WHERE s.istat = c.CodiceIstat 
                                    AND s.istat = '$citta'
                                    ORDER BY s.cognome, s.nome";
                                
                            $result = mysqli_query($conn, $sql);
                            $nome_selezionato = mysqli_fetch_array($result);
                            ?>

                            <h2 class="text-center mb-4">
                                Studenti di <?php echo $nome_selezionato['NomeCitta']; ?>
                            </h2>

                            <table class="table table-striped">
                                <thead class="table-success">
                                    <tr>
                                        <th>Cognome</th>
                                        <th>Nome</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Ripunta al primo record
                                    mysqli_data_seek($result, 0);
                                    
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['cognome'] . "</td>";
                                        echo "<td>" . $row['nome'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="text-center mt-4">
                                <a href="ContoStudenti.php" class="btn btn-success">
                                    Torna indietro 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>