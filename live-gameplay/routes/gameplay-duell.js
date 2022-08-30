const express = require('express')
const router = express.Router();
const validation = require('../validation/duell-validation')
const requests = require('../helpers/request')
const axios = require('axios')
const Player = require('../helpers/Player')


/*

Information needed: 
    temp-playerkey -> to authenticate the player
    gameplay-mode -> 
*/
router.post('/', async(req, res) => {
    if(validation.startInformation_correct(req.body)) {
        const p = new Player(1)
        const data = await p.getPlayerUID()
        console.log(data)
    }else {
        res.status(400).send('Server error! Try again')
    }
})

module.exports = router;