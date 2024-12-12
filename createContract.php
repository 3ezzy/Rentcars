<?php
if (isset($_POST['add_contract'])) {
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    
    $num_client = $_POST['num_client'];
    $num_immatriculation = $_POST['num_immatriculation'];
    // Convertir les dates en objets DateTime
    $debut = new DateTime($date_debut);
    $fin = new DateTime($date_fin);

    // Calculer la différence entre les deux dates
    $difference = $debut->diff($fin);

    // Récupérer la différence en jours
    $duree = $difference->days; 


    try {
        if (!empty($num_client) && !empty($date_debut) && !empty($date_fin) && !empty($duree) && !empty($num_immatriculation)) {
            require_once "config.php";

            // Prepare the SQL statement with placeholders
            $stmt = $connection->prepare("INSERT INTO contrats VALUES (null, ?, ?, ?,?,?)");

            // Bind parameters with types (s = string)
            $stmt->bind_param("ssiis", $date_debut, $date_fin, $duree, $num_client, $num_immatriculation);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record inserted successfully!";
                header('Location: contrats.php');
                exit;
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Please fill in all fields.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Go Rent</title>
</head>

<body>
    <div class="relative min-h-screen">
        <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>
        <?php
        include "sidebar.php"
        ?>

        <div class="w-full max-w-2xl mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="px-6 py-4 rounded-t-lg bg-gradient-to-r from-blue-600 to-blue-800">
                <h3 class="text-xl font-semibold text-white">Ajouter un Contrat</h3>
            </div>
            <div class="p-6">
                <form method="POST" class="space-y-4">
                    <?php
                    require_once 'config.php';
                    $sql = "SELECT * FROM Clients";
                    $clients = $connection->query($sql);
                    ?>
                    <!-- Numéro de Client -->
                    <div>
                        <label for="num_client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de Client</label>
                        <select name="num_client" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">choisissez une Client</option>
                            <?php
                            foreach ($clients as $client) {
                                echo "<option value='" . $client['NumClient'] . "'>" . $client['Nom'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                    require_once 'config.php';
                    $sql = "SELECT * FROM voitures";
                    $voitures = $connection->query($sql);
                    ?>
                    <!-- Numéro d'Immatriculation -->
                    <div>
                        <label for="num_immatriculation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">modele</label>
                        <select name="num_immatriculation" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">choisissez une modele</option>
                            <?php
                            foreach ($voitures as $voiture) {
                                echo "<option value='" . $voiture['Num_immatriculation'] . "'>" . $voiture['modele'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Date de Début -->
                    <div>
                        <label for="date_debut" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de Début</label>
                        <input type="date" name="date_debut" id="date_debut" value=""
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>

                    <!-- Date de Fin -->
                    <div>
                        <label for="date_fin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de Fin</label>
                        <input type="date" name="date_fin" id="date_fin" value=""
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>


                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <input name="add_contract" type="submit"
                            class="px-6 py-2 text-white bg-blue-700 rounded-lg hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>