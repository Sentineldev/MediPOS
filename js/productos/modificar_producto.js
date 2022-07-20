import { obtenerProducto } from "../js/api_product.js";
import { checkIfInteger,checkIfString } from "../js/utils.js";
const input_container = document.querySelector("#input-container")
const find_button = document.querySelector("#find-button")
const form_container = document.querySelector("#form-container")

find_button.addEventListener("click",async()=>{
    form_container.onsubmit = e => e.preventDefault()
    const codigo_producto = document.querySelector("#codigo_producto").value
    let product = await obtenerProducto(codigo_producto)
    input_container.innerHTML = productForm(product)
    if(product != null){
        const button_modify = document.querySelector("#button-modify")
        button_modify.addEventListener("click",()=>{
            const cantidad = document.querySelector("#cantidad")
            const precio = document.querySelector("#precio")
            if(cantidad.value != ""){
                if(precio.value != ""){
                    form_container.submit()
                }
                else{
                    alert("Ingrese solo numero en el precio!")
                }

            }
            else{
                alert("Ingrese solo enteros en la cantidad!")
            }
        })
    }
})






function productForm(product){
    if(product == null){
        return `
        <div class=" alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El producto no se encuentra registrado!
        </div>
        `
    }
    return `
    <div class="col-md-4" id="usuario-container"> 
        <label for="descripcion" class="form-label m-1 ">Descripcion</label>
        <input maxlength="128" value="${product.descripcion}" type="text" name="descripcion" id="descripcion" class="form-control p-2" required>
    </div>
    <div class="col-md-4" id="usuario-container"> 
        <label for="presentacion" class="form-label m-1 ">Presentacion</label>
        <input maxlength="64" value="${product.presentacion}" type="text" name="presentacion" id="presentacion" class="form-control p-2" required>
    </div>
    <div class="col-md-4" id="usuario-container"> 
        <label for="cantidad" class="form-label m-1 ">Cantidad</label>
        <input value="${product.cantidad}" type="number" name="cantidad" id="cantidad" class="form-control p-2" required>
    </div>
    <div class="col-md-4" id="usuario-container"> 
        <label for="precio" class="form-label m-1 ">Precio</label>
        <input value="${product.precio}" type="number" step="0.0001" name="precio" id="precio" class="form-control p-2" required>
    </div>
    <div id="button-container" class="">
        <button id="button-modify"class=" button btn w-25  mt-4 m-1  p-2 border-0">Modificar Producto</button>
    </div>
    `
}


window.onload = (e)=>{
    const codigo_producto = document.querySelector("#codigo_producto").focus()
}