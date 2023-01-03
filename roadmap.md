LE but est de créer un réseau social ou les utilisateurs ont la posibilités de s'authentifié et d'envoyer des posts.

#BASE DE DONNEE

-Table : users : id, email, password, username, avatarURL, imageCouverture.

-Table : post : id, titre, contenu, imagePost, date, usernameID.

#PAGE LOGIN

-formulaire pour s'inscrire.
-script pour ajouter un user dans la base de donnée.

-formulaire de connection.
-script pour vérifier si l'utilisateur a donné un email et un password valide.
-Stocker les infos (id, email, username, avatar, imageCouverture) quelque part: session.

#PAGE ACCUEIL

-afficher les posts de tous les utilisateurs :
    -image optionnelle, titre, contenu,avatar et username.
    -Les afficher par date de publication (le plus récent en premier).

#PAGE PROFIL

-Afficher les informations d'utilisateur:
    -image de couverture
    -avatar
    -Username

-Formulaire pour envoyer un post :
    -titre
    -image optionnelle
    -contenu

-script pour conserver les posts dans la base de donnée.

-afficher tout les posts de l'utilisateur.

-ajouter l'option de supprimer un post.