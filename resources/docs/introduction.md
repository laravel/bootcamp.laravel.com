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

<a href="/blade/installation" class="group relative inline-flex border border-red-600 focus:outline-none mt-2 no-underline">
    <span class="w-full inline-flex items-center justify-center self-stretch px-4 py-2 text-sm text-red-600 text-center font-bold uppercase bg-white dark:bg-dark-700 ring-1 ring-red-600 ring-offset-1 dark:ring-offset-dark-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">Build Chirper with Blade</span>
</a>

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

<a href="/inertia/installation" class="group relative inline-flex border border-red-600 focus:outline-none mt-2 no-underline">
    <span class="w-full inline-flex items-center justify-center self-stretch px-4 py-2 text-sm text-red-600 text-center font-bold uppercase bg-white dark:bg-dark-700 ring-1 ring-red-600 ring-offset-1 dark:ring-offset-dark-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">Build Chirper with JavaScript and Inertia</span>
</a>
