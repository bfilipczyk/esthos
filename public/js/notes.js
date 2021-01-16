
var tHeaderConfig = {
    selector: '.t-header',
    menubar: false,
    skin: 'oxide-dark',
    content_css: 'dark',
    toolbar: false
};

var tBodyConfig = {
    selector: '.t-body',
    menubar: false,
    skin: 'oxide-dark',
    content_css: 'dark',
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
    quickbars_selection_toolbar: 'bold italic underline | formatselect | blockquote quicklink',
    contextmenu: 'undo redo | inserttable | cell row column deletetable | help',
    powerpaste_word_import: 'clean',
    powerpaste_html_import: 'clean',
};

tinymce.init(tHeaderConfig);
tinymce.init(tBodyConfig);

document.getElementById('save').onclick = function ()
{
    tinymce.triggerSave();
    $.ajax({
        type:"POST",
        url: "/notes",
        data: {'title': tinymce.editors[0].getContent(), 'content': tinymce.editors[0].getContent()}
    });

}

