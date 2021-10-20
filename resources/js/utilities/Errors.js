class Errors {
    constructor() {
        this.errors = {};
    }

    // Comprobar si existen errores con una key
    has(key) {
        return this.errors.hasOwnProperty(key);
    }

    //Guardar los errores en una variable
    record(errors) {
        this.errors = errors;
    }

    //Obtener el primer error con una key específica
    get(key) {
        return this.errors[key][0];
    }

    //Limpiar un error en específico
    clear(key) {
        delete this.errors[key];
    }

    //Limpiar todos los errores
    clearAll() {
        this.errors = {};
    }
}

export default Errors;