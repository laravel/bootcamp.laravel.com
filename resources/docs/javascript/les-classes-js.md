[TOC]

# <b>Class JavaScript</b>

## Objectifs d'apprentissage

- Utiliser des `classes` JavaScript

## Description

Dans cette leçon, vous découvrirez les classes JavaScript, comment les utiliser, leur syntaxe, leurs relations et leurs différences avec les objets et les fonctions.

## Pourquoi les classes Javascript sont-elles importantes ?

Les classes sont l'un des fondements de la programmation orientée objet. JavaScript n'a pas de classes intégrées, mais il prend en charge les classes d'une manière particulière, en utilisant des objets, et une nouvelle *syntaxe* `class`  a été introduite avec EcmaScript 6 (vous en apprendrez plus sur ES6 plus tard dans ce même module).

## Classes et objets

Les classes JavaScript ne sont pas des objets, ce sont des *modèles* pour les objets. Cela signifie que les classes JavaScript en coulisses créeront des objets. Pour les créer, vous pouvez utiliser :

- [Les constructeurs d'objets JavaScript](https://www.w3schools.com/JS/js_object_constructors.asp) (a function!).
- Ou, [New Class](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Classes) keyword.

## Méthodes de classe et méthode constructeur

Une classe peut avoir plusieurs *méthodes*, qui ne sont là encore que de simples fonctions ! Et une classe peut également avoir une méthode spéciale appelée `constructeur` qui sera exécutée automatiquement lors de la création d'une instance de cette classe, ce qui est utile pour l'initialisation. Pour plus d’informations, jetez un œil à ces liens :

- [Les classes JavaScript](https://www.w3schools.com/js/js_classes.asp).
- [La methode des constructeur](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Classes#constructor).

## Class et *this*

Le mot-clé `this` en JavaScript est un concept complexe à appréhender puisque sa valeur change en fonction de plusieurs facteurs. Le `this` est présent dans les classes, les objets et les fonctions. Jetez un œil aux liens suivants :

- [This dans le context des classes](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/this#class_context).
- [Le mot clef `this`](https://www.w3schools.com/Js/js_this.asp).

## Matériaux additionnels

*Ces éléments sont tous facultatifs, mais si vous souhaitez approfondir ce sujet, voici quelques ressources pour vous aider. Toute exploration ici doit être effectuée en dehors du temps du programme.*

Les classes sont un sujet controversé en JavaScript. Certaines personnes soutiennent qu'ils ne sont que du * fantaisie syntaxique* pour l'héritage basé sur des prototypes et qu'ils devraient donc être évités ; tandis que d'autres aiment les class pour leur syntaxe simplifiée et belle, et pensent également qu'ils ne sont pas seulement du sucre syntaxique, mais qu'ils constituent une nouvelle fonctionnalité utile du langage.

Jetez un oeil à ceci [discussion sur StackOverflow](https://stackoverflow.com/questions/36419713/are-es6-classes-just-syntactic-sugar-for-the-prototypal-pattern-in-javascript) pour en savoir plus sur les deux côtés de ce débat.