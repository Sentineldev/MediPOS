
export function load_product_table(){
    return `
    <div class="row container-fluid bg-dark p-0 m-0 header">
        <div class="col col-header"><span>Codigo</span></div>
        <div class="col col-header"><span>Producto</span></div>
        <div class="col col-header"><span>Cantidad</span></div>
        <div class="col col-header"><span>Precio</span></div>
    </div>
    <div class="row container-fluid   p-0 m-0 body">
        <div id="product_table_data" class="body-data-product m-0 p-0">
        </div>
    </div>
    <div class="row container-fluid p-0 m-0 footer">
        <div class="col col-footer p-0 m-0">
            <form id="product-table-form" class="rounded-0">
                <input autocomplete="off" type="text" class="form-control rounded-0" id="codigo_producto" placeholder="Codigo del producto">
            </form>
        </div>
    </div>  
    `
}

export function product_table_item(producto,cantidad){
    return `
    <div class="row container-fluid p-0 m-0 table-item" data-bs-toggle="modal" data-bs-target="#option-modal">
        <div class="col col-body"><span>${producto.codigo_producto}</span></div>
        <div class="col col-body"><span>${producto.descripcion}</span></div>
        <div class="col col-body"><span>${cantidad}</span></div>
        <div class="col col-body"><span>${(parseFloat(producto.precio * cantidad)).toFixed(2)}</span></div>
    </div>
    `
}


export function load_payment_table(){
    return `
    <div class="col p-0 m-0">
        <div class="row container-fluid p-0 m-0">
            <button  id="btn-add-payment" type="button" class="btn btn-primary">Ingresar metodo de pago</button>
        </div>
        <div class="row container-fluid p-0 m-0 header bg-dark rounded-0">
            <div class="col col-header"><span>Entidad</span></div>
            <div class="col col-header"><span>Tipo</span></div>
            <div class="col col-header"><span>Monto</span></div>
        </div>
        <div class="row container-fluid p-0 m-0 body bg-light">
            <div id="payment-data-table" class="body-data-payment m-0 p-0">
            </div>
        </div>
    </div>
    `
}

export function payment_table_item(payment){
    return `
    <div class="row container-fluid p-0 m-0 table-item">
        <div class="col col-body"><span>${payment.entidad}</span></div>
        <div class="col col-body"><span>${payment.tipo_pago}</span></div>
        <div class="col col-body"><span>${parseFloat(payment.monto).toFixed(2)}</span></div>
    </div>
    `
}



export function load_amount_data_container(factura_info){
    if(factura_info == null){
        return `
    <div class="row container-fluid">
        <div id="amount-col" class="col">
            <div class="row container-fluid p-0">
                <div class="col amount"><span>Total: 0.00 </span></div>
            </div>
            <div class="row container-fluid p-0">
                <div class="col amount"><span>Restante: 0.00 </span></div>
                <div class="col amount"><span>Cancelado: 0.00 </span></div>
            </div>
        </div>
    </div>
    `
    }
    else{
        return `
    <div class="row container-fluid">
        <div id="amount-col" class="col">
            <div class="row container-fluid p-0">
                <div class="col amount"><span>Total: ${parseFloat(factura_info.total).toFixed(2)} </span></div>
            </div>
            <div class="row container-fluid p-0">
                <div class="col amount"><span>Restante: ${parseFloat(factura_info.restante).toFixed(2)} </span></div>
                <div class="col amount"><span>Cancelado: ${parseFloat(factura_info.cancelado).toFixed(2)} </span></div>
            </div>
        </div>
    </div>
    `
    }
}






export function factura_container(){
    return `
    <div id="modal-container"></div>
    <div id="factura" class="row p-0 m-0 container-fluid gap-2">
        <div id="primary-column" class="col col-6 p-0 m-0 ">
        <div class="row container-fluid bg-dark p-0 m-0 header">
                <div class="col col-header"><span>Codigo</span></div>
                <div class="col col-header"><span>Producto</span></div>
                <div class="col col-header"><span>Cantidad</span></div>
                <div class="col col-header"><span>Precio</span></div>
            </div>
            <div class="row container-fluid   p-0 m-0 body">
                <div id="product_table_data" class="body-data-product m-0 p-0">
                </div>
            </div>
            <div class="row container-fluid p-0 m-0 footer">
                <div class="col col-footer p-0 m-0">
                    <form id="product-table-form" class="rounded-0">
                        <input autocomplete="off" type="text" class="form-control rounded-0" id="codigo_producto" placeholder="Codigo del producto">
                    </form>
                </div>
            </div>
        </div>
        <div class="col p-0 m-0" id="secondary-column">
            <div  id="table-payment"class="row container-fluid  p-0 m-0">
                <div class="col p-0 m-0">
                    <div class="row container-fluid p-0 m-0 header bg-dark">
                        <div class="col col-header"><span>Entidad</span></div>
                        <div class="col col-header"><span>Tipo</span></div>
                        <div class="col col-header"><span>Monto</span></div>
                    </div>
                    <div class="row container-fluid p-0 m-0 body bg-light">
                        <div class="body-data-payment m-0 p-0">
                            <div class="row container-fluid p-0 m-0">
                                <div class="col col-body"><span>Banco de Venezuela</span></div>
                                <div class="col col-body"><span>Debito</span></div>
                                <div class="col col-body"><span>20.50</span></div>
                            </div>  
                            <div class="row container-fluid p-0 m-0">
                                <div class="col col-body"><span>Banco de Venezuela</span></div>
                                <div class="col col-body"><span>Debito</span></div>
                                <div class="col col-body"><span>20.50</span></div>
                            </div>  
                            <div class="row container-fluid p-0 m-0">
                                <div class="col col-body"><span>Banco de Venezuela</span></div>
                                <div class="col col-body"><span>Debito</span></div>
                                <div class="col col-body"><span>20.50</span></div>
                            </div>  
                            <div class="row container-fluid p-0 m-0">
                                <div class="col col-body"><span>Banco de Venezuela</span></div>
                                <div class="col col-body"><span>Debito</span></div>
                                <div class="col col-body"><span>20.50</span></div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div id="amount-container" class="row container-fluid bg-light p-0  m-0 mt-1">
                <div class="row container-fluid">
                    <div id="amount-col" class="col">
                        <div class="row container-fluid p-0">
                            <div class="col amount"><span>Total: 0.00</span></div>
                        </div>
                        <div class="row container-fluid p-0">
                            <div class="col amount"><span>Restante: 0.00</span></div>
                            <div class="col amount"><span>Cancelado: 0.00 </span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                        
    `
}   

