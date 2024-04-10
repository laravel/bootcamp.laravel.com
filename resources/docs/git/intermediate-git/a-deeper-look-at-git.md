[TOC]

# <b>Approfondir git</b>

> **note**
> **Vous pouvez sauter cette partie**


## Introduction

Git est une compétence cruciale à posséder, que vous soyez simplement un amateur ou que vous souhaitiez devenir un développeur Web professionnel. C'est le bouton « Enregistrer » sur les stéroïdes et permet une collaboration transparente. Il n'y a pas vraiment beaucoup de commandes à apprendre, mais parfois la vraie difficulté de Git vient de la visualisation de ce qui se passe.

Dans cette leçon, nous allons vous aider avec la visualisation en plongeant plus profondément que les commandes `git add`, `git commit` et `git push` que vous utilisez principalement. Nous aborderons des sujets tels que les télécommandes, les pointeurs et la modification de l'historique Git. Cela élargira votre compréhension de ce qui se passe réellement sous le capot de Git.

Il est **très important** de jeter un œil à tout cela avant de poursuivre le programme. Le travail sur le projet devient de plus en plus complexe, l'utilisation d'un workflow Git discipliné n'est donc plus facultative. J'espère qu'après avoir suivi cette leçon, vous serez beaucoup plus à l'aise pour modifier votre historique Git et aurez une meilleure compréhension de Git dans son ensemble.

## Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

- Commandes Git qui changent l'historique
- Différentes façons de changer l'histoire
- Utiliser des commandes pour modifier l'historique
- Dangers des opérations qui changent l'histoire
- Meilleures pratiques des opérations de changement d'histoire
- Pointeurs

## Changer l'histoire

Supposons donc que vous soyez à l'aise pour rédiger de bons messages de validation et que vous travailliez avec des branches pour avoir un bon flux de travail Git. Mais personne n'est parfait, et pendant que vous écrivez du beau code, quelque chose ne va pas ! Peut-être que vous vous engagez trop tôt et qu'il vous manque un fichier. Peut-être que vous gâchez l'un de vos messages de validation et oubliez un détail vital.

Examinons quelques façons dont nous pouvons modifier l'histoire récente et lointaine pour répondre à nos besoins. Nous allons expliquer le commentaire :

- Modifier notre commit le plus récent
- Modifier plusieurs messages de validation
- Réorganiser les commits
- Ensemble Squash s'engage
- Diviser les commits

### Mise en place

Avant de commencer la leçon, créons un terrain de jeu Git dans lequel nous pouvons suivre le code en toute sécurité et effectuer des opérations de modification de l'historique. Accédez à GitHub et, comme vous l'avez fait par le passé, créez un nouveau référentiel. Appelez-le comme vous le souhaitez et clonez ce référentiel sur votre système local. Maintenant, mettons `cd` dans le référentiel que nous venons de cloner et créons de nouveaux fichiers ! Une fois que vous êtes dans le référentiel, suivez les commandes suivantes (y compris la faute de frappe). Recherchez-les si vous ne comprenez pas ce qui se passe.

```bash
touch test{1..4}.md
git add test1.md && git commit -m 'Create first file'
git add test2.md && git commit -m 'Create send file'
git add test3.md && git commit -m 'Create third file and create fourth file'
```

### Mise en place de l'éditeur de code

Pour exécuter certaines commandes Git nécessitant l'ouverture d'un éditeur de texte, telles que `git commit --amend` et `git rebase -i`, il est important de configurer correctement votre éditeur de code. Par défaut, Git ouvre l'éditeur de texte dans l'interface de ligne de commande (CLI), ce qui peut vous empêcher d'enregistrer et de fermer l'éditeur après avoir apporté des modifications.

Pour configurer correctement votre éditeur de code, vous pouvez suivre les instructions fournies dans la leçon Git Basics. 

### Changer le dernier commit

Donc, si nous regardons le dernier commit que nous avons fait *Uh-Oh !*, si vous tapez `git status` et `git log`, vous pouvez voir que nous avons oublié d'ajouter un fichier ! Ajoutons notre fichier manquant et exécutons `git commit --amend`

