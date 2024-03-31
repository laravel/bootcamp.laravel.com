### Introduction

Il est temps de mettre en pratique toutes les connaissances HTML que vous avez acquises. Dans ce projet, vous allez créer un site Web de recettes de base.

Le site Web comprendra une page d'index principale qui contiendra des liens vers quelques recettes. Le site Web ne sera pas très joli une fois que vous aurez terminé. Non, sauf si vous aimez la [conception de sites Web brutalistes](https://brutalistwebsites.com/), bien sûr.

Mais il est important de garder à l'esprit que ce projet consiste simplement à créer vos éléments HTML ; nous reviendrons sur ce projet à l'avenir pour le styliser avec CSS.

### Configurer le dépôt GitHub de votre projet

Comme mentionné dans l'[introduction à Git](), vous souhaiterez organiser tous vos projets comme un portfolio et les lier à GitHub afin qu'ils puissent être vus par d'autres.

<div class="lesson-note lesson-note--warning" markdown="1">

#### Soyez prudent lorsque vous créez des fichiers sur GitHub

GitHub nous permet d'apporter des modifications directement sur son site. Si vous faites cela après avoir cloné le référentiel sur votre machine, votre code local sera une version derrière la version distante, ce qui créera des défis supplémentaires lorsque vous pousserez votre travail. La plupart du temps, vous devriez créer des fichiers localement.

  Au fur et à mesure de votre progression dans le cours, vous apprendrez à gérer ces situations, mais pour l'instant, il est important de suivre attentivement les instructions pour rester sur le chemin de la simplicité.
</div>

Si vous ne savez pas comment configurer un référentiel, suivez les étapes d'instructions 1 et 2 trouvées dans [Git Basics]() pour découvrez comment, avant de poursuivre ces étapes :

1. Créez un nouveau dépôt pour ce projet sur GitHub.com et appelez-le `project-recipes` et choisissez l'option « public » au lieu de l'option privée par défaut.

1. Clonez ce référentiel sur votre machine locale, dans le dossier « repos » que vous avez précédemment créé dans la leçon Git Basics. La commande devrait ressembler à `git clone git@github.com:username/project-recipes.git` (utilisez SSH).

1. Maintenant, `cd` dans le répertoire du projet `project-recipes` qui se trouve maintenant sur votre ordinateur local.

1. Configurez votre fichier « README.md » et rédigez une brève introduction décrivant le projet en cours et les compétences que vous aurez démontrées une fois que vous l'aurez terminé. (Vous pouvez également le faire comme réflexion personnelle à la fin du projet, ce qui constitue un bon moyen de revoir ce que vous avez appris.)

Si vous rencontrez des problèmes :

- Toutes les commandes Git doivent être exécutées depuis le dossier de votre projet (avez-vous oublié de `cd` dans le dossier `project-recipes` ?).

