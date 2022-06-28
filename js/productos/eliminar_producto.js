import { obtenerProducto } from "../js/api_product.js";

const form_container = document.querySelector("#form-container")
const find_button = document.querySelector("#find-button")
const card_container = document.querySelector("#card-container")

find_button.addEventListener("click",async()=>{
    const codigo_producto = document.querySelector("#codigo_producto").value
    form_container.onsubmit = e => e.preventDefault()
    let producto = await obtenerProducto(codigo_producto)
    card_container.innerHTML = productForm(producto)
    if(producto != null){
        const button_delete = document.querySelector("#button-delete")
        button_delete.addEventListener("click",()=>{
            form_container.submit()
        })
    }
})



function productForm(producto){
    if(producto == null){
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
            <li class="list-group-item">Descripcion: ${producto.descripcion}</li>
            <li class="list-group-item">Presentacion: ${producto.presentacion}</li>
            <li class="list-group-item">Cantidad: ${producto.cantidad}</li>
            <li class="list-group-item">Precio: ${producto.precio}</li>
        </ul>
        <div class="card-body">
            <button id="button-delete" class="btn btn-danger w-100">Eliminar</button>
        </div>
    </div>
    `
}