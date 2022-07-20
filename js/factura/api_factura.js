export async function guardarFactura(factura_info){
    const productos = factura_info.factura_info.products
    const pagos = factura_info.factura_info.pagos
    const cliente = factura_info.client
    const data = JSON.stringify({
        monto:factura_info.factura_info.total,
        cliente:cliente,
        productos:productos,
        pagos:pagos
    })
    let request = await fetch("http://localhost/MediPOS/factura/guardar_factura",{
        method:"POST",
        body:data
    })
    return request
    
}




