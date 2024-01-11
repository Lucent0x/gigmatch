// DOM stuff
const form = document.querySelector("form");
const message = document.querySelector(".msg");
// form submit handler
form.onsubmit = ( e ) => {
    //stop default reloading
    e.preventDefault();
    //begin AJAX
    let xhr = new XMLHttpRequest();
    xhr.open( "POST", "../php/balances.php", true );

    xhr.onload = ( ) => {
        if  ( xhr.readyState ===XMLHttpRequest.DONE ){
            if( xhr.status === 200 ){
               let data = xhr.response;       
                    message .innerHTML = 
                    "<p class='button is-fullwidth is-success is-light has-text-success has-text centered'>"+data+"</p>";
                    setTimeout(() => {
                        message.innerHTML = "";
                    }, 2000);
            }
        } 
    }
    const payload = new FormData (form);
    xhr.send( payload );
}  