const express = require('express');
const router = express.Router();
const { getAllStudents, getStudentById, createStudent, updateStudent, deleteStudent} = require('../controllers/studentController');


router.get('/', getAllStudents);

router.get('/:id', getStudentById);

router.post('/', createStudent);

router.put('/', updateStudent);

router.delete('/', deleteStudent);


module.exports = router;