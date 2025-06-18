<!DOCTYPE html>
<html>
    <head>
        <title>Inserimento Studente</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="card-title text-center mb-4">Inserisci Studente</h2>
                            
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="nome" 
                                           placeholder="Inserisci Nome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cognome" class="form-label">Cognome</label>
                                    <input type="text" class="form-control" name="cognome" 
                                           placeholder="Inserisci Cognome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" name="telefono" 
                                           placeholder="Inserisci Numero" required>
                                </div>
                                <div class="mb-3">
                                    <label for="codiceFiscale" class="form-label">Codice Fiscale</label>
                                    <input type="text" class="form-control" name="codiceFiscale" 
                                           placeholder="Inserisci Codice Fiscale" required>
                                </div>
                                <div class="mb-3">
                                    <label for="citta" class="form-label">Città</label>
                                    <select class="form-select" name="citta" required>
                                        <option value="">Seleziona una città</option>
                                        <?php
                                        $conn = mysqli_connect("localhost", "root", "", "StudentiFullStack");
                                        $query = "SELECT CodiceIstat, Nome FROM citta ORDER BY Nome";
                                        $result = mysqli_query($conn, $query);
                                        
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['CodiceIstat'] . "'>" . 
                                                 $row['Nome'] . "</option>";
                                        }
                                        mysqli_close($conn);
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" name="email" 
                                           placeholder="Inserisci E-mail" required>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" class="btn btn-success">
                                        Inserisci
                                    </button>
                                    <a href="gestionale.php" class="btn btn-secondary">Indietro</a>
                                </div>
                            </form>

                            <?php
                            if(isset($_POST['submit'])) {
                                $conn = mysqli_connect("localhost", "root", "", "StudentiFullStack");
                                if (!$conn) {
                                    die("Impossibile connettersi al database: " . mysqli_connect_error());
                                }

                                $nome = $_POST['nome'];
                                $cognome = $_POST['cognome'];
                                $codiceFiscale = $_POST['codiceFiscale'];
                                $telefono = $_POST['telefono'];
                                $email = $_POST['email'];
                                $citta = $_POST['citta'];

                                $controlloCF = "SELECT CodiceFiscale FROM studente 
                                              WHERE CodiceFiscale='$codiceFiscale'";
                                $resultControllo = mysqli_query($conn, $controlloCF);

                                if(mysqli_num_rows($resultControllo) > 0) {
                                    echo "<div class='alert alert-danger mt-3'>
                                          Codice Fiscale già esistente!</div>";
                                } else {
                                    if (empty($nome) || empty($cognome) || empty($codiceFiscale) || 
                                        empty($telefono) || empty($email)) {
                                        echo "<div class='alert alert-danger mt-3'>
                                              Tutti i campi sono obbligatori!</div>";
                                    } else {
                                        $sql = "INSERT INTO studente (nome, cognome, codiceFiscale, 
                                                                    telefono, email, istat) 
                                               VALUES ('$nome', '$cognome', '$codiceFiscale', 
                                                       '$telefono', '$email', '$citta')";
                                        
                                        if(mysqli_query($conn, $sql)) {
                                            echo "<div class='alert alert-success mt-3'>
                                                  Studente inserito con successo!</div>";
                                        } else {
                                            echo "<div class='alert alert-danger mt-3'>
                                                  Errore nell'inserimento: " . mysqli_error($conn) . 
                                                  "</div>";
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>