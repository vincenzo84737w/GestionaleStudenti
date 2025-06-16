
<!DOCTYPE html>
<html>
    <head>
        <title>Gestione</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h1 class="card-title text-center mb-4">Elenco studenti per città</h1>
                            <form action="ElencoCitta.php" method="post">
                                <div class="mb-3">
                                    <label for="citta" class="form-label">Scegli la città degli studenti da visualizzare:</label>
                                    <select class="form-select" name="citta" id="citta">
                                        <?php
                                        $conn=mysqli_connect("localhost", "root", "","StudentiFullStack");
                                        if (!$conn){
                                            die ("impossibile connettersi al database: " . mysqli_connect_error($conn));
                                        }
                                        $sql ="SELECT DISTINCT * FROM citta";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row=mysqli_fetch_array($result)){
                                        ?>
                                            <option value="<?php echo $row["CodiceIstat"]; ?>"> <?php echo $row["Nome"]; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" name="invio">Cerca</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>