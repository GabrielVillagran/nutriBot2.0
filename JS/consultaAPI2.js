const form = document.querySelector('.form')
const recetarios = document.querySelector('.recetarios')

const APP_ID = 'd22ae923'
const APP_KEY = '732c0c142c23ebefb242a35d1ff382c3'

let inputValue = ''

const fetchData = async(query) => {
    const response = await fetch(
        `https://api.edamam.com/search?q=${query}&app_id=${APP_ID}&app_key=${APP_KEY}`
    )

    const data = await response.json()
    runAPIScripts(data.hits)
}

const runAPIScripts = (data) => {
    recetarios.innerHTML = ''
    data.map((recipe) => {
        generateDOM(recipe.recipe)
    })
}

const generateDOM = (recipe) => {
    const wrapper = document.createElement('div')

    const title = document.createElement('h1')
    title.textContent = recipe.label

    const calories = document.createElement('p')
    calories.textContent = `${Math.floor(recipe.calories)} calories`

    const listContainer = document.createElement('ul')

    recipe.ingredientLines.forEach((ingredient) => {
        const listItem = document.createElement('ol')
        listItem.textContent = ingredient
        listContainer.appendChild(listItem)
    })

    const image = document.createElement('img')
    image.setAttribute('src', recipe.image)
    image.classList.add('img')

    wrapper.appendChild(title)
    wrapper.appendChild(calories)
    wrapper.appendChild(listContainer)
    wrapper.appendChild(image)

    wrapper.classList.add('recipe')

    recetarios.appendChild(wrapper)
}


form.addEventListener('submit', (e) => {
    e.preventDefault()

    inputValue = e.target.searchInput.value
    fetchData(inputValue)
    e.target.searchInput.value = ''
})