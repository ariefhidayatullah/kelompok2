module.exports = (app, express) => {
    
    const router = express.Router();

    router.get('/', (req, res) => {
        res.send(req.url);
    });
    
    router.get('/registrasi', (req, res) => {
        res.render('pelanggan/registrasi', {
            judul: 'Registrasi Pelanggan'
        });
    });




    app.use('/pelanggan', router);

}