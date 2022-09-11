"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.RoomObject = exports.GameMode = exports.Rank = exports.Player = exports.Team = void 0;
var Team;
(function (Team) {
    Team[Team["one"] = 0] = "one";
    Team[Team["two"] = 1] = "two";
})(Team = exports.Team || (exports.Team = {}));
class Player {
    constructor(_id = 0, _team = Team.one) {
        this.votes = Array();
        this.id = _id;
        this.team = _team;
        //Request => getName from userid
    }
    pushVote(vote) {
        this.votes.push(vote);
    }
}
exports.Player = Player;
var Rank;
(function (Rank) {
    Rank[Rank["Silver"] = 0] = "Silver";
    Rank[Rank["Gold"] = 1] = "Gold";
    Rank[Rank["Platin"] = 2] = "Platin";
})(Rank = exports.Rank || (exports.Rank = {}));
class Vote {
    constructor(_vote, _videoId) {
        this.vote = _vote;
        this.videoId = _videoId;
    }
}
var GameMode;
(function (GameMode) {
    GameMode[GameMode["oneVsOne"] = 0] = "oneVsOne";
    GameMode[GameMode["twoVsTwo"] = 1] = "twoVsTwo";
})(GameMode = exports.GameMode || (exports.GameMode = {}));
class RoomObject {
    constructor(_key, _gameMode) {
        this.key = 0;
        this.players = Array();
        this.gameMode = _gameMode;
        this.key = _key;
        if (this.gameMode == GameMode.oneVsOne) {
        }
    }
    get isFull() {
        var _a, _b;
        return this.gameMode == GameMode.oneVsOne ?
            ((_a = this.players) === null || _a === void 0 ? void 0 : _a.length) === 2 :
            ((_b = this.players) === null || _b === void 0 ? void 0 : _b.length) === 4;
    }
    getNextVideo() {
        //Request an PHP -> Neues zufälliges video
    }
    receiveVote(player, vote) {
    }
    playerJoin(player) {
        //Add multiplayer support
        this.players.push(player);
    }
    startCountdown() {
    }
}
exports.RoomObject = RoomObject;
/*
class Votes {
    playersone = Array();
    playersTeamTwo = Array();
    votes = Array();
    constructor(players) {
        if(players !== undefined && Array.isArray(players)) {
            for(let i = 0; i < players.length; i++) {
                i/2 < players.length / 2 ?
                    this.playersone.push(players[i]) : this.playersTeamTwo.push(players[i]);
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
                if(this.getPlayerTeam(vote[playerToken]) == Teams.one) {
                    //PHP Request vote richtig?
                }
            });
        }

        if(teamId == 0) {
            votes.forEach(vote => {
                if(this.getPlayerTeam(vote[playerToken]) == Teams.one) {
                    //PHP Request vote richtig?
                }
            });
        }
    }

    getPlayerTeam(playerToken) {
        for(let i = 0; i < this.playersone.length; i++) {
            if(this.playersone[i].token == playerToken) {
                return Teams.one
            }else if(this.playersTeamTwo[i].token == playerToken) {
                return Teams.teamTwo
            }
        }
        return Teams.undefined
    }


}
*/ 
