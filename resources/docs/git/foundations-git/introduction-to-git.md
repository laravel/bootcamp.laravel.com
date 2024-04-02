[TOC]

# <b>Introduction a git</b>

## Introduction

Git est comme un **bouton de sauvegarde épique** pour vos fichiers et répertoires. Officiellement, Git est un système de contrôle de version.

<span id="text-editor-and-git"></span>Une *sauvegarde* dans un éditeur de texte enregistre tous les mots d'un document dans un seul fichier. Vous ne recevez qu'un seul enregistrement du fichier, tel que « essay.doc », à moins que vous ne fassiez des copies en double (ce qui est difficile à retenir et à suivre) :

`essai-draft1.doc`, `essai-draft2.doc`, `essai-final.doc`

Cependant, une **sauvegarde** dans Git enregistre les différences dans les fichiers et les dossiers ET conserve un **enregistrement historique de chaque sauvegarde**. Cette fonctionnalité change la donne. En tant que développeur individuel, Git vous permet d'examiner l'évolution de votre projet et d'examiner ou de restaurer facilement les états des fichiers du passé. Une fois connecté à un réseau, Git vous permet de pousser votre projet vers GitHub ou d'autres alternatives telles que : Bitbucket, Beanstalk ou GitLab pour le partager et collaborer avec d'autres développeurs.

Veuillez noter que nous prenons **uniquement** en charge GitHub dans notre programme et ne vous aiderons pas à résoudre les problèmes liés aux alternatives.

Bien que Git fonctionne sur votre machine *locale*, GitHub est une installation de stockage **à distance** sur le Web pour tous vos projets de codage. Cela signifie qu'en apprenant Git, vous pourrez présenter votre portfolio sur GitHub ! Ceci est très important car presque toutes les sociétés de développement de logiciels considèrent l'utilisation de Git comme une **compétence essentielle** pour les développeurs Web modernes. Avoir un portfolio GitHub fournira la preuve aux futurs employeurs potentiels de ce dont vous êtes capable.

- Dans cette leçon, nous explorerons brièvement l’histoire de Git, ce que c’est et à quoi il sert.

- Dans la prochaine leçon, nous passerons en revue le workflow de base pour utiliser Git, ce qui devrait améliorer votre compréhension et démontrer pourquoi Git est si utile.

- Enfin, vous monterez un projet avec Git qui servira de modèle pour vos futurs projets.

> **note**
> **Pour l’instant, apprenons ce qu’est Git et pourquoi il est si puissant !**

## Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

  - Expliquez ce que sont Git et GitHub et les différences entre les deux.
  - Décrire les différences entre Git et un éditeur de texte en termes de ce qu'ils sauvegardent et de leur tenue de registres.
  - Décrivez pourquoi Git est utile pour un développeur individuel et une équipe de développeurs.

## Devoir

<div class="lesson-content__panel" markdown="1">

   1. Lisez les chapitres 1.1 à 1.4 de la [section Mise en route de Pro Git](https://git-scm.com/book/en/v2/Getting-Started-About-Version-Control) pour connaître les différences entre les , systèmes de contrôle de version centralisés et distribués.
   1. Regardez [« Qu'est-ce que Git ? » expliqué en 2 minutes](https://www.youtube.com/watch?v=2ReR1YJrNOM) - une vidéo sur ce qu'est Git et comment il peut améliorer le flux de travail d'un individu et d'une équipe de développeurs.
   1. Regardez ["GitHub for Noobs - A Short History"](https://www.youtube.com/watch?v=1h9_cB9mPT8&feature=youtu.be&t=13s) pour un peu d'historique sur Git et GitHub. Git est une technologie utilisée en ligne de commande tandis que [GitHub](https://github.com/) est un site Web que vous pouvez visiter.
   1. Si vous n'avez pas encore installé Git, visitez la leçon [Configuration de Git](/installations/configurer-git)
</div>

## Vérification des connaissances

Cette section contient des questions vous permettant de vérifier par vous-même votre compréhension de cette leçon. Si vous rencontrez des difficultés pour répondre à une question, cliquez dessus et consultez le matériel auquel elle renvoie.

- <a class="knowledge-check-link" href="#introduction">Quel type de programme est Git ?</a>
- <a class="knowledge-check-link" href="#text-editor-and-git">Quelles sont les différences entre Git et un éditeur de texte en termes de ce qu'ils sauvegardent et de leur tenue de registres ?</a>
- <a class="knowledge-check-link" href="#git-local">Git fonctionne-t-il au niveau local ou distant ?</a>
- <a class="knowledge-check-link" href="#github-remote">GitHub fonctionne-t-il au niveau local ou distant ?</a>
- <a class="knowledge-check-link" href="https://www.youtube.com/watch?v=2ReR1YJrNOM">Pourquoi Git est-il utile pour les développeurs ?</a>
- <a class="knowledge-check-link" href="https://youtu.be/1h9_cB9mPT8?t=162">Pourquoi Git et GitHub sont-ils utiles pour une équipe de développeurs ?</a>

## Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- [Qu'est-ce que Git et GitHub ?](https://content.red-badger.com/resources/what-is-git-and-github)
- [Qu'est-ce que le contrôle de version ?](https://www.atlassian.com/git/tutorials/what-is-version-control)
- [Qu'est-ce que Git](https://www.atlassian.com/git/tutorials/what-is-git)