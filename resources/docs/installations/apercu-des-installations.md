[TOC]

# <b> Aperçu des installations</b>
# Introduction

La première étape pour créer un site Web consiste à disposer des bons outils. Pour nous, cela signifie mettre en place un environnement de développement pour écrire du bon code.

De nombreux cours de développement en ligne utilisent des éditeurs de code intégrés au navigateur ou des « bacs à sable », qui vous fournissent les outils et les programmes nécessaires pour accomplir la tâche à accomplir et rien d'autre. Vous utiliserez certains de ces bacs à sable tout au long des premières étapes de la formation, car ils sont parfaits pour démarrer rapidement. Cependant, la meilleure façon de se préparer à réussir à long terme est d’opérer dans un véritable environnement de développement.

Nous ne vous mentirons pas : installer des packages, des éditeurs et même des systèmes d'exploitation entiers peut être très frustrant. Cependant, avoir l'expérience de la mise en place d'un environnement de développement pour exécuter le code que vous écrirez est une compétence inestimable et concrète que vous conserverez avec vous pour le reste de votre carrière.

## Le plan d'installation

Dans les sections suivantes, nous passerons en revue les étapes de configuration de votre environnement. Il n'est pas nécessaire d'installer quoi que ce soit dans cette leçon, c'est une leçon informative. Ces sections sont **les étapes les plus importantes** de l'ensemble du programme. Veuillez prendre le temps supplémentaire de **vérifier ce que vous tapez**, sinon vous pourriez vous causer encore plus de maux de tête plus tard.

Dans les prochaines leçons, nous passerons ensemble en revue ces étapes d’installation :

- Installation d'un système d'exploitation (OS) pris en charge.
- Installation du navigateur Web Google Chrome.
- Installation d'un éditeur de code.
- Création d'une clé SSH (un "mot de passe" personnel qui vous identifiera sur GitHub, Heroku et de nombreux autres sites que vous utiliserez).

À la fin de la prochaine leçon, vous serez opérationnel avec de nombreux outils dont vous avez besoin pour écrire et exécuter du code ! Cela peut sembler beaucoup d'étapes, mais nous les franchirons ensemble le plus facilement possible ! Si quelque chose ne va pas, n'oubliez pas de suivre ces étapes :

