# <b>01.</b> Introduction

Welcome to the Laravel Bootcamp! In this guide we will walk through building a modern Laravel application from scratch. To explore the framework, we'll build a microblogging platform called *Chirper*.

## Choose your own adventure:<br>Blade or JavaScript

Laravel is incredibly flexible, allowing you to build your front-end with a wide variety of technologies to suit your needs. For this tutorial, we have prepared a few choices for you.

### Blade

[Blade](https://laravel.com/docs/blade) is the simple, yet powerful templating engine that is included with Laravel. Your HTML will be rendered server-side, making it a breeze to include dynamic content from your database. We'll also be using [Tailwind CSS](https://tailwindcss.com/) to make it look great!

If you're not sure where to start, we think Blade is the most straight-forward. You can always come back and build Chirper again using JavaScript.

```blade filename=welcome.blade.php
Greetings {{ $friend }}, let's build Chirper with Blade!
```

[Build Chirper with Blade...](/blade/installation)

### JavaScript & Inertia

If you'd like to use JavaScript, we will be providing code samples for both [Vue](https://vuejs.org/) and [React](https://reactjs.org/). We'll also be using [Inertia](https://inertiajs.com/) to connect it all up and [Tailwind CSS](https://tailwindcss.com/) to make it look great!

If you're not sure which to select, we're big fans of Vue since it is beginner-friendly and extremely powerful. After you've finished the Bootcamp, you can always try it again with the other stack.

Go ahead and choose your stack:

```vue tab=Vue filename=Welcome.vue
<template><!-- [tl! .hidden] -->
<Welcome>
    Hey {{ friend }}, let's build Chirper with Vue!
</Welcome>
</template><!-- [tl! .hidden] -->
```

```jsx tab=React filename=Welcome.jsx
<Welcome>
    Nice to see you {friend}, let's build Chirper with React!
</Welcome>
```

At any point you may view the code for either framework to see what life is like on the other side, just be sure not to mix the code in your project.

[Build Chirper with JavaScript and Inertia...](/inertia/installation)
