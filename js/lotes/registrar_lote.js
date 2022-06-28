import { obtenerProducto } from "../js/api_product.js";

const form_container = document.querySelector("#form-container")
const find_button = document.querySelector("#find-button")
const lote_form = document.querySelector("#lote-form")
const card_container = document.querySelector("#card-container")

find_button.addEventListener("click",async()=>{
    const codigo_producto = document.querySelector("#codigo_producto").value
    form_container.onsubmit = e => e.preventDefault()
    let producto = await obtenerProducto(codigo_producto)
    card_container.innerHTML = productForm(producto)
    if(producto != null){
        lote_form.innerHTML = loteForm()
        const button_register = document.querySelector("#button-register")
        button_register.addEventListener("click",()=>{
            form_container.submit()
        })
    }
    else{
        lote_form.innerHTML = ""
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
            <li class="list-group-item">Codigo del Producto: ${producto.codigo_producto}</li>
            <li class="list-group-item">Descripcion: ${producto.descripcion}</li>
            <li class="list-group-item">Presentacion: ${producto.presentacion}</li>
            <li class="list-group-item">Cantidad: ${producto.cantidad}</li>
            <li class="list-group-item">Precio: ${producto.precio}</li>
        </ul>
    </div>
    `
}

function loteForm(){
    return `
    <div class="col-md-4 w-100 mt-3 mb-2" id="usuario-container">
        <label for="num_lote" class="form-label m-0">Numero de Lote</label>
        <input type="text" name="num_lote" id="num_lote" class="form-control p-2" required>
    </div>
    <div class="col-md-4 w-100 mb-2" id="clave-container">
        <label for="cantidad" class="form-label m-0">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" class="form-control p-2" required>
    </div>
    <div class="col-md-4 w-100 mb-2" id="clave-container">
        <label for="precio" class="form-label m-0">Precio</label>
        <input type="number" step="0.01"name="precio" id="precio" class="form-control p-2" required>
    </div>
    <div class="d-flex gap-3 w-50">
        <div class="col-md-4 w-100 mb-2" id="clave-container">
            <label for="fecha_entrada" class="form-label m-0">Fecha de Entrada</label>
            <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control p-2" required>
        </div>
        <div class="col-md-4 w-100 mb-2" id="clave-container">
            <label for="fecha_vencimiento" class="form-label m-0">Fecha de Vencimiento</label>
            <input type="date"name="fecha_vencimiento" id="fecha_vencimiento" class="form-control p-2" required>
        </div>
        
    </div>
    <div id="button-container" class="">
        <button id="button-register"class=" button btn  w-50 mt-4  p-2 border-0">Registrar Lote</button>
    </div>
    `
}