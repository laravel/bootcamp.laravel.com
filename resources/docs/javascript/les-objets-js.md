[TOC]

# <b>Travailler avec des objets</b>

## Objectifs d'apprentissage

- Comprendre les différentes manières de créer des objets en JavaScript.
- Créer et accéder aux propriétés et méthodes des objets JavaScript.

## Description

Dans cette leçon, vous apprendrez à utiliser des objets JavaScript, à créer des méthodes et des propriétés et à y accéder.

## Pourquoi les objets JavaScript sont-ils importants ?

En JavaScript, presque tout est objet ! Ils font partie des structures de données implémentées nativement par le langage et sont fondamentaux pour la programmation JavaScript. Il est nécessaire de comprendre les différentes manières dont fonctionnent les objets JavaScript afin d'écrire du bon JavaScript.

## Création d'objet

Il existe plusieurs manières de créer des objets en JavaScript, chacune présentant de petites différences non seulement dans la syntaxe mais également dans la manière dont vous définissez le prototype et attribuez ses propriétés. Jetez un œil à la documentation détaillée de chaque méthode (rappelez-vous que votre objectif est d'observer et de comprendre les différences, pas de lire la documentation en entier) :

- [Notation d'objet *littérale*](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Object_initializer) (également connue sous le nom de notation *initialiseur* ). Ce sujet a déjà été introduit dans le [module précédent](https://platform.microverse.org/learn/courses/198386f1-8b45-4cce-a6d5-5947ad3b627a/activities/f39106ff-5835-4baa-9b29-7148f377c676/).
- [Constructeur Objet()](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/Object).
- [Objet.prototype.constructeur](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/constructor).
- [Object.create()](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/create).
- [Object.assign()](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/assign).

## Prototypes d'objets

JavaScript est un langage multi-paradigmes et implémente l'héritage à sa manière. Contrairement à d'autres langages de programmation orientée objet (POO) basés sur des classes, comme Java ou C, JavaScript utilise l'**héritage prototypique**.

- Lire[this article](https://developer.mozilla.org/en-US/docs/Learn/JavaScript/Objects/Object_prototypes) pour en savoir plus sur le prototype objet.

## Méthodes objets

Les objets, comme vous le savez déjà, sont des collections de paires clé/valeur. Les propriétés (clés) peuvent avoir n'importe quelle valeur, y compris les fonctions. Lorsque les propriétés contiennent des définitions de fonctions, elles sont appelées **méthodes**.

- En savoir plus sur [définir des méthodes dans les objets](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Working_with_Objects#defining_methods).

## Relevez le défi

Vous avez peut-être remarqué que les méthodes `Object() constructor` et `Object.prototype.constructor` pour créer un objet se ressemblent. Examinez de plus près et trouvez la différence entre les deux. Indice : l'un d'eux ressemble à une fonction. En fait, vous pouvez utiliser vos propres fonctions pour créer des objets.

- Vous pouvez utiliser [Object() constructor](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/Object), which will create an *object wrapper* in which you'll need to add properties.

- Utiliser [constructor function](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Working_with_Objects#using_a_constructor_function) you can create a function that will return an object with properties.


## Matériaux additionnels

*Ces éléments sont tous facultatifs, mais si vous souhaitez approfondir ce sujet, voici quelques ressources pour vous aider. Toute exploration ici doit être effectuée en dehors du temps du programme.*

- Lire l'article [Comment créer des objets en JavaScript](https://www.freecodecamp.org/news/a-complete-guide-to-creating-objects-in-javascript-b0e2450655e8/) qui résume les différentes manières de créer des objets. Notez que dans cette leçon, nous ne parlons pas de *cours* - c'est un sujet qui sera abordé dans sa propre leçon.
- En savoir plus sur [les objets et les constructeurs d'objets](https://www.theodinproject.com/paths/full-stack-ruby-on-rails/courses/javascript/lessons/objects-and-object-constructors)dans cet article du projet Odin.