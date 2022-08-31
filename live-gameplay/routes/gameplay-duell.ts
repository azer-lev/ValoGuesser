import express from 'express';
import validation from '../validation/duell-validation'
import requests from '../helpers/request'
import axios from 'axios'
import Player from '../helpers/Player';

let router = express.Router();

enum GamePlayMode {
    oneVsOne,
    twoVsTwo
}

enum Teams {
    teamOne,
    teamTwo,
    undefined
}

let playerInformation = [];

/*
    votes: []
    get score() => 
    video-id: string
    teams: []
    key: string
*/
class Votes {
    playersTeamOne = Array();
    playersTeamTwo = Array();
    votes = Array();
    constructor(players) {
        if(players !== undefined && Array.isArray(players)) {
            for(let i = 0; i < players.length; i++) {
                i/2 < players.length / 2 ? 
                    this.playersTeamOne.push(players[i]) : this.playersTeamTwo.push(players[i]);
            }
        }
    }

    createVote(videoId, playerToken, vote) {
        this.votes.push({
            videoId: videoId,
            playerToken: playerToken,
            vote: vote
        })
    }

    computeTeamScore(teamId) {
        if(teamId == 0) {
            votes.forEach(vote => {
                if(this.getPlayerTeam(vote[playerToken]) == Teams.teamOne) {
                    //PHP Request vote richtig?
                }
            });
        }

        if(teamId == 0) {
            votes.forEach(vote => {
                if(this.getPlayerTeam(vote[playerToken]) == Teams.teamOne) {
                    //PHP Request vote richtig?
                }
            });
        }
    }

    getPlayerTeam(playerToken) {
        for(let i = 0; i < this.playersTeamOne.length; i++) {
            if(this.playersTeamOne[i].token == playerToken) {
                return Teams.teamOne
            }else if(this.playersTeamTwo[i].token == playerToken) {
                return Teams.teamTwo
            }
        }
        return Teams.undefined
    }


}


let rooms: RoomObject[] = [];

router.get('/room', async(req, res) => {

});
/*

Information needed: 
    player-token -> to authenticate the player
    gameplay-mode -> 1vs1, 2vs2, ...
    room-key -> to connect the players to each other
*/
router.post('/setPlayer', async(req, res) => {
    if(validation.startInformation_correct(req.body)) {

        const playerId = req.body.playerId;
        const roomKey = req.body.roomKey;
        const gameMode = req.body.gamePlayMode;

        if (gameMode == GamePlayMode.oneVsOne)
        {
            let roomKey!: number; // string
            let room: RoomObject;
            rooms.forEach(_room => {
                if (_room.players.length == 1) {
                    roomKey = _room.key;
                    room = _room;
                }
            });


            if (roomKey == null)
            {
                room = new RoomObject(rand(10000), gameMode);
            }
            else 
            {
                room = rooms[roomKey];
            }

            if (room == null)
            {
                room.push({
                    votes: [],
                    get score() {
                        
                    },
                    videoId: '',
                    teams: [playerId]
                });
            } else {
                room.teams.push(playerId)
            }
            
        }
        else if (req.body.gamePlaymode == GamePlayMode.twoVsTwo)
        {

        }


        const p = new Player(req.body.tempPlayerKey);

        let players = [];




        const data = await p.getPlayerUID();
        console.log(data);
    }else {
        res.status(400).send('Server error! Try again')
    }
})

// get game data
/*
    player-token -> to authenticate the player
*/
router.post('/getGameData', async(req, res) => {
    let pi = playerInformation[req.body.playerToken];

    pi.score;
    pi.votes;


});

module.exports = router;