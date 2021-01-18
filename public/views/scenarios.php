<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/base_page.css">
    <script type="text/javascript" src="public/js/sidebar.js" defer></script>
    <title> SCENARIOS PAGE </title>
</head>
<body>
<div class="base_container">
    <main id="main">
        <div class="base_top">
            <header>
                Scenarios
            </header>
            <button id="create"> Add Scenario</button>
        </div>
        <section id="base_main" class="base_main">
            <?php foreach ($notes as $note): ?>
                <div id="<?= $note->getId(); ?>">
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