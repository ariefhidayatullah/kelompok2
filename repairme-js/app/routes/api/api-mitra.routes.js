module.exports = (app, express) => {
    const mitra = require('../../controllers/api/api-mitra.controller.js');
    const router = express.Router();
    const bcrypt = require('bcryptjs');

    // ========== RESTAPI ==========
    const multer = require('multer');

    let myRand = 0;
    let foto_ktp_name = null;
    let foto_usaha_name = null;
    let foto_bukti_name = null;

    const storage_ktp = multer.diskStorage({
        destination: function (req, file, cb) {
            cb(null, 'assets/images/mitra/foto_ktp')
        },
        filename: function (req, file, cb) {
            myRand = Math.floor(Math.random() * 10000)
            cb(null, myRand + '-' + file.originalname);
            foto_ktp_name = myRand + '-' + file.originalname;
        }
    })

    const storage_usaha = multer.diskStorage({
        destination: function (req, file, cb) {
            cb(null, 'assets/images/mitra/foto_usaha')
        },
        filename: function (req, file, cb) {
            myRand = Math.floor(Math.random() * 10000)
            cb(null, myRand + '-' + file.originalname);
            foto_usaha_name = myRand + '-' + file.originalname;
        }
    })

    const storage_bukti = multer.diskStorage({
        destination: function (req, file, cb) {
            cb(null, 'assets/images/mitra/foto_bukti')
        },
        filename: function (req, file, cb) {
            myRand = Math.floor(Math.random() * 10000)
            cb(null, myRand + '-' + file.originalname);
            foto_bukti_name = myRand + '-' + file.originalname;
        }
    })


    const upload_ktp = multer({
        storage: storage_ktp
    });
    const upload_usaha = multer({
        storage: storage_usaha
    });
    const upload_bukti = multer({
        storage: storage_bukti
    });

    // Menambah Mitra
    router.post('/', mitra.create);

    router.post('/upload_ktp', upload_ktp.single('foto_ktp'), (req, res) => {
        res.send({
            number: myRand
        })
    });
    router.post('/upload_usaha', upload_usaha.single('foto_usaha'), (req, res) => {
        res.send({
            number: myRand
        })
    });
    router.post('/upload_bukti', upload_bukti.single('bukti_pembayaran'), (req, res) => {
        res.send({
            number: myRand
        })
    });

    // Mencari Mitra
    router.get('/', mitra.findAll);

    router.get('/email', mitra.findEmail);

    // Mencari Mitra berdasarkan Id
    router.get('/:mitraId', mitra.findOne);

    // Update Mitra berdasarkan Id
    router.put('/:mitraId', mitra.update);

    // Delete Mitra berdasarkan Id
    router.delete('/:mitraId', mitra.delete);

    //tambah Verivikasi
    router.post('/bukti', mitra.insertBukti);

    // Mencari Verivikasi
    router.get('/temukanBukti', mitra.temukanBukti);

    app.use('/api/mitra', router);
}