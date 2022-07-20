import { checkIfInteger,checkIfString } from "../js/utils.js";


const tipo_cliente = document.querySelector("#tipo_cliente");
const input_container = document.querySelector("#input-container")
const button_container = document.querySelector("#button-container")

const form_container = document.querySelector("#form-container")




button_container.style.display = "none"
tipo_cliente.addEventListener('change',()=>{
    if(tipo_cliente.value == "Natural"){
        button_container.style.display = ''
        input_container.innerHTML = 
        `
        <div class="col-md-4">
            <label for="identificacion" class="form-label m-1">Cedula</label>
            <input maxlength="32" type="text" name="identificacion" id="valid-ID" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="nombre" class="form-label m-1">Nombre</label>
            <input maxlength="32" type="text" name="nombre" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="apellido" class="form-label m-1">Apellido</label>
            <input maxlength="32" type="text" name="apellido" id="valid-lastName" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="direccion" class="form-label m-1">Direccion</label>
            <input maxlength="128" type="text" name="direccion" id="valid-direccion" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="telefono" class="form-label m-1">Telefono</label>
            <input maxlength="32" type="text" name="telefono" id="valid-telefono" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="fecha_nacimiento" class="form-label m-1">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="valid-fecha_nacimiento" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="sexo" class="form-label m-1">Sexo</label>
            <select name="sexo" id="sexo" class="form-select p-2">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
        
        <div class="col-md-4">
            <label for="nacionalidad" class="form-label m-1">Nacionalidad</label>
            <select name="nacionalidad" id="sexo" class="form-select p-2">
                <option value="Venezolano">Venezolano</option>
                <option value="Extranjero">Extranjero</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="correo" class="form-label m-1">Correo</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input maxlength="128" type="text" name="correo" id="" class="form-control p-2">
            </div>
        </div>
        
        `
    }
    else if(tipo_cliente.value == "Juridico"){
        button_container.style.display = ''
        input_container.innerHTML = 
        `
        <div class="col-md-4">
            <label for="identificacion" class="form-label m-1">RIF</label>
            <input maxlength="32" type="text" name="identificacion" id="valid-ID" class="form-control p-2" required >
        </div>
        <div class="col-md-4">
            <label for="nombre" class="form-label m-1">Nombre</label>
            <input maxlength="64" type="text" name="nombre" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="direccion" class="form-label m-1">Direccion</label>
            <input maxlength="64" type="text" name="direccion" id="valid-direccion" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="telefono" class="form-label m-1">Telefono de contacto</label>
            <input maxlength="32" type="text" name="telefono" id="valid-telefono"  class="form-control p-2"required >
        </div>
        <div class="col-md-4">
            <label for="telefono_empresa" class="form-label m-1">Telefono empresa</label>
            <input maxlength="32" type="text" name="telefono_empresa" id="valid-telefono-empresa"  class="form-control p-2"required >
        </div>
        <div class="col-md-4">
            <label for="correo" class="form-label m-1">Correo</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input maxlength="128" type="text" name="correo" id="" class="form-control p-2"required >
            </div>
        </div>

        `
    }
    else if(tipo_cliente.value == ""){
        input_container.innerHTML = ""
        button_container.style.display = "none"
    }
})







function validatePersonaNatural(){
    const valid_id = document.getElementById("valid-ID")
    const valid_name = document.getElementById("valid-name")
    const valid_lastname = document.getElementById("valid-lastName")
    const valid_telefono = document.getElementById("valid-telefono")

    if(checkIfInteger(valid_id.value)){
        if(checkIfString(valid_name.value)){
            if(checkIfString(valid_lastname.value)){
                if(checkIfInteger(valid_telefono.value)){
                    return true
                }
                else{
                    alert("Ingrese un telefono valido!")
                }
            }
            else{
                alert("Ingrese un apellido valido!")
            }
        }
        else{
            alert("Ingrese una nombre valido!")
        }
    }
    else{
        alert("Ingrese una identidad valida")
    }
    return false
}

function validatePersonaJuridica(){
    const valid_id = document.querySelector("#valid-ID")
    const valid_name = document.querySelector("#valid-name")
    const valid_telefono = document.querySelector("#valid-telefono")
    const valid_telefono_empresa = document.querySelector("#valid-telefono-empresa")

    if(checkIfInteger(valid_id.value)){
        if(checkIfString(valid_name.value)){
            if(checkIfInteger(valid_telefono.value)){
                if(checkIfInteger(valid_telefono_empresa.value)){
                    return true
                }
                else{
                    alert("Ingrese un telefono valido")
                }
            }
            else{
                alert("Ingrese un telefono valido")
            }
        }
        else{
            alert("Ingrese un nombre valido")
        }
    }
    else{
        alert("Ingrese un RIF valido")
    }
    return false
}


form_container.onsubmit = e =>{
    if(tipo_cliente.value == "Natural"){
        if(validatePersonaNatural()){
            e.submit()
        }
    
    }
    else{
        if(validatePersonaJuridica()){
            e.submit()
        }
    }
    e.preventDefault()
}




window.onload = e => tipo_cliente.focus()