const tipo_cliente = document.querySelector("#tipo_cliente");
const input_container = document.querySelector("#input-container")
const button_container = document.querySelector("#button-container")
button_container.style.display = "none"
tipo_cliente.addEventListener('change',()=>{
    if(tipo_cliente.value == "Natural"){
        button_container.style.display = ''
        input_container.innerHTML = 
        `
        <div class="col-md-4">
            <label for="identificacion" class="form-label m-1">Cedula</label>
            <input type="text" name="identificacion" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="nombre" class="form-label m-1">Nombre</label>
            <input type="text" name="nombre" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="apellido" class="form-label m-1">Apellido</label>
            <input type="text" name="apellido" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="direccion" class="form-label m-1">Direccion</label>
            <input type="text" name="direccion" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="telefono" class="form-label m-1">Telefono</label>
            <input type="text" name="telefono" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="fecha_nacimiento" class="form-label m-1">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="sexo" class="form-label m-1">Sexo</label>
            <select name="sexo" id="sexo" class="form-select p-2">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
        
        <div class="col-md-4">
            <label for="nacionalidad" class="form-label m-1">Nacioanlidad</label>
            <select name="nacionalidad" id="sexo" class="form-select p-2">
                <option value="Venezolano">Venezolano</option>
                <option value="Extranjero">Extranjero</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="correo" class="form-label m-1">Correo</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="text" name="correo" id="" class="form-control p-2">
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
            <input type="text" name="identificacion" id="valid-name" class="form-control p-2" required >
        </div>
        <div class="col-md-4">
            <label for="nombre" class="form-label m-1">Nombre</label>
            <input type="text" name="nombre" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="direccion" class="form-label m-1">Direccion</label>
            <input type="text" name="direccion" id="valid-name" class="form-control p-2" required>
        </div>
        <div class="col-md-4">
            <label for="telefono" class="form-label m-1">Telefono de contacto</label>
            <input type="text" name="telefono"  class="form-control p-2"required >
        </div>
        <div class="col-md-4">
            <label for="telefono_empresa" class="form-label m-1">Telefono empresa</label>
            <input type="text" name="telefono_empresa"  class="form-control p-2"required >
        </div>
        <div class="col-md-4">
            <label for="correo" class="form-label m-1">Correo</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="text" name="correo" id="" class="form-control p-2"required >
            </div>
        </div>

        `
    }
    else if(tipo_cliente.value == ""){
        input_container.innerHTML = ""
        button_container.style.display = "none"
    }
})