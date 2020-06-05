module.exports = (app) => {
    const pelanggan = require('../controllers/api/api-pelanggan.controller.js');

    // ========== RESTAPI ==========

    // Menambah pelanggan
    app.post('/api/pelanggan', pelanggan.create);

    // Mencari pelanggan
    app.get('/api/pelanggan', pelanggan.findAll);

    // Mencari pelanggan berdasarkan Id
    app.get('/api/pelanggan/:noteId', pelanggan.findOne);

    // Update pelanggan berdasarkan Id
    app.put('/api/pelanggan/:noteId', pelanggan.update);

    // Delete pelanggan berdasarkan Id
    app.delete('/api/pelanggan/:noteId', pelanggan.delete);
}