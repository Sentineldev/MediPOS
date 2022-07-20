

import { obtenerUsuarioByID } from "../js/api_user.js";
import { checkIfInteger } from "../js/utils.js";
const find_button = document.querySelector("#find-button")
const card_container = document.querySelector("#card-container")
const form_container = document.querySelector("#form-container")

find_button.addEventListener("click",async()=>{
    const identificacion = document.querySelector("#identificacion").value
    
    form_container.onsubmit = e =>{
        e.preventDefault()
    }
    if(checkIfInteger(identificacion)){
        let user = await obtenerUsuarioByID(identificacion)
        card_container.innerHTML = mostrarUsuario(user)
        if(user != null){
            const button_delete = document.querySelector("#button-delete")
            button_delete.addEventListener("click",()=>{
                form_container.submit()
            })
        }
    }
    else{
        alert("Ingrese una cedula valida!")
    }
    
})






function mostrarUsuario(user){
    let rango = ""
    if(user == null){
        return `
        <div class="  alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El usuario no existe!
        </div>
        `
    }
    if(user.rango == "1"){
        rango  = "Administrador"
    }
    else if(user.rango == "0"){
        rango = "Cajero"
    }
    return `
    <div class="card border-0" style="width: 24rem;">
        <img src="../Imagenes/user-svgrepo-com.svg" width=64 height=64 class=" card-img-top bg-dark" alt="...">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Usuario: ${user.usuario}</li>
            <li class="list-group-item">Rango: ${rango}</li>
        </ul>
        <div class="card-body">
            <button id="button-delete" class="btn btn-danger w-100">Eliminar</button>
        </div>
    </div>
    `
}


window.onload = e =>{
    const identificacion = document.querySelector("#identificacion").focus()
}