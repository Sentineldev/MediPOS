
import { 
obtenerProducto
 } from "/MediPOS/js/api_product.js";
import { 
    load_amount_data_container,
    product_table_item,
    factura_container,
    load_product_table,
    load_payment_table,
    payment_table_item
} from "/MediPOS/js/factura/tables.js";

import { 
    showOptModal,
    HideOptModal,
    showDelProductModal,
    HideDelProductModal,
    showEditProductModal,
    HideEditProductModal,
    showPaymentMethodModal,
    HidePaymentMethodModal
} from "/MediPOS/js/factura/modals.js";

import {guardarFactura} from "/MediPOS/js/factura/api_factura.js"




let products = []

let factura_info = {
    total: 0,
    restante:0,
    cancelado:0,
    products:[],
    pagos:[]
}

let pagos = []






async function ImprimirHnadler(){
    const factura = JSON.parse(localStorage.getItem("factura"))
    if(factura.factura_info.restante == 0){
        if(factura.factura_info.products.length != 0){
            let request = await guardarFactura(factura)    
            if(request.status === 200){
                request = await request.json()
                localStorage.clear()
                alert("Facturacion exitosa! :D")
                window.location.reload()
            }
        }
        else{
            alert("No se puede imprimir si no hay productos!")
        }
    }
    else{
        alert("No se puede imprimir sin haber cancelado!")
    }
}

function fact_opciones(){
    update_localStorage()
    const contenedor = document.querySelector("#fact-opciones")

    

    contenedor.insertAdjacentHTML("afterbegin",`

    <li class="nav-item dropdown">
        <a id="imprimir-factura" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Imprimir
        </a>
    </li>

    `)

    const imprimir_factura = document.querySelector("#imprimir-factura")
    imprimir_factura.addEventListener("click",ImprimirHnadler)
}
//cargar componentes para facturars
export function load_components(){
    fact_opciones()
    const middle_content = document.querySelector("#middle-content")
    middle_content.innerHTML = ""
    middle_content.innerHTML = factura_container()
    const primary_column = document.querySelector("#primary-column")
    const table_payment = document.querySelector("#table-payment")
    const amount_container = document.querySelector("#amount-container")


    primary_column.innerHTML = load_product_table()
    table_payment.innerHTML = load_payment_table()
    amount_container.innerHTML = load_amount_data_container(null)

    const form = document.querySelector("#product-table-form")
    form.onsubmit = add_item_to_product_table


    const form_button_add_payment = document.querySelector("#btn-add-payment")

    form_button_add_payment.addEventListener("click",AddPaymentHandler)
}





//funciones pra los metodos de pago


async function AddPaymentHandler(){
    
    await showPaymentMethodModal()

    const form_button_add_payment = document.querySelector("#form-btn-add-payment")
    const form_btn_close_modal = document.querySelector("#form-btn-close-modal")

    form_btn_close_modal.addEventListener("click",async ()=> await HidePaymentMethodModal())


    form_button_add_payment.addEventListener('click',async()=>{
        const select_type_payment=document.querySelector("#select-type-payment")
        const amount_input  = document.querySelector("#amount-input")

        
        if(select_type_payment.value == "Tipo de Pago"){
            alert("Error ingrese el tipo de pago")
        }
        else if(Number.isNaN(Number(amount_input.value)) == true){
            alert("Ingrese solo numeros!")
        }
        else if(Number(amount_input.value) > Number(factura_info.restante)){
            alert("Error el monto recibido no puede ser mayor que el restante!")
        }
        else{
            let pago = {
                nombre_tipo_pago:select_type_payment.options[select_type_payment.selectedIndex].text,   
                tipo_pago:Number(select_type_payment.value),
                monto:Number(amount_input.value)

            }
            pagos.push(pago)
            factura_info.cancelado+=Number(pago.monto)
            factura_info.cancelado = Number(factura_info.cancelado.toFixed(2))
            factura_info.restante=(Number(factura_info.total) - Number(factura_info.cancelado))
            factura_info.restante = Number(factura_info.restante.toFixed(2))
            factura_info.pagos = pagos
            render_payment_table()
            render_amount_container(factura_info)
            update_localStorage()
            await HidePaymentMethodModal()
        }
        
    })
    

}


function render_payment_table(){
    let render_array = pagos.map(element =>{
        return payment_table_item(element)
    })
    const payment_data_table = document.querySelector("#payment-data-table")
    payment_data_table.innerHTML = render_array.join(" ")

    const container  = Array.prototype.slice.call(payment_data_table.children)

    container.forEach((element,index) => {
        element.addEventListener("click",async()=>{
            await showOptModal()
            const opt_exit = document.querySelector("#opt-exit")
            opt_exit.addEventListener("click",async ()=> HideOptModal())

            const delete_opt = document.querySelector("#delete-opt")

            delete_opt.addEventListener("click",async()=>{
                await HideOptModal()
                await showDelProductModal()
                const delete_product_cancel = document.querySelector("#delete-product-cancel")
                const delete_product_confirm  = document.querySelector("#delete-product-confirm")

                delete_product_cancel.addEventListener("click",async()=>HideDelProductModal())

                delete_product_confirm.addEventListener("click",async()=>{
                    const payment = pagos.splice(index,1)
                    factura_info.cancelado-=Number(payment[0].monto)
                    factura_info.cancelado = Number(factura_info.cancelado.toFixed(2))
                    factura_info.restante = (Number(factura_info.total) - Number(factura_info.cancelado))
                    factura_info.restante = Number(factura_info.restante.toFixed(2))
                    factura_info.pagos = pagos
                    render_payment_table()
                    render_amount_container()
                    update_localStorage()
                    await HideDelProductModal()
                    
                })
            })
            const edit_opt = document.querySelector("#edit-opt")

            edit_opt.addEventListener("click",async()=>{
                await HideOptModal()
                await showEditProductModal()
                const product_amount = document.querySelector("#product-amount")
                product_amount.value = pagos[index].monto

                const edit_product_cancel = document.querySelector("#edit-product-cancel")
                const edit_product_confirm = document.querySelector("#edit-product-confirm")

                edit_product_cancel.addEventListener("click",async()=>HideEditProductModal())
                
                edit_product_confirm.addEventListener("click",async()=>{
                    let initial_price = Number(pagos[index].monto)
                    let final_price = Number(initial_price)-Number(product_amount.value)
                    pagos[index].monto = Number(product_amount.value)
                    factura_info.cancelado -= Number(final_price) 
                    factura_info.cancelado = Number(factura_info.cancelado.toFixed(2))
                    factura_info.restante =Number(factura_info.total) - Number(factura_info.cancelado)
                    factura_info.restante = Number(factura_info.restante.toFixed(2))
                    factura_info.pagos = pagos

                    render_payment_table()
                    render_amount_container()
                    update_localStorage()

                    await HideEditProductModal()
                    

                })
            })

        })
    });


}




