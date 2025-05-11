import React, { useState } from 'react';

function Operation() {
  const [firstNumber, setFirstNumber] = useState(0);
  const [secondNumber, setSecondNumber] = useState(0);
  const [result, setResult] = useState(0);

  const handleFirstNumberChange = (event) => {
    setFirstNumber(event.target.value);
  };

  const handleSecondNumberChange = (event) => {
    setSecondNumber(event.target.value);
  };

  const handleCalculateClick = () => {
    let result = firstNumber + secondNumber;
    setResult(result);
  };

  return (
    <div>
      <h1>Calculateur</h1>
      <form>
        <label htmlFor="first-number">Nombre 1: </label>
        <input type="text" id="first-number" value={firstNumber} onChange={handleFirstNumberChange} />
        <br />
        <label htmlFor="second-number">Nombre 2: </label>
        <input type="text" id="second-number" value={secondNumber} onChange={handleSecondNumberChange} />
        <br />
        <button onClick={handleCalculateClick}>Calculer</button>
      </form>
      <p>Résultat: {result}</p>
    </div>
  );
}