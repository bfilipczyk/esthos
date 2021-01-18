<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/base_page.css">
    <script type="text/javascript" src="public/js/sidebar.js" defer></script>
    <script type="text/javascript" src="public/js/manage-notes.js" defer></script>
    <script type="text/javascript" src="public/js/search.js" defer></script>
    <title> HOME PAGE </title>
</head>
<body>
    <div class="base_container">
        <main id="main">
            <div class="base_top">
                <header>
                    Recently Open
                </header>
            </div>
            <section id="base_main" class="base_main">
                <?php foreach ($notes as $note): ?>
                    <div id="<?= $note->getId(); ?>" class="note_div">
                        <h2><?= $note->getTitle() ?></h2>
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