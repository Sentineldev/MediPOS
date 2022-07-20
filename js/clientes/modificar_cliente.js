import { obtenerClienteNatural,obtenerClienteJuridico } from "../js/api.js";
import { checkIfInteger,checkIfString } from "../js/utils.js";
const tipo_cliente = document.querySelector("#tipo_cliente");
const identification_container = document.querySelector('#identification-container')
const find_button = document.querySelector('#find-button')
const input_container = document.querySelector("#input-container")

const form_container = document.querySelector("#form-container")


//Muestra la entrada de la identificacion segun el tipo de cliente.
tipo_cliente.addEventListener('change',()=>{
    if(tipo_cliente.value == "Natural"){
        identification_container.innerHTML = 
        `
        <label for="identificacion" class="form-label m-1">Cedula</label>
        <input type="text" name="identificacion" id="identificacion" class="form-control p-2" required>
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
    input_container.innerHTML = ""
})

//Al hacer click en el boton evita que el formulario sea enviado y carga los datos del cliente.
find_button.addEventListener('click',async()=>{
    input_container.innerHTML = ""
    form_container.onsubmit = e =>{
        e.preventDefault()
    }
    const identificacion = document.querySelector('#identificacion').value

    if(checkIfInteger(identificacion)){
        if(tipo_cliente.value == "Natural" && identificacion != ""){
            input_container.innerHTML = await mostrarClienteNatural(identificacion)
        }
        else if(tipo_cliente.value == "Juridico" && identificacion != ""){
            input_container.innerHTML = await mostrarClienteJuridico(identificacion)
        }
    
        const button_submit = document.querySelector("#button-submit")
        if(button_submit != null){
            button_submit.addEventListener('click',()=>{
                if(tipo_cliente.value == "Natural"){
                    if(validatePersonaNatural()){
                        form_container.submit()
                    }
                }
                else if(tipo_cliente.value == "Juridico"){
                    if(validatePersonaJuridica()){
                        form_container.submit()
                    }
                }
                
            })
        }
    }
    else{
        alert("Ingrese una identidad valida!")
    }
    

})

//Muestra los datos del cliente, con el formato de cliente natural
async function mostrarClienteNatural(identificacion){

    const client =  await obtenerClienteNatural(identificacion)
    if(client == null){
        return `
        <div class="  alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El usuario no existe!
        </div>
        `
    }

    return `
        <div class="col-md-4">
            <label for="nombre" class="form-label m-1">Nombre</label>
            <input value="${client.nombre}" type="text" name="nombre" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="apellido" class="form-label m-1">Apellido</label>
            <input value="${client.apellido}" type="text" name="apellido" id="valid-lastName" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="direccion" class="form-label m-1">Direccion</label>
            <input value="${client.direccion}" type="text" name="direccion" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="telefono" class="form-label m-1">Telefono</label>
            <input value="${client.telefono_contacto}" type="text" name="telefono" id="valid-telefono" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="fecha_nacimiento" class="form-label m-1">Fecha de Nacimiento</label>
            <input value="${client.fecha_nacimiento}" type="date" name="fecha_nacimiento" id="valid-fecha_nacimiento" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="sexo" class="form-label m-1">Sexo</label>
            <select name="sexo" id="sexo" class="form-select p-2">
            <option value="${client.sexo}">${client.sexo}</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="nacionalidad" class="form-label m-1">Nacioanlidad</label>
            <select name="nacionalidad" id="sexo" class="form-select p-2">
                <option value="${client.nacionalidad}">${client.nacionalidad}</option>
                <option value="Venezolano">Venezolano</option>
                <option value="Extranjero">Extranjero</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="correo" class="form-label m-1">Correo</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input value="${client.correo}" type="text" name="correo" id="" class="form-control p-2">
            </div>
        </div>

        <div id="button-container" class="col-12">
            <button id="button-submit" class=" button btn  w-25 mt-4 m-1 p-2"  type="submit" >Modificar Cliente</button>
        </div>
        
        `
}

//Muestra los datos del cliente, con el formato de cliente juridico
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

    <div class="col-md-4">
        <label for="nombre" class="form-label m-1">Nombre</label>
        <input value="${client.nombre}" type="text" name="nombre" id="valid-name" class="form-control p-2" required>
    </div>
    
    <div class="col-md-4">
        <label for="direccion" class="form-label m-1">Direccion</label>
        <input value="${client.direccion}" type="text" name="direccion" id="valid-direccion" class="form-control p-2" required>
    </div>
    <div class="col-md-4">
        <label for="telefono" class="form-label m-1">Telefono de contacto</label>
        <input value="${client.telefono_contacto}" type="text" name="telefono" id="valid-telefono"  class="form-control p-2"required >
    </div>
    <div class="col-md-4">
        <label for="telefono_empresa" class="form-label m-1">Telefono empresa</label>
        <input  value="${client.telefono_empresa}" type="text" name="telefono_empresa" id="valid-telefono-empresa"  class="form-control p-2"required >
    </div>
    <div class="col-md-4">
        <label for="correo" class="form-label m-1">Correo</label>
        <div class="input-group">
            <span class="input-group-text">@</span>
            <input value="${client.correo}" type="text" name="correo" id="" class="form-control p-2"required >
        </div>
    </div>
    <div id="button-container" class="col-12">
        <button id="button-submit"  class=" button btn  w-25 mt-4 m-1 p-2"  type="submit" >Modificar Cliente</button>
    </div>

    `
}


function validatePersonaNatural(){
    const valid_name = document.getElementById("valid-name")
    const valid_lastname = document.getElementById("valid-lastName")
    const valid_telefono = document.getElementById("valid-telefono")

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
    
    return false
}

function validatePersonaJuridica(){
    const valid_name = document.querySelector("#valid-name")
    const valid_telefono = document.querySelector("#valid-telefono")
    const valid_telefono_empresa = document.querySelector("#valid-telefono-empresa")

    console.log(valid_name)

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
    return false
}



window.onload = e => tipo_cliente.focus()