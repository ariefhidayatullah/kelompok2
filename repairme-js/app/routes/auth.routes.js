module.exports = (app) => {

	const user = require('../controllers/user.controller.js');
    
    app.post('/registrasi/mitra', user.create);

}