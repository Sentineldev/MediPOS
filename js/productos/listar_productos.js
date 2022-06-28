import { obtenerProductosPorPagina,obtenerCantidadProductos } from "../js/api_product.js";

const pagination_list = document.querySelector("#pagination-list")
const table_body = document.querySelector("#table-body")
const table_head = document.querySelector("#table-head")



async function actualizarNroPaginas(){
    
    let cant_productos = await obtenerCantidadProductos()
    cant_productos = Math.ceil(cant_productos.cantidad/5)
    let template = ``
    for(let i = 0;i<cant_productos;i++){
        template = template + `<li class="page-item"><a class="page-link" href="#">${i+1}</a></li>`
    }
    return template
}

function asignarEventoCarga(){
    const childs = pagination_list.childNodes
    childs.forEach((element,index) => {
        element.addEventListener("click",async (e)=>{
            e.preventDefault()
            await tablaProductos(index+1)
        })
    });
}




async function tablaProductos(pagina){
    table_head.innerHTML = 
    `
    <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Presentacion</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
    </tr>
    `

    let users = await obtenerProductosPorPagina(pagina)
    let template = ``
    users.forEach(element => {
        template = 
        template +
        `
        <tr>
            <td>${element.codigo_producto}</td>
            <td>${element.descripcion}</td>
            <td>${element.presentacion}</td>
            <td>${element.cantidad}</td>
            <td>${element.precio}</td>
        </tr>
        `
    });
    table_body.innerHTML = template

}

async function loadProducts(){
    pagination_list.innerHTML = await actualizarNroPaginas()
    await tablaProductos("1")
    asignarEventoCarga()

}


window.onload = loadProducts