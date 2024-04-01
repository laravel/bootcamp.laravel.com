[TOC]

# <b>Les commandes linux</b>

## Introduction

Tu as peur de la ligne de commande ? Tu n'es pas seul. Nous avons cette image de développeurs regardant attentivement un écran noir avec du texte blanc ou vert clignotant alors qu'ils saisissent sauvagement des commandes incompréhensibles pour pirater l'ordinateur central de l'entreprise (sans doute en buvant du soda et en essuyant la poussière de Cheetos orange fluo de leur clavier).

Cet écran ou cette fenêtre vide avec une invite et un curseur clignotant est l'`interface de ligne de commande (CLI)`, où vous pouvez saisir les commandes que votre ordinateur exécutera pour vous. Bien que vous n'ayez pas besoin de reconstituer la scène ci-dessus, travailler avec la ligne de commande est une compétence essentielle que vous devez acquérir en tant que développeur. La ligne de commande est comme notre base d’opérations, à partir de laquelle nous pouvons lancer d’autres programmes et interagir avec eux. Il a sa propre syntaxe à apprendre, mais comme vous saisirez les mêmes commandes des dizaines de fois, vous récupérerez rapidement les commandes dont vous avez le plus besoin.

Dans cette leçon d'introduction à la ligne de commande, vous apprendrez à naviguer sur votre ordinateur et à manipuler des fichiers et des répertoires (également appelés dossiers) directement depuis le confort de la ligne de commande. Vous verrez bientôt que ce n’est pas aussi difficile qu’on pourrait le penser. Les commandes que vous apprendrez dans cette leçon sont très simples. Alors ne vous laissez pas intimider par la perspective d’utiliser la ligne de commande pour la première fois.

## Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

- Décrivez ce qu'est la ligne de commande.
- Ouvrez la ligne de commande sur votre ordinateur.
- Utilisez la ligne de commande pour parcourir les répertoires et afficher le contenu des répertoires.
- Utilisez la ligne de commande pour créer un nouveau répertoire et un nouveau fichier.
- Utilisez la ligne de commande pour renommer ou détruire un répertoire et un fichier.
- Utilisez la ligne de commande pour ouvrir un fichier ou un dossier dans un programme.

### Testez votre terminal

`Ouvrez un terminal` sur votre ordinateur.

- **Linux** : ouvrez le menu des programmes et recherchez "Terminal". Vous pouvez également ouvrir le terminal en appuyant sur <kbd>Ctrl</kbd> + <kbd>Alt</kbd> + <kbd>T</kbd> sur votre clavier.

- **macOS** : ouvrez votre dossier Applications > Utilitaires et recherchez « Terminal ». Vous pouvez également utiliser la recherche Spotlight pour ouvrir le terminal. Appuyez sur <kbd>Cmd</kbd> + <kbd>Espace</kbd> pour ouvrir Spotlight et recherchez « Terminal ». Appuyez sur <kbd>Entrée</kbd> pour l'ouvrir.

La fenêtre qui s'ouvre sera en grande partie vide, à l'exception de certains textes qui varieront en fonction de votre système d'exploitation. Sous Linux et les anciens Mac, la ligne se terminera par « $ » et sur les Mac plus récents, la ligne se terminera par « % ». Ce symbole - appelé invite - indique que le terminal attend que vous saisissiez une commande. Essayons ça maintenant. Tapez « whoami » et appuyez sur <kbd>Entrée</kbd>.

Il renvoie votre nom d'utilisateur. Cool!

Souvent, les guides et instructions d'utilisation du terminal indiqueront les commandes en mettant le symbole en premier, comme `$ whoami`. Cela vous indique de taper la commande dans votre terminal, mais de ne pas saisir le « $ ». Et rappelez-vous que si vous utilisez un Mac plus récent, le « % » est le même que « $ »

#### Pourquoi apprendre ça maintenant ?

Vous utiliserez intensivement la ligne de commande tout au long de ce programme, et le prochain projet d'installation nécessitera que vous installiez de nombreux logiciels différents à l'aide de la ligne de commande. De plus, vous utiliserez principalement Git dans la ligne de commande (nous y reviendrons plus tard). Dans le cadre d'une vision plus large, vous utiliserez peut-être la ligne de commande quotidiennement dans votre carrière de développeur de logiciels, ce qui en fait une compétence indispensable dans votre ensemble d'outils.

<div class="lesson-note lesson-note--tip" markdown="1">

