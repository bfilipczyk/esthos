<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/base_page.css">
    <link rel="stylesheet" type="text/css" href="public/css/notes.css">
    <script src="https://cdn.tiny.cloud/1/t1bl8q46dy1s5giebu8tmmlljl5uecy8i8km6oui26cm8r67/tinymce/5/tinymce.min.js" referrerpolicy="origin" defer></script>
    <script type="text/javascript" src="public/js/sidebar.js" defer></script>
    <script type="text/javascript" src="public/js/notes.js" defer></script>
    <title> NOTE PAGE </title>
</head>
<body>
<div class="base_container">
    <main id="main">
        <div class="base_top">
            <header>
                Note
            </header>
        </div>
        <section id="note_main" class="note_main">
            <div id="note_edit" class="note_edit">
                <form class="note_form" method="post" action="notes">
                    <h2 class="t-header" name="title" contenteditable="true" style="position: relative;">
                            <?= $note->getTitle() ?>
                    </h2>
                    <div class="t-body" name='content' contenteditable="true" style="position: relative;">
                        <p>
                            <?= $note->getContent() ?>
                        </p>
                    </div>
                    <button type="submit" >SAVE</button>


                </form>
            </div>
        </section>
    </main>
    <?php
    include 'sidebar.php'
    ?>
</div>


