import React, { Component } from 'react';
 
/* Stateless component or pure component
 * { student } syntax is the object destructing
 */
const Student = props => {
  const {
    student,
    deleteStudent,
    handleDeleteConfirmation,
    handleEdit,
    update
  } = props;

 
  //if the props student is null, return Student doesn't exist
  if(!student) {
    return(<div>  Student Doesnt exist </div>);
  }
     
  //Else, display the student data
  return(  
    <div> 
      <h2> {student.firstName} {student.lastName}</h2>
      <h2>Age: {student.age} </h2>
      <input type="button" value="edit" onClick={e => handleEdit()} />
      <input type="button" value="delete" onClick={e => handleDeleteConfirmation()} />
    </div>
  )
}
 
export default Student ;