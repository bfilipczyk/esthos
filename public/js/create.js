document.getElementById("create").onclick = function () {


    fetch("/add", {
            method: "POST",
            headers: {
                'Content-Type': 'text/xml'
            },
            body: window.location.pathname
        }
    );

    window.location.replace(window.location.origin+'/notes');
}
