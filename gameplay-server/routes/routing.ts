import express from 'express';
export const router = express.Router();
const gameplay_duell = require('./gameplay-duell')

module.exports = function(app) {
    app.use(express.json())
    app.use(express.urlencoded( { extended: true } ))
    app.use('/gameplay/duell/', gameplay_duell)
}

export class BodyChild {
    private name!: string;

    constructor()
    {

    }

    public getName()
    {
        return this.name;
    }

    public setName(_name)
    {
        this.name = _name;
    }

    get isValid()
    {
        return this.isValid;
    }
}

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