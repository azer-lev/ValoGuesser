class Node {
    _previews = null
    _next = null
    _data = null
    constructor(data, next, previews) {
        this._data = data
        this._next = next
        this._previews = previews
    }
}


module.exports.Queue = class {

    constructor() {
    }

    push_back(obj) {
        if(this._root === undefined) {
            this._root = node
            return
        }
        let n = new Node(obj, this._root._previews, this._root)
        this._root._previews._next = n
        this._root._previews = n;
    }

    lastElement() {
        if(this.root !== undefined) {
            return this.root.previews != null ? this.root.previews : this.root;
        }
        return -1
    }
}