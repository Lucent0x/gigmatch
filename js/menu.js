const menu = document.querySelector(".menu div");
const menulist = document.querySelector(".right ul");
value = "menu";

menu.onclick = (  ) => {
     if(value == "menu"){
      menu.style.border = "4px double goldenrod";
        value = "x";
         menu.innerHTML= '<i class="fa-solid fa-xmark"></i>';
        menulist.style.display = "flex";
     }else{
        value = "menu"
      menu.style.border = "none";
        menu.innerHTML = '<i class="fa-solid fa-bars"></i>';
        menulist.style.display = "none";
     }
}
