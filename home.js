const urlRicercaPerNome = 'Api/ajaxSearch.php?q=';

function clearResults() {
    infoContainer.innerHTML = '';
}

function showError(message) {
    clearResults(); // prima pulisco eventuali contenuti
    const p = document.createElement('p');
    p.textContent = message;
    infoContainer.appendChild(p);
}

function renderMeals(meals) {
    clearResults();

    for(const meal of meals){
        const div = document.createElement('div');
        div.classList.add('meal');

        // Titolo
        const title = document.createElement('h2');
        title.textContent = meal.strMeal;
        title.classList.add('recipe-title');

        // Immagine
        const img = document.createElement('img');
        img.classList.add('recipe-img');
        img.src = meal.strMealThumb;
        img.alt = meal.strMeal;
        img.width = 250;

        // Categoria e descrizione
        const category = document.createElement('p');
        category.classList.add('recipe-category');

        const strong = document.createElement('strong');
        strong.textContent = 'Categoria: ';

        const span = document.createElement('span');
        span.classList.add('recipe-strCategory');
        span.textContent = meal.strCategory;

        category.appendChild(strong);
        category.appendChild(span);

        

        // Istruzioni 
        const instructions = document.createElement('p');
        instructions.classList.add('recipe-description');
        instructions.textContent = meal.strInstructions

        // Aggiungo tutto al contenitore
        div.appendChild(title);
        div.appendChild(img);
        div.appendChild(category);
        div.appendChild(instructions);

        infoContainer.appendChild(div);
    }
}


function onResponse(response) {
    console.log("Response received");
    if (!response.ok) {
        console.error("Eror: " + response.status);
    }else{
        return response.json();
    }
}

function onJson(json) {
    if (json.meals && json.meals.length > 0) {
        renderMeals(json.meals);
    } else {
        showError('Nessuna ricetta trovata.');
    }
}

function getInfo(event) {
    event.preventDefault();

    const query = document.querySelector('#search-bar').value.trim();
    if (query === '') {
        showError('Per favore inserisci un termine di ricerca.');
        return;
    }

    fetch(urlRicercaPerNome + encodeURIComponent(query)).then(onResponse).then(onJson);
}

const form = document.querySelector('#search-form');
const infoContainer = document.querySelector('#info-container');

form.addEventListener('submit', getInfo);