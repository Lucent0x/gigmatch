
const preview = document.querySelector("#preview");
const edit = document.querySelector("#update");
const inputs = document.querySelectorAll("input.writeable");
saved = document.querySelector(".primary-btn")
const form = document.querySelector("form");

 preview.onclick = async ( ) => {
    
    edit.style.borderBottom = "3px solid white";
    preview.style.borderBottom = "3px solid darkred";
    saved.style.display = "flex";
    inputs.forEach(  ( input )=> {
        input.setAttribute("readonly", "");
    })

    //Begin AJAX for saving data and  notifying
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/biodata.php", true );
    xhr.onload = ( ) => {
        if ( xhr.readyState == XMLHttpRequest.DONE ){
            if (xhr.status == 200 ){
               let response = xhr.response;
               console.log(response);
            }
        }
    }
    const payload = new FormData (form);
    xhr.send(payload);
    
}

edit.onclick = ( ) => {

    edit.style.borderBottom = "3px solid darkred";
    preview.style.borderBottom = "3px solid white";
    saved.style.display = "none";
    inputs.forEach(  ( input )=> {
        input.removeAttribute("readonly");
    })

}