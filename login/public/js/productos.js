
let productos = JSON.parse(localStorage.getItem('productos')) || [];
const enviar_datos = () => {
    let producto = document.getElementById("producto").value;
    let precio = document.getElementById("precio").value;

    if (!producto || !precio) {
        alert("El nombre del producto y el precio son obligatorios.");
        return;
    }

    productos.push([producto, precio]); 
    localStorage.setItem('productos', JSON.stringify(productos)); 
    mostrar_productos(); // Muestra los productos
    document.getElementById("producto").value = ''; 
    document.getElementById("precio").value = ''; 
}

// Función para mostrar los productos en la tabla
const mostrar_productos = () => {
    let contenido = '';
    productos.forEach((dato, index) => {
        contenido += `
        <tr>
            <th scope="row">${index + 1}</th>
            <td>${dato[0]}</td>
            <td>${dato[1]}</td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="editar_producto(${index})">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="eliminar_producto(${index})">Eliminar</button>
            </td>
        </tr>
        `;
    });
    document.getElementById("listado_productos").innerHTML = contenido;
}


const editar_producto = (index) => {
    let productoActual = productos[index][0];
    let precioActual = productos[index][1];

    let nuevoProducto = prompt("Ingresa el nuevo nombre del producto:", productoActual);
    let nuevoPrecio = prompt("Ingresa el nuevo precio del producto:", precioActual);

    if (nuevoProducto && nuevoPrecio) {
        productos[index] = [nuevoProducto, nuevoPrecio]; // Actualiza el producto
        localStorage.setItem('productos', JSON.stringify(productos)); // Actualiza en localStorage
        mostrar_productos(); // Muestra la lista actualizada
    } else {
        alert("El nombre del producto y el precio son obligatorios.");
    }
}

// Función para eliminar un producto
const eliminar_producto = (index) => {
    if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
        productos.splice(index, 1); // Elimina el producto
        localStorage.setItem('productos', JSON.stringify(productos)); // Actualiza localStorage
        mostrar_productos(); // Muestra la lista actualizada
    }
}

// Cargar productos al inicio
mostrar_productos();
document.getElementById("btn_agregar").addEventListener("click", () => {
    enviar_datos();
});
