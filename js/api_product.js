export async function obtenerProducto(codigo_producto){
    let data = await fetch(`http://localhost/MediPOS/producto/obtener_producto/${codigo_producto}`)
    data = await data.json()
    return data
}

export async function obtenerProductosPorPagina(pagina){
    let data = await fetch(`http://localhost/MediPOS/producto/obtener_producto_pagina/${pagina}`)
    data = await data.json()
    return data
}

export async function obtenerCantidadProductos(){
    let data = await fetch(`http://localhost/MediPOS/producto/obtener_cantidad_productos`)
    data = await data.json()
    return data
}

export async function obtenerLote(numero_lote){
    let data = await fetch(`http://localhost/MediPOS/lote/obtener_lote/${numero_lote}`)
    data = await  data.json()
    return data
}

export async function obtenerLotesPorPagina(pagina){
    let data = await fetch(`http://localhost/MediPOS/lote/obtener_lotes_por_pagina/${pagina}`)
    data = await data.json()
    return data
}
export async function obtenerCantidadLotes(){
    let data = await fetch(`http://localhost/MediPOS/lote/obtener_cantidad_lotes`)
    data = await data.json()
    return data
}