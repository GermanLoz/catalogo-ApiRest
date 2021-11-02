        const buttonAdd = document.querySelector('.add-producto')
        let test = false

        buttonAdd.addEventListener('click', () => {
            if(test === false){
                buttonAdd.innerHTML = "Cerrar formulario"
                test = true
                return form.style.display = "block"
            }
                test = false
                buttonAdd.innerHTML = "Agregar producto"
            return form.style.display = "none"
        })

        const clearDom = () => {
            while(table.firstChild){
                table.removeChild(table.firstChild);
            }
        }

        /*FORM EDIT*/
        const formEdit = document.getElementById('formEdit')
        const editarProducto = (id) => {
        formBlock(formEdit) 
        formEdit.addEventListener('submit', (e) => {
                e.preventDefault()
                const formData = new FormData(formEdit)
                formData.append('inpFile', inpFile.files[0])
                formBlock(formEdit) 
                guardarProducto(formData, id)
            })
        }

        /*  CLOSE FORM   */
        const buttonClose = document.querySelector('.close-form')
        buttonClose.addEventListener('click', (e) => {
            e.preventDefault()
            formBlock(formEdit) 
        }) 