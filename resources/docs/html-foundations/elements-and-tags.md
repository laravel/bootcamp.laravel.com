
# <b> Les tags </b>

## Introduction

HTML (HyperText Markup Language) définit la structure et le contenu des pages Web. Nous utilisons des éléments HTML pour créer tous les paragraphes, titres, listes, images et liens qui composent une page Web typique. Dans cette leçon, nous explorerons le fonctionnement des éléments HTML.

## Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

- Expliquez ce que sont les balises HTML.
- Expliquez ce que sont les éléments HTML.

## Éléments et balises

Presque tous les éléments d'une page HTML ne sont que des éléments de contenu enveloppés dans des balises HTML d'ouverture et de fermeture.

Les balises d'ouverture indiquent au navigateur qu'il s'agit du début d'un élément HTML. Ils sont constitués d'un mot-clé entouré de crochets  `<>`. Par exemple, une balise d'ouverture de paragraphe ressemble à ceci : `<p>`.

Les balises de fermeture indiquent au navigateur où se termine un élément. Ce sont presque les mêmes que les balises d’ouverture ; la seule différence est qu'ils ont une barre oblique avant le mot-clé. Par exemple, une balise de fermeture de paragraphe ressemble à ceci : `</p>`.

Un élément de paragraphe complet ressemble à ceci :

```html
<p>du contenu textuel</p>
```

Décomposons cela :

- `<p>` est la balise d'ouverture.
- `du contenu textuel` représente le contenu enveloppé dans les balises d'ouverture et de fermeture.
- `</p>` est la balise de fermeture.

Vous pouvez considérer les éléments comme des conteneurs de contenu. Les balises d'ouverture et de fermeture indiquent au navigateur le contenu de l'élément. Le navigateur peut ensuite utiliser ces informations pour déterminer comment il doit interpréter et formater le contenu.

HTML possède une [vaste liste de balises prédéfinies](https://developer.mozilla.org/en-US/docs/Web/HTML/Element) que vous pouvez utiliser pour créer toutes sortes d'éléments différents. Il est important d'utiliser les bonnes balises pour le contenu. L'utilisation des balises appropriées peut avoir un impact important sur deux aspects de vos sites : la manière dont ils sont classés dans les moteurs de recherche ; et dans quelle mesure ils sont accessibles aux utilisateurs qui s'appuient sur des technologies d'assistance, comme les lecteurs d'écran, pour utiliser Internet.

L’utilisation des éléments corrects pour le contenu est appelée HTML sémantique. Nous explorerons cela de manière beaucoup plus approfondie plus tard dans le programme.

## Éléments vides
Certains éléments HTML n'ont pas de balise de fermeture. Ces éléments n'ont qu'une seule balise, comme : `<br>` ou `<img>`. Ils sont appelés éléments vides car ils sont vides de tout contenu et il n’y a rien à l’intérieur. Aucune balise de fermeture signifie qu'ils ne peuvent pas envelopper le contenu comme le font les autres balises.

Vous pouvez également les voir appelées balises à fermeture automatique. Mais ce ne sont que des éléments vides avec une barre oblique (/) à la fin comme : `<br />` ou `<img />`. Vous verrez probablement des balises à fermeture automatique souvent utilisées pour des raisons historiques. Les navigateurs pourront très bien les restituer, mais la dernière version de la spécification HTML décourage leur utilisation et les considère comme invalides.

## Devoir

<div class="lesson-content__panel" markdown="1">

1. Regardez la [Introduction à la vidéo HTML] de Kevin Powell (https://www.youtube.com/watch?v=LGQuIIv2RVA).

</div>

## Vérification des connaissances

Cette section contient des questions vous permettant de vérifier par vous-même votre compréhension de cette leçon. Si vous rencontrez des difficultés pour répondre à une question, cliquez dessus et consultez le matériel auquel elle renvoie.

- [Qu'est-ce qu'une balise HTML ?](#elements-and-tags)
- [Quelles sont les trois parties d'un élément HTML ?](#elements-and-tags)

## Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- [Ne craignez pas la vidéo Internet sur HTML](http://www.dontfeartheinternet.com/02-html)