<!-- markdownlint-disable MD024 MD043 -->

# <b>Editeur de text</b>

## Introduction

Un éditeur de texte est de loin l’outil de développement le plus utilisé, quel que soit le type de développeur que vous êtes. Un bon éditeur de texte peut vous aider à écrire un meilleur code grâce à la vérification du code en temps réel, à la coloration syntaxique et au formatage automatique.

## Pourquoi ne puis-je pas utiliser Microsoft Word ?

Les éditeurs de texte enrichi, tels que Microsoft Word et Libre-Office Writer, sont parfaits pour rédiger un article, mais les fonctionnalités qui les rendent efficaces pour créer des documents bien formatés les rendent inadaptés à l'écriture de code. Un document créé avec ces éditeurs de texte enrichi contient bien plus que du texte intégré dans le fichier. Ces fichiers contiennent également des informations sur la manière d'afficher le texte à l'écran et des données sur la manière d'afficher les graphiques intégrés dans le document. En revanche, les éditeurs de texte brut, tels que VSCode et Sublime, n'enregistrent aucune information supplémentaire. Enregistrer uniquement le texte permet à d'autres programmes, comme l'interpréteur de Ruby, de lire et d'exécuter le fichier sous forme de code.

## Éditeurs de codes

Vous pouvez considérer les éditeurs de code comme des outils de développement Web spécialisés. Ils sont hautement personnalisables et offrent de nombreuses fonctionnalités qui vous faciliteront la vie. Il n'y a rien de pire que de passer 2 heures à essayer de comprendre pourquoi votre programme ne fonctionne pas et de réaliser que vous avez raté une parenthèse fermante. Les plugins, la coloration syntaxique, la fermeture automatique des crochets et des accolades et le peluchage ne sont que quelques-uns des avantages de l'utilisation d'un éditeur de code. Il existe de nombreux éditeurs de texte parmi lesquels choisir, mais nous vous suggérons de commencer par Visual Studio Code.

**Visual Studio Code**, ou simplement VSCode comme on l'appelle communément, est un excellent éditeur de code gratuit. Il offre un support complémentaire exceptionnel et une excellente intégration Git. VSCode est l'éditeur de code le plus populaire parmi les étudiants et modérateurs du programme, il est donc facile de trouver de l'aide dans la communauté.

L'éditeur que vous utilisez est généralement une question de préférence, mais pour les besoins de ce cours, nous allons supposer que vous utilisez VSCode, principalement parce qu'il est gratuit, facile à utiliser et qu'il fonctionne à peu près de la même manière sur chaque système d'exploitation. système. Gardez à l'esprit que cela signifie que vous ne pourrez pas obtenir d'aide si vous utilisez un éditeur de texte autre que VSCode pour le programme.

Pour rappel, si vous utilisez une **machine virtuelle**, vous devez installer VSCode **sur votre VM**. Vous pouvez également l'installer sur votre hôte (c'est-à-dire votre système d'exploitation principal Windows), mais vous devez être sûr que vous disposez de cet outil critique dans votre VM.

###Installation de VSCode

Choisissez votre système d'exploitation :

<détails markdown="block">
<summary class="dropDown-header">Linux</summary>

### Étape 1 : Téléchargez VSCode

- Ouvrez votre **Terminal**.
- Exécutez la commande suivante pour télécharger le dernier package **VSCode** `.deb` :

```bash
wget -O code-latest.deb 'https://code.visualstudio.com/sha/download?build=stable&os=linux-deb-x64'
```

### Étape 2 : Installer VSCode

- Saisissez la commande suivante dans votre terminal pour installer le package **VSCode** `.deb` :

```bash
sudo apt install ./code-latest.deb
```

- Si vous y êtes invité, entrez votre mot de passe.

<div class="lesson-note lesson-note--tip" markdown="1">

