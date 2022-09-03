"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.BodyChild = exports.router = void 0;
const express_1 = __importDefault(require("express"));
exports.router = express_1.default.Router();
const gameplay_duell = require('./gameplay-duell');
module.exports = function (app) {
    app.use(express_1.default.json());
    app.use(express_1.default.urlencoded({ extended: true }));
    app.use('/gameplay/duell/', gameplay_duell);
};
class BodyChild {
    constructor() {
    }
    getName() {
        return this.name;
    }
    setName(_name) {
        this.name = _name;
    }
    get isValid() {
        return this.isValid;
    }
}
exports.BodyChild = BodyChild;
/* später
class Router
{
    public async post<BodyType extends BodyChild>(arg: BodyType): Promise<BodyType>
    {
        return new Promise((resolve, reject) => {
            router.post(`/${arg.getName()}`, async(req: {body: BodyType}, res) =>
            {
                if (!req.body.isValid)
                {
                    throw new Error(arg.getName() + ' Object invalid');
                }
                else
                {
                    resolve(req.body);
                }
            });
        });
    }
}

export const router2 = new Router();*/ 
