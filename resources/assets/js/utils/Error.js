export default class Errors {
    /**
     * Create a new Errors instance.
     */
    constructor() {
        this.errors = {}
    }


    /**
     * Determine if an errors exists for the given field.
     *
     * @param fields
     */
    has(...fields) {
        for (let i = 0; i < fields.length; i++) {
            if (this.errors.hasOwnProperty(fields[i])) {
                return this.errors.hasOwnProperty(fields[i])
            }
        }

        return false
    }


    /**
     * Determine if we have any errors.
     */
    any() {
        return Object.keys(this.errors).length > 0
    }


    /**
     * Retrieve the error message for a field.
     *
     * @param {string} field
     */
    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0]
        }
    }


    all(field) {
        return this.errors[field]
    }


    /**
     * For Vue text error rule field.
     */
    getAsRule(field) {
        const error = this.get(field)

        if (error) {
            return [() => error]
        }

        return []
    }


    /**
     * Record the new errors.
     *
     * @param {object} errors
     */
    record(errors) {
        this.errors = errors
    }


    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
    clear(field) {
        if (field) {
            delete this.errors[field]
            return
        }

        this.errors = {}
    }
}
