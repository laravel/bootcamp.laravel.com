[TOC]

# <b>Les éléments et les tags</b>

## Introduction

Les liens sont l'une des fonctionnalités clés du HTML. Ils nous permettent de créer des liens vers d'autres pages HTML du Web. En fait, c’est pour cela qu’on l’appelle le Web.

Dans cette leçon, nous apprendrons à créer des liens et à ajouter une touche visuelle à nos sites Web en intégrant des images.

### Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

- Comment créer des liens vers des pages d'autres sites Web sur Internet.
- Comment créer des liens vers d'autres pages de vos propres sites Web.
- La différence entre les liens absolus et relatifs.
- Comment afficher une image sur une page Web en utilisant HTML.

### Préparation

Pour vous entraîner à utiliser des liens et des images tout au long de cette leçon, nous avons besoin d'un projet HTML avec lequel travailler.

1. Créez un nouveau répertoire nommé « links-and-images ».
1. Dans ce répertoire, créez un nouveau fichier nommé « index.html ».
1. Ouvrez le fichier dans VS Code et remplissez le passe-partout HTML habituel.
1. Enfin, ajoutez le h1 suivant au corps :

```html
<h1>Page d'accueil</h1>
```

### Éléments d'ancrage

Pour créer un lien en HTML, nous utilisons l'élément d'ancrage. Un élément d'ancrage est défini en enveloppant le texte ou un autre élément HTML que nous voulons transformer en lien avec une balise `<a>`.

Ajoutez ce qui suit au corps de la page « index.html » que nous avons créée et ouvrez-la dans le navigateur :

```html
<a>cliquez sur moi</a>
```

Vous avez peut-être remarqué que cliquer sur ce lien ne fait rien. En effet, une balise d'ancrage à elle seule ne saura pas vers quoi nous souhaitons créer un lien. Nous devons lui indiquer une destination vers laquelle aller. Nous faisons cela en utilisant un attribut HTML.

<span id="attribute"></span>Un attribut HTML donne des informations supplémentaires à un élément HTML et va toujours dans la balise d'ouverture de l'élément. Un attribut est généralement composé de deux parties : un nom et une valeur ; cependant, tous les attributs ne nécessitent pas une valeur. <span id="where-to-go"></span>Dans notre cas, nous devons ajouter un attribut href (référence hypertexte) à la balise d'ancrage d'ouverture. La valeur de l'attribut href est la destination vers laquelle nous voulons que notre lien aille.

Ajoutez l'attribut href suivant à l'élément d'ancrage que nous avons créé précédemment et essayez à nouveau de cliquer dessus, n'oubliez pas d'actualiser le navigateur pour que les nouvelles modifications puissent être appliquées.

```html
<a href="https://www.paulgraham.com/safe.html">cliquez sur moi</a>
```

Par défaut, tout texte entouré d'une balise d'ancrage sans attribut « href » ressemblera à du texte brut. Si l'attribut `href` est présent, le navigateur donnera au texte une couleur bleue et le soulignera pour signifier qu'il s'agit d'un lien.

Il convient de noter que vous pouvez utiliser des balises d'ancrage pour créer un lien vers n'importe quel type de ressource sur Internet, et pas seulement vers d'autres documents HTML. Vous pouvez créer des liens vers des vidéos, des fichiers PDF, des images, etc., mais pour la plupart, vous créerez des liens vers d'autres documents HTML.

### Ouverture des liens dans un nouvel onglet

La méthode présentée ci-dessus ouvre les liens dans le même onglet que la page Web les contenant. Il s’agit du comportement par défaut de la plupart des navigateurs et il peut être modifié relativement facilement. Tout ce dont nous avons besoin c'est d'un autre attribut : l'attribut `target`.

