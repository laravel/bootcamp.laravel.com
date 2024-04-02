[TOC]

# <b>Les bases de git</b>


## Introduction

Dans cette leçon, nous aborderons les commandes Git courantes utilisées pour gérer vos projets et télécharger votre travail sur GitHub. Nous appelons ces commandes le **workflow Git de base**. Lorsque vous utilisez Git, ce sont les commandes que vous utiliserez 70 à 80 % du temps. Donc, si vous parvenez à les maîtriser, vous aurez fait plus de la moitié de la maîtrise de Git !

## Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

- Comment créer un référentiel sur GitHub.
- Comment obtenir des fichiers vers et depuis GitHub.
- Comment prendre des « instantanés » de votre code.

## Devoir


### Avant de commencer!

- Github a récemment mis à jour la façon dont il nomme la branche par défaut. Cela signifie que vous devez vous assurer que vous utilisez une version récente de git (2.28 ou ultérieure). Vous pouvez vérifier votre version en exécutant :
   `git --version`
- Si vous ne l'avez pas déjà fait, définissez votre <span id="main-push"></span>branche git locale par défaut sur `main`. Vous pouvez le faire en exécutant :
   `git config --global init.defaultBranch main`
- Pour plus d'informations sur le passage de `master` à `main`, voir [GitHub's Renaming Repository](https://github.com/github/renaming).

### Créer le référentiel

1. <span id="new-github-repo"></span>Vous devriez déjà avoir créé un compte GitHub dans la [Configuration de Git](/installations/configurer-git) leçon.

1. Créez un nouveau référentiel en cliquant sur le bouton affiché dans la capture d'écran ci-dessous.

     ![L'écran de profil GitHub](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/00.png)

1. Donnez à votre référentiel le nom "git_test" dans le champ de saisie du nom du référentiel. Cochez "Ajouter un fichier README". Et puis créez le référentiel en cliquant sur le bouton "Créer un référentiel" en bas de la page.

     ![Créer un nouveau dépôt en utilisant GitHub](https://cdn.statically.io/gh/TheOdinProject/curriculum/d0579120dd641d26aaef6a601008e998f8a7c648/git/foundations_git/git_basics/imgs/01.png)

1. Cela vous redirigera vers votre nouveau référentiel sur GitHub. Pour vous préparer à copier (cloner) ce référentiel sur votre machine locale, cliquez sur le bouton vert "Code". Sélectionnez ensuite l'option SSH et copiez la ligne en dessous. **REMARQUE : Vous DEVEZ cliquer sur l'option SSH pour obtenir l'URL correcte.**

     ![Copier le lien SSH en utilisant GitHub](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/02.png)

1. Utilisons la ligne de commande sur votre ordinateur local pour créer un nouveau répertoire pour tous vos projets Odin. Créez un répertoire appelé « repos » avec la commande « mkdir » dans votre dossier personnel. Votre dossier personnel est représenté par `~`. Notez qu'en fonction de votre système d'exploitation, il peut y avoir des [variations du répertoire personnel](https://swcarpentry.github.io/shell-novice/02-filedir.html#home-directory-variation) - parfois `~` signifie `/Users/votre_nom d'utilisateur` et parfois cela signifie `/home/votre_nom d'utilisateur`. Si vous n'êtes pas sûr d'être dans votre dossier personnel, tapez simplement « cd ~ ». Une fois réalisé, accédez-y avec la commande `cd`.

    ![Creating a new directory](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/03.png)

1. Il est maintenant temps de cloner votre référentiel de GitHub sur votre ordinateur avec `git clone` suivi de l'URL que vous avez copiée à la dernière étape. La commande complète devrait ressembler à `git clone git@github.com:USER-NAME/REPOSITORY-NAME.git`. Si votre URL ressemble à « https://github.com/USER-NAME/REPOSITORY-NAME.git », vous avez sélectionné l'option HTTPS, et non l'option SSH requise.

    ![Clone the repo using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/04.png)

1. C'est tout ! Vous avez connecté avec succès le référentiel que vous avez créé sur GitHub à votre machine locale. Pour tester cela, vous pouvez `cd` dans le nouveau dossier **git_test** qui a été téléchargé, puis saisir `git remote -v` sur votre ligne de commande. Cela affichera l'URL du référentiel que vous avez créé sur GitHub, qui est la télécommande de votre copie locale. <span id="default-remote"></span>Vous avez peut-être également remarqué le mot **origine** au début de la sortie `git remote -v`, qui est le nom de votre connexion à distance. Le nom « origine » est à la fois la valeur par défaut et la convention pour le référentiel distant. Mais on aurait tout aussi bien pu l'appeler `perroquet-fêtard` ou  `banane-dansante`. (Ne vous inquiétez pas des détails de l'origine pour l'instant ; cela reviendra vers la fin de ce didacticiel.)

    ![Check repo remotes using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/05.png)

### Utiliser le workflow Git

1. Créez un nouveau fichier dans le dossier `git_test` appelé "hello_world.txt" avec la commande `touch hello_world.txt`.

    ![Create hello_world.txt using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/06.png)

1. Tapez `git status` dans votre terminal. Dans la sortie, notez que votre fichier hello_world.txt est affiché en rouge, ce qui signifie que ce fichier n'est pas intermédiaire.

    ![Check status of repo using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/07.png)

1. Tapez `git add hello_world.txt`. Cette commande ajoute votre fichier hello_world.txt à la zone de transit dans Git. La zone de préparation fait partie du processus en deux étapes permettant de réaliser une validation dans Git. Considérez la zone de préparation comme une `salle d'attente` pour vos modifications jusqu'à ce que vous les validiez. Maintenant, tapez à nouveau `git status`. Dans la sortie, notez que votre fichier est désormais affiché en vert, ce qui signifie que ce fichier se trouve désormais dans la zone de préparation.

    ![Stage hello_world and check repo status again using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/08.png)

1. <span id="git-commit"></span>Tapez `git commit -m "Add hello_world.txt"` puis tapez à nouveau `git status`. Le résultat devrait maintenant indiquer : "*rien à valider, arbre de travail propre*", indiquant que vos modifications ont été validées. Ne vous inquiétez pas si vous recevez un message indiquant "*l'amont a disparu*". Ceci est normal et ne s'affiche que lorsque votre référentiel cloné n'a actuellement aucune branche. Il sera résolu une fois que vous aurez suivi le reste des étapes de ce projet.

   Le message "*Votre branche est en avance d'un commit sur 'origin/main'*" signifie simplement que vous disposez désormais d'instantanés plus récents que ceux de votre référentiel distant. Vous téléchargerez vos instantanés plus loin dans cette leçon.

    ![Commit hello_world and check repo status again using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/09.png)

1. <span id="git-log"></span>Tapez `git log` et regardez le résultat. Vous devriez voir une entrée pour votre commit "*Add hello_world.txt*". Vous verrez également des détails sur l’auteur qui a effectué la validation, ainsi que la date et l’heure auxquelles la validation a été effectuée. Si votre terminal est bloqué dans un écran avec (FIN) en bas, appuyez simplement sur "q" pour sortir. Vous pourrez configurer les paramètres pour cela plus tard, mais ne vous inquiétez pas trop pour l'instant.

    ![Commit hello_world and check repo status again using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/10.png)

### Modifier un fichier ou deux

1. Ouvrez README.md dans l'éditeur de texte de votre choix. Dans cet exemple, nous ouvrirons le répertoire dans Visual Studio Code en utilisant la commande « code . » dans votre référentiel.

    ![Add text file and check repo status again using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/11.png)


1. Ajoutez « Hello Boostcamp ! » à la ligne 3 du README.md et enregistrez le fichier avec <kbd>Ctrl</kbd> + <kbd>S</kbd> (Mac : <kbd>Cmd</kbd> + <kbd>S</kbd>).

    ![Edit README using text editor](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/12.png)

    <!-- code element needed to not treat the backtick inside the kbd element as code markdown -->
    <!-- markdownlint-disable-next-line MD033 -->
1. Revenez à votre terminal ou si vous utilisez Visual Studio Code, vous pouvez ouvrir le terminal intégré en appuyant sur <kbd>Ctrl</kbd> + <kbd>`</kbd> (backtick). Tapez ensuite <code>git status</code>. Vous remarquerez que README.md est désormais affiché comme non préparé ou validé.

    ![Check repo status again using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/13.png)

1. Ajoutez README.md à la zone de préparation avec `git add README.md`.

1. Pouvez-vous deviner ce que « git status » affichera maintenant ? README.md sera affiché en texte vert. Cela signifie que README.md a été ajouté à la zone de préparation. Le fichier hello_world.txt n'apparaîtra pas car il n'a pas été modifié depuis sa validation.

    ![Stage README changes and check repo status again using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/14.png)

1. Ouvrez `hello_world.txt`, ajoutez-y du texte, enregistrez-le et mettez-le en scène. Vous pouvez utiliser `git add .` pour ajouter tous les fichiers du répertoire actuel et tous les répertoires suivants à la zone de préparation. Ensuite, tapez à nouveau « git status », et tout devrait maintenant être dans la zone de préparation.

    ![Stage all other files in repo and check repo status again using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/15.png)

1. Enfin, validons tous les fichiers qui se trouvent dans la zone de préparation et ajoutons un message de validation descriptif. `git commit -m "Modifier README.md et hello_world.txt"`. Ensuite, tapez à nouveau `git status`, ce qui affichera "*rien à valider*".

    ![Commit repo changes again and check repo status again using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/16.png)

1. Jetez un dernier coup d'œil à votre historique de validation en tapant « git log ». Vous devriez maintenant voir trois entrées.

    ![Git Log](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/17.png)

### Transférez votre travail vers GitHub

Enfin, téléchargeons votre travail sur le référentiel GitHub que vous avez créé au début de ce didacticiel.

1. <span id="git-push"></span>Tapez `git push`. Pour être plus précis, tapez « git push origin main ». Puisque vous n'avez pas affaire à une autre branche (autre que *main*) ou à une autre télécommande (comme mentionné ci-dessus), vous pouvez la laisser comme `git push` pour enregistrer quelques frappes. **REMARQUE : Si à ce stade, vous recevez un message indiquant "La prise en charge de l'authentification par mot de passe a été supprimée le 13 août 2021. Veuillez utiliser un jeton d'accès personnel à la place.", vous avez mal suivi les étapes et cloné avec HTTPS, pas SSH. . Veuillez suivre les étapes pour [basculer les URL distantes de HTTPS vers SSH](https://docs.github.com/en/get-started/getting-started-with-git/managing-remote-repositories#switching-remote-urls-from-https-to-ssh)pour changer votre télécommande en SSH, puis essayez de pousser vers Github.**

    ![Push changes to remote using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/18.png)

1. Tapez `git status` une dernière fois. Il devrait afficher "*Votre branche est à jour avec 'origin/main'. Rien à valider, arbre de travail propre*".

    ![Check repo status again to confirm local repo is up to date with remote using CLI](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/19.png)

1. Lorsque vous rechargez le référentiel sur GitHub, vous devriez voir les fichiers README.md et hello_world.txt que vous venez d'y placer depuis votre ordinateur local.

    ![Verify repo changes are on GitHub](https://cdn.statically.io/gh/TheOdinProject/curriculum/b54d14c5dcee1c6fac61aee02fca7e9ef7ba1510/foundations/git_basics/project_practicing_git_basics/imgs/20.png)


### Remarque/Avertissement

Lorsque vous essayez d'apporter des modifications rapides aux fichiers de votre dépôt, par exemple en essayant de corriger une faute de frappe dans votre README.md, vous pourriez être tenté d'effectuer cette modification directement via Github. Cependant, il est préférable d'éviter cela car cela entraînerait des problèmes qui nécessiteraient des connaissances Git plus avancées que celles que nous souhaitons aborder à ce stade (cela sera abordé dans une prochaine leçon). Pour l'instant, il est conseillé d'effectuer toute modification via votre compte local. les fichiers sont ensuite validés et transmis à l'aide des commandes Git dans votre terminal une fois prêts.

### Aide-mémoire

Il s'agit d'une liste de référence des commandes Git les plus couramment utilisées. (Vous pourriez envisager de mettre cette page pratique dans vos favoris.) Essayez de vous familiariser avec les commandes afin de pouvoir éventuellement vous en souvenir toutes :

- Commandes liées à un dépôt distant :
   - `git clone git@github.com:USER-NAME/REPOSITORY-NAME.git`
   - `git push` ou `git push origin main` (les deux accomplissent le même objectif dans ce contexte)
- Commandes liées au workflow :
   - `git ajouter .`
   - `git commit -m "Un message décrivant ce que vous avez fait pour rendre cet instantané différent"`
- Commandes liées à la vérification de l'état ou de l'historique des journaux
   - `statut git`
   - `journal git`

La syntaxe de base de Git est `program | actions | destination».

Par exemple,

- `git add .` est lu comme `git | ajouter | .`, où le point représente tout ce qui se trouve dans le répertoire courant ;
- `git commit -m "message"` est lu comme `git | commettre -m | "message" ; et
- `git status` est lu comme `git | statut | (pas de destination)».

## Bonnes pratiques Git

Il y a beaucoup à apprendre sur l'utilisation de Git. Mais cela vaut la peine de prendre le temps de mettre en avant quelques bonnes pratiques afin que vous puissiez être un meilleur collaborateur. Git n'est pas seulement utile pour collaborer avec d'autres. C’est également utile lorsque vous travaillez de manière indépendante. À l’avenir, vous vous fierez de plus en plus à votre propre historique de validation lorsque vous revisiterez l’ancien code.

Deux bonnes pratiques utiles à prendre en compte sont les **commits atomiques** et l'exploitation de ces commits atomiques pour rendre vos messages de commit plus utiles aux futurs collaborateurs.

Un commit atomique est un commit qui inclut des modifications liées à une seule fonctionnalité ou tâche de votre programme. Il y a deux raisons principales à cela : premièrement, si quelque chose que vous modifiez s'avère causer des problèmes, il est facile d'annuler la modification spécifique sans perdre les autres modifications ; et deuxièmement, cela vous permet d'écrire de meilleurs messages de validation. Vous en apprendrez davantage sur ce à quoi ressemble un bon message de commit dans une prochaine leçon !

### Modification de l'éditeur de messages de commit Git

Si vous utilisez *Visual Studio Code* (et vous devriez l'être si vous suivez ce programme), il existe un moyen de garantir que si vous utilisez `git commit` sans l'indicateur de message (`-m`), vous gagnerez. Ne restez pas coincé à écrire votre message de validation dans [Vim](<https://en.wikipedia.org/wiki/Vim_(text_editor)>).

Changer l'éditeur de messages par défaut est une bonne idée au cas où vous omettez accidentellement l'indicateur, à moins que vous ne préfériez utiliser Vim. Il n'y a aucun inconvénient à le changer, car vous aurez la possibilité d'écrire vos messages de validation dans le terminal ou dans le confort de VS Code.

La commande suivante définira cette configuration. Tapez (ou copiez et collez) cette commande dans votre terminal et appuyez sur <kbd>Entrée</kbd>.

```bash
git config --global core.editor "code --wait"
```

Il n'y aura aucune confirmation ni aucune sortie sur le terminal après avoir entré cette commande.

Cela fait, vous pouvez maintenant choisir d'utiliser soit `git commit -m "votre message ici"` ou `git commit` pour taper votre message avec Visual Studio Code !

Pour effectuer une validation avec Visual Studio Code comme éditeur de texte, tapez simplement « git commit ». Après avoir appuyé sur <kbd>Entrée</kbd>, un nouvel onglet dans VS Code s'ouvrira pour vous permettre d'écrire votre message de validation. Vous pouvez fournir plus de détails sur plusieurs lignes dans le cadre de votre message de validation. Après avoir tapé votre message de commit, enregistrez-le <kbd>Ctrl</kbd> + <kbd>S</kbd> (Mac : <kbd>Cmd</kbd> + <kbd>S</kbd>) et fermez l'onglet . Si vous revenez à la ligne de commande, vous verrez votre message de validation et un résumé de vos modifications.

## Vérification des connaissances

Les questions suivantes sont l’occasion de réfléchir aux sujets clés de cette leçon. Si vous ne pouvez pas répondre à une question, cliquez dessus pour consulter le matériel, mais gardez à l'esprit que vous n'êtes pas censé mémoriser ou maîtriser ces connaissances.

- [Comment créer un nouveau dépôt sur GitHub ?](#new-github-repo)
- [Comment copier un référentiel sur votre machine locale depuis GitHub ?](#github-to-local)
- [Quel est le nom par défaut de votre connexion à distance ?](#default-remote)
- [Expliquez ce qu'est `origin` dans `git push origin main`.](#origin-push)
- [Expliquez ce qu'est `main` dans `git push origin main`.](#main-push)
- [Expliquez le système en deux étapes que Git utilise pour enregistrer les fichiers.](#two-stages)
- [Comment vérifier l'état de votre dépôt actuel ?](#git-status)
- [Comment ajouter des fichiers à la zone de transit dans git ?](#git-add)
- [Comment valider les fichiers dans la zone de transit et ajouter un message descriptif ?](#git-commit)
- [Comment transmettre vos modifications à votre référentiel sur GitHub ?](#git-push)
- [Comment regardez-vous l'historique de vos commits précédents ?](#git-log)

### Additional resources

This section contains helpful links to related content. It isn't required, so consider it supplemental.

- [Complete Git and GitHub Tutorial from Basics to Advanced](https://www.youtube.com/watch?v=apGV9Kg7ics) - by Kunal Kushwaha
- [Git - Reference](https://git-scm.com/docs)
- [GitHub guide on adding locally hosted code](https://docs.github.com/en/migrations/importing-source-code/using-the-command-line-to-import-source-code/adding-locally-hosted-code-to-github) walks you through creating a git repository from a local folder and adding it to GitHub.
