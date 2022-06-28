import { obtenerUsuarioByID } from "../js/api_user.js";
const find_button = document.querySelector("#find-button")
const input_container = document.querySelector("#input-container")
const form_container = document.querySelector("#form-container")

find_button.addEventListener("click", async()=>{
    const identificacion = document.querySelector("#identificacion").value
    form_container.onsubmit = e =>{
        e.preventDefault()
    }
    const user = await obtenerUsuarioByID(identificacion)
    if(user != null){
        input_container.innerHTML = formModifyUser(user)
        const modify_button = document.querySelector("#modify-button")
        modify_button.addEventListener('click',()=>{
            form_container.submit()
        })
    }
    else{
        input_container.innerHTML = `
        <div class="alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El usuario no existe!
        </div>
        `
    }

})



function formModifyUser(user){
    let rango = ""
    if(user.rango == "1"){
        rango = "Administrador"
    }
    else{
        rango = "Cajero"
    }
    return `
    <div class="col-md-4">
        <label for="usuario" class="form-label m-1">Usuario</label>
        <input value="${user.usuario}" type="text" name="usuario" id="usuario" class="form-control p-2" required>
    </div>
    <div class="col-md-4">
        <label for="clave" class="form-label m-1">Clave</label>
        <input value="${user.clave}" type="password" name="clave" id="clave" class="form-control p-2" required>
    </div>
    <div class="col-md-4">
        <label for="rango" class="form-label m-1">Rango</label>
        <select name="rango" id="rango" class="form-select p-2">
            <option value="${user.rango}">${rango}</option>
            <option value="0">Cajero</option>
            <option value="1">Administrador</option>
        </select>
    </div>
    <div id="button-container" class="col-12 m-0">
        <button id="modify-button" class="button btn  w-25 mt-4 m-1 p-2 "  type="submit" >Modificar Usuario</button>
    </div>
    `
}