#### Une note sur la saisie des mots de passe dans le terminal

   Lorsque vous utilisez une commande dans le terminal qui vous demande de saisir votre mot de passe pour l'authentification (comme sudo), vous remarquerez que les caractères ne sont pas visibles lorsque vous les tapez. Même s’il peut sembler que le terminal ne répond pas, ne vous inquiétez pas !

   Il s'agit d'une fonctionnalité de sécurité destinée à protéger les informations confidentielles, comme la façon dont les champs de mot de passe sur les sites Web utilisent des astérisques ou des points. En n'affichant pas les caractères que vous écrivez, le terminal sécurise votre mot de passe.

   Vous pouvez toujours saisir votre mot de passe comme d'habitude et appuyer sur Entrée pour le soumettre.
</div>

## Devoir

**Remarque pour les utilisateurs WSL2** : Vous devrez utiliser la commande `wget` avec le lien donné dans la section `Télécharger les fichiers` afin d'avoir le fichier zip dans votre installation WSL2 (`wget https://swcarpentry .github.io/shell-novice/data/shell-lesson-data.zip`). Vous devrez également installer unzip en utilisant la commande « sudo apt install unzip » puis « unzip shell-lesson-data.zip » pour décompresser le fichier. Gardez à l’esprit que tout au long du cours lié à la première étape ci-dessous, le résultat de votre terminal peut être légèrement différent de celui présenté dans les leçons. Chaque fois que le cours vous demande d'accéder au bureau, vous accéderez plutôt au répertoire personnel, ce qui peut être fait en utilisant la commande cd (`cd ~`).


