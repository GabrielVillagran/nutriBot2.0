// Query selectors
const bttnMeal = document.getElementById('get_meal');
const meal_container = document.getElementById('meal');
const mealName = document.querySelector('[mealName]')
const mealArea = document.querySelector('[mealArea]')
const mealCategory = document.querySelector('[mealCategory]')
const mealTags = document.querySelector('[mealTags]')
const mealVideo = document.querySelector('[mealVideo]')


// evento que funcionara como event listener y hacer la consulta a la API
// para hacer uso de la api haemos uso de las promesas por medio del metodo fetch
//  programacion asincrona
bttnMeal.addEventListener('click', () => {
    fetch('https://www.themealdb.com/api/json/v1/1/random.php')
        .then(res => res.json())
        .then(res => {
            createMeal(res.meals[0]);
            console.log(res) //impresion de datos en pantalla para trabajar con ellos
        })
        .catch(e => {
            console.warn(e);
        });
});
//Funcion para realizar la creacion de las comidas y acomodar los datos obtenidos
const createMeal = meal => {
        // arreglo que almacenara los ingredientes
        const ingredients = [];
        // obtencion de los primeros 20 ingredientes
        for (let i = 1; i <= 20; i++) {
            if (meal[`strIngredient${i}`]) {
                // agrega ingredientes al arreglo
                ingredients.push(
                        `${meal[`strIngredient${i}`]} - ${meal[`strMeasure${i}`]}`
        );
    } else {
        // sale del ciclo en caso de que no se encuentren ingredientes
        break;
    }
}

// Nombre de platillo
let recipe = meal.strMeal;
console.log(recipe)
mealName.textContent = meal.strMeal;
// Area o pais del platillo
console.log(meal.strArea)
mealArea.textContent = meal.strArea;
// category del platillo
console.log(meal.strCategory)
mealCategory.textContent = meal.strCategory;
// Tags del platillo
console.log(meal.strTags)
mealTags.textContent = meal.strTags;
// youtube o video del platillo
console.log(meal.strYoutube)
mealVideo.textContent = meal.strYoutube;
// cambiar imagen
let mealImage = meal.strMealThumb;
mealImg(mealImage);
// 
// 
// informacion nutrimental
const form = document.querySelector('.form') //query selector para el form
const recipes = document.querySelector('.recipes')
// llaves para el uso de la api
const APP_ID = 'd22ae923' // Refer Readme.md
const APP_KEY = '732c0c142c23ebefb242a35d1ff382c3' // Refer Readme.md
// valor que me recibe el nombre de la receta obtenida
let inputValue = recipe
// funcion para realizar la consulta a la API
const fetchData = async(query) => {
    const response = await fetch(
        `https://api.edamam.com/search?q=${query}&app_id=${APP_ID}&app_key=${APP_KEY}`
    )

    const data = await response.json()
    runAPIScripts(data.hits)
}

const runAPIScripts = (data) => {
    recipes.innerHTML = ''
    data.map((recipe) => {
        generateDOM(recipe.recipe)
    })
}

const generateDOM = (recipe) => {
    // creacion de div
    const wrapper = document.createElement('div')
    // creacion de titule
    const title = document.createElement('h1')
    title.textContent = recipe.label
    // creacion de parrafo para calorias
    const calories = document.createElement('p')
    calories.textContent = `${Math.floor(recipe.calories)} calories`
    // lista de ingredientes
    const listContainer = document.createElement('ul')
    recipe.ingredientLines.forEach((ingredient) => {
        const listItem = document.createElement('ol')
        listItem.textContent = ingredient
        listContainer.appendChild(listItem)
    })
// imagen a mostrar
    const image = document.createElement('img')
    image.setAttribute('src', recipe.image)
    image.classList.add('img')
// mostrar los elementos
    wrapper.appendChild(title)
    wrapper.appendChild(calories)
    wrapper.appendChild(listContainer)
    wrapper.appendChild(image)
// fondo blanco de las recetas
    wrapper.classList.add('recipe')

    recipes.appendChild(wrapper)
}
// llamado para realizar la peticion de buscar en la API de edamamm (nutricion)
fetchData(inputValue)

form.addEventListener('submit', (e) => {
    e.preventDefault()

    inputValue = e.target.searchInput.value
    fetchData(inputValue)
    e.target.searchInput.value = ''
})
};
// cambiar imagen de platillo
const mealImg = (url) => {
    const mealImg = document.getElementById("mealImg")
    mealImg.src = url;
}
// https://www.florin-pop.com/blog/2019/09/random-meal-generator/
// https://github.com/abishekh07/recipe-app