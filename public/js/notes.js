var tHeaderConfig = {
    selector: '.t-header',
    menubar: false,
    skin: 'oxide-dark',
    content_css: 'dark',
    inline: true,
    toolbar: false,
    plugins: [ 'quickbars' ],
    quickbars_insert_toolbar: 'undo redo',
    quickbars_selection_toolbar: 'italic underline',
};

var tBodyConfig = {
    selector: '.t-body',
    menubar: false,
    inline: true,
    plugins: [
        'autolink',
        'codesample',
        'link',
        'lists',
        'table',
        'quickbars',
        'codesample',
        'help'
    ],
    toolbar: false,
    quickbars_insert_toolbar: 'quicktable image media codesample',
    quickbars_selection_toolbar: 'bold italic underline | formatselect | blockquote quicklink',
    contextmenu: 'undo redo | inserttable | cell row column deletetable | help',
    powerpaste_word_import: 'clean',
    powerpaste_html_import: 'clean',
};

tinymce.init(tHeaderConfig);
tinymce.init(tBodyConfig);