Alors que `href` spécifie le lien de destination, `target` spécifie où la ressource liée sera ouverte. S'il n'est pas présent, alors, par défaut, il prendra la valeur `_self` qui ouvre le lien dans l'onglet courant. Pour ouvrir le lien dans un nouvel onglet ou une nouvelle fenêtre (cela dépend des paramètres du navigateur), vous pouvez le définir sur « _blank » comme suit :

```html
<a href="https://www.paulgraham.com/safe.html" target="_blank" rel="noopener noreferrer">cliquez sur moi</a>
```

<span id="target-security"></span>Vous avez peut-être remarqué que nous avons glissé l'attribut `rel` ci-dessus. Cet attribut est utilisé pour décrire la relation entre la page actuelle et le document lié.

La valeur « noopener » empêche le lien ouvert d'accéder à la page Web à partir de laquelle il a été ouvert. La valeur `noreferrer` empêche le lien ouvert de savoir quelle page Web ou quelle ressource contient un lien (ou une « référence ») vers celle-ci. Il inclut également le comportement « noopener » et peut donc également être utilisé seul.

Pourquoi avons-nous besoin de ce comportement supplémentaire pour ouvrir des liens dans de nouveaux onglets ? Raisons de sécurité. La prévention de l'accès provoquée par `noopener` empêche les [attaques de phishing](https://www.ibm.com/topics/phishing) où le lien ouvert peut changer la page Web d'origine en une autre pour tromper les utilisateurs. C'est ce qu'on appelle [tabnabbing](https://owasp.org/www-community/attacks/Reverse_Tabnabbing). L'ajout de la valeur `noreferrer` peut être effectué si vous souhaitez ne pas faire savoir au lien ouvert que votre page Web y renvoie.

Notez que tout ira bien si vous oubliez d'ajouter `rel="noopener noreferrer"` puisque les versions plus récentes des navigateurs [assurent cette sécurité](https://developer.mozilla.org/en-US/docs/Web/HTML /Element/a#security_and_privacy) si seul `target="_blank"` est présent. Néanmoins, conformément aux bonnes pratiques de codage et par mesure de prudence, il est recommandé de toujours associer un `target="_blank"` avec un `rel="noopener noreferrer"`.

### Liens absolus et relatifs

Généralement, nous allons créer deux types de liens :

- Liens vers des pages d'autres sites Web sur Internet.
- Liens vers des pages situées sur nos propres sites Internet.

#### Liens absolus

Les liens vers des pages d’autres sites Web sur Internet sont appelés liens absolus. Un lien absolu typique sera composé des parties suivantes : `protocol://domain/path`. Un lien absolu contiendra toujours le protocole et le domaine de la destination.

Nous avons déjà vu un lien absolu en action. Le lien que nous avons créé plus tôt vers la page de Paulgraham était un lien absolu car il contient le protocole et le domaine.

`https://www.paulgraham.com/safe.html`

#### Liens relatifs

Les liens vers d’autres pages de notre propre site Web sont appelés liens relatifs. Les liens relatifs n'incluent pas le nom de domaine, puisqu'il s'agit d'une autre page du même site, cela suppose que le nom de domaine sera le même que la page sur laquelle nous avons créé le lien.

Les liens relatifs incluent uniquement le chemin du fichier vers l'autre page, *relatif* à la page sur laquelle vous créez le lien. C'est assez abstrait, voyons cela en action à l'aide d'un exemple.

Dans le répertoire « links-and-images », créez un autre fichier HTML nommé « about.html » et collez-y le code suivant :

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title> Links and Images</title>
  </head>

  <body>
    <h1>About Page</h1>
  </body>
</html>
```

De retour dans la page d'index, ajoutez l'élément d'ancrage suivant pour créer un lien vers la page À propos :

```html
<body>
  <h1>Homepage</h1>
  <a href="https://www.paulgraham.com/safe.html">click me</a>

  <a href="about.html">About</a>
</body>
```

Ouvrez le fichier d'index dans un navigateur et cliquez sur le lien À propos pour vous assurer que tout est correctement connecté. En cliquant sur le lien, vous accéderez à la page à propos que nous venons de créer.

Cela fonctionne car l'index et la page À propos se trouvent dans le même répertoire. Cela signifie que nous pouvons utiliser son nom (`about.html`) comme valeur href du lien.

Mais nous souhaiterons généralement organiser un peu mieux nos répertoires de sites Web. Normalement, nous n'aurions que le « index.html » dans le répertoire racine et tous les autres fichiers HTML dans leur propre répertoire.

Créez un répertoire nommé « pages » dans le répertoire « 
links-and-images » et déplacez le fichier « about.html » dans ce nouveau répertoire.

Actualisez la page d'index dans le navigateur, puis cliquez sur le lien À propos. Il sera désormais cassé. En effet, l'emplacement du fichier de la page À propos a changé.

Pour résoudre ce problème, nous devons simplement mettre à jour la valeur href du lien à propos pour inclure le répertoire `pages/` puisque c'est le nouvel emplacement du fichier à propos *relatif* au fichier d'index.

```html
<body>
  <h1>Homepage</h1>
  <a href="pages/about.html">About</a>
</body>
```

Actualisez la page d'index dans le navigateur et essayez à nouveau de cliquer sur le lien À propos, il devrait maintenant être de nouveau en état de marche.

Dans de nombreux cas, cela fonctionnera très bien ; cependant, vous pouvez toujours rencontrer des problèmes inattendus avec cette approche. Ajouter `./` avant le lien empêchera dans la plupart des cas de tels problèmes. En ajoutant `./`, vous spécifiez à votre code qu'il doit commencer à rechercher le fichier/répertoire *relatif* au répertoire `current`.

```html
<body>
  <h1>Homepage</h1>
  <a href="./pages/about.html">About</a>
</body>
```

#### Une métaphore

Les liens absolus et relatifs sont un concept délicat pour construire un bon modèle mental, une métaphore peut aider :

Considérez votre nom de domaine (`town.com`) comme une ville, le répertoire dans lequel se trouve votre site Web (`/museum`) comme un musée et chaque page de votre site Web comme une pièce du musée (`/museum`). /movie_room.html` et `/museum/shops/coffee_shop.html`). Les liens relatifs comme `./shops/coffee_shop.html` sont des directions depuis la salle actuelle (la salle de cinéma du musée `/museum/movie_room.html`) vers une autre pièce (la boutique du musée). Les liens absolus, en revanche, sont des instructions complètes comprenant le protocole (`https`), le nom de domaine (`town.com`) et le chemin depuis ce nom de domaine (`/museum/shops/coffee_shop.html`) : ` https://town.com/museum/shops/coffee_shop.html`.

