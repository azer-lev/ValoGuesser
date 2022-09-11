
export enum Team {
    one,
    two,
}
export class Player {
    team?: Team;
    id: number;
    token?: string;
    score?: 1 | 2[];
    name?: string;
    votes = Array();

    constructor(_id = 0, _team = Team.one) {
        this.id = _id;
        this.team = _team;
        //Request => getName from userid
    }

    pushVote(vote) {
        this.votes.push(vote)
    }
}

export enum Rank {
    Silver,
    Gold,
    Platin
}

class Vote {
    vote: Rank;
    videoId: string

    constructor(_vote: Rank, _videoId: string) {
        this.vote = _vote;
        this.videoId = _videoId;
    }
}

export enum GameMode {
    oneVsOne,
    twoVsTwo
}

export class RoomObject {
    key: number = 0
    gameMode: GameMode;
    players = Array();

    get isFull(): boolean
    {
        return this.gameMode == GameMode.oneVsOne ? 
                    this.players?.length === 2 :
                    this.players?.length === 4; 
    }

    constructor(_key: number, _gameMode: GameMode) {
        this.gameMode = _gameMode
        this.key = _key;
        if (this.gameMode == GameMode.oneVsOne)
        {
            
        }
    }

    getNextVideo() {
        //Request an PHP -> Neues zufälliges video
    }

    receiveVote(player, vote) {

    }

    playerJoin(player) {
        //Add multiplayer support
        this.players.push(player)
    }

    startCountdown() {

    }
}

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