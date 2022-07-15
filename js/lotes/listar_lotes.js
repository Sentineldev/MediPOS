import { obtenerLotesPorPagina ,obtenerCantidadLotes} from "../js/api_product.js";
const pagination_list = document.querySelector("#pagination-list")
const table_body = document.querySelector("#table-body")
const table_head = document.querySelector("#table-head")
async function actualizarNroPaginas(){
    
    let cant_lotes = await obtenerCantidadLotes()
    cant_lotes = Math.ceil(cant_lotes.cantidad/5)
    let template = ``
    for(let i = 0;i<cant_lotes;i++){
        template = template + `<li class="page-item"><a class="page-link" href="#">${i+1}</a></li>`
    }
    return template
}

function asignarEventoCarga(){
    const childs = pagination_list.childNodes
    childs.forEach((element,index) => {
        element.addEventListener("click",async (e)=>{
            e.preventDefault()
            await tablaUsuarios(index+1)
        })
    });
}


async function tablaLotes(pagina){
    table_head.innerHTML = 
    `
    <tr>
        <th scope="col">Nro Lote</th>
        <th scope="col">Cod Producto</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Fecha Entrada</th>
        <th scope="col">Fecha Vencimiento</th>
    </tr>
    `

    let lotes = await obtenerLotesPorPagina(pagina)
    let template = ``
    lotes.forEach(element => {
        template = 
        template +
        `
        <tr>
            <td>${element.numero_lote}</td>
            <td>${element.codigo_producto}</td>
            <td>${element.descripcion} ${element.presentacion}</td>
            <td>${element.cantidad_lote}</td>
            <td>${element.precio_lote}</td>
            <td>${element.fecha_entrada}</td>
            <td>${element.fecha_vencimiento}</td>
        </tr>
        `
    });
    table_body.innerHTML = template

}

async function loadLotes(){
    pagination_list.innerHTML = await actualizarNroPaginas()
    tablaLotes("1")
    asignarEventoCarga()

}


window.onload = loadLotes
