const { fetch } = require('node-fetch')

module.exports = class Player {
    constructor(token) {
        this._playertoken = token;
    }

    setToken(token) {
        this._playertoken = token;
    }

    async getPlayerUID() {
        if(this._playertoken !== undefined) {
            const parseData = {
                playertoken: this._playertoken,
                login_password: 1
            }

            const response = await fetch('http://localhost/ValoGuesser/requests/tokenToPlayer.php', {
                method: 'post',
                body: JSON.stringify(parseData),
                headers: {'Content-Type': 'application/json'}
            })
            const data = await response.json();
            console.log(data)
            return data
        }
        return -1;
    }
}