Beaucoup de ces ressources supposent que vous utilisez un environnement Mac ou Linux. Si vous avez suivi notre leçon d'installation précédente, vous devriez déjà avoir Linux installé en dual-boot ou sur une machine virtuelle. Ou bien, vous utilisez peut-être macOS. Si vous n'avez pas installé macOS ou toute version officielle d'Ubuntu, veuillez revenir à la [Leçon d'installations](https://www.theodinproject.com/lessons/foundations-installations).

1. Visitez le cours [The Unix Shell](https://swcarpentry.github.io/shell-novice/) conçu par la Software Carpentry Foundation. Vous y trouverez un ensemble complet de leçons sur l'utilisation de la CLI, mais pour l'instant, concentrez-vous uniquement sur les leçons suivantes :

- [Télécharger les fichiers](https://swcarpentry.github.io/shell-novice/#download-files) - suivez uniquement les instructions de cette section, vous n'avez pas besoin d'installer de logiciel et pouvez passer à la puce suivante point dans cette liste.
- [Présentation du Shell](https://swcarpentry.github.io/shell-novice/01-intro.html)
- [Navigation dans les fichiers et répertoires](https://swcarpentry.github.io/shell-novice/02-filedir.html)
- [Travailler avec des fichiers et des répertoires](https://swcarpentry.github.io/shell-novice/03-create.html)
- [Tuyaux et filtres](https://swcarpentry.github.io/shell-novice/04-pipefilter.html)

1. Avec vos super pouvoirs CLI nouvellement découverts, entraînez-vous à créer un dossier et quelques fichiers à l'aide des commandes « mkdir », « touch » et « cd » introduites à l'étape précédente. À titre d'exemple, un site Web de base peut avoir un fichier principal « index.html », un fichier de feuille de style CSS appelé « style.css » et un dossier pour « images ». Pensez à la façon dont vous pourriez créer ces fichiers avec les commandes et mettez-les en pratique !

1. Entraînons-nous à créer des fichiers et des répertoires et à les supprimer ! Vous devrez entrer les commandes pour les étapes ci-dessous dans votre terminal. Si vous ne vous souvenez pas comment ouvrir un terminal, faites défiler vers le haut pour un rappel.

     1. Créez un nouveau répertoire dans votre répertoire personnel avec le nom « test ».
     1. Accédez au répertoire `test`.
     1. Créez un nouveau fichier appelé « test.txt ». *Astuce : utilisez la commande `touch` ou `echo`.*
     1. Ouvrez votre fichier nouvellement créé dans VSCode et apportez quelques modifications, enregistrez le fichier et fermez-le.
     1. Revenez hors du répertoire `test`.
     1. Supprimez le répertoire `test`.

     C'est tout --vous avez fini avec la pratique ! Si vous vous engagez à faire la plupart des choses à partir de la ligne de commande à partir de maintenant, ces commandes deviendront une seconde nature pour vous. Le déplacement et la copie de fichiers s'effectuent beaucoup plus efficacement via la ligne de commande, même si cela semble plus compliqué à ce stade.

### Utilisez la ligne de commande comme un pro

Il y a quelque chose d'important que vous devez savoir sur les programmeurs. Les programmeurs sont paresseux. Genre, vraiment paresseux. Lorsqu’ils sont obligés de faire quelque chose encore et encore, il y a de fortes chances qu’ils trouvent un moyen de l’automatiser. La bonne nouvelle est que vous profitez des nombreux raccourcis qu’ils ont créés en cours de route. Il est temps d'apprendre à utiliser la ligne de commande comme un pro (c'est-à-dire de manière vraiment paresseuse).

Tout d’abord, vous avez peut-être déjà remarqué que le copier-coller dans la ligne de commande ne fonctionne pas comme prévu. Lorsque vous êtes dans la ligne de commande, vous devrez utiliser <kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>C</kbd> (Mac : <kbd>Cmd</ kbd> + <kbd>C</kbd>) pour copier et <kbd>Ctrl</kbd> + <kbd>Maj</kbd> + <kbd>V</kbd> (Mac : <kbd>Cmd</ kbd> + <kbd>V</kbd>) à coller. Par exemple, pour copier et coller des commandes de votre navigateur dans la ligne de commande, vous mettrez en surbrillance le texte de la commande et utiliserez <kbd>Ctrl</kbd> + <kbd>C</kbd> comme d'habitude, puis le collerez dans votre terminal en utilisant <kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>V</kbd>. Testez-le !

Deuxièmement, vous devez en savoir plus sur [la complétion des onglets](https://en.wikipedia.org/wiki/Command-line_completion). Sérieusement, cette astuce vous fera gagner beaucoup de temps et de frustration. Disons que vous êtes dans la ligne de commande et que vous devez vous déplacer dans un dossier éloigné, quelque chose comme `~/Documents/web-ai/foundations/javascript/calculator/`. C'est une commande longue à saisir, et tout doit être exactement parfait pour que cela fonctionne. Non, nous sommes *beaucoup* trop paresseux pour ça ! Fondamentalement, en appuyant sur <kbd>Tab</kbd>, la ligne de commande terminera automatiquement les commandes que vous avez commencé à taper une fois qu'il n'y aura qu'une seule option. Par exemple, il est assez courant d'avoir un dossier « Documents » et un dossier « Téléchargements » dans le répertoire personnel. Si vous avez tapé `cd D` puis appuyez sur <kbd>Tab</kbd>, la ligne de commande vous fera savoir que vous ne savez pas laquelle vous voulez en vous montrant les différentes options qui correspondent à ce que vous avez tapé. loin:

```bash
$ cd D
Documents/ Téléchargements/
$ cd D
```

Mais une fois que vous aurez tapé un peu plus, le nom sera complété pour vous, ce qui permettra d'écrire le chemin complet du fichier ci-dessus en tapant aussi peu que `cd Doc[tab]O[tab]f[tab] j[tab]cal[tab]` (en fonction des autres dossiers existants sur votre ordinateur). Testez-le et familiarisez-vous avec son fonctionnement. Vous allez l'adorer.

Troisièmement, il existe un raccourci très pratique pour tout ouvrir dans un répertoire de projet : `.` Une fois que vous avez installé un éditeur de texte, vous pouvez utiliser ce raccourci pour ouvrir un projet entier et tous ses fichiers en une seule fois. Ce raccourci est également couramment utilisé avec Git (il est abordé plus tard en détail) avec des commandes telles que « git add . » pour ajouter tous les fichiers d'un répertoire dans la zone de transit de Git. Par exemple, si VS Code est installé, vous pouvez `cd` dans le répertoire du projet, puis taper `code .` (avec le point). Il lancera VS Code et ouvrira le dossier du projet dans la barre latérale. Voir la section suivante de cette leçon pour un exemple plus détaillé.


### Ouverture de fichiers dans VSCode à partir de la ligne de commande

- **Linux** : vous pouvez ouvrir VSCode à partir de la ligne de commande en tapant « code », et vous pouvez ouvrir des dossiers ou des fichiers en ajoutant le nom de l'emplacement après celui-ci : « code my_awesome_project/`.

- **macOS** : une configuration est requise. Après avoir installé VSCode, lancez-le comme vous le souhaitez. Une fois qu'il est exécuté, ouvrez la palette de commandes avec <kbd>Cmd</kbd> + <kbd>Shift</kbd> + <kbd>P</kbd>. Dans la petite boîte de dialogue qui apparaît, tapez « commande shell ». L'un des choix qui apparaîtra sera « Commande Shell : Installer la commande 'code' dans PATH`. Sélectionnez cette option et redémarrez le terminal si vous l'avez ouvert.

- **WSL2** : L'ouverture de VSCode à partir de la ligne de commande dans WSL2 est aussi simple que sous Linux. Entrez simplement « code » qui ouvrira VSCode dans WSL2.

## Vérification des connaissances

Les questions suivantes sont l’occasion de réfléchir aux sujets clés de cette leçon. Si vous ne pouvez pas répondre à une question, cliquez dessus pour consulter le matériel, mais gardez à l'esprit que vous n'êtes pas censé mémoriser ou maîtriser ces connaissances.

- [Qu'est-ce que la ligne de commande ?](#command-line)
- [Comment ouvrir la ligne de commande sur votre ordinateur ?](#open-command-line)
- [Comment accéder à un répertoire particulier ?](https://www.softcover.io/read/fc6c09de/unix_commands/basics#sec-basics-cd)
- [Où `cd` à lui seul vous mènera-t-il ?](https://www.softcover.io/read/fc6c09de/unix_commands/basics#uid31)
- [Où `cd ..` vous dirigera-t-il ?](https://www.softcover.io/read/fc6c09de/unix_commands/basics#uid30)
- [Comment afficher le nom du répertoire dans lequel vous vous trouvez actuellement ?](https://www.softcover.io/read/fc6c09de/unix_commands/basics#sec-basics-pwd)
- [Comment afficher le contenu du répertoire dans lequel vous vous trouvez actuellement ?](https://www.softcover.io/read/fc6c09de/unix_commands/basics#sec-basics-ls)
- [Comment créer un nouveau répertoire ?](https://www.softcover.io/read/fc6c09de/unix_commands/basics#cid7)
- [Comment créer un nouveau fichier ?](https://swcarpentry.github.io/shell-novice/03-create.html#create-a-text-file)
- [Comment détruire un répertoire ou un fichier ?](https://www.softcover.io/read/fc6c09de/unix_commands/basics#cid9)
- [Comment renommer un répertoire ou un fichier ?](https://www.softcover.io/read/fc6c09de/unix_commands/basics#cid10)

## Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- [The Art of Command Line](https://github.com/jlevy/the-art-of-command-line#readme) est un créateur professionnel pour débutants complets. Il sert de référentiel open source. Cela contient également de nombreux conseils de pro !
- Le livre en ligne, [Learn Enough Command Line to Be Dangerous](https://www.learnenough.com/command-line-tutorial) est une excellente ressource pour maîtriser la ligne de commande. Les chapitres 1 et 2 sont gratuits et fournissent une bonne introduction aux outils de ligne de commande. Le reste du livre n'est pas gratuit et va plus en profondeur que ce dont vous avez réellement besoin à ce stade, mais n'hésitez pas à acheter et à lire le reste du livre si vous le souhaitez.
- [ExplainShell.com](http://explainshell.com/) est une excellente ressource si vous souhaitez déconstruire une commande shell particulièrement étrange ou apprendre comment Bash fonctionne en devinant et en vérifiant.
- [Unix/Linux Command Cheat Sheet](https://files.fosswire.com/2007/08/fwunixref.pdf) contient une liste de commandes importantes auxquelles vous pouvez vous référer régulièrement à mesure que vous vous familiarisez avec Linux. Vous pouvez l'imprimer afin d'en avoir une copie physique avec vous lorsque vous n'êtes pas devant votre ordinateur.
- [Cartes Flash en ligne de commande](https://flashcards.github.io/command_line/introduction.html) par flashcards.github.io.
- [Série de vidéos de LearnLinuxTv](https://www.youtube.com/playlist?list=PLT98CRl2KxKHaKA9-4_I38sLzK134p4GJ) contient 24 vidéos expliquant les bases de la ligne de commande. Les vidéos sont suffisamment brèves pour les débutants mais, en même temps, suffisamment détaillées pour vous aider à démarrer et éclairer votre curiosité intérieure.