```bash
git add test4.md
git commit --amend
```

Ce qui s'est passé ici, c'est que nous avons d'abord mis à jour la zone de préparation pour inclure le fichier manquant, puis nous avons remplacé le dernier commit par notre nouveau pour inclure le fichier manquant. Si nous le voulions, nous aurions pu modifier le message du commit et cela aurait écrasé le message du commit précédent.

N'oubliez pas de **modifier uniquement les commits qui n'ont été poussés nulle part !** La raison en est que `git commit --amend` ne modifie pas le dernier commit, il *remplace ce commit par un entièrement nouveau*. Cela signifie que vous pourriez potentiellement détruire un commit sur lequel d'autres développeurs fondent leur travail. Lorsque vous réécrivez l'histoire, assurez-vous toujours que vous le faites de manière sûre et que vos collègues sont conscients de ce que vous faites.

### Modification de plusieurs commits

Supposons maintenant que nous avions des engagements plus anciens dans notre histoire que nous souhaitons modifier. C'est là que la belle commande `git rebase` entre en jeu ! Nous allons approfondir les complexités du «  rebase  » plus tard dans cette leçon, mais pour l'instant, nous allons commencer par une utilisation très basique.

`git rebase -i` est une commande qui nous permet de nous arrêter de manière interactive après chaque commit que nous essayons de modifier, puis d'apporter les modifications que nous souhaitons. Nous devons indiquer à cette commande quel est le dernier commit que nous souhaitons modifier. Par exemple, `git rebase -i HEAD~2` nous permet de modifier les deux derniers commits. Voyons à quoi cela ressemble en action, allez-y et tapez :

```bash
git log
git rebase -i HEAD~2
```

Vous devriez remarquer que lors du rebasage, les commits sont répertoriés dans l'ordre opposé par rapport à la façon dont nous les voyons lorsque nous utilisons `git log`. Prenez une minute pour parcourir toutes les options que l'outil interactif vous propose. Examinons maintenant les messages de validation en haut de l'outil. Si nous voulions modifier l'un de ces commits, nous remplacerions le mot « pick » par « edit » pour le commit approprié. Si nous voulions supprimer un commit, nous le supprimerions de la liste, et si nous voulions modifier son ordre, nous modifierions sa position dans la liste. Voyons à quoi ressemble une modification !

```bash
edit eacf39d Create send file
pick 92ad0af Create third file and create fourth file
```

Cela nous permettrait de modifier la faute de frappe dans le commit « Créer un fichier d'envoi » pour qu'elle soit « Créer un deuxième fichier ». Effectuez des modifications similaires dans votre outil de rebase interactif, mais ne copiez pas et ne collez pas le code ci-dessus car cela ne fonctionnera pas. Enregistrez et quittez l'éditeur, ce qui nous permettra d'éditer le commit avec les instructions suivantes :

```bash
You can amend the commit now, with
       git commit --amend
Once you're satisfied with your changes, run
       git rebase --continue
```

Modifions donc notre commit en tapant `git commit --amend`, corrigeons la faute de frappe dans le titre, puis terminons le rebase en tapant `git rebase --continue`. C'est tout ce qu'on peut en dire! Jetez un œil à votre travail en tapant « git log » et en voyant l'historique modifié. Cela semble simple, mais c'est un outil très dangereux s'il est mal utilisé, alors soyez prudent. Plus important encore, n'oubliez pas que **si vous devez rebaser des commits dans un référentiel partagé, assurez-vous de le faire pour une très bonne raison dont vos collègues sont conscients.**

### Écraser les commits

Utiliser « squash » pour nos commits est un moyen très pratique de garder notre historique Git bien rangé. Il est important de savoir comment « écraser », car ce processus peut être la norme dans certaines équipes de développement. Le Squashing permet aux autres de comprendre plus facilement l’historique de votre projet. Ce qui arrive souvent lorsqu'une fonctionnalité est fusionnée, c'est que nous nous retrouvons avec des journaux visuellement complexes de toutes les modifications apportées par une branche de fonctionnalité sur une branche principale. Ces commits sont importants pendant que la fonctionnalité est en développement, mais ne sont pas vraiment nécessaires lorsque l'on parcourt l'intégralité de l'historique de votre branche principale.

