const search = document.querySelector('input[placeholder="search"]');
const notesContainer = document.querySelector(".base_main");



search.addEventListener("keyup", function () {
    if (event.key === "Enter") {
        event.preventDefault();



        const data = this.value;

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }
        ).then(function (response) {
            return response.json();
        }).then(function (notes) {
            notesContainer.innerHTML = "";
            loadNotes(notes);
        });
    }
});

function loadNotes(notes) {
    notes.forEach(note => {
        console.log(notes);
        createNote(note);
    });
}

function createNote(note) {
    const template = document.querySelector("#note-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = note.id;
    const title = clone.querySelector("h2");
    title.innerHTML = note.title;
    const content = clone.querySelector("#info");
    content.innerHTML = note.content;
    const lastOp = clone.querySelector("#last_opened");
    lastOp.innerHTML = note.last_open;

    notesContainer.appendChild(clone);


}