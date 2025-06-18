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
            .modal-backdrop.show {
            opacity: 1;
            background-color: #ffffff;
        }
        
        body.modal-open {
            overflow: hidden;
        }
        .feature-card {
            background: linear-gradient(to right, #e8f5e9, #ffffff);
            border-radius: 10px;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(25, 135, 84, 0.2);
        }
        </style>
    </head>
    <body class="bg-light">
        
       <!-- Modal di Benvenuto -->
        <div class="modal fade" id="welcomeModal" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content bg-light shadow-lg border-0">
                    <div class="modal-body p-4 text-center">
                        <div class="mb-4">
                            <i class="bi bi-emoji-smile text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="mb-3 text-success fw-bold">Benvenuto!</h4>
                        <p class="text-muted mb-4">Premi il pulsante per accedere al gestionale</p>
                        <button type="button" 
                                class="btn btn-success btn-lg w-100 rounded-3" 
                                data-bs-dismiss="modal">
                            Accedi
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layout Principale -->
        <div class="container mt-5">
            <!-- Prima Riga: Statistiche e Visualizzazione -->
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="d-flex flex-column align-items-center">
                            <i class="bi bi-graph-up text-success fs-1 mb-3"></i>
                            <h3 class="text-success mb-3">Statistiche Studenti</h3>
                            <p class="text-muted mb-4">Visualizza il numero di studenti per città</p>
                            <a href="NumeroStudenti.php" class="btn btn-success rounded-pill px-4">
                                <i class="bi bi-bar-chart-fill me-2"></i>
                                Vedi Statistiche
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="d-flex flex-column align-items-center">
                            <i class="bi bi-list-ul text-success fs-1 mb-3"></i>
                            <h3 class="text-success mb-3">Elenco Studenti</h3>
                            <p class="text-muted mb-4">Visualizza gli studenti per città</p>
                            <a href="ContoStudenti.php" class="btn btn-success rounded-pill px-4">
                                <i class="bi bi-eye me-2"></i>
                                Vedi Elenco
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seconda Riga: Inserimenti -->
            <div class="row g-4">
                
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="d-flex flex-column align-items-center">
                            <i class="bi bi-buildings-fill text-success fs-1 mb-3"></i>
                            <h3 class="text-success mb-3">Inserisci Città</h3>
                            <p class="text-muted mb-4">Aggiungi una nuova città al database</p>
                            <a href="InserimentoCitta.php" class="btn btn-success rounded-pill px-4">
                                <i class="bi bi-plus-lg me-2"></i>
                                Nuova Città
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Colonna Inserimento Studenti -->
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="d-flex flex-column align-items-center">
                            <i class="bi bi-person-fill text-success fs-1 mb-3"></i>
                            <h3 class="text-success mb-3">Inserisci Studente</h3>
                            <p class="text-muted mb-4">Aggiungi un nuovo studente al database</p>
                            <a href="InserimentoStudente.php" class="btn btn-success rounded-pill px-4">
                                <i class="bi bi-plus-lg me-2"></i>
                                Nuovo Studente
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Modifica lo script alla fine del file -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Prendi l'URL corrente
                const currentPath = window.location.pathname;
                
                if (!sessionStorage.getItem('modalShown_' + currentPath)) {
                    var myModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
                    myModal.show();
                    sessionStorage.setItem('modalShown_' + currentPath, 'true');
                }
            });
        </script>

    </body>
</html>