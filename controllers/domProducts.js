const root = document.getElementById("catalogo")

const AddDomProducts = (data) => {
    data.map( item => {
        const divContainer = document.createElement("div")
        addClassOrRemove(divContainer, 'card', 'add')
        //divContainer.classList.add('card')
        Append(root, divContainer)
        const divItem = document.createElement('div')
        rellenarImg(divItem, item.imagen, "img")
        addClassOrRemove(divItem, 'title-img-content', 'remove')
       // divItem.classList.add('title-img-content')
        Append(divContainer,divItem)
        const divItemTwo = document.createElement('div')
        rellenarDiv(divItemTwo, item.nombre, "h3")
        rellenarDiv(divItemTwo, '$' + item.precio, "p")
        Append(divContainer,divItemTwo)
        addClassOrRemove(divItemTwo, 'text-content', 'add')
        //divItemTwo.classList.add('text-content')
    })
}
const Append = (parent, child) => {
        parent.appendChild(child)
}

const removeItem = (parent, child) => {
        parent.removeChild(child)
}
const rellenarImg = (item, date, etiqueta) => {
    const div = item
    let element = document.createElement(`${etiqueta}`)
    div.appendChild(element)
    element.setAttribute('src', `http://localhost/catalogo/model/peticiones/uploads/images/${date}`)
}

const rellenarDiv = (item, date, etiqueta) => {
    const div = item
    let element = document.createElement(`${etiqueta}`)
    div.appendChild(element)
    let nodo = document.createTextNode(date)
    element.appendChild(nodo)
    if(etiqueta === 'p'){
        addClassOrRemove(element, 'praice', 'add')
        ///element.classList.add('praice') 
    }
}

const addClassOrRemove = (element, style, metod) => {
    if(metod === 'add'){
        return element.classList.add(`${style}`)
    }
    return element.classList.remove(`${style}`)
}