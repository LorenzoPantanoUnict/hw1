ApiRoute = './Api/ajaxGetInfo.php';
currentIndex = 0;
receivedJson = null;

function beforeImg(event) {
    if (receivedJson && receivedJson.length > 0) {
        currentIndex = (currentIndex - 1 + receivedJson.length) % receivedJson.length;
        renderImage();
    }
}

function nextImg(event) {
    if (receivedJson && receivedJson.length > 0) {
        currentIndex = (currentIndex + 1) % receivedJson.length;
        renderImage();
    }
}

function renderImage() {
    const img = document.querySelector(".food-img");
    img.src = receivedJson[currentIndex];
}

function onJson(json){
    console.log("Json received");
    console.log(json);
    receivedJson = json;
    
    const container = document.querySelector("#preferiti");
    container.innerHTML = ""; 
    //Creo l'album
    const album = document.createElement("div");
    album.classList.add("img-container");
    // Aggiungo bottone precedente
    const beforeButton = document.createElement('button');
    beforeButton.classList.add('beforeButton');
    beforeButton.textContent = '<';
    beforeButton.addEventListener('click', beforeImg);
    album.appendChild(beforeButton);
    //Aggiungo l'immagine
    const  img = document.createElement("img");
    img.classList.add("food-img");
    img.src = json[0];
    album.appendChild(img);
    // Aggiungo il next button
    const nextButton = document.createElement('button');
    nextButton.classList.add('nextButton');
    nextButton.textContent = '>';
    nextButton.addEventListener('click', nextImg);
    album.appendChild(nextButton);
    //Aggiungo l'album
    container.appendChild(album);
}



function onResponse(response) {
    console.log("Response received");
    if (!response.ok) {
        console.error("Eror: " + response.status);
    }else{
        return response.json();
    }

}

function chiudiPreferiti(event){
    event.currentTarget.addEventListener('click', mostraPreferiti);
    event.currentTarget.removeEventListener('click', chiudiPreferiti);
    const preferiti = document.querySelector('#preferiti');
    preferiti.innerHTML = '';
}

function mostraPreferiti(event){
    event.currentTarget.addEventListener('click', chiudiPreferiti);
    event.currentTarget.removeEventListener('click', mostraPreferiti);
    fetch(ApiRoute).then(onResponse).then(onJson);
    
    
}


preferiti = document.querySelector('#bottonePreferiti');
preferiti.addEventListener('click', mostraPreferiti);