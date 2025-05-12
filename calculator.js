// calculator.js
import React, { useState } from 'react';

function Calculator() {
  const [firstNumber, setFirstNumber] = useState(0);
  const [secondNumber, setSecondNumber] = useState(0);
  const [result, setResult] = useState(null);

  const handleNumberChange = (event) => {
    const value = parseFloat(event.target.value);
    if (isNaN(value)) return;
    switch (event.target.id) {
      case 'first-number':
        setFirstNumber(value);
        break;
      case 'second-number':
        setSecondNumber(value);
        break;
    }
  };

  const handleOperationChange = (event) => {
    switch (event.target.id) {
      case 'addition':
        setResult(firstNumber + secondNumber);
        break;
      case 'subtraction':
        setResult(firstNumber - secondNumber);
        break;
      case 'multiplication':
        setResult(firstNumber * secondNumber);
        break;
      case 'division':
        if (secondNumber === 0) return;
        setResult(firstNumber / secondNumber);
        break;
    }
  };

  const handleReset = () => {
    setFirstNumber(0);
    setSecondNumber(0);
    setResult(null);
  };

  return (
    <div className="calculator">
      <h1>Calculator</h1>
      <form onSubmit={handleOperationChange}>
        <label htmlFor="first-number">First Number:</label>
        <input type="text" id="first-number" value={firstNumber} onChange={handleNumberChange} />
        <br />
        <label htmlFor="second-number">Second Number:</label>
        <input type="text" id="second-number" value={secondNumber} onChange={handleNumberChange} />
        <br />
        <select name="operation" onChange={handleOperationChange}>
          <option value="addition">+</option>
          <option value="subtraction">-</option>
          <option value="multiplication">*</option>
          <option value="division">/</option>
        </select>
        <br />
        <button type="submit" disabled={!firstNumber || !secondNumber}>
          Calculate
        </button>
        <button onClick={handleReset}>Reset</button>
      </form>
      {result ? (
        <p>Result: {result}</p>
      ) : (
        <p>Please enter both numbers to calculate the result.</p>
      )}
    </div>
  );
}