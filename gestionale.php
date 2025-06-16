<!DOCTYPE html>
<html>
    <head>
        <title>Gestione</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .city-header {
                background: linear-gradient(to right, #e8f5e9, #ffffff);
                border-radius: 10px;
                padding: 2rem;
                margin-bottom: 2rem;
            }
            .text-accent {
                color: #198754;
                font-size: 1.4rem;
                font-weight: 500;
                text-align: center;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }
            .add-btn {
                width: 60px;
                height: 60px;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 12px rgba(25, 135, 84, 0.15);
            }
            .add-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 16px rgba(25, 135, 84, 0.2);
            }
            .city-icon {
                font-size: 1.8rem;
                margin-right: 0.5rem;
            }
        </style>
    </head>
    <body class="bg-light">
        
        <!--inserimento città-->
        <div class="container-fluid p-4">
            <div class="city-header">
                <label class="text-accent">
                    <i class="bi bi-buildings-fill city-icon"></i>
                    Gestione Anagrafica Città
                </label>
                <div class="text-center d-flex align-items-center justify-content-center gap-3">
                    <span class="text-success fs-5">Vuoi inserire una città?</span>
                    <a href="InserimentoCitta.php" class="btn btn-success rounded-circle add-btn" 
                       title="Aggiungi nuova città">
                        <i class="bi bi-plus-lg fs-3"></i>
                    </a>
                </div>
            </div>
        </div>
            <!--inserimento studente-->
        <div class="container-fluid p-4">
    <div class="city-header">
        <label class="text-accent">
            <i class="bi bi-person-fill city-icon"></i>
            Gestione Anagrafica Studenti
        </label>
        <div class="text-center d-flex align-items-center justify-content-center gap-3">
            <span class="text-success fs-5">Vuoi inserire uno studente?</span>
            <a href="InserimentoStudente.php" class="btn btn-success rounded-circle add-btn" 
               title="Aggiungi nuovo studente">
                <i class="bi bi-plus-lg fs-3"></i>
            </a>
        </div>
    </div>
</div>
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