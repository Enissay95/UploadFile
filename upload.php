
<?php

//Je Sécurise mon formulaire
// Je vérifie si le formulaire est soumis comme d'habitude
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Securité en php
    // chemin vers un dossier sur le serveur qui va recevoir les fichiers uploadés (attention ce dossier doit être accessible en écriture)
    $uploadDir = 'uploads/';
    echo ' <pre> ' . var_dump($uploadDir) . ' </pre> ';
    // le nom de fichier sur le serveur est ici généré à partir du nom de fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    echo ' <pre> ' . var_dump($uploadFile) . ' </pre> ';
    // Je récupère l'extension du fichier
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    echo ' <pre> ' . var_dump($extension) . ' </pre> ';
    // Les extensions autorisées
    $authorizedExtensions = ['jpg', 'gif', 'png', 'webp'];
    var_dump($authorizedExtensions);
    // Le poids max géré par PHP par défaut est de 2M, mais ici c'est 1Mo max
    $maxFileSize = 1000000;

    $files = $_FILES['avatar'];
    echo ' <pre> ' . var_dump($files) . ' </pre> ';

    // Je sécurise et effectue mes tests

    /****** Si l'extension est autorisée *************/
    if ((!in_array($extension, $authorizedExtensions))) {
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou gif ou Png ou webp!';
    }

    /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
    if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
        $errors[] = "Votre fichier doit faire moins de 1M !";
    }

    /****** Si je n'ai pas d"erreur alors j'upload *************/
    /**
        TON SCRIPT D'UPLOAD
     */
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $uploadFile)) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        $NewFileName = uniqid("", true) . '.' .$uploadFile;
        $FileDestination = 'uploads/' . $NewFileName;

        //htmlspecialchars(basename($_FILES["avatar"]["name"]))

        echo "The file " . $FileDestination . " has been uploaded. Thank you $firstname $lastname";
    } else {
        echo "Sorry $firstname $lastname, there was an error uploading your file.";
    }
   
}

$files = scandir('uploads');
foreach ($files as $file) {
    echo '<img src="uploads/' . $file . '" alt="">';
}

?>
