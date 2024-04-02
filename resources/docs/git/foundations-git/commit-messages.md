[TOC]

# <b> Les bonnes pratiques de commits</b>

## Introduction

Cette leçon expliquera l'importance des bons messages de commit, comment les écrire, quand s'engager et pourquoi il est si important d'avoir un historique de bons commits !

### Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

- Comment rédiger un message de commit significatif.
- Pourquoi les messages de commit significatifs sont importants
- Quand s'engager.

## Les messages de commit sont-ils si importants qu'ils méritent leur propre leçon ?

Oui! Laissez-moi vous donner une liste rapide des raisons pour lesquelles :

- Lorsque vous postulez à un emploi, les employeurs examineront vos projets sur GitHub ainsi que votre historique de validation. Avoir de bons engagements en tant que développeur novice vous aidera à vous démarquer.

- Avoir un bon historique des messages de validation vous permettra (ou à d'autres développeurs travaillant sur votre code) de voir rapidement quelles modifications ont été apportées et pourquoi. Ceci est utile si un bug est trouvé dans le code et doit être corrigé !

- Avoir un bon historique des messages de validation sera également utile si vous revenez sur un projet sur lequel vous travailliez après vous en être éloigné pendant un certain temps. Vous ne vous souviendrez probablement pas de votre processus de réflexion et des modifications apportées lors de la première écriture du code.

> **note**
> **Il est important de faire les messages de commit en anglais pour garder son github consultable par tout type de recruteur**

## Mauvais ou bons commits

Lorsqu’il s’agit de rédiger des commits, il est crucial de savoir comment les rédiger efficacement. Voici un exemple de mauvais message de commit :

```
fix a bug
```

Même s'il décrit ce que vous avez fait, le message est trop vague, ce qui laisse les autres développeurs de votre équipe confus. Un bon message de commit expliquera le **pourquoi** derrière vos modifications. En d’autres termes, un message de validation décrit le problème que vos modifications résolvent et comment elles les résolvent.

Les commits efficaces se composent de deux parties distinctes : un sujet et un corps :

### Sujet
Un bref résumé de la modification que vous avez apportée au projet.

```
This is the change I made to the codebase.
```

> **GitHub a une limite de 72 caractères, nous vous recommandons donc de maintenir vos engagements dans cette limite.**

### Corps
Une description concise mais claire de ce que vous avez fait.

```
Describe the problem your commit solves and how.
```


Maintenant que nous avons appris le secret pour créer un bon message de commit, essayons de corriger le message de commit précédent :


```git
Add missing link and alt text to the company's logo

Screen readers won't read the images to users with disabilities without this information
```

Ahh, c'est mieux ! :) Désormais, les développeurs peuvent mieux comprendre ce message de validation car il effectue les opérations suivantes :

- Fournit un sujet qui spécifie l'action de votre code (par exemple, "Ajouter un lien manquant et un texte alternatif au logo de l'entreprise").
- Contient un corps qui fournit une description concise mais claire de la raison pour laquelle la validation doit être effectuée (par exemple, "Les lecteurs d'écran ne liront pas les images aux utilisateurs handicapés sans cette information").
- Sépare le sujet du corps avec une ligne nouvelle/vierge. Il s’agit d’une bonne pratique que nous recommandons fortement de suivre. Cela rend les messages de validation plus faciles à lire pour les autres développeurs.


## Quand s'engager

Un bon moyen de visualiser une validation est comme un « instantané » de votre code au moment où il a été réalisé. Cette version de votre code jusqu'à ce point sera enregistrée pour que vous puissiez y revenir ou la consulter.


Lors de l’écriture de code, il est considéré comme une bonne pratique de s’engager à chaque fois que vous apportez une modification significative au code. Cela créera une chronologie de vos progrès et montrera que votre code terminé n'est pas apparu de nulle part.

En d’autres termes, effectuez un commit si un morceau de code sur lequel vous travaillez fonctionne comme vous le souhaitez, corrigez une faute de frappe ou corrigez un bogue. Au fur et à mesure que vous gagnerez en expérience, vous développerez une meilleure idée de ce qui devrait être engagé !

Il viendra un moment où vous travaillerez sur un projet et vous obtiendrez ENFIN quelque chose de parfait (ce serait le bon moment pour vous engager), puis peut-être 30 secondes à quelques jours plus tard, cela se cassera. Vous n'avez aucune idée de ce que vous avez changé, tout *semble* être pareil et vous ne vous souvenez pas d'avoir modifié cette ligne, mais hélas, cela ne fonctionne plus comme vous le souhaitez. Vous pourrez revenir en arrière dans votre historique de validation et soit rétablir votre code au dernier commit que vous avez effectué lorsque vous avez fait fonctionner cette partie pour la première fois, soit revenir en arrière et voir à quoi ressemblait votre code à ce moment-là.

## Devoir

<div class="lesson-content__panel" markdown="1">

1. Cet article, [Comment écrire un message de validation Git](https://cbea.ms/git-commit), couvre toutes les bases principales sur la façon d'écrire de bons messages de validation. L'article dans son ensemble est excellent et informatif, mais l'essentiel de l'article est « Les sept règles d'un bon message de commit ».

</div>


## Conseils et choses à retenir :

- Utiliser VSCode comme éditeur de texte (vous auriez dû le configurer dans la section Git Basics) vous permettra de créer facilement des messages de validation sur plusieurs lignes, de voir facilement la longueur des caractères de chaque ligne et vous permettra d'utiliser [Spell VSCode vérifiez les extensions](https://marketplace.visualstudio.com/items?itemName=streetsidesoftware.code-spell-checker) pour vous assurer que votre orthographe est correcte
- Utilisez une voix active : "Réparer le générateur de cartes".
- Évitez d'utiliser des messages de validation vagues tels que "enregistré" ou "mis à jour".
- Engagez-vous tôt et souvent !

## Vérification des connaissances

Cette section contient des questions vous permettant de vérifier par vous-même votre compréhension de cette leçon. Si vous rencontrez des difficultés pour répondre à une question, cliquez dessus et consultez le matériel auquel elle renvoie.

- [Quels sont les deux avantages d'avoir des messages de commit bien rédigés et un bon historique de commit ?](https://cbea.ms/git-commit/#intro)
- [Combien de caractères doit contenir la ligne d'objet de votre message de commit ?](https://cbea.ms/git-commit/#limit-50)

### Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- Une façon de formuler des messages de validation riches en informations consiste à suivre un modèle. [Commits conventionnels](https://www.conventionalcommits.org/en/v1.0.0/) est l'un des nombreux modèles de messages de commit que vous pouvez explorer.
- Explorez cet incroyable didacticiel vidéo sur les commits conventionnels ➔ [Lien vidéo complet](https://www.youtube.com/watch?v=OJqUWvmf4gg). La vidéo présente le modèle de commits conventionnels de la ressource ci-dessus. Il mentionne également la création de sorties et de spectacles en utilisant quelque chose appelé "Yarn". Ces deux parties sont hors de portée de cette partie du cours, alors ne vous en souciez pas et concentrez-vous plutôt sur le modèle de commit.
