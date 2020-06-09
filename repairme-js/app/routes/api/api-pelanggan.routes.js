module.exports = (app, express) => {
    const pelanggan = require('../../controllers/api/api-pelanggan.controller.js');
    const router = express.Router();

    // ========== RESTAPI ==========

    // Menambah pelanggan
    router.post('/', pelanggan.create);

    // Mencari pelanggan
    router.get('/', pelanggan.findAll);

    // Mencari pelanggan berdasarkan Id
    router.get('/:noteId', pelanggan.findOne);

    // Update pelanggan berdasarkan Id
    router.put('/:noteId', pelanggan.update);

    // Delete pelanggan berdasarkan Id
    router.delete('/:noteId', pelanggan.delete);

    app.use('/api/pelanggan', router);
}