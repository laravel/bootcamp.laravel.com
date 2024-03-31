### Introduction

La plupart du contenu sur le Web est basé sur du texte, vous devrez donc beaucoup travailler avec des éléments de texte HTML.

Dans cette leçon, nous découvrirons les éléments textuels que vous êtes susceptible d’utiliser le plus.

### Aperçu de la leçon

Cette section contient un aperçu général des sujets que vous apprendrez dans cette leçon.

- Comment créer des paragraphes.
- Comment créer des titres.
- Comment créer du texte en gras.
- Comment créer du texte en italique.
- Les relations entre les éléments imbriqués.
- Comment créer des commentaires HTML.

### Paragraphes

Qu’attendriez-vous du texte suivant sur une page HTML ?

```html
<body>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
  incididunt ut labore et dolore magna aliqua.

  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
  nisi ut aliquip ex ea commodo consequat.
</body>
```

Cela ressemble à deux paragraphes de texte et vous pouvez donc vous attendre à ce qu'il s'affiche de cette façon. Cependant, ce n’est pas le cas, comme vous pouvez le voir dans le résultat ci-dessous :

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="xxrKqeV" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/xxrKqeV">
  no-paragraphs-example</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>


Lorsque le navigateur rencontre de nouvelles lignes comme celle-ci dans votre code HTML, il les compresse en un seul espace. Le résultat de cette compression est que tout le texte est regroupé en une seule longue ligne.

Si nous voulons créer des paragraphes en HTML, <span id='create-paragraph-element'>nous devons utiliser l'élément paragraphe</span>, qui ajoutera une nouvelle ligne après chacun de nos paragraphes. Un élément de paragraphe est défini en enveloppant le contenu du texte avec une balise `<p>`.

Changer notre exemple d'avant pour utiliser des éléments de paragraphe résout le problème :

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="mdwbmdp" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/mdwbmdp">
  pargraph-example</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

### Rubriques

Les titres sont différents des autres éléments de texte HTML : ils sont affichés plus grands et plus gras que les autres textes pour signifier qu'il s'agit de titres.

<span id='différent-heading-levels'>Il existe 6 niveaux différents de titres allant de `<h1>` à `<h6>`. Le nombre dans une balise de titre représente le niveau de ce titre. Le titre le plus grand et le plus important est h1, tandis que h6 est le titre le plus petit au niveau le plus bas.</span>

Les titres sont définis un peu comme les paragraphes. Par exemple, pour créer un en-tête h1, nous enveloppons notre texte d'en-tête dans une balise `<h1>`.

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="LYLPLbg" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/LYLPLbg">
  html-headings-example</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

Il est important d’utiliser le bon niveau de titre car les niveaux fournissent une hiérarchie au contenu. Un titre h1 doit toujours être utilisé pour le titre de la page globale, et les titres de niveau inférieur doivent être utilisés comme titres pour le contenu de sections plus petites de la page.

### Élément fort

L'élément `<strong>` met le texte en gras. Il marque également sémantiquement le texte comme important ; cela affecte les outils, tels que les lecteurs d'écran, sur lesquels les utilisateurs malvoyants s'appuieront pour utiliser votre site Web. Le ton de la voix sur certains lecteurs d'écran changera pour communiquer l'importance du texte au sein d'un élément fort. Pour définir un élément fort, nous enveloppons le contenu du texte dans une balise `<strong>`.

Vous pouvez utiliser strong seul :

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="qBjWXrB" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/qBjWXrB">
  html-single-strong-example</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

Mais vous vous retrouverez probablement à utiliser beaucoup plus l’élément strong en combinaison avec d’autres éléments de texte, comme celui-ci :

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="wvewqJr" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/wvewqJr">
  html-strong-with-paragraph-exmample</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

Parfois, vous souhaiterez mettre du texte en gras sans lui donner une signification importante. Vous apprendrez comment procéder dans les leçons CSS plus tard dans le programme.


### Élément Em

L'élément `<em>` met le texte en italique. Il met également sémantiquement l'accent sur le texte, ce qui peut encore une fois affecter des éléments tels que les lecteurs d'écran. Pour définir un élément mis en valeur, nous enveloppons le contenu du texte dans une balise `<em>`.

Pour utiliser `<em>` seul :

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="wvewqpp" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/wvewqpp">
  html-single-em-example</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

Encore une fois, comme pour l'élément strong, vous vous retrouverez principalement à utiliser l'élément `<em>` avec d'autres éléments de texte :

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="VwWZzyj" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/VwWZzyj">
  html-em-with-paragraph-example</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

### Nesting and indentation

Vous avez peut-être remarqué que dans tous les exemples de cette leçon, nous mettons en retrait tous les éléments qui se trouvent dans d'autres éléments. C’est ce qu’on appelle les éléments d’imbrication.

<span id='nested-relationship'>Lorsque nous imbriquons des éléments dans d'autres éléments, nous créons une relation parent-enfant entre eux. Les éléments imbriqués sont les enfants et l'élément dans lequel ils sont imbriqués est le parent.</span>

Dans l'exemple suivant, l'élément body est le parent et le paragraphe est l'enfant :

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="oNwjEvO" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/oNwjEvO">
  html-nesting-parent-child</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

