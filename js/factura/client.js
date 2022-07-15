import { obtenerClienteJuridico,obtenerClienteNatural } from "../js/api.js";
import { load_components } from "/MediPOS/js/factura/factura.js";

const tipo_cliente =  document.querySelector("#tipo_cliente")
const identification_container = document.querySelector('#identification-container')
const find_button = document.querySelector('#find-button')
const form_container = document.querySelector("#form-container")
const card_container = document.querySelector('#card-container')
const client_info_container = document.querySelector("#client-info-container")





form_container.onsubmit = e => e.preventDefault()


tipo_cliente.addEventListener('change',async()=>{
    card_container.innerHTML = ""
    identification_container.innerHTML = ""
    const identificacion = document.querySelector("#identificacion")
    if(identificacion != null){
        identificacion.value = ""
    }
    if(tipo_cliente.value == "Natural"){
        identification_container.innerHTML = `
        <label for="identificacion" class="form-label m-1">Cedula</label>
        <input type="text" name="identificacion" id="identificacion" class="form-control p-2 " required>
        `
        const identificacion = document.querySelector("#identificacion")
        find_button.addEventListener('click',async()=>{
            const client = await obtenerClienteNatural(identificacion.value)
            card_container.innerHTML = await mostrarClienteNatural(client)
            const button_submit = document.querySelector("#button-submit")
            if(button_submit != null){
                button_submit.addEventListener("click",()=>{
                    localStorage.setItem('factura',JSON.stringify({client}))
                    client_info_container.innerHTML = mostrarClienteAside(client)
                    load_components()
                })
            }
        })
        
    }
    else if(tipo_cliente.value == "Juridico"){
        identification_container.innerHTML = `
        <label for="identificacion" class="form-label m-1">Rif</label>
        <input type="text" name="identificacion" id="identificacion" class="form-control p-2 " required>
        `
        const identificacion = document.querySelector("#identificacion")
        
        find_button.addEventListener('click',async()=>{
            const client = await obtenerClienteJuridico(identificacion.value)
            card_container.innerHTML = await mostrarClienteJuridico(client)

            const button_submit = document.querySelector("#button-submit")

            if(button_submit != null){
                button_submit.addEventListener('click',()=>{
                    localStorage.setItem('factura',JSON.stringify({client}))
                    client_info_container.innerHTML = mostrarClienteAside(client)
                    load_components()
                })
            }

        })

        
    
    }
    find_button.disabled = false
})





function mostrarClienteAside(client){
    if(client.tipo_persona == "Natural"){
        return `
        <h1 class=" side-bar-container-header text-white text-center fs-5 p-2 bg-dark">Cliente</h1>
        <p  id="customer-name"class=" side-bar-container-p text-center m-0">${client.nombre} ${client.apellido}</p>
        <p id="customer-id" class=" side-bar-container-p text-center m-0">${client.identificacion}</p>
        `
    }
    else{
        return `
        <h1 class=" side-bar-container-header text-white text-center fs-5 p-2 bg-dark">Cliente</h1>
        <p  id="customer-name"class=" side-bar-container-p text-center m-0">${client.nombre}</p>
        <p id="customer-id" class=" side-bar-container-p text-center m-0">${client.identificacion}</p>
        `
    }   
    
}

async function mostrarClienteJuridico(client){
    if(client == null){
        return `
        <div class="  alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El usuario no existe!
        </div>
        `
    }
    return `
    <div class="card border-0" style="width:24rem;">
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
            <button id="button-submit" class="btn btn-success text-white w-100">Facturar</button>
        </div>
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
        <div class="card-body">
            <button id="button-submit" class="btn btn-success w-100">Facturar</button>
        </div>
    </div>
    `
}