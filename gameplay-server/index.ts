/*import { RouterOut } from "./routes/gameplay-duell";
const express = require('express')
const bodyParser = require("body-parser");
export let app = express();
const router = express.Router();
app.use("/", router);

//Here we are configuring express to use body-parser as middle-ware.
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());


router.get('/',(req, res) => {
    res.send("<div>asdasd</div>");
});

app.get("/test", (req, res) => {
    res.send("<div>asdasd</div>");
});

router.post("/setPlayer", (req: {body}, res) => {
    console.log('test', req.body)
    res.end('yes');
});

app.listen(3000, () => console.log('Gameplay server started on port 3000!'))
*/

const express = require("express");
const bodyParser = require("body-parser");
const router = express.Router();
export const app = express();
// add router in express app
app.use("/",router);

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

router.get('/',(req, res) => {
    res.send("<div>asdasd</div>");
});

router.post('/login',(req, res) => {
var user_name = req.body.user;
var password = req.body.password;
    console.log('User name = '+user_name, ' password is ' +password);
    res.end('yes');
});

app.listen(3000,() => {
console.log("Started on PORT 3000");
})

/*
let test = new RouterOut();
test.setPlayer();*/