<!DOCTYPE html>
<html>
    <head>
        <title>Elenco Città</title>
        <!-- Bootstrap CSS -->
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
                            $citta=$_POST['citta'];
                            echo "<h1 class='card-title text-center mb-4'>Elenco studenti per la città selezionata </h1>";
                            $conn=mysqli_connect("localhost", "root", "", "StudentiFullStack");
                            if (!$conn) {
                                die("Impossibile connettersi al database: " . mysqli_connect_error($conn));
                            }

                            $sql ="SELECT * FROM studente WHERE istat =$citta";
                            $result = mysqli_query($conn, $sql);
                            ?>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Cognome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['nome'] . "</td>";
                                            echo "<td>" . $row['cognome'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-4">
                                <a href="gestionale.php" class="btn btn-primary">Torna indietro</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>