
    const clearDom = () => {
        while(root.firstChild){
            root.removeChild(root.firstChild);
        }
    }
    
    const margeSort = (array, signo) => {
        if(array.length <= 1){
            return array
        } else { 
                let number = array.length / 2
                let arrayOne = array.slice(0, number)
                let arrayTwo = array.slice(number, array.length)
                let left = margeSort(arrayOne)
                let rigth = margeSort(arrayTwo)
                return marge(left, rigth, signo)
            }
        }

     const marge = (arrayOne, arrayTwo, signo) => {
         let result = []
            while(arrayOne.length && arrayTwo.length){
        let ultimo
        if (arrayOne[0] > arrayTwo[0]) {
            ultimo = arrayOne.shift();
        } else {
            ultimo = arrayTwo.shift();
        }
        result.push(ultimo)
    }
        result = result.concat(arrayOne).concat(arrayTwo);
        return result
     }
    
    select ? 
    select.addEventListener('change', (e) => {
        const option = e.target.value
        if(option > 0 ){
            const newArray = array.filter(item => item.categoria_id === option)
            clearDom()
            AddDomProducts(newArray)
        } else {
            if(option === 'todos'){
                clearDom()
                AddDomProducts(array)
            }
            if(option === 'mayor precio'){
                let arrayId = []
                array.map( item => ( 
                    arrayId.push(Number(item.precio))
                ))
                const arrayOrdenado = margeSort(arrayId)
                let arrayMayorPrecio = []
                arrayOrdenado.map( praice => {
                    let filtrado = array.filter( item => praice == Number(item.precio))
                    return arrayMayorPrecio.push(filtrado[0])
                })
                clearDom()
                AddDomProducts(arrayMayorPrecio)
            }
            if(option === 'menor precio'){
                let arrayId = []
                array.map( item => { 
                    arrayId.push(Number(item.precio))
                })
                const arrayOrdenado = margeSort(arrayId).reverse()
                let arrayMenorPrecio = []
                arrayOrdenado.map( praice => {
                    let filtrado = array.filter( item => praice == Number(item.precio))
                    return arrayMenorPrecio.push(filtrado[0])
                })
                clearDom()
                AddDomProducts(arrayMenorPrecio)
            }
        }
    }) 
    : ' '