Tout comme dans les relations humaines, les éléments parents HTML peuvent avoir de nombreux enfants. <span id='elements-same-level'>Les éléments au même niveau d'imbrication sont considérés comme des frères et sœurs.</span>

Par exemple, les deux paragraphes du code suivant sont frères et sœurs, puisqu'ils sont tous deux enfants de la balise body et sont au même niveau d'imbrication l'un que l'autre :

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="ZEybrYx" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/ZEybrYx">
  html-nesting-siblings</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

Nous utilisons l'indentation pour rendre le niveau d'imbrication clair et lisible pour nous-mêmes et pour les autres développeurs qui travailleront avec notre HTML à l'avenir. Il est recommandé de mettre en retrait tous les éléments enfants de deux espaces.

Les relations parent, enfant et frère entre les éléments deviendront beaucoup plus importantes plus tard lorsque nous commencerons à styliser notre HTML avec CSS et à ajouter un comportement avec JavaScript. Pour l’instant, cependant, il est simplement important de connaître la distinction entre la manière dont les éléments sont liés et la terminologie utilisée pour décrire leurs relations.

### Commentaires HTML

Les commentaires HTML ne sont pas visibles par le navigateur ; ils nous permettent de *commenter* notre code afin que d'autres développeurs ou nous-mêmes puissent les lire et obtenir un contexte sur quelque chose qui pourrait ne pas être clair dans le code.

Afin d'écrire un commentaire HTML, nous entourons simplement le commentaire avec les balises `<!--` et `-->`. Par exemple:

<p class="codepen" data-height="300" data-theme-id="dark" data-default-tab="html,result" data-slug-hash="abwoyBg" data-user="TheOdinProjectExamples" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/TheOdinProjectExamples/pen/abwoyBg">
  html-comments-example</a> by TheProject (<a href="https://codepen.io/TheOdinProjectExamples">@TheProjectExamples</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

<div class="lesson-note" markdown="1">

 **VSCode keyboard shortcut** 

Si vous trouvez fatigant de taper la syntaxe des commentaires, le raccourci suivant vous aidera à créer rapidement un nouveau commentaire, à convertir n'importe quelle ligne en commentaire ou à décommenter n'importe quelle ligne :

- Utilisateurs Mac : <kbd>Cmd</kbd> + <kbd>/</kbd>
- Utilisateurs Windows et Linux : <kbd>Ctrl</kbd> + <kbd>/</kbd>
</div>

### Devoir

<div class="lesson-content__panel" markdown="1">

1. Regardez la [Vidéo paragraphes et titres HTML] de Kevin Powell (https://www.youtube.com/watch?v=yqcd-XkxZNM).
1. Regardez la [Vidéo texte HTML en gras et italique] de Kevin Powell (https://www.youtube.com/watch?v=gW6cBZLUk6M).
1. Pour vous entraîner à travailler avec du texte en HTML, créez une page d'article de blog simple qui utilise différents titres, utilise des paragraphes et contient du texte dans les paragraphes en gras et en italique. Vous pouvez utiliser [Lorem Ipsum](https://en.wikipedia.org/wiki/Lorem_ipsum) pour générer du texte factice, à la place du texte réel, lorsque vous créez vos sites. VS Code inclut un raccourci pour générer du lorem ipsum pour vous. Pour déclencher le raccourci, tapez « lorem » sur la ligne où vous voulez le texte factice, puis appuyez sur la touche <kbd>Entrée</kbd>, et le tour est joué, vous avez généré un texte factice sans accroc.

</div>

### Vérification des connaissances
  
Cette section contient des questions vous permettant de vérifier par vous-même votre compréhension de cette leçon. Si vous rencontrez des difficultés pour répondre à une question, cliquez dessus et consultez le matériel auquel elle renvoie.
 
- [Comment créer un paragraphe en HTML ?](#create-paragraph-element)
- [Comment créer un titre en HTML ?](#headings)
- [Combien de niveaux de titres différents existe-t-il et quelle est la différence entre eux ?](#différents-niveaux-de-titres)
- [Quel élément devez-vous utiliser pour rendre le texte gras et important ?](#strong-element)
- [Quel élément devez-vous utiliser pour mettre le texte en italique afin de le mettre en valeur ?](#em-element)
- [Quelle relation un élément entretient-il avec les éléments imbriqués qu'il contient ?](#nested-relationship)
- [Quelle relation entretiennent deux éléments s'ils sont au même niveau d'imbrication ?](#elements-same-level)
- [Comment créer des commentaires HTML ?](#html-comments)

### Ressources additionnelles

Cette section contient des liens utiles vers du contenu connexe. Ce n’est pas obligatoire, alors considérez-le comme supplémentaire.

-[La différence sémantique entre les balises &lt;strong> et &lt;b> ou &lt;em> et &lt;i> et quand les utiliser.](https://medium.com/@zac_heisey/when-to-use -strong-b-em-et-i-tags-dans-votre-markup-fa4d0af8affb)
- [Un article interactif sur le formatage du texte HTML](https://www.w3schools.com/html/html_formatting.asp)
