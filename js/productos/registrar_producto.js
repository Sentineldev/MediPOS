
const form = document.querySelector("#form-container")

form.onsubmit = e =>{
    const cantidad = document.querySelector("#cantidad")
    const precio = document.querySelector("#precio")
    if(cantidad.value != ""){
        if(precio.value != ""){
            form.submit()
        }
        else{
            alert("Ingrese solo numeros en el precio!")
        }
    }
    else{
        alert("Ingrese solo enteros en la cantidad!")
    }

    e.preventDefault()

}
window.onload = (e)=>{
    const codigo_producto = document.querySelector("#codigo_producto").focus()
}