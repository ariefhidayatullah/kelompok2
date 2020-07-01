module.exports = (app, express) => {
    const notifikasi = require('../../controllers/api/api-notifikasi.controller.js');
    const router = express.Router();

    router.get('/:id/jenis', notifikasi.findAll);
    router.post('/', notifikasi.newNotifikasi);

    app.use('/api/notifikasi', router);
}