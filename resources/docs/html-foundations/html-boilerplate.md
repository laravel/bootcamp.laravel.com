[TOC]

# <b> Les fondamentaux de HTML </b>
## Introduction

Tous les documents HTML ont la même structure de base ou passe-partout qui doit être en place avant que quelque chose d'utile puisse être fait. Dans cette leçon, nous explorerons les différentes parties de ce passe-partout et verrons comment tout s'articule.

## Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

- Comment rédiger le passe-partout de base d'un document HTML.
- Comment ouvrir des documents HTML dans votre navigateur.

## Création d'un fichier HTML

Pour démontrer un passe-partout HTML, nous avons d’abord besoin d’un fichier HTML avec lequel travailler.

Créez un nouveau dossier sur votre ordinateur et nommez-le `html-boilerplate`. Dans ce dossier, créez un nouveau fichier et nommez-le `index.html`.

Vous connaissez probablement déjà de nombreux types de fichiers différents, par exemple les fichiers doc, pdf et image.

Pour faire savoir à l'ordinateur que nous voulons créer un fichier HTML, nous devons ajouter le nom du fichier avec l'extension `.html` comme nous l'avons fait lors de la création du fichier `index.html`.

Il convient de noter que nous avons nommé notre fichier HTML ` index`. Nous devons toujours nommer le fichier HTML qui contiendra la page d'accueil de nos sites Web `index.html`. En effet, les serveurs Web rechercheront par défaut une page `index.html` lorsque les utilisateurs accèdent à nos sites Web – et ne pas en avoir une entraînera de gros problèmes.

### Le DOCTYPE

Chaque page HTML commence par une déclaration doctype. Le but du doctype est d'indiquer au navigateur quelle version de HTML il doit utiliser pour afficher le document. La dernière version de HTML est HTML5 et le doctype de cette version est `<!DOCTYPE html>`.

Les doctypes des anciennes versions de HTML étaient un peu plus compliqués. Par exemple, voici la déclaration doctype pour HTML4 :

```html
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
```

Cependant, nous ne voudrons probablement jamais utiliser une ancienne version de HTML, et nous utiliserons donc toujours `<!DOCTYPE html>`.

Ouvrez le fichier `index.html` créé précédemment dans votre éditeur de texte et ajoutez `<!DOCTYPE html>` à la toute première ligne.

### Élément HTML

Après avoir déclaré le doctype, nous devons fournir un élément `<html>`. C'est ce qu'on appelle l'élément racine du document, ce qui signifie que tous les autres éléments du document en seront un descendant.

Cela devient plus important plus tard lorsque nous apprendrons à manipuler du HTML avec JavaScript. Pour l'instant, sachez simplement que l'élément `<html>` doit être inclus dans chaque document HTML.

De retour dans le fichier `index.html`, ajoutons l'élément `<html>` en tapant ses balises d'ouverture et de fermeture, comme ceci :

```html
<!DOCTYPE html>
<html lang="en">
</html>
```

Vous avez remarqué le mot `lang ` ici ? Il représente un attribut HTML associé à la balise HTML donnée, c'est-à-dire `<html>` dans ce cas. Ces attributs fournissent des informations supplémentaires sur les éléments HTML. (En savoir plus sur les  `attributs HTML` dans la leçon suivante.)

## Qu'est-ce que l'attribut lang ?

`lang` spécifie la langue du contenu du texte dans cet élément. Cet attribut est principalement utilisé pour améliorer l'accessibilité de la page Web. Il permet aux technologies d'assistance, par exemple les lecteurs d'écran, de s'adapter en fonction de la langue et d'invoquer une prononciation correcte.

## Élément de tête

L'élément `<head>` est l'endroit où nous mettons les méta-informations importantes **sur** nos pages Web et les éléments requis pour que nos pages Web s'affichent correctement dans le navigateur.
À l'intérieur du `<head>`, nous ** ne devrions ** utiliser aucun élément qui affiche le contenu de la page Web.

### Élément méta

