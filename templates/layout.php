<?php

use const App\BASE_URL;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Aplikacja notatki</title>

</head>
<body class="text-white bg-gray-100 flex flex-col">
<header class="container flex md:block justify-between items-center mx-auto bg-blue-500 py-8 text-center text-4xl my-2 space-x-2 px-2">
    <p><i class="fa-regular fa-clipboard"></i> Moje notatki</p>
    <ul class="text-base flex md:hidden flex-row gap-2">
        <li class="hover:text-blue-500 hover:text-gray"><a href="<?= BASE_URL ?>">Lista notatek</a></li>
        <li class="hover:text-blue-500"><a href="<?= BASE_URL . '?action=create' ?>">Nowa notatka</a></li>
    </ul>
</header>

<section class="container mx-auto grid md:grid-cols-[200px_1fr] my-2 text-black text-xl flex-grow md:space-x-4">
    <nav class="container mx-auto bg-white p-4 hidden md:block">
        <ul class="space-y-2">
            <li class="hover:text-blue-500"><a href="<?= BASE_URL ?>">Lista notatek</a></li>
            <li class="hover:text-blue-500"><a href="<?= BASE_URL . '?action=create' ?>">Nowa notatka</a></li>
        </ul>
    </nav>
    <article class="px-2 md:px-0">
        <?php
            require_once("templates/pages/$page.php");
        ?>
    </article>
</section>
<footer class="container mx-auto bg-blue-500 p-4 text-center my-2">
    Notatki - projekt w kursie PHP
</footer>
<script>
    // Wysokość ekranu
    const bodyElement = document.getElementsByTagName("BODY")[0];
    bodyElement.style.height = window.innerHeight + 'px';

    //Ukrywanie message
    const messageElement = document.querySelector('#message');
    if(messageElement){
        setTimeout(() => {
            messageElement.remove();
        }, 4000)
    }
</script>
</body>
</html>