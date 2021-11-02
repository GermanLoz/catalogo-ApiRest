let array = ' '
function obtenerProductos(){
    axios({
        method:'GET',
        url:'http://localhost/catalogo/model/peticiones/producto.php',
        responseType:'json'
    }).then( response => {
        AddDomProducts(response.data)
        return array = response.data 
    }).catch(error=>(
        console.log(error)
    ))
}

obtenerProductos()
