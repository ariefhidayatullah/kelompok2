const path = require('path');

module.exports = (app, express) => {

    const router = express.Router();

    router.get('/', (req, res) => {
        res.send(req.url);
    });
    
    router.get('/registrasi', (req, res) => {
        res.render('mitra/registrasi', {
            judul: 'Registrasi Mitra'
        });
    });

    app.use('/mitra', router);

}