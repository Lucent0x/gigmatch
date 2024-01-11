const form = document.querySelector("form");
const message = document.querySelector("div.msg");

form.onsubmit = ( e ) => {
    e.preventDefault()

    xhr = new XMLHttpRequest();
    xhr.open( "POST", "../php/register.php", true);
    xhr.onload =  ( ) => {
    if (xhr.readyState === XMLHttpRequest.DONE){
        if ( xhr.status === 200 ){
            let data = xhr.response;
            if (data === "created"){
                 message .innerHTML = 
                    "<p class='button is-fullwidth is-success is-light has-text-success  has-text centered'>"+data+"</p>";
                    location.href = "../php/signin.php";
                }else{
                    message .innerHTML = 
                    "<p class='button is-fullwidth is-danger is-light has-text-danger  has-text centered'>"+data+"</p>";
                    // message.classList.add("");
                }
        }
    }
  }
    payload = new FormData(form)
    xhr.send( payload )
}