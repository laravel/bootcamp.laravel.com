<!-- markdownlint-disable MD024 MD043 -->

### Introduction

[Git](https://git-scm.com/) est un système de contrôle de version très populaire. Vous vous familiariserez très bien avec ce logiciel tout au long de TOP, alors ne vous inquiétez pas trop de sa compréhension à ce stade. De nombreuses leçons sont axées sur Git plus tard dans le programme.

[GitHub](https://github.com/) est un service qui vous permet de télécharger, d'héberger et de gérer votre code à l'aide de Git avec une interface Web conviviale.

Même si GitHub et Git semblent être la même chose, ils ne sont pas la même chose ni même créés par la même entreprise.

### Étape 1 : Installer Git

Cliquez sur le système d'exploitation que vous avez choisi ci-dessous :

<détails markdown="block">
<summary class="dropDown-header">Linux
</résumé>

#### Étape 1.1 : Mettre à jour le système

Exécutez ces commandes dans le terminal pour mettre à jour le système Linux :

```bash
sudo apt mise à jour
mise à niveau sudo apt
```

<div class="lesson-note lesson-note--tip" markdown="1">

#### Une note sur la saisie des mots de passe dans le terminal

   Lorsque vous utilisez une commande dans le terminal qui vous demande de saisir votre mot de passe pour l'authentification (comme sudo), vous remarquerez que les caractères ne sont pas visibles lorsque vous les tapez. Même s’il peut sembler que le terminal ne répond pas, ne vous inquiétez pas !

   Il s'agit d'une fonctionnalité de sécurité destinée à protéger les informations confidentielles, comme la façon dont les champs de mot de passe sur les sites Web utilisent des astérisques ou des points. En n'affichant pas les caractères que vous écrivez, le terminal sécurise votre mot de passe.

   Vous pouvez toujours saisir votre mot de passe comme d'habitude et appuyer sur Entrée pour le soumettre.
</div>

#### Étape 1.2 : Installer Git

Vous avez probablement déjà installé `git`, mais pour vous assurer que nous disposons de la version la plus à jour de git, exécutez les commandes suivantes :

```bash
sudo add-apt-repository ppa:git-core/ppa
sudo apt mise à jour
sudo apt installer git
```

#### Étape 1.3 : Vérifier la version

Assurez-vous que votre version de Git est **au moins** 2.28 en exécutant cette commande :

```bash
git --version
```

Si le numéro de version est inférieur à 2.28, suivez à nouveau les instructions.

</détails>

<détails markdown="block">
<summary class="dropDown-header">MacOS
</résumé>

#### Étape 1.0 : Installer Homebrew

Tout d’abord, vous devrez installer Homebrew. Pour l'installer, vous devez d'abord vous assurer que vous répondez aux [Exigences Homebrew MacOS](https://docs.brew.sh/Installation#macos-requirements). Une fois que vous remplissez les conditions, copiez et collez ce qui suit dans votre terminal :

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

<div class="lesson-note lesson-note--warning" markdown=1>
Sur un Apple Silicon Mac, vous aurez une étape supplémentaire à franchir.
Si vous regardez la sortie du terminal après avoir installé Homebrew, vous verrez « Installation réussie ! ». Plus bas dans le terminal, vous trouverez une section intitulée « Prochaines étapes ».
Lire le terminal peut sembler un peu intimidant, mais c'est une excellente occasion de surmonter ces sentiments. Suivez les étapes suivantes comme indiqué dans votre terminal (copiez et collez les commandes données) pour ajouter Homebrew à votre PATH, ce qui vous permet d'utiliser le préfixe de commande `brew`.
</div>

#### Étape 1.1 : Mettre à jour Git

MacOS est déjà livré avec une version de Git, mais vous devez mettre à jour vers la dernière version. Dans le terminal, tapez

```bash
brasser installer git
```

Cela installera la dernière version de Git. Facile, non ?

#### Étape 1.2 : Vérifier la version

Si vous venez d'installer et/ou de mettre à jour Git à partir de l'étape précédente, fermez d'abord cette fenêtre de terminal.

**Ouvrez une nouvelle fenêtre de terminal**, puis assurez-vous que votre version de Git est **au moins** 2.28 en exécutant cette commande :

```bash
git --version
```

Si le numéro de version est inférieur à 2.28, suivez à nouveau les instructions. Si vous rencontrez une erreur « Aucune formule trouvée dans les taps » :

1. Exécutez « Brew Doctor ».
1. Vous verrez une sortie comme celle ci-dessous. REMARQUE : le résultat réel de « Brew Doctor » peut varier en fonction de la version de MacOS que vous utilisez et de tout autre problème que vous pourriez rencontrer avec votre propre installation. En fin de compte, vous devez exécuter chaque extrait de ligne de commande fourni par Homebrew après avoir exécuté « Brew Doctor » pour réparer votre installation de Homebrew, y compris « Brew Cleanup » à la fin.
![Exemple de sortie de Brew Doctor](https://cdn.statically.io/gh/TheOdinProject/curriculum/284f0cdc998be7e4751e29e8458323ad5d320303/foundations/installations/setting_up_git/imgs/00.png)
1. Exécutez `brew install git`, **ouvrez une nouvelle fenêtre de terminal**, puis vérifiez votre version de Git, qui devrait maintenant être la dernière.

</détails>

<détails markdown="block">
<summary class="dropDown-header">Chrome OS
</résumé>

Suivez les instructions pour [installer Git à partir de la source](https://www.digitalocean.com/community/tutorials/how-to-install-git-on-debian-10#installing-git-from-source) depuis Digital Ocean .

</détails>

### Étape 2 : Configurer Git et GitHub

#### Étape 2.1 : Créer un compte GitHub

Allez sur [GitHub.com](https://github.com/) et créez un compte ! Lors de la configuration du compte, il vous demandera une adresse e-mail. Il doit s'agir d'un véritable e-mail et sera utilisé par défaut pour identifier vos contributions. Si vous êtes soucieux de votre vie privée ou si vous ne souhaitez tout simplement pas que votre adresse e-mail soit accessible au public, assurez-vous de cocher les deux cases suivantes sur la page [Paramètres de messagerie](https://github.com/settings/emails) après avoir vous êtes connecté :

![Paramètres de messagerie GitHub](https://cdn.statically.io/gh/TheOdinProject/curriculum/770be14190139683dbe9933ca5e9393c797c63f2/foundations/installations/setting_up_git/imgs/01.png)

L'activation de ces deux options vous évitera d'exposer accidentellement votre adresse e-mail personnelle lorsque vous travaillez avec Git et GitHub.

Vous remarquerez peut-être également une adresse e-mail sous l'option **Garder mes adresses e-mail privées**, il s'agit de votre adresse e-mail GitHub privée. Si vous prévoyez de l'utiliser, notez-le maintenant car vous en aurez besoin lors de la configuration de Git à l'étape suivante.

#### Étape 2.2 : Configurer Git

Pour que Git fonctionne correctement, nous devons lui faire savoir qui nous sommes afin qu'il puisse relier un utilisateur Git local (vous) à GitHub. Lorsque vous travaillez en équipe, cela permet aux gens de voir ce que vous avez commis et qui a commis chaque ligne de code.

Les commandes ci-dessous configureront Git. Assurez-vous de saisir vos propres informations entre guillemets (mais incluez les guillemets) !

```bash
git config --global user.name "Votre nom"
git config --global user.email "votrenom@exemple.com"
```

Si vous avez choisi d'utiliser l'adresse e-mail privée GitHub, la deuxième commande ressemblera à ceci :

```bash
git config --global user.email "123456789+mail@users.noreply.github.com" # N'oubliez pas d'utiliser votre propre adresse e-mail GitHub privée ici.
```

GitHub a récemment modifié la branche par défaut sur les nouveaux référentiels de « master » à « main ». Modifiez la branche par défaut pour Git à l'aide de cette commande :

```bash
git config --global init.defaultBranch principal
```

Pour activer la sortie colorée avec `git`, tapez

```bash
git config --global color.ui auto
```

Vous souhaiterez probablement également définir votre comportement de réconciliation de branche par défaut sur la fusion. Vous apprendrez ce que tous ces termes signifient plus tard dans le programme, mais pour l'instant, sachez simplement que nous vous suggérons d'exécuter la commande ci-dessous dans le cadre du processus de configuration de Git lors de la réalisation des projets.

```bash
git config --global pull.rebase faux
```

Pour vérifier que tout fonctionne correctement, entrez ces commandes et vérifiez si le résultat correspond à votre nom et à votre adresse e-mail.

```bash
git config --get utilisateur.nom
git config --get user.email
```

**Utilisateurs de macOS :** Exécutez ces deux commandes pour indiquer à Git d'ignorer les fichiers .DS_Store, qui sont automatiquement créés lorsque vous utilisez le Finder pour consulter un dossier. Les fichiers .DS_Store sont invisibles pour l'utilisateur et contiennent des attributs personnalisés ou des métadonnées (comme des vignettes) pour le dossier, et si vous ne configurez pas Git pour les ignorer, les fichiers .DS_Store embêtants apparaîtront dans vos commits. N'oubliez pas de copier et coller chacune de ces commandes dans votre terminal.

```bash
écho .DS_Store >> ~/.gitignore_global
git config --global core.excludesfile ~/.gitignore_global
```

#### Étape 2.3 : Créer une clé SSH

Une clé SSH est un identifiant cryptographiquement sécurisé. C'est comme un mot de passe très long utilisé pour identifier votre machine. GitHub utilise des clés SSH pour vous permettre de télécharger sur votre référentiel sans avoir à saisir votre nom d'utilisateur et votre mot de passe à chaque fois.

Tout d’abord, nous devons voir si une clé SSH de l’algorithme Ed25519 est déjà installée. Tapez ceci dans le terminal et vérifiez le résultat avec les informations ci-dessous :

```bash
ls ~/.ssh/id_ed25519.pub
```

Si un message apparaît dans la console contenant le texte « Aucun fichier ou répertoire de ce type », alors vous n'avez pas encore de clé SSH Ed25519 et vous devrez en créer une. Si aucun message de ce type n'apparaît dans la sortie de la console, vous pouvez passer à l'étape 2.4.

Pour créer une nouvelle clé SSH, exécutez la commande suivante dans votre terminal.

```bash
ssh-keygen -t ed25519 -C "votre@email.com"
```

<div class="lesson-note lesson-note--tip" markdown="1">
L'indicateur `-C` sert à écrire un commentaire, sinon la clé sera générée avec le nom d'utilisateur de votre ordinateur. La convention est d'utiliser votre email comme commentaire pour indiquer qui a généré la clé publique. Par exemple, si votre adresse e-mail est « mail@gmail.com », alors vous devez taper « ssh-keygen -t ed25519 -C "nail@gmail.com" ».
</div>

- Lorsqu'il vous demande un emplacement pour enregistrer la clé générée, appuyez simplement sur <kbd>Entrée</kbd>.
- Ensuite, il vous demandera un mot de passe ; entrez-en un si vous le souhaitez, mais ce n'est pas obligatoire.

#### Étape 2.4 : Liez votre clé SSH à GitHub

Maintenant, vous devez indiquer à GitHub quelle est votre clé SSH afin de pouvoir transmettre votre code sans saisir de mot de passe à chaque fois.

Tout d’abord, vous accéderez à l’endroit où GitHub reçoit notre clé SSH. Connectez-vous à GitHub et cliquez sur votre photo de profil dans le coin supérieur droit. Ensuite, cliquez sur « Paramètres » dans le menu déroulant.

Ensuite, sur le côté gauche, cliquez sur « Clés SSH et GPG ». Ensuite, cliquez sur le bouton vert dans le coin supérieur droit indiquant « Nouvelle clé SSH ». Nommez votre clé de manière suffisamment descriptive pour que vous puissiez vous rappeler d'où elle vient. Laissez cette fenêtre ouverte pendant que vous effectuez les étapes suivantes.

Vous devez maintenant copier votre clé publique SSH. Pour ce faire, nous allons utiliser une commande appelée [`cat`](http://www.linfo.org/cat.html) pour lire le fichier sur la console. (Notez que l'extension de fichier « .pub » est importante dans ce cas.)

```bash
chat ~/.ssh/id_ed25519.pub
```

Mettez en surbrillance et copiez le résultat, qui commence par « ssh-ed25519 » et se termine par votre adresse e-mail.

Maintenant, retournez à GitHub dans la fenêtre de votre navigateur et collez la clé que vous avez copiée dans le champ clé. Conservez le type de clé comme « Clé d'authentification », puis cliquez sur « Ajouter une clé SSH ». Vous avez terminé! Vous avez ajouté avec succès votre clé SSH !

#### Étape 2.5 Tester votre clé

Suivez ces instructions pour [tester votre connexion SSH](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/testing-your-ssh-connection?platform=linux) **( n'oubliez pas d'omettre le `$` lorsque vous copiez et collez le code !)**. Vous devriez voir cette réponse dans votre terminal : **Salut nom d'utilisateur ! Vous vous êtes authentifié avec succès, mais GitHub ne fournit pas d'accès au shell.** Ne laissez pas le manque d'accès au shell de GitHub vous déranger. Si vous voyez ce message, vous avez ajouté avec succès votre clé SSH et vous pouvez continuer. Si le résultat ne correspond pas correctement, essayez à nouveau de suivre ces étapes ou venez sur [le chat Discord](https://discord.gg/fbFCkYabZB) pour demander de l'aide.

### Étape 3 : Dites-nous comment ça s'est passé !

Vous avez terminé la section sur les installations de base, bon travail ! Au fur et à mesure que vous progressez dans les chemins, d’autres outils seront installés, alors gardez l’œil ouvert !

Vous aviez probablement l’impression d’être au-dessus de votre tête et vous ne compreniez probablement pas grand-chose de ce que vous faisiez. C'est 100% normal. Accrochez-vous. Tu peux le faire! Et nous vous soutenons.

### Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- [Comprendre les paires de clés SSH](https://winscp.net/eng/docs/ssh_keys) SSH est un protocole réseau sécurisé qui utilise une implémentation de cryptographie à clé publique, également connue sous le nom de cryptographie asymétrique. Avoir une compréhension de base de son fonctionnement peut vous aider à comprendre en quoi consiste une clé SSH.
- [Cryptage asymétrique - Explication simple](https://www.youtube.com/watch?v=AQDCe585Lnc) une courte vidéo expliquant le cryptage asymétrique.