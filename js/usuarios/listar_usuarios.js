import {obtenerCantidadUsuarios,obtenerUsuariosPorPagina} from "../js/api_user.js";


const pagination_list = document.querySelector("#pagination-list")
const table_body = document.querySelector("#table-body")
const table_head = document.querySelector("#table-head")








async function actualizarNroPaginas(){
    
    let cant_usuarios = await obtenerCantidadUsuarios()
    cant_usuarios = Math.ceil(cant_usuarios.cantidad/5)
    let template = ``
    for(let i = 0;i<cant_usuarios;i++){
        template = template + `<li class="page-item"><a class="page-link" href="#">${i+1}</a></li>`
    }
    return template
}

function asignarEventoCarga(){
    const childs = pagination_list.childNodes
    childs.forEach((element,index) => {
        element.addEventListener("click",async (e)=>{
            e.preventDefault()
            await tablaUsuarios(index+1)
        })
    });
}



async function tablaUsuarios(pagina){
    table_head.innerHTML = 
    `
    <tr>
        <th scope="col">Cedula</th>
        <th scope="col">Usuario</th>
        <th scope="col">Rango</th>
    </tr>
    `

    let users = await obtenerUsuariosPorPagina(pagina)
    let template = ``
    users.forEach(element => {
        let rango = ""
        if(element.rango == "1"){
            rango = "Administrador"
        }
        else if(element.rango == "0"){
            rango = "Cajero"
        }
        template = 
        template +
        `
        <tr>
            <td>${element.identificacion}</td>
            <td>${element.usuario}</td>
            <td>${rango}</td>
        </tr>
        `
    });
    table_body.innerHTML = template

}

async function loadUsers(){
    pagination_list.innerHTML = await actualizarNroPaginas()
    await tablaUsuarios("1")
    asignarEventoCarga()

}


window.onload = loadUsers