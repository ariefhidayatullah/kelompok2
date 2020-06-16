const express = require('express');
const app = express();
const http = require('http').createServer(app);
const io = require('socket.io')(http); //socket io 
const mysql = require('mysql');
const path = require('path');
const bodyParser = require('body-parser');
const session = require('express-session');
const flash = require('connect-flash');

app.use(session({
    secret: "repairme",
    resave: true,
    saveUninitialized: true
}));
app.use(flash());
app.use(express.json({limit: '50mb'}));
app.use(express.urlencoded({limit: '50mb', extended: true}));

//set view engine jadi ejs
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

// parse requests of content-type - application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({
    extended: true
}))

// parse requests of content-type - application/json
app.use(bodyParser.json())

//database ---!!---
const dbConfig = require('./config/database.config.js'); //database
const mongoose = require('mongoose');
mongoose.Promise = global.Promise;

//connect database
mongoose.connect(dbConfig.url, {
    useNewUrlParser: true,
    useUnifiedTopology: true
}).then(() => {
    console.log("Successfully connected to the database");
}).catch(err => {
    console.log('Could not connect to the database. Exiting now...', err);
    process.exit();
});

// io.on('connection', (socket) => {
//     Mitra.find()
//     socket.emit('mitra', function () {
//         return Mitra;
//     });
// });

// io.on('connection', (socket) => {
//     console.log('a user connected');
//     socket.on('disconnect', () => {
//         console.log('user disconnected');
//     });
// });

app.use('/assets', express.static(__dirname + '/assets/'));

require('./app/routes/api/api-pelanggan.routes.js')(app, express);
require('./app/routes/api/api-mitra.routes.js')(app, express);
require('./app/routes/api/api-barang.routes.js')(app, express);
require('./app/routes/home.routes')(app, express);
require('./app/routes/mitra.routes')(app, express);
require('./app/routes/pelanggan.routes')(app, express);
require('./app/routes/user.routes')(app, express);
require('./app/routes/admin.routes')(app, express);

http.listen(3000, () => {
    console.log('listening on *:3000');
});