class Storage {
    constructor() {
        this.storage = localStorage;
    }

    // Método para guardar los datos en el local storage
    // Se reciben 3 parametros, la key (nombre), el valor a guardar y la opción json (Por si quiere que se retorne los datos en ese formato)
    record(key, value, json = true) {
        if (json) {
            this.storage.setItem(key, JSON.stringify(value));
        } else {
            this.storage.setItem(key, value);
        }
    }

    // Método para comprobar si existe un dato
    has(key) {
        return this.storage.getItem(key) !== null;
    }

    // Método para obtener un dato almacenado
    get(key, json = true) {
        if (json) {
            return JSON.parse(this.storage.getItem(key));
        } else {
            return this.storage.getItem(key);
        }
    }

    // Método para eliminar un dato almacenado
    remove(key) {
        this.storage.removeItem(key);
    }

    // Método para eliminar todos los datos
    clear() {
        this.storage.clear();
    }
}

const storage = new Storage();

export default storage;