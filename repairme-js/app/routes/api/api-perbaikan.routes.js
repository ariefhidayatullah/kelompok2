module.exports = (app, express) => {
	const perbaikan = require('../../controllers/api/api-perbaikan.controller.js');
    const router = express.Router();

    router.post('/', perbaikan.newPerbaikan);
    router.get('/', perbaikan.findAllPerbaikan);

    //pelanggan

    router.get('/pelanggan/:id', perbaikan.findPerbaikanPelanggan);

    //mitra

    app.use('/api/perbaikan', router);
}