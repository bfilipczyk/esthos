
var tHeaderConfig = {
    selector: '.t-header',
    menubar: false,
    skin: 'oxide-dark',
    content_css: 'dark',
    toolbar: false,
    mobile: {
        width: "55vw"
    }
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
    quickbars_selection_toolbar: 'bold italic underline',
    contextmenu: 'undo redo | inserttable | cell row column deletetable | help',
    powerpaste_word_import: 'clean',
    powerpaste_html_import: 'clean',
    mobile: {
        width:"55vw"
    }
};

tinymce.init(tHeaderConfig);
tinymce.init(tBodyConfig);

document.getElementById('save').addEventListener("click", function ()
{
    tinymce.triggerSave();
    $.ajax({
        type:"POST",
        url: "/notes",
        data: {'title': tinymce.editors[0].getContent(), 'content': tinymce.editors[0].getContent()}
    });

})

document.getElementById('delete note').addEventListener("click", function ()
{
    if(confirm("Delete note"))
    {
        fetch('/remove').then(function (){
            window.location.replace(window.location.origin + '/home');
        })
    }
})

