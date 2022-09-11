import express, { application, request } from "express";
import axios from "axios";
import { GameMode, RoomObject, Player, Team } from "./aufbau";
import { BodyChild } from "./routing";
import { app } from "..";
let router = express.Router();

/* Nullable Type instead of "Type?" */
type Nullable<T> = T | null;

let rooms: RoomObject[] = [];

function getRoom(gameMode: GameMode) {
  let room: Nullable<RoomObject> = null;

  for (const _room of rooms) {
    // for 1vs1 get the room key of the existing room with 1person
    if (
      (gameMode == GameMode.oneVsOne && _room.players.length == 1) ||
      (gameMode == GameMode.twoVsTwo &&
        _room.players.length < 4 &&
        _room.players.length != 0)
    ) {
      room = _room;
    }
  }

  if (room == null) {
    room = new RoomObject(Math.floor(Math.random() * 100), gameMode);
    rooms.push(room);
  } else {
    // create new player to push him to the existing room
    const player = new Player(1, Team.two);
    room.players.push(player);
  }

  return room;
}

function startGame() {
  //* send videoId recv from azer
}
class SetPlayer { //extends BodyChild
  public playerToken!: string;
  public gameMode!: GameMode;
  public roomKey!: string;
  public privateLobby!: boolean; // todo

  constructor(_name: string) {
    //super();
  }

  get isValid() {
    return (
      this.playerToken != null &&
      this.gameMode != null &&
      this.roomKey != null &&
      this.privateLobby != null
    );
  }
}

/*(async async => {
    let setPlayerObj: SetPlayer = new SetPlayer('setPlayer');
    let setPlayer = await router2.post<SetPlayer>(setPlayerObj);

    const gameMode = setPlayer.gameMode;

    let room!: RoomObject;

    if (gameMode == GameMode.oneVsOne)
    {
        room = getRoom(gameMode);

        if (room.isFull) 
        {
            startGame();
        }
    }

    console.log('/setPlayer', room);
})();*/

console.log("wassad", router);
console.log('test', router);


export class RouterOut {
  constructor() {}

  public async setPlayer() {
    /*

Information needed: 
    player-token -> to authenticate the player
    gameplay-mode -> 1vs1, 2vs2, ...
    room-key -> to connect the players to each other
    private-lobby: boolean for private lobbys // todo: return the roomkey
*/

    console.log('SetPlayer initialized', app)

    app.post("setPlayer", (req: {body: SetPlayer}, res) => {
        console.log('setPlayer');

        res.send('Server error!')
      if (req.body.isValid) {
        const gameMode = req.body.gameMode;

        let room!: RoomObject;

        if (gameMode == GameMode.oneVsOne) {
          room = getRoom(gameMode);

          if (room.isFull) {
            startGame();
          }
        }

        console.log("/setPlayer", room);

        //const p = new Player(req.body.tempPlayerKey);

        //let players = [];

        //const data = await p.getPlayerUID();
        //console.log(data);
      } else {
        res.status(400).send("Server error! Try again");
      }
    });
  }
}


/**
 * playerToken or id,
 *
 */
/*router.post('/setVote', async(req, res) => {
    let pi = playerInformation[req.body.playerToken];

    pi.score;
    pi.votes;


});*/

// get game data
/*
    player-token -> to authenticate the player
*/
/*router.post('/getGameData', async(req, res) => {
    let pi = playerInformation[req.body.playerToken];

    pi.score;
    pi.votes;


});*/

/*
module.exports = router;

function rand(arg0: number): any {
    throw new Error('Function not implemented.');
}
*/
