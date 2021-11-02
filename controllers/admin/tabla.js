       const table = document.querySelector('.tabla')
        const addProdTable = () => {
        obtenerProductos()
        .then(array => {
            let items = []
            const titles = `
                            <div class="contenido-table" id="titles">
                                <div class="item"><p>Marca</p></div>
                                <div class="item"><p>Precio</p></div>
                                <div class="item"><p>Imagen</p></div>
                            </div>
                            ` 
            items.push(titles)
            array.map( item => {
                let contenido = 
                    `<div class="contenido-table">
                        <div class="item"><p>${item.nombre}</p></div>
                        <div class="item"><p>${item.precio}</p></div>
                        <div class="item"><img class="img" src='http://localhost/AENIMA/model/peticiones/uploads/images/${item.imagen}'/></div>
                        <div><button class="editar" onclick={editarProducto(${item.id})}><i class="far fa-edit"></i></button>
                        <button class="editar" onclick={eliminar(${item.id})} id="delete"><i class="fas fa-trash"></i></button></div>                        
                    </div>` 

                    items.push(contenido)

            })
            table.innerHTML = items
            eliminarComas()
        })
     }
     addProdTable()