Nous devrions toujours avoir la balise `<meta>` avec le codage charset de la page Web dans l'élément `<head>` : `<meta charset="utf-8">`.

La définition de l'encodage est très importante car elle garantit que la page Web affichera correctement les symboles et caractères spéciaux de différentes langues dans le navigateur.

### Élément de titre

Un autre élément que nous devrions toujours inclure dans l'en-tête d'un document HTML est l'élément `<title>` :

  `<title>Ma première page Web</title>`

L'élément `<title>` est utilisé pour donner aux pages Web un titre lisible par l'homme qui est affiché dans l'onglet du navigateur de notre page Web. Par exemple, si vous regardez le nom de l'onglet actuel de votre navigateur, il indiquera « HTML Boilerplate &#124; The Odin Project » ; il s'agit du `<titre>` du fichier `.html` actuel.

Si nous n'incluions pas d'élément `<title>`, le titre de la page Web serait par défaut son nom de fichier. Dans notre cas, ce serait « index.html », ce qui n'a pas beaucoup de sens pour les utilisateurs ; cela rendrait très difficile la recherche de notre page Web si l'utilisateur a de nombreux onglets de navigateur ouverts.

De nombreux autres éléments peuvent figurer dans l’en-tête d’un document HTML. Cependant, pour l’instant, il est seulement crucial de connaître les deux éléments que nous avons abordés ici. Nous introduirons davantage d’éléments qui nous viennent à l’esprit tout au long du reste du programme.

De retour dans notre fichier `index.html`, ajoutons un élément `<head>` avec un élément `<meta>` et un titre à l'intérieur. L'élément `<head>` se trouve dans l'élément `<html>` et doit toujours être le premier élément sous la balise d'ouverture `<html>` :

```html
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>My First Webpage</title>
  </head>
</html>
```

### Élément corps

Le dernier élément nécessaire pour compléter le passe-partout HTML est l'élément `<body>`. C’est là que ira tout le contenu qui sera affiché aux utilisateurs – le texte, les images, les listes, les liens, etc.

Pour compléter le passe-partout, ajoutez un élément `<body>` au fichier `index.html`. L'élément `<body>` va également dans l'élément `<html>` et est toujours en dessous de l'élément `<head>`, comme ceci :

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>My First Webpage</title>
  </head>

  <body>
  </body>
</html>
```

### Affichage des fichiers HTML dans le navigateur

Le passe-partout HTML dans le fichier `index.html` est complet à ce stade, mais comment l'afficher dans le navigateur ? Il existe plusieurs options différentes :

> Une remarque :
> Afin d'éviter de diviser les instructions de notre leçon pour tenir compte de toutes les différences entre les navigateurs, nous allons utiliser Google Chrome comme navigateur principal pour le reste de ce cours. Toutes les références au navigateur concerneront spécifiquement Google Chrome. Nous vous suggérons **fortement** d'utiliser Google Chrome pour tous vos tests à l'avenir.

1. Vous pouvez glisser et déposer un fichier HTML depuis votre éditeur de texte vers la barre d'adresse de votre navigateur.

2. Vous pouvez trouver le fichier HTML dans votre système de fichiers, puis double-cliquer dessus. Cela ouvrira le fichier dans le navigateur par défaut utilisé par votre système.

3. Vous pouvez utiliser le terminal pour ouvrir le fichier dans votre navigateur.

     - `Ubuntu` - Accédez au répertoire contenant le fichier et tapez `google-chrome index.html`
     - `macOS` - Accédez au répertoire contenant le fichier et tapez `open ./index.html`

En utilisant l'une des méthodes ci-dessus, ouvrez le fichier « index.html » sur lequel nous avons travaillé. Vous remarquerez que l'écran est vide. C’est parce que nous n’avons rien à afficher dans notre corps.

De retour dans le fichier `index.html`, ajoutons un en-tête (nous y reviendrons plus tard) au corps et enregistrons le fichier :

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>My First Webpage</title>
  </head>

  <body>
    <h1>Hello World!</h1>
  </body>
</html>
```

