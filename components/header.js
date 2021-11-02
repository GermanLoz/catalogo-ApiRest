const header = document.querySelector('#header')

let content = `
        <nav class="nav">
            <button class="button-nav"><i class="fas fa-align-right"></i></button>
            <ul class="nav-ul">
                <li class="li"><a id="Home" href="index.html">HOME</a></li>
                <li class="li"><a id="Admin" href="admin.php">ADMIN</a></li>
                <li class="li"><a id="Products" href="products.html">PRODUCTOS</a></li>
            </ul>
        </nav>`

header.innerHTML = content