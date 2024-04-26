# <b>[PARTIE 1]Menu mobile</b>

## Objectifs d'apprentissage

- Utilisez la syntaxe JavaScript de base.
- Utilisez JavaScript pour manipuler les éléments DOM.
- Utilisez des événements JavaScript.


## Description

Pour cette étape de votre site portfolio, vous implémenterez le menu mobile en utilisant vos connaissances JavaScript récemment acquises.

*REMARQUE IMPORTANTE : Lisez **toutes** les exigences avant de commencer à construire votre projet.*

## Exigences générales

- Assurez-vous de respecter les bonnes pratiques javascript
- Assurez-vous que vous avez utilisé le bon flux GitHub
- Assurez-vous d'avoir documenté votre travail de manière professionnelle


## Exigences du projet


- Créez une page HTML et CSS. Vous devez vous en tenir autant que possible au design (par exemple, police, couleurs, images, texte, marges) en utilisant [les modèles dans Figma : ](https://www.figma.com/file/l7SqJ3ZfkAKih9sFxvWSR4/Microverse-Student-Project-1?node-id=0%3A1).

- En mobile, mettre en œuvre les fonctionnalités suivantes :
     - Lorsque l'utilisateur clique (ou appuie) sur le bouton hamburger, le menu mobile apparaît.
     - Lorsque l'utilisateur clique (ou appuie) sur le bouton de fermeture (X), le menu mobile disparaît.
     - Lorsque l'utilisateur clique (ou appuie) sur l'une des options du menu mobile, le menu mobile disparaît.
     - Lorsque l'utilisateur clique (ou appuie) sur l'une des options du menu mobile, une partie correcte de la page s'affiche.
    

# <b>[PARTIE 2] Portfolio: details popup window</b>

## Objectifs d'apprentissage

- Utilisez la syntaxe JavaScript de base.
- Utilisez JavaScript pour manipuler les éléments DOM.
- Utilisez des événements JavaScript.
- Comprendre comment analyser une conception Figma pour créer une interface utilisateur.
- Utiliser des objets pour stocker et accéder aux données.

## Description

Pour cette étape de votre site Web de portfolio, vous implémenterez une fenêtre contextuelle qui inclut les détails du projet sur ordinateur et mobile. Pour ce faire, vous devrez stocker les informations sur vos projets dans un objet JavaScript.

*REMARQUE IMPORTANTE : Lisez **toutes** les exigences avant de commencer à construire votre projet.*

## Exigences générales

- Assurez-vous de respecter les bonnes pratiques javascript
- Assurez-vous que vous avez utilisé le bon flux GitHub
- Assurez-vous d'avoir documenté votre travail de manière professionnelle



## Livrable 1

- Créez une page HTML et CSS. Vous devez vous en tenir autant que possible au design (par exemple, police, couleurs, images, texte, marges) en utilisant [les modèles dans Figma :](https://www.figma.com/file/l7SqJ3ZfkAKih9sFxvWSR4/Microverse-Student-Project-1?node-id=0%3A1).
- Vous devez mettre en œuvre les interactions suivantes :
     - Lorsque l'utilisateur clique (ou appuie) sur le bouton pour vérifier les détails du projet, la fenêtre contextuelle contenant les détails du projet apparaît.
     - Lorsque l'utilisateur clique (ou appuie) sur le bouton de fermeture (X), la fenêtre contextuelle disparaît.
- Afin d'associer chaque projet aux détails de la fenêtre popup, vous devez refactoriser la section projet :
     - Vous devez utiliser **un tableau JavaScript pour stocker toutes les informations de tous les projets**.
     - Pour chaque projet, vous devez stocker au minimum les éléments de données suivants dans un objet JavaScript : nom, description, image sélectionnée, technologies, lien vers la version live, lien vers la source.
     - Vous devez mettre à jour la page principale afin que la section projets soit créée dynamiquement en utilisant les informations stockées dans cet objet JavaScript. N'oubliez pas que tout le code HTML de cette section est créé lors du chargement de la page.
     - Après cela, vous pourrez implémenter la fenêtre contextuelle.
- Vous devez implémenter des popups pour les tailles d'écran des mobiles et des ordinateurs de bureau :
     - Fenêtre contextuelle mobile
        
     - Fenêtre contextuelle du bureau
        

Nous avons inclus une capture d'écran du modèle 5 à titre de référence, mais vous devez suivre le modèle que vous avez choisi.


# <b>Portfolio: validate contact form</b>

## Objectifs d'apprentissage

- Traiter les entrées des utilisateurs selon les règles métier.
- Utilisez la validation côté client pour détecter et générer des erreurs dans l'interface utilisateur.

## Description

Pour cette étape de votre site Web de portfolio, vous mettrez en œuvre une validation côté client des données dans le formulaire de contact avant la soumission.

*REMARQUE IMPORTANTE : Lisez **toutes** les exigences avant de commencer à construire votre projet.*

## Exigences générales

- Assurez-vous de respecter les bonnes pratiques javascript
- Assurez-vous que vous avez utilisé le bon flux GitHub
- Assurez-vous d'avoir documenté votre travail de manière professionnelle

## Livrable 2

- Créez une page HTML et CSS. Vous devez vous en tenir autant que possible au design (par exemple, police, couleurs, images, texte, marges) en utilisant [les modèles dans Figma ](https://www.figma.com/file/l7SqJ3ZfkAKih9sFxvWSR4/Microverse-Student-Project-1?node-id=0%3A1).
- Vous devez mettre en œuvre une validation simple :
     - Le contenu du champ email doit être en minuscule.
- Vous devez mettre en œuvre les interactions suivantes :
     - Lorsque l'utilisateur soumet le formulaire, vous vérifiez si l'email est en minuscule.
     - Si la validation est OK, le formulaire est envoyé.
     - Si la validation n'est pas OK, vous affichez un message d'erreur à l'utilisateur à côté du bouton de soumission l'informant de l'erreur et le formulaire n'est pas envoyé.
    

Nous avons inclus une capture d'écran du modèle 1 à titre de référence, mais vous devez suivre le modèle que vous avez choisi.


# <b>Portfolio : conserver les données dans le navigateur</b>

## Objectifs d'apprentissage

- Utilisez le stockage local pour enregistrer les entrées de l'utilisateur.

## Description

Pour cette dernière étape de votre site Web de portfolio, vous enregistrerez les données du formulaire dans le `stockage local` du navigateur. De cette façon, lorsque l'utilisateur rechargera la page, les données qu'il aura renseignées dans le formulaire seront conservées.

*REMARQUE IMPORTANTE : Lisez **toutes** les exigences avant de commencer à construire votre projet.*

## Exigences générales

- Assurez-vous de respecter les bonnes pratiques javascript
- Assurez-vous que vous avez utilisé le bon flux GitHub
- Assurez-vous d'avoir documenté votre travail de manière professionnelle


## Livrable 3

- Vous devez mettre en œuvre les interactions suivantes :
     - Lorsque l'utilisateur modifie le contenu d'un champ de saisie, les données sont enregistrées sur le stockage local.
     - Lorsque l'utilisateur charge la page, s'il y a des données dans le stockage local, les champs de saisie sont pré-remplis avec ces données.
- Vous devez utiliser le modèle de données suivant :
     - Vous devez créer **un seul objet JavaScript avec toutes les données de l'ensemble du formulaire** et l'enregistrer dans le stockage local. Ne créez pas une entrée de stockage local par champ de saisie.