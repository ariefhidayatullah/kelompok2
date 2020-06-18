module.exports = (app, express) => {
	const router = express.Router();
    
    router.get('/', (req, res) => {
        let sessionEmail;
        if (req.session.user) {
            sessionEmail = req.session.user.email
        }else{
            sessionEmail = 'false'
        }
        res.render('home/index', {
            judul: 'Home',
            sessionEmail: sessionEmail
        });
    });

    router.get('/tentang-kami', (req, res) => {
    	res.send('page tentang-kami');
    });

    router.get('/perbaikan', (req, res, next) => {
        let sessionEmail;
        if (req.session.user) {
            sessionEmail = req.session.user.email
        }else{
            sessionEmail = 'false'
        }
         if (req.session.user) {
         if (req.session.user.jenis === "pelanggan") {
             res.render('perbaikan/index', {
                judul: 'perbaikan',
                sessionEmail: sessionEmail
            });
         }else{
            next()
         }
        } else {
         req.flash('message', "User tidak terdeteksi!");
         res.redirect('/login');
        }
        
    });

    router.get('/perbaikan/:idMitra', (req, res, next) => {
        let sessionEmail;
        if (req.session.user) {
            sessionEmail = req.session.user.email
        }else{
            sessionEmail = 'false'
        }
        if (req.session.user) {
         if (req.session.user.jenis === "pelanggan") {
             res.render('perbaikan/barang_kerusakan', {
                judul: 'perbaikan',
                idMitra: req.params.idMitra,
                sessionEmail: sessionEmail
            })
         }else{
            next()
         }
        } else {
         req.flash('message', "User tidak terdeteksi!");
         res.redirect('/login');
        }
    });

    app.use('/', router);

}