//funciones para los productos
async function add_item_to_product_table(e){
    e.preventDefault()
        const codigo_producto = document.querySelector("#codigo_producto")
        
        const product = await obtenerProducto(codigo_producto.value)
        const result = search_product(product)
        if(result == -1){
            product.cantidad = 1
            products.push(product)
        }
        else{
            products[result].cantidad++ 
        }

        factura_info.total+=Number(product.precio)
        factura_info.total = Number(factura_info.total.toFixed(2))
        factura_info.restante=(Number(factura_info.total) - Number(factura_info.cancelado))
        factura_info.restante = Number(factura_info.restante.toFixed(2))
        factura_info.products = products
        render_table()
        render_amount_container(factura_info)

        update_localStorage()

        codigo_producto.value = ""
        console.log(factura_info.total)
}


function render_table(){
    const product_table_data = document.querySelector("#product_table_data")
    product_table_data.innerHTML = ""
    let render_array = products.map( element =>{ 
        return product_table_item(element,element.cantidad).replace(/\n/g, '')
    })
    product_table_data.innerHTML = render_array.join('')
    
    const containers = Array.prototype.slice.call(product_table_data.children)

    containers.forEach((element,index) => {
        element.addEventListener("click",async()=>{
            await showOptModal()
            const opt_exit = document.querySelector("#opt-exit")
            opt_exit.addEventListener("click",async()=> await HideOptModal())
            const delete_opt = document.querySelector("#delete-opt")
            delete_opt.addEventListener("click",async()=>{
                await HideOptModal()
                await showDelProductModal()
                const delete_product_cancel = document.querySelector("#delete-product-cancel")
                const delete_product_confirm = document.querySelector("#delete-product-confirm")

                delete_product_cancel.addEventListener("click",()=>{HideDelProductModal()})

                delete_product_confirm.addEventListener("click",async()=>{
                    const product = products.splice(index,1)
                    factura_info.total-= product[0].precio * product[0].cantidad
                    factura_info.total = Number(factura_info.total.toFixed(2))
                    factura_info.restante=(Number(factura_info.total) - Number(factura_info.cancelado))
                    factura_info.restante = Number(factura_info.restante.toFixed(2))
                    factura_info.products = products
                    render_table()
                    render_amount_container()
                    update_localStorage()
                    await HideDelProductModal()
                })
            })
            
            const edit_opt = document.querySelector("#edit-opt")
            edit_opt.addEventListener("click",async()=>{
                await HideOptModal()
                await showEditProductModal()
                const product_amount = document.querySelector("#product-amount")
                product_amount.value = products[index].cantidad
                const edit_product_cancel = document.querySelector("#edit-product-cancel")
                const edit_product_confirm = document.querySelector("#edit-product-confirm")
                edit_product_cancel.addEventListener("click",async()=> await HideEditProductModal())
                
                edit_product_confirm.addEventListener("click",async()=>{
                    if(product_amount.value == 0){
                        const product = products.splice(index,1)
                        factura_info.total-= product[0].precio * product[0].cantidad
                        factura_info.total = Number(factura_info.total.toFixed(2))
                        factura_info.restante=(Number(factura_info.total) - Number(factura_info.cancelado))
                        factura_info.restante = Number(factura_info.restante.toFixed(2))
                        factura_info.products = products
                        render_table()
                        render_amount_container()
                        update_localStorage()
                        await HideEditProductModal()
                    }
                    else{
                        let initial_price = (products[index].cantidad * products[index].precio)
                        let new_price = (Number(product_amount.value)  * products[index].precio)
                        products[index].cantidad = product_amount.value
                        factura_info.total -= (initial_price-new_price)
                        factura_info.total = Number(factura_info.total.toFixed(2))
                        factura_info.restante =(Number(factura_info.total) - Number(factura_info.cancelado))
                        factura_info.restante = Number(factura_info.restante.toFixed(2))
                        factura_info.products = products
                        render_table()
                        render_amount_container()
                        update_localStorage()
                        await HideEditProductModal()
                    }
                    
                })
            })

        })
    });
}



function render_amount_container(){
    const amount_container = document.querySelector("#amount-container")
    amount_container.innerHTML = load_amount_data_container(factura_info)
}



function update_localStorage(){
    const factura_json = JSON.parse(localStorage.getItem('factura'))
    factura_json.factura_info = factura_info
    localStorage.setItem('factura',JSON.stringify(factura_json))
}



function search_product(product){

    for (let index = 0; index < products.length; index++) {
        if(product.codigo_producto == products[index].codigo_producto){
            return index
        }
    }
    return -1
}







//window.onload = load_components





