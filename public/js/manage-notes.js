const divs = document.querySelectorAll(".note_div");

if(document.getElementById('create')) {
    document.getElementById("create").addEventListener("click", function () {


        fetch("/add", {
                method: "POST",
                headers: {
                    'Content-Type': 'text/xml'
                },
                body: window.location.pathname
            }
        ).then(function (){
            window.location.replace(window.location.origin + '/notes');
        })
    })
}

divs.forEach(div => div.addEventListener("click", function (){
    var id = this.getAttribute("id")

    document.cookie = "note="+id;
    window.location.replace(window.location.origin+'/notes');
}));
