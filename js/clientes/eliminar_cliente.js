import { obtenerClienteNatural,obtenerClienteJuridico } from "../js/api.js";
const tipo_cliente = document.querySelector("#tipo_cliente");
const find_button = document.querySelector('#find-button')
const identification_container = document.querySelector('#identification-container')
const form_container = document.querySelector("#form-container")

const card_container = document.querySelector('#card-container')

//Muestra la entrada de la identificacion segun el tipo de cliente.
tipo_cliente.addEventListener('change',()=>{
    if(tipo_cliente.value == "Natural"){
        identification_container.innerHTML = 
        `
        <label for="identificacion" class="form-label m-1">Cedula</label>
        <input type="text" name="identificacion" id="identificacion" class="form-control p-2 " required>
        `
        find_button.disabled = false
    }
    else if(tipo_cliente.value == "Juridico"){
        identification_container.innerHTML = 
        `
        <label for="identificacion" class="form-label m-1">Rif</label>
        <input type="text" name="identificacion" id="identificacion" class="form-control p-2" required>
        `
        find_button.disabled = false

    }
    else{
        identification_container.innerHTML = ""
        find_button.disabled = true

    }
})

//Al hacer click en el boton evita que el formulario sea enviado y carga los datos del cliente.
find_button.addEventListener('click',async()=>{
    form_container.onsubmit = e =>{
        e.preventDefault()
    }
    const identificacion = document.querySelector('#identificacion').value
    if(tipo_cliente.value == "Natural"){
        card_container.innerHTML = await mostrarClienteNatural(identificacion)
    }
    else if(tipo_cliente.value == "Juridico"){
        card_container.innerHTML = await mostrarClienteJuridico(identificacion)
    }
    const button_delete = document.querySelector("#button-delete")
    if(button_delete != null){
        button_delete.addEventListener('click',()=>{
            form_container.submit()
        })
    }
})


async function mostrarClienteJuridico(identificacion){
    const client = await obtenerClienteJuridico(identificacion)
    if(client == null){
        return `
        <div class="  alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El usuario no existe!
        </div>
        `
    }
    return `
    <div class="card border-0" style="width: 24rem;">
        <img src="../Imagenes/user-svgrepo-com.svg" width=64 height=64 class=" card-img-top bg-dark" alt="...">
        <div class="card-body">
            <h5 class="card-title">${client.nombre}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Correo: ${client.correo}</li>
            <li class="list-group-item">Direccion: ${client.direccion}</li>
            <li class="list-group-item">Telefono contacto: ${client.telefono_empresa}</li>
            <li class="list-group-item">Telefono empresa: ${client.telefono_contacto}</li>
        </ul>
        <div class="card-body">
            <button id="button-delete" class="btn btn-danger w-100">Eliminar</button>
        </div>
    </div>
    `
}
async function mostrarClienteNatural(identificacion){
    const client = await obtenerClienteNatural(identificacion)
    if(client == null){
        return `
        <div class="  alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El usuario no existe!
        </div>
        `
    }
    return `
    <div class="card border-0" style="width: 24rem;">
        <img src="../Imagenes/user-svgrepo-com.svg" width=64 height=64 class=" card-img-top bg-dark" alt="...">
        <div class="card-body">
            <h5 class="card-title">${client.nombre} ${client.apellido}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Correo: ${client.correo}</li>
            <li class="list-group-item">Direccion: ${client.direccion}</li>
            <li class="list-group-item">Telefono: ${client.telefono_contacto}</li>
            <li class="list-group-item">Nacionalidad: ${client.nacionalidad} </li>
            <li class="list-group-item">Sexo: ${client.sexo} </li>
            <li class="list-group-item">Fecha de nacimiento: ${client.fecha_nacimiento} </li>
        </ul>
        <div class="card-body">
            <button id="button-delete" class="btn btn-danger w-100">Eliminar</button>
        </div>
    </div>
    `
}


