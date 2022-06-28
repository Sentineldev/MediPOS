
import { obtenerLote,obtenerProducto } from "../js/api_product.js";

const find_button = document.querySelector("#find-button")
const form_container = document.querySelector("#form-container")
const card_container = document.querySelector("#card-container")



find_button.addEventListener("click",async()=>{
    const num_lote = document.querySelector("#num_lote").value
    form_container.onsubmit = e => e.preventDefault()
    let lote = await obtenerLote(num_lote)
    card_container.innerHTML = productForm(lote)
    if(lote != null){
        const button_delete = document.querySelector("#button-delete")
        button_delete.addEventListener("click",()=>{
            form_container.submit()
        })
    }
})



function productForm(lote){
    if(lote == null){
        return `
        <div class="  alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El producto no existe!
        </div>
        `
    }
    return `
    <div class="card border-0" style="width: 24rem;">
        <img src="../Imagenes/product-svgrepo-com.svg" width=64 height=64 class=" card-img-top bg-dark" alt="...">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Codigo del Producto: ${lote.codigo_producto}</li>
            <li class="list-group-item">Numero de Lote: ${lote.numero_lote}</li>
            <li class="list-group-item">Descripcion: ${lote.descripcion}</li>
            <li class="list-group-item">Presentacion: ${lote.presentacion}</li>
            <li class="list-group-item">Cantidad: ${lote.cantidad}</li>
            <li class="list-group-item">Precio: ${lote.precio}</li>
            <li class="list-group-item">Fecha de Entrada: ${lote.fecha_entrada}</li>
            <li class="list-group-item">Fecha de Vencimiento: ${lote.fecha_vencimiento}</li>
        </ul>
        <div class="card-body">
            <button id="button-delete" class="btn btn-danger w-100">Eliminar</button>
        </div>
    </div>
    `
}