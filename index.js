function onMouse(event){
    event.target.style.backgroundColor = "white";
    event.target.style.color = "black";
}

function outMouse(event){
    event.target.style.backgroundColor = "black";
    event.target.style.color = "white";
}

let nav = document.querySelectorAll(".navbox");
for (let item of nav) {
    item.addEventListener("mouseover", onMouse);
    item.addEventListener("mouseout", outMouse);
}
