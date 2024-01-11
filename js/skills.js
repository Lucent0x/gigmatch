const btn = document.querySelectorAll(".plus");

btn.forEach ( (btn) => {
    btn.onclick = ( ) => {
        btn.innerHTML = '<i class="fa-solid fa-check"></i>';
    }
})