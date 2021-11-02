
        const form = document.querySelector('.form')

        form.addEventListener('submit', (e) => {
                e.preventDefault()
                const formData = new FormData(form)
                axios({
                    method: 'POST',
                    url: 'http://localhost/catalogo/model/peticiones/user.php?action=login',
                    data: formData
                }).then( response => {
                    if(response.data === true){
                        alert('Inicio sesion exitosamente', '#3EA90F')
                        }
                    if(response.data === false){ 
                        alert('Contraseña o email invalido', '#E74707')
                    }
                }).catch( error => {
                    console.log(error)
                })
        })
