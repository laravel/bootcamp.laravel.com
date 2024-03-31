<!-- markdownlint-disable MD024 MD043 -->

### Introduction

Si vous utilisez déjà **MacOS**, **Ubuntu** ou [une version officielle d'Ubuntu](https://wiki.ubuntu.com/UbuntuFlavors) comme système d'exploitation et que vous disposez de **Google Chrome** en tant que navigateur installé, vous pouvez ignorer cette leçon. Sinon, cliquez sur la petite flèche à gauche de la méthode que vous souhaitez utiliser ci-dessous pour développer cette section, puis suivez les instructions d'installation.

<div class="lesson-note lesson-note--warning" markdown="1">
#### Faites attention au système d'exploitation que vous utilisez
Nous ne pouvons prendre en charge que les systèmes d'exploitation indiqués ci-dessus. Nos instructions ont été testées avec MacOS, Ubuntu et les versions officielles d'Ubuntu. Nous vous déconseillons d'installer un système d'exploitation uniquement basé sur Ubuntu (comme Mint, Pop!_OS, ElementaryOS, etc.).
</div>

### Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

- Comment mettre en place un environnement approprié pour suivre le programme.
- Installation de Google Chrome dans votre environnement.

### Affectation

<div class="lesson-content__panel" markdown="1">

1. Si vous n'exécutez pas déjà un environnement pris en charge, décidez quel environnement vous allez configurer.
    - Parcourez les instructions pour savoir à quoi vous attendre.
    - Choisissez et suivez l'une des instructions ci-dessous.
1. Une fois votre environnement trié, passez aux instructions d'installation de Google Chrome.

</div>

### Installation du système d'exploitation

#### IMPORTANT

Ce programme prend uniquement en charge l'utilisation d'un ordinateur portable, d'un ordinateur de bureau ou d'un Chromebook pris en charge. Nous ne pouvons pas vous aider à configurer un environnement de développement sur un RaspberryPi ou tout autre appareil. Il vous suffit de suivre l'un de ces ensembles d'instructions ou aucun d'entre eux si vous utilisez déjà **MacOS**, **Ubuntu** ou [une version officielle d'Ubuntu](https://wiki.ubuntu.com /UbuntuFlavors) comme système d'exploitation.

Choisissez votre méthode d'installation ci-dessous :

<détails markdown="block">
<summary class="dropDown-header">Machine virtuelle (recommandé)
</résumé>

L'installation d'une machine virtuelle (VM) est le moyen le plus simple et le plus fiable de commencer à créer un environnement pour le développement Web. Une VM est une émulation informatique complète qui s'exécute dans votre système d'exploitation (OS) actuel, comme Windows. Le principal inconvénient d’une VM est qu’elle peut être lente car vous utilisez essentiellement deux ordinateurs en même temps. Nous ferons quelques choses pour améliorer ses performances.

### Étape 1 : Téléchargez VirtualBox et Xubuntu

L'installation d'une VM est un processus simple. Ce guide utilise le programme VirtualBox d'Oracle pour créer et exécuter la VM. Ce programme est open source, gratuit et facile à utiliser. Que peux tu demander de plus? Maintenant, assurons-nous que tout est téléchargé et prêt à être installé.

#### IMPORTANT

Une fois que vous avez terminé ces instructions, **vous devez travailler entièrement dans la VM.** Agrandissez la fenêtre, ajoutez plus de moniteurs virtuels si vous en avez, lancez le navigateur Internet dans le **Menu Whisker** ![Le Icône de menu Whisker de rongeur bleu-blanc](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/00_whisker_icon.png){: .inline-img} en haut à gauche du bureau. Vous ne devez rien utiliser en dehors de la VM lorsque vous travaillez. Si vous sentez que vous avez une bonne compréhension après avoir utilisé la VM pendant un certain temps et/ou souhaitez améliorer votre expérience, nous vous recommandons de procéder au double démarrage d'Ubuntu, pour lequel vous trouverez des instructions ci-dessous.

#### Étape 1.1 : Téléchargez VirtualBox

[Téléchargez VirtualBox pour les hôtes Windows](https://www.virtualbox.org/wiki/Downloads).

#### Étape 1.2 : Téléchargez Xubuntu

Il existe des milliers de distributions de Linux, mais Xubuntu est sans aucun doute l'une des plus populaires et des plus conviviales. Lors de l'installation de Linux sur une VM, nous vous recommandons de télécharger [Xubuntu 22.04](https://mirror.us.leaseweb.net/ubuntu-cdimage/xubuntu/releases/22.04/release/). Il y a quelques fichiers répertoriés ici, téléchargez celui se terminant par « .iso ». Xubuntu utilise le même logiciel de base qu'Ubuntu mais dispose d'un environnement de bureau qui nécessite moins de ressources informatiques et est donc idéal pour les machines virtuelles. Si vous trouvez la vitesse de téléchargement lente, envisagez d'utiliser un autre [miroir pour Xubuntu 22.04](https://xubuntu.org/release/22-04/#show-all), car celui lié précédemment est américain. Si vous accédez à la page de téléchargement et ne savez pas quelle version choisir, il est recommandé de choisir la dernière version de support à long terme (LTS) (22.04 au moment de la rédaction). Vous pourriez être tenté de choisir une version non LTS plus récente, mais les versions LTS ont l'avantage d'un support garanti jusqu'à 5 ans, ce qui les rend plus sécurisées, stables et donc fiables.

### Étape 2 : Installez VirtualBox et configurez Xubuntu

#### Étape 2.1 : Installer VirtualBox

L'installation de VirtualBox est très simple. Cela ne nécessite pas beaucoup de connaissances techniques et correspond au même processus que l’installation de tout autre programme sur votre ordinateur Windows. Double-cliquez sur le fichier VirtualBox téléchargé pour démarrer le processus d'installation. Si vous recevez une erreur concernant la nécessité du package redistribuable Microsoft Visual C++ 2019, vous pouvez le trouver sur [page officielle Microsoft Learn](https://learn.microsoft.com/en-us/cpp/windows/latest-supported-vc- redist?view=msvc-170#visual-studio-2015-2017-2019-and-2022). Vous voulez probablement la version avec l'architecture « X64 » (c'est-à-dire 64 bits) - téléchargez-la et installez-la, puis essayez à nouveau d'installer VirtualBox.

Lors de l’installation, diverses options vous seront présentées. Nous vous suggérons de supprimer le support Python car vous n'en avez pas besoin en cliquant sur l'icône du lecteur avec une flèche et en choisissant **Toute la fonctionnalité sera indisponible** :

![L'option Python est en bas de la liste](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/01_turn_off_python.png)

Voici à quoi devrait ressembler votre fenêtre d'installation après l'avoir désactivée :

![Vous voulez que l'option Python ait un "X" écarlate dessus](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/02_c_install.png)

Assurez-vous d'installer l'application sur le lecteur « C : », car sinon, elle a tendance à générer des erreurs. La machine virtuelle elle-même peut être installée n'importe où, mais nous y reviendrons bientôt.
Lors de l'installation du logiciel, la barre de progression peut sembler bloquée ; attendez juste que ça se termine.

#### Étape 2.2 : Préparer VirtualBox pour Xubuntu

Maintenant que VirtualBox est installé, lancez le programme. Une fois ouvert, vous devriez voir l’écran de démarrage.

![L'écran de démarrage de VirtualBox](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/03_start_screen.png)

Cliquez sur le bouton **Nouveau** pour créer un système d'exploitation virtuel. Donnez-lui un nom de **Xubuntu**, si vous souhaitez que la VM soit installée ailleurs que dans l'emplacement par défaut « C: », modifiez-le en conséquence dans l'option **Dossier**. C'est l'endroit où résidera votre disque virtuel, alors assurez-vous que vous disposez d'au moins 30 Go pour cela. Dans **Image ISO**, choisissez **Autre** - vous verrez une fenêtre s'ouvrir pour vous permettre de trouver le fichier « .iso » sur votre PC. Il se trouve probablement dans le dossier « Téléchargements ». Laissez **Ignorer l'installation sans surveillance** tel quel.

![La moitié des options grisées est normal. Ne vous inquiétez pas.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/04_install_start.png)

Continuez en appuyant sur **Suivant** et suivez les étapes suivantes :

#### Étape 2.2.1 : Configuration de l'installation du système d'exploitation invité sans surveillance

Vous devriez maintenant voir une fenêtre comme celle-ci :

![Pas besoin de vous soucier de la clé de produit.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/05_unattended_install.png)

Vous souhaitez cocher les options **Ajouts d'invité** et **Installer en arrière-plan** et également modifier vos champs **Nom d'utilisateur** et **Mot de passe** à votre guise. Notez que votre nom d’utilisateur doit être entièrement en minuscules et ne pas dépasser 32 caractères. Si vous oubliez de changer le mot de passe par défaut, ce sera « changeme ». Laissez l'**ISO des ajouts d'invité**, le **nom d'hôte** et le **nom de domaine** tels qu'ils sont. Continuez en appuyant sur **Suivant**.

#### Étape 2.2.2 : Matériel

![Vous pourriez être tenté de donner à votre VM plus de 2 processeurs. Ne le faites pas.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/06_hardware.png)

Dans la section **Matériel** de l'installation, vous souhaitez définir votre **Mémoire de base** sur au moins 2 048 Mo ou plus si possible - la limite supérieure est la moitié de votre RAM totale mais 4 096 Mo avec les paramètres que nous recommandons devraient vous offre une expérience fluide.

> Par exemple, si vous disposez de 8 Go (respectivement 8 192 Mo) de RAM, vous pouvez allouer jusqu'à 4 096 Mo (1 024 Mo à 1 Go) au système d'exploitation de votre VM. Vous pouvez rechercher sur Google comment connaître la quantité de RAM dont vous disposez si vous ne le savez pas déjà. Si la VM fonctionne un peu lentement, essayez d'allouer plus de mémoire !

<div class="lesson-note lesson-note--tip" markdown="1">

Des difficultés à convertir vos Gigaoctets (Go) en Mégaoctets (Mo) ? 1 Go de RAM équivaut à 1024 Mo. Par conséquent, vous pouvez dire que **8 Go = 8 x 1 024 = 8 192 Mo.**

</div>

En ce qui concerne les **Processeurs**, vous voulez qu'ils soient à 2 et pas plus. Laissez **Activer EFI (systèmes d'exploitation spéciaux uniquement)** tel quel (c'est-à-dire **décoché**) - et cliquez sur **Suivant** pour continuer.

#### Étape 2.2.3 : Disque dur virtuel

![Ne pas pré-allouer la taille réelle.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/07_virtual_hard_disk.png)

Maintenant, si vous souhaitez laisser tous les paramètres tels qu'ils sont, à l'exception de la **Taille du disque**, nous vous recommandons de donner à la VM **au moins 30 Go** d'espace. Rappelez-vous que ce disque sera créé dans le dossier que vous avez spécifié lors de la toute première étape du processus de création de VM mais néanmoins, le disque pourra être déplacé et redimensionné à l'avenir si nécessaire.

#### Étape 2.2.4 : Commencer l'installation sans assistance

Cliquez sur **Suivant** pour accéder à une page **Résumé**, sur laquelle vous pouvez cliquer sur **Terminer** pour commencer le processus d'installation sans assistance. Ce qui est intéressant ? Il installe le système d'exploitation et GuestAdditions tout seul, sans votre intervention ! Laissez-le faire son propre travail, vous saurez que c'est terminé lorsque vous verrez un écran de connexion comme celui-ci dans la section **Aperçu** :

![La section Aperçu se trouve en haut à droite de la fenêtre VirtualBox.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/08_preview_login.png)

Cliquez simplement sur la flèche verte appelée **Afficher** et une fenêtre de VM et l'écran de connexion vous seront présentés. Connectez-vous avec le mot de passe que vous avez défini lors du processus d'installation et il nous restera un peu de configuration à faire.

Il est possible que vous receviez une erreur comme celle-ci après avoir cliqué sur **Terminer** :

![L'erreur apparaît sur le côté droit de la fenêtre VirtualBox et peut être formulée un peu différemment.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/ 09_virtualization_error.png)

Cela signifie que vous devez [activer la virtualisation dans les paramètres BIOS/UEFI de votre ordinateur](https://access.redhat.com/documentation/en-us/red_hat_enterprise_linux/7/html/virtualization_deployment_and_administration_guide/sect-troubleshooting-enabling_intel_vt_x_and_amd_v_virtualization_hardware_extensions_in_bios). [Instructions alternatives pour activer la virtualisation dans les paramètres BIOS/UEFI](https://2nwiki.2n.cz/pages/viewpage.action?pageId=75202968). Si vous possédez un processeur AMD, vous recherchez probablement quelque chose appelé « SVM » pour activer, pour les processeurs Intel, la « technologie de virtualisation Intel ». L'erreur devrait vous dire ce qu'elle recherche. Après avoir traité le problème, **Démarrez** simplement la machine et laissez les choses se dérouler, vous saurez que le processus est terminé lorsque vous voyez un écran de connexion :

![Vous pouvez déjà rendre votre VM en plein écran ou simplement agrandir la fenêtre.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/10_login_screen.png)

### Étape 3 : Définition des autorisations sudo correctes

En raison de la façon dont l'installation sans assistance est configurée par VirtualBox, votre compte ne dispose pas des autorisations « sudo » appropriées. Considérez-les comme l'équivalent de « Exécuter en tant qu'administrateur » sur votre ordinateur Windows : vous pouvez imaginer pourquoi il serait important de les avoir dans l'ordre.

#### Étape 3.1 : Accédez aux utilisateurs et au groupe

Tout d'abord, si ce n'est pas déjà fait, connectez-vous avec le nom d'utilisateur et le mot de passe créés précédemment, puis cliquez sur l'icône ![L'icône du menu Whisker de rongeur bleu-blanc](https://cdn.statically.io/gh/TheOdinProject/curriculum/ 96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/00_whisker_icon.png){: .inline-img} en haut à gauche de votre fenêtre, tapez ensuite « Utilisateurs » et vous devriez voir « Utilisateurs et groupes » apparaître. Clique dessus.

![Cela devrait être la première option que vous voyez. Il est possible qu'en raison de la localisation, il soit appelé différemment - essayez alors d'utiliser le terme dans votre langue.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/11_users_and_groups.png)

#### Étape 3.2 : Gérer les groupes

Dans la fenêtre qui vient de s'afficher, cliquez sur **Gérer les groupes**, cliquez quelque part dans la liste et tapez « sudo » sur votre clavier. Cela devrait vous amener à l'entrée « sudo » comme sur l'image :

![Vous trouverez cette fonctionnalité de recherche dans de nombreux coins de Xubuntu.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/12_sudo_group.png)

#### Étape 3.2 : Ajoutez-vous à sudo

Avec `sudo` sélectionné, cliquez sur **Propriétés** et dans la fenêtre qui apparaît, cochez le nom de votre utilisateur comme ceci :

![Pas besoin de toucher à autre chose.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/13_sudo_properties.png)

Et puis cliquez sur **OK**. Vous serez accueilli par une invite de mot de passe - c'est le même que celui avec lequel vous vous êtes connecté.

#### Étape 3.3 : Redémarrez votre VM

Maintenant que tout est fait, vous pouvez fermer ces fenêtres et redémarrer votre VM. Vous pouvez ouvrir une fenêtre `Terminal` en faisant <kbd>Ctrl</kbd> + <kbd>Alt</kbd> + <kbd>T</kbd> et tapez `reboot` puis appuyez sur <kbd>Entrée< /kbd> pour exécuter la commande. Vous pouvez également cliquer sur l'![Icône de menu Whisker de rongeur bleu-blanc](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/00_whisker_icon.png){ : .inline-img}, puis cliquez sur l'icône d'alimentation en bas à droite et choisissez **Redémarrer**.

![Vous souhaiterez peut-être prendre note des autres options que vous voyez dans ce menu.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/14_logout.png)

![Ce n'est pas le menu le plus excitant, mais prenez note de l'option Arrêter.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/15_restart.png)

#### Étape 3.4 : Testez vos nouveaux privilèges sudo

Maintenant que vous avez accès à « sudo », nous pouvons l'utiliser pour mettre à jour notre Xubuntu via le « Terminal ». Ouvrez le « Terminal » et utilisez ces commandes, l'une après l'autre :

<div class="lesson-note lesson-note--tip" markdown="1">

#### Une note sur la saisie des mots de passe dans le terminal

Lorsque vous utilisez une commande dans le terminal qui vous demande de saisir votre mot de passe pour l'authentification (comme sudo), vous remarquerez que les caractères ne sont pas visibles lorsque vous les tapez. Même s’il peut sembler que le terminal ne répond pas, ne vous inquiétez pas !

Il s'agit d'une fonctionnalité de sécurité destinée à protéger les informations confidentielles, comme la façon dont les champs de mot de passe sur les sites Web utilisent des astérisques ou des points. En n'affichant pas les caractères que vous écrivez, le terminal sécurise votre mot de passe.

Vous pouvez toujours saisir votre mot de passe comme d'habitude et appuyer sur Entrée pour le soumettre.
</div>

```bash
sudo apt mise à jour
mise à niveau sudo apt
```

Votre mot de passe vous sera demandé après avoir utilisé le premier - saisissez-le et utilisez <kbd>Entrée</kbd> pour fournir le mot de passe à votre terminal. Il n'y a aucun retour visuel sur ce que vous tapez, mais vous le faites effectivement.

Après l'exécution de « sudo apt update » pendant un certain temps, il vous sera demandé si vous souhaitez installer des éléments – faites-le pour mettre à jour votre machine. Si vous rencontrez des problèmes, n'hésitez pas à vous rendre sur notre [serveur Discord](https://discord.gg/V75WSQG) et à demander de l'aide dans le canal `#virtualbox-help`.

### Étape 4 : Comprenez votre nouvelle VM

Voici quelques conseils pour vous aider à démarrer dans un environnement virtuel :

- Activez la barre d'outils dans les paramètres de votre VM - il existe des options utiles avec lesquelles vous voudrez peut-être jouer, en particulier celles concernant le plein écran ou les affichages multiples. Pour ce faire, cliquez sur **Paramètres**, puis accédez à **Interface utilisateur** et enfin cochez **Afficher en haut de l'écran**.
     ![C'est une bonne idée de regarder les paramètres dans leur ensemble pour avoir une idée de ce qui est possible.](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/16_toolbar. png)
- Tout votre travail doit se dérouler dans la VM. Vous installerez tout ce dont vous avez besoin pour le codage, y compris votre éditeur de texte, vos environnements linguistiques et divers outils à l'intérieur de la VM. L'installation de Xubuntu à l'intérieur de votre VM est également livrée avec un navigateur Web préinstallé, mais nous installerons Chrome sous peu.
- Pour installer un logiciel sur votre VM, vous suivrez les instructions d'installation de Linux (Ubuntu) depuis la VM Xubuntu.
- Vous devrez peut-être prendre des captures d'écran lorsque vous demandez de l'aide sur notre Discord, voici comment procéder selon l'endroit où vous l'utilisez :
   - **Dans la VM :** vous pouvez utiliser <kbd>Shift</kbd> + <kbd>PrtSrc</kbd> pour prendre des captures d'écran d'une partie de votre écran. Vous pouvez également cliquer sur le **Menu Whisker** et saisir **Capture d'écran**, dans lequel vous pouvez choisir de prendre une capture d'écran de tout votre écran, de la fenêtre actuelle sur laquelle vous vous trouvez ou de sélectionner une certaine zone à capturer.
   - **Sur votre hôte (Windows) :** vous pouvez utiliser un raccourci de la touche hôte (<kbd>Ctrl droit</kbd> + <kbd>E</kbd>) ou cliquer sur **Affichage -> Prendre une capture d'écran ** pour une capture d'écran complète. Une méthode différente consisterait à flouter la fenêtre de votre VM en cliquant à l'extérieur de celle-ci, puis en utilisant le raccourci Windows habituel de <kbd>Touche Windows</kbd> + <kbd>Maj</kbd> + <kbd>S</kbd> pour prenez des captures d'écran d'une partie de votre écran.
- **N'oubliez pas :** tout le développement que vous effectuerez concernant TOP doit être effectué dans la VM.
- Nous vous recommandons de passer en plein écran (**Affichage -> Mode plein écran**) et d'oublier votre système d'exploitation hôte (Windows). Pour de meilleures performances, fermez tous les programmes de votre système d'exploitation hôte lors de l'exécution de votre VM.
- Si vous avez ajouté des moniteurs supplémentaires dans l'onglet **Affichage** des paramètres de votre VM, alors que la VM est en cours d'exécution, cliquez sur **Affichage -> Écran virtuel 2 -> Activer**. Vous pouvez exécuter le mode plein écran avec plusieurs moniteurs, mais cela peut demander plus de **mémoire vidéo**, que vous auriez dû augmenter lors de l'ajout de moniteurs supplémentaires. **Assurez-vous d'activer vos écrans virtuels en mode fenêtré avant de passer en plein écran, sinon ils ne fonctionneront pas.** En quittant le plein écran, votre affichage secondaire peut se fermer. Vous pouvez le rouvrir avec ces instructions.

#### Problèmes/questions fréquents

- Si en essayant de démarrer la VM, vous obtenez uniquement un écran noir, fermez et « éteignez » la VM, cliquez sur **Paramètres -> Affichage** et assurez-vous que **Activer l'accélération 3D** est DÉCOCHÉ et que la mémoire vidéo est réglé sur **AU MOINS 128 Mo**.
- Vous manquez d'espace ? Regardez ces [instructions pour augmenter l'espace disque de la VM à partir du serveur TOP Discord](https://discord.com/channels/505093832157691914/690588860085960734/1015965403572351047).
- Utilisez-vous un écran tactile ? [Regardez une vidéo sur la façon d'activer les commandes de l'écran tactile pour VirtualBox](https://www.youtube.com/watch?v=hW-iyHHoDy4).

- **Conseils sur les performances des VM** :
   - Lors de l'exécution de la VM, réduisez votre activité Windows. Vous souhaiterez probablement également être branché sur le secteur si vous utilisez un ordinateur portable.
   - Assurez-vous que vos processeurs sont réglés sur seulement 2 et que la mémoire que vous avez attribuée à votre VM représente au plus la moitié de votre RAM totale mais au moins 2 Go. Si vous ne pouvez pas épargner les 2 Go, double démarrage.
   - Si les vidéos sont en retard dans la VM, assurez-vous de maximiser la mémoire vidéo au maximum ou de les lire sur votre Windows si votre machine peut le gérer. Désactivez l'accélération 3D si vous l'avez activée.
   - Faites attention à l' ![Icône avec une tortue verte et un V](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/17_turtle.png){ : Icône .inline-img} en bas à droite de la fenêtre de votre VM. Cela signifie que quelque chose appelé Hyper-V est activé. Un fil de discussion sur les forums VirtualBox décrit [comment désactiver complètement Hyper-V](https://forums.virtualbox.org/viewtopic.php?f=25&t=99390). Vous voulez avoir l'icône d'une puce avec un V ![Icône d'une puce avec un V](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/18_vboxV .png){: .inline-img} à la place. Si vous ne voyez aucune de ces icônes en bas à droite, vous devez quitter le mode plein écran pour les voir.
   - Si vos performances font toujours défaut, optez pour un double démarrage car cela garantira que vous utilisez toutes vos spécifications pour un seul système d'exploitation, améliorant ainsi considérablement votre expérience.
- Si votre molette de défilement se comporte étrangement dans Google Chrome et/ou dans d'autres applications et que vous avez suivi les conseils de performances de la VM pour vous assurer que votre VM fonctionne comme prévu, vérifiez [si votre version des ajouts invité est correcte](https:/ /discord.com/channels/505093832157691914/690588860085960734/1195697147123867668).

### Étape 5 : Arrêtez votre VM en toute sécurité

Vous ne débranchez pas votre ordinateur d’usage quotidien, n’est-ce pas ? Pourquoi feriez-vous la même chose avec votre ordinateur virtuel ? Lorsque vous cliquez sur le bouton X et fermez simplement votre VM, autant dire au revoir à vos fichiers. Dans cette section, vous découvrirez trois façons d'éteindre votre VM.

#### Option 1 - Arrêt depuis l'intérieur de la VM avec l'interface utilisateur

En cliquant sur le **Menu Whisker** ![L'icône du menu Whisker du rongeur bleu-blanc](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/00_whisker_icon.png ){: .inline-img} et en cliquant sur l'icône d'alimentation, vous obtiendrez plusieurs options sur la façon de modifier votre session, y compris **Arrêter**. Oui, c'est le même endroit que vous avez peut-être utilisé pour **Redémarrer** auparavant !

#### Option 2 - Arrêt depuis l'intérieur de la VM avec le terminal

Taper « poweroff » à l'intérieur du terminal fera l'affaire dans ce cas. Votre système s'arrêtera immédiatement.

#### Option 3 - Arrêt depuis l'extérieur de la VM

La dernière façon d’atteindre cet objectif d’arrêt en toute sécurité consiste à utiliser l’interface VM. Cliquer sur l'onglet Fichier et appuyer sur le bouton de fermeture (qui comporte également une icône d'alimentation) fera apparaître une fenêtre contextuelle intitulée **Fermer la machine virtuelle**. Cette fenêtre contextuelle vous demande si vous souhaitez **Enregistrer l'état de la machine**, **Envoyer le signal d'arrêt** ou **Mettre la machine hors tension**.

![Menu Fichier VM](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/19_vbox_close.png)

![Fermer le menu de la machine virtuelle](https://cdn.statically.io/gh/TheOdinProject/curriculum/96d534641514fe4d62aabe2919fac3c52cb286e7/foundations/installations/installations/imgs/20_send_shutdown.png)

Pour être sûr, cliquez sur la radio **Envoyer le signal d'arrêt** et appuyez sur OK. Cela éteindra votre VM en toute sécurité et vos fichiers ne seront pas corrompus.

</détails>

<détails markdown="block">
<summary class="dropDown-header">Double démarrage Ubuntu/Windows
</résumé>

### Lisez toute cette section avant de commencer

Le double démarrage fournit deux systèmes d'exploitation sur votre ordinateur entre lesquels vous pouvez basculer avec un simple redémarrage. Un système d'exploitation ne modifiera pas l'autre, sauf si vous lui demandez explicitement de le faire. Avant de continuer, assurez-vous de sauvegarder toutes les données importantes et de disposer d'un moyen de demander de l'aide. Si vous êtes perdu, effrayé ou bloqué, nous sommes là pour vous aider dans le discord. Venez dire "Bonjour" !

### Étape 1 : Téléchargez Ubuntu

Tout d’abord, vous devez télécharger la version d’Ubuntu que vous souhaitez installer sur votre ordinateur. Ubuntu est disponible en différentes versions (« saveurs »), mais nous suggérons le bureau standard [Ubuntu](https://releases.ubuntu.com/22.04/). Si vous utilisez un ordinateur plus ancien, nous vous recommandons [Xubuntu](https://xubuntu.org/release/22-04/). Assurez-vous de télécharger la version 64 bits d'Ubuntu ou de Xubuntu. Si vous accédez à la page de téléchargement et ne savez pas quelle version choisir, il est recommandé de choisir la dernière version de support à long terme (LTS) (22.04 au moment de la rédaction). Vous pourriez être tenté de choisir une version non LTS plus récente, mais les versions LTS ont l'avantage d'un support garanti jusqu'à 5 ans, ce qui les rend plus sécurisées, stables et donc fiables.

### Étape 2 : Créer une clé USB amorçable

Ensuite, suivez le guide sur [comment créer une clé USB Ubuntu Live sous Windows](https://itsfoss.com/create-live-usb-of-ubuntu-in-windows/) pour créer une clé USB amorçable afin que vous pouvez installer Ubuntu sur votre disque dur. Si vous n'avez pas de clé USB, vous pouvez également utiliser un CD ou un DVD.

Remarque : Vous pouvez utiliser cette méthode pour essayer [différentes versions d'Ubuntu](https://www.ubuntu.com/download/flavours) si vous le souhaitez. Ces images vous permettent d'essayer différentes saveurs sans vous engager dans une installation. Sachez que l'exécution du système d'exploitation à partir d'un lecteur flash ralentira le système d'exploitation et peut réduire la durée de vie de votre lecteur flash.

### Étape 3 : Installer Ubuntu

#### Étape 3.1 : Démarrez à partir du lecteur flash

Tout d’abord, vous devez démarrer Ubuntu à partir de votre clé USB. Les étapes exactes peuvent varier, mais en général, vous devrez procéder comme suit :

- Insérez la clé USB dans l'ordinateur.
- Redémarrez l'ordinateur.
- Sélectionnez le lecteur flash comme périphérique de démarrage au lieu du disque dur.

Par exemple, sur un ordinateur Dell, vous devrez brancher le lecteur flash, redémarrer l'ordinateur et appuyer sur la touche F12 pendant le premier démarrage de l'ordinateur pour afficher le menu de démarrage. À partir de là, vous pouvez choisir de démarrer à partir du lecteur flash. Votre ordinateur n'est peut-être pas exactement le même, mais Google peut vous aider à le comprendre.

#### Étape 3.2 : Installer Ubuntu

Si vous souhaitez tester la version d'Ubuntu sur la clé USB, cliquez sur « Essayez-moi ». Lorsque vous avez trouvé une version d'Ubuntu que vous aimez, cliquez sur « Installer » et passez à l'étape suivante.

L'installation d'Ubuntu est l'endroit où les véritables changements commencent à se produire sur votre ordinateur. Les paramètres par défaut sont pour la plupart parfaits, mais assurez-vous d'**"Installer Ubuntu aux côtés de Windows"** et de modifier l'espace disque alloué autorisé pour Ubuntu à 30 Go (ou plus si vous le pouvez).

Pour des instructions étape par étape, veuillez suivre [comment installer Ubuntu 22.04 et le double démarrage avec Windows 10](https://medium.com/linuxforeveryone/how-to-install-ubuntu-20-04-and-dual- démarrer aux côtés de Windows-10-323a85271a73).

### Intel RST (technologie de stockage rapide)

Si vous rencontrez une erreur vous demandant de désactiver **Intel RST** lors de la tentative d'installation d'Ubuntu, suivez cette [solution de contournement pour installer Ubuntu 22.04 avec les systèmes Intel RST](https://askubuntu.com/questions/1233623/workaround-to -install-ubuntu-20-04-with-intel-rst-systems/1233644#1233644), en particulier **Choix n°2**. Le processus oblige Windows à démarrer en mode sans échec après avoir changé le pilote de stockage de votre carte mère pour qu'il fonctionne avec Ubuntu. Une fois qu'il démarre sous Windows, le mode de sécurité forcé est désactivé et vous êtes libre de tenter à nouveau une installation d'Ubuntu.

</détails>

<détails markdown="block">
<summary class="dropDown-header">ChromeOS/ChromeOS Flex
</résumé>

Avec l'ajout récent de la possibilité d'exécuter un terminal Linux, la plate-forme ChromeOS a été ouverte à la possibilité d'installer des applications Linux natives. Si vous souhaitez utiliser votre Chromebook pour réaliser les projets, vous devrez vous assurer de remplir quelques conditions :

1. Vous disposez d'un Chromebook pris en charge :
    - [Chromebooks officiels](https://www.chromium.org/chromium-os/chrome-os-systems-supporting-linux)
    - [Chromebooks ChromeOS Flex](https://support.google.com/chromeosflex/answer/11513094)
1. [Vous pouvez configurer Linux sur votre Chromebook](https://support.google.com/chromebook/answer/9145439?hl=en).

Une fois que vous avez satisfait à ces deux exigences, vous devriez être en mesure de suivre les instructions Linux tout au long du programme.

</détails>

<détails markdown="block">
<summary class="dropDown-header">WSL2 (avancé)</summary>

L'utilisation de WSL2 est un moyen simple et rapide de démarrer avec Linux, vous permettant d'exécuter une distribution Linux à partir de Windows. WSL2 est disponible sur Windows 10 version 2004 et supérieure (Build 19041 et supérieure) et Windows 11.

Pour être clair : vous allez utiliser un système d’exploitation différent, ce n’est pas une façon d’éviter d’utiliser Linux. En raison de la façon dont WSL2 est intégré à Windows, cela provoque souvent une confusion importante chez les nouveaux apprenants. Utilisez la machine virtuelle si vous souhaitez une séparation claire entre votre Windows et Linux afin que le programme soit plus facile à suivre.

<div class="lesson-note" markdown="1">
#### Instructions WSL2 et Linux
Parce que WSL2 est une distribution Linux à part entière, presque tout ce que le programme enseigne sur Linux est également applicable à WSL2. Dans les leçons futures, chaque fois que des instructions diffèrent selon le système d'exploitation, vous devez suivre les instructions Linux, à moins que la leçon n'inclue des instructions spécifiques à WSL2.
</div>

### Étape 1 : Installations

#### Étape 1.1 : Installation de WSL2

- Ouvrez PowerShell en mode administrateur en le recherchant dans vos applications, en cliquant avec le bouton droit sur l'option supérieure, puis en sélectionnant Exécuter en tant qu'administrateur. Vous pourriez recevoir une invite vous demandant si vous souhaitez autoriser Windows Powershell à apporter des modifications à votre appareil : cliquez sur Oui.
- Entrez la commande suivante

   ```powershell
   wsl --installer
   ```

- Après quelques minutes, vous serez invité à redémarrer votre ordinateur ; fais-le.
- Vous devriez voir une fenêtre Powershell ouverte, vous invitant à saisir un nom d'utilisateur et un mot de passe. Votre nom d'utilisateur doit être en minuscules, mais peut autrement être celui qui vous convient. Vous devrez également saisir un nouveau mot de passe.
- Lorsque vous saisissez votre mot de passe, vous remarquerez peut-être que vous ne voyez aucun retour visuel. Il s'agit d'une fonctionnalité de sécurité standard sous Linux et cela se produira également dans tous les cas futurs où vous devrez saisir un mot de passe. Tapez simplement votre mot de passe et appuyez sur <kbd>Entrée</kbd>.

#### Étape 1.2.1 : Installer le terminal Windows (Windows 10 uniquement)

Windows Terminal est une application de terminal qui vous permet de personnaliser et d'exécuter plus facilement des terminaux, ainsi que de prendre en charge plusieurs onglets pouvant chacun exécuter leurs propres terminaux.

- [Installer le terminal Windows](https://learn.microsoft.com/en-us/windows/terminal/install) en utilisant l'option d'installation directe.

#### Étape 1.2.2 : Définition de WSL2 par défaut (facultatif)

Sauf si vous utilisez régulièrement d'autres terminaux sur votre ordinateur, nous vous recommandons de définir WSL2 comme programme de terminal par défaut lorsque vous ouvrez le terminal Windows.

- Ouvrez le Terminal Windows en recherchant le terminal dans vos applications.
- Cliquez sur la liste déroulante à côté du bouton Nouvel onglet (en haut des fenêtres) et sélectionnez Paramètres.
- Vous devriez voir une option de profil par défaut avec une liste déroulante à côté.
- Dans la liste déroulante, sélectionnez Ubuntu.
- Cliquez sur Enregistrer en bas de la page.

### Étape 2 Ouverture de WSL2

Sous Windows, il existe trois manières principales d'ouvrir WSL2.

- Si vous configurez le terminal Windows pour ouvrir un terminal Ubuntu par défaut, vous pouvez démarrer une nouvelle session WSL2 en ouvrant l'application du terminal.
- Sinon, vous pouvez ouvrir le terminal Windows, cliquer sur la liste déroulante à côté du bouton Nouvel onglet (en haut de la fenêtre) et sélectionner Ubuntu.
- Si vous recherchez Ubuntu dans la barre de recherche d'applications, vous devriez voir une application intitulée Ubuntu ; ouvrez-le pour démarrer une nouvelle session de terminal.

<div class="lesson-note lesson-note--tip" markdown="1">
Vous remarquerez peut-être que lorsque vous ouvrez WSL2 via le terminal Windows, vous verrez une fenêtre avec un jeu de couleurs différent et une icône différente par rapport à l'ouverture d'un terminal via Ubuntu dans vos applications. En effet, le terminal Windows est livré avec un jeu de couleurs par défaut pour Ubuntu destiné à imiter l'apparence d'un véritable terminal Ubuntu. Cette différence est purement esthétique et il n’y a aucune différence pratique entre les deux.
</div>

<div class="lesson-note lesson-note--warning" markdown="1">
Lorsque vous ouvrez votre terminal WSL2, assurez-vous de ne pas voir « /mnt/c » au début de la ligne. `/mnt/c` est l'endroit où se trouve votre installation Windows lorsque vous travaillez dans WSL2, et y jouer peut avoir des conséquences inattendues.
</div>
</détails>

###Installation de Google Chrome

#### Pourquoi Google Chrome ?

Étant donné que nos cours utilisent Google Chrome et que Chrome/Chromium sont massivement utilisés par les développeurs et les consommateurs, les recommandations que nous faisons sont très intentionnelles.
Regardez ceci [part d'utilisation des navigateurs Web](https://en.wikipedia.org/wiki/Usage_share_of_web_browsers#Summary_tables) et voyez ce que les autres utilisent le plus.

Choisissez votre système d'exploitation :

<détails markdown="block">
<summary class="dropDown-header">Linux</summary>

#### Étape 1 : Téléchargez Google Chrome

- Ouvrez votre **Terminal**
- Exécutez la commande suivante pour télécharger le dernier package **Google Chrome** `.deb`

```bash
wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
```

<div class="lesson-note" markdown="1">
### Copiez et collez les raccourcis clavier
Vous avez probablement remarqué que le raccourci clavier courant : <kbd>Ctrl</kbd> + <kbd>V</kbd> pour coller quelque chose ne fonctionne pas dans le terminal. Afin de coller votre texte saisi dans votre terminal, vous pouvez utiliser : la combinaison de raccourcis clavier <kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>V</kbd>. Il est également très pratique de savoir que la combinaison de touches : <kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>C</kbd> copiera tout texte en surbrillance depuis votre terminal, qui pourra alors être collé plus tard.
</div>

#### Étape 2 : Installez Google Chrome

- Entrez la commande suivante dans votre terminal pour installer le package **Google Chrome** `.deb`

     ```bash
     sudo apt install ./google-chrome-stable_current_amd64.deb
     ```

- Entrez votre mot de passe, si nécessaire

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
rm google-chrome-stable_current_amd64.deb
```

#### Étape 4 : Utiliser Google Chrome

Vous pouvez démarrer Chrome de deux manières :

- Cliquez sur **Google Chrome** dans le menu Applications.
- **Ou**, utilisez la commande `google-chrome` depuis le terminal

```bash
Google Chrome
```

<div class="lesson-note lesson-note--tip" markdown="1">

Chrome va utiliser ce terminal pour afficher divers messages et ne vous permettra pas d'exécuter d'autres commandes. Ne vous inquiétez pas de ces messages. Si vous souhaitez utiliser le même terminal dans lequel vous exécutez Chrome pour d'autres commandes, utilisez plutôt « google-chrome & ».

</div>

</détails>

<détails markdown="block">
<summary class="dropDown-header">MacOS</summary>

#### Étape 1 : Téléchargez Google Chrome

- Visitez la [page de téléchargement de Google Chrome](https://www.google.com/chrome/)
- Cliquez sur **Télécharger Chrome pour Mac**

#### Étape 2 : Installez Google Chrome

- Ouvrez le dossier **Téléchargements**
- Double-cliquez sur le fichier **googlechrome.dmg**
- Faites glisser l'icône Google Chrome vers l'icône du dossier **Applications**

#### Étape 3 : Supprimez le fichier d'installation

- Ouvrez le **Finder**
- Cliquez sur la **flèche** à côté de Google Chrome dans la barre latérale.
- Accédez au dossier **Téléchargements**
- Faites glisser **googlechrome.dmg** vers la corbeille

#### Étape 4 : Utiliser Google Chrome

- Accédez à votre dossier **Applications**
- Double-cliquez sur **Google Chrome**

</détails>

<détails markdown="block">
<summary class="dropDown-header">WSL2</summary>

#### Étape 1 : Téléchargez Google Chrome

- Visitez la [page de téléchargement de Google Chrome](https://www.google.com/chrome/).
- Cliquez sur **Télécharger Chrome**.

#### Étape 2 : Installez Google Chrome

- Ouvrez le dossier **Téléchargements**.
- Double-cliquez sur le fichier **ChromeSetup.exe**.

#### Étape 3 : Supprimez le fichier d'installation

- Ouvrez le dossier **Téléchargements**.
- Faites glisser **ChromeSetup.exe** vers la corbeille.

#### Étape 4 : Utiliser Google Chrome

- Recherchez **Google Chrome** dans vos applications.
- Double-cliquez sur **Google Chrome**.

</détails>

### Vérification des connaissances

Les questions suivantes sont l’occasion de réfléchir aux sujets clés de cette leçon. Si vous ne pouvez pas répondre à une question, cliquez dessus pour consulter le matériel, mais gardez à l'esprit que vous n'êtes pas censé mémoriser ou maîtriser ces connaissances.

- [Quels systèmes d'exploitation sont pris en charge par dans la formation ?](#os-installation)
- [Quel navigateur est pris en charge ?](#google-chrome-installation)

### Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- Il semble que cette leçon ne comporte pas encore de ressources supplémentaires. Aidez-nous à élargir cette section en contribuant à notre programme.