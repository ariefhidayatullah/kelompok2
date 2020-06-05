module.exports = (app, express) => {

	const router = express.Router();
    
    router.get('/', (req, res) => {
        res.render('home/index', {
            judul: 'Home'
        });
    });

    router.get('/tentang-kami', (req, res) => {
    	res.send('page tentang-kami');
    });

    router.get('/perbaikan', (req, res) => {
        res.render('perbaikan/index', {
            judul: 'perbaikan'
        });
    });

    app.use('/', router);

}