<?php


if(isset($_POST['valider'])){
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)||empty($_POST['email']) ||  empty($_POST['message'])){
        $msgError = "Veuillez remplir le champ avec une adresse mail valide !";
    }else{
        
        $file = $_FILES['img'];
        
        //vérifier si l'utilisateur a bien envoyé un fichier et qu'il n'y a pas d'erreur.
        if(isset($file) && $file['error'] == 0){

            //vérifier que le fichier ne depasse pas 8 Mo
            if($file['size'] < 1000000){

                //vérifier si l'extension est autorisé
                $fileInfo = pathinfo($file['name']);
                $extension = $fileInfo['extension'];
                $extensionAllowed = ['jpeg', 'jpg', 'png', 'webp', 'gif', 'svg'];
                if(in_array($extension, $extensionAllowed)){

                    //Vérifier si le dossier pour stocker l'image est présent
                    $path_upload = __DIR__.'/upload/';
                    if(is_dir($path_upload)){
                        move_uploaded_file($file['tmp_name'], $path_upload."image_".uniqid().".".$extension);
                        $msgSucces = "Votre fichier a bien été enregistré.";
                    }
                }else{
                    $msgError = "Votre fichier n'est pas autorisé !";
                }
            }
        }else{
            $msgError = " Veuillez vérifier votre fichier a envoyer";
        }
    }
}
