const title = document.querySelector("input#title");
const titled = document.querySelector("#p-title");
const thumbnail = document.querySelector("#file");
const label = document.querySelector("#label")
const form = document.querySelector("form");

title.onchange = ( e ) => {
    titled.innerText = title.value;
}

label.onclick = ( ) => {
label.style.background = "goldenrod";
label.style.color = "white";

}

form.onsubmit = ( event ) => {
    event.preventDefault();

   //calculate gigpoint balance
   const calculate = async ( ) => {
        //fetchbalance page with ajax 
        //check if balance is sufficient
        // call deduct balance
      
   }
  
   const deductBal = async ( ) => {
    //deduct balance
  //call proceed
   }

   const proceed = async ( ) => {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/postMaker.php", true );
    xhr.onload = ( ) => {
        if ( xhr.readyState == XMLHttpRequest.DONE ){
            if (xhr.status == 200 ){
               let response = xhr.response;
               console.log(response);
            // data.innerHTML = response + ' <i class="fa-solid fa-check"></i>';
            }
        }
    }
    const payload = new FormData (form);
    xhr.send(payload);
}
proceed()
}