- Examinez la sortie du terminal pour détecter l'erreur réelle.
- Google Google Google.
- N'ayez jamais peur de demander de l'aide sur le [serveur général](https://discord.gg/qAXhuudu)

> **note**
> Discuter des questions dans le chanel [discord](https://discord.gg/qAXhuudu)

Pour les utilisateurs de Chromebook, le choix de votre système d’exploitation a effectivement été fait pour vous. Cependant, sur [Systèmes ChromeOS prenant en charge "Linux sur ChromeOS"](https://www.chromium.org/chromium-os/chrome-os-systems-supporting-linux), la leçon suivante contient des instructions sur la façon de définir ceci sur votre appareil.

## Options du système d'exploitation

### macOS

Si vous utilisez un Mac, vous êtes en pleine forme. En installant seulement quelques programmes, vous serez opérationnel en un rien de temps !

### Linux (saveurs officielles d'Ubuntu)

[Linux](https://en.wikipedia.org/wiki/Linux) est un système d'exploitation gratuit et open source qui fonctionne bien avec tous les langages de programmation. La plupart des outils de développement sont écrits pour fonctionner nativement avec Linux. Vos outils seront probablement mis à jour plus souvent, disposeront de plus d’informations pour le dépannage et fonctionneront tout simplement mieux sous Linux. Nous utiliserons Ubuntu, l'une des distributions les plus populaires et les plus conviviales disponibles, ou l'alternative plus légère Xubuntu. **Si vous n'utilisez pas de Mac, nous vous recommandons d'utiliser Linux.** C'est aussi simple que cela.

### Windows

Windows, en lui-même, **n'est pas pris en charge nativement** pour la formation. Étant donné que la plupart des outils que vous utiliserez ont été écrits pour un environnement Linux, vous en aurez besoin même si vous envisagez d'utiliser Windows comme système d'exploitation de développement. Si vous utilisez actuellement Windows, vous pouvez utiliser l'une des options suivantes pour créer votre environnement de développement :

- Une machine virtuelle VirtualBox
- Installation Ubuntu à double démarrage
- Sous-système Windows pour Linux (WSL2)

Une [machine virtuelle](https://youtu.be/yIVXjl4SwVo) est une émulation d'un ordinateur qui s'exécute dans votre système d'exploitation existant. Il vous permet d'utiliser un autre système d'exploitation dans un programme sur votre système d'exploitation actuel (par exemple, exécuter Linux dans Windows). Les machines virtuelles sont aussi simples à installer que n’importe quel autre programme et ne comportent aucun risque. Si vous n'aimez pas Linux, vous pouvez facilement supprimer la machine virtuelle. Les machines virtuelles constituent un excellent moyen pour les nouveaux développeurs de démarrer rapidement.

**Le double démarrage** signifie l'installation de deux systèmes d'exploitation sur votre ordinateur, ce qui peut vous donner la possibilité de démarrer Linux ou Windows au premier démarrage de votre ordinateur. L'avantage du double démarrage par rapport à une machine virtuelle est que le système d'exploitation peut utiliser toutes les ressources de votre ordinateur, ce qui entraîne un fonctionnement beaucoup plus rapide. L'installation d'un système à double démarrage comporte certains risques, car vous modifiez les partitions de votre disque dur, mais tout ira bien tant que vous prenez votre temps et lisez les instructions.

Le double démarrage peut être aussi simple que d’insérer une clé USB et de cliquer sur quelques boutons. Les avantages du double démarrage ne peuvent être surestimés. Vous permettrez à Linux d'accéder à toutes les capacités de votre matériel, de disposer d'un environnement de codage propre et sans distraction et d'apprendre la plate-forme utilisée par de nombreux développeurs et serveurs seniors à travers le monde.

**Le sous-système Windows pour Linux** vous permet d'exécuter un environnement Linux complet à partir d'une installation Windows existante, vous offrant ainsi tous les avantages de Linux grâce à un processus d'installation simplifié. Nous utiliserons la version 2 de WSL, communément appelée WSL2, dans le cadre du programme.

### Vous craignez d'installer un nouveau système d'exploitation ?

"Woah, woah, woah ! J'aime bien mon système d'exploitation tel qu'il est !"

Si vous n'avez pas d'ordinateur Apple, vous utilisez probablement Windows. Ne t'inquiète pas! Les options ci-dessus ne signifient pas que vous devez vous débarrasser de Windows. Linux partagera volontiers le disque dur avec Windows. Nous savons que vous avez probablement appris de nombreux trucs et astuces pour votre système d'exploitation préféré et que vous ne voulez pas perdre tout ce que vous avez sur votre ordinateur. Cependant, la plupart des systèmes d'exploitation sont développés en pensant à des personnes non techniques, ils masquent donc ou rendent difficile l'utilisation de nombreux langages et frameworks que nous devrons installer. Le fait de devoir contourner ces difficultés pousse de nombreux nouveaux développeurs à abandonner avant même d'avoir commencé leur voyage vers le nirvana du full-stack.

La modification ou le double démarrage d'un ordinateur pour travailler avec les outils dont vous aurez besoin facilitera grandement le démarrage de la programmation, peut aider à créer un environnement sans distraction et aura fière allure sur votre CV. Respirez profondément et examinons vos options.

Toujours pas convaincu ? Voici quelques bonnes raisons d’installer Linux :

- **Testé** - Nous avons testé nos instructions avec macOS, Ubuntu (et les versions officielles d'Ubuntu) et WSL2. Nous avons effectué des recherches afin que vous puissiez installer les outils avec le moins de problèmes possible, vous permettant ainsi de coder plus tôt. Le temps passé à lutter avec votre système d’exploitation est du temps consacré à l’apprentissage du code.
- **Assistance communautaire** - L'utilisation des outils que nous recommandons nous permet de vous aider plus facilement lorsque vous rencontrez des problèmes.
- **Les outils de développement sont conçus pour Linux** - Ruby (on Rails) et Node.js, technologies backend populaires couvertes par le programme  et largement utilisées dans la communauté de développement Web au sens large, sont des projets open source qui *s'attendent* explicitement à exécuté sur une plate-forme open source (basée sur UNIX) comme Linux.
- **Travailler comme des pros** - De nombreux développeurs utilisent un système d'exploitation basé sur Unix.
- **Performances** - Vous craignez d'installer Linux parce que votre machine est lente/ancienne et dispose d'un espace limité ? Lorsque les performances sont une priorité, Linux est un excellent choix. Il utilise moins de ressources système que Windows et occupera moins d'espace sur le disque dur.

De nombreux apprenants viennent sur notre chaîne Discord pour demander si les instructions de cette page doivent être suivies. Les modérateurs de notre serveur Discord ont écrit tout ce que vous venez de lire sur le plan d'installation. Les apprenants qui soutiennent sur notre serveur Discord sont d'accord avec les conseils de cette page et feront les mêmes recommandations que vous avez lues ici.

Avant de continuer, nous devons d’abord souligner un détail important :

**Nous ne pouvons soutenir que ce qui est fourni dans le cadre de notre programme. Nous ne prenons pas en charge Windows natif en tant qu'environnement de développement.** L'utilisation de Windows a été discutée à plusieurs reprises et il n'est pas possible de le faire pour le moment. Veuillez ne pas nous demander de prendre en charge Windows, et veuillez **ne pas en parler dans Discord**. Nous évaluons constamment notre programme pour garder le contenu aussi récent et accessible que possible, et Windows ne s'est pas révélé être une voie de faible résistance.

Cela étant dit, nous devons mettre en place un environnement de développement approprié !

## Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

- Il semble que cette leçon ne comporte pas encore de ressources supplémentaires. Aidez-nous à élargir cette section en contribuant à notre programme.