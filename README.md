# MonAvisApi
Un webservice developpé avec Slim et doctrine(en cours de developpement)
Documentation

***

 Ce document à pour but de vous permettre d'utiliser le webservice MonAvisApi
* Le point d'entrée de l'api c'est : index.php/ bien-sûr en utilisant le path : MonAvisApi/
 1. Le module **ENTREPRISE**
        *  _Requête GET_
     * entreprises :  accéder à toutes les entreprises enregistrées en base
     * entreprises/id :  accéder à une entreprise via son identifiant
     * entreprises/categorie/id : accéder aux selon une catégorie par son identifiant(identifiant de la catégorie)
     * entreprises/notes/id : accéder à la note d'une entreprise via son identifiant
 2. Le module **CATEGORIE**
       *  _Requête GET_
     * categories : accéder à toutes les catégories enregistrées en base
     * categories/id : accéder à une catégorie via son identifiant
 3. Le module **SERVICE**
       *  _Requête GET_
     * services :  accéder à tous les services enregistrées en base
     * services/id : accéder à un service via son identifiant
     * services/entreprise/id : accéder aux services d'une entreprise par son identifiant
 4. Le module **AVIS**
       *  _Requête GET_
     * avis :  accéder à tous les avis enregistrés en base
     * avis/service/id :  accéder à un service par son identifiant
     * avis/user/id :  accéder aux avis publiés par un user
 5. Le module **COMMENTAIRES**
        *  _Requête GET_
     * commentaire : accéder à tous commentaires enregistrés en base
     * commentaires/id : accéder à un commentaire par son identifiant
     * commentaires/avis/id : accéder aux commentaires concernant par un avis(identifiant de l'avis)
     * commentaires/user/id : accéder aux commentaires postés par un user
 6. Le module **USERS**
        *  _Requête GET_
     * users :  accéder à tous les utilisateurs enregistrés en base
     * users/id :  accéder à un user via son identifiant
     * users/reputations/id : accéder à la réputation d'un user (like,unLike)