Maintenant, si vous actualisez la page dans le navigateur, vous devriez voir les modifications prendre effet, ainsi que le titre « Hello World ! » sera affiché.

## Raccourci VSCode

VSCode dispose d'un raccourci intégré que vous pouvez utiliser pour générer tout le passe-partout en une seule fois. Veuillez noter que ce raccourci ne fonctionne que lors de l'édition d'un fichier avec l'extension `.html` ou d'un fichier texte avec le langage HTML déjà sélectionné. Pour déclencher le raccourci, supprimez tout ce qui se trouve dans le fichier `index.html` et entrez simplement `!` sur la première ligne. Cela fera apparaître quelques options. Appuyez sur la touche <kbd>Entrée</kbd> pour choisir la première, et voilà, vous devriez avoir tous les passe-partout remplis pour vous.

Mais il est toujours bon de savoir comment rédiger vous-même le passe-partout au cas où vous vous retrouveriez à utiliser un éditeur de texte comme le bloc-notes (à Dieu ne plaise), qui ne dispose pas de ce raccourci. Essayez de ne pas utiliser le raccourci dans vos premiers projets HTML, afin de pouvoir développer une certaine mémoire musculaire pour écrire le code passe-partout.

## Devoir

<div class="lesson-content__panel" markdown="1">

1. Regardez et suivez la brillante [vidéo Building Your First Web Page de Kevin Powell](https://www.youtube.com/watch?v=V8UAEoOvqFg&t=93s).

2. Construisez de la mémoire musculaire en supprimant le contenu du fichier « index.html » et en essayant d'écrire à nouveau tout le passe-partout de la mémoire. Ne vous inquiétez pas si vous devez jeter un coup d'œil au contenu de la leçon les premières fois si vous êtes bloqué. Continuez jusqu'à ce que vous puissiez le faire plusieurs fois de mémoire.

3. Exécutez votre passe-partout via le [validateur HTML W3](https://validator.w3.org/) ou bien ce [validateur HTML](https://www.freeformatter.com/html-validator.html). Les validateurs garantissent que votre balisage est correct et constituent un excellent outil d'apprentissage, car ils fournissent des commentaires sur les erreurs de syntaxe que vous faites souvent et dont vous n'êtes pas conscient, telles que les balises de fermeture manquantes et les espaces supplémentaires dans votre code HTML.

</div>

## Vérification des connaissances

Cette section contient des questions vous permettant de vérifier par vous-même votre compréhension de cette leçon. Si vous rencontrez des difficultés pour répondre à une question, cliquez dessus et consultez le matériel auquel elle renvoie.

- [Quel est le but de la déclaration doctype ?](#the-doctype)
- [Qu'est-ce que l'élément HTML ?](#html-element)
- [Quel est le but de l'élément head ?](#head-element)
- [Quel est le but de l'élément body ?](#body-element)

## Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- Une autre option pour ouvrir vos pages HTML dans le navigateur consiste à utiliser l'[extension de serveur live](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer) avec VSCode. Cela ouvrira votre document HTML et l'actualisera automatiquement à chaque fois que vous enregistrerez le document. Cependant, nous vous recommandons de ne pas utiliser cette extension et de le faire à l'ancienne, en ouvrant la page et en actualisant la page manuellement dans le navigateur pour vos premiers projets HTML. De cette façon, vous pourrez vous habituer à ce processus et ne dépendrez pas immédiatement des extensions. L’une des raisons est qu’il peut y avoir des différences subtiles lors de l’utilisation d’extensions. Par exemple, le serveur live utilisera toujours le codage de caractères UTF-8 et non la valeur charset définie dans votre élément `<meta>`. Cela pourrait potentiellement masquer certains caractères sur votre site car ils ne seront pas encodés comme prévu.

- Si vous le souhaitez, vous pouvez ajouter l'attribut `lang` à des éléments individuels de la page Web. Lisez [ce document](https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/lang) pour une meilleure compréhension de l'attribut `lang`.

