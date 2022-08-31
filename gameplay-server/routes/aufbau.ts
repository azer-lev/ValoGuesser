class Player {
    teamId;
    id;
    token;
    score;
    name;
    votes = Array();

    constructor() {


        //Request => getName from userid
    }

    pushVote(vote) {
        this.votes.push(vote)
    }
}

enum Rank {

}

class Vote {
    vote: Rank;
    videoId: string

    constructor(_vote: Rank, _videoId: string) {
        this.vote = _vote;
        this.videoId = _videoId;
    }
}

class RoomObject {
    key = 0
    gameMode;
    players = Array();

    constructor(_key, _gameMode) {
        this.gameMode = _gameMode
        this.key = _key;
        if (this.gameMode == GamePlayMode.oneVsOne)
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