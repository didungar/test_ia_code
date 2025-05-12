// File: AdditionComponent.js
import React, { useState } from 'react';

function AdditionComponent() {
  // Utiliser l'hook "useState" pour gérer l'état du composant
  const [number1, setNumber1] = useState(0);
  const [number2, setNumber2] = useState(0);
  const [sum, setSum] = useState(0);

  // Utiliser la fonction "handleChange" pour gérer les modifications de l'état
  function handleChange(event) {
    switch (event.target.name) {
      case 'number1':
        setNumber1(parseInt(event.target.value));
        break;
      case 'number2':
        setNumber2(parseInt(event.target.value));
        break;
      default:
        console.log('Unknown event name', event);
    }
  }

  // Utiliser la fonction "handleSubmit" pour gérer les soumissions du formulaire
  function handleSubmit(event) {
    event.preventDefault();
    setSum(number1 + number2);
  }

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Number 1:
        <input type="text" name="number1" value={number1} onChange={handleChange} />
      </label>
      <br />
      <label>
        Number 2:
        <input type="text" name="number2" value={number2} onChange={handleChange} />
      </label>
      <br />
      <button type="submit">Add</button>
      <p>Sum: {sum}</p>
    </form>
  );
}

export default AdditionComponent;