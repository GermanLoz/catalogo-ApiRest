
/*  MOSTRAR FORM  */
const formBlock = (item) => {
    let elementStyle = window.getComputedStyle(item);
    let elementDisplay = elementStyle.getPropertyValue('display');
        if(elementDisplay == 'none'){
           return item.style.display = "block"
        }
        return item.style.display="none"
}

/*  ELIMINAR COMAS  */

        async function eliminarComas(){
            const div = await document.querySelector('.tabla')
            const divConComas = await document.querySelectorAll('.tabla')
            try{ 
                for(let item of divConComas){
                    let nodos = item.childNodes 
                        for ( let nodo of nodos ){
                            if(nodo.length){
                                div.removeChild(nodo)
                            }
                        }      
                }
            } catch(e){
                    return e
            }
        }