

//Hace la peticion al servidor para obtener los datos del cliente
export async function obtenerClienteNatural(identificacion){
    let data = await fetch(`http://localhost/MediPOS/cliente/obtener_cliente_natural/${identificacion}`)
    data = await data.json()
    return data
}

//Hace la peticion al servidor para obtener los datos del cliente
export async function obtenerClienteJuridico(identificacion){
    let data = await fetch(`http://localhost/MediPOS/cliente/obtener_cliente_juridico/${identificacion}`)
    data = await data.json()
    return data
}


//Obtiene cierta cantidad de clientes de la base de datos en un rango determinado calculado con el numero de pagina
export async function obtenerClientesPorPagina(tipo_cliente,pagina){
    let data = await fetch(`http://localhost/MediPOS/cliente/obtener_clientes/${tipo_cliente}/${pagina}`)
    data = await data.json()
    return data
}
//Obtiene la cantidad total de clientes registrado de un tipo.
export async function obtenerCantidadClientes(tipo_cliente){
    let data = await fetch(`http://localhost/MediPOS/cliente/obtener_cantidad_clientes/${tipo_cliente}`)
    data = await data.json()
    return data
}
