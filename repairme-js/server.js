const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');
const ejs = require('ejs');

// create express app
const app = express();

// parse requests of content-type - application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: true }))

// parse requests of content-type - application/json
app.use(bodyParser.json())

//view engine for ejs
app.set('view engine', 'ejs');

//set views ke 
app.set('views', path.join(__dirname, 'views'));
app.use('/css', express.static(__dirname + '/assets/css'));
app.use('/vue', express.static(__dirname + '/assets/js/vueJs/vue.js'));
app.use('/lib', express.static(__dirname + '/assets/lib'));
app.use('/images', express.static(__dirname + '/assets/images'));
app.use('/js', express.static(__dirname + '/assets/js'));

// Configuring the database
const dbConfig = require('./config/database.config.js');
const mongoose = require('mongoose');

mongoose.Promise = global.Promise;

// Connecting to the database
mongoose.connect(dbConfig.url, {
    useNewUrlParser: true,
    useUnifiedTopology: true
}).then(() => {
    console.log("Successfully connected to the database");
}).catch(err => {
    console.log('Could not connect to the database. Exiting now...', err);
    process.exit();
});

// Routing
// important!!!!! => fungsi dari (app) buat ngirim variable app ke routes nya!
require('./app/routes/home.routes')(app);
require('./app/routes/api.router/api-mitra.routes.js')(app);
require('./app/routes/auth.routes')(app);

app.get('/favicon.ico', (req, res) => {
    res.status(204);
});

// listen for requests
app.listen(3000, () => {
    console.log("Server is listening on port 3000");
});