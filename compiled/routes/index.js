"use strict";
const Express = require('express');
const app = Express();
//require('./routes/routing')(app);
app.listen(3000, () => console.log('Gameplay server started on port 3000!'));
app.router.get("/test", (req, res) => {
    res.send("<div>test</div>");
});
