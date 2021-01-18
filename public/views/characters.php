<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/base_page.css">
    <script type="text/javascript" src="public/js/sidebar.js" defer></script>
    <script type="text/javascript" src="public/js/manage-notes.js" defer></script>
    <title> CHARACTERS PAGE </title>
</head>
<body>
<div class="base_container">
    <main id="main">
        <div class="base_top">
            <header>
                Characters
            </header>
            <button name="create" id="create"> Add Character</button>
        </div>
        <section id="base_main" class="base_main">
            <?php foreach ($notes as $note): ?>
                <div id="<?= $note->getId(); ?>" class="note_div">
                    <h2 class="title"><?= $note->getTitle() ?></h2>
                    <p class="info"><?= $note->getContent() ?></p>
                    <p class="last_opened"><?= $note->getLastOpen() ?></p>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <?php
    include 'sidebar.php'
    ?>
</div>
</body>
<?php
include 'note-template.php'
?>

