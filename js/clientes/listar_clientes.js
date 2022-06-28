import { obtenerCantidadClientes,obtenerClientesPorPagina  } from "../js/api.js";
const tipo_cliente = document.querySelector("#tipo_cliente")
const pagination_list = document.querySelector("#pagination-list");
const table_body = document.querySelector("#table-body")
const table_head = document.querySelector("#table-head")

tipo_cliente.addEventListener('change',async()=>{
    pagination_list.innerHTML =  await actualizarNroPaginas(tipo_cliente.value)
    if(tipo_cliente.value == "Natural"){
        await actualizarTablaClientesNaturales(tipo_cliente.value,"1")
    }
    else{
        await actualizarTablaClientesJuridicos(tipo_cliente.value,"1")
    }
    asignarEventoCarga()
})



//actualiza el numero de paginas segun el tipo de clientes
//esto quiere decir que segun la cantidad de clientes de ese tipo se divide en paginas de 5 en 5.
async function actualizarNroPaginas(tipo_cliente){
    let cantidad_clientes = await obtenerCantidadClientes(tipo_cliente)
    cantidad_clientes = Math.ceil(cantidad_clientes.cantidad/5)
    let template = ``
    for(let i  = 0;i<cantidad_clientes;i++){
        template = template + `<li class="page-item"><a class="page-link" href="#">${i+1}</a></li>`
    }
    return template
}
//asigna el evento que al hacer click en el numero de pagina se actualice la tabla.
async function asignarEventoCarga(){
    const childs = pagination_list.childNodes
    childs.forEach((element,index) => {
        element.addEventListener('click',async(e)=>{
            e.preventDefault()
            await actualizarTablaClientesNaturales(tipo_cliente.value,index+1)
        })
    });
}
//Actualiza la vista de la tabla de clientes naturales con la nueva data.
async function actualizarTablaClientesNaturales(tipo_cliente,pagina){

    table_head.innerHTML = 
    `
    <tr>
        <th scope="col">Cedula</th>
        <th scope="col">Nombres</th>
        <th scope="col">Direccion</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Nacionalidad</th>
        <th scope="col">Sexo</th>
        <th scope="col">Fecha de Nacimiento</th>
    </tr>
    `


    let data = await obtenerClientesPorPagina(tipo_cliente,pagina)
    let template = ``
    data.forEach(element => {
        template = 
        template + 
        `<tr>
            <td>${element.identificacion}</td>
            <td>${element.nombre} ${element.apellido}</td>
            <td>${element.direccion}</td>
            <td>${element.correo}</td>
            <td>${element.telefono_contacto}</td>
            <td>${element.nacionalidad}</td>
            <td>${element.sexo}</td>
            <td>${element.fecha_nacimiento}</td>
        </tr>
        `
    });
    table_body.innerHTML = template
}
//actualiza la vista de clientes juridicos con la nueva data.
async function actualizarTablaClientesJuridicos(tipo_cliente,pagina){


    table_head.innerHTML = 
    `
    <tr>
        <th scope="col">RIF</th>
        <th scope="col">Nombre</th>
        <th scope="col">Direccion</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Telefono Empresa</th>
    </tr>
    `
    let data = await obtenerClientesPorPagina(tipo_cliente,pagina)
    let template = ``
    data.forEach(element => {
        template = 
        template + 
        `
        <tr>
            <td>${element.identificacion}</td>
            <td>${element.nombre}</td>
            <td>${element.direccion}</td>
            <td>${element.correo}</td>
            <td>${element.telefono_contacto}</td>
            <td>${element.telefono_empresa}</td>
        </tr>
        `
    });
    table_body.innerHTML = template
}
