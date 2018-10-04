# Roille
PPE n°1
A FAIRE : 
dans le fichier sql :
- pour la table Commandes_contrats :
  * ajouter un trigger afin de calculer automatiquement le montant_ht selon
  le qte_mat dans la table Paniers et prix_unitaire dans la table Materiels (relié par la clé primaire ref_mat)
  * ajouter un trigger afin de calculer automatiquement montant_tva et montant_ttc à chaque nouveau montant_ht;
- dans les table Categories, machines, outillage, et vehicule) :
  * supprimer les champs "nom_etc", et "type_outil"
  * remplacer "type_machine" par "secteur"(réparation, maintenance, etc),
  * remplacer "type_vehicule" par "usage"(transport de personnnel, de marchandise, chantier, etc)
  * ajouter les triggers nécéssaire pour gérer l'héritage : 
  ajout_out, ajout_mach, ajout_veh, modif_out, modif_mach, modif_veh, suppr_out, suppr_mach, suppr_veh.
- dans la table Materiels :
  * ajouter des triggers qui met à jour qte_stock selon si un matériel est loué 
  et lorsque qu'on en récupère suite à un contrat en fin de vie.
