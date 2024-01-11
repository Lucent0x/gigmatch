const form = document.querySelector("form");
const data = document.querySelector(".tag");
form.onsubmit = ( e ) => {
    e.preventDefault();

     const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/upgrader.php", true );
    xhr.onload = ( ) => {
        if ( xhr.readyState == XMLHttpRequest.DONE ){
            if (xhr.status == 200 ){
               let response = xhr.response;
               data.innerHTML = response + ' <i class="fa-solid fa-check"></i>';
            }
        }
    }
    const payload = new FormData (form);
    xhr.send(payload);
    
}