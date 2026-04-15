const Student = require('../models/schema')

const getAllStudents = async (req, res) => {
    try{
        const students = await Student.find();
        res.status(200).json(students);
    } catch(error) {
        res.status(500).json({message: error.message});
    }
};

const getStudentById = async (req, res) => {
    try{
        const student = await Student.findById(req.params.id);
        if (!student){
            return res.status(404).json({message: 'Student not found'});
        }
        res.status(200).json(student);
    }catch(error){
        res.status(500).json({message: error.message});
    }
}

const createStudent = async (req, res) => {
    try{
        const student = await Student.create(req.body);
        res.status(201).json(student);
    }catch (error){
        res.status(500).json({message: error.message});
    }
};

const updateStudent = async (req, res) => {
    try{
        const student = await Student.findByIdAndUpdate(
            req.body.id,
            req.body,
            {new: true, runValidators: true}
        );
        if (!student){
            return res.status(404).json({message: 'Student not found'});
        }

        res.status(200).json(student);
    } catch (error){
        res.status(500).json({message: error.message})
    }
}

const deleteStudent = async (req, res) => {
    try{
        const student = await Student.findByIdAndDelete(
            req.body.id
        )
        if (!student){
            return res.status(404).json({message: 'Student not found'});
        }
        res.status(200).json({message: 'Student deleted'});
    }catch(error){
        res.status(500).json({message: error.message});
    }
};

module.exports = { getAllStudents, getStudentById, createStudent, updateStudent, deleteStudent  }; 