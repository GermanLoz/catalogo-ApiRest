

const guardarProducto = (data, id) => {
    const url = ' '
    if(id){
        const url = `http://localhost/catalogo/model/peticiones/producto.php?id=${id}`
    } else {
        const url = `http://localhost/catalogo/model/peticiones/producto.php`    
    }
    axios({
        method:'POST',
        url: url ,
        responseType:'json',
        data:data
    }).then(response=>{
    }).catch(error=>(
        console.log(error)
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
        url:`http://localhost/AENIMA/model/peticiones/producto.php?id=${id}`,
        responseType:'json',
    }).then(response=>{
        console.log(response.data)
    }).catch(error=>(
        console.log(error)
    ))
}

