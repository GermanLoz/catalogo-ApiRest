        const mensaje = document.getElementById("mensaje")
        const childMensaje = document.querySelector('.mensaje-p')

        const alert = (text, color) => {
            mensaje.classList.remove('none')
            mensaje.classList.add('mensaje')
            mensaje.style.background = `${color}`
            childMensaje.innerHTML = `${text}`
            setTimeout(() => {
                childMensaje.innerHTML = ''
                mensaje.classList.add('none')
                mensaje.classList.remove('mensaje')            
            }, 2000);
        }