const mongoose = require('mongoose');

const UserSchema = mongoose.Schema({
    email: String,
    password: String,
    jenis: String
}, {
    timestamps: true
});

module.exports = mongoose.model('User', UserSchema, 'user');