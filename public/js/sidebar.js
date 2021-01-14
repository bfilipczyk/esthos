/* Set the width of the sidebar to 250px (show it) */
function openNav() {


    if(screen.width>420){
        document.getElementById("navi").style.width = "20vw";
        document.getElementById("main").style.width = "80vw"
        if(document.getElementById("base_main"))
        {
            document.getElementById("base_main").style.gridTemplateColumns = "1fr 1fr";
        }

    }
    else {
        document.getElementById("navi").style.width = "80vw";
    }

}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
    document.getElementById("navi").style.width = "0";
    if(screen.width>420) {
        document.getElementById("main").style.width = "95vw"
        if(document.getElementById("base_main")) {
            document.getElementById("base_main").style.gridTemplateColumns = "1fr 1fr 1fr";
        }
    }

}

