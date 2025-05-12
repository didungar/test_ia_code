javascript
import React, { useState } from 'react';
import ResultHandler from './result_handler';

function TooLargeNumber() {
  const [number, setNumber] = useState(0);
  const [tooLarge, setTooLarge] = useState(false);

  const handleNumberChange = (event) => {
    const newNumber = parseInt(event.target.value);
    if (newNumber > 1000000) {
      setTooLarge(true);
    } else {
      setTooLarge(false);
      setNumber(newNumber);
    }
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    if (tooLarge) {
      alert('Le nombre est trop grand !');
    } else {
      ResultHandler.handleResult(number);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Entrer un nombre :{' '}
        <input type="number" value={number} onChange={handleNumberChange} />
      </label>
      <button type="submit">Envoyer</button>
      {tooLarge && (
        <div className="alert alert-danger">Le nombre est trop grand !</div>
      )}
    </form>
  );
}