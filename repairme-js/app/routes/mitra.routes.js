module.exports = (app) => {
    const notes = require('../controllers/mitra.controller.js');

    // Create a new Note
    app.post('/api/mitra', notes.create);

    // Retrieve all Notes
    app.get('/api/mitra', notes.findAll);

    // Retrieve a single Note with noteId
    app.get('/api/mitra/:noteId', notes.findOne);

    // Update a Note with noteId
    app.put('/api/mitra/:noteId', notes.update);

    // Delete a Note with noteId
    app.delete('/api/mitra/:noteId', notes.delete);
}