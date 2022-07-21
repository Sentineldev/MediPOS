import {Modal} from "/MediPOS/boostrap/js/bootstrap.esm.js"

//Modals de la tabla de metodos de pago


let modal_payment_method = null





//Modals de la tabla producto
let opt_modal  = null
let delete_product_modal  = null
let edit_product_modal  = null



function  removeBackdrop(){
    const backdrops = document.getElementsByClassName('modal-backdrop')
    const backdrops_array = Array.prototype.slice.call(backdrops)
    backdrops_array.forEach(element => {
        document.body.removeChild(element)
    });
}




//Metodos de pago Modal


function paymentMethodModal(){
    return `
    <div class="modal" id="modal-payment-method" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Metodo de Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="model-form" method="POST">
                        <div class="mb-3">
                            <select id="select-type-payment" class="form-select" aria-label="Default select example">
                                <option selected>Tipo de Pago</option>
                                <option value="1">Banco de Venezuela - Debito</option>
                                <option value="2">Banco de Venezuela - Credito</option>
                                <option value="3">Solo - Efectivo</option>
                                <option value="5">Otros - Debito</option>
                                <option value="6">Otros - Credito</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label style="color:black !important;" for="recipient-name" class="col-form-label">Monto</label>
                            <input  type="text" class="form-control" id="amount-input">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="form-btn-close-modal" type="button" class="btn btn-secondary" >Cerrar</button>
                    <button id="form-btn-add-payment"   type="button" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    
    `
}


export async function showPaymentMethodModal(){
    document.body.insertAdjacentHTML("afterbegin",paymentMethodModal())
    modal_payment_method = new Modal("#modal-payment-method",{
        keyboard:false,
        focus:false,
        backdrop:true
    })
    
    
    await modal_payment_method.show()
    const form = document.querySelector("#model-form")
    form.onsubmit = e => e.preventDefault()

}

export async function HidePaymentMethodModal(){
    const modal = document.querySelector("#modal-payment-method")
    await modal_payment_method.hide()
    removeBackdrop()
    document.body.removeChild(modal)
}




//Modals de la tabla producto

function optModal(){
    return `
    <div class="modal" id="option-modal"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Seleccione una opcion</h5>
                </div>
                <div class="modal-footer">
                    <button id="opt-exit"   type="button" class="btn btn-secondary">Salir</button>
                    <button id="edit-opt"   type="button" class="btn btn-primary">Modificar</button>
                    <button id="delete-opt" type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    `
}

function DelProductModal(){
    return `
    <div class="modal" id="delete-product-modal"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Esta seguro que desea eliminar?</h5>
                </div>
                <div class="modal-footer">
                    <button id="delete-product-cancel" type="button" class="btn btn-secondary">Cancelar</button>
                    <button id="delete-product-confirm"   type="button" class="btn btn-danger">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    `
}

function EditProductModal(){
    return `
    <div class="modal" id="edit-product-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Cantidad</h5>
                </div>
                <div class="modal-body">
                    <form id="model-form" method="POST">
                        <div class="mb-3">
                            <label style="color:black !important;" for="recipient-name" class="col-form-label">Cantidad</label>
                            <input  type="text" class="form-control" id="product-amount">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="edit-product-cancel" type="button" class="btn btn-secondary"    >Cerrar</button>
                    <button id="edit-product-confirm"   type="button" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    
    `
}

//Modal de opciones de producto

export async function showOptModal(){
    document.body.insertAdjacentHTML('afterbegin',optModal())
    opt_modal = new Modal("#option-modal",{
        keyboard:false,
        focus:false,
        backdrop:true
    })
    await opt_modal.show()
    
}
export async function HideOptModal(){
    const modal = document.querySelector("#option-modal")
    await opt_modal.hide()
    removeBackdrop()
    document.body.removeChild(modal)
}
//Modal para confirmar eliminacion del producto

export async function showDelProductModal(){
    document.body.insertAdjacentHTML("afterbegin",DelProductModal())
    delete_product_modal = new Modal("#delete-product-modal",{
        keyboard:false,
        focus:false,
        backdrop:true
    })
    await delete_product_modal.show()
}
export async  function HideDelProductModal(){
    const modal = document.querySelector("#delete-product-modal")
    await delete_product_modal.hide()
    removeBackdrop()
    document.body.removeChild(modal)
}

//Modal para modificar la cantidad

export async function showEditProductModal(){
    document.body.insertAdjacentHTML("afterbegin",EditProductModal())
    edit_product_modal = new Modal("#edit-product-modal",{
        keyboard:false,
        backdrop:false,
        focus:false
    })
    await edit_product_modal.show()
    const form = document.querySelector("#model-form")
    form.onsubmit = e => e.preventDefault()
}
export async function HideEditProductModal(){
    const modal = document.querySelector("#edit-product-modal")
    await edit_product_modal.hide()
    removeBackdrop()
    document.body.removeChild(modal)
}  