- Assurez-vous d'avoir suivi les étapes [ici à l'étape 2.3](/paths/foundations/courses/foundations/lessons/setting-up-git#step-2-configure-git-and-github) pour cloner depuis GitHub avec SSH.

- Reportez-vous au [workflow]() dans la leçon sur les bases de Git.

#### Conseils pour savoir quand s'engager

N'oubliez pas tout ce que nous avons abordé dans la [leçon précédente]() sur les messages de validation !

Lorsque vous construisez votre projet, vous finirez probablement par faire plusieurs cycles `git add` + `git commit` avant d'être prêt à le pousser vers GitHub avec `git push origin main`.

Lors de l’écriture de code, il est considéré comme une bonne pratique de s’engager tôt et souvent. Engagez-vous à chaque fois que vous apportez un changement significatif dans le code. Cela créera une chronologie de vos progrès et montrera que votre code terminé n'est pas apparu de nulle part.

Après avoir entré « git push origin main », passez à votre navigateur et ouvrez votre référentiel sur GitHub. Vous devriez maintenant voir tous les fichiers que vous venez de transférer.

D'accord, c'est assez Git pour le moment – il est temps de réellement construire des choses !

### Devoir

<div class="lesson-content__panel" markdown="1">

#### Itération 1 : structure initiale

1. Dans le répertoire `project-recipes`, créez un fichier `index.html`.
1. Remplissez-le avec le code HTML standard habituel et ajoutez un en-tête « h1 » « Recettes Odin » au corps.

#### Itération 2 : page de recette

1. Créez un nouveau répertoire dans le répertoire `project-recipes` et nommez-le « recettes ».
1. Créez un nouveau fichier HTML dans le répertoire « recettes » et nommez-le d'après la recette qu'il contiendra. Par exemple `lasagna.html`. Vous pouvez utiliser le nom de votre plat préféré ou, si vous avez besoin d'inspiration, vous pouvez [trouver une recette à utiliser ici](https://www.allrecipes.com/).
1. Pour l'instant, incluez simplement un en-tête « h1 » avec le nom de la recette comme contenu.
1. De retour dans le fichier `index.html`, ajoutez un lien vers la page de recette que vous venez de créer. Exemple : sous l'en-tête `<h1>Recettes Odin</h1>`, écrivez le lien comme ceci : `<a href="recipes/recipename.html">Titre de la recette</a>`. Le texte du lien doit à nouveau être le nom de la recette.

#### Itération 3 : contenu de la page de recette

Votre nouvelle page de recettes devrait avoir le contenu suivant :

1. Une image du plat fini sous l'en-tête h1 que vous avez ajouté plus tôt. Vous pouvez trouver des images du plat sur Google ou sur le [site de recettes](https://www.allrecipes.com/) auquel nous avons lié précédemment.

1. Sous l'image, elle doit comporter un titre « Description » de taille appropriée suivi d'un ou deux paragraphes décrivant la recette.

1. Sous la description, ajoutez un titre « Ingrédients » suivi d'une **liste non ordonnée** des ingrédients nécessaires à la recette.

1. Enfin, sous la liste des ingrédients, ajoutez un titre « Étapes » suivi d'une **liste ordonnée** des étapes nécessaires à la réalisation du plat.

#### Itération 4 : ajouter plus de recettes

1. Ajoutez deux autres recettes avec des structures de page identiques à la page de recettes que vous avez déjà créée.
1. N'oubliez pas de créer un lien vers les nouvelles recettes sur la page d'index. Pensez également à placer tous les liens dans une liste non ordonnée afin qu’ils ne soient pas tous sur une seule ligne.

Exemple:

```html
 <ul>
    <li><a href="recipes/yourrecipe.html">Recipe Title 1</a></li>
    <li><a href="recipes/yourrecipe.html">Recipe Title 2</a></li>
    <li><a href="recipes/yourrecipe.html">Recipe Title 3</a></li>
  </ul>
```
  
Your links won't be flashy, but for now just focus on building them out.
</div>

### Visualiser votre projet sur le Web

Si vous souhaitez montrer votre travail (le projet) à d'autres personnes ou soumettre une solution ci-dessous, vous devrez publier votre site afin que d'autres puissent y accéder depuis le Web, plutôt que uniquement sur votre ordinateur local. La bonne nouvelle est que si vous avez votre projet sur GitHub (comme décrit ci-dessus), cela est simple.

GitHub vous permet de publier des projets Web directement depuis un référentiel GitHub. Cela vous permettra d'accéder à votre projet à partir de `your-github-username.github.io/your-github-repo-name`.

<div class="lesson-note">
Un compte payant GitHub est requis pour publier un référentiel privé.
</div>

Il existe plusieurs façons de procéder, mais la plus simple est la suivante :

- Assurez-vous que le fichier HTML principal de votre projet s'appelle `index.html`. Si ce n'est pas le cas, vous devrez le renommer.
- Accédez à votre dépôt GitHub sur le Web et cliquez sur le bouton **Paramètres** comme indiqué dans la capture d'écran ci-dessous.
     ![Capture d'écran pointant vers les paramètres situés dans un exemple de référentiel](https://cdn.statically.io/gh/TheOdinProject/curriculum/90b1a362af0bb8635af9593cd8911c9aefb68569/foundations/html_css/html-foundations/imgs/01.png)
- Cliquez sur **Pages** dans la barre latérale gauche.
- Modifiez la **Branche** de *aucune* à *branche principale* et cliquez sur **Enregistrer**.
- Cela peut prendre quelques minutes (le site Web GitHub indique jusqu'à 10, mais nous avons vu que cela prend jusqu'à une heure. N'ajoutez pas de "thème" à votre projet, sinon vous pourriez avoir des conflits git, soyez patient .) mais votre projet doit être accessible sur le Web à partir de `your-github-username.github.io/your-github-repo-name` (en remplaçant évidemment vos propres informations dans le lien).
- Si votre projet n'est pas publié après 1 heure, assurez-vous que vous disposez d'un fichier appelé `index.html` à la racine de votre référentiel et que tous les paramètres ont été correctement définis. Accédez à votre dépôt sur GitHub et cliquez sur Actions, s'il n'y a aucune entrée, puis revenez aux paramètres, changez la **Branche** de **branche principale** à **aucune** et cliquez sur **Enregistrer**, puis modifiez la **Branche** de *aucun* à *branche principale* et cliquez sur **Enregistrer**.

<div class="lesson-note" markdown="1">
Lorsque vous regardez les soumissions de projets ci-dessous, vous vous demandez peut-être :
"Pourquoi sont-ils si beaux, mon projet devrait-il ressembler à ceci ?".

Voici la réponse :

1. La principale raison pour laquelle ils sont si beaux est qu’ils ne sont pas réalisés par des débutants. Ils ont probablement été soumis par des personnes ayant une certaine expérience en programmation ou qui ont déjà réalisé le projet Odin et qui reviennent pour créer de meilleurs sites Web.
1. Votre projet ne devrait pas ressembler à ça. Concentrez-vous principalement sur les exigences du projet.

<!-- Cela s’applique également aux projets futurs.
Pour plus d'informations, lisez la [Partie 5](https://dev.to/theodinproject/learning-code-f56) de [Devenir une histoire de réussite TOP](https://dev.to/theodinproject/becoming-a-top- success-story-mindset-3dp2)
</div> -->
