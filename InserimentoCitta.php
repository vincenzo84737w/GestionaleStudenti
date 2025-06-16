<html>
 <head>
        <title>Inserimento Città</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="card-title text-center mb-4">Inserisci Città</h2>
                            
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="codiceIstat" class="form-label">Codice ISTAT</label>
                                    <input type="text" class="form-control" name="codiceIstat" maxlength="6" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome Città</label>
                                    <input type="text" class="form-control" name="nome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="codiceCatastale" class="form-label">Codice Catstale</label>
                                    <input type="text" class="form-control" name="codiceCatastale"  maxlength="4"  required>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" class="btn btn-success">Inserisci</button>
                                    <a href="gestionale.php" class="btn btn-secondary">Indietro</a>
                                </div>
                            </form>
                <?php
                if(isset($_POST['submit'])){
                    $conn=mysqli_connect("localhost", "root", "", "StudentiFullStack");
                    if (!$conn) {
                        die("Impossibile connettersi al database: " . mysqli_connect_error($conn));
                    }
                    $codiceIstat = $_POST['codiceIstat'];
                    $nome = $_POST['nome'];
                    $codiceCatastale = $_POST['codiceCatastale'];


                    $controlloCodice="SELECT codiceIstat FROM citta WHERE codiceIstat='$codiceIstat'";
                    $resultControllo = mysqli_query($conn, $controlloCodice);

                    if(mysqli_num_rows($resultControllo) > 0) {
                        echo "<div class='alert alert-danger mt-3'>Codice ISTAT già esistente!</div>";
                    } else {
                        if (empty($codiceIstat) || empty($nome) || empty($codiceCatastale)) {
                            echo "<div class='alert alert-danger mt-3'>Tutti i campi sono obbligatori!</div>";
                        } else {
                            $sql = "INSERT INTO citta (CodiceIstat, Nome, CodiceCatastale) VALUES ('$codiceIstat', '$nome', '$codiceCatastale')";
                            
                            if(mysqli_query($conn, $sql)) {
                                echo "<div class='alert alert-success mt-3'>Città inserita con successo!</div>";
                            } else {
                                echo "<div class='alert alert-danger mt-3'>Errore nell'inserimento: " . mysqli_error($conn) . "</div>";
                            }
                        }
                    }
                }
                ?>
        </body>     
</html>