#### Une note sur la saisie des mots de passe dans le terminal

   Lorsque vous utilisez une commande dans le terminal qui vous demande de saisir votre mot de passe pour l'authentification (comme sudo), vous remarquerez que les caractères ne sont pas visibles lorsque vous les tapez. Même s’il peut sembler que le terminal ne répond pas, ne vous inquiétez pas !

   Il s'agit d'une fonctionnalité de sécurité destinée à protéger les informations confidentielles, comme la façon dont les champs de mot de passe sur les sites Web utilisent des astérisques ou des points. En n'affichant pas les caractères que vous écrivez, le terminal sécurise votre mot de passe.

   Vous pouvez toujours saisir votre mot de passe comme d'habitude et appuyer sur Entrée pour le soumettre.
</div>

<div class="lesson-note lesson-note--tip" markdown="1">

Vous pourriez voir un avis commençant par « N : Le téléchargement est effectué sans bac à sable (...) ». Vous n'avez pas besoin de vous en soucier. [Vous pouvez lire un article sur Reddit pour plus d'informations.](https://www.reddit.com/r/linux4noobs/comments/ux6cwx/comment/i9x2twx/)

</div>

#### Étape 3 : Supprimez le fichier d'installation

```bash
rm code-latest.deb
```

#### Étape 4 : Utiliser VSCode

Vous pouvez démarrer VSCode de deux manières :

- Cliquez sur **Visual Studio Code** dans le menu Applications.
- **Ou**, utilisez la commande `code` depuis le terminal.

```bash
code
```

> MacOS

## Étape 1 : Téléchargez VSCode

- [Téléchargez le dernier fichier .zip du programme d'installation de VSCode.](https://code.visualstudio.com/sha/download?build=stable&os=darwin-universal)

## Étape 2 : Installer VSCode

- Ouvrez le dossier **Téléchargements**.
- Double-cliquez sur le fichier **VSCode-darwin-universal.zip**.
- Faites glisser l'icône **Visual Studio Code.app** vers l'icône du dossier **Applications**.

## Étape 3 : Supprimez le fichier d'installation

- Ouvrez le **Finder**.
- Accédez au dossier **Téléchargements**.
- Faites glisser **VSCode-darwin-universal.zip** vers la corbeille.

## Étape 4 : Utiliser VSCode

- Accédez à votre dossier **Applications**.
- Double-cliquez sur **Visual Studio Code**.

> WSL2 

## Étape 1 : Installer VSCode

- Suivez les instructions de [Visual Studio Code sous Windows](https://code.visualstudio.com/docs/setup/windows) pour installer VSCode.

## Étape 2 : Supprimez le fichier d'installation

- Ouvrez **Explorateur de fichiers**.
- Accédez au dossier **Téléchargements**.
- Faites glisser **VSCodeUserSetup-{version}.exe** vers la corbeille.

## Étape 3 : Installer l'extension WSL

- Ouvrez Visual Studio Code.
- Accédez à l'onglet Extensions.
- Recherchez et installez l'[extension WSL](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-wsl).

## Étape 4 : Assurez-vous que WSL2 peut ouvrir correctement VSCode

- Ouvrez un nouveau terminal WSL2.
- Exécutez la commande suivante pour ouvrir une nouvelle fenêtre VSCode.

   ```bash
   code
   ```

- Après quelques instants, une nouvelle fenêtre VSCode devrait s'ouvrir et VSCode devrait fournir une notification indiquant son ouverture dans WSL2.


## Devoir

<div class="lesson-content__panel" markdown="1">

1. Se familiariser avec VSCode vous permettra de gagner du temps et de devenir plus productif. En regardant cette vidéo [Tutoriel VSCode pour les débutants](https://youtu.be/ORrELERGIHs?t=103), vous aurez une idée de toutes les fonctionnalités que VSCode a à offrir. Ne vous inquiétez pas du codage, surveillez simplement la façon dont VSCode est utilisé tout au long de la vidéo.

</div>

## Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- Les [documents VSCode](https://code.visualstudio.com/docs) sont un excellent endroit à consulter pour toutes vos requêtes liées à VSCode.
- Ces petits PDF pratiques sur les [raccourcis pour Linux](https://go.microsoft.com/fwlink/?linkid=832144) et [raccourcis pour macOS](https://go.microsoft.com/fwlink/? de VSCode) linkid=832143) sont une excellente ressource pour vous aider à rendre votre expérience VSCode plus fluide et plus efficace.