import { obtenerLote,obtenerProducto } from "../js/api_product.js";


const find_button = document.querySelector("#find-button")
const form_container = document.querySelector("#form-container")
const lote_form = document.querySelector("#lote-form")
const card_container = document.querySelector("#card-container")

find_button.addEventListener("click",async()=>{
    const num_lote = document.querySelector("#num_lote").value
    form_container.onsubmit = e => e.preventDefault()
    let lote = await obtenerLote(num_lote)
    if(lote != null){
        lote_form.innerHTML = loteForm(lote)
        card_container.innerHTML = productForm(lote)
        const button_modify = document.querySelector("#button-modify")
        button_modify.addEventListener("click",()=>{
            form_container.submit()
        })
    }
    else{
        lote_form.innerHTML = ""
        card_container.innerHTML = productForm(null)
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
            <li class="list-group-item">Descripcion: ${lote.descripcion}</li>
            <li class="list-group-item">Presentacion: ${lote.presentacion}</li>
            <li class="list-group-item">Cantidad: ${lote.cantidad_lote}</li>
            <li class="list-group-item">Precio: ${lote.precio_lote}</li>
        </ul>
    </div>
    `
}



function loteForm(lote){
    return `
    <div class="col-md-4 w-100 mt-3 mb-2" id="usuario-container">
        <label for="cantidad" class="form-label m-0">Cantidad</label>
        <input value="${lote.cantidad_lote}" type="text" name="cantidad" id="cantidad" class="form-control p-2" required>
    </div> 
    <div class="col-md-4 w-100 mb-2" id="clave-container">
        <label for="precio" class="form-label m-0">Precio</label>
        <input value="${lote.precio_lote}" step="0.01" type="number" name="precio" id="precio" class="form-control p-2" required>
    </div>
    <div class="col-md-4 w-100 mb-2" id="clave-container">
        <label for="fecha_entrada" class="form-label m-0">Fecha de Entrada</label>
        <input value="${lote.fecha_entrada}" type="date"  name="fecha_entrada" id="fecha_entrada" class="form-control p-2" required>
    </div>
    <div class="d-flex gap-3 w-100">
        <div class="col-md-4 w-100 mb-2" id="clave-container">
            <label for="fecha_vencimiento" class="form-label m-0">Fecha de Vencimiento</label>
            <input value="${lote.fecha_vencimiento}" type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control p-2" required>
        </div>
    </div>
    <div id="button-container" class="">
        <button id="button-modify"class=" button btn  w-50 mt-4  p-2 border-0">Modificar Lote</button>
    </div>
    `
}

window.onload = (e)=>{
    const num_lote = document.querySelector("#num_lote").focus()
}