
const guardarProducto = (data, id) => {
    let url = ' '
    if(id){
        url = `http://localhost/catalogo/model/peticiones/producto.php?id=${id}`
    } else {
        url = `http://localhost/catalogo/model/peticiones/producto.php`    
    }
    axios({
        method:'POST',
        url: url ,
        responseType:'json',
        data:data
    }).then(response => {
        if(response.data == true ){ 
            alert('Se agrego exitosamente', '#3EA90F')
        } else {
            alert('Error al agregar', '#E74707')
        }
        addProdTable()
    }).catch(error=>(
        alert('Error al agregar', '#E74707')
    ))
}

const form = document.querySelector('#form')
const inpFile = document.getElementById('inpFile')

form ? 
form.addEventListener('submit', (e) => {
    e.preventDefault()
    const formData = new FormData(form)
    formData.append('inpFile', inpFile.files[0])
    guardarProducto(formData)
})
: ' '

/*  ELIMINAR    */  

const eliminar = (id) => {
    axios({
        method:'DELETE',
        url:`http://localhost/catalogo/model/peticiones/producto.php?id=${id}`,
        responseType:'json',
    }).then(response => {
        addProdTable()
        alert('Se elimino exitosamente', '#3EA90F')
    }).catch(error=>(
        alert('Error al eliminar', '#E74707')
    ))
}


function obtenerProductos(){
return axios({
        method:'GET',
        url:'http://localhost/catalogo/model/peticiones/producto.php',
        responseType:'json'
    }).then( response => {
        return response.data 
    }).catch(error=>(
        console.log(error)
    ))
}