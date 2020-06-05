module.exports = (app) => {
    const mitra = require('../controllers/api/api-mitra.controller.js');

    // ========== RESTAPI ==========

    // Menambah Mitra
    app.post('/api/mitra', mitra.create);

    // Mencari Mitra
    app.get('/api/mitra', mitra.findAll);

    // Mencari Mitra berdasarkan Id
    app.get('/api/mitra/:noteId', mitra.findOne);

    // Update Mitra berdasarkan Id
    app.put('/api/mitra/:noteId', mitra.update);

    // Delete Mitra berdasarkan Id
    app.delete('/api/mitra/:noteId', mitra.delete);
}