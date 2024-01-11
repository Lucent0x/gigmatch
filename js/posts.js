const comments  = document.querySelectorAll(".commenting");
const likes  = document.querySelectorAll(".fa-thumbs-up");
const forms = document.querySelectorAll("form");

const hid =  ( hash) => {
    // comments[hash].classList.toggle("show")   
    const comment = document.querySelector(`#${hash}`);
     comment.classList.toggle("show");
}

likes.forEach( (like) => {
    like.onclick = ( ) => {
        like.style.color = "goldenrod";
        like.style.fontSize = "40px";
        like.style.transitionDuration = "1s";
        setTimeout( ()=>{
        like.style.fontSize = "30px";
        }, 2000)
    }
})

forms.forEach ( (form) => {

    const post_id = form[1].value;
    const input = form[0];
    const comment = document.querySelector(`.comment${post_id}`);
    const commentList =  document.querySelector(`.cmt${post_id}`);

    comment.onclick = ( ) => {
        commentList.classList.toggle("showit");
    }

     form.onsubmit = (e) => {
        e.preventDefault();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/sendComment.php", true );
        xhr.onload = ( ) => {
            if ( xhr.readyState == XMLHttpRequest.DONE ){
                if (xhr.status == 200 ){
                let response =  xhr.response;
                 input.value = "";
                if ( Number(response) > 1 ) {
                comment.innerText = `${response} comments`;
                }else {
                    comment.innerText = `${response} comment`;
                }
                refreshComments(post_id)
            }
        }
    }
     const payload = new FormData(form);
     xhr.send(payload);
     }
})

sendLike = ( postid ) => {
    const like = document.querySelector(`.post${postid}`);
    //start data ajax 
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/sendLike.php", true );
    xhr.onload = ( ) => {
        if ( xhr.readyState == XMLHttpRequest.DONE ){
            if (xhr.status == 200 ){
                
               let response = xhr.response;
               if ( Number( response )> 1 ){
                 like.innerHTML= response+" likes";
               }else if ( Number(response)  == 1 ){
                 like.innerHTML= response+" like";
               }else{
                  like.innerHTML= " ";
               }
            }
        }
    }
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send( `postid=${postid}`);
}


const refreshComments = ( postid ) => {
    
    let commentList =  document.querySelector(`.cmt${postid}`);   
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/fetchComments.php", true );
    xhr.onload = ( ) => {
        if ( xhr.readyState == XMLHttpRequest.DONE ){
            if (xhr.status == 200 ){
               let response = xhr.response;
               commentList.innerHTML = response;
               console.log(response)
            }
        }
    }
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send( `postid=${postid}`);
}