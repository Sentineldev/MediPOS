export async function obtenerUsuarioByID(identificacion){
    let data = await fetch(`http://localhost/MediPOS/usuario/obtener_usuario_by_id/${identificacion}`)
    data = await data.json()
    return data
}

export async function obtenerCantidadUsuarios(){
    let data = await fetch(`http://localhost/MediPOS/usuario/obtener_cantidad_usuarios`)
    data = await data.json()
    return data
}
export async function obtenerUsuariosPorPagina(pagina){
    let data = await fetch(`http://localhost/MediPOS/usuario/obtener_usuarios/${pagina}`)
    data = await data.json()
    return data
}