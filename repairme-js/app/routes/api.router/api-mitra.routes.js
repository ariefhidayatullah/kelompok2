module.exports = (app) => {
    const notes = require('../../controllers/api/api-mitra.controller.js');

    // ========== RESTAPI ==========

    // Menambah Mitra
    app.post('/api/mitra', notes.create);

    // Mencari Mitra
    app.get('/api/mitra', notes.findAll);

    // Mencari Mitra berdasarkan Id
    app.get('/api/mitra/:noteId', notes.findOne);

    // Update Mitra berdasarkan Id
    app.put('/api/mitra/:noteId', notes.update);

    // Delete Mitra berdasarkan Id
    app.delete('/api/mitra/:noteId', notes.delete);
}