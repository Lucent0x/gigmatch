// DOM stuff
const form = document.querySelector("form");
const message = document.querySelector("div.msg");
// form submit handler
form.onsubmit = ( e ) => {
    //stop default reloading
    e.preventDefault();
    //begin AJAX
    let xhr = new XMLHttpRequest();
    xhr.open( "POST", "../php/verify.php", true );

    xhr.onload = ( ) => {
        if  ( xhr.readyState ===XMLHttpRequest.DONE ){
            if( xhr.status === 200 ){
               let data = xhr.response;
                if (data === "correct"){
                    location.href = "../php/home.php";
                }else{
                    message .innerHTML = 
                    "<p class='button is-fullwidth is-danger is-light has-text-danger  has-text centered'>"+data+"</p>";
                    // message.classList.add("");
                    console.log(data)
                }
            }
        } 
    }
    const payload = new FormData (form);
    xhr.send( payload );
}  