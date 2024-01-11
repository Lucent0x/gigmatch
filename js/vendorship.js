const form = document.querySelector("form");
form.onsubmit = ( e ) => {
    e.preventDefault();

     const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/vendorfy.php", true );
    xhr.onload = ( ) => {
        if ( xhr.readyState == XMLHttpRequest.DONE ){
            if (xhr.status == 200 ){
               let response = xhr.response;
               alert(response)
            }
        }
    }
    const payload = new FormData (form);
    xhr.send(payload);
    
}