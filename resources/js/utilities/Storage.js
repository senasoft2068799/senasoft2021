class Storage {
    constructor() {
        this.storage = localStorage;
    }

    record(key, value, json = true) {
        if (json) {
            this.storage.setItem(key, JSON.stringify(value));
        } else {
            this.storage.setItem(key, value);
        }
    }

    has(key) {
        return this.storage.getItem(key) !== null;
    }

    get(key, json = true) {
        if (json) {
            return JSON.parse(this.storage.getItem(key));
        } else {
            return this.storage.getItem(key);
        }
    }

    remove(key) {
        this.storage.removeItem(key);
    }

    clear() {
        this.storage.clear();
    }
}

const storage = new Storage();

export default storage;