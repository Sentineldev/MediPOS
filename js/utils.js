export function checkIfInteger(int){
    int = Number(int)
    return Number.isInteger(int)
}

export function checkIfString(str){
    return /^[a-zA-Z\s.,]+$/.test(str);
}