### Images

Les sites Web seraient plutôt ennuyeux s’ils ne pouvaient afficher que du texte. Heureusement, HTML fournit une grande variété d'éléments pour afficher toutes sortes de médias différents. Le plus largement utilisé est l’élément image.

Pour afficher une image en HTML nous utilisons l'élément `<img>`. Contrairement aux autres éléments que nous avons rencontrés, l'élément `<img>` se ferme automatiquement. Les éléments HTML vides et à fermeture automatique n'ont pas besoin de balise de fermeture.

Au lieu d'envelopper le contenu avec une balise d'ouverture et de fermeture, il intègre une image dans la page à l'aide d'un attribut src qui indique au navigateur où se trouve le fichier image. L'attribut src fonctionne un peu comme l'attribut href pour les balises d'ancrage. Il peut intégrer une image en utilisant des chemins absolus et relatifs.

Pour utiliser les images que nous avons sur nos propres sites Web, nous pouvons utiliser un chemin relatif.

<details markdown="block">
<summary class="dropDown-header">Linux, macOS, ChromeOS
</summary>

1. Créez un nouveau répertoire nommé « images » dans le projet « links-and-images ».
1. Ensuite, téléchargez [cette image](https://unsplash.com/photos/Mv9hjnEUHR4/download?force=true&w=640) et déplacez-la dans le répertoire d'images que nous venons de créer.
1. Renommez l'image en « dog.jpg ».

</details>

<details markdown="block">
<summary class="dropDown-header">WSL2
</summary>

Lorsque vous téléchargez un fichier depuis Internet, Windows dispose d'une fonction de sécurité qui crée un fichier caché. `Zone.Identifier` fichier portant le même nom que votre fichier téléchargé et il ressemble à `mypicture.jpg:Zone.Identifier` Ce fichier est inoffensif, mais nous aimerions éviter de le copier et d'encombrer nos répertoires.

1. Créez un nouveau répertoire nommé`images` au sein de `links-and-images` project.

1. Ensuite, [download the stock dog image](https://unsplash.com/photos/Mv9hjnEUHR4/download?force=true&w=640).

1. Faites un clic droit sur le nouveau téléchargement en bas de la fenêtre Chrome et sélectionnez « Afficher dans le dossier ».

    1. Alternativement, si vous ne voyez rien en bas de la fenêtre Chrome, ouvrez le menu "Personnaliser et contrôler le kebab de Google Chrome et sélectionnez l'élément "Téléchargements". Cela affichera tous vos téléchargements, chacun avec son propre "Afficher dans le dossier".

1. Faites glisser le fichier de votre dossier de téléchargements vers le navigateur de fichiers de VSCode dans votre nouveau répertoire `images`.

   1. Alternativement, à l'aide de votre terminal Ubuntu, accédez au dossier dans lequel vous souhaitez copier l'image (`cd ~/links-and-images` par exemple)

     1. Tapez `cp <espace>`

     1. Faites glisser l'image `dog.jpg` depuis une fenêtre de l'Explorateur Windows et déposez-la sur la fenêtre du terminal, elle devrait apparaître sous la forme `"/mnt/c/users/username/Downloads/dog.jpg"`

     1. Tapez `<espace> .` pour indiquer à cp que vous souhaitez copier le fichier dans votre répertoire de travail actuel.

         1. La commande complète ressemblera à `cp "/mnt/c/users/username/Downloads/dog.jpg" .`

     1. Appuyez sur <kbd>Entrée</kbd> pour terminer la commande et utilisez ls pour confirmer que le fichier existe désormais.

Faire glisser des fichiers de Windows vers le navigateur de fichiers VSCode empêche la copie des fichiers `Zone.Identifier`. À partir de maintenant, chaque fois que vous aurez besoin de copier des images ou d’autres fichiers téléchargés comme celui-ci dans WSL2, vous pourrez le faire de cette manière. Si jamais vous copiez accidentellement ces fichiers `Zone.Identifier` dans WSL2, vous pouvez les supprimer en toute sécurité sans aucun problème.

</détails>

Enfin, ajoutez l'image au fichier `index.html` :

```html
<body>
   <h1>Page d'accueil</h1>
   <a href="https://www.paulgraham.com/safe.html">cliquez sur moi</a>

   <a href="./pages/about.html">À propos</a>

   <img src="./images/chien.jpg">
</body>
```

Enregistrez le fichier `index.html` et ouvrez-le dans un navigateur pour voir Charles dans toute sa splendeur.

### Répertoires parents

Et si nous voulons utiliser l'image du chien dans la page à propos ? Il faudrait d'abord remonter d'un niveau du répertoire pages vers son répertoire parent pour pouvoir ensuite accéder au répertoire images.

<span id="parent-filepath"></span>Pour accéder au répertoire parent, nous devons utiliser deux points dans le chemin de fichier relatif comme ceci : `../`. Voyons cela en action, dans le corps du fichier `about.html`, ajoutez l'image suivante sous le titre que nous avons ajouté précédemment :

```html
<img src="../images/chien.jpg">
```

Pour décomposer cela :

1. Tout d'abord, nous allons dans le répertoire parent du répertoire des pages qui est `links-and-images`.
1. Ensuite, depuis le répertoire parent, on peut aller dans le répertoire `images`.
1. Enfin, nous pouvons accéder au fichier `dog.jpg`.

En utilisant la métaphore que nous avons utilisée plus tôt, utiliser `../` dans un chemin de fichier, c'est un peu comme sortir de la pièce dans laquelle vous vous trouvez actuellement vers le couloir principal pour pouvoir aller dans une autre pièce.

### Attribut Alt

<span id="two-attributes"></span>Outre l'attribut src, chaque élément d'image doit également avoir un attribut alt (texte alternatif).

L'attribut alt est utilisé pour décrire une image. Elle sera utilisée à la place de l'image si elle ne peut pas être chargée. Il est également utilisé avec les lecteurs d’écran pour décrire l’image aux utilisateurs malvoyants.

Pour vous entraîner, ajoutez un attribut alt à l'image du chien que nous avons ajoutée au projet `links-and-images`.

### Attributs de taille d'image

Bien que cela ne soit pas strictement obligatoire, spécifier la hauteur et la largeur
Les attributs dans les balises d'image aident le navigateur à mettre en page la page sans provoquer de saut et de flash de la page.

C'est une bonne habitude de toujours spécifier ces attributs sur chaque image, même lorsque l'image a la bonne taille ou que vous utilisez CSS pour la modifier.

Allez-y et mettez à jour le projet `links-and-images` avec des balises de largeur et de hauteur sur l'image du chien.

### Devoir

<div class="lesson-content__panel" markdown="1">

1. Regardez la [Vidéo Liens HTML] de Kevin Powell (https://www.youtube.com/watch?v=tsEQgGjSmkM).
1. Regardez la [Vidéo Images HTML] de Kevin Powell (https://www.youtube.com/watch?v=0xoztJCHpbQ).
1. Regardez la [Vidéo sur la structure des fichiers] de Kevin Powell (https://www.youtube.com/watch?v=ta3Oxx7Yqbo).
1. [Découvrez les quatre principaux formats d'image pouvant être utilisés sur le Web](https://internetingishard.netlify.app/html-and-css/links-and-images/#image-formats).

</div>

### Vérification des connaissances

Cette section contient des questions vous permettant de vérifier par vous-même votre compréhension de cette leçon. Si vous rencontrez des difficultés pour répondre à une question, cliquez dessus et consultez le matériel auquel elle renvoie.

- [Quel élément est utilisé pour créer un lien ?](#anchor-elements)
- [Qu'est-ce qu'un attribut ?](#attribut)
- [Quel attribut indique aux liens où aller ?](#where-to-go)
- [Quelles considérations de sécurité doivent être prises si vous souhaitez utiliser l'attribut target pour ouvrir des liens dans un nouvel onglet/fenêtre ?](#target-security)
- [Quelle est la différence entre un lien absolu et relatif ?](#absolute-and-relative-links)
- [Quel élément est utilisé pour afficher une image ?](#images)
- [Quels sont les deux attributs que les images doivent toujours avoir ?](#two-attributes)
- [Comment accéder à un répertoire parent dans un chemin de fichier ?](#parent-filepath)
- [Quels sont les quatre principaux formats d'image que vous pouvez utiliser pour les images sur le Web ?](https://internetingishard.netlify.app/html-and-css/links-and-images/#image-formats)

### Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

-[Internetingishard.netlify.app/html-and-css/links-and-images)
- [Que s'est-il passé le jour où Google a décidé que les liens comprenant (`/`) étaient des logiciels malveillants](https://www.itpro.co.uk/609724/google-apologises-after-blacklisting-entire-internet)
- [Quand utiliser target="_blank" de Chris Coyier sur CSS-Tricks](https://css-tricks.com/use-target_blank/)