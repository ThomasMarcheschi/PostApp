Le but est de créer un réseau social ou les utilisateurs ont la posibilités de s'authentifié et d'envoyer des posts.

BASE DE DONNEE

-Table : users : id, email, password, username, avatarURL, imageCouverture. DONE

-Table : post : id, titre, contenu, imagePost, date, usernameID. DONE

PAGE LOGIN

-Formulaire pour s'inscrire. DONE
-Script pour ajouter un user dans la base de donnée. DONE

-Formulaire de connection. DONE
-Script pour vérifier si l'utilisateur a donné un email et un password valide.
-Stocker les infos (id, email, username, avatar, imageCouverture) quelque part: session.

PAGE PROFIL

-Afficher les informations d'utilisateur:
    -Image de couverture
    -Avatar
    -Username

-Formulaire pour envoyer un post :
    -Titre
    -Image optionnelle
    -Contenu

-Script pour conserver les posts dans la base de donnée.

-Afficher tout les posts de l'utilisateur.

-Ajouter l'option de supprimer un post.

PAGE ACCUEIL

-Réaliser un navbar.

-Afficher les posts de tous les utilisateurs :
    -Image optionnelle, titre, contenu,avatar et username.
    -Les afficher par date de publication (le plus récent en premier).