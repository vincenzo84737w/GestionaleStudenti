
<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Elenco Studenti per Città</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-body p-4">
                            <!-- Header con icona -->
                            <div class="text-center mb-4">
                                <i class="bi bi-buildings-fill text-success fs-1 mb-3"></i>
                                <h2 class="card-title">Elenco Studenti per Città</h2>
                            </div>

                            <form action="ElencoCitta.php" method="post">
                                <!-- Select città con icona -->
                                <div class="mb-4">
                                    <label class="form-label d-flex align-items-center">
                                        <i class="bi bi-geo-alt-fill text-success me-2"></i>
                                        Seleziona la città:
                                    </label>
                                    <select class="form-select form-select-lg" name="citta" id="citta" required>
                                        <option value="" selected disabled>Scegli una città...</option>
                                        <?php
                                        $conn = mysqli_connect("localhost", "root", "", "StudentiFullStack");
                                        if (!$conn) {
                                            die("<div class='alert alert-danger'>
                                                <i class='bi bi-exclamation-triangle-fill me-2'></i>
                                                Errore di connessione: " . mysqli_connect_error() . "</div>");
                                        }

                                        $sql = "SELECT CodiceIstat, Nome FROM citta ORDER BY Nome";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<option value='" . htmlspecialchars($row["CodiceIstat"]) . "'>" . 
                                                 htmlspecialchars($row["Nome"]) . "</option>";
                                        }
                                        mysqli_close($conn);
                                        ?>
                                    </select>
                                </div>

                                <!-- Pulsanti -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success btn-lg" name="invio">
                                        <i class="bi bi-search me-2"></i>
                                        Cerca Studenti
                                    </button>
                                    <a href="gestionale.php" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-left me-2"></i>
                                        Torna al Menu
                                    </a>
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
