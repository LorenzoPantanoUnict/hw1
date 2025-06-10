function onResponse(response) {
    console.log("Response received");
    if (!response.ok) {
        console.error("Eror: " + response.status);
    }else{
        return response.json();
    }
}

function showLoading() {
    const container = document.querySelector("#container");
    container.innerHTML = '';

    const food = document.createElement("div");
    food.classList.add("img-container");
    food.textContent = "Caricamento...";
    container.appendChild(food);
}

function onLoadAppend(container, img) {
    container.textContent = ''; 
    container.appendChild(img); 
}

function onJson(json) {
    const container = document.querySelector("#container");
    container.innerHTML = '';

    const food = document.createElement("div");
    food.classList.add("img-container");

    const img = new Image();
    img.alt = "Food Image";

    img.onload = function() {
    onLoadAppend(food, img);
    };

    img.src = json.image;

    container.appendChild(food);
}




function onLike(){
    showLoading();
    fetch("./Api/ajaxFoodImages.php").then(onResponse).then(onJson);
    fetch("./Api/ajaxInsertFood.php");
}

function onDislike(){
    showLoading();
    fetch("./Api/ajaxFoodImages.php").then(onResponse).then(onJson);
}

fetch('./Api/ajaxFoodImages.php').then(onResponse).then(onJson);

let likeButton = document.querySelector('#like');
let dislikeButton = document.querySelector('#dislike');

likeButton.addEventListener('click', onLike);
dislikeButton.addEventListener('click', onDislike);