Disons que nous voulons « écraser » le deuxième commit dans le premier commit de la liste, qui est « Créer le premier fichier ». Commençons par rebaser jusqu'à notre commit racine en tapant « git rebase -i --root ». Maintenant, ce que nous allons faire est de « choisir » ce premier commit, comme celui dans lequel le deuxième commit est « écrasé » :

```bash
pick e30ff48 Create first file
squash 92aa6f3 Create second file
pick 05e5413 Create third file and create fourth file
```

Renommez le commit en « Créer le premier et le deuxième fichier », puis terminez le rebase. C'est ça! Exécutez `git log` et voyez comment les deux premiers commits ont été écrasés.

### Fractionner un commit

Avant de plonger dans les télécommandes, nous allons jeter un œil à une commande Git pratique appelée « git reset ». Jetons un coup d'œil au commit « Créer un troisième fichier et créer un quatrième fichier ». Pour le moment, nous utilisons des fichiers vierges pour plus de commodité, mais disons que ces fichiers contenaient des fonctionnalités et que le commit en décrivait trop à la fois. Dans ce cas, nous pourrions le diviser en deux commits plus petits en utilisant, encore une fois, l'outil interactif « rebase ».

Nous pouvons ouvrir l'outil comme la dernière fois, remplacer « pick » par « edit » pour le commit que nous allons diviser. Mais à la place, ce que nous allons faire est d'exécuter `git reset HEAD^`, qui réinitialise le commit à celui juste avant HEAD. Cela nous permet d'ajouter les fichiers individuellement et de les valider individuellement. Dans l'ensemble, cela ressemblerait à ceci :

```bash
git reset HEAD^
git add test3.md && git commit -m 'Create third file'
git add test4.md && git commit -m 'Create fourth file'
```

Commençons par regarder d'un peu plus près ce qui s'est passé ici. Lorsque vous avez exécuté `git reset`, vous réinitialisez la branche actuelle en pointant HEAD sur le commit juste avant celui-ci. Dans le même temps, `git reset` a également mis à jour l'index (la zone de préparation) avec le contenu de l'endroit où HEAD est maintenant pointé. Ainsi, notre zone de préparation a également été réinitialisée à ce qu'elle était lors de la validation précédente - ce qui est formidable - car cela nous a permis d'ajouter et de valider les deux fichiers séparément.

Maintenant, disons que nous voulons nous déplacer là où HEAD pointe mais *ne voulons pas* toucher la zone de transit. Si nous voulons laisser l'index tranquille, vous pouvez utiliser `git reset --soft`. Cela n'effectuerait que la première partie de `git reset` où le HEAD est déplacé vers un autre endroit.

Vous pouvez considérer `git reset --soft` comme une modification plus puissante. Au lieu de modifier le dernier commit, vous pouvez revenir en arrière sur plusieurs commits et combiner toutes les modifications qu'ils contiennent en un seul commit.

La dernière partie de la réinitialisation que nous voulons aborder est `git reset --hard`. Cela fait qu'il effectue toutes les étapes de `git reset`, en déplaçant le HEAD et en mettant à jour l'index, mais il *également* met à jour le répertoire de travail. Il est important de le noter car cela peut être dangereux car cela peut potentiellement détruire les données. Une réinitialisation matérielle écrase les fichiers du répertoire de travail pour le faire ressembler exactement à la zone de transit de l'endroit vers lequel HEAD finit par pointer. De la même manière que `git commit --amend`, une réinitialisation matérielle est une commande destructrice qui écrase l'historique. Cela ne signifie pas que vous devez l'éviter complètement si vous travaillez avec des référentiels partagés en équipe avec d'autres développeurs. Vous devez cependant **vous assurer que vous savez exactement pourquoi vous l'utilisez et que vos collègues savent également comment et pourquoi vous l'utilisez.**

