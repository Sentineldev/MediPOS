import { obtenerClienteNatural } from "../js/api.js";

const form_container = document.querySelector("#form-container")
const find_button = document.querySelector("#find-button")
const card_container = document.querySelector("#card-container")
const user_form = document.querySelector("#user-form")

find_button.addEventListener("click",async()=>{
    const identificacion = document.querySelector("#identificacion").value
    form_container.onsubmit = e =>{
        e.preventDefault()
    }
    const client = await obtenerClienteNatural(identificacion)
    card_container.innerHTML = await mostrarClienteNatural(client)
    if(client != null){
        user_form.innerHTML = FormUsuario()
        const button_register = document.querySelector("#button-register")
        button_register.addEventListener('click',()=>{
            form_container.submit()
        })
    }
})

function FormUsuario(){
    return `
    <div class="col-md-4 w-100 mt-3 mb-2" id="usuario-container">
        <label for="usuario" class="form-label m-0">Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control p-2" required>
    </div>
    <div class="col-md-4 w-100 mb-2" id="clave-container">
        <label for="clave" class="form-label m-0">Clave</label>
        <input type="password" name="clave" id="clave" class="form-control p-2" required>
    </div>
    <div class="col-md-4 w-100">
        <label for="rango" class="form-label m-0">Rango</label>
        <select name="rango" id="rango" class="form-select p-2">
            <option value="0">Cajero</option>
            <option value="1">Administrador</option>
        </select>
    </div>
    <div id="button-container" class="">
        <button id="button-register"class=" button btn  w-50 mt-4  p-2 border-0">Registrar Usuario</button>
    </div>
    `
}

async function mostrarClienteNatural(client){
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
    </div>
    `
}

window.onload = e =>{
    const identificacion = document.querySelector("#identificacion").focus()
}