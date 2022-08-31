const express = require('express')


const gameplay_duell = require('./gameplay-duell')

module.exports = function(app) {
    app.use(express.json())
    app.use(express.urlencoded( { extended: true } ))
    app.use('/gameplay/duell/', gameplay_duell)
}