### Les branches sont des indicateurs

Alors, qu’est-ce qu’une succursale ? En fonction de votre exposition, vous visualisez peut-être une branche comme un groupe de commits. Ce n’est en réalité pas le cas ! **Une branche est en fait un pointeur vers un seul commit !** En entendant cela, votre première pensée pourrait être *"Eh bien, si une branche n'est qu'un doigt pointé vers un seul commit, comment ce seul commit connaît-il tous les commits qui est venu avant ?"* La réponse à cette question est très simple : chaque commit est également un pointeur qui pointe vers le commit qui l'a précédé ! Ouah. Cela pourrait être beaucoup à prendre en compte, alors prenons un moment pour absorber ce fait.

Maintenant que vous avez eu une seconde pour rassembler vos pensées et tenter de comprendre ce concept, il pourrait être utile de revenir en arrière et d'examiner un exemple concret de pointeurs que nous avons utilisés dans cette leçon. Repensons à notre utilisation de `git rebase -i HEAD~2`. Si vous vous en souvenez, cette commande nous permet de modifier les deux derniers commits. Avez-vous une idée sur la façon dont Git savait quels deux commits modifier ? C'est vrai, en utilisant des pointeurs ! Nous commençons par HEAD, qui est un pointeur spécial pour garder une trace de la branche sur laquelle vous vous trouvez actuellement. HEAD pointe vers notre commit le plus récent dans la branche actuelle. Ce commit pointe vers le commit effectué juste avant lui, que nous pouvons appeler commit deux. C'est ainsi que `git rebase -i HEAD~2` commence par un pointeur HEAD, puis suit les pointeurs suivants pour trouver les deux commits à modifier.

Vous vous sentez peut-être dépassé à ce stade, alors récapitulons ce que nous avons appris. Une branche est un pointeur vers un seul commit. Un commit est un instantané, et c'est un pointeur vers le commit directement derrière lui dans l'historique. C'est ça!

### Assignment

<div class="lesson-content__panel" markdown="1">

1. Lisez le chapitre sur [Rebasing couvert par git-scm](https://git-scm.com/book/en/v2/Git-Branching-Rebasing) pour une plongée encore plus approfondie dans le rebasing.

1. Lisez le chapitre sur [Réinitialisation couverte par git-scm](https://git-scm.com/book/en/v2/Git-Tools-Reset-Demystified) pour une plongée plus approfondie dans `git reset`.

</div>

### Contrôle des connaissances

Les questions suivantes sont l’occasion de réfléchir aux sujets clés de cette leçon. Si vous ne pouvez pas répondre à une question, cliquez dessus pour consulter le matériel, mais gardez à l'esprit que vous n'êtes pas censé mémoriser ou maîtriser ces connaissances.

- <a class='knowledge-check-link' href='https://git-scm.com/book/en/v2/Git-Branching-Branches-in-a-Nutshell'>Expliquez ce que cela signifie pour les branches être des indicateurs.</a>
- <a class='knowledge-check-link' href='https://git-scm.com/book/en/v2/Git-Basics-Undoing-Things'>Comment pouvez-vous modifier votre dernier commit ?</ une>
- <a class='knowledge-check-link' href='https://git-scm.com/book/en/v2/Git-Tools-Rewriting-History'>Quelles sont les différentes manières de réécrire l'histoire ?< /a>

### Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- Lisez ceci [Git Cheat Sheet](https://www.atlassian.com/git/tutorials/atlassian-git-cheatsheet) si vous avez besoin d'une feuille de référence.
- Regardez cette [vidéo sur le rebase et la fusion](https://www.youtube.com/watch?v=f1wnYdLEpgI) pour un exemple de la façon d'utiliser à la fois le rebase et la fusion.
- Lisez le chapitre sur les [Branches couvertes par git-scm](https://git-scm.com/book/en/v2/Git-Branching-Branches-in-a-Nutshell) si vous souhaitez approfondir encore davantage Branches.
