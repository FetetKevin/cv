<?php
// Code PHP pour traiter l'envoi de l'email
if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['envoyer'])) {
    // Récupération des variables et sécurisation des données
    // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
    $nom     = htmlentities($_POST['name']);
    $email   = htmlentities($_POST['email']);
    $message = htmlentities($_POST['message']);


        // Variables concernant l'email
        $destinataire = 'fetetkevin@gmail.com'; // Adresse email du webmaster (à personnaliser)
        $sujet = 'Nouveau Message (page contacts)'; // Titre de l'email
        $contenu = '<html><head><title>Titre du message</title></head>';
        $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
        $contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
        $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
        $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
        $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)

        // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";

        // Envoyer l'email
        mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email

        header("Location:index.html?ok");
    }
    else {
        header('Location:index.html?pasok');
    }
