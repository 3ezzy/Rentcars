<?php
if (isset($_POST['edit_contrat'])) {
    //var_dump($_POST);
    $Num_Contrat = $_POST['Num_Contrat'];
    $id_voiture = $_POST['id_voiture'];
    $NumClient = $_POST['NumClient'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
     // Convertir les dates en objets DateTime
     $debut = new DateTime($date_debut);
     $fin = new DateTime($date_fin);
 
     // Calculer la différence entre les deux dates
     $difference = $debut->diff($fin);
 
     // Récupérer la différence en jours
     $duree = $difference->days; 



    try {
        if (!empty($Num_Contrat) && !empty($date_debut) && !empty($date_fin)) {
            require_once "config.php";

            // Prepare the SQL statement with placeholders
            $stmt = $connection->prepare("UPDATE contrats SET date_debut=?,date_fin=?,duree=?,NumClient=?,id_voiture=? WHERE Num_Contrat=?");





            // Bind parameters with types (s = string)
            $stmt->bind_param("ssiisi", $date_debut, $date_fin, $duree, $NumClient, $id_voiture, $Num_Contrat);

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
                <h3 class="text-xl font-semibold text-white">Edit une contrat</h3>
            </div>
            <?php
            require_once 'config.php';
            $id = $_GET['Num_Contrat'];
            $stmt = $connection->prepare("SELECT * FROM contrats WHERE Num_Contrat = ?");
            if (!$stmt) {
                die("Erreur lors de la préparation de la requête : " . $connection->error);
            }
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $car = $result->fetch_assoc();
            }
            ?>

            <div class="p-6">
                <form method="POST" class="space-y-4">




                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">modele</label>
                        <?php
                        require_once 'config.php';
                        $sql = "select * from  voitures ";
                        $result = $connection->query($sql);
                        ?>
                        <select name="id_voiture" id="" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Choisissez une catégorie</option>
                            <?php
                            if ($result->num_rows > 0) {
                                $rows = $result->fetch_all(MYSQLI_ASSOC);
                                foreach ($rows as $row) {
                                    if ($car['id_voiture'] == $row['id']) {
                            ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['marque'] . " " . $row['modele'] ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['marque'] . " " . $row['modele'] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>

                        </select>
                    </div>
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom du Client</label>
                        <?php
                        require_once 'config.php';
                        $sql = "select * from clients";
                        $result2 = $connection->query($sql);
                        ?>
                        <select name="NumClient" id="" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Choisissez une catégorie</option>
                            <?php
                            if ($result->num_rows > 0) {
                                $clients = $result2->fetch_all(MYSQLI_ASSOC);
                                foreach ($clients as $client) {
                                    if ($car['NumClient'] == $client['NumClient']) {
                            ?>
                                        <option selected value="<?= $client['NumClient'] ?>"><?= $client['Nom'] ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?= $client['NumClient'] ?>"><?= $client['Nom'] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>

                        </select>
                    </div>

                    <!-- Date de Début -->
                    <div>
                        <label for="date_debut" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de Début</label>
                        <input type="date" name="date_debut" id="date_debut" value="<?= $car['date_debut'] ?>"
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>

                    <!-- Date de Fin -->
                    <div>
                        <label for="date_fin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de Fin</label>
                        <input type="date" name="date_fin" id="date_fin" value="<?= $car['date_fin'] ?>"
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>
                    <input type="hidden" name="Num_Contrat" value="<?= $car['Num_Contrat'] ?>">

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <input name="edit_contrat" type="submit"
                            class="px-6 py-2 text-white bg-blue